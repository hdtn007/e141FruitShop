<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator; // bẫy lỗi upload file
use Illuminate\Support\Facades\Redirect; // trả về kết quả thành công hoặc thất bại
use App\Http\Requests;
use Carbon\Carbon; // sử dụng thời gian
use DB; //  thư viện database để sử dụng thao tác với database
use Session; // thư viện Session để lưu trử thông tin đăng nhập trên session 
session_start(); // khi có sử dụng sesstion phải khai báo

class Unit extends Controller
{

    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('administrator')->send();
        }
    }  

    public function show_unit_tool_page()
    {
        $this->AuthLogin();
        $title_web = "Cài đặt đơn vị tính khối lượng cho sản phẩm";
        $data = DB::table('tbl_unit')
                ->orderBy('unit_name')
                ->get();
        return view('administrator.tool.manage-unit')
                        ->with('list_unit',$data)
                        ->with('title_web',$title_web);
    }

    public function add_unit(Request $request)
    {
        $this->AuthLogin();

        $data = array();

        $data['unit_name'] = $request->add_unit_name;
        if($request->add_unit_name == "")
        {
            Session::put('mess_err', 'Không bỏ trống tên đơn vị!');
        }
        else{
            if (DB::table('tbl_unit')->insert($data)) {
                Session::put('mess_success', 'Thêm thành công!');
            } else {
                Session::put('mess_err', 'Thêm không thành công!');
            }
        }
        
        return redirect()->back();

        
        
    }

    public function delete_unit($unit_id)
    {
        $this->AuthLogin();
        DB::table('tbl_unit')->where('unit_id',$unit_id)->delete();
        Session::put('mess_err', 'Đã xóa!');
        return redirect()->back();
    }
}
