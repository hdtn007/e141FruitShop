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




// _______________________________________________________________________________
// _____________ ██╗   ██╗███████╗███████╗██████╗  _______________________________
// _____________ ██║   ██║██╔════╝██╔════╝██╔══██╗ _______________________________
// _____________ ██║   ██║███████╗█████╗  ██████╔╝ _______________________________
// _____________ ██║   ██║╚════██║██╔══╝  ██╔══██╗ _______________________________
// _____________ ╚██████╔╝███████║███████╗██║  ██║ _______________________________
// _____________  ╚═════╝ ╚══════╝╚══════╝╚═╝  ╚═╝ _______________________________

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index'); // TRANG CHỦ


 
// Route::get('store', 'HomeController@index'); // cửa hàng

//Route::get('/home', 'HomeController@index'); // loại sản phẩm

//Route::get('/home', 'HomeController@index'); // chi tiết sản phẩm

//Route::get('/home', 'HomeController@index'); // giỏ hàng + thanh toán

//Route::get('/home', 'HomeController@index'); // Check đơn hàng đã đặt

// Route::get('/home', 'HomeController@index'); // Đăng nhập

// Route::get('/home', 'HomeController@index'); // Tạo tài khoản

// Route::get('/home', 'HomeController@index'); // Shop Xu

// Route::get('/home', 'HomeController@index'); // Mã Khuyến Mãi

// Route::get('/home', 'HomeController@index'); // Liên Hệ

// Route::get('/home', 'HomeController@index'); // Chính Sách

// Route::get('/home', 'HomeController@index'); // Tài Khoản Cá Nhân

// Route::get('/home', 'HomeController@index'); // Danh Sách Yêu Thích

// Route::get('/home', 'HomeController@index'); // Bài Viết

// Route::get('/home', 'HomeController@index'); // Loại Bài Viết

// Route::get('/home', 'HomeController@index'); // Chi tiết bài viết

//_____________________________________________________________________
// ___________  █████╗ ██████╗ ███╗   ███╗██╗███╗   ██╗ ________________
// ___________ ██╔══██╗██╔══██╗████╗ ████║██║████╗  ██║ ________________
// ___________ ███████║██║  ██║██╔████╔██║██║██╔██╗ ██║ ________________
// ___________ ██╔══██║██║  ██║██║╚██╔╝██║██║██║╚██╗██║ ________________
// ___________ ██║  ██║██████╔╝██║ ╚═╝ ██║██║██║ ╚████║ ________________
// ___________ ╚═╝  ╚═╝╚═════╝ ╚═╝     ╚═╝╚═╝╚═╝  ╚═══╝ ________________

Route::get('/administrator', 'AdminController@index'); // ADMIN LOGIN LAUOUT
Route::get('/dashboard', 'AdminController@show_dashboard'); // ADMIN DASHBOARD LAYOUT

Route::post('/admin-dashboard', 'AdminController@login_dashboard'); // Đăng nhập admin
Route::get('/logout-dashboard', 'AdminController@logout_dashboard'); // Đăng xuất admin


// ________________________________________________________________________________________________________
// ________________________________________________________________________________________________________
// ________________________________________________________________________________________________________
// ________________________________ CATEGORY PRODUCT ( DANH MỤC SẢN PHẨM ) ________________________________
// ________________________________________________________________________________________________________



Route::get('/category-product', 'CategoryProduct@index'); // Show danh mục sản phẩm

// ---------- Thêm Danh Mục ------------
Route::post('/save-category-product', 'CategoryProduct@saveAddCategoryMain'); // Thêm danh mục chính
Route::post('/save-sub-category-product', 'CategoryProduct@saveAddCategorySub'); // Thêm danh mục con

// ---------- Sửa Danh Mục ------------
Route::get('/edit-category-status/{category_product_id}&{category_product_status}&{category_product_sub}', 'CategoryProduct@save_update_status_category'); // Sửa trạng thái hiển thị danh mục
Route::post('/save-update-category-product', 'CategoryProduct@saveEditCategory'); // Sửa danh mục

// ---------- Xóa Danh Mục ------------
Route::get('/delete-category-product/{category_product_id}&{category_product_sub}', 'CategoryProduct@delete_category_product'); // Xóa danh mục sản phẩm


// ________________________________________________________________________________________________________
// ________________________________________________________________________________________________________
// ________________________________________________________________________________________________________
// ________________________________ BRAND TAG ( THẺ THƯƠNG HIỆU SẢN PHẨM ) ________________________________
// ________________________________________________________________________________________________________


// ---------- Thêm Thương Hiệu ------------
// Route::get('/brand-tag','BrandProduct@index') // Show thương hiệu sản phẩm