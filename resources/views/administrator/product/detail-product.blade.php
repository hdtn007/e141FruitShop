@extends('admin-layout')

@section('admin-content')
<div class="container-fluid">
	<div class="mb-1">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb breadcrumb-custom">
				<li class="breadcrumb-item">
					<a class="text-decoration-none" href="{{URL::to('/manage-product')}}" data-abc="true">Tất cả sản phẩm</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">
					<span>{{$detail_pro->product_name}} ( {{$detail_pro->product_code}} )</span>
				</li>
			</ol>
		</nav>
	</div>
</div>
<section class="container-fluid bg-white mx-1 mb-2 p-2 rounded shadow-sm">
	{{-- info sản phẩm --}}
	<div id="default" class="detail-product">
		<div class="my-2 d-flex justify-content-between">
			<nav aria-label="Page navigation example">
				<ul class="pagination">
				@foreach($list_product as $key => $list_pro)
					@if($list_pro->product_id == $detail_pro->product_id - 1)
						<li class="page-item">
							<a class="page-link" href="{{URL::to('/manage-product/detail/'.$list_pro->product_code)}}">
								<i class="fas fa-chevron-left"></i>
							</a>
						</li>
					@endif
					@if($list_pro->product_id == $detail_pro->product_id)
					@endif
					@if($list_pro->product_id == $detail_pro->product_id + 1)
						<li class="page-item ml-1">
							<a class="page-link" href="{{URL::to('/manage-product/detail/'.$list_pro->product_code)}}">
								<i class="fas fa-chevron-right"></i>
							</a>
						</li>
					@endif
				@endforeach
				</ul>
			</nav>
			<div>
				<a href="{{URL::to('manage-product/edit/'.$detail_pro->product_code)}}" class="btn bg-info border-info text-white font-weight-bold mr-2">
					Chỉnh sửa
				</a>
			</div>
		</div>
        <div class="row">
            <div class="col-sm-5 p-2">
                <div class="img-product-container"> 
                	@if($detail_pro->product_img1)
                	<a id="btncontrolprew" onclick="showimgmodal(this)" href="" data-toggle="modal" data-target="#ViewImgModal" data-nameimg="{{asset('/public/media/img-product/'.$detail_pro->product_img1)}}">
                		<img id="idzoomimg" src="{{asset('/public/media/img-product/'.$detail_pro->product_img1)}}" width="350" />
                	</a>
                	@else
                	<a title="Thêm ảnh" href="{{URL::to('manage-product/edit/'.$detail_pro->product_code)}}" id="btncontrolprew" onclick="showimgmodal(this)"  data-nameimg="{{asset('/public/media/img-product/none.png')}}">
                		<img id="idzoomimg" src="{{asset('/public/media/img-product/none.png')}}" width="350" />
                	</a>
                	@endif
                	
                    <div class="img-product-thumbs"> 
                    	@if($detail_pro->product_img1)
	                    	<a onclick="ViewImageProduct(this)" data-bs-img-preview="idzoomimg" data-bs-img-input="{{asset('/public/media/img-product/'.$detail_pro->product_img1)}}"> 
	                    		<img width="80" src="{{asset('/public/media/img-product/'.$detail_pro->product_img1)}}" >
	                    	</a>
	                    @else
		                    <a href="{{URL::to('manage-product/edit/'.$detail_pro->product_code)}}" onclick="ViewImageProduct(this)" data-bs-img-preview="idzoomimg" data-bs-img-input="{{asset('/public/media/img-product/none.png')}}"> 
		                    	<img width="80" src="{{asset('/public/media/img-product/none.png')}}" >
		                    </a>
                    	@endif
                    	@if($detail_pro->product_img2)
	                    	<a onclick="ViewImageProduct(this)" data-bs-img-preview="idzoomimg" data-bs-img-input="{{asset('/public/media/img-product/'.$detail_pro->product_img2)}}"> 
	                    		<img width="80" src="{{asset('/public/media/img-product/'.$detail_pro->product_img2)}}" >
	                    	</a>
                    	@endif
                    	@if($detail_pro->product_img3)
	                    	<a onclick="ViewImageProduct(this)" data-bs-img-preview="idzoomimg" data-bs-img-input="{{asset('/public/media/img-product/'.$detail_pro->product_img3)}}"> 
	                    		<img width="80" src="{{asset('/public/media/img-product/'.$detail_pro->product_img3)}}" >
	                    	</a>
                    	@endif
                    	@if($detail_pro->product_img4)
	                    	<a onclick="ViewImageProduct(this)" data-bs-img-preview="idzoomimg" data-bs-img-input="{{asset('/public/media/img-product/'.$detail_pro->product_img4)}}"> 
	                    		<img width="80" src="{{asset('/public/media/img-product/'.$detail_pro->product_img4)}}" >
	                    	</a>
                    	@endif
                    	@if($detail_pro->product_img5)
	                    	<a onclick="ViewImageProduct(this)" data-bs-img-preview="idzoomimg" data-bs-img-input="{{asset('/public/media/img-product/'.$detail_pro->product_img5)}}"> 
	                    		<img width="80" src="{{asset('/public/media/img-product/'.$detail_pro->product_img5)}}" >
	                    	</a>
                    	@endif
                    </div>
                </div>
            </div>
            <div class="col-sm-4 info-detail-product p-2">
            	<div class="name-product">
            		<span class="h5 font-weight-bold">{{$detail_pro->product_name}} ( {{$detail_pro->product_code}} )</span>
            	</div>
            	<div class="mt-2 info-items">
            		<span class="text-primary font-weight-bold">Thuộc danh mục : </span> {{$detail_pro->category_name}}
            	</div>
            	<div class="mt-2 info-items">
            		<span class="text-primary font-weight-bold">Xuất xứ : </span> 
            		{{$detail_pro->country_name}}
            	</div>
            	<div class="mt-2 info-items">
            		<span class="text-primary font-weight-bold">Thương hiệu : </span> 
            		{{$get_brand != null ? ''.$get_brand.'':'Unknown!'}}
            	</div>
            	<div class="mt-2">
            		<span class="text-primary font-weight-bold">Giá nhập : </span> 
            		{{number_format($detail_pro->product_import_price,0,",",".")}}đ
            	</div>
            	<div class="mt-2">
            		<span class="text-primary font-weight-bold">Giá bán : </span> 
            		{{number_format($detail_pro->product_sell_price,0,",",".")}}đ
            	</div>
            	<div class="mt-2">
            		<span class="text-primary font-weight-bold">Giá khuyến mãi : </span> 
            		@if($detail_pro->product_sale_price)
            			{{number_format($detail_pro->product_sale_price,0,",",".")}}đ
            			<img width="30" src="{{asset('public/media/img-icons/sale2.png')}}">
            		@else
            			No Sale
            		@endif
            	</div>
            	<div class="mt-2">
            		<span class="text-primary font-weight-bold">Tồn kho : 
            		</span> {{$detail_pro->product_inventory}} {{$detail_pro->product_unit}} 
            	</div>
            	<div class="mt-2">
            		<span class="text-primary font-weight-bold">Hạn sử dụng tiêu chuẩn: 
            		</span> 
            		@if($detail_pro->product_def_expires)
            			{{$detail_pro->product_def_expires}} Ngày
            		@else
            			Unknown!
            		@endif
            		 
            	</div>
            	<hr> 
            	<div class="mt-2">
            		<span class="text-primary font-weight-bold">Từ khóa SEO : 
            		</span>
            		<span>
            			{{$detail_pro->product_keywords}}
            		</span>
            	</div>
            	<hr>
        	</div>
        	<div class="col-sm-3 info-detail-product p-2">
        		<div class="d-flex">
        			<label class="switch my-0 ">
        				<input 
        				value=""
        				onclick="window.location.href='{{URL::to('/manage-product/update-status/'.$detail_pro->product_code)}}'"
        				{{$detail_pro->product_status === 1 ? 'checked' : ''}}
        				type="checkbox">
        				<div class="slider round"></div>
        			</label>
        			@if($detail_pro->product_status === 1)
        			<span class="text-success mx-1 align-content-center mx-2">
        				Hiển thị sản phẩm
        			</span>
        			@else
        			<span class="text-danger mx-1 align-content-center mx-2">
        				Ẩn sản phẩm
        			</span>
        			@endif
        		</div>
        		<hr>
            	<span class="text-dark font-weight-bold">QR:</span>
            	<div class="mt-2 text-center">
            		@if($detail_pro->product_qrcode)
            		<img width="60" height="60" src="{{asset('/public/media/img-product/qr-code-product/'.$detail_pro->product_qrcode)}}">
            		@else
            			<img width="60" height="60" src="{{asset('/public/media/img-product/qr-code-product/none.png')}}">
            			<br>
            		<p class="small">Unknown!</p>           		
            		@endif
            		<br>  
            		
            	</div>
            	<hr>
        		<span class="text-center text-dark font-weight-bold">
            			Thống kê tháng :
            	</span>
        		<div>
        			Chưa có thống kê !
        			<!--
        			<small>Tháng 10 :</small>
        			<div class="progress">
        				<div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
        				25
        				</div>
        			</div>
        			<small>Tháng 11 :</small>
        			<div class="progress">
        				<div class="progress-bar bg-info" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
        				25
        				</div>
        			</div>
        		-->
        		</div>
            		<hr>
            		<span class="text-center text-dark font-weight-bold">
            			Thống kê tổng :
            		</span>
            	<div class="mt-2">
            		<span class="text-danger font-weight-bold">Tổng mua : </span> 
            		{{number_format($detail_pro->product_count_product_sold,0,",",".")}} {{$detail_pro->product_unit}}
            	</div>
        		<div class="mt-2">
            		<span class="text-danger font-weight-bold">Lượt xem : </span> 
            		{{number_format($detail_pro->product_view,0,",",".")}} <i class="fas fa-eye"></i>
            	</div>
            	<div class="mt-2">
            		<span class="text-danger font-weight-bold">Lượt thích : </span> 
            		{{number_format($detail_pro->product_like,0,",",".")}} <i class="fas fa-heart"></i>
            	</div>
        	</div>
        </div>
        <div>
        	<div class="mt-2">
        		<small>Tạo bởi : {{$detail_pro->admin_name}}</small>
        	</div>
        	<div class="mt-2">
        		<small>Tạo ngày : {{date('d/m/Y', strtotime($detail_pro->created_at))}}</small> 

        	</div>
        </div>
        <div class="mt-2">
        	<div>
        		<span class="text-primary font-weight-bold">Mô tả :</span>
        		<div class="text-dark ml-1">
        			{{$detail_pro->product_desc}}
        		</div>
        	</div>
        </div>
    </div>

 {{--    Phiếu nhập --}}
    <div class="h5 mt-3 text-info font-weight-bold">Lịch sử nhập hàng :</div>
    <div class="my-2 d-flex justify-content-between">
	    	<div class="dropdown ml-3">
	    		<button type="button" class="btn btn-primary dropdown-toggle" id="dropdownMenuYear" data-toggle="dropdown" aria-expanded="false">
	    			2021
	    		</button>
	    		<div class="dropdown-menu mt-2" aria-labelledby="dropdownMenuYear">
	    			<a class="dropdown-item" href="#">2020</a>
	    			<a class="dropdown-item" href="#">2021</a>
	    			<a class="dropdown-item" href="#">2022</a>
	    		</div>
	    	</div>
			<button class="btn bg-info border-info text-white font-weight-bold mr-2" data-toggle="modal" data-target="#AddImportProductModal">
				<i class="fas fa-plus-circle"></i> Nhập hàng
			</button>
	</div>
	<div class="import-card border mx-1 bg-light border-dark p-2 my-2">
		<div class="tab-content" id="v-pills-tabContent">
			<div class="tab-pane fade show active navbar-nav-scroll">
				<div class="d-flex justify-content-between">
					<span class="d-none d-sm-block text-dark font-weight-bold">
						Các lô đã nhập vào tháng 12 :
					</span>
				</div>
				<div class="mt-2">
					<div class="rounded mt-1 border border-info p-1 d-flex flex-sm-row flex-column justify-content-between">
						<div class="d-flex flex-row text-break text-wrap">
							<div>
								<img src="{{asset('public/media/img-icons/checked.png')}}" width="60">
							</div>
							<div class="mx-2">
								<span><b>Mã Lô :</b> 0120211104</span>
								<div>
									<span><b>Ngày nhập :</b> 21/09/2021</span>
								</div>
								<div>
									<span><b>Hết hạn :</b> 21/11/2021</span>
									<span class="bg-danger text-white px-1">
										Đã hết hạn
									</span>
									<span class="bg-warning text-white px-1">
										Sắp hết hạn
									</span>
								</div>
								<div>
									<span><b>Số lượng nhập :</b> 0 Trái</span>
								</div>
								<div>
									<span><b>Giá nhập :</b> 50.000đ/Trái</span>
								</div>
								<div>
									<span><b>Nguồn nhập từ :</b> cửa hàng 123 ( địa chỉ 154/5 p4 , tp.HCM )</span>
								</div>
							</div>
						</div>

						<div class="mx-2 mt-3 text-break text-wrap">
							<div class="d-flex flex-sm-column flex-row">
								<div>
									<button class="mt-2 mx-1 btn btn-danger">
										Xóa
									</button>
								</div>
								<div>
									<button class="mt-2 mx-1 btn btn-warning">
										Sửa
									</button>
								</div>
								<div>
									<button class="mt-2 mx-1 btn btn-primary">
										Kết
									</button>
								</div>
							</div>
						</div>
					</div>
					@for($j=0 ; $j<3 ; $j++)
					<div class="rounded mt-1 border border-dark p-1 d-flex flex-sm-row flex-column justify-content-between">
						<div class="d-flex flex-row text-break text-wrap">
							<div>
								<img src="{{asset('public/media/img-icons/done.png')}}" width="60">
							</div>
							<div class="mx-2">
								<span><b>Mã Lô :</b> 0120211104</span>
								<div>
									<span><b>Ngày nhập :</b> 21/09/2021</span>
								</div>
								<div>
									<span><b>Hết hạn :</b> 21/11/2021</span>
								</div>
								<div>
									<span><b>Số lượng nhập :</b> 0 Trái</span>
								</div>
								<div>
									<span><b>Giá nhập :</b> 50.000đ/Trái</span>
								</div>
								<div>
									<span><b>Nguồn nhập từ :</b> cửa hàng 123 ( địa chỉ 154/5 p4 , tp.HCM )</span>
								</div>
								<div>
									<span><b>Đã bán : </b> 50/50 Trái</span>
								</div>
								<div>
									<span><b>Hủy : </b> 0/50 Trái</span>
								</div>
								<div>
									<span><b>Ghi chú : </b></span>
								</div>
							</div>
						</div>
					</div>
					@endfor				
				</div>
			</div>
		</div>
	</div>
