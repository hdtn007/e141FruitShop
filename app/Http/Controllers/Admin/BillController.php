<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB; //  thư viện database để sử dụng thao tác với database
use Session; // thư viện Session để lưu trử thông tin đăng nhập trên session 
use App\Http\Requests;
use Carbon\Carbon; // sử dụng thời gian
use Illuminate\Support\Facades\Redirect; // trả về kết quả thành công hoặc thất bại
session_start(); // khi có sử dụng sesstion phải khai báo

class BillController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('administrator')->send();
        }
    } 

    public function Show_New_Bill()
    {
        $this->AuthLogin();

        $title_web = "Đơn Hàng Mới";

        $data_bill = DB::table('tbl_bill')
                ->join(
                        'tbl_user',
                        'tbl_bill.bills_customer_id',
                        'tbl_user.user_id'
                      )
                ->select(
                            'tbl_bill.bills_bill_id',
                            'tbl_bill.bills_purchase_date',
                            'tbl_bill.bills_customer_name',
                            'tbl_bill.bills_customer_phone',
                            'tbl_bill.bills_customer_address',
                            'tbl_bill.bills_purchase_date',
                            'tbl_bill.bills_customer_request',
                            'tbl_bill.bills_status_bill',
                            'tbl_bill.bills_sum_price',
                            'tbl_user.*'
                        )
                ->where('bills_status_bill',0) // bill chưa chốt
                ->groupBy(
                            'tbl_bill.bills_bill_id',
                            'tbl_bill.bills_purchase_date',
                            'tbl_bill.bills_customer_name',
                            'tbl_bill.bills_customer_phone',
                            'tbl_bill.bills_customer_address',
                            'tbl_bill.bills_purchase_date',
                            'tbl_bill.bills_customer_request',
                            'tbl_bill.bills_status_bill',
                            'tbl_bill.bills_sum_price',
                            'tbl_user.user_id'
                        )
                ->orderBy('bills_purchase_date')
                ->get();

        $data_bill_details = DB::table('tbl_bill')
                             ->join('tbl_user',
                                    'tbl_bill.bills_customer_id',
                                    'tbl_user.user_id'
                                    )
                             ->join('tbl_product',
                                    'tbl_bill.bills_product_id',
                                    'tbl_product.product_id'
                                    )
                             ->select('tbl_bill.*','tbl_user.*','tbl_product.*')
                             ->get();

        $time_now = Carbon::now('Asia/Ho_Chi_Minh');

        return view('administrator.bill.new-bill')
                        ->with('list_bill',$data_bill)
                        ->with('time_now',$time_now)
                        ->with('detail_bill',$data_bill_details)
                        ->with('title_web',$title_web);
    }

    public function Show_Old_Bill()
    {
        $this->AuthLogin();

        $title_web = "Đơn Đã Chốt";

        $data_bill = DB::table('tbl_bill')
                ->join(
                        'tbl_user',
                        'tbl_bill.bills_customer_id',
                        'tbl_user.user_id'
                      )
                ->select(
                            'tbl_bill.bills_bill_id',
                            'tbl_bill.bills_purchase_date',
                            'tbl_bill.bills_customer_name',
                            'tbl_bill.bills_customer_phone',
                            'tbl_bill.bills_customer_address',
                            'tbl_bill.bills_purchase_date',
                            'tbl_bill.bills_customer_request',
                            'tbl_bill.bills_status_bill',
                            'tbl_bill.bills_sum_price',
                            'tbl_bill.bills_desc',
                            'tbl_bill.updated_at as updated_at_bill',
                            'tbl_user.*'
                        )
                ->where('bills_status_bill',1) // bill đã chốt
                ->groupBy(
                            'tbl_bill.bills_bill_id',
                            'tbl_bill.bills_purchase_date',
                            'tbl_bill.bills_customer_name',
                            'tbl_bill.bills_customer_phone',
                            'tbl_bill.bills_customer_address',
                            'tbl_bill.bills_purchase_date',
                            'tbl_bill.bills_customer_request',
                            'tbl_bill.bills_status_bill',
                            'tbl_bill.bills_sum_price',
                            'tbl_bill.bills_desc',
                            'tbl_bill.updated_at',
                            'tbl_user.user_id'
                        )
                ->orderBy('tbl_bill.updated_at', 'desc')
                ->get();

        $data_bill_details = DB::table('tbl_bill')
                             ->join('tbl_user',
                                    'tbl_bill.bills_customer_id',
                                    'tbl_user.user_id'
                                    )
                             ->join('tbl_product',
                                    'tbl_bill.bills_product_id',
                                    'tbl_product.product_id'
                                    )
                             ->select('tbl_bill.*','tbl_user.*','tbl_product.*')
                             ->get();

        $time_now = Carbon::now('Asia/Ho_Chi_Minh');

        return view('administrator.bill.old-bill')
                        ->with('list_bill',$data_bill)
                        ->with('time_now',$time_now)
                        ->with('detail_bill',$data_bill_details)
                        ->with('title_web',$title_web);
    }

    public function Show_Delete_Bill()
    {
        $this->AuthLogin();

        $title_web = "Đơn Hàng Đã Hủy";

        $data_bill = DB::table('tbl_bill')
                ->join(
                        'tbl_user',
                        'tbl_bill.bills_customer_id',
                        'tbl_user.user_id'
                      )
                ->select(
                            'tbl_bill.bills_bill_id',
                            'tbl_bill.bills_purchase_date',
                            'tbl_bill.bills_customer_name',
                            'tbl_bill.bills_customer_phone',
                            'tbl_bill.bills_customer_address',
                            'tbl_bill.bills_purchase_date',
                            'tbl_bill.bills_customer_request',
                            'tbl_bill.bills_status_bill',
                            'tbl_bill.bills_sum_price',
                            'tbl_bill.bills_desc',
                            'tbl_bill.updated_at as updated_at_bill',
                            'tbl_user.*'
                        )
                ->where('bills_status_bill',2) // bill đã xóa
                ->groupBy(
                            'tbl_bill.bills_bill_id',
                            'tbl_bill.bills_purchase_date',
                            'tbl_bill.bills_customer_name',
                            'tbl_bill.bills_customer_phone',
                            'tbl_bill.bills_customer_address',
                            'tbl_bill.bills_purchase_date',
                            'tbl_bill.bills_customer_request',
                            'tbl_bill.bills_status_bill',
                            'tbl_bill.bills_sum_price',
                            'tbl_bill.bills_desc',
                            'tbl_bill.updated_at',
                            'tbl_user.user_id'
                        )
                ->orderBy('tbl_bill.updated_at', 'desc')
                ->get();

        $data_bill_details = DB::table('tbl_bill')
                             ->join('tbl_user',
                                    'tbl_bill.bills_customer_id',
                                    'tbl_user.user_id'
                                    )
                             ->join('tbl_product',
                                    'tbl_bill.bills_product_id',
                                    'tbl_product.product_id'
                                    )
                             ->select('tbl_bill.*','tbl_user.*','tbl_product.*')
                             ->get();

        $time_now = Carbon::now('Asia/Ho_Chi_Minh');

        return view('administrator.bill.delete-bill')
                        ->with('list_bill',$data_bill)
                        ->with('time_now',$time_now)
                        ->with('detail_bill',$data_bill_details)
                        ->with('title_web',$title_web);
    }

    public function Order_Closing_New_Bill($id_bill)
    {
        $this->AuthLogin();

        $time_now = Carbon::now('Asia/Ho_Chi_Minh');
        $bills_desc = "Đơn đã chốt!";

        DB::table('tbl_bill')
        ->where('bills_bill_id',$id_bill)
        ->update(['bills_status_bill'=>1,'bills_desc'=>$bills_desc,'updated_at'=>$time_now]);

        return redirect()->back();
    }

    public function Delete_New_Bill($id_bill)
    {
        $this->AuthLogin();

        $bills_desc = "Đơn hàng không thể giao đến địa chỉ của bạn!";
        $time_now = Carbon::now('Asia/Ho_Chi_Minh');

        DB::table('tbl_bill')
        ->where('bills_bill_id',$id_bill)
        ->update(['bills_status_bill'=>2,'bills_desc'=>$bills_desc,'updated_at'=>$time_now]);

        return redirect()->back();
    }

    public function Delete_Bill($id_bill) // chỉ áp dụng cho bill thử nghiệm
    {
        $this->AuthLogin();

        $data_bill = DB::table('tbl_bill')
                ->select(
                            'bills_bill_id',
                            'bills_customer_id'
                        )
                ->where('bills_bill_id',$id_bill) // bill đã xóa
                ->groupBy(
                            'bills_bill_id',
                            'bills_customer_id'
                        )
                ->first();

        $data_bill_details = DB::table('tbl_bill')
        ->where('bills_bill_id',$id_bill)
        ->get();

        foreach ($data_bill_details as $key => $bill) {
            DB::table('tbl_product')
            ->where('product_id',$bill->bills_product_id)
            ->update(['product_total_purchased'=>DB::raw('product_total_purchased-'.$bill->bills_quantity)]);
        }

        // xóa bill
        DB::table('tbl_bill')
        ->where('bills_bill_id',$id_bill)
        ->delete();

        // cập nhật số lần mua hàng của khách
         DB::table('tbl_user')->where('user_id',$data_bill->bills_customer_id)->update(['user_count_order'=>DB::raw('user_count_order-1')]);

        

        return redirect()->back();
    }

    public function update_stock(Request $request)
    {
        $data_bill = array();
        $data = $request->all();

        $bills_product_id = $data['bills_product_id'];
        $bills_bill_id = $data['bills_bill_id'];
        $stt_checked = $data['stt_checked'];

        if (Session::has('admin_id')) {
            if ($stt_checked == 1) {
                DB::table('tbl_bill')->where('bills_bill_id',$bills_bill_id)->where('bills_product_id',$bills_product_id)->update(['bills_status_product'=>1]);
            }
            else{
                DB::table('tbl_bill')->where('bills_bill_id',$bills_bill_id)->where('bills_product_id',$bills_product_id)->update(['bills_status_product'=>null]);
            }
        } else {
            return Redirect::to('administrator');
        }
        
    }

    public function update_out_of_stock(Request $request)
    {
        $data_bill = array();
        $data = $request->all();

        $bills_product_id = $data['bills_product_id'];
        $bills_bill_id = $data['bills_bill_id'];
        $stt_checked = $data['stt_checked'];

        if (Session::has('admin_id')) {
            if ($stt_checked == 1) {
                DB::table('tbl_bill')->where('bills_bill_id',$bills_bill_id)->where('bills_product_id',$bills_product_id)->update(['bills_status_product'=>2]);
            }
            else{
                DB::table('tbl_bill')->where('bills_bill_id',$bills_bill_id)->where('bills_product_id',$bills_product_id)->update(['bills_status_product'=>null]);
            }
        } else {
            return Redirect::to('administrator');
        }
    }
}
