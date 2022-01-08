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
        $top_sold = DB::table('tbl_product')
                       ->where('product_status',1)
                       ->orderBy('product_count_product_sold', 'desc')
                       ->skip(0)->take(4)
                       ->get();

        $top_like = DB::table('tbl_product')
                            ->where('product_status',1)
                            ->orderBy('product_like', 'desc')
                            ->skip(0)->take(4)
                            ->get();

        $all_new = DB::table('tbl_product')
                            ->where([['product_status',1],['product_sale_status','=',0]])
                            ->orderBy('created_at', 'desc')
                            ->skip(0)->take(3)
                            ->get();

        $all_sale = DB::table('tbl_product')
                            ->where([['product_status',1],['product_sale_status','=',1]])
                            ->orderBy('created_at', 'desc')
                            ->skip(0)->take(3)
                            ->get();

        $other_product = DB::table('tbl_product')
                            ->where('product_status',1)
                            ->inRandomOrder()
                            ->limit(6)
                            ->get();

        $manager_data = view('customer.home')
                       ->with('list_new',$all_new)
                       ->with('list_sale',$all_sale)
                       ->with('list_like',$top_like)
                       ->with('list_sold',$top_sold)
                       ->with('list_other',$other_product)
                       ->with('list_country',$all_country)
                       ->with('list_category',$all_category_product);
                       
        return view('home-layout')->with('customer.home',$manager_data);
    }
}
