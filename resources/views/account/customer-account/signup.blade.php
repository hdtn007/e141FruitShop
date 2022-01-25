@extends('home-login-layout')
@section('content-user')
<div class="container">
	<div class="card o-hidden border-0 shadow-lg my-5">
		<div class="card-body p-0">
			<!-- Nested Row within Card Body -->
			<div class="row">
				<div class="col-lg-5 d-none d-lg-block bg-register-image" style="background-image: url('{{asset('public/media/img-banner/Logo141Fruits.png')}}');"></div>
				<div class="col-lg-7">
					<div class="p-5">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-4">Tạo tài khoản!</h1>
						</div>
						<form
						  class="user"
						  method="post"
						  id="signup_form"
						  name="signup_form" 
						  role="form" 
						  action="{{URL::to('/signup/add')}}"
						  method="post"
						  onsubmit="return validateForm_signup_user()"
						  >
                                        {{csrf_field()}}
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input 
									type="text" 
									class="form-control form-control-user" 
									id="input_fistname"
									name="input_fistname" 
									maxlength="30" 
									placeholder="Họ">
								</div>
								<div class="col-sm-6">
									<input 
									type="text" 
									class="form-control form-control-user" 
									id="input_lastname"
									name="input_lastname"
									maxlength="30" 
									placeholder="Tên">
								</div>
							</div>
							
							<div class="form-group">
								<input
								onkeypress="return event.charCode != 32"
								onfocusout="CheckInput_PhoneOrEmail(this)"
								type="text" 
								class="form-control form-control-user" 
								id="input_email_or_phone"
								name="input_email_or_phone"
								data-bs-mess-err="err_mess_form"
								placeholder="Email hoặc số điện thoại"
								>
							</div>
							
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input 
									onkeypress="return event.charCode != 32"
									onfocusout="check_null_value(this)" 
									type="password" 
									class="form-control form-control-user"
									id="input_password_signup" 
									name="input_password_signup" 
									placeholder="Mật khẩu">
								</div>
								<div class="col-sm-6">
									<input 
									id="input_re_password" 
									name="input_re_password"
									type="password"
									onkeypress="return event.charCode != 32"
									onfocusout="check_re_password(this)" 
									class="form-control form-control-user"
									maxlength="25" 
									data-mess-err="err_mess_form"
									placeholder="Nhập lại mật khẩu">
								</div>
							</div>
							<div class="form-group">
								<div class="custom-control custom-checkbox small">
									<input 
									type="checkbox"
									onclick="show_password(this)" 
									class="custom-control-input" 
									id="show_pass_signup"
									name="show_pass_signup">
									<label class="custom-control-label" for="show_pass_signup">Hiển thị mật khẩu </label>
								</div>
							</div>
							<div class="form-group row ml-3">
								 <small id="err_mess_form" class="text-danger"></small> 
							</div>
							@if(Session::has('mess_err'))
							<div class="form-group row ml-3">
								 <small class="text-danger">{{Session::get('mess_err')}}</small> 
							</div>
							@php Session::put('mess_err', null); @endphp
							@endif
							<button tyle="submit" class="btn btn-primary btn-user btn-block">
								Tạo tài khoản
							</button>
							<hr>
						</form>
							
							{{-- <a href="index.html" class="btn btn-google btn-user btn-block">
								<i class="fab fa-google fa-fw"></i> Đăng ký bằng Google
							</a>
							<a href="index.html" class="btn btn-facebook btn-user btn-block">
								<i class="fab fa-facebook-f fa-fw"></i> Đăng ký bằng Facebook
							</a> --}}
						<hr>
						<div class="text-center">
							<a class="small" href="forgot-password.html">Quên mật khẩu?</a>
						</div>
						<div class="text-center">
							<a class="small" href="{{URL::to('/login')}}">Bạn đã có tài khoản? Đăng nhập!</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection