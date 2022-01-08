@extends('home-layout')
@section('content')
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
					<tr>
						<td class="cart_product">
							<a href=""><img width="100" src="{{asset('public/media/img-product/none.png')}}" alt=""></a>
						</td>
						<td class="cart_description">
							<h4><a href="">Sản phẩm</a></h4>
							<p>ID: 1089772</p>
						</td>
						<td class="cart_price">
							<p style="font-size: 1.5rem;"><i>Trái cây tươi</i></p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<a class="cart_quantity_up" href=""> + </a>
								<input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
								<a class="cart_quantity_down" href=""> - </a>
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">30.000đ</p>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
						</td>
					</tr>
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
				<div class="chose_area">
					<h4>Thông tin người nhận hàng :</h4>
					<ul class="user_info">
						<li class="single_field">
							<label>Họ và tên :</label>
							<input type="text" placeholder="VD : Nguyễn văn A">
						</li>
						<li class="single_field">
							<label>Số điện thoại :</label>
							<input type="text" placeholder="VD : 02866502727">
						</li>
					</ul>
					<ul class="user_info">
						{{-- <li class="single_field">
							<label>Quận/huyện:</label>
							<select>
								<option disabled>Chọn : </option>
								<option>Bangladesh</option>
								<option>UK</option>
								<option>India</option>
								<option>Pakistan</option>
								<option>Ucrane</option>
								<option>Canada</option>
								<option>Dubai</option>
							</select>
						</li>
						<li class="single_field">
							<label>Phường/xã:</label>
							<select>
								<option disabled>Chọn : </option>
								<option>Dhaka</option>
								<option>London</option>
								<option>Dillih</option>
								<option>Lahore</option>
								<option>Alaska</option>
								<option>Canada</option>
								<option>Dubai</option>
							</select>
						</li> --}}
						<li style="width: 100%;">
							<label>Đường, số nhà :</label>
							<textarea
								type="text" 
								rows="4"
								placeholder="VD : 131 Nguyễn Tri Phương, Phường 8, Quận 5, HCM"
								></textarea>
						</li>
					</ul>
					{{-- <a class="btn btn-default update" href="">Get Quotes</a> --}}
					{{-- <a class="btn btn-default check_out" href="">Continue</a> --}}
				</div>
			</div>
			<div class="col-sm-6">
				<div class="total_area">
					<ul>
						<li>Tổng tiền hàng <span>100.000đ</span></li>
						<li>VAT(%) <span>0đ</span></li>
						<li>Phí giao hàng <span>Miễn phí</span></li>
						<li class="h3">Tổng <span>100.000đ</span></li>
					</ul>
					<a class="btn btn-default update" href="">Xác nhận mua</a>
					{{-- <a class="btn btn-default check_out" href="">Thanh toán ngay</a> --}}
				</div>
			</div>
		</div>
	</div>
</section><!--/#do_action-->
@endsection