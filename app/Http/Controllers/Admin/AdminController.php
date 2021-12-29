<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB; //  thư viện database để sử dụng thao tác với database
use Session; // thư viện Session để lưu trử thông tin đăng nhập trên session 
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect; // trả về kết quả thành công hoặc thất bại
session_start(); // khi có sử dụng sesstion phải khai báo


class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('administrator')->send();
        }
    }    

    public function index()
    {
        return view('admin-login-layout');
    }

    public function show_dashboard()
    {
        $this->AuthLogin();
        return view('administrator.admin-dashboard');
    }

    public function login_dashboard(Request $request) // xử lý đăng nhập admin
    {

        $admin_email = $request->email; // lấy request từ name admin_email từ input
        $admin_password = md5($request->password); // mã hóa qua mb5

        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first(); // truy vấn  Kiểm tra email, password từ batabase ('bảng tble_admin') -> 1 giá trị
        if($result){

            Session::put('admin_name', $result->admin_name);
            Session::put('admin_avarta', $result->admin_avarta);
            Session::put('admin_id', $result->admin_id);
            return Redirect::to('/dashboard');
            
        } else {
            Session::put('message_box', 'Email hoặc mật khẩu chưa đúng. Vui lòng kiểm tra lại!');
            return Redirect::to('/administrator');
        }
    }

    public function logout_dashboard() // xử lý đăng xuất admin
    {
        $this->AuthLogin();
        Session::put('admin_name', null);
        Session::put('admin_avarta', null);
        Session::put('admin_id', null);
        return Redirect::to('/administrator');
    }

}

