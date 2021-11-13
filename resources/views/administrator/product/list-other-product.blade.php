@extends('admin-layout')

@section('admin-content')
<div class="container-fluid">
	<div class="mb-1">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb breadcrumb-custom">
				<li class="breadcrumb-item">
					<a class="text-decoration-none" href="{{URL::to('/manage-product')}}" data-abc="true">Quản lý sản phẩm</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">
					<span>Cảnh báo sản phẩm</span>
				</li>
			</ol>
		</nav>
	</div>
	<div class="mb-1 mx-3 breadcrumb-custom2">
		<ul>
			<li class="mt-1">
				<a href="{{URL::to('/manage-product/list-inventory')}}#tonkho">
					Cảnh báo : Có  
					<span class="font-weight-bold">1</span>
					 sản phẩm  
					 <span class="font-weight-bold">hết hàng </span>!
				</a>
			</li>
			<li class="mt-1">
				<a href="{{URL::to('/manage-product/list-inventory')}}#tonkho">
					Cảnh báo : Có  
					<span class="font-weight-bold">1</span>
					 sản phẩm  
					 <span class="font-weight-bold">sắp hết hàng </span>!
				</a>
			</li>
			<li class="mt-1">
				<a href="{{URL::to('/manage-product/list-out-of-date')}}#hansudung">
					Cảnh báo : Có  
					<span class="font-weight-bold">1</span>
					 sản phẩm 
					 <span class="font-weight-bold">hết hạn sử dụng </span>!
				</a>
			</li>
			<li class="mt-1">
				<a href="{{URL::to('/manage-product/list-out-of-date')}}#hansudung">
					Cảnh báo : Có  
					<span class="font-weight-bold">1</span>
					 sản phẩm 
					 <span class="font-weight-bold">sắp hết hạn sử dụng </span>!
				</a>
			</li>
		</ul>
		
	</div>

	<div class="container mt-4">
		<!-- Content Row -->
		<div class="row d-flex flex-lg-row justify-content-between">
			<a href="{{URL::to('/manage-product')}}" type="button" class="btn btn-info">
				<span class="text"><i class="fas fa-undo-alt"></i> Xem tất cả sản phẩm</span>
			</a>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#print_modal_other_product">
				<span class="text"><i class="fas fa-print"></i> In Danh Sách</span>
			</button>
		</div>
	</div>
	@if(Request::segment(2) === 'list-out-of-date')
	<div class="shadow my-4 rounded p-2">
		<div class="d-flex flex-lg-row justify-content-between my-2">
			<h6 class="m-0 font-weight-bold text-primary">
				Danh sách sản phẩm cần kiểm tra hạn sử dụng
			</h6>
			<div class="justify-content-end">
				<input type="search" class="search-input form-control" placeholder="Mã hoặc tên sản phẩm" name="" id="input_search_subclas" onkeyup="Search_class_function()">
			</div>
		</div>
		<div  id="hansudung" class="mb-3">
			<ul id="UL_filter" class="list-group list-group-flush">

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
										<span>
											<i class="fas fa-exclamation-circle text-danger"></i>
											 <span class="bg-danger text-white px-1">
												Lô hết hạn : 01010921 (01/12/2021)
											</span>
										</span>
									</p>
									<div class="mt-2 d-flex flex-sm-row flex-column justify-content-between align-items-end">
										<div class="mx-2 text-sm-left text-right">
											<small>Hạn sử dụng còn</small>
											<br>
											<span class="text-dark font-weight-bold">
												<del>-20 ngày</del>
											</span>
											
										</div>
										<div class="mx-2 text-sm-left text-right">
											<small>Lô tồn</small>
											<br>
											<span 
											class="text-danger font-weight-bold">
											 20 trái
											</span>
										</div>
										<div class="mx-2 text-sm-left text-right">
											<small>Tổng tồn</small>
											<br>
											<span 
											class="text-success font-weight-bold">
											 50 trái
											</span>
										</div>
										<div class="mx-2 text-sm-left text-right">
											<small>Công cụ :</small>
											<br>
											<span class="font-weight-bold">
											<a href="{{URL::to('/manage-product/detail/code')}}" class="btn text-dark border-success bg-light btn-sm">
												Xem chi tiết & cập nhật
											</a>
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
										<span>
											<i class="fas fa-exclamation-triangle text-warning"></i>
											<span class="bg-warning text-white px-1">
												Lô sắp hết hạn : 01010921 (01/12/2021)
											</span>
										</span>
									</p>
									<div class="mt-2 d-flex flex-sm-row flex-column justify-content-between align-items-end">
										<div class="mx-2 text-sm-left text-right">
											<small>Hạn sử dụng còn</small>
											<br>
											<span class="text-dark font-weight-bold">
												20 ngày
											</span>
											
										</div>
										<div class="mx-2 text-sm-left text-right">
											<small>Lô tồn</small>
											<br>
											<span 
											class="text-danger font-weight-bold">
											 20 trái
											</span>
										</div>
										<div class="mx-2 text-sm-left text-right">
											<small>Tổng tồn</small>
											<br>
											<span 
											class="text-success font-weight-bold">
											 50 trái
											</span>
										</div>
										<div class="mx-2 text-sm-left text-right">
											<small>Công cụ :</small>
											<br>
											<span class="font-weight-bold">
											<a href="{{URL::to('/manage-product/detail/code')}}" class="btn text-dark border-success bg-light btn-sm">
												Xem chi tiết & cập nhật
											</a>
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
	@elseif(Request::segment(2) === 'list-inventory')
	<div class="shadow my-4 rounded p-2">
		<div class="d-flex flex-lg-row justify-content-between my-2">
			<h6 class="m-0 font-weight-bold text-primary">
				Danh sách sản phẩm cần kiểm tra số lượng
			</h6>
			<div class="justify-content-end">
				<input type="search" class="search-input form-control" placeholder="Mã hoặc tên sản phẩm" name="" id="input_search_subclas" onkeyup="Search_class_function()">
			</div>
		</div>
		<div id="tonkho" class="mb-3">
			<ul id="UL_filter" class="list-group list-group-flush">

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
										<span>
											<i class="fas fa-exclamation-circle text-danger"></i>
											 <span class="bg-danger text-white px-1">
												Đã hết hàng !
											</span>
										</span>
									</p>
									<div class="mt-2 d-flex flex-sm-row flex-column justify-content-between align-items-end">
										<div class="mx-2 text-sm-left text-right">
											<small>Số lượng còn</small>
											<br>
											<span class="text-dark font-weight-bold">0 trái</span>
											
										</div>
										<div class="mx-2 text-sm-left text-right">
											<small>Đã bán trong 30 ngày qua</small>
											<br>
											<span 
											class="text-success font-weight-bold">
											 20 trái
											</span>
										</div>
										<div class="mx-2 text-sm-left text-right">
											<small>Hạn sử dụng</small>
											<br>
											<span class="font-weight-bold" 
											style="color: #DC3545;">
											60 ngày
											</span>
										</div>
										<div class="mx-2 text-sm-left text-right">
											<small>Công cụ :</small>
											<br>
											<span class="font-weight-bold">
											<a href="{{URL::to('/manage-product/detail/code')}}" class="btn text-dark border-success bg-light btn-sm">
												Xem chi tiết & cập nhật
											</a>
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
										<span>
											<i class="fas fa-exclamation-triangle text-warning"></i>
											<span class="bg-warning text-white px-1">
												Sắp hết hàng !
											</span>
										</span>
									</p>
									<div class="mt-2 d-flex flex-sm-row flex-column justify-content-between align-items-end">
										<div class="mx-2 text-sm-left text-right">
											<small>Số lượng còn</small>
											<br>
											<span class="text-dark font-weight-bold">0 trái</span>
											
										</div>
										<div class="mx-2 text-sm-left text-right">
											<small>Đã bán trong 30 ngày qua</small>
											<br>
											<span 
											class="text-success font-weight-bold">
											 20 trái
											</span>
										</div>
										<div class="mx-2 text-sm-left text-right">
											<small>Hạn sử dụng</small>
											<br>
											<span class="font-weight-bold" 
											style="color: #DC3545;">
											60 ngày
											</span>
										</div>
										<div class="mx-2 text-sm-left text-right">
											<small>Công cụ :</small>
											<br>
											<span class="font-weight-bold">
											<a href="{{URL::to('/manage-product/detail/code')}}" class="btn text-dark border-success bg-light btn-sm">
												Xem chi tiết & cập nhật
											</a>
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
	@endif
