<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB; //  thư viện database để sử dụng thao tác với database
use Session; // thư viện Session để lưu trử thông tin đăng nhập trên session 
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect; // trả về kết quả thành công hoặc thất bại
session_start(); // khi có sử dụng sesstion phải khai báo


class BrandProduct extends Controller
{
    public function index()
    {
        // $all_brand = DB::table('tbl_category_product')->get();
        // $manager_brand = view('administrator.category-product')->with('list_category_product',$all_brand);

       // return view('admin-layout')->with('administrator.tag-brand',$manager_brand); 
        return view('administrator.tag-brand'); 
    }

    public function Add_Country()
    {
        // $all_brand = DB::table('tbl_category_product')->get();
        // $manager_brand = view('administrator.category-product')->with('list_category_product',$all_brand);

       // return view('admin-layout')->with('administrator.tag-brand',$manager_brand); 
        return view('administrator.tag-brand'); 
    }

    public function Add_Brand()
    {
        // $all_brand = DB::table('tbl_category_product')->get();
        // $manager_brand = view('administrator.category-product')->with('list_category_product',$all_brand);

       // return view('admin-layout')->with('administrator.tag-brand',$manager_brand); 
        return view('administrator.tag-brand'); 
    }

    public function Edit_Country()
    {
        // $all_brand = DB::table('tbl_category_product')->get();
        // $manager_brand = view('administrator.category-product')->with('list_category_product',$all_brand);

       // return view('admin-layout')->with('administrator.tag-brand',$manager_brand); 
        return view('administrator.tag-brand'); 
    }

    public function Edit_Brand()
    {
        // $all_brand = DB::table('tbl_category_product')->get();
        // $manager_brand = view('administrator.category-product')->with('list_category_product',$all_brand);

       // return view('admin-layout')->with('administrator.tag-brand',$manager_brand); 
        return view('administrator.tag-brand'); 
    }
}
