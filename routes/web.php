<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// TEXT COMMENT ANSI SHADOW

// _______________________________________________________________________
// _____________ ██╗   ██╗███████╗███████╗██████╗  _______________________
// _____________ ██║   ██║██╔════╝██╔════╝██╔══██╗ _______________________
// _____________ ██║   ██║███████╗█████╗  ██████╔╝ _______________________
// _____________ ██║   ██║╚════██║██╔══╝  ██╔══██╗ _______________________
// _____________ ╚██████╔╝███████║███████╗██║  ██║ _______________________
// _____________  ╚═════╝ ╚══════╝╚══════╝╚═╝  ╚═╝ _______________________

Route::get('/administrator',
		   'Admin\AdminController@index'); // ADMIN LOGIN LAUOUT

// ĐĂNG NHẬP
Route::post('/admin-dashboard',
		    'Admin\AdminController@login_dashboard'); // Đăng nhập admin


// ĐĂNG XUẤT
Route::get('/logout-dashboard',
		   'Admin\AdminController@logout_dashboard'); // Đăng xuất admin


// TẠO TÀI KHOẢN


// CẬP NHẬT TÀI KHOẢN


// XÁC MINH THÔNG TIN TÀI KHOẢN



/*
//  ██████╗██╗   ██╗███████╗████████╗ ██████╗ ███╗   ███╗███████╗██████╗ 
// ██╔════╝██║   ██║██╔════╝╚══██╔══╝██╔═══██╗████╗ ████║██╔════╝██╔══██╗
// ██║     ██║   ██║███████╗   ██║   ██║   ██║██╔████╔██║█████╗  ██████╔╝
// ██║     ██║   ██║╚════██║   ██║   ██║   ██║██║╚██╔╝██║██╔══╝  ██╔══██╗
// ╚██████╗╚██████╔╝███████║   ██║   ╚██████╔╝██║ ╚═╝ ██║███████╗██║  ██║
//  ╚═════╝ ╚═════╝ ╚══════╝   ╚═╝    ╚═════╝ ╚═╝     ╚═╝╚══════╝╚═╝  ╚═╝
                                                                      
*/

Route::get('/', 
		   'Customer\HomeController@index'); // TRANG CHỦ
Route::get('/home', 
		   'Customer\HomeController@index'); // TRANG CHỦ


 
// Route::get('store', 'Customer\HomeController@index'); // cửa hàng

//Route::get('/home', 'Customer\HomeController@index'); // loại sản phẩm

//Route::get('/home', 'Customer\HomeController@index'); // chi tiết sản phẩm

//Route::get('/home', 'Customer\HomeController@index'); // giỏ hàng + thanh toán

//Route::get('/home', 'Customer\HomeController@index'); // Check đơn hàng đã đặt

// Route::get('/home', 'Customer\HomeController@index'); // Đăng nhập

// Route::get('/home', 'Customer\HomeController@index'); // Tạo tài khoản

// Route::get('/home', 'Customer\HomeController@index'); // Shop Xu

// Route::get('/home', 'Customer\HomeController@index'); // Mã Khuyến Mãi

// Route::get('/home', 'Customer\HomeController@index'); // Liên Hệ

// Route::get('/home', 'Customer\HomeController@index'); // Chính Sách

// Route::get('/home', 'Customer\HomeController@index'); // Tài Khoản Cá Nhân

// Route::get('/home', 'Customer\HomeController@index'); // Danh Sách Yêu Thích

// Route::get('/home', 'Customer\HomeController@index'); // Bài Viết

// Route::get('/home', 'Customer\HomeController@index'); // Loại Bài Viết

// Route::get('/home', 'Customer\HomeController@index'); // Chi tiết bài viết

//_____________________________________________________________________
// ___________  █████╗ ██████╗ ███╗   ███╗██╗███╗   ██╗ ________________
// ___________ ██╔══██╗██╔══██╗████╗ ████║██║████╗  ██║ ________________
// ___________ ███████║██║  ██║██╔████╔██║██║██╔██╗ ██║ ________________
// ___________ ██╔══██║██║  ██║██║╚██╔╝██║██║██║╚██╗██║ ________________
// ___________ ██║  ██║██████╔╝██║ ╚═╝ ██║██║██║ ╚████║ ________________
// ___________ ╚═╝  ╚═╝╚═════╝ ╚═╝     ╚═╝╚═╝╚═╝  ╚═══╝ ________________


