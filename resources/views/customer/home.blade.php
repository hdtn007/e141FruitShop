@extends('home-layout')
@section('content')

<section id="slider"><!--slider-->
  <div  style="background: #FFFFFF;">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div id="slider-carousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#slider-carousel" data-slide-to="1"></li>
            <li data-target="#slider-carousel" data-slide-to="2"></li>
          </ol>

          <div class="carousel-inner">
            <div class="item active">
              <div class="col-sm-6">
                <h1><span>141</span>Fruits</h1>
                <h2 style="color: #149365;">MUA NHANH - GIAO TẬN NƠI</h2>
                <p style="color: #000000;">141Fruits cung cấp đầy đủ các sản phẩm rau củ quả, trái cây, bánh kẹo và thịt sữa nhập khẩu. Những sản phẩm, quà tặng cao cấp đến cho mọi người, giao hàng nhanh chống, thanh toán tiện lợi online !. </p>
                <a style="background-color: #149365;"  href="{{URL::to('/store/all')}}" class="btn btn-default get">Mua Ngay</a>
              </div>
              <div class="col-sm-6">
                <img src="{{asset('public/media/img-slideshow/Logo141Fruits.png')}}" class="girl img-responsive" alt="" />
              </div>
            </div>
            <div class="item">
              <div class="col-sm-6">
                <h1><span>&nbsp;</span>&nbsp;</h1>
                <h2 style="color: #CB0011;">MỪNG XUÂN - FREESHIP</h2>
                <p style="color: #000000;">Nhân dịp khai mở website mới cửa hàng 141Fruits sẽ miễn phí vận chuyện cho tất cả các đơn hàng được đặt mua trên website!. </p>
                <a style="background-color: #CB0011;" href="{{URL::to('/store/all')}}" class="btn btn-default get">Mua Ngay</a>
              </div>
              <div class="col-sm-6">
                <img src="{{asset('public/media/img-slideshow/Xuân FreeShip 2022.png')}}" class="girl img-responsive" alt="" />
                <!-- <img src="{{asset('public/media/img-home/crazy-cart.gif')}}"  class="pricing" alt="" /> -->
              </div>
            </div>

            <div class="item">
              <div class="col-sm-6">
                <h1><span>&nbsp;</span>&nbsp;</h1>
                <h2 style="color: #674528;">FREESHIP NÔNG SẢN VIỆT</h2>
                <p style="color: #000000;">Thanh Long Ruột Đỏ loại trái cây vô cùng ngon ngọt, tươi mát. Đồng hành cùng với nhà nông Việt cửa hàng 141Fruits sẽ miễn phí vận chuyển cho tất cả các đơn hàng thanh long ruột đỏ được mua tại website, fanpage hay zalo  của cửa hàng nhé, hãy cũng đồng hành cùng 141Fruits nào!.</p>
                <a style="background-color: #674528;" href="{{URL::to('/store/all')}}" class="btn btn-default get">Mua Ngay</a>
              </div>
              <div class="col-sm-6">
                <img src="{{asset('public/media/img-slideshow/Nông sản Việt - Thanh long ruột đỏ 2022.png')}}" class="girl img-responsive" alt="" />
                <!-- <img src="{{asset('public/media/img-home/crazy-cart.gif')}}"  class="pricing" alt="" /> -->
              </div>
            </div>

          </div>

          <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>
        </div>

      </div>
    </div>
  </div>
</div>
</section><!--/slider-->

