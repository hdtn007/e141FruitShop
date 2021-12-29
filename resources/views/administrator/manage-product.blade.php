@extends('admin-layout')

@section('admin-content')
<div class="container-fluid">
	<div class="mb-4">
		<h1 class="h3 mb-0 text-gray-800">Quản lý sản phẩm</h1>
	</div>
	<div class="container">
		<!-- Content Row -->
		<div class="row d-flex flex-lg-row justify-content-between">
			<div>
				<a href="{{URL::to('/manage-product/add')}}" type="button" class="btn btn-info">
					<span class="text"><i class="fas fa-plus"></i> Thêm</span>
				</a>
				<a id="btn_delete_product" onclick="window.location.href='{{URL::to('/manage-product/delete')}}'" type="button" class="btn disabled btn-danger">
					<span class="text"><i class="fas fa-trash-alt"></i> Xóa</span>
				</a>
			</div>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#print_modal_product">
				<span class="text"><i class="fas fa-print"></i> In Danh Sách</span>
			</button>
		</div>
	</div>
	@if($count_over_pro)
	<div class="mt-4 mx-3">
		<span class="text-danger p-2 font-weight-bold border-left border-danger">
			<i class="fas fa-exclamation-circle mx-1"></i>
			Cảnh báo : <span class="font-weight-bold">Có {{$count_over_pro}} sản phẩm trong kho đã hết hàng !</span>
			<a class="text-decoration-none" href="{{URL::to('/manage-product/list-inventory')}}#tonkho"><u>Xem ngay !!!</u></a>
		</span>
		<div class="spinner-grow text-danger" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div>
	@endif
	@if($count_coming_pro)
	<div class="mt-4 mx-3">
		<span class="text-warning p-2 font-weight-bold border-left border-warning">
			<i class="fas fa-exclamation-triangle mx-1"></i>
			Cảnh báo : <span class="font-weight-bold">Có {{$count_coming_pro}} sản phẩm trong kho sắp hết !</span>
			<a class="text-decoration-none" href="{{URL::to('/manage-product/list-inventory')}}#tonkho"><u>Xem ngay !!!</u></a>
		</span>
		<div class="spinner-grow text-warning" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div>
	@endif
	@if(0)
	<div class="mt-4 mx-3">
		<span class="text-danger p-2 font-weight-bold border-left border-danger">
			<i class="fas fa-calendar-times mx-1"></i>
			Cảnh báo : <span class="font-weight-bold">Có 1 sản phẩm hết hạn sử dụng !</span>
			<a class="text-decoration-none" href="{{URL::to('/manage-product/list-out-of-date')}}#hansudung"><u>Xem ngay !!!</u></a>
		</span>
		<div class="spinner-grow text-danger" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div>
	@endif
	@if(0)
	<div class="mt-4 mx-3">
		<span class="text-warning p-2 font-weight-bold border-left border-warning">
			<i class="fas fa-hourglass-half mx-1"></i>
			Cảnh báo : <span class="font-weight-bold">Có 1 sản phẩm sắp hết hạn sử dụng !</span>
			<a href="{{URL::to('/manage-product/list-out-of-date')}}#hansudung"><u>Xem ngay !!!</u></a>
		</span>
		<div class="spinner-grow text-warning" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div>
	@endif
	<div class="shadow my-4 rounded p-2">
		<div class="d-flex flex-lg-row justify-content-between my-2">
			<h6 class="m-0 font-weight-bold text-primary">
				Danh sách tất cả các sản phẩm
			</h6>
			<div class="justify-content-end">
				<input type="search" class="search-input form-control" placeholder="Mã hoặc tên sản phẩm" name="" id="input_search_subclas" onkeyup="Search_class_function()" autofocus>
			</div>
		</div>
		<div class="mb-3">
			<ul id="UL_filter" class="list-group list-group-flush">
				@foreach ($list_product as $key => $pro_pro)
				<div class="row-filter">
					<li class="list-group-item mt-1 pl-1 border-0 d-flex">
						<input 
						onchange="status_btn(this)" 
						id="item_product_{{$pro_pro->product_code}}"
						name="item_product_{{$pro_pro->product_code}}" 
						type="checkbox" 
						class="align-self-center ml-0">
						<div class="d-flex flex-md-row flex-column justify-content-between flex-grow-1 bd-highlight text-wrap text-break" >
							@if($pro_pro->product_img1)
							<img 
							src="{{asset('/public/media/img-product/'.$pro_pro->product_img1)}}"
							width="100" height="100" class="bg-light rounded ml-1">
							@else
							<img 
							src="{{asset('/public/media/img-product/none.png')}}"
							width="100" height="100" class="bg-light rounded ml-1">
							@endif
							<div class="d-flex flex-md-row justify-content-between flex-grow-1 bd-highlight text-wrap text-break ml-3">
								<div>
									<b style="color: #000000;">
										{{$pro_pro->product_name}} ( {{$pro_pro->product_code}} )
									</b>
									<p>
										@if($pro_pro->product_inventory <= 0)
										<span class="bg-danger text-white px-1">
											<i class="fas fa-exclamation-circle"></i>
											Tồn Kho : 0 Trái
										</span>
										@elseif($pro_pro->product_inventory <= 5)
										<span class="bg-warning text-white px-1">
											<i class="fas fa-exclamation-triangle"></i>
											Tồn Kho : 3 Trái
										</span> 
										@elseif($pro_pro->product_inventory > 5)
										<span class="bg-info text-white px-1">
											<i class="fas fa-check-circle"></i>
											Tồn Kho : 12 Trái
										</span>
										@endif

										{{-- <span> &nbsp; | HSD : 01/12/2021 
											<i class="fas fa-check-circle text-info"></i>
											<i class="fas fa-exclamation-triangle text-warning"></i>
											<i class="fas fa-exclamation-circle text-danger"></i>
										</span> --}}
									</p>
									<div class="mt-2 d-flex flex-sm-row flex-column justify-content-between align-items-end">
										<div class="mx-2 text-sm-left text-right">
											<small>Người tạo</small>
											<br>
											<span class="text-dark font-weight-bold">
												{{$pro_pro->admin_name}}
											</span>
											
										</div>
										<div class="mx-2 text-sm-left text-right">
											<small>Giá nhập</small>
											<br>
											<span 
											class="text-success font-weight-bold">
												{{number_format($pro_pro->product_import_price,0,",",".")}}đ
											</span>
										</div>
										<div class="mx-2 text-sm-left text-right">
											<small>Giá bán</small>
											<br>
											<span 
											class="text-danger font-weight-bold">
											<u>
												{{number_format($pro_pro->product_sell_price,0,",",".")}}đ
											</u>
											</span>
										</div>
										<div class="mx-2 text-sm-left text-right">
											<small>Khuyến mãi</small>
											<br>
											<span class="font-weight-bold" 
											style="color: #DC3545;">
											{{number_format($pro_pro->product_sale_price,0,",",".")}}đ
											</span>
										</div>
										<div class="mx-2 text-sm-left text-right">
											<small>Đã bán</small>
											<br>
											<span class="font-weight-bold text-info">
											{{$pro_pro->product_count_product_sold}} {{$pro_pro->product_unit}}
											</span>
										</div>
										<div class="mx-2 text-sm-left text-right">
											<small>Lượt thích</small>
											<br>
											<span class="font-weight-bold" style="color: #EF63E4;">{{$pro_pro->product_like}}
											</span>
										</div>
									</div>
								</div>
								<div class="px-2 d-flex align-items-start flex-column bd-highlight">
									<label class="switch bd-highlight">
										<input 
										onclick="window.location.href='{{URL::to('/manage-product/update-status/'.$pro_pro->product_code)}}'" 
										value="" 
										type="checkbox" 
										{{$pro_pro->product_status === 1 ? 'checked' : ''}} 
									?>
									>
										<div class="slider round"></div>
									</label>
									<div class="mt-5 d-flex flex-column flex-md-row bd-highlight">
										<a class="mt-1 mx-md-1 bd-highlight btn-sm btn-primary" href="{{URL::to('/manage-product/detail/'.$pro_pro->product_code)}}">Xem</a>
										<a class="mt-1 mx-md-1 bd-highlight btn-sm btn-primary bg-info" href="{{URL::to('/manage-product/edit/'.$pro_pro->product_code)}}">Update</a>
										<button class="mt-1 mx-md-1 bd-highlight btn-sm border border-dark text-dark bg-white">Nhập</button>
									</div>
								</div>
							</div>
						</div>
					</li>
				</div>
				@endforeach
			</ul>
		</div>
		<nav aria-label="Page navigation example">
		  <ul class="pagination justify-content-center">
		    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
		    <li class="page-item"><a class="page-link" href="#">1</a></li>
		    <li class="page-item"><a class="page-link" href="#">2</a></li>
		    <li class="page-item"><a class="page-link" href="#">3</a></li>
		    <li class="page-item"><a class="page-link" href="#">Next</a></li>
		  </ul>
		</nav>
	</div>
