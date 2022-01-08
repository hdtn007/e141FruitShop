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
						<form class="user">
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="exampleFirstName"
									placeholder="Họ">
								</div>
								<div class="col-sm-6">
									<input type="text" class="form-control form-control-user" id="exampleLastName"
									placeholder="Tên">
								</div>
							</div>
							<div class="form-group">
								<input type="email" class="form-control form-control-user" id="exampleInputEmail"
								placeholder="Địa chỉ Email">
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="password" class="form-control form-control-user"
									id="exampleInputPassword" placeholder="Mật khẩu">
								</div>
								<div class="col-sm-6">
									<input type="password" class="form-control form-control-user"
									id="exampleRepeatPassword" placeholder="Nhập lại mật khẩu">
								</div>
							</div>
							<a href="login.html" class="btn btn-primary btn-user btn-block">
								Tạo tài khoản
							</a>
							<hr>
							<a href="index.html" class="btn btn-google btn-user btn-block">
								<i class="fab fa-google fa-fw"></i> Đăng ký bằng Google
							</a>
							<a href="index.html" class="btn btn-facebook btn-user btn-block">
								<i class="fab fa-facebook-f fa-fw"></i> Đăng ký bằng Facebook
							</a>
						</form>
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