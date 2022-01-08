<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB; //  thư viện database để sử dụng thao tác với database
use Session; // thư viện Session để lưu trử thông tin đăng nhập trên session 
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect; // trả về kết quả thành công hoặc thất bại
session_start(); // khi có sử dụng sesstion phải khai báo

class Cart extends Controller
{
    public function index()
    {
        $data = 1;
        $manager_data = view('customer.cart')
                        ->with('kkk',$data);
                        
        return view('home-layout')->with('customer.cart', $manager_data);
    }
}