</div>
<!--Print Modal -->
<div>
	<div class="modal fade" id="print_modal_product" tabindex="-1" aria-labelledby="print_modal_productLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="print_modal_productLabel">
						In danh sách sản phẩm
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-check text-primary mt-2">
							<input class="form-check-input" type="radio" name="RadioProPrint" id="RadioProPrint1" value="1" checked>
							<label class="form-check-label" for="RadioProPrint1">
								In tất cả các sản phẩm
							</label>
						</div>
						<div class="form-check text-success mt-2">
							<input class="form-check-input" type="radio" name="RadioProPrint" id="RadioProPrint2" value="2">
							<label class="form-check-label" for="RadioProPrint2">
								In các sản phẩm đang bán
							</label>
						</div>
						<div class="form-check text-danger mt-2">
							<input class="form-check-input" type="radio" name="RadioProPrint" id="RadioProPrint3" value="3">
							<label class="form-check-label" for="RadioProPrint3">
								In các sản phẩm chưa được bán
							</label>
						</div>
						<div class="form-group d-flex mt-3">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="RadioTypePrint" id="RadioTypePrintExcel" value="1" checked>
								<label class="form-check-label" for="RadioTypePrintExcel">
									<div>
										<img src="{{asset('public/media/img-icons/excel.png')}}" width="60">
										In file Excel
									</div>
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="RadioTypePrint" id="RadioTypePrintPdf" value="2">
								<label class="form-check-label" for="RadioTypePrintPdf">
									<div>
										<img src="{{asset('public/media/img-icons/pdf.png')}}" width="60">
										In file Pdf
									</div>
								</label>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn border-secondary text-dark bg-light" data-dismiss="modal">Đóng</button>
							<button type="submit" class="btn font-weight-bold border-info bg-white text-primary"><i class="fas fa-print"></i> In danh sách</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>	
</div>
@endsection