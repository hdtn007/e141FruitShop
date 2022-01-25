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

class CustomerController extends Controller
{
    public function AuthLogin(){
        $user_id = Session::get('user_id');
        if ($user_id) {
            return Redirect::to('home');
        } else {
            return Redirect::to('login')->send();
        }
    } 

    public function login_user()
    {   
        $back = Session::put('url_back',url()->previous());
        $current = url()->current();

        if(Session::get('user_id'))
        {
            if ($back == $current) {
                return Redirect::to('home');
            }
            elseif (Session::has('url_back')) {
                return Redirect::to('home');
            }
            else{
                return redirect()->back();
            }
        }
        else{
            if ($back == $current) {
                return Redirect::to('home');
            }
            else{
                Session::put('url_back',url()->previous());
            }
            return view('account.customer-account.login');
        }
    }

    public function signup_user()
    {
        $back = Session::put('url_back',url()->previous());
        $current = url()->current();
        if(Session::get('user_id'))
        {
            if ($back == $current) {
                return Redirect::to('home');
            }
            elseif (Session::has('url_back')) {
                return Redirect::to('home');
            }
            else{
                return redirect()->back();
            }
        }
        else{
            if ($back == $current) {
                return Redirect::to('home');
            }
            else{
                Session::put('url_back',url()->previous());
            }
            return view('account.customer-account.signup');
        }
        
    }
    public function add_new_user(Request $request)
    {
        $data = array();

        $input_username = $request->input_email_or_phone;               // mail or phone
        $input_password = $request->input_password_signup;               // password
        $input_re_password = $request->input_re_password;         // re password
        $input_fistname = $request->input_fistname;                // fistname
        $input_lastname = $request->input_lastname;                 // lastname
        $full_name = $input_fistname." ".$input_lastname;           // full_name
        

        $resultUsername = DB::table('tbl_user')->where('user_email',$input_username)->orWhere('user_phone', $input_username)->first();


        if ($input_username || $input_password || $input_re_password || ( $full_name != " ")) {

            if ($resultUsername) {
                Session::put('mess_err', 'Email hoặc số điện thoại của bạn đã được đăng ký tài khoản rồi !');
                return redirect()->back();
            }
            else{
                // xác thực email hoặc số điện thoại sau đó lưu vào database
                if (is_numeric($input_username)) { // xác nhận username là sđt hay email
                    $data['user_email'] = null;
                    $data['user_phone'] = $input_username;
                    $data['user_phone_recieve'] = $input_username;
                    $data['user_username'] = "u".$input_username;
                }
                else{
                    $data['user_email'] = $input_username;
                    $data['user_phone'] = null;

                    // username format
                    $u_text = current(explode('@',$request->input_email_or_phone));
                    $u_text_new = preg_replace(array('/\p{P}/u','/\s{2,}/', '/[\t\n]/'), " ", $u_text);
                    $data['user_username'] = str_replace(' ', '', $u_text_new)."user".mt_rand(0, 9).mt_rand(0, 9);
                }

                $data['user_name'] = $full_name;
                $data['user_password'] = md5($input_password);
                $data['user_status'] = 1; // bình thường

                DB::table('tbl_user')->insert($data);
            }
            
        }
        else {
            Session::put('mess_err', 'Lỗi nhập dữ liệu : \n Xin thử lại với các trường bị bỏ trống !');
            return redirect()->back();
        }

        Session::put('mess_success','Bạn đã đăng ký thành công, xin mời đăng nhập!');
        return Redirect::to('/login');
    }

    public function signin_user(Request $request)
    {
        $user_username = $request->input_username_login;
        $uer_password = md5($request->input_password_login);

        if (is_numeric($user_username))
        {
            $result = DB::table('tbl_user')
            ->where('user_phone',$user_username)
            ->where('user_password',$uer_password)
            ->first();
        }
        else{
            $result = DB::table('tbl_user')
            ->where('user_email','=',$user_username)
            ->where('user_password',$uer_password)
            ->first();
        }

        if($result){

            Session::put('user_id', $result->user_id );
            Session::put('user_name', $result->user_name);
            Session::put('user_username', $result->user_username);
            Session::put('user_avatar', $result->user_avatar);     
            
            return Redirect::to(Session::get('url_back'));
        } else {
            Session::put('message_box', 'Email hoặc mật khẩu chưa đúng. Vui lòng kiểm tra lại!');
            return redirect()->back();
        }
    }

    public function logout_user() // xử lý đăng xuất
    {
        Session::put('user_id', null);
        Session::put('user_name',null);
        Session::put('user_username', null);
        Session::put('user_avatar', null);
        Session::put('url_back',null);
        return redirect()->back();
    }
}
