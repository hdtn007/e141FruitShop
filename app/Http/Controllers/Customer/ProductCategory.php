<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator; // bẫy lỗi upload file
use Illuminate\Support\Facades\Redirect; // trả về kết quả thành công hoặc thất bại
use App\Http\Requests;
use Carbon\Carbon; // sử dụng thời gian
use DB; //  thư viện database để sử dụng thao tác với database
use Session; // thư viện Session để lưu trử thông tin đăng nhập trên session 
session_start(); // khi có sử dụng sesstion phải khai báo

class ProductCategory extends Controller
{
    public function index($category_url)
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

        // get search
        $get_category = DB::table('tbl_category_product')
                        ->where('category_url',$category_url)
                        ->first();

        // category
        $all_category_product = DB::table('tbl_category_product')
                                ->get();

        $get_category_main = DB::table('tbl_category_product')
                             ->where('category_id',$get_category->category_sub)
                             ->first();

        // product
        if ($get_category->category_sub == 0) {
            // all main product
            $all_product = DB::table('tbl_product')
                        ->join('tbl_category_product', 
                              'tbl_product.product_category_id', 
                              '=', 
                              'tbl_category_product.category_id'
                             )                        
                        ->where([['tbl_category_product.category_sub',$get_category->category_id],['tbl_product.product_status',1]])
                        ->orWhere([['tbl_category_product.category_id',$get_category->category_id],['tbl_product.product_status',1]])
                        ->select('tbl_product.*'
                                )
                        ->groupBy('tbl_product.product_id')
                        ->get();
        }
        else
        {
            // all sub product
            $all_product = DB::table('tbl_product')
                        ->join('tbl_category_product', 
                              'tbl_product.product_category_id', 
                              '=', 
                              'tbl_category_product.category_id'
                             )                        
                        ->where([['tbl_category_product.category_id',$get_category->category_id],['tbl_product.product_status',1]])
                        ->select('tbl_product.*'
                                )
                        ->groupBy('tbl_product.product_id')
                        ->get();
        }
        


        $manager_data = view('customer.product-category')
                        ->with('get_cate',$get_category)
                        ->with('get_cate_main',$get_category_main)
                        ->with('list_cate',$all_category_product)
                        ->with('list_country',$all_country)
                        ->with('list_pro',$all_product);
        return view('home-layout')->with('customer.product-category',$manager_data);
    }

    public function show_by_country($country_url)
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

        // get search
        $get_country = DB::table('tbl_country')
                        ->where('country_url',$country_url)
                        ->first();

        // category
        $all_category_product = DB::table('tbl_category_product')
                                ->get();

        // product
        $all_product = DB::table('tbl_product')
                        ->join('tbl_country', 
                              'tbl_product.product_country_id', 
                              '=', 
                              'tbl_country.country_id'
                             )
                        ->where([['tbl_product.product_country_id',$get_country->country_id],['tbl_product.product_status',1]])
                        ->groupBy('tbl_product.product_id')
                        ->get();
        


        $manager_data = view('customer.product-country')
                        ->with('get_country',$get_country)
                        ->with('list_cate',$all_category_product)
                        ->with('list_country',$all_country)
                        ->with('list_pro',$all_product);
        return view('home-layout')->with('customer.product-country',$manager_data);
    }

    public function show_all_fruits()
    {
        // all country 
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

        // all category
        $all_category_product = DB::table('tbl_category_product')
                                ->get();

        // product
        $all_product = DB::table('tbl_product')
                        ->where([['tbl_product.product_status',1],['tbl_product.product_category_id',40]])
                        ->orWhere([['tbl_product.product_status',1],['tbl_product.product_category_id',41]])
                        ->orWhere([['tbl_product.product_status',1],['tbl_product.product_category_id',42]])
                        ->get();
        


        $manager_data = view('customer.store')
                        ->with('list_cate',$all_category_product)
                        ->with('list_country',$all_country)
                        ->with('list_pro',$all_product);
        return view('home-layout')->with('customer.store',$manager_data);
    }

    public function show_all_foods()
    {
        // all country 
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

        // all category
        $all_category_product = DB::table('tbl_category_product')
                                ->get();

        // product
        $all_product = DB::table('tbl_product')
                        ->where([['tbl_product.product_status',1],['tbl_product.product_category_id','<>',40],['tbl_product.product_category_id','<>',41],['tbl_product.product_category_id','<>',42]])
                        ->get();
        


        $manager_data = view('customer.store')
                        ->with('list_cate',$all_category_product)
                        ->with('list_country',$all_country)
                        ->with('list_pro',$all_product);
        return view('home-layout')->with('customer.store',$manager_data);
    }

    public function show_all_product()
    {
        // all country 
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

        // all category
        $all_category_product = DB::table('tbl_category_product')
                                ->get();

        // product
        $all_product = DB::table('tbl_product')
                        ->where('tbl_product.product_status',1)
                        ->get();
        


        $manager_data = view('customer.store')
                        ->with('list_cate',$all_category_product)
                        ->with('list_country',$all_country)
                        ->with('list_pro',$all_product);
        return view('home-layout')->with('customer.store',$manager_data);
    }
}
