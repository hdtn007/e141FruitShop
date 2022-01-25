@extends('home-login-layout')
@section('content-user')
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-image: url('{{asset('public/media/img-banner/Logo141Fruits.png')}}');"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Đăng Nhập</h1>
                                    </div>

                                    
                                    <?php
                                    if(Session::has('message_box')){
                                        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                        <strong>Error : </strong>".Session::get('message_box')."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                        </button>
                                        </div>";

                                                Session::put('message_box', null); // session message = null hiện thị duy nhất 1 lần
                                            }
                                        ?>
                                    <?php
                                        
                                        if(Session::has('mess_success')){
                                            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                            <strong>Chúc mừng : </strong>".Session::get('mess_success')."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                            </button>
                                            </div>";

                                                Session::put('mess_success', null);
                                            }
                                    ?>
                                      

                                    <form id="admin_login_form" action="{{URL::to('/home-login')}}" class="user" method="post">
                                        {{csrf_field()}}


                                        <div class="form-group">
                                            <input 
                                            type="text" 
                                            class="form-control form-control-user"
                                            id="input_username_login" 
                                            name="input_username_login" 
                                            placeholder="Nhập email hoặc số điện thoại"
                                            required>
                                        </div>
                                        <div class="form-group">
                                            <input 
                                            type="password" 
                                            class="form-control form-control-user" 
                                            name="input_password_login" 
                                            id="input_password_login" 
                                            placeholder="Mật khẩu" 
                                            required>                               
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input 
                                                type="checkbox"
                                                onclick="show_password_login(this)" 
                                                class="custom-control-input" 
                                                id="check_show_password">
                                                <label class="custom-control-label" for="check_show_password">Hiển thị mật khẩu </label>
                                            </div>
                                        </div>
                                        <a href="javascript:{}" onclick="document.getElementById('admin_login_form').submit();" class="btn btn-primary btn-user btn-block">
                                            Đăng nhập
                                        </a>
                                        <hr>
                                        {{-- <a href="javascript:{}" onclick="document.getElementById('admin_login_form').submit();" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Đăng nhập với google
                                        </a>
                                        <a href="javascript:{}" onclick="document.getElementById('admin_login_form').submit();" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Đăng nhập với facebook
                                        </a> --}}
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Quên mật khẩu?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{URL::to('/signup')}}">Tạo tài khoản!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{url()->previous()}}">
                                            <u>Quay lại!</u>
                                        </a>&nbsp;|&nbsp;
                                        <a class="small" href="{{URL::to('/home')}}">
                                            <u>Về trang chủ!</u>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection