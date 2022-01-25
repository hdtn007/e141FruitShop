@extends('home-layout')
@section('content')
{{-- messenger box --}}
<div class="mess__box">
	<?php
	$mess_err = Session::get('mess_err');
	$mess_success = Session::get('mess_success');

	if($mess_err) {

	?>
	<script>
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000,
			timerProgressBar: true,
			didOpen: (toast) => {
				toast.addEventListener('mouseenter', Swal.stopTimer)
				toast.addEventListener('mouseleave', Swal.resumeTimer)
			}
		})

		Toast.fire({
			icon: 'error',
			title: '{{$mess_err}}'
		})
	</script>
	<?php
}
Session::put('mess_err', null);

if($mess_success)
{
?>
<script>
	const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 1500,
		timerProgressBar: true,
		didOpen: (toast) => {
                                        //toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                      }
                                    })
	Swal.fire(
		'Thành công!',
		'{{$mess_success}}',
		'success'
		)
</script>
<?php
}
Session::put('mess_success', null);
?>
</div>
{{-- end messenger box--}}

<section id="cart_items">
	<div class="container">
		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu" style="background: none;">
						<td>&nbsp;</td>
					</tr>
				</thead>
				<tbody>
					@php
						$total = 0;
					@endphp
					@if(Session::has('user_id'))
					@foreach($list_cart as $key => $cart)
					@php
						if ($cart->product_sale_status == 1) {
							$subtotal  = $cart->product_sale_price*$cart->cart_quantity_product;
						} else {
							$subtotal  = $cart->product_sell_price*$cart->cart_quantity_product;
						}
						$total += $subtotal;
						
						
					@endphp
					<tr>
						<td class="cart_description">
							<a style="position: relative;" href="{{URL::to('/meta_product='.$cart->product_url)}}">
								@if($cart->product_sale_status == 1)
								<img style="top:100%; left: 70%; margin-top: 0px; padding-top: 0px; position: absolute;" width="42" src="{{asset('public/media/img-icons/sale-tag1.png')}}" class="" alt="img_sale" />
								@endif
								<img style="border-radius: 5px" width="100" src="{{asset('public/media/img-product/'.$cart->product_img1)}}" alt="{{$cart->product_name}}">
							</a>

						</td>
						<td class="cart_description">
							<h5>
								<a href="{{URL::to('/meta_product='.$cart->product_url)}}">
									{{$cart->product_name}}
								</a>
							</h5>


								@if($cart->product_sale_status == 1)
										<p style="color: #999999;" class="text-muted">
											Đơn giá : 
											{{number_format($cart->product_sale_price,0,",",".")}}đ
											/ {{$cart->product_number_unit.''.$cart->product_unit}}
										</p>
								@else
										<p style="color: #999999;" class="text-muted">
											Đơn giá : 
											{{number_format($cart->product_sell_price,0,",",".")}}đ
											/ {{$cart->product_number_unit.''.$cart->product_unit}}
										</p>
								@endif

						</td>
						<td class="cart_price">
							<p style="font-size: 1.5rem;"><i>{{$cart->category_name}}</i></p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<a class="cart_quantity_up" href="{{URL::to('/cart/down/'.$cart->cart_id)}}"> - </a>
										<a role="button" data-toggle="modal" data-target="#quantity_update_modal" data-whatever="{{$cart->cart_quantity_product}}" data-cart-id="{{$cart->cart_id}}">
										<input class="cart_quantity_input" type="text" name="quantity" value="{{$cart->cart_quantity_product}}" autocomplete="off" size="2">
										</a>
								<a class="cart_quantity_down" href="{{URL::to('/cart/up/'.$cart->cart_id)}}"> + </a>
							</div>
						</td>
						<td class="cart_total">
							
							@if($cart->product_sale_status == 1)
							<p class="cart_total_price">
								{{number_format(($cart->product_sale_price * $cart->cart_quantity_product),0,",",".")}}đ
							</p>
							<p class="text-muted">
								Giá gốc :
								<del>
									{{number_format(($cart->product_sell_price * $cart->cart_quantity_product),0,",",".")}}đ
								<del>
							</p>
							@else
							<p class="cart_total_price">
								{{number_format(($cart->product_sell_price * $cart->cart_quantity_product),0,",",".")}}đ
							</p>
							<p class="text-muted">
								Giá gốc : 
								<del>
									{{number_format(($cart->product_sell_price * $cart->cart_quantity_product),0,",",".")}}đ
								<del>
							</p>
							@endif
							
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete" href="{{URL::to('/cart/delete/'.$cart->cart_id)}}">
								<i class="fa fa-times"></i>
							</a>
						</td>
					</tr>
					@endforeach
					@else
					<h3 class="text-muted">Hãy tiếp tục mua sắm cùng Trái Cây 141 nhé !</h3>
					@endif
				</tbody>
			</table>
		</div>
	</div>