</div>
<!--Print Modal -->
<div>
	<div class="modal fade" id="print_modal_other_product" tabindex="-1" aria-labelledby="print_modal_other_productLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="print_modal_other_productLabel">
						In danh sách sản phẩm
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-check mt-2" style="color:#000000">
							<input class="form-check-input" type="radio" name="RadioProPrint" id="RadioProPrint1" value="1" checked>
							<label class="form-check-label" for="RadioProPrint1">
								In các sản phẩm <span class="font-weight-bold">đã hết hàng</span>
							</label>
						</div>
						<div class="form-check mt-2" style="color:#000000">
							<input class="form-check-input" type="radio" name="RadioProPrint" id="RadioProPrint2" value="2">
							<label class="form-check-label" for="RadioProPrint2">
								In các sản phẩm <span class="font-weight-bold">sắp hết hàng</span>
							</label>
						</div>
						<div class="form-check mt-2" style="color:#000000">
							<input class="form-check-input" type="radio" name="RadioProPrint" id="RadioProPrint3" value="3">
							<label class="form-check-label" for="RadioProPrint3">
								In các sản phẩm đã <span class="font-weight-bold">hết hạn sử dụng</span>
							</label>
						</div>
						<div class="form-check mt-2" style="color:#000000">
							<input class="form-check-input" type="radio" name="RadioProPrint" id="RadioProPrint4" value="4">
							<label class="form-check-label" for="RadioProPrint4">
								In các sản phẩm <span class="font-weight-bold">sắp hết hạn sử dụng</span>
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