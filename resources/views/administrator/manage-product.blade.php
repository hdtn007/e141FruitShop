@extends('admin-layout')

@section('admin-content')
<div class="container-fluid">
	<div class="mb-4">
		<h1 class="h3 mb-0 text-gray-800">Quản lý sản phẩm</h1>
	</div>
	<div class="container">
		<!-- Content Row -->
		<div class="row d-flex flex-lg-row justify-content-between">
			<a href="{{URL::to('/manage-product/add')}}" type="button" class="btn btn-info">
				<span class="text"><i class="fas fa-plus"></i> Thêm</span>
			</a>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#print_modal_product">
				<span class="text"><i class="fas fa-print"></i> In Danh Sách</span>
			</button>
		</div>
	</div>
	<div class="mt-4 mx-3">
		<span class="text-danger p-2 font-weight-bold border-left border-danger">
			<i class="fas fa-exclamation-circle mx-1"></i>
			Cảnh báo : <span class="font-weight-bold">Có 1 sản phẩm hết hàng !</span>
			<a class="text-decoration-none" href="{{URL::to('/manage-product/list-inventory')}}#tonkho"><u>Xem ngay !!!</u></a>
		</span>
		<div class="spinner-grow text-danger" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div>
	<div class="mt-4 mx-3">
		<span class="text-warning p-2 font-weight-bold border-left border-warning">
			<i class="fas fa-exclamation-triangle mx-1"></i>
			Cảnh báo : <span class="font-weight-bold">Có 1 sản phẩm sắp hết hàng !</span>
			<a class="text-decoration-none" href="{{URL::to('/manage-product/list-inventory')}}#tonkho"><u>Xem ngay !!!</u></a>
		</span>
		<div class="spinner-grow text-warning" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div>
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
				@for($i=0 ; $i < 10 ; $i++)
				<div class="row-filter">
					<li class="list-group-item mt-1 pl-1 border-0 d-flex">
						<input 
						type="checkbox" 
						class="align-self-center ml-0" 
						name="">
						<div class="d-flex flex-md-row flex-column justify-content-between flex-grow-1 bd-highlight text-wrap text-break" >
							<img 
							src="{{asset('/public/media/img-product/chuoi.png')}}"
							width="100" class="bg-light rounded ml-1">
							<div class="d-flex flex-md-row justify-content-between flex-grow-1 bd-highlight text-wrap text-break ml-3">
								<div>
									<b style="color: #000000;">
										Chuối chuối chuối  sadas d assa d as d asd  a da d as d a d ( 001sjbh )
									</b>
									<p>
										<span class="bg-danger text-white px-1">
											<i class="fas fa-exclamation-circle"></i>
											Tồn Kho : 0 Trái
										</span>
										<span class="bg-warning text-white px-1">
											<i class="fas fa-exclamation-triangle"></i>
											Tồn Kho : 3 Trái
										</span> 
										<span class="bg-info text-white px-1">
											<i class="fas fa-check-circle"></i>
											Tồn Kho : 12 Trái
										</span>
										<span> &nbsp; | HSD : 01/12/2021 
											<i class="fas fa-check-circle text-info"></i>
											<i class="fas fa-exclamation-triangle text-warning"></i>
											<i class="fas fa-exclamation-circle text-danger"></i>
										</span>
									</p>
									<div class="mt-2 d-flex flex-sm-row flex-column justify-content-between align-items-end">
										<div class="mx-2 text-sm-left text-right">
											<small>Người tạo</small>
											<br>
											<span class="text-dark font-weight-bold">Htdn007</span>
											
										</div>
										<div class="mx-2 text-sm-left text-right">
											<small>Giá nhập</small>
											<br>
											<span 
											class="text-success font-weight-bold">502.000đ
											</span>
										</div>
										<div class="mx-2 text-sm-left text-right">
											<small>Giá bán</small>
											<br>
											<span 
											class="text-danger font-weight-bold">
											<del>650.000đ</del>
											</span>
										</div>
										<div class="mx-2 text-sm-left text-right">
											<small>Khuyến mãi</small>
											<br>
											<span class="font-weight-bold" 
											style="color: #DC3545;">
											650.000đ
											</span>
										</div>
										<div class="mx-2 text-sm-left text-right">
											<small>Đã bán</small>
											<br>
											<span class="font-weight-bold text-info">
											2000 trái
											</span>
										</div>
										<div class="mx-2 text-sm-left text-right">
											<small>Lượt thích</small>
											<br>
											<span class="font-weight-bold" style="color: #EF63E4;">502
											</span>
										</div>
									</div>
								</div>
								<div class="px-2 d-flex align-items-start flex-column bd-highlight">
									<label class="switch bd-highlight">
										<input 
										onclick="window.location.href='#'" 
										value="" 
										type="checkbox" 
										<?php if(1){
											echo "checked";
										}else{
											echo "";
										} 
									?>
									>
										<div class="slider round"></div>
									</label>
									<div class="mt-5 bd-highlight">
										<a href="{{URL::to('/manage-product/detail/code')}}">Xem & sửa</a>
									</div>
								</div>
							</div>
						</div>
					</li>
				</div>
				@endfor
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