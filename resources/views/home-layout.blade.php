<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>TraiCay141 - Nhà phân phối trái cây, trái cây nhập khẩu cao cấp | Hệ thống cửa hàng Trái Cây 141 Tp.HCM </title>
    <link href="{{asset('public/customer/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/customer/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/customer/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/customer/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/customer/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/customer/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/customer/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{asset('public/media/img-icons/insurance.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
 		<script src="{{asset('public/customer/js/ajax/jquery.min.js')}}">
    </script>
    <!-- sweetalert2-->
    <script src="{{asset('public/admin/vendor/sweetalert2/sweetalert2.all.min.js')}}"></script>
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li title="131-133 Nguyễn Tri Phương, Phường 8, Quận 5, Thành Phố Hồ Chí Minh"><a target="_blank" href="{{('https://goo.gl/maps/PAF3JRGzghrSXPAL9')}}"><i class="fa fa-map-marker"></i> HỒ CHÍ MINH</a></li>
								<li><a href="{{('tel:0938996976')}}"><i class="fa fa-phone"></i> 093 899 69 76</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li title="Fanpage Trái Cây 141 - 141Fruits"><a target="_blank" href="{{('https://www.facebook.com/TraiCayTuoi141')}}"><i class="fa fa-facebook"></i>  </a></li>
                <li title="Youtube Trái Cây 141 - 141Fruits"><a target="_blank" href="{{('https://www.facebook.com/TraiCayTuoi141')}}"><i class="fa fa-youtube"></i>  </a></li>
                <li title="Instagram Trái Cây 141 - 141Fruits"><a target="_blank" href="{{('https://www.facebook.com/TraiCayTuoi141')}}"><i class="fa fa-instagram"></i>  </a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->

		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{url('/home')}}"><img src="{{asset('public/media/img-home/Logo2.png')}}" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							{{-- <div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">Tiếng Việt
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">English</a></li>
								</ul>
							</div> --}}
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								@if(Session::has('user_id'))
								<li><a href="#"><i class="fa fa-heart"></i> Yêu thích</a></li>
								
								<li><a href="#" style="color:#CA6229;"><img src="{{asset('public/media/img-icons/money.png')}}" alt="" /> 0 xu</a></li>
								
								<li><a href="{{URL::to('/cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>

								<li class="dropdown" title="{{Session::get('user_name')}}">
									<a href="#">
										<img src="{{asset('public/media/img-avatar/customer/'.Session::get('user_avatar'))}}" alt="avt" /> 
											<script type="text/javascript">
												var fullname = "{{Session::get('user_name')}}";
												var firstName = fullname.split(' ').slice(0, -1).join(' ');
												var lastName = fullname.split(' ').slice(-1).join(' ');

												document.write(lastName);
												if(lastName == "" || lastName == null || lastName == " ")
												{
													document.write(firstName);
												}
											</script>
									</a>
									<ul style="background: #fff; width: 100%; padding: 2px 2px 2px 2px;" role="menu" class="sub-menu">
										<a href="{{URL::to('/logout-user')}}">Đăng Xuất</a>
									</ul>
								</li>
								
								@endif
								@if(!Session::has('user_id'))
								<li>
									<a href="{{URL::to('/login')}}">
										<i class="fa fa-lock"></i> Đăng nhập
									</a>
								</li>
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{URL::to('/home')}}" class="{{ Request::segment(1) === 'home' ? 'active' : null }}"><i class="fa fa-home" aria-hidden="true"></i> Trang Chủ</a></li>
								<li class="dropdown {{ Request::segment(1) === 'store' ? 'shadow-sm' : null }}"><a href="{{URL::to('/store/all')}}"><i class="fa fa-shopping-cart"></i> Cửa Hàng <i class="fa fa-angle-down"></i></a>
                    <ul role="menu" class="sub-menu">
                        <li><a class="{{ Request::segment(2) === 'all_fruits' ? 'active' : null }}" href="{{URL::to('/store/all_fruits')}}">141Fruit</a></li>
                        <li><a class="{{ Request::segment(2) === 'all_foods' ? 'active' : null }}" href="{{URL::to('/store/all_foods')}}">141Food</a></li>
                    </ul>
                 </li>
								<li class="dropdown hide {{ Request::segment(1) === 'facts' ? 'shadow-sm' : null }}"><a href="{{URL::to('/facts')}}"><i class="fa fa-coffee"></i> Mẹo</a></li>
								{{-- <li class="dropdown {{ Request::segment(1) === 'contact' ? 'shadow-sm' : null }}"><a href="{{URL::to('/contact')}}"><i class="fa fa-comments"></i> Mua Trực Tiếp</a></li> --}}
								<li class="dropdown"><a target="_blank" href="https://www.facebook.com/messages/t/401243830685345"><i class="fa fa-comments"></i> Mua Trực Tiếp</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

  <!-- start Nav -->
  @yield('content')
  <!-- end nav -->

	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>141</span>Fruits</h2>
							<p>Là ứng dụng mua sắm Online chính thức của cửa hàng Trái Cây 141. </p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a>
									<div class="iframe-img">
										<img src="{{asset('public/media/img-icons/hand.png')}}" alt="" />
									</div>
								</a>
								<p>Sản phẩm sạch dành cho sức khỏe</p>
							</div>
						</div>

						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a>
									<div class="iframe-img">
										<img src="{{asset('public/media/img-icons/shopping-online.png')}}" alt="" />
									</div>
								</a>
								<p>Mua hàng mọi lúc mọi nơi</p>
							</div>
						</div>

						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a>
									<div class="iframe-img">
										<img src="{{asset('public/media/img-icons/fast.png')}}" alt="" />
									</div>
								</a>
								<p>Giao hàng trên toàn quốc</p>
							</div>
						</div>

						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a>
									<div class="iframe-img">
										<img src="{{asset('public/media/img-icons/health-insurance.png')}}" alt="" />
									</div>
								</a>
								<p>An toàn cho sức khỏe</p>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
                <a href="http://online.gov.vn/CustomWebsiteDisplay.aspx?DocId=42575" >
                  <img src="{{asset('public/media/img-home/logo-5570.png')}}" alt="Đã thông báo BCT" >
                </a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Dịch vụ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Hổ trợ giao hàng</a></li>
								<li><a href="#">Hổ trợ mua hàng online</a></li>
								<li><a href="#">Mua tại cửa hàng</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Về 141Fruits</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Giới thiệu</a></li>
                <li><a href="#">Chỉ Đường</a></li>
								<li><a href="#">Các kênh chính thức</a></li>
                <li><a href="#">Liên hệ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Hổ trợ khách hàng</h2>
							<ul class="nav nav-pills nav-stacked">
                <li><a href="#">Chương trình thành viên</a></li>
								<li><a href="#">Chính sách mua hàng</a></li>
								<li><a href="#">Chính sách về sản phẩm</a></li>
								<li><a href="#">Chính sách giao hàng</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Nổi bật</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Khuyến mãi</a></li>
								<li><a href="#">Mẹo</a></li>
								<li><a href="#">Tích xu</a></li>
								<li><a href="#">Mã giảm giá</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>Tải app về điện thoại</h2>
              <a href="#">
                <div class="downloadapp">
                  <img src="{{asset('public/media/img-icons/mobileapp1.png')}}" alt="" />
                  <img src="{{asset('public/media/img-icons/mobileapp2.png')}}" alt="" />
                </div>
              </a>
              <p>Ứng dụng mua hàng trên điện thoại đang được phát triển bởi đội ngủ của chúng tôi các bạn vui lòng chờ đợi nhé!...</p>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright &copy; <script type="text/javascript">var year = new Date();document.write(year.getFullYear());</script> 141Fruits </p>
					<p class="pull-right">By <span><a target="_blank" href="https://www.facebook.com/MrroyalVietnam">MRROYAL</a></span></p>
				</div>
			</div>
		</div>

	</footer><!--/Footer-->



	<script src="{{asset('public/customer/js/jquery.js')}}"></script>
	<script src="{{asset('public/customer/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/customer/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/customer/js/price-range.js')}}"></script>
	<script src="{{asset('public/customer/js/jquery.prettyPhoto.js')}}"></script>
	<script src="{{asset('public/customer/js/main.js')}}"></script>