</section> <!--/#cart_items-->
<section id="do_action">
	<div class="container">
		<div class="heading">
			<h3>Tiếp tục mua hàng !</h3>
			<p>Trái Cây 141 sẽ tiếp tục có nhiều ưu đãi cho quý khách hàng mua hàng online trong thời gian sắp tới !.</p>
		</div>
		<div class="row">
			<div class="col-sm-6">
			<form
				id="cartconfirm_cart_payment_form"
				name="cartconfirm_cart_payment_form" 
				role="form" 
				action="{{URL::to('/payment/add')}}" 
				method="post">
        {{csrf_field()}}
				<div class="chose_area">
					<h4>Thông tin người nhận hàng :</h4>
					<ul class="user_info">
						<li class="single_field">
							<label><span style="color: #F86D72;">*</span>Họ và tên :</label>
							<input 
								id="input_fullname_payment" 
								name="input_fullname_payment" 
								style="color: #012345;" 
								type="text" 
								placeholder="VD : Nguyễn văn A" 
								value="{{$pro_user->user_name}}" 
								required>
						</li>
						<li class="single_field">
							<label><span style="color: #F86D72;">*</span>Số điện thoại :</label>
							<input 
								id="input_phone_payment" 
								name="input_phone_payment"
								style="color: #012345;" 
								type="text" 
								placeholder="VD : 02866502727" 
								value="{{$pro_user->user_phone_recieve}}" 
								required>
						</li>
					</ul>
					<ul class="user_info">
						<li style="width: 100%;">
							<label><span style="color: #F86D72;">*</span>Địa chỉ giao hàng :</label>
							<textarea
								id="input_address_payment" 
								name="input_address_payment"
								style="color: #012345;"
								type="text" 
								rows="2"
								placeholder="VD : 131 Nguyễn Tri Phương, Phường 8, Quận 5, HCM"
								required
								>{{$pro_user->user_address}}</textarea>
						</li>
						<li style="width: 100%;">
							<label>Yêu cầu ( nếu có):</label>
							<textarea
								id="input_cus_request_payment" 
								name="input_cus_request_payment"
								style="color: #012345;"
								type="text" 
								rows="2"
								placeholder="VD : Liên hệ Zalo 0868xx... để thanh toán qua ZaloPay"
								></textarea>
						</li>
					</ul>
					{{-- <a class="btn btn-default update" href="">Get Quotes</a> --}}
					{{-- <a class="btn btn-default check_out" href="">Continue</a> --}}
				</div>
			</form>
			</div>
			<div class="col-sm-6">
				<div class="total_area">
					<ul>
						<li>Tổng tiền hàng <span>{{number_format($total,0,",",".")}}đ</span></li>
						<li>VAT(%) <span>0đ</span></li>
						<li>Phí giao hàng <span>Miễn phí</span></li>
						<li class="h3">Tổng <span>{{number_format($total,0,",",".")}}đ</span></li>
					</ul>
					<span class="small">Hiện tại : Chỉ áp dụng thanh toán khi giao hàng hoặc chuyển khoản</span>
					<button type="button" class="btn btn-default update" data-toggle="modal" data-target="#cartconfirm_modal">
						Mua ngay
					</button>
					{{-- <a class="btn btn-default check_out" href="">Thanh toán ngay</a> --}}
				</div>
			</div>
		</div>
	</div>
</section><!--/#do_action-->

<div>
	<div class="modal fade" id="quantity_update_modal" tabindex="-1" role="dialog" aria-labelledby="quantity_update_modalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="quantity_update_modalLabel">Số lượng mua</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form 
				id="quantity_update_form"
				name="quantity_update_form" 
				role="form" 
				action="{{URL::to('/cart/update/quatity')}}" 
				method="post">
        {{csrf_field()}}
				<div class="modal-body">
					
						<div class="form-group">
							<label for="input_cart_quantity_product_update" class="col-form-label">Số lượng :</label>
							<input class="form-control" min="1" max="9999" required type="number" id="input_cart_quantity_product_update" name="input_cart_quantity_product_update">
						</div>

						<div class="form-group">
							<input class="form-control hidden" required type="text" id="input_cart_id_quantity_product_update" name="input_cart_id_quantity_product_update">
						</div>
					
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Xác nhận</button>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>


<div>
	<div class="modal fade" id="cartconfirm_modal" tabindex="-1" role="dialog" aria-labelledby="cartconfirm_modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cartconfirm_modalLabel">Xác nhận mua sản phẩm?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
      <div class="modal-body">
          <div
          style="
          display: flex; 
          vertical-align: middle;
          " 
          class="form-group">
          	<label class="col-form-label">
          		<img style="" width="100" src="{{asset('public/media/img-icons/checkout_payment.gif')}}" alt="Checkout1-Payment">
          	</label>
          	<div>
          		<label class="col-form-label">
          			Xác nhận mua hàng !
          		</label>
          		<p>Tổng đơn hàng : {{number_format($total,0,",",".")}}đ</p>
          	</div>
          </div>
          <div class="form-group">
          	<hr>
          	<ul>
          		@foreach($list_cart as $key_2 => $cart_2)
          		<li style="margin-top: 3px; display: flex; justify-content: space-between;">
	          			<div class="col-4">
	          				<img style="border-radius: 5px" width="32" height="32" src="{{asset('public/media/img-product/'.$cart_2->product_img1)}}" alt="{{$cart_2->product_name}}">
	          				<span>
	          					{{$cart_2->product_name}}
	          				</span>
	          			</div>
	          			<p style="margin-top: 0.5rem;" class="col-4">
	          				{{$cart_2->cart_quantity_product}} x {{$cart_2->product_number_unit.''.$cart_2->product_unit}}
	          			</p>
	          			<p style="margin-top: 0.5rem;" class="col-4">
	          				@if($cart_2->product_sale_status)
	          				 {{number_format(($cart_2->product_sale_price * $cart_2->cart_quantity_product),0,",",".")}}đ
	          				@else
	          					{{number_format(($cart_2->product_sell_price * $cart_2->cart_quantity_product),0,",",".")}}đ
	          				@endif
	          			</p>
          		</li>
          		<hr>
          		@endforeach
          	</ul>
          </div>          
      </div>
      </form>
      <div class="modal-footer">
        <a href="javascript:{}" onclick="document.getElementById('cartconfirm_cart_payment_form').submit();" class="btn btn-primary">Xác nhận</a>
      </div>
    </div>
  </div>
</div>
</div>
@endsection