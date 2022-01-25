@extends('admin-layout')
@section('admin-content')

<div class="container-fluid">
	<div class="mb-1">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb breadcrumb-custom">
				<li class="breadcrumb-item">
					<a class="text-decoration-none" href="{{URL::to('/dashboard')}}" data-abc="true">Tổng quan</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">
					<span class="text-danger font-weight-bold">Đơn đã hủy</span>
				</li>
			</ol>
		</nav>
	</div>
</div>

@php
	$color = array("#666666","#666666",
					"#666666","#666666",
				   "#666666","#666666",
				   "#666666","#666666",
				   "#666666","#666666",
				   "#666666","#666666");
	$k = 0;
@endphp
<form>
@csrf
<div class="container-fluid">
	<!-- Border Left Utilities -->
	<div class="col-lg-12">
		@foreach($list_bill as $key => $bill_pro)
		@php
			// $k = array_rand($color);
			if ($k > (count($color) - 1)) {
				$k = 0;
			}
		@endphp
		<div style="border: none; border-left: 0.25rem solid; border-color: #f5f5f5;" class="card bill-info mb-5 py-0 ">
			<div class="card-body p-1">
				<div style="color: {{$color[0]}}; text-decoration: underline;" class="font-weight-bold">
					<img width="81" src="{{asset('public/media/img-icons/cancellation.png')}}">Mã HĐ : {{$bill_pro->bills_bill_id}}
				</div>
				<div class="row cus-info">
					<div class="col-sm-5">	
						<p title="Tên nick Account : {{$bill_pro->user_name}}" style="color: {{$color[$k]}};">Người mua : 
							<span>
								{{$bill_pro->bills_customer_name}}
							</span>
							<span title="Account : {{$bill_pro->user_username}}" class="small">
								({{$bill_pro->user_username}})
							</span>
						</p>
						<p title="Sđt Account : {{$bill_pro->user_phone}}" style="color: {{$color[$k]}};">SĐT : 
							<span>
								{{$bill_pro->bills_customer_phone}}
							</span>
						</p>
						<p title="Đ/C Account : {{$bill_pro->user_address}}" style="color: {{$color[$k]}};">Địa chỉ giao : 
							<span>
								{{$bill_pro->bills_customer_address}}
							</span>
						</p>
					</div>
					<div class="col-sm-5">	
						<p style="color: {{$color[$k]}};">Đã mua vào lúc : 
							<span class="font-weight-bold">
								{{date('H:i:s',strtotime($bill_pro->bills_purchase_date))}}
							</span>
							<span>
								- {{date('d/m/Y',strtotime($bill_pro->bills_purchase_date))}}
							</span>
							<label style="color: #666666">&ensp;
								{{-- {{$time_now}} --}}(
								@php
									// now('Asia/Ho_Chi_Minh')
									$diffTimeSeconds = now('Asia/Ho_Chi_Minh')->diffInSeconds($bill_pro->bills_purchase_date);
									$diffTimeMinutes = $diffTimeSeconds/60;
									$diffTimeHours = $diffTimeSeconds/60/60;
									$diffTimeDays = $diffTimeSeconds/60/60/24;
									$diffTimeMonths = $diffTimeSeconds/60/60/24/30;
									$diffTimeYears = $diffTimeSeconds/60/60/24/30/12;

									$Minutes = $diffTimeMinutes - (60*floor($diffTimeHours));
									$Hours = $diffTimeHours - (24*floor($diffTimeDays));
									$Days = $diffTimeDays - (365*floor($diffTimeYears));
									$MonthsDays = $diffTimeDays - (30*floor($diffTimeMonths));

									if ($diffTimeSeconds < 60) { // < 1 phút
										echo 'Vừa xong';
									}
									elseif($diffTimeSeconds < 60*60){ // >=1 phút & < 1 giờ
										echo floor(($diffTimeMinutes)).'phút trước';
									}
									elseif($diffTimeSeconds < 60*60*24){ // >=1 giờ & < 1 ngày
										echo floor(($diffTimeHours)).'giờ'.floor($Minutes).'phút trước';
									}
									elseif($diffTimeSeconds < 60*60*24*30){
										echo floor(($diffTimeDays)).'ngày'.floor($Hours).'giờ trước';
									}
									elseif($diffTimeSeconds < 60*60*24*30*365){
										echo floor(($diffTimeMonths)).'tháng'.floor($MonthsDays).'trước';
									}
									else{
										echo floor(($diffTimeYears)).'năm'.floor($Days).'ngày trước';
									}
									
								 	
								@endphp
								)
							</label>
						</p>
						<p style="color: {{$color[$k]}};">
							Tổng thành tiền : 
							<span style="font-size: 1.1rem;" class="font-weight-bold text-gray-900">
								{{number_format($bill_pro->bills_sum_price,0,",",".")}} đ
							</span>
						</p>
						<p style="color: {{$color[$k]}};">
							Yêu cầu :
						 <span> {{$bill_pro->bills_customer_request == null ? "Không có !":$bill_pro->bills_customer_request}}
						 </span>
						</p>
					</div>
				</div>
				<div>
					<p style="color: {{$color[$k]}};">
						Lý do hủy đơn :
						<span> {{$bill_pro->bills_desc == null ? "Không có !":$bill_pro->bills_desc}}
						</span>
					</p>
					<p style="color: {{$color[$k]}};">
						Đã hủy vào lúc:
						<span class="font-weight-bold">
							{{date('H:i:s',strtotime($bill_pro->updated_at_bill))}}
						</span>
						<span>
							- {{date('d/m/Y',strtotime($bill_pro->updated_at_bill))}}
						</span>
					</p>
				</div>
				<div class="row">
					<div class="col-md-10 table-responsive">
						<table class="table" width="100%" >
							<thead>
								<tr>
									<th scope="col">#</th>
									<th style="color: {{$color[$k]}};" class="font-weight-bold" scope="col">
										Sản Phẩm
									</th>
									<th style="color: {{$color[$k]}};" class="font-weight-bold" scope="col">
										Số Lượng
									</th>
									<th style="color: {{$color[$k]}};" class="font-weight-bold" scope="col">
										Đơn Giá
									</th>
									<th style="color: {{$color[$k]}};" class="font-weight-bold" scope="col">
										Thành Tiền
									</th>
									<th style="color: {{$color[$k]}};" class="font-weight-bold" scope="col">
										Chốt
									</th>
									<th style="color: {{$color[$k]}};" class="font-weight-bold" scope="col">
										Hết Hàng
									</th>
								</tr>
							</thead>
							<tbody>
							@foreach($detail_bill as $key_dt => $bill_detail)
							@if($bill_pro->bills_bill_id == $bill_detail->bills_bill_id)
								<tr>
									<th scope="row">
										<a href="{{URL::to('/manage-product/detail/'.$bill_detail->product_code)}}">
										<img width="81" src="{{asset('public/media/img-product/'.$bill_detail->product_img1)}}" alt="{{$bill_detail->product_name}}">
										</a>
									</th>
									<td class="font-weight-bold">
										<p>
											<a style="color: {{$color[$k]}};" href="{{URL::to('/manage-product/detail/'.$bill_detail->product_code)}}">
											{{$bill_detail->product_name}}
											</a>
										</p>
									</td>
									<td>	
											<p> 
												<span style="font-size: 1.5rem;" class=" font-weight-bold">
													{{$bill_detail->bills_quantity}}
												</span> x <span class="font-weight-bold">
												{{$bill_detail->product_number_unit}}{{$bill_detail->product_unit}}
												</span>
											</p>
									</td>
									<td>
											
											<p>
												@if($bill_detail->product_sale_status == 1)
												{{number_format($bill_detail->product_sale_price,0,",",".")}}đ
												@else
												{{number_format($bill_detail->product_sell_price,0,",",".")}}đ
												@endif
											</p>
											<p>
												@if($bill_detail->product_sale_status == 1)
												<del>
													<small>
														Giá gốc : {{number_format($bill_detail->product_sell_price,0,",",".")}}đ
													</small>
												</del>
												@else
													<small>
														Giá gốc : {{number_format($bill_detail->product_sell_price,0,",",".")}}đ
													</small>
												@endif
												
											</p>
									</td>
									<td>
											<p>
												<span  class="text-gray-900 font-weight-bold">
												@if($bill_detail->product_sale_status == 1)
												{{number_format(($bill_detail->product_sale_price * $bill_detail->bills_quantity),0,",",".")}}đ
												@else
												{{number_format(($bill_detail->product_sell_price * $bill_detail->bills_quantity),0,",",".")}}đ
												@endif
												</span>
											</p>
											
									</td>
									<td>	
										<a>
											<input 
											{{$bill_detail->bills_status_product == 1 ? 'checked': null}} 
											disabled 
											class="radio-success" 
											data-bills-status-product="1" 
											data-bills-id-product="{{$bill_detail->bills_product_id}}"
											data-bills-bill-id="{{$bill_pro->bills_bill_id}}"
											type="checkbox" 
											id="radio_stock_confirmation_{{$bill_detail->bills_product_id}}_of_{{$bill_pro->bills_bill_id}}">
										</a>
											
									</td>
									<td>	
										<a>
											<input 
											{{($bill_detail->bills_status_product == 2)&($bill_detail->bills_status_product != null) ? 'checked': null}}
											disabled
											class=" radio-danger" 
											data-bills-status-product="0" 
											data-bills-id-product="{{$bill_detail->bills_product_id}}"
											data-bills-bill-id="{{$bill_pro->bills_bill_id}}" 
											type="checkbox" 
											id="radio_confirmed_out_of_stock_{{$bill_detail->bills_product_id}}_of_{{$bill_pro->bills_bill_id}}">
										</a>
											
									</td>
								</tr>
							@endif
							@endforeach
							</tbody>
						</table>
					</div>
					@if(1)
					<div class="col-md-2 d-flex justify-content-end align-items-end">
						<div class="d-flex flex-md-column">
							<div class="m-1">
								<a onclick="return confirm('Đồng ý xóa!')" href="{{URL::to('/bill-online/delete-forever/'.$bill_pro->bills_bill_id)}}" class="btn-sm border border-dark bg-white text-gray-900 rounded ">Xóa hóa đơn</a>
							</div>
						</div>						
					</div>
					@endif
				</div>
			</div>
		</div>
		@php
			$k += 1;//array_rand($color);
		@endphp
		@endforeach
	</div>
</div>
</form>
@endsection