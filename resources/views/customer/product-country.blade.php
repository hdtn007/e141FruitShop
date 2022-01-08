@extends('home-layout')
@section('content')

<br>
<section>
	<div class="container">
		<div class="breadcrumbs" style="padding-bottom: 0px;">
			<ol class="breadcrumb" style="padding-bottom: 0px;">
				<li><a href="{{URL::to('home')}}">Home</a></li>
				<li class="active">
					{{$get_country->country_name}}
					<img width="22" src="{{asset('public/media/img-icons/country/'.$get_country->country_ensign)}}">
				</li>
			</ol>
		</div>
		<div class="row" style="padding-top: 0px;">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Loại sản phẩm</h2>
					<div class="panel-group category-products" id="category-product"><!--category-productsr-->
						@foreach($list_cate as $key_ca_pro1 => $cate_pro1)
						<?php
						$k = 0;
						foreach ($list_cate as $key_test => $test) {
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
									@foreach($list_cate as $key_ca_pro2 => $cate_pro2)
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
					
					<div class="brands_products"><!--brands_products-->
						<h2>Xuất xứ</h2>
						<div class="brands-name">
							<ul class="nav nav-pills nav-stacked">
								@foreach($list_country as $key_country => $count_pro)
								<li><a href="{{URL::to('/store/country='.$count_pro->country_url)}}"> <span class="pull-right">({{$count_pro->count_country}})</span>{{$count_pro->country_name}}</a></li>
								@endforeach
							</ul>
						</div>
					</div><!--/brands_products-->

					<div class="shipping text-center"><!--shipping-->
						<img src="images/home/shipping.jpg" alt="" />
					</div><!--/shipping-->
				</div>
			</div>

			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">CÁC SẢN PHẨM TỪ {{$get_country->country_name}}</h2>
					<?php $sum_pro = 0; ?>
					@foreach($list_pro as $key_pro => $pro_pro)

					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<a href="{{URL::to('/meta_product='.$pro_pro->product_url)}}">
									<img src="{{asset('public/media/img-product/'.$pro_pro->product_img1)}}" alt="" />
									</a>
									<!-- nếu có giảm giá sản phẩm thì hiển thị line-through -->
									<h2>
										@if($pro_pro->product_sale_status)
											<del>
												{{number_format($pro_pro->product_sell_price,0,",",".")}}đ
											</del>
											<span>
												<del>
													/{{$pro_pro->product_number_unit <= 1 ? '': $pro_pro->product_number_unit}}{{$pro_pro->product_unit}}
												</del>
											</span>
										@else
											{{number_format($pro_pro->product_sell_price,0,",",".")}}đ
											<span>
												/{{$pro_pro->product_number_unit <= 1 ? '': $pro_pro->product_number_unit}}{{$pro_pro->product_unit}}
												</span>
										@endif
										</h2>
										<p style="height: 3.5rem;">{{$pro_pro->product_name}}</p>
										<div>
											<ul class="nav nav-pills nav-justified">
												<li title="Yêu thích"><center>
													<a class="btn btn-default product-like product-liked">
														<i class="fa fa-heart"></i>
													</a></center></li>
													<li title="Thêm vào giỏ hàng"><center><a class="btn btn-default add-to-cart"><i class="glyphicon glyphicon-plus"></i></a></center>
													</li>
												</ul>
											</div>
										</div>
										@if($pro_pro->product_sale_status)
										<div class="product-overlay">
											<div class="overlay-content">
												<a href="{{URL::to('/meta_product='.$pro_pro->product_url)}}">
													<img src="{{asset('public/media/img-product/'.$pro_pro->product_img1)}}" alt="{{$pro_pro->product_name}}" />
												</a>
												<h2>{{number_format($pro_pro->product_sale_price,0,",",".")}}đ<span>/{{$pro_pro->product_number_unit <= 1 ? '': $pro_pro->product_number_unit}}{{$pro_pro->product_unit}}</span></h2>
													<p title="{{$pro_pro->product_name}}">{{$pro_pro->product_name}}</p>
													<div>
														<ul class="nav nav-pills nav-justified">
															<li title="Yêu thích"><center> 
																<a class="btn btn-default product-like product-liked">
																	<i class="fa fa-heart"></i>
																</a></center>
															</li>
															<li title="Thêm vào giỏ hàng"><center><a class="btn btn-default add-to-cart"><i class="glyphicon glyphicon-plus"></i></a></center>
															</li>
														</ul>
													</div>

											</div>
										</div>
												<a href="">
													<img width="42" src="{{asset('public/media/img-icons/sale-tag1.png')}}" class="new" alt="img_sale" />
												</a>
												@endif
							</div>
							<div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li title="0 lượt yêu thích" style="border-right: 0.5px solid #F9F9F9;"><a class="count-like">{{$pro_pro->product_like}} <img src="{{asset('public/media/img-icons/heart.png')}}" alt="img_like" /></a>
									</li>
									<li title="Xem chi tiết sản phẩm">
										<a href="{{URL::to('/meta_product='.$pro_pro->product_url)}}"><i class="fa fa-plus-square"></i>Chi tiết sản phẩm
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<?php $sum_pro = $sum_pro + 1; ?>
					@endforeach
					<?php if($sum_pro == 0){ ?>
					<div class="col-sm-4">
						<span>Chưa có sản phẩm ở danh mục này!</span>
					</div>
					<?php }else{ ?>
					<ul class="pagination col-sm-12">
						<li class="active"><a href="">1</a></li>
						<li><a href="">2</a></li>
						<li><a href="">3</a></li>
						<li><a href="">&raquo;</a></li>
					</ul>
					<?php } ?>
				</div><!--features_items-->
			</div>
		</div>
	</div>
</section>
@endsection