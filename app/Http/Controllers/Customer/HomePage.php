<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB; //  thư viện database để sử dụng thao tác với database
use Session; // thư viện Session để lưu trử thông tin đăng nhập trên session 
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect; // trả về kết quả thành công hoặc thất bại
session_start(); // khi có sử dụng sesstion phải khai báo

class HomePage extends Controller
{
    public function index()
    {
        // country 
        $all_country = DB::table('tbl_country')
                       ->join('tbl_product', 
                              'tbl_product.product_country_id', 
                              '=', 
                              'tbl_country.country_id'
                             )
                       ->select('tbl_country.*', 
                                DB::raw('COUNT(tbl_product.product_country_id) as count_country')
                                )
                       ->groupBy('tbl_country.country_id')
                       ->get();

        // category
        $all_category_product = DB::table('tbl_category_product')
                       ->where('category_status',1)
                       ->get();
        // product
        $all_new = DB::table('tbl_product')
                            ->where([['product_status',1],['product_sale_status','=',0]])
                            ->orderBy('created_at', 'desc')
                            ->limit(3)
                            ->get();


        $all_sale = DB::table('tbl_product')
                            ->where([['product_status',1],['product_sale_status','=',1]])
                            ->orderBy('created_at', 'desc')
                            ->limit(3)
                            ->get();

        $top_sold = DB::table('tbl_product')
                       ->where('product_status',1)
                       ->where(function ($query) use ($all_new,$all_sale) {
                                foreach ($all_new as $key3 => $val3) {
                                    $query->where('product_id', '<>', $val3->product_id);
                                }
                                foreach ($all_sale as $key4 => $val4) {
                                    $query->where('product_id', '<>', $val4->product_id);
                                }                                
                            })
                       ->orderBy('product_count_product_sold', 'desc')
                       ->limit(4)
                       ->get();

        $top_like = DB::table('tbl_product')
                            ->where('product_status',1)
                            ->where(function ($query) use ($top_sold,$all_new,$all_sale) {
                                foreach ($top_sold as $key1 => $val1) {
                                    $query->where('product_id', '<>', $val1->product_id);
                                }
                                foreach ($all_new as $key3 => $val3) {
                                    $query->where('product_id', '<>', $val3->product_id);
                                }
                                foreach ($all_sale as $key4 => $val4) {
                                    $query->where('product_id', '<>', $val4->product_id);
                                }                                
                            })
                            ->orderBy('product_like', 'desc')
                            ->limit(4)
                            ->get();

        $other_product = DB::table('tbl_product')
                            ->where('product_status',1)
                            ->where(function ($query) use ($top_sold,$top_like,$all_new,$all_sale) {
                                foreach ($top_sold as $key1 => $val1) {
                                    $query->where('product_id', '<>', $val1->product_id);
                                }
                                foreach ($top_like as $key2 => $val2) {
                                    $query->where('product_id', '<>', $val2->product_id);
                                }
                                foreach ($all_new as $key3 => $val3) {
                                    $query->where('product_id', '<>', $val3->product_id);
                                }
                                foreach ($all_sale as $key4 => $val4) {
                                    $query->where('product_id', '<>', $val4->product_id);
                                }                                
                            })
                            ->inRandomOrder()
                            ->limit(6)
                            ->get();

        $all_like = DB::table('tbl_like_product')
                            ->where('like_pro_customer_id',Session::get('user_id'))
                            ->get();

        return view('customer.home')
                       ->with('list_new',$all_new)
                       ->with('all_like',$all_like)
                       ->with('list_sale',$all_sale)
                       ->with('list_like',$top_like)
                       ->with('list_sold',$top_sold)
                       ->with('list_other',$other_product)
                       ->with('list_country',$all_country)
                       ->with('list_cate',$all_category_product);
        
    }
}
