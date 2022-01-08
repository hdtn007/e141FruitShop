@extends('home-layout')
@section('content')
<section>
	<form oninput="formatCurrency(this)">
	<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-9 padding-right">
				<div class="product-details"><!--product-details-->
					<div class="col-sm-5">
						<div class="view-product">
							<img id="idzoomimg" src="{{asset('public/media/img-product/'.$pro_pro->product_img1)}}" alt="" />
							<h3>Xem</h3>
						</div>
						<div id="similar-product" class="carousel slide" data-ride="carousel">

							<!-- Wrapper for slides -->
							<div class="carousel-inner">
								<div class="item active">
									@if($pro_pro->product_img1)
									<a class="cursor" onclick="ViewImageProduct(this)" data-bs-img-preview="idzoomimg" data-bs-img-input="{{asset('/public/media/img-product/'.$pro_pro->product_img1)}}">
										<img width="80" height="80" src="{{asset('public/media/img-product/'.$pro_pro->product_img1)}}" alt="{{$pro_pro->product_name}}">
									</a>
									@endif
									@if($pro_pro->product_img2)
									<a class="cursor" onclick="ViewImageProduct(this)" data-bs-img-preview="idzoomimg" data-bs-img-input="{{asset('/public/media/img-product/'.$pro_pro->product_img2)}}">
										<img width="80" height="80" src="{{asset('public/media/img-product/'.$pro_pro->product_img2)}}" alt="{{$pro_pro->product_name}}">
									</a>
									@endif
									@if($pro_pro->product_img3)
									<a class="cursor" onclick="ViewImageProduct(this)" data-bs-img-preview="idzoomimg" data-bs-img-input="{{asset('/public/media/img-product/'.$pro_pro->product_img3)}}">
										<img width="80" height="80" src="{{asset('public/media/img-product/'.$pro_pro->product_img3)}}" alt="{{$pro_pro->product_name}}">
									</a>
									@endif
								</div>
								@if($pro_pro->product_img4 || $pro_pro->product_img5)
								<div class="item">
									@if($pro_pro->product_img4)
									<a class="cursor" onclick="ViewImageProduct(this)" data-bs-img-preview="idzoomimg" data-bs-img-input="{{asset('/public/media/img-product/'.$pro_pro->product_img4)}}">
										<img width="80" height="80" src="{{asset('public/media/img-product/'.$pro_pro->product_img4)}}" alt="{{$pro_pro->product_name}}">
									</a>
									@endif
									@if($pro_pro->product_img5)
									<a class="cursor" onclick="ViewImageProduct(this)" data-bs-img-preview="idzoomimg" data-bs-img-input="{{asset('/public/media/img-product/'.$pro_pro->product_img5)}}">
										<img width="80" height="80" src="{{asset('public/media/img-product/'.$pro_pro->product_img5)}}" alt="{{$pro_pro->product_name}}">
									</a>
									@endif
								</div>
								@endif

							</div>

							<!-- Controls -->
							<a class="left item-control" href="#similar-product" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							</a>
							<a class="right item-control" href="#similar-product" data-slide="next">
								<i class="fa fa-angle-right"></i>
							</a>
						</div>

					</div>
					<div class="col-sm-7">
						<div class="product-information"><!--/product-information-->
							<img src="images/product-details/new.jpg" class="newarrival" alt="" />
							<h2>{{$pro_pro->product_name}}</h2>
							<p>Mã sản phẩm: {{$pro_pro->product_code}}</p>
							<img src="images/product-details/rating.png" alt="" />
							<span>
								<span>
									{{number_format($pro_pro->product_sell_price,0,",",".")}}đ
								</span>
								<label>Số lượng:</label>
								<input 
								id="input_quantity_cart" 
								onfocusout="auto_check_input_null(this)"
								type="number"
								maxlength="3" 
								max="999"
								step="any" 
								value="1" 
								min="1"
								required/>

							</span>
							<p><b>Giá gốc:</b>
								<u> {{number_format($pro_pro->product_sell_price,0,",",".")}}đ<span>/{{$pro_pro->product_number_unit <= 1 ? '': $pro_pro->product_number_unit}}{{$pro_pro->product_unit}}</span>
								</u>
							</p>
							<p><b>Xuất xứ:</b> {{$pro_pro->country_name}}</p>
							<p><b>Lượt xem:</b> {{$pro_pro->product_view}} <i class="fa fa-eye"></i></p>
							@if($get_brand)
							<p style="padding-bottom: 1rem;">
								<b>Thương hiệu:</b> {{$get_brand->brand_name}}
							</p>
							@endif
							<button type="button" class="btn btn-fefault cart">
								<i class="glyphicon glyphicon-plus"></i>
								Thêm vào giỏ
							</button>
							<button type="button" class="btn btn-fefault cart" style="background-color: #FC857E;">
								<i class="fa fa-shopping-cart"></i>
								Mua ngay
							</button>
						</div><!--/product-information-->
					</div>
				</div><!--/product-details-->

				<div class="category-tab shop-details-tab"><!--category-tab-->
					<div class="col-sm-12">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#details" data-toggle="tab">Giới thiệu</a></li>
							<li><a href="#related_products" data-toggle="tab">Sản phẩm liên quan</a></li>
							{{-- <li><a href="#reviews" data-toggle="tab">Đánh Giá (5)</a></li> --}}
						</ul>
					</div>
					<div class="tab-content">
						<div class="tab-pane fade active in" id="details" >
							<div class="col-sm-12" style="padding-right: 1rem; padding-left: 1rem;">
								<div id="shost_desc_product" class="text-truncate">
									{{$pro_pro->product_desc}}
								</div>
								<a onclick="long_text(this)" href="#full_desc_product">Xem thêm!</a>
							</div>
						</div>

						<div class="tab-pane fade" id="related_products" >
							@foreach($related_pro as $key => $re_pro)
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<a href="{{URL::to('/meta_product='.$re_pro->product_url)}}">
											<img src="{{asset('public/media/img-product/'.$re_pro->product_img1)}}" alt="{{$re_pro->product_desc}}" />
											</a>
											<h2>{{number_format($re_pro->product_sell_price,0,",",".")}}đ<span>/{{$re_pro->product_number_unit <= 1 ? '': $re_pro->product_number_unit}}{{$re_pro->product_unit}}</span>
											</h2>
											<p>{{$re_pro->product_name}}</p>
											<div class="choose1">
						                        <ul class="nav nav-pills nav-justified">
						                          <li title="Yêu thích"><center>
						                            <a class="btn btn-default product-like product-liked">
						                              <i class="fa fa-heart"></i>
						                            </a></center></li>
						                            <li title="Thêm vào giỏ hàng"><center><a class="btn btn-default add-to-cart"><i class="glyphicon glyphicon-plus"></i></a></center></li>
						                          </ul>
						                        </div>
						                        <div class="choose">
						                          <ul class="nav nav-pills nav-justified">
						                            <li title="0 lượt yêu thích" style="border-right: 0.5px solid #F9F9F9;"><a class="count-like">0 <img src="{{asset('public/media/img-icons/heart.png')}}" alt="" /></a></li>
						                            <li title="Xem chi tiết sản phẩm"><a href="{{URL::to('/meta_product='.$re_pro->product_url)}}"><i class="fa fa-plus-square"></i></a></li>
						                          </ul>
						                        </div>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>

						{{-- <div class="tab-pane fade" id="reviews" >
							<div class="col-sm-12">
								<div class="media commnets" style="padding-right: 1rem; padding-left: 1rem;">
									<div class="media-body">
										<h4 class="media-heading" style="display: flex;">
											<a href="#">
												<img class="media-object" src="{{asset('public/media/img-product/'.$pro_pro->product_img5)}}" style="width: 25px; border-radius: 30px;" alt="">
											</a>
											<span>Ngoãn Royal</span>
										</h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
										<a class="pull-left" href="#">
										<img class="media-object" src="{{asset('public/media/img-product/'.$pro_pro->product_img5)}}" style="width: 80px;" alt="">
									</a>
										<div class="blog-socials">
										</div>
									</div>
									
								</div><!--Comments-->
							</div>
						</div>
 --}}
						



					</div>
				</div><!--/category-tab-->

				<div class="recommended_items"><!--recommended_items-->
					<h2 class="title text-center">Xem nhiều hơn</h2>

					<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<div class="item active">
								@foreach($other_pro as $keys => $or_pro1)
								@if($keys < 3)
								<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<a href="{{URL::to('/meta_product='.$or_pro1->product_url)}}">
												<img src="{{asset('public/media/img-product/'.$or_pro1->product_img1)}}" alt="{{$or_pro1->product_desc}}"/>
												</a>
												<h2>
													{{number_format($or_pro1->product_sell_price,0,",",".")}}đ<span>/{{$or_pro1->product_number_unit <= 1 ? '': $or_pro1->product_number_unit}}{{$or_pro1->product_unit}}</span>
												</h2>
												<p>{{$or_pro1->product_name}}</p>
												<div>
						                          <ul class="nav nav-pills nav-justified">
						                            <li title="Yêu thích"><center>
						                              <a class="btn btn-default product-like product-liked">
						                                <i class="fa fa-heart"></i>
						                              </a></center></li>
						                            <li title="Thêm vào giỏ hàng"><center><a class="btn btn-default add-to-cart"><i class="glyphicon glyphicon-plus"></i></a></center></li>
						                          </ul>
						                        </div>
											</div>
										</div>
										 <div class="choose">
					                      <ul class="nav nav-pills nav-justified">
					                        <li title="0 lượt yêu thích" style="border-right: 0.5px solid #F9F9F9;"><a class="count-like">0 <img src="{{asset('public/media/img-icons/heart.png')}}" alt="" /></a></li>
					                        <li title="Xem chi tiết sản phẩm"><a href="{{URL::to('/meta_product='.$or_pro1->product_url)}}"><i class="fa fa-plus-square"></i>Chi tiết sản phẩm</a></li>
					                      </ul>
					                    </div>
									</div>
								</div>
								@endif
								@endforeach
							</div>
							<div class="item">	
								@foreach($other_pro as $keyss => $or_pro2)
								@if($keyss >= 3)
								<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<a href="{{URL::to('/meta_product='.$or_pro2->product_url)}}">
												<img src="{{asset('public/media/img-product/'.$or_pro2->product_img1)}}" alt="{{$or_pro2->product_desc}}"/>
												</a>
												<h2>
													{{number_format($or_pro2->product_sell_price,0,",",".")}}đ<span>/{{$or_pro2->product_number_unit <= 1 ? '': $or_pro2->product_number_unit}}{{$or_pro2->product_unit}}</span>
												</h2>
												<p>{{$or_pro2->product_name}}</p>
												<div>
						                          <ul class="nav nav-pills nav-justified">
						                            <li title="Yêu thích"><center>
						                              <a class="btn btn-default product-like product-liked">
						                                <i class="fa fa-heart"></i>
						                              </a></center></li>
						                            <li title="Thêm vào giỏ hàng"><center><a class="btn btn-default add-to-cart"><i class="glyphicon glyphicon-plus"></i></a></center></li>
						                          </ul>
						                        </div>
											</div>
										</div>
										<div class="choose">
					                      <ul class="nav nav-pills nav-justified">
					                        <li title="0 lượt yêu thích" style="border-right: 0.5px solid #F9F9F9;"><a class="count-like">0 <img src="{{asset('public/media/img-icons/heart.png')}}" alt="" /></a></li>
					                        <li title="Xem chi tiết sản phẩm"><a href="{{URL::to('/meta_product='.$or_pro2->product_url)}}"><i class="fa fa-plus-square"></i>Chi tiết sản phẩm</a></li>
					                      </ul>
					                    </div>
									</div>
								</div>
								@endif
								@endforeach
							</div>
						</div>
						<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>			
					</div>
				</div><!--/recommended_items-->	
			</div>
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Giới thiệu</h2>
					<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						<small class="text-muted px-1">Chọn nơi giao hàng:</small>
						<div class="px-1 item-delivery">
							<span style="padding-right: 1rem;">
								<img width="20" src="{{asset('public/media/img-icons/location.png')}}">Nguyễn Tri Phương, P8, Q5, Hồ Chí Minh
							</span>
							
							<a><span><b>Chọn</b></span></a>
						</div>
						<hr>
						<div class="px-1 item-delivery">
							<span>
								<img width="20" src="{{asset('public/media/img-icons/fast.png')}}">GH tiêu chuẩn
								<small class="text-muted" style="display: block; padding-left: 2rem;"> 30 - 120 phút</small>
							</span>
							
							<span><b>Miễn phí</b></span>
						</div>
						<hr>
						<small class="text-muted px-1">
							Tạm tính cho: <output class="text-muted" style="display: inline;" id="output_number_unit" name="output_number_unit" for="input_quantity_cart input_number_unit_product">{{$pro_pro->product_number_unit}}</output><span> {{$pro_pro->product_unit}}</span>
						</small>
						<div class="px-1 item-delivery">
							<input hidden type="number" id="input_sell_price_product" name="input_sell_price_product" value="{{$pro_pro->product_sell_price}}">
							<input hidden type="number" id="input_number_unit_product" name="input_number_unit_product" value="{{$pro_pro->product_number_unit}}">
							
								<b>
									<output class="total-price" name="output_provisional" id="output_provisional" for="input_quantity_cart input_sell_price_product">
									<script type="text/javascript">
										var x = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format({{$pro_pro->product_sell_price}});
										document.write(x);
									</script>
									</output>
								</b>
						</div>
						<hr>
						<div class="px-1 item-delivery">
							<span>
								<img width="35" style="border-radius: 30px" src="{{asset('public/media/img-icons/delivery.png')}}">
								<i> Thanh toán khi nhận hàng ! </i>
							</span>
						</div>
					</div><!--/category-products-->
					
					<h2>Loại sản phẩm</h2>
					<div class="panel-group category-products" id="category-product"><!--category-productsr-->
						@foreach($list_category as $key_ca_pro1 => $cate_pro1)
						<?php
						$k = 0;
						foreach ($list_category as $key_test => $test) {
							if($test->category_sub == $cate_pro1->category_id)
							{
								$k = $k+1;
							}
						}
					?>
					@if($cate_pro1->category_sub == 0)
					@if($k !=0)
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">

								<a data-toggle="collapse" data-parent="#category-product" href="#category{{$cate_pro1->category_id}}">
									<span class="badge pull-right"><i class="fa fa-plus"></i></span>
									{{$cate_pro1->category_name}}
								</a>
							</h4>
						</div>

						<div id="category{{$cate_pro1->category_id}}" class="panel-collapse collapse">
							<div class="panel-body">
								<ul>
									@foreach($list_category as $key_ca_pro2 => $cate_pro2)
									@if($cate_pro2->category_sub == $cate_pro1->category_id)
									<li><a href="{{URL::to('/store/category='.$cate_pro2->category_url)}}">{{$cate_pro2->category_name}} </a></li>
									@endif
									@endforeach
								</ul>
							</div>
						</div>
					</div>
					@else
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title"><a href="{{URL::to('/store/category='.$cate_pro1->category_url)}}">{{$cate_pro1->category_name}}</a></h4>
						</div>
					</div>
					@endif
					@endif
					<?php
					$k = 0;
				?>
				@endforeach

			</div><!--/category-products-->

					<div class="shipping text-center"><!--shipping-->
						<img src="images/home/shipping.jpg" alt="" />
					</div><!--/shipping-->

				</div>
			</div>
		</div>
	</div>
</form>
</section>
@endsection