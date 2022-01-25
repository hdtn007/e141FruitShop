<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator; // bẫy lỗi upload file
use Illuminate\Support\Facades\Redirect; // trả về kết quả thành công hoặc thất bại
use Illuminate\Support\Str; // sử dụng random ký tự

use App\Http\Requests;
use Carbon\Carbon; // sử dụng thời gian
use DB; //  thư viện database để sử dụng thao tác với database
use Session; // thư viện Session để lưu trử thông tin đăng nhập trên session 
session_start(); // khi có sử dụng sesstion phải khai báo

class Payment extends Controller
{
    public function AuthLogin(){
        $user_id = Session::get('user_id');
        if ($user_id) {
            return Redirect::to('/home');
        } else {
            return Redirect::to('/login')->send();
        }
    } 

    public function add_payment(Request $request)
    {
        $this->AuthLogin();

        $data = array();


        $all_cart = DB::table('tbl_cart')
                  ->where('cart_customer_id',Session::get('user_id'))
                  ->get();

        $fist_cart = DB::table('tbl_cart')
                    ->where('cart_customer_id',Session::get('user_id'))
                    ->first();

        if (!$fist_cart) {
            Session::put('mess_err', 'Chưa có sản phẩm nào trong giỏ!');
            return redirect()->back();
        }

        if (($request->input_fullname_payment == "") || ($request->input_phone_payment == "") || ($request->input_address_payment =="")) {
            Session::put('mess_err', 'Vui lòng bổ sung thông tin người nhận!');
            return redirect()->back();
        }

        $arr_chr = range('A', 'Z');
        $k = array_rand($arr_chr);
        $time = strtotime(Carbon::now('Asia/Ho_Chi_Minh'));
        $now_time = Carbon::now('Asia/Ho_Chi_Minh');
                 
        $data['bills_bill_id'] = date('Y',$time).$arr_chr[array_rand($arr_chr)].date('m',$time).$arr_chr[array_rand($arr_chr)].date('d',$time).$now_time->hour.$now_time->minute.$now_time->second.$arr_chr[array_rand($arr_chr)];

        $data['bills_customer_id'] = Session::get('user_id');
        $data['bills_status_bill'] = 0; // chưa được dyệt
        $data['bills_purchase_date'] = Carbon::now('Asia/Ho_Chi_Minh'); // ngày chốt đơn
        $data['bills_customer_name']= $request->input_fullname_payment;
        $data['bills_customer_phone']= $request->input_phone_payment; 
        $data['bills_customer_address']= $request->input_address_payment;
        $data['bills_customer_request']= $request->input_cus_request_payment;

        $bills_sum_price = 0;

        // add for bill - many product
        foreach ($all_cart as $key => $val) {
            $data['bills_product_id'] = $val->cart_product_id;
            $data['bills_quantity'] = $val->cart_quantity_product;
                    
            $data['bills_sum_price'] = 0;
            $fist_pro = DB::table('tbl_product')->where('product_id',$val->cart_product_id)->first();

            if ($fist_pro->product_sale_status == 1) {
                $data['bills_price_product'] = $fist_pro->product_sale_price;
                $bills_sum_price += ($fist_pro->product_sale_price*$val->cart_quantity_product);
            } else {
                $data['bills_price_product'] = $fist_pro->product_sell_price;
                $bills_sum_price += ($fist_pro->product_sell_price*$val->cart_quantity_product);
            }

            DB::table('tbl_bill')->insert($data);      
            DB::table('tbl_product')
            ->where('product_id',$val->cart_product_id)
            ->update(['product_total_purchased'=>($fist_pro->product_total_purchased + $val->cart_quantity_product)]);
        }


         DB::table('tbl_bill')
            ->where('bills_bill_id',$data['bills_bill_id'])
            ->update(['bills_sum_price'=>$bills_sum_price]);

        // cập nhật số lần mua hàng của khách hàng
        DB::table('tbl_user')->where('user_id',Session::get('user_id'))->update(['user_count_order'=>DB::raw('user_count_order+1')]);

        // update infomation customer recieve
            
        $data_user = array();
        $fist_user = DB::table('tbl_user')
                    ->where('user_id',Session::get('user_id'))->first();


        if ($fist_user->user_name == null) {
            $data_user['user_name'] = $request->input_fullname_payment;
        }
        if ($fist_user->user_phone_recieve == null) {
            $data_user['user_phone_recieve'] = $request->input_phone_payment;
        }

        $data_user['user_address'] = $request->input_address_payment;

        DB::table('tbl_user')->where('user_id',Session::get('user_id'))->update($data_user);

        DB::table('tbl_cart')->where('cart_customer_id',Session::get('user_id'))->delete();

        Session::put('mess_success', 'Chúc mừng bạn đã đặt mua thành công!');

        return redirect()->back();
    }
}
