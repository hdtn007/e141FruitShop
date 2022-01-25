<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB; //  thư viện database để sử dụng thao tác với database
use Session; // thư viện Session để lưu trử thông tin đăng nhập trên session 
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect; // trả về kết quả thành công hoặc thất bại
session_start(); // khi có sử dụng sesstion phải khai báo


class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('administrator')->send();
        }
    }    

    public function index()
    {
        return view('account.admin-account.login');
    }

    public function login_dashboard(Request $request) // xử lý đăng nhập admin
    {

        $admin_email = $request->email; // lấy request từ name admin_email từ input
        $admin_password = md5($request->password); // mã hóa qua mb5

        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first(); // truy vấn  Kiểm tra email, password từ batabase ('bảng tble_admin') -> 1 giá trị
        if($result){

            Session::put('admin_name', $result->admin_name);
            Session::put('admin_avatar', $result->admin_avatar);
            Session::put('admin_id', $result->admin_id);
        } else {
            Session::put('message_box', 'Email hoặc mật khẩu chưa đúng. Vui lòng kiểm tra lại!');
            return Redirect::to('/administrator');
        }
        
        return Redirect::to('/dashboard');

    }

    public function logout_dashboard() // xử lý đăng xuất admin
    {
        $this->AuthLogin();
        Session::put('admin_name', null);
        Session::put('admin_avatar', null);
        Session::put('admin_id', null);
        return Redirect::to('/administrator');
    }

    public function show_dashboard()
    {
        $this->AuthLogin();
        $title_web = "Tổng quan";

        $data_info = array();

        $data_product = DB::table('tbl_product')->get();
        $data_user = DB::table('tbl_user')->get();
        $data_posts = DB::table('tbl_posts')->get();
        $data_bill_details = DB::table('tbl_bill')->get();
        $data_bill = DB::table('tbl_bill')
                    ->select(
                            'bills_bill_id',
                            'bills_purchase_date',
                            'bills_customer_name',
                            'bills_customer_phone',
                            'bills_customer_address',
                            'bills_purchase_date',
                            'bills_customer_request',
                            'bills_status_bill',
                            'bills_sum_price',
                            'bills_status_bill'
                        )
                    ->groupBy(
                            'bills_bill_id',
                            'bills_purchase_date',
                            'bills_customer_name',
                            'bills_customer_phone',
                            'bills_customer_address',
                            'bills_purchase_date',
                            'bills_customer_request',
                            'bills_status_bill',
                            'bills_sum_price'
                        )
                    ->get();

        $data_info = [
            'count_product' => $data_product->count(),
            'count_user' => $data_user->count(),
            'count_post' => $data_posts->count(),
            'sum_product_total_purchased' => $data_product->sum('product_total_purchased'),
            'count_product_total_purchased' => $data_bill->count(),
            'sum_product_like' => $data_product->sum('product_like'),
            'sum_post_like' => $data_posts->sum('post_like'),
            'count_bill_old' => $data_bill->where('bills_status_bill',1)->count(),
            'sum_product_view' => $data_product->sum('product_view'),
            'sum_post_view' => $data_posts->sum('post_view'),
            'sum_product_sold' => $data_product->sum('product_count_product_sold'),
            'sum_bills_price_sum' => $data_bill->where('bills_status_bill',1)->sum('bills_sum_price'),
            'sum_bill_profit' => $data_bill_details->where('bills_status_bill',2)->sum('bills_profit_product_single'),
            'status_import_price' => $data_product->where('product_import_price','<=',0)
                                                  ->where('product_count_product_sold','>',0)
                                                  ->count()    
        ];
        

        return view('administrator.admin-dashboard')
                ->with('title_web',$title_web)
                ->with('data_info',$data_info);
    }

}