<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <div class="left-sidebar">
          <h2>Loại Sản Phẩm</h2>
          <div class="panel-group category-products" id="category-product"><!--category-productsr-->
            @foreach($list_cate as $key_ca_pro1 => $cate_pro1)
            <?php
            $k = 0;
            foreach ($list_cate as $key_test => $test)
            {
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
            <h2>Xuất Xứ</h2>
            <div class="brands-name">
              <ul class="nav nav-pills nav-stacked">
                @foreach($list_country as $key_country => $count_pro)
                <li><a href="{{URL::to('/store/country='.$count_pro->country_url)}}"> <span class="pull-right">({{$count_pro->count_country}})</span>{{$count_pro->country_name}}</a></li>
                @endforeach
              </ul>
            </div>
          </div><!--/brands_products-->

          <div class="shipping text-center"><!--shipping-->
            {{-- <img src="{{asset('public/media/img-banner/banner1.jpg')}}" alt="" /> --}}
          </div><!--/shipping-->

        </div>
      </div>

      <form>
        @csrf
      <div class="col-sm-9 padding-right">

        <!--features_items-->
        <div class="features_items">
          <h2 class="title text-center">Mới & Khuyến mãi</h2>
          @foreach($list_new as $key => $new_pro)
          <div class="col-sm-4">
            <div class="product-image-wrapper">
              <div class="single-products">
                <div class="productinfo text-center">
                  <a href="{{URL::to('/meta_product='.$new_pro->product_url)}}">
                    <img class="img-lg" src="{{asset('public/media/img-product/'.$new_pro->product_img1)}}" alt="{{$new_pro->product_name}}" />
                  </a>
                  <!-- nếu có giảm giá sản phẩm thì hiển thị line-through -->
                  <h2>{{number_format($new_pro->product_sell_price,0,",",".")}}đ<span>/{{$new_pro->product_number_unit <= 1 ? '': $new_pro->product_number_unit}}{{$new_pro->product_unit}}</span></h2>
                  <p style="height: 3.5rem;" class="text-uppercase" title="{{$new_pro->product_name}}">{{$new_pro->product_name}}</p>
                  <div>
                    <ul class="nav nav-pills nav-justified">
                      <li title="Yêu thích">
                        <center>
                          @php $i = 0; @endphp
                          @foreach($all_like as $key_all_like => $pro_like)
                          @if($pro_like->like_pro_product_id == $new_pro->product_id)
                          @php $i = 1; @endphp
                          @endif
                          @endforeach
                          @if($i == 1)
                            <a data-like="1" data-count-like="count_like_{{$new_pro->product_id}}" data-id-product="{{$new_pro->product_id}}" class="btn btn-default product-like product-liked">
                               <i class="fa fa-heart"></i>
                              </a>
                          @else
                          <a data-like="0" data-count-like="count_like_{{$new_pro->product_id}}" data-id-product="{{$new_pro->product_id}}" class="btn btn-default product-like">
                               <i class="fa fa-heart"></i>
                              </a>
                          @endif
                       </center>
                      </li>
                      <li title="Thêm vào giỏ hàng">
                        <center>
                        {{-- @if(Session::has('user_id')) --}}
                          <a data-id-product="{{$new_pro->product_id}}" class="btn btn-default add-to-cart">
                            <i class="glyphicon glyphicon-plus"></i>
                          </a>
                       {{--  @else
                          <a href="{{URL::to('/login')}}" data-id-product="{{$new_pro->product_id}}" class="btn btn-default add-to-cart">
                            <i class="glyphicon glyphicon-plus"></i>
                          </a>
                        @endif --}}
                      </center>
                    </li>
                    </ul>
                  </div>
                </div>
                <img width="42" src="{{asset('public/media/img-icons/new-tag0.png')}}" class="new" alt="" />
              </div>
              <div class="choose">
                <ul class="nav nav-pills nav-justified">
                  <li title="0 lượt yêu thích" style="border-right: 0.5px solid #F9F9F9;">
                    <a class="count-like">
                      <span id="count_like_{{$new_pro->product_id}}">{{$new_pro->product_like}}</span>
                      <img src="{{asset('public/media/img-icons/heart.png')}}" alt="" />
                    </a>
                  </li>
                  <li title="Xem chi tiết sản phẩm">
                    <a href="{{URL::to('/meta_product='.$new_pro->product_url)}}"><i class="fa fa-plus-square"></i>Chi tiết sản phẩm</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          @endforeach

          @foreach($list_sale as $keys => $sale_pro)
          <div class="col-sm-4">
            <div class="product-image-wrapper">
              <div class="single-products">
                <div class="productinfo text-center">
                  <img class="img-lg" src="{{asset('public/media/img-product/'.$sale_pro->product_img1)}}" alt="" />
                  <!-- nếu có giảm giá sản phẩm thì hiển thị line-through -->
                  <h2><del>{{number_format($sale_pro->product_sell_price,0,",",".")}}đ</del><span><del>/{{$sale_pro->product_number_unit <= 1 ? '': $sale_pro->product_number_unit}}{{$sale_pro->product_unit}}</del></span></h2>
                  <p style="height: 3.5rem;">{{$sale_pro->product_name}}</p>
                  <div>
                    <ul class="nav nav-pills nav-justified">
                      <li title="Yêu thích">
                        <center>
                          @php $i2 = 0; @endphp
                          @foreach($all_like as $key_all_like => $pro_like)
                          @if($pro_like->like_pro_product_id == $sale_pro->product_id)
                          @php $i2 = 1; @endphp
                          @endif
                          @endforeach
                          @if($i2 == 1)
                            <a data-like="1" data-count-like="count_like_{{$sale_pro->product_id}}" data-id-product="{{$sale_pro->product_id}}" class="btn btn-default product-like product-liked">
                               <i class="fa fa-heart"></i>
                              </a>
                          @else
                          <a data-like="0" data-count-like="count_like_{{$sale_pro->product_id}}" data-id-product="{{$sale_pro->product_id}}" class="btn btn-default product-like">
                               <i class="fa fa-heart"></i>
                              </a>
                          @endif
                        </center>
                      </li>
                      <li title="Thêm vào giỏ hàng"><center>
                        <a data-id-product="{{$sale_pro->product_id}}" class="btn btn-default add-to-cart"><i class="glyphicon glyphicon-plus"></i></a>
                      </center></li>
                    </ul>
                  </div>
                </div>
                <div class="product-overlay">
                  <div class="overlay-content">
                    <a href="{{URL::to('/meta_product='.$sale_pro->product_url)}}">
                      <img src="{{asset('public/media/img-product/'.$sale_pro->product_img1)}}" alt="{{$sale_pro->product_name}}" />
                    </a>
                    <h2>{{number_format($sale_pro->product_sale_price,0,",",".")}}đ<span>/{{$sale_pro->product_number_unit <= 1 ? '': $sale_pro->product_number_unit}}{{$sale_pro->product_unit}}</span></h2>
                    <p style="height: 3.5rem;" title="{{$sale_pro->product_name}}">{{$sale_pro->product_name}}</p>
                    <div>
                      <ul class="nav nav-pills nav-justified">
                        <li title="Yêu thích">
                          <center> 
                            @php $i3 = 0; @endphp
                            @foreach($all_like as $key_all_like => $pro_like)
                            @if($pro_like->like_pro_product_id == $sale_pro->product_id)
                            @php $i3 = 1; @endphp
                            @endif
                            @endforeach
                            @if($i3 == 1)
                            <a data-like="1" data-count-like="count_like_{{$sale_pro->product_id}}" data-id-product="{{$sale_pro->product_id}}" class="btn btn-default product-like product-liked">
                             <i class="fa fa-heart"></i>
                           </a>
                           @else
                           <a data-like="0" data-count-like="count_like_{{$sale_pro->product_id}}" data-id-product="{{$sale_pro->product_id}}" class="btn btn-default product-like">
                             <i class="fa fa-heart"></i>
                           </a>
                           @endif
                          </center>
                        </li>
                        <li title="Thêm vào giỏ hàng"><center>
                          <a data-id-product="{{$sale_pro->product_id}}" class="btn btn-default add-to-cart">
                            <i class="glyphicon glyphicon-plus"></i>
                          </a>
                        </center></li>
                      </ul>
                    </div>

                  </div>
                </div>
                <a href="">
                  <img width="42" src="{{asset('public/media/img-icons/sale-tag1.png')}}" class="new" alt="img_sale" />
                </a>
              </div>
              <div class="choose">
                <ul class="nav nav-pills nav-justified">
                  <li title="0 lượt yêu thích" style="border-right: 0.5px solid #F9F9F9;"><a class="count-like"> <span id="count_like_{{$sale_pro->product_id}}">{{$sale_pro->product_like}}</span> <img src="{{asset('public/media/img-icons/heart.png')}}" alt="img_like" /></a>
                  </li>
                  <li title="Xem chi tiết sản phẩm">
                    <a href="{{URL::to('/meta_product='.$sale_pro->product_url)}}"><i class="fa fa-plus-square"></i>Chi tiết sản phẩm
                    </a></li>
                </ul>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <!--features_items-->

        <div class="category-tab"><!--category-tab-->
          <div class="col-sm-12">
            <ul class="nav nav-tabs sticky">
              <li class="active"><a href="#tab1" data-toggle="tab">Top mua nhiều</a></li>
              <li><a href="#tab2" data-toggle="tab">Top yêu thích</a></li>
              <li><a href="#tab3" data-toggle="tab">Cửa hàng đặt biệt</a></li>
            </ul>
          </div>
          <div class="tab-content">
            <!-- slide sản phẩm hiển thị -->
            <div class="tab-pane fade active in" id="tab1" >
              @foreach($list_sold as $keyss => $top_sold)
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <a href="{{URL::to('/meta_product='.$top_sold->product_url)}}">
                       <img class="img-sm" src="{{asset('public/media/img-product/'.$top_sold->product_img1)}}" alt="{{$top_sold->product_name}}" />
                     </a>
                     <!-- nếu có giảm giá sản phẩm thì hiển thị line-through -->
                     <h2 style="text-decoration: /*line-through;*/">{{number_format($top_sold->product_sell_price,0,",",".")}}đ<span>/{{$top_sold->product_number_unit <= 1 ? '': $top_sold->product_number_unit}}{{$top_sold->product_unit}}</span></h2>
                      <p>{{$top_sold->product_name}}</p>


                      <div class="choose1">
                        <ul class="nav nav-pills nav-justified">
                          <li title="Yêu thích">
                            <center>
                                @php $i4 = 0; @endphp
                                @foreach($all_like as $key_all_like => $pro_like)
                                @if($pro_like->like_pro_product_id == $top_sold->product_id)
                                @php $i4 = 1; @endphp
                                @endif
                                @endforeach
                                @if($i4 == 1)
                                <a data-like="1" data-count-like="count_like_{{$top_sold->product_id}}" data-id-product="{{$top_sold->product_id}}" class="btn btn-default product-like product-liked">
                                 <i class="fa fa-heart"></i>
                               </a>
                               @else
                               <a data-like="0" data-count-like="count_like_{{$top_sold->product_id}}" data-id-product="{{$top_sold->product_id}}" class="btn btn-default product-like">
                                 <i class="fa fa-heart"></i>
                               </a>
                               @endif
                            </center>
                          </li>
                            <li title="Thêm vào giỏ hàng"><center>
                              <a data-id-product="{{$top_sold->product_id}}" class="btn btn-default add-to-cart">
                                <i class="glyphicon glyphicon-plus"></i>
                              </a></center>
                            </li>
                          </ul>
                        </div>
                        <div class="choose">
                          <ul class="nav nav-pills nav-justified">
                            <li title="0 lượt yêu thích" style="border-right: 0.5px solid #F9F9F9;"><a class="count-like"><span id="count_like_{{$top_sold->product_id}}">{{$top_sold->product_like}}</span> <img src="{{asset('public/media/img-icons/heart.png')}}" alt="" /></a></li>
                            <li title="Xem chi tiết sản phẩm"><a href="{{URL::to('/meta_product='.$top_sold->product_url)}}"><i class="fa fa-plus-square"></i></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>

            <!-- slide sản phẩm hiển thị -->
            <div class="tab-pane fade" id="tab2" >
              @foreach($list_like as $keysss => $top_like)
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <a href="{{URL::to('/meta_product='.$top_like->product_url)}}">
                       <img class="img-sm" src="{{asset('public/media/img-product/'.$top_like->product_img1)}}" alt="{{$top_like->product_name}}" />
                     </a>
                     <!-- nếu có giảm giá sản phẩm thì hiển thị line-through -->
                     <h2 style="text-decoration: /*line-through;*/">{{number_format($top_like->product_sell_price,0,",",".")}}đ<span>/{{$top_like->product_number_unit <= 1 ? '': $top_like->product_number_unit}}{{$top_like->product_unit}}</span></h2>
                      <p>{{$top_like->product_name}}</p>


                      <div class="choose1">
                        <ul class="nav nav-pills nav-justified">
                          <li title="Yêu thích">
                            <center>
                              @php $i5 = 0; @endphp
                              @foreach($all_like as $key_all_like => $pro_like)
                              @if($pro_like->like_pro_product_id == $top_like->product_id)
                              @php $i5 = 1; @endphp
                              @endif
                              @endforeach
                              @if($i5 == 1)
                              <a data-like="1" data-count-like="count_like_{{$top_like->product_id}}" data-id-product="{{$top_like->product_id}}" class="btn btn-default product-like product-liked">
                               <i class="fa fa-heart"></i>
                             </a>
                             @else
                             <a data-like="0" data-count-like="count_like_{{$top_like->product_id}}" data-id-product="{{$top_like->product_id}}" class="btn btn-default product-like">
                               <i class="fa fa-heart"></i>
                             </a>
                             @endif
                            </center>
                          </li>
                            <li title="Thêm vào giỏ hàng"><center>
                              <a data-id-product="{{$top_like->product_id}}" class="btn btn-default add-to-cart"><i class="glyphicon glyphicon-plus"></i>
                              </a></center></li>
                          </ul>
                        </div>
                        <div class="choose">
                          <ul class="nav nav-pills nav-justified">
                            <li title="0 lượt yêu thích" style="border-right: 0.5px solid #F9F9F9;"><a class="count-like"><span id="count_like_{{$top_like->product_id}}">{{$top_like->product_like}}</span> <img src="{{asset('public/media/img-icons/heart.png')}}" alt="" /></a></li>
                            <li title="Xem chi tiết sản phẩm"><a href="{{URL::to('/meta_product='.$top_like->product_url)}}"><i class="fa fa-plus-square"></i></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>

            <!-- slide sản phẩm hiển thị -->
            <div class="tab-pane fade" id="tab3" >

              {{-- <div class="col-sm-3">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="{{asset('public/media/img-product/chuoi.png')}}" alt="" />
                        <!-- nếu có giảm giá sản phẩm thì hiển thị line-through -->
                        <h2 style="text-decoration: /*line-through;*/">100.000đ<span>/KG</span></h2>
                        <p>Trái cây ngon , Trái cây ngon | Trái cây ngon - Trái cây ngon</p>


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
                            <li title="Xem chi tiết sản phẩm"><a href="#"><i class="fa fa-plus-square"></i></a></li>
                          </ul>
                        </div>

                      </div>
                    </div>
                  </div>
              </div> --}}

            </div>

          </div>
        </div><!--/category-tab-->

        <div class="recommended_items"><!--recommended_items-->
          <h2 class="title text-center">Xem nhiều hơn</h2>
          <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <!-- item 1 -->
              <div class="item active">
                @foreach($list_other as $key4 => $other_pro1)
                @if($key4<3)
                <div class="col-sm-4">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <a href="{{URL::to('/meta_product='.$other_pro1->product_url)}}">
                          <img class="img-lg" src="{{asset('public/media/img-product/'.$other_pro1->product_img1)}}" alt="{{$other_pro1->product_name}}" />
                        </a>
                        <!-- nếu có giảm giá sản phẩm thì hiển thị line-through -->
                        <h2 style="text-decoration: /*line-through;*/">{{number_format($other_pro1->product_sell_price,0,",",".")}}đ<span>/{{$other_pro1->product_number_unit <= 1 ? '': $other_pro1->product_number_unit}}{{$other_pro1->product_unit}}</span></h2>
                        <p title="{{$other_pro1->product_name}}">{{$other_pro1->product_name}}</p>
                        <div>
                          <ul class="nav nav-pills nav-justified">
                            <li title="Yêu thích">
                              <center>
                                @php $i7 = 0; @endphp
                                @foreach($all_like as $key_all_like => $pro_like)
                                @if($pro_like->like_pro_product_id == $other_pro1->product_id)
                                @php $i7 = 1; @endphp
                                @endif
                                @endforeach
                                @if($i7 == 1)
                                <a data-like="1" data-count-like="count_like_{{$other_pro1->product_id}}" data-id-product="{{$other_pro1->product_id}}" class="btn btn-default product-like product-liked">
                                 <i class="fa fa-heart"></i>
                               </a>
                               @else
                               <a data-like="0" data-count-like="count_like_{{$other_pro1->product_id}}" data-id-product="{{$other_pro1->product_id}}" class="btn btn-default product-like">
                                 <i class="fa fa-heart"></i>
                               </a>
                               @endif
                              </center>
                            </li>
                            <li title="Thêm vào giỏ hàng"><center>
                              <a data-id-product="{{$other_pro1->product_id}}" class="btn btn-default add-to-cart"><i class="glyphicon glyphicon-plus"></i>
                              </a></center></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="choose">
                      <ul class="nav nav-pills nav-justified">
                        <li title="0 lượt yêu thích" style="border-right: 0.5px solid #F9F9F9;"><a class="count-like"><span id="count_like_{{$other_pro1->product_id}}">{{$other_pro1->product_like}}</span> <img src="{{asset('public/media/img-icons/heart.png')}}" alt="" /></a></li>
                        <li title="Xem chi tiết sản phẩm"><a href="{{URL::to('/meta_product='.$other_pro1->product_url)}}"><i class="fa fa-plus-square"></i>Chi tiết sản phẩm</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                @endif
                @endforeach
              </div>
              <!-- item 2 -->
              <div class="item">
                @foreach($list_other as $key5 => $other_pro2)
                @if($key5>=3)
                <div class="col-sm-4">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <a href="{{URL::to('/meta_product='.$other_pro2->product_url)}}">
                          <img class="img-lg" src="{{asset('public/media/img-product/'.$other_pro2->product_img1)}}" alt="{{$other_pro2->product_name}}" />
                        </a>
                        <!-- nếu có giảm giá sản phẩm thì hiển thị line-through -->
                        <h2 style="text-decoration: /*line-through;*/">{{number_format($other_pro2->product_sell_price,0,",",".")}}đ<span>/{{$other_pro2->product_number_unit <= 1 ? '': $other_pro2->product_number_unit}}{{$other_pro2->product_unit}}</span></h2>
                        <p title="{{$other_pro2->product_name}}">{{$other_pro2->product_name}}</p>
                        <div>
                          <ul class="nav nav-pills nav-justified">
                            <li title="Yêu thích">
                              <center>
                                @php $i8 = 0; @endphp
                                @foreach($all_like as $key_all_like => $pro_like)
                                @if($pro_like->like_pro_product_id == $other_pro2->product_id)
                                @php $i8 = 1; @endphp
                                @endif
                                @endforeach
                                @if($i8 == 1)
                                <a data-like="1" data-count-like="count_like_{{$other_pro2->product_id}}" data-id-product="{{$other_pro2->product_id}}" class="btn btn-default product-like product-liked">
                                 <i class="fa fa-heart"></i>
                               </a>
                               @else
                               <a data-like="0" data-count-like="count_like_{{$other_pro2->product_id}}" data-id-product="{{$other_pro2->product_id}}" class="btn btn-default product-like">
                                 <i class="fa fa-heart"></i>
                               </a>
                               @endif
                              </center>
                            </li>
                            <li title="Thêm vào giỏ hàng"><center>
                              <a data-id-product="{{$other_pro2->product_id}}" class="btn btn-default add-to-cart"><i class="glyphicon glyphicon-plus"></i>
                              </a></center></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="choose">
                      <ul class="nav nav-pills nav-justified">
                        <li title="0 lượt yêu thích" style="border-right: 0.5px solid #F9F9F9;"><a class="count-like"><span id="count_like_{{$other_pro2->product_id}}">{{$other_pro2->product_like}}</span> <img src="{{asset('public/media/img-icons/heart.png')}}" alt="" /></a></li>
                        <li title="Xem chi tiết sản phẩm"><a href="{{URL::to('/meta_product='.$other_pro2->product_url)}}"><i class="fa fa-plus-square"></i>Chi tiết sản phẩm</a></li>
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
      </form>

    </div>
  </div>
</section>

@endsection
