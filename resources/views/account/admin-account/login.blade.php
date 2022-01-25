@extends('admin-login-layout')
@section('content-admin')

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
                                        <h1 class="h4 text-gray-900 mb-4">Đăng Nhập Admin</h1>
                                    </div>

                                    
                                       <?php
                                            $message = Session::get('message_box');
                                            if($message){
                                                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                      <strong>Error : </strong>".$message."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                      </button>
                                    </div>";

                                                Session::put('message_box', null); // session message = null hiện thị duy nhất 1 lần
                                            }
                                         ?>
                                      

                                    <form id="admin_login_form" action="{{URL::to('/admin-dashboard')}}" class="user" method="post">
                                        {{csrf_field()}}


                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email" 
                                                id="email" aria-describedby="emailHelp"
                                                placeholder="Nhập email..." pattern=".+@*.com" size="50" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" 
                                                id="password" placeholder="Mật khẩu"required="">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Nhớ mật khẩu </label>
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
                                        <a class="small" href="register.html">Tạo tài khoản!</a>
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