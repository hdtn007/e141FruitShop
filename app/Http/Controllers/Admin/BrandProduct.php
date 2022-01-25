<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File; // Xóa file cần có

use Illuminate\Support\Facades\Validator; // bẫy lỗi upload file
use Illuminate\Support\Facades\Redirect; // trả về kết quả thành công hoặc thất bại
use App\Http\Requests;
use Carbon\Carbon; // sử dụng thời gian
use DB; //  thư viện database để sử dụng thao tác với database
use Session; // thư viện Session để lưu trử thông tin đăng nhập trên session 
session_start(); // khi có sử dụng sesstion phải khai báo


class BrandProduct extends Controller
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
        $this->AuthLogin();
        $title_web = "Quản lý thương hiệu, quốc gia, nhà cung cấp";
        $all_country = DB::table('tbl_country')->get();
        $all_brand = DB::table('tbl_brand')->get();
        $all_supplier = DB::table('tbl_supplier')
                        ->orderBy('supplier_code')
                        ->get();

        return view('administrator.tag-brand')
                        ->with('list_brand',$all_brand)
                        ->with('list_supplier',$all_supplier)
                        ->with('list_country',$all_country)
                        ->with('title_web',$title_web);
    }

    public function Add_Country(Request $request)
    {
        $this->AuthLogin();
        $data = array();

        $data['country_name'] = $request->add_name_country;
        $data['country_desc'] = $request->input_add_country_desc;
        $data['country_author_id'] = Session::get('admin_id');

        // xử lý xuất url
        $url_text = $request->add_name_country;
        $url_text_new = preg_replace(array('/\p{P}/u','/\s{2,}/', '/[\t\n]/'), " ", $url_text); // bỏ các ký tự không cần thiết
        $data['country_url'] = str_replace(' ', '-', $url_text_new); // thay thế các ký tự không cần thiết

        $validator_img = Validator::make($request->all(), [
            'input_add_country_img' => 'image|mimes:jpeg,png,jpg,gif,svg|required|max:6000'
        ]);

        $input_file_img = $request->file('input_add_country_img');

        if (!$input_file_img) {
            Session::put('mess_err','Chưa chọn ảnh!');
            return redirect()->back();
        }
        else
        {
            if ($validator_img->fails()) {
                Session::put('mess_err','Ảnh không phù hợp !');
                return redirect()->back();
            }
            elseif($input_file_img->isValid())
            {
                $get_full_name_file = $input_file_img->getClientOriginalName();
                $get_name_file = current(explode('.'.$input_file_img->getClientOriginalExtension(),$get_full_name_file));

                $new_name_img = 'img_141_'.$get_name_file.'_country_ensign_'.time().'.'.$input_file_img->getClientOriginalExtension();

                $input_file_img->move(public_path('media/img-icons/country'), $new_name_img);

                $data['country_ensign'] = $new_name_img;

                DB::table('tbl_country')->insert($data);
            }
        }

        Session::put('mess_success','Thêm thành công !');
        return Redirect::to('/brand-tag');
    }

    public function Add_Brand(Request $request)
    {
        $this->AuthLogin();

        $data = array();
        $id_country = $request->input_id_country;

        $data['brand_name'] = $request->add_name_brand;
        $data['brand_country_id'] = $request->input_id_country;
        $data['brand_author_id'] = Session::get('admin_id');
        // $data['brand_desc']

        DB::table('tbl_brand')->insert($data);
        DB::table('tbl_country')
        ->where('country_id',$id_country)
        ->update(['country_counttag'=>DB::raw('country_counttag+1')]);

        Session::put('mess_success','Thêm thành công !');

        return Redirect::to('/brand-tag');
    }

    public function Add_Supplier(Request $request)
    {
        $this->AuthLogin();

        $data = array();

        $sup_code_max = DB::table('tbl_supplier')->max('supplier_code');

        $data['supplier_name'] = $request->add_name_supplier;
        $data['supplier_address'] = $request->add_address_supplier;
        $data['supplier_phone'] = $request->add_phone_supplier;
        $data['supplier_email'] = $request->add_email_supplier;
        if ($sup_code_max == null) {
            $data['supplier_code'] = 1;
        }
        else{
            $data['supplier_code'] = $sup_code_max + 1;
        }

        DB::table('tbl_supplier')->insert($data);
        Session::put('mess_success','Thêm thành công !');        

        return Redirect::to('/brand-tag');
    }

    public function Edit_Country(Request $request)
    {
        $this->AuthLogin();

        $data = array();

        $country_id = $request->input_id_country;

        $data['country_name'] = $request->input_edit_name_country;
        $data['country_desc'] = $request->input_edit_country_desc;
        $data['country_author_id'] = Session::get('admin_id');
        
        // xử lý xuất url
        $url_text = $request->input_edit_name_country;
        $url_text_new = preg_replace(array('/\p{P}/u','/\s{2,}/', '/[\t\n]/'), " ", $url_text); // bỏ các ký tự không cần thiết
        $data['country_url'] = str_replace(' ', '-', $url_text_new); // thay thế các ký tự không cần thiết

        $result = DB::table('tbl_country')->where('country_id',$country_id)->first();
        $old_img = $result->country_ensign;

        $validator_img = Validator::make($request->all(), [
            'input_edit_country_img' => 'image|mimes:jpeg,png,jpg,gif,svg|required|max:6000'
        ]);

        $input_file_img = $request->file('input_edit_country_img');

        if (!$input_file_img) {
            // không thay đổi ảnh
        }
        else
        {
            if ($validator_img->fails()) {
                Session::put('mess_err','Ảnh không phù hợp !');
                return redirect()->back();
            }
            elseif($input_file_img->isValid())
            {
                $get_full_name_file = $input_file_img->getClientOriginalName();
                $get_name_file = current(explode('.',$get_full_name_file));

                $new_name_img = 'img_141_'.$get_name_file.'_country_ensign_'.time().'.'.$input_file_img->getClientOriginalExtension();

                $input_file_img->move(public_path('media/img-icons/country'), $new_name_img);

                $data['country_ensign'] = $new_name_img;

                if ($old_img != 'vietnam.png') {
                    $image_path = public_path('media/img-icons/country/'.$old_img);
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
            }
        }

        DB::table('tbl_country')->where('country_id',$country_id)->update($data);
        Session::put('mess_success','Cập nhật thành công !');
        return Redirect::to('/brand-tag');
    }

    public function Edit_Supplier(Request $request)
    {
        $this->AuthLogin();

        $data = array();

        $supplier_id = $request->input_id_supplier_edit;

        $data['supplier_name'] = $request->edit_name_supplier;
        $data['supplier_address'] = $request->edit_address_supplier;
        $data['supplier_phone'] = $request->edit_phone_supplier;
        $data['supplier_email'] = $request->edit_email_supplier;

        DB::table('tbl_supplier')->where('supplier_id',$supplier_id)->update($data);
        Session::put('mess_success','Cập nhật thành công !');
        return Redirect::to('/brand-tag');
    }

    public function Delete_Country($country_id)
    {
        $this->AuthLogin();

        $result = DB::table('tbl_country')
                    ->where('country_id',$country_id)
                    ->first();

        $old_img = $result->country_ensign;

        if (Session::has('admin_id')) {
            DB::table('tbl_country')
            ->where('country_id',$country_id)
            ->delete();

            DB::table('tbl_brand')
            ->where('brand_country_id',$country_id)
            ->delete();

            if ($old_img != null) {
                $img_path = public_path('media/img-icons/country/'.$old_img);
                if (File::exists($img_path)) {
                    File::delete($img_path);
                }
            }
        }
        else{
            return redirect()->back();
        }
        Session::put('mess_success','Đã xóa !');         
        return Redirect::to('/brand-tag');
    }

    public function Delete_Brand($brand_id, $country_id)
    {
        $this->AuthLogin();

        if (Session::has('admin_id')) {
            DB::table('tbl_brand')
            ->where('brand_id',$brand_id)
            ->delete();
            DB::table('tbl_country')
            ->where('country_id',$country_id)
            ->update(['country_counttag'=>DB::raw('country_counttag-1')]);
        }
        else{
            return redirect()->back();
        }
        Session::put('mess_success','Đã xóa !');         
        return Redirect::to('/brand-tag');
    }

    public function Delete_Supplier($supplier_id)
    {
        $this->AuthLogin();
        
        $all_supplier = DB::table('tbl_supplier')->get();

        $result = DB::table('tbl_supplier')->where('supplier_id',$supplier_id)->first();
        $code_del = $result->supplier_code;

        if (Session::has('admin_id')) {

            DB::table('tbl_supplier')
            ->where('supplier_id',$supplier_id)
            ->delete();

            foreach($all_supplier as $key => $sup)
            {
                if($sup->supplier_code > $code_del)
                {
                    DB::table('tbl_supplier')
                    ->where('supplier_id',$sup->supplier_id)
                    ->update(['supplier_code'=>DB::raw('supplier_code-1')]);
                }
            }
        }
        else{
            Session::put('mess_err','Lỗi khi xóa !'); 
            return redirect()->back();
        }
        Session::put('mess_success','Đã xóa !');         
        return Redirect::to('/brand-tag');
    }
}
