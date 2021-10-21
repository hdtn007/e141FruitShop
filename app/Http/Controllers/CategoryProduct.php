<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB; //  thư viện database để sử dụng thao tác với database
use Session; // thư viện Session để lưu trử thông tin đăng nhập trên session 
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect; // trả về kết quả thành công hoặc thất bại
session_start(); // khi có sử dụng sesstion phải khai báo

class CategoryProduct extends Controller
{
    public function index() // hiển thị danh sách danh mục
    {
        // truy vấn danh mục chính
        $all_category_product = DB::table('tbl_category_product')->get(); // lấy dữ liệu tất cả danh mục 
        $manager_category_product = view('administrator.category-product')->with('list_category_product',$all_category_product); // gán biến $all_catagory_product vào tên list_category_product để gọi ra giao diện

       return view('admin-layout')->with('administrator.category-product',$manager_category_product); 
    }

    public function saveAddCategoryMain(Request $request) // lưu danh mục chính
    {
        $data = array();

        $data['category_name'] = $request->category_product_name; // request từ name html gán vào csdl
        $data['category_desc'] = $request->category_product_desc;
        $data['category_author'] = Session::get('admin_name');

        DB::table('tbl_category_product')->insert($data); // câu truy vấn insert

        Session::put('message_box_add_category','Bạn vừa thêm thành công danh mục '.$request->category_product_name );
        return Redirect::to('category-product');

        // echo '<pre>'; // kiểm tra in dữ liệu
        // print_r($data);
        // echo '</pre>';

    }

    public function saveAddCategorySub(Request $request) // lưu danh mục con
    {
        $data = array();

        $data['category_sub'] = $request->sub_category_product_sub;
        $data['category_name'] = $request->sub_category_product_name;
        $data['category_author'] = Session::get('admin_name');

        DB::table('tbl_category_product')->insert($data); // câu truy vấn insert

        Session::put('message_box_add_category','Bạn vừa thêm thành công danh mục con '.$request->category_product_name );
        return Redirect::to('category-product');

    }

    public function save_update_status_category($category_product_id , $category_product_status , $category_product_sub) // lưu danh mục con
    {
        if($category_product_status == 0)
        {
            if($category_product_sub == 0){
                DB::table('tbl_category_product')
                    ->where('category_id',$category_product_id)
                    ->update(['category_status'=>1]);
            }else{
                DB::table('tbl_category_product')
                    ->where('category_id',$category_product_sub)
                    ->update(['category_status'=>1]);

                DB::table('tbl_category_product')
                    ->where('category_id',$category_product_id)
                    ->update(['category_status'=>1]);
            }
            
        }
        elseif ($category_product_status == 1) {
            DB::table('tbl_category_product')
                ->where('category_id',$category_product_id)
                ->update(['category_status'=>0]);

            DB::table('tbl_category_product')
                ->where('category_sub',$category_product_id)
                ->update(['category_status'=>0]);
        }
        else{
            Session::put('message_box_update_category_err','lỗi nghiêm trọng khi thay đổi trạng thái ! ');
             return Redirect::to('category-product');
        }
        
        return Redirect::to('category-product');
    }

    public function saveEditCategory(Request $request)
    {
        $data = array();
        $category_product_id = $request->edit_category_product_id;

        $data['category_name'] = $request->edit_category_product_name; // request từ name html gán vào csdl
        $data['category_desc'] = $request->edit_category_product_desc;
        $data['category_author'] = Session::get('admin_name');

        DB::table('tbl_category_product')
            ->where('category_id',$category_product_id)
            ->update($data); // câu truy vấn update

        Session::put('message_box_add_category','Bạn vừa cập nhật thành công!');
        return Redirect::to('category-product');

    }

    public function delete_category_product($category_product_id , $category_product_sub)
    {
        $countProduct = 0; // Biến thống kê tổng số sản phẩm thuộc id này và id con
        // nếu tổng số sản phẩm còn tồn tại lớn hơn 0 thì không được xóa danh mục
        // tạm thời cho tổng số luôn bằng 0

        if($category_product_sub == 0) // đối với thuộc danh mục mẹ
        {
            // code truy xuất tổng số sản phẩm ở đây

            if ($countProduct == 0) {
                DB::table('tbl_category_product')
                    ->where('category_id',$category_product_id)
                    ->delete();

                DB::table('tbl_category_product')
                    ->where('category_sub',$category_product_id)
                    ->delete();

                Session::put('message_box_update_category_err','Bạn vừa xóa danh mục thành công !');
            }
            else
            {
                Session::put('message_box_delete_category_warning','Danh mục không thể xóa do còn chứa '.$countProduct.' sản phẩm !!');
            }
            
        }
        else{ // đối với không thuộc danh mục mẹ

                // code truy xuất tổng số sản phẩm ở đây

                if ($countProduct == 0) {
                    DB::table('tbl_category_product')
                        ->where('category_id',$category_product_id)
                        ->delete();

                    Session::put('message_box_update_category_err','Bạn vừa xóa danh mục thành công !');
                }
                else
                {
                    Session::put('message_box_delete_category_warning','Danh mục không thể xóa do còn chứa '.$countProduct.' sản phẩm !!');
                }
            
        }

        return Redirect::to('category-product');
    }



}