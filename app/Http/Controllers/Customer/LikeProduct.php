<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB; //  thư viện database để sử dụng thao tác với database
use Session; // thư viện Session để lưu trử thông tin đăng nhập trên session 
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect; // trả về kết quả thành công hoặc thất bại
session_start(); // khi có sử dụng sesstion phải khai báo

class LikeProduct extends Controller
{
    public function show_product_like()
    {
        // code...
    }

    public function save_like_product(Request $request)
    {   
        
        if (Session::has('user_id')) {
            $data_like = array();
            $data = $request->all();
            $data_like['like_pro_customer_id'] = Session::get('user_id');
            $data_like['like_pro_product_id'] = $data['product_id'];

            $result = DB::table('tbl_like_product')
                      ->where([['like_pro_product_id',$data['product_id']],['like_pro_customer_id',Session::get('user_id')]])
                      ->first();

            if (!$result) {
                DB::table('tbl_like_product')->insert($data_like);
                DB::table('tbl_product')
                ->where('product_id',$data['product_id'])
                ->update(['product_like'=>DB::raw('product_like+1')]);
            }
            
        }
        else{
            return Redirect::to('login');
        }
    }

    public function remove_like_product(Request $request)
    {
        if (Session::has('user_id')) {
            $data = $request->all();
            $like_pro_product_id = $data['product_id'];

            DB::table('tbl_like_product')->where('like_pro_product_id',$like_pro_product_id)->delete();
            DB::table('tbl_product')
            ->where('product_id',$data['product_id'])
            ->update(['product_like'=>DB::raw('product_like-1')]);
        }
        else{
            return Redirect::to('login');
        }
    }
}