</section>

<div>
	<!-- Modal view image -->
	<div class="modal fade" id="ViewImgModal" tabindex="-1" aria-labelledby="ViewImgModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered">
			<div class="modal-body">
				<form>
					<div class="form-group">
						<img id="idzoomimgPrew" src="{{asset('/public/media/img-product/chuoi.png')}}" style="max-width: 100%;" alt="...">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div>
	<div class="modal fade" id="AddImportProductModal" tabindex="-1" aria-labelledby="AddImportProductModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title font-weight-bold text-info" id="AddImportProductModalLabel">
					 Nhập lô mới
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="#">
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">
							Mã lô hàng :</label>
							<input 
								type="text" 
								class="form-control" 
								id="recipient-name" 
								autofocus
								required>
						</div>
						<div class="mb-3 form-check">
							<label class="form-check-label" for="outdate_checkbox" data-toggle="collapse" data-target="#collapseOutDate" aria-expanded="false" aria-controls="collapseOutDate">
							<input 
								type="checkbox" 
								checked 
								class="form-check-input" 
								id="outdate_checkbox">
								Áp dụng hết hạn
							</label>
						</div>
						<div class="form-group row">
							<div class="column ml-3">
								<label for="importdate_input" class="col-form-label">
								Ngày nhập :</label>
								<input 
								type="date" 
								value="<?php echo date('Y-m-d'); ?>" 
								class="form-control" 
								id="importdate_input"
								required>								
							</div>							
							<div class="column ml-3 collapse show" id="collapseOutDate">
								<label for="outdate_input" class="col-form-label">
								Hạn sử dụng :</label>
								<input 
									type="date" 
									value="<?php echo date('Y-m-d'); ?>" 
									class="form-control" 
									id="outdate_input">
							</div>
						</div>
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">
							Số lượng nhập :</label>
							<input 
							type="number" 
							class="form-control" 
							id="recipient-name"
							type="number"
							value="0"
							min="0" 
							max="99999" 
							step="10"
							required>
						</div>
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">
							Giá nhập :</label>
							<div class="input-group mb-2">
								<input 
								type="number" 
								class="form-control" 
								id="inlineFormInputGroup"
								value="0"
								min="0" 
								max="100000000" 
								step="10000" 
								placeholder="Giá nhập ...">
								<div class="input-group-prepend">
									<div class="input-group-text">Đồng</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">
							Nhập từ cửa hàng :</label>
							<input class="form-control" list="datalistFrom" id="exampleDataList" placeholder="Nhập từ ..." required>
							<datalist id="datalistFrom">
								@for($k=1; $k < 5; $k++)
								<option value="Cửa hàng {{$k}}">
								@endfor
							</datalist>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
					<button type="submit" class="btn btn-primary">Lưu</button>
				</div>
			</form>
			</div>
		</div>
	</div>	
</div>
@endsection