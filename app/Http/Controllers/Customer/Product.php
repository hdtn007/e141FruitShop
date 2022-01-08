<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB; //  thư viện database để sử dụng thao tác với database
use Session; // thư viện Session để lưu trử thông tin đăng nhập trên session 
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect; // trả về kết quả thành công hoặc thất bại
session_start(); // khi có sử dụng sesstion phải khai báo

class Product extends Controller
{
    public function index($url_product)
    {
        // category
        $all_category_product = DB::table('tbl_category_product')
                       ->where('category_status',1)
                       ->get();

        $get_brand = DB::table('tbl_product')
                     ->where([['product_url',$url_product],['product_status',1]])
                     ->join('tbl_brand',
                                 'tbl_product.product_brand_id', 
                                 '=', 
                                 'tbl_brand.brand_id')
                     ->select('tbl_brand.*')
                     ->first();

        $detail_product = DB::table('tbl_product')
                          ->join('tbl_category_product', 
                                 'tbl_product.product_category_id', 
                                 '=', 
                                 'tbl_category_product.category_id')
                          ->join('tbl_country', 
                                 'tbl_product.product_country_id', 
                                 '=', 
                                 'tbl_country.country_id')
                          ->join('tbl_admin', 
                                 'tbl_product.product_author_id', 
                                 '=', 
                                 'tbl_admin.admin_id')
                          ->select('tbl_product.*', 
                                   'tbl_admin.admin_name',
                                   'tbl_category_product.category_name',
                                   'tbl_country.country_name')
                          ->where([['product_url',$url_product],['product_status',1]])
                          ->first();

        $all_related_products = DB::table('tbl_product')
                                ->where([['product_brand_id',$detail_product->product_brand_id],['product_status',1],['product_url','<>',$url_product]])
                                ->orWhere([['product_country_id',$detail_product->product_country_id],['product_status',1],['product_url','<>',$url_product]])
                                ->inRandomOrder()
                                ->limit(4)
                                ->get();
        $all_other_products = DB::table('tbl_product')
                                ->where([['product_status',1],['product_url','<>',$url_product]])
                                ->inRandomOrder()
                                ->limit(6)
                                ->get();
        // view ++
        DB::table('tbl_product')
        ->where('product_url',$url_product)
        ->update(['product_view'=>DB::raw('product_view+1')]);

        $manager_data = view('customer.product-details')
                       ->with('pro_pro',$detail_product)
                       ->with('get_brand',$get_brand)
                       ->with('related_pro',$all_related_products)
                       ->with('other_pro',$all_other_products)
                       ->with('list_category',$all_category_product);

        return view('home-layout')->with('customer.product-details',$manager_data);
    }
}
