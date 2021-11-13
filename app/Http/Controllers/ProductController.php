<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB; //  thư viện database để sử dụng thao tác với database
use Session; // thư viện Session để lưu trử thông tin đăng nhập trên session 
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect; // trả về kết quả thành công hoặc thất bại
session_start(); // khi có sử dụng sesstion phải khai báo

class ProductController extends Controller
{
    public function index()
    {
        return view('administrator.manage-product');
    }

    public function list_other()
    {
        return view('administrator.product.list-other-product');
    }

    public function detail_product()
    {
        return view('administrator.product.detail-product');
    }

    public function show_add()
    {
        return view('administrator.product.add-product');
    }
}