{{-- DÙNG CHO ADD TO CART DANH SÁCH MẶT HÀNG --}}
	<script type="text/javascript">
		$(document).ready(function() {
			$('.add-to-cart').click(function(){
				var product_id = $(this).data('id-product');
				var cart_quantity_product = 1;
				var _token = $('input[name="_token"]').val();

				if (true)
				{
					$.ajax({
						url: '{{url('/cart/add')}}',
						method: 'POST',
						data:{
							cart_product_id:product_id,
							cart_quantity_product:cart_quantity_product,
							_token:_token,
						},
						success:function(data){
							<?php
								if (Session::has('user_id')) {
							?>
								Swal.fire(
									'Thành công',
									'Sản phẩm đã được thêm vào giỏ hàng!',
									'success'
									);
							<?php 

								} else {
							?>
									 window.location.href = "{{url('login')}}";
							<?php
								}
							?>
							}
					});
				}
			});
		});
	</script>

{{-- DÙNG CHO ADD TO CART CHI TIẾT SẢN PHẨM --}}
	<script type="text/javascript">
		$(document).ready(function() {
			$('.add-to-cart-detail').click(function(){
				var product_id = $(this).data('id-product');
				var cart_quantity_product = $('#input_quantity_cart').val();
				var _token = $('input[name="_token"]').val();

				if (true)
				{
					$.ajax({
						url: '{{url('/cart/add')}}',
						method: 'POST',
						data:{
							cart_product_id:product_id,
							cart_quantity_product:cart_quantity_product,
							_token:_token,
						},
						success:function(data){
							<?php
								if (Session::has('user_id')) {
							?>
								Swal.fire(
									'Thành công',
									'Sản phẩm đã được thêm vào giỏ hàng!',
									'success'
									);
							<?php 

								} else {
							?>
									 window.location.href = "{{url('login')}}";
							<?php
								}
							?>
						}
					});
				}
			});
		});
	</script>

	{{-- DÙNG CHO ADD TO LIKE LIST ( SẢN PHẨM YÊU THÍCH) --}}
	<script type="text/javascript">
		$(document).ready(function() {
			$('.product-like').click(function(){
				var product_id = $(this).data('id-product');
				var stt_like = $(this).data('like');
				var _token = $('input[name="_token"]').val();

				var get_like_count = $(this).data('count-like');
				var count = document.getElementById(get_like_count);

				if (stt_like === 0)
				{
					$(this).addClass('btn btn-default product-like product-liked');
					count.innerHTML = parseInt(count.innerHTML) + 1;
					$(this).data('like', 1);

				}
				else {
					$(this).removeClass('product-liked')
					count.innerHTML = parseInt(count.innerHTML) - 1;
					$(this).data('like', 0);
				}

				if (stt_like === 0)
				{
					$.ajax({
						url: '{{url('/product-like/add')}}',
						method: 'POST',
						data:{
							product_id:product_id,
							_token:_token,
						},
						success:function(result){
							<?php
							if (Session::has('user_id')) {
								?>

								const Toast = Swal.mixin({
									toast: true,
									position: 'top-end',
									showConfirmButton: false,
									timer: 1500,
									timerProgressBar: true,
									didOpen: (toast) => {
										// toast.addEventListener('mouseenter', Swal.stopTimer)
										toast.addEventListener('mouseleave', Swal.resumeTimer)
									}
								})

								Toast.fire({
									icon: 'success',
									title: 'Đã thêm vào yêu thích'
								})

								<?php 

							} else {
								?>
								window.location.href = "{{url('login')}}";
								<?php
							}
							?>
						}
					});
				}
				else{
							$.ajax({
								url: '{{url('/product-like/remove')}}',
								method: 'POST',
								data:{
									product_id:product_id,
									_token:_token,
								},
								success:function(result){
									<?php
									if (Session::has('user_id')) {
										?>

										const Toast = Swal.mixin({
											toast: true,
											position: 'top-end',
											showConfirmButton: false,
											timer: 1500,
											timerProgressBar: true,
											didOpen: (toast) => {
												// toast.addEventListener('mouseenter', Swal.stopTimer)
												toast.addEventListener('mouseleave', Swal.resumeTimer)
											}
										})

										Toast.fire({
											icon: 'error',
											title: 'Đã bỏ thích sản phẩm'
										})

										<?php 

									} else {
										?>
										window.location.href = "{{url('login')}}";
										<?php
									}
									?>
								}
							});
				}
			});
		});
	</script>

</body>
</html>
