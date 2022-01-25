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

class Product extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('administrator')->send();
        }
    }    
    
    public function index()  // all product
    {
        $this->AuthLogin();

        $title_web = "Tất cả các sản phẩm";
        $all_product = DB::table('tbl_product')
                        ->join('tbl_admin', 
                         'tbl_product.product_author_id', 
                         '=', 
                         'tbl_admin.admin_id')
                        ->select('tbl_product.*', 'tbl_admin.admin_name')
                        ->orderBy('tbl_product.product_name')
                        ->paginate(10)->withQueryString();

        $count_product = DB::table('tbl_product')
                         ->where('product_inventory')
                         ->count();
        $count_over_out_pro = DB::table('tbl_product')
                              ->where('product_inventory',0)
                              ->count();
        $count_coming_out_pro = DB::table('tbl_product')
                                ->where('product_inventory','<=',5)
                                ->where('product_inventory','>',0)
                                ->count();


        return view('administrator.manage-product')
                        ->with('list_product',$all_product)
                        ->with('count_pro',$count_product)
                        ->with('count_over_pro',$count_over_out_pro)
                        ->with('count_coming_pro',$count_coming_out_pro)
                        ->with('title_web',$title_web);
    }

    public function list_other()
    {
        $this->AuthLogin();
        return view('administrator.product.list-other-product');
    }

    public function detail_product($code_product)
    {
        $this->AuthLogin();

        $title_web = "Chi tiết sản phẩm";
        $list_product = DB::table('tbl_product')
                        ->orderBy('product_id')
                        ->get();

        $getBrand = DB::table('tbl_product')
                       ->join('tbl_brand', 
                                'tbl_brand.brand_id', 
                                '=','tbl_product.product_brand_id')
                       ->select('tbl_brand.brand_name')
                       ->where('tbl_product.product_code',$code_product)
                       ->first();

        $detail_data = DB::table('tbl_product')
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
                       ->where('tbl_product.product_code',$code_product)
                       ->first();
        return view('administrator.product.detail-product')
                        ->with('detail_pro',$detail_data)
                        ->with('list_product',$list_product)
                        ->with('get_brand',$getBrand)
                        ->with('title_web',$title_web);
    }

    public function show_add()
    {
        $this->AuthLogin();
        $title_web = "Thêm sản phẩm mới";
        $all_category_product = DB::table('tbl_category_product')->get();
        $all_country = DB::table('tbl_country')->get();
        $all_brand = DB::table('tbl_brand')->get();
        $all_unit = DB::table('tbl_unit')->get();

        return view('administrator.product.add-product')
                        ->with('list_category_product', $all_category_product)
                        ->with('list_country', $all_country)
                        ->with('list_unit', $all_unit)
                        ->with('list_brand', $all_brand)
                        ->with('title_web',$title_web);
    }

    public function show_edit($code_product)
    {
        $this->AuthLogin();
        $title_web = "Cập nhật sản phẩm";
        $all_category_product = DB::table('tbl_category_product')->get();
        $all_country = DB::table('tbl_country')->get();
        $all_brand = DB::table('tbl_brand')->get();
        $all_unit = DB::table('tbl_unit')->get();

        $list_product = DB::table('tbl_product')
                        ->orderBy('product_id')
                        ->get();

        $detail_data = DB::table('tbl_product')
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
                       ->where('product_code',$code_product)
                       ->first();

        return view('administrator.product.update-product')
                        ->with('detail_pro',$detail_data)
                        ->with('list_product',$list_product)
                        ->with('list_category_product', $all_category_product)
                        ->with('list_country', $all_country)
                        ->with('list_unit', $all_unit)
                        ->with('list_brand', $all_brand)
                        ->with('title_web',$title_web);
    }

    public function save_new_product(Request $request)
    {
        $this->AuthLogin();

        $data = array();

        $data['product_code'] = $request->input_add_code_product;
        $data['product_qrcode'] = null;
        $data['product_name'] = $request->input_add_name_product;
        $data['product_number_unit'] = $request->input_add_numberunit_product;
        $data['product_unit'] = $request->input_add_unit_product;
        $data['product_category_id'] = $request->input_add_category_product;    
        $data['product_author_id'] = Session::get('admin_id');
        $data['product_desc'] = $request->input_add_desc_product;
        $data['product_short_desc'] = $request->input_add_desc_seo_product;
        $data['product_import_price'] = $request->input_add_import_price_product;
        $data['product_sell_price'] = $request->input_add_sell_price_product;
        $data['product_keywords'] = $request->input_add_keywords_product;
        $data['product_created_at'] = Carbon::now('Asia/Ho_Chi_Minh');

        // xử lý trạng thái của sản phẩm
        if (isset($request->input_add_status_product)) {
            $data['product_status'] = 1;
        }
        else{
            $data['product_status'] = 0;
        }

        // xử lý trạng thái áp dụng khuyến mãi
        if (isset($request->saleprice_checkbox_add_product)) {
            $data['product_sale_status'] = 1;
            $data['product_sale_price'] = $request->input_add_sale_price_product;
        }
        else{
            $data['product_sale_status'] = 0;
            $data['product_sale_price'] = 0;
        }

        // xử lý ngày hết hạn chuẩn
        if ($request->outdate_status_checkbox_add_product == 1) {
            if ($request->input_add_ddmmyy_product == 2) {
                $data['product_def_expires'] = ($request->input_add_def_expires_product)*30;
            }
            else if ($request->input_add_ddmmyy_product == 3) {
                $data['product_def_expires'] = ($request->input_add_def_expires_product)*30*12;
            } else {
                $data['product_def_expires'] = ($request->input_add_def_expires_product)*1;
            }
        }
        else{
            $data['product_def_expires'] = 0;
        }        
        
        // xử lý tên sản phẩm để xuất url
        $url_text = $request->input_add_name_product;
        $url_text_new = preg_replace(array('/\p{P}/u','/\s{2,}/', '/[\t\n]/'), " ", $url_text); // bỏ các ký tự không cần thiết
        $data['product_url'] = str_replace(' ', '-', $url_text_new); // thay thế các ký tự không cần thiết

        // xử lý thông tin xuất xứ, nhãn hiệu
        $getValCoutryBrand = $request->input_add_country_product;
        $arrValCoutryBrand = explode("-", $getValCoutryBrand);

        if ($arrValCoutryBrand) {
            $data['product_country_id'] = array_shift($arrValCoutryBrand);
            $data['product_brand_id'] = array_pop($arrValCoutryBrand);
        }
        else
        {
            $data['product_country_id'] = $request->input_add_country_product;
            $data['product_brand_id'] = null;
        }

        // xử lý các hình ảnh minh họa

        $validator_img1 = Validator::make($request->all(), [
            'input_add_img1_product' => 'image|mimes:jpeg,png,jpg,gif,svg|required|max:10000'
        ]);
        $input_file_img1 = $request->file('input_add_img1_product');

        $validator_img2 = Validator::make($request->all(), [
            'input_add_img2_product' => 'image|mimes:jpeg,png,jpg,gif,svg|required|max:10000'
        ]);
        $input_file_img2 = $request->file('input_add_img2_product');

        $validator_img3 = Validator::make($request->all(), [
            'input_add_img3_product' => 'image|mimes:jpeg,png,jpg,gif,svg|required|max:10000'
        ]);
        $input_file_img3 = $request->file('input_add_img3_product');

        $validator_img4 = Validator::make($request->all(), [
            'input_add_img4_product' => 'image|mimes:jpeg,png,jpg,gif,svg|required|max:10000'
        ]);
        $input_file_img4 = $request->file('input_add_img4_product');

        $validator_img5 = Validator::make($request->all(), [
            'input_add_img5_product' => 'image|mimes:jpeg,png,jpg,gif,svg|required|max:10000'
        ]);
        $input_file_img5 = $request->file('input_add_img5_product');

        if ($input_file_img1) {
            if ($validator_img1->fails()) {
                Session::put('mess_err','Ảnh không phù hợp !');
                return redirect()->back();
            }
            elseif($input_file_img1->isValid())
            {
                $get_full_name_file1 = $input_file_img1->getClientOriginalName();
                $get_name_file1 = current(explode('.'.$input_file_img1->getClientOriginalExtension(),$get_full_name_file1));

                $new_name_img1 = 'img_'.$get_name_file1.'-TraiCay141-'.time().'.'.$input_file_img1->getClientOriginalExtension();

                $input_file_img1->move(public_path('media/img-product'), $new_name_img1);

                $data['product_img1'] = $new_name_img1;
            }
        }

        if ($input_file_img2) {
            if ($validator_img2->fails()) {
                Session::put('mess_err','Ảnh không phù hợp !');
                return redirect()->back();
            }
            elseif($input_file_img2->isValid())
            {
                $get_full_name_file2 = $input_file_img2->getClientOriginalName();
                $get_name_file2 = current(explode('.'.$input_file_img2->getClientOriginalExtension(),$get_full_name_file2));

                $new_name_img2 = 'img_'.$get_name_file2.'-TraiCay141-'.time().'.'.$input_file_img2->getClientOriginalExtension();

                $input_file_img2->move(public_path('media/img-product'), $new_name_img2);

                $data['product_img2'] = $new_name_img2;
            }
        }

        if ($input_file_img3) {
            if ($validator_img3->fails()) {
                Session::put('mess_err','Ảnh không phù hợp !');
                return redirect()->back();
            }
            elseif($input_file_img3->isValid())
            {
                $get_full_name_file3 = $input_file_img3->getClientOriginalName();
                $get_name_file3 = current(explode('.'.$input_file_img3->getClientOriginalExtension(),$get_full_name_file3));

                $new_name_img3 = 'img_'.$get_name_file3.'-TraiCay141-'.time().'.'.$input_file_img3->getClientOriginalExtension();

                $input_file_img3->move(public_path('media/img-product'), $new_name_img3);

                $data['product_img3'] = $new_name_img3;
            }
        }

        if ($input_file_img4) {
            if ($validator_img4->fails()) {
                Session::put('mess_err','Ảnh không phù hợp !');
                return redirect()->back();
            }
            elseif($input_file_img4->isValid())
            {
                $get_full_name_file4 = $input_file_img4->getClientOriginalName();
                $get_name_file4 = current(explode('.'.$input_file_img4->getClientOriginalExtension(),$get_full_name_file4));

                $new_name_img4 = 'img_'.$get_name_file4.'-TraiCay141-'.time().'.'.$input_file_img4->getClientOriginalExtension();

                $input_file_img4->move(public_path('media/img-product'), $new_name_img4);

                $data['product_img4'] = $new_name_img4;
            }
        }

        if ($input_file_img5) {
            if ($validator_img5->fails()) {
                Session::put('mess_err','Ảnh không phù hợp !');
                return redirect()->back();
            }
            elseif($input_file_img5->isValid())
            {
                $get_full_name_file5 = $input_file_img5->getClientOriginalName();
                $get_name_file5 = current(explode('.'.$input_file_img5->getClientOriginalExtension(),$get_full_name_file5));

                $new_name_img5 = 'img_'.$get_name_file5.'-TraiCay141-'.time().'.'.$input_file_img5->getClientOriginalExtension();

                $input_file_img5->move(public_path('media/img-product'), $new_name_img5);

                $data['product_img5'] = $new_name_img5;
            }
        }

        $result_code_pro = DB::table('tbl_product')
                    ->where('product_code',$request->input_add_code_product)
                    ->orWhere('product_url',str_replace(' ', '-', $url_text_new))
                    ->first();

        if (!$result_code_pro) {
            DB::table('tbl_product')->insert($data);
            Session::put('mess_success','Thêm thành công !');
        }
        else{
            Session::put('mess_err','Sản phẩm này đã tồn tại !');
        }
        
        return Redirect::to('/manage-product/add');
    }

    public function Update_Status($code_product)
    {
        $this->AuthLogin();

        $status = DB::table('tbl_product')
                  ->where('product_code',$code_product)
                  ->value('product_status');
        if ($status == 0) {
            DB::table('tbl_product')
                    ->where('product_code',$code_product)
                    ->update(['product_status'=>1]);
        }
        else
        {
            DB::table('tbl_product')
                    ->where('product_code',$code_product)
                    ->update(['product_status'=>0]);
        }

        return redirect()->back();
    }

    public function save_update_product(Request $request)
    {
        $this->AuthLogin();

        $data = array();

        $product_id = $request->input_update_id_product;

        $product_code = $request->input_update_code_product;

        $result = DB::table('tbl_product')
                  ->where('product_id',$product_id)
                  ->first();

        $data['product_code'] = $request->input_update_code_product;
        $data['product_qrcode'] = null;
        $data['product_name'] = $request->input_update_name_product;
        $data['product_number_unit'] = $request->input_update_numberunit_product;
        $data['product_unit'] = $request->input_update_unit_product;
        $data['product_category_id'] = $request->input_update_category_product;    
        $data['product_author_id'] = Session::get('admin_id');
        $data['product_desc'] = $request->input_update_desc_product;
        $data['product_short_desc'] = $request->input_update_desc_seo_product;
        $data['product_import_price'] = $request->input_update_import_price_product;
        $data['product_sell_price'] = $request->input_update_sell_price_product;
        $data['product_keywords'] = $request->input_update_keywords_product;

        // xử lý trạng thái của sản phẩm
        if (isset($request->input_update_status_product)) {
            $data['product_status'] = 1;
        }
        else{
            $data['product_status'] = 0;
        }

        // xử lý trạng thái áp dụng khuyến mãi
        if (isset($request->saleprice_checkbox_update_product)) {
            $data['product_sale_status'] = 1;
            $data['product_sale_price'] = $request->input_update_sale_price_product;
        }
        else{
            $data['product_sale_status'] = 0;
            $data['product_sale_price'] = 0;
        }

        // xử lý ngày hết hạn chuẩn
        if (isset($request->outdate_status_checkbox_update_product)) {
            if ($request->input_update_ddmmyy_product == 2) {
                $data['product_def_expires'] = ($request->input_update_def_expires_product)*30;
            }
            else if ($request->input_update_ddmmyy_product == 3) {
                $data['product_def_expires'] = ($request->input_update_def_expires_product)*30*12;
            } else {
                $data['product_def_expires'] = ($request->input_update_def_expires_product)*1;
            }
        }
        else{
            $data['product_def_expires'] = 0;
        }        
        
        // xử lý tên sản phẩm để xuất url
        $url_text = $request->input_update_name_product;
        $url_text_new = preg_replace(array('/\p{P}/u','/\s{2,}/', '/[\t\n]/'), " ", $url_text); // bỏ các ký tự không cần thiết
        $data['product_url'] = str_replace(' ', '-', $url_text_new); // thay thế các ký tự không cần thiết

        // xử lý thông tin xuất xứ, nhãn hiệu
        $getValCoutryBrand = $request->input_update_country_product;
        $arrValCoutryBrand = explode("-", $getValCoutryBrand);

        if ($arrValCoutryBrand) {
            $data['product_country_id'] = array_shift($arrValCoutryBrand);
            $data['product_brand_id'] = array_pop($arrValCoutryBrand);
        }
        else
        {
            $data['product_country_id'] = $request->input_update_country_product;
            $data['product_brand_id'] = 0;
        }

        // xử lý các hình ảnh minh họa

        $validator_img1 = Validator::make($request->all(), [
            'input_update_img1_product' => 'image|mimes:jpeg,png,jpg,gif,svg|required|max:10000'
        ]);
        $input_file_img1 = $request->file('input_update_img1_product');

        $validator_img2 = Validator::make($request->all(), [
            'input_update_img2_product' => 'image|mimes:jpeg,png,jpg,gif,svg|required|max:10000'
        ]);
        $input_file_img2 = $request->file('input_update_img2_product');

        $validator_img3 = Validator::make($request->all(), [
            'input_update_img3_product' => 'image|mimes:jpeg,png,jpg,gif,svg|required|max:10000'
        ]);
        $input_file_img3 = $request->file('input_update_img3_product');

        $validator_img4 = Validator::make($request->all(), [
            'input_update_img4_product' => 'image|mimes:jpeg,png,jpg,gif,svg|required|max:10000'
        ]);
        $input_file_img4 = $request->file('input_update_img4_product');

        $validator_img5 = Validator::make($request->all(), [
            'input_update_img5_product' => 'image|mimes:jpeg,png,jpg,gif,svg|required|max:10000'
        ]);
        $input_file_img5 = $request->file('input_update_img5_product');

        if ($input_file_img1) {
            if ($validator_img1->fails()) {
                Session::put('mess_err','Ảnh không phù hợp !');
                return redirect()->back();
            }
            elseif($input_file_img1->isValid())
            {
                $get_full_name_file1 = $input_file_img1->getClientOriginalName();
                $get_name_file1 = current(explode('.'.$input_file_img1->getClientOriginalExtension(),$get_full_name_file1));

                $new_name_img1 = 'img_'.$get_name_file1.'-TraiCay141-'.time().'.'.$input_file_img1->getClientOriginalExtension();

                $input_file_img1->move(public_path('media/img-product'), $new_name_img1);

                $data['product_img1'] = $new_name_img1;

                if (($result->product_img1) != null) {
                    $img_path1 = public_path('media/img-product/'.$result->product_img1);
                    if (File::exists($img_path1)) {
                        File::delete($img_path1);
                    }
                }
            }
        }

        if ($input_file_img2) {
            if ($validator_img2->fails()) {
                Session::put('mess_err','Ảnh không phù hợp !');
                return redirect()->back();
            }
            elseif($input_file_img2->isValid())
            {
                $get_full_name_file2 = $input_file_img2->getClientOriginalName();
                $get_name_file2 = current(explode('.'.$input_file_img2->getClientOriginalExtension(),$get_full_name_file2));

                $new_name_img2 = 'img_'.$get_name_file2.'-TraiCay141-'.time().'.'.$input_file_img2->getClientOriginalExtension();

                $input_file_img2->move(public_path('media/img-product'), $new_name_img2);

                $data['product_img2'] = $new_name_img2;

                if (($result->product_img2) != null) {
                    $img_path2 = public_path('media/img-product/'.$result->product_img2);
                    if (File::exists($img_path2)) {
                        File::delete($img_path2);
                    }
                }
            }
        }

        if ($input_file_img3) {
            if ($validator_img3->fails()) {
                Session::put('mess_err','Ảnh không phù hợp !');
                return redirect()->back();
            }
            elseif($input_file_img3->isValid())
            {
                $get_full_name_file3 = $input_file_img3->getClientOriginalName();
                $get_name_file3 = current(explode('.'.$input_file_img3->getClientOriginalExtension(),$get_full_name_file3));

                $new_name_img3 = 'img_'.$get_name_file3.'-TraiCay141-'.time().'.'.$input_file_img3->getClientOriginalExtension();

                $input_file_img3->move(public_path('media/img-product'), $new_name_img3);

                $data['product_img3'] = $new_name_img3;

                if (($result->product_img3) != null) {
                    $img_path3 = public_path('media/img-product/'.$result->product_img3);
                    if (File::exists($img_path3)) {
                        File::delete($img_path3);
                    }
                }
            }
        }

        if ($input_file_img4) {
            if ($validator_img4->fails()) {
                Session::put('mess_err','Ảnh không phù hợp !');
                return redirect()->back();
            }
            elseif($input_file_img4->isValid())
            {
                $get_full_name_file4 = $input_file_img4->getClientOriginalName();
                $get_name_file4 = current(explode('.'.$input_file_img4->getClientOriginalExtension(),$get_full_name_file4));

                $new_name_img4 = 'img_'.$get_name_file4.'-TraiCay141-'.time().'.'.$input_file_img4->getClientOriginalExtension();

                $input_file_img4->move(public_path('media/img-product'), $new_name_img4);

                $data['product_img4'] = $new_name_img4;

                if (($result->product_img4) != null) {
                    $img_path4 = public_path('media/img-product/'.$result->product_img4);
                    if (File::exists($img_path4)) {
                        File::delete($img_path4);
                    }
                }
            }
        }

        if ($input_file_img5) {
            if ($validator_img5->fails()) {
                Session::put('mess_err','Ảnh không phù hợp !');
                return redirect()->back();
            }
            elseif($input_file_img5->isValid())
            {
                $get_full_name_file5 = $input_file_img5->getClientOriginalName();
                $get_name_file5 = current(explode('.'.$input_file_img5->getClientOriginalExtension(),$get_full_name_file5));

                $new_name_img5 = 'img_'.$get_name_file5.'-TraiCay141-'.time().'.'.$input_file_img5->getClientOriginalExtension();

                $input_file_img5->move(public_path('media/img-product'), $new_name_img5);

                $data['product_img5'] = $new_name_img5;

                if (($result->product_img5) != null) {
                    $img_path5 = public_path('media/img-product/'.$result->product_img5);
                    if (File::exists($img_path5)) {
                        File::delete($img_path5);
                    }
                }
            }
        }

        $result_code_pro = DB::table('tbl_product')
                    ->where([
                        ['product_code',$request->input_update_code_product],['product_id','<>',$product_id]
                    ])
                    ->orWhere([['product_url',str_replace(' ', '-', $url_text_new)],['product_id','<>',$product_id]])
                    ->first();

        if (!$result_code_pro) {
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            Session::put('mess_success','Cập nhật thành công !');
        }
        else{
            Session::put('mess_err','Sản phẩm này đã tồn tại !');
            return redirect()->back();
        }
        
        return Redirect::to('/manage-product/edit/'.$product_code);

    }

    public function delete_img_product($img_product , $code_product)
    {
        $this->AuthLogin();

        $result = DB::table('tbl_product')
                  ->where('product_code',$code_product)
                  ->first();

        if ($img_product == 1) {
            if (($result->product_img1) != null) {
                $img_path1 = public_path('media/img-product/'.$result->product_img1);
                if (File::exists($img_path1)) {
                    File::delete($img_path1);
                }
            }

            DB::table('tbl_product')
                    ->where('product_code',$code_product)
                    ->update(['product_img1'=>null]);
        }
        elseif($img_product == 2)
        {
            if (($result->product_img2) != null) {
                $img_path2 = public_path('media/img-product/'.$result->product_img2);
                if (File::exists($img_path2)) {
                    File::delete($img_path2);
                }
            }

            DB::table('tbl_product')
                    ->where('product_code',$code_product)
                    ->update(['product_img2'=>null]);
        }
        elseif($img_product == 3)
        {
            if (($result->product_img3) != null) {
                $img_path3 = public_path('media/img-product/'.$result->product_img3);
                if (File::exists($img_path3)) {
                    File::delete($img_path3);
                }
            }

            DB::table('tbl_product')
                    ->where('product_code',$code_product)
                    ->update(['product_img3'=>null]);
        }
        elseif($img_product == 4)
        {
            if (($result->product_img4) != null) {
                $img_path4 = public_path('media/img-product/'.$result->product_img4);
                if (File::exists($img_path4)) {
                    File::delete($img_path4);
                }
            }

            DB::table('tbl_product')
                    ->where('product_code',$code_product)
                    ->update(['product_img4'=>null]);
        }
        elseif($img_product == 5)
        {
            if (($result->product_img5) != null) {
                $img_path5 = public_path('media/img-product/'.$result->product_img5);
                if (File::exists($img_path5)) {
                    File::delete($img_path5);
                }
            }

            DB::table('tbl_product')
                    ->where('product_code',$code_product)
                    ->update(['product_img5'=>null]);
        }

        Session::put('mess_success','Xóa thành công !');
        return redirect()->back();
    }


}