Route::get('/dashboard', 
		   'Admin\AdminController@show_dashboard'); // ADMIN DASHBOARD LAYOUT



// _______________________________________________________________________
// _______________________________________________________________________
// _______________________________________________________________________
// _____________________ CATEGORY PRODUCT ( DANH MỤC SẢN PHẨM ) __________
// _______________________________________________________________________



Route::get('/category-product', 
		   'Admin\CategoryProduct@index'); // Show danh mục sản phẩm

// ---------- Thêm Danh Mục ------------
Route::post('/save-category-product', 
		    'Admin\CategoryProduct@saveAddCategoryMain'); // Thêm danh mục chính
Route::post('/save-sub-category-product', 
		    'Admin\CategoryProduct@saveAddCategorySub'); // Thêm danh mục con

// ---------- Sửa Danh Mục ------------
Route::get('/edit-category-status/{category_product_id}&{category_product_status}&{category_product_sub}', 
		   'Admin\CategoryProduct@save_update_status_category'); // Sửa trạng thái hiển thị danh mục
Route::post('/save-update-category-product', 
		    'Admin\CategoryProduct@saveEditCategory'); // Sửa danh mục

// ---------- Xóa Danh Mục ------------
Route::get('/delete-category-product/{category_product_id}&{category_product_sub}', 
           'Admin\CategoryProduct@delete_category_product'); // Xóa danh mục sản phẩm


// ___________________________________________________________________________
// ___________________________________________________________________________
// ___________________________________________________________________________
// __________________ BRAND TAG ( THẺ THƯƠNG HIỆU SẢN PHẨM ) _________________
// ___________________________________________________________________________

Route::get('/brand-tag', 
           'Admin\BrandProduct@index'); // danh sách tag thương hiệu

// ---------- Thêm quốc gia ------------
Route::post('/add-country','Admin\BrandProduct@Add_Country');
// ---------- Thêm thương hiệu ------------
Route::post('/add-brand','Admin\BrandProduct@Add_Brand');
// ---------- Thêm nhà cung cấp ------------
Route::post('/add-supplier','Admin\BrandProduct@Add_Supplier');


// ---------- sữa quốc gia ------------
Route::post('/edit-country','Admin\BrandProduct@Edit_Country');
// ---------- sữa nhà cung cấp ------------
Route::post('/edit-supplier','Admin\BrandProduct@Edit_Supplier');

// ---------- Xóa quốc gia ------------
Route::get('/delete-country/{country_id}','Admin\BrandProduct@Delete_Country');
// ---------- Xóa thương hiệu ------------
Route::get('/delete-brand/{brand_id}&{country_id}','Admin\BrandProduct@Delete_Brand');
// ---------- Xóa nhà cung cấp ------------
Route::get('/delete-supplier/{supplier_id}','Admin\BrandProduct@Delete_Supplier');

// ___________________________________________________________________________
// ___________________________________________________________________________
// ___________________________________________________________________________
// __________________ PRODUCT ( SẢN PHẨM ) ___________________________________
// ___________________________________________________________________________

Route::get('/manage-product', 
           'Admin\Product@index'); // danh sách tất cả các sản phẩm
Route::get('/manage-product/list-out-of-date',
           'Admin\Product@list_other'); // các danh sách sản phẩm hết hạn
Route::get('/manage-product/list-inventory',
           'Admin\Product@list_other'); // các danh sách sản phẩm hết hàng
Route::get('/manage-product/detail/{code_product}', 
           'Admin\Product@detail_product'); // chi tiết sản phẩm
Route::get('/manage-product/add', 
           'Admin\Product@show_add'); // show thêm sản phẩm
Route::get('/manage-product/edit/{code_product}', 
           'Admin\Product@show_edit'); // show sửa sản phẩm



// ---------- Thêm sản phẩm ------------
Route::post('/manage-product/save-new-product', 
           'Admin\Product@save_new_product');



// ---------- Sửa sản phẩm ------------
Route::get('/manage-product/update-status/{code_product}', 
           'Admin\Product@Update_Status'); // Cập nhật trạng thái sản phẩm
Route::post('/manage-product/update/save', 
           'Admin\Product@save_update_product'); // Cập nhật thông tin sản phẩm


// ---------- Xóa sản phẩm ------------
Route::get('/manage-product/delete-img/{img_product}&{code_product}',
		   'Admin\Product@delete_img_product'); // Xóa ảnh minh họa sản phẩm