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
    public function AuthLogin(){
        $user_id = Session::get('user_id');
        if ($user_id) {
            return Redirect::to('/home');
        } else {
            return Redirect::to('/login')->send();
        }
    }  
    
    public function index(Request $request)
    {
        // $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        $this->AuthLogin();

        //--seo
        $meta_desc = "Giỏ hàng của bạn"; 
        $meta_keywords = "Giỏ hàng Ajax";
        $meta_title = "Giỏ hàng Ajax";
        $url_canonical = $request->url();
        //--seo

        $data_user = DB::table('tbl_user')
                ->where('user_id',Session::get('user_id'))
                ->first();

        $data_cart = DB::table('tbl_cart')
                     ->join('tbl_product', 
                                       'tbl_cart.cart_product_id', 
                                       '=', 
                                       'tbl_product.product_id')
                     ->join('tbl_category_product', 
                                       'tbl_category_product.category_id', 
                                       '=', 
                                       'tbl_product.product_category_id')
                     ->select('tbl_cart.*','tbl_product.*','tbl_category_product.category_name')
                     ->where('cart_customer_id', Session::get('user_id'))
                     ->orderBy('tbl_cart.created_at', 'desc')
                     ->get();


        return view('customer.cart')
                        ->with('list_cart',$data_cart)
                        ->with('pro_user',$data_user)
                        ->with('meta_desc',$meta_desc)
                        ->with('meta_keywords',$meta_keywords)
                        ->with('meta_title',$meta_title)
                        ->with('url_canonical',$url_canonical);
    }

    public function buynow_product2cart(Request $request)
    {
        $this->AuthLogin();

        $data = array();

        $check_cart = DB::table('tbl_cart')
                      ->where([
                                ['cart_product_id',$request->input_cart_product_id],
                                ['cart_customer_id',Session::get('user_id')]
                             ])
                      ->first();


        $data['cart_product_id'] = $request->input_cart_product_id;
        $data['cart_quantity_product'] = $request->input_quantity_cart;
        $data['cart_customer_id'] = Session::get('user_id');

        if ($check_cart) {

            DB::table('tbl_cart')
                      ->where([
                                ['cart_product_id',$request->input_cart_product_id],
                                ['cart_customer_id',Session::get('user_id')]
                             ])
                      ->update(['cart_quantity_product'=>DB::raw('cart_quantity_product+'.$request->input_quantity_cart)]);
        } else {
            DB::table('tbl_cart')->insert($data);
        }

        return Redirect::to('/cart');
    }

    public function add_product2cart(Request $request)
    {   
        $data_cart = array();
        $data = $request->all();

        $check_cart = DB::table('tbl_cart')
                      ->where([
                                ['cart_product_id',$data['cart_product_id']],
                                ['cart_customer_id',Session::get('user_id')]
                             ])
                      ->first();
        if (Session::has('user_id')) {
            
            if($check_cart)
            {
                if ($data['cart_quantity_product']) {
                    DB::table('tbl_cart')
                      ->where([
                                ['cart_product_id',$data['cart_product_id']],
                                ['cart_customer_id',Session::get('user_id')]
                             ])
                      ->update(['cart_quantity_product'=>DB::raw('cart_quantity_product+'.$data['cart_quantity_product'])]);
                }
                else{
                    DB::table('tbl_cart')
                      ->where([
                                ['cart_product_id',$data['cart_product_id']],
                                ['cart_customer_id',Session::get('user_id')]
                             ])
                      ->update(['cart_quantity_product'=>DB::raw('cart_quantity_product+1')]);
                }
            }
            else
            {
                $data_cart['cart_customer_id'] = Session::get('user_id');
                $data_cart['cart_product_id'] = $data['cart_product_id'];
                $data_cart['token_cart'] = $data['_token'];

                if ($data['cart_quantity_product']) {
                    $data_cart['cart_quantity_product'] = $data['cart_quantity_product'];
                }
                else{
                    $data_cart['cart_quantity_product'] = 1;
                }
                DB::table('tbl_cart')->insert($data_cart);
            }
            
        }
        else{
            return Redirect::to('login');
        }
    }

    public function delete_product2cart($cart_id)
    {
        $this->AuthLogin();

        if (Session::has('user_id')) {
            DB::table('tbl_cart')
            ->where([['cart_id',$cart_id],
                     ['cart_customer_id',Session::get('user_id')]
                    ])
            ->delete();
        }
        return redirect()->back();
        
    }

    public function up_product2cart($cart_id)
    {
        $this->AuthLogin();

        if (Session::has('user_id')) {
            DB::table('tbl_cart')
            ->where([['cart_id',$cart_id],
                     ['cart_customer_id',Session::get('user_id')]
                    ])
            ->update(['cart_quantity_product'=>DB::raw('cart_quantity_product+1')]);
            
        }
        return redirect()->back();        
    }

    public function down_product2cart($cart_id)
    {
        $this->AuthLogin();

        $quantyti = DB::table('tbl_cart')
            ->where([['cart_id',$cart_id],
                     ['cart_customer_id',Session::get('user_id')]
                    ])
            ->value('cart_quantity_product');

        if (Session::has('user_id')) {
            if ($quantyti > 1) {
                DB::table('tbl_cart')
                ->where([['cart_id',$cart_id],
                   ['cart_customer_id',Session::get('user_id')]
               ])
                ->update(['cart_quantity_product'=>DB::raw('cart_quantity_product-1')]);
            }
            
        }
        return redirect()->back();        
    }

    public function update_quatity_product2cart(Request $request)
    {
        $this->AuthLogin();

        $data = array();

        $cart_id = $request->input_cart_id_quantity_product_update;
        $quantyti = $request->input_cart_quantity_product_update;

        if ($quantyti >= 1) {
            DB::table('tbl_cart')
            ->where([
                        ['cart_id',$cart_id],
                        ['cart_customer_id',Session::get('user_id')]
                    ])
            ->update(['cart_quantity_product'=>$quantyti]);
        }
        else{
            DB::table('tbl_cart')
            ->where([
                        ['cart_id',$cart_id],
                        ['cart_customer_id',Session::get('user_id')]
                    ])
            ->update(['cart_quantity_product'=>1]);
        }
        return redirect()->back();        
    }
}
