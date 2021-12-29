@extends('admin-layout')

@section('admin-content')
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

	Toast.fire({
		icon: 'success',
		title: '{{$mess_success}}'
	})
</script>
<?php
}
Session::put('mess_success', null);
?>
</div>
{{-- end messenger box--}}
<div class="container-fluid">
	<div class="mb-1">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb breadcrumb-custom">
				<li class="breadcrumb-item">
					<a class="text-decoration-none" href="{{URL::to('/manage-product')}}" data-abc="true">Tất cả sản phẩm</a>
				</li>
				<li class="breadcrumb-item">
					<a class="text-decoration-none" href="{{URL::to('/manage-product/detail/'.$detail_pro->product_code)}}" data-abc="true">{{$detail_pro->product_name}}</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">
					<span>Cập nhật</span>
				</li>
			</ol>
		</nav>
	</div>
</div>
<section class="container-fluid bg-white mx-1 mb-0 px-2 pt-2 pb-5 rounded shadow-sm">
	{{-- info sản phẩm --}}
	<div id="default" class="detail-product">
	<form
		class="needs-validation"
		novalidate
		id="form_add_product"
		name="form_add_product"
		role="form" 
		onsubmit="return validationForm()"
		action="{{URL::to('/manage-product/update/save')}}"
		method="post"
		enctype="multipart/form-data"
	> {{csrf_field()}}
		<input hidden type="number" name="input_update_id_product" id="input_update_id_product" value="{{$detail_pro->product_id}}">
		<div class="my-2 d-flex justify-content-between">
			<div>
				<a title="Trở lại trang trước" class="rounded text-white border-white bg-warning page-link" href="{{url()->previous()}}">
					<i class="fas fa-arrow-left"></i>
				</a>
				
			</div>
			<div class="bd-highlight">
				<button type="submit" class="btn bg-info border-info text-white font-weight-bold mr-2">
					Lưu sản phẩm
				</button>
			</div>
		</div>
        <div class="row">
            <div class="col-sm-5 p-2">
            	<p class="my-1 text-primary font-weight-bold">
                		Khung Preview Ảnh :
                </p>
                <div class="img-product-container">
                	@if($detail_pro->product_img1)
                	<a id="btncontrolprew" onclick="showimgmodal(this)" href="" data-toggle="modal" data-target="#ViewImgModal" data-nameimg="{{asset('/public/media/img-product/'.$detail_pro->product_img1)}}">
                		@if($detail_pro->product_img1)
                		<img id="idzoomimg" src="{{asset('/public/media/img-product/'.$detail_pro->product_img1)}}" width="350" />
                		@else
                		<img id="idzoomimg" src="{{asset('/public/media/img-product/none.png')}}" width="350" />
                		@endif
                	</a>
                	@endif
                	<p class="my-1 text-primary font-weight-bold">
                		Cập Nhật Ảnh Sản Phẩm :	
                	</p>
                    <div class="img-product-thumbs d-flex flex-row">

                    	<div class="flex-column d-flex">
	                    	@if($detail_pro->product_img1)
	                    	<a id="link_preview_img_1" onclick="ViewImageProduct(this)" data-bs-img-preview="idzoomimg" data-bs-img-input="{{asset('/public/media/img-product/'.$detail_pro->product_img1)}}"> 
	                    		<img id="preview_img_1" width="80" src="{{asset('/public/media/img-product/'.$detail_pro->product_img1)}}" >
	                    	</a>
	                    	@else
	                    	<a id="link_preview_img_1" onclick="ViewImageProduct(this)" data-bs-img-preview="idzoomimg" data-bs-img-input="{{asset('/public/media/img-product/none.png')}}"> 
	                    		<img id="preview_img_1" width="80" src="{{asset('/public/media/img-product/none.png')}}" >
	                    	</a>
	                    	@endif
	                    	<div class="d-flex mx-auto mt-1">
	                    		<label class="mx-1 text-info cursor-pointer" for="input_update_img1_product">
	                    			<i class="fas fa-plus-square"></i>
	                    		</label>
		                    	<a onclick="return confirm('Chú ý : Khi xóa ảnh, bạn sẽ phải thao tác lại những thay đổi đang được thực hiện !')" href="{{URL::to('/manage-product/delete-img/1'.'&'.$detail_pro->product_code)}}" class="mx-1 text-danger cursor-pointer">
	                    			<i class="fas fa-trash-alt"></i>
	                    		</a>
	                    	</div>
                   		 </div>
                   		
                    	<div class="flex-column d-flex">
	                    	@if($detail_pro->product_img2)
	                    	<a id="link_preview_img_2" onclick="ViewImageProduct(this)" data-bs-img-preview="idzoomimg" data-bs-img-input="{{asset('/public/media/img-product/'.$detail_pro->product_img2)}}"> 
	                    		<img id="preview_img_2" width="80" src="{{asset('/public/media/img-product/'.$detail_pro->product_img2)}}" >
	                    	</a>
	                    	@else
	                    	<a id="link_preview_img_2" onclick="ViewImageProduct(this)" data-bs-img-preview="idzoomimg" data-bs-img-input="{{asset('/public/media/img-product/none.png')}}"> 
	                    		<img id="preview_img_2" width="80" src="{{asset('/public/media/img-product/none.png')}}" >
	                    	</a>
	                    	@endif
	                    	<div class="d-flex mx-auto mt-1">
	                    		<label class="mx-1 text-info cursor-pointer" for="input_update_img2_product">
	                    			<i class="fas fa-plus-square"></i>
	                    		</label>
		                    	<a onclick="return confirm('Chú ý : Khi xóa ảnh, bạn sẽ phải thao tác lại những thay đổi đang được thực hiện !')" href="{{URL::to('/manage-product/delete-img/2'.'&'.$detail_pro->product_code)}}" class="mx-1 text-danger cursor-pointer">
	                    			<i class="fas fa-trash-alt"></i>
	                    		</a>
	                    	</div>
                   		 </div>
                   		
                    	<div class="flex-column d-flex">
	                    	@if($detail_pro->product_img3)
	                    	<a id="link_preview_img_3" onclick="ViewImageProduct(this)" data-bs-img-preview="idzoomimg" data-bs-img-input="{{asset('/public/media/img-product/'.$detail_pro->product_img3)}}"> 
	                    		<img id="preview_img_3" width="80" src="{{asset('/public/media/img-product/'.$detail_pro->product_img3)}}" >
	                    	</a>
	                    	@else
	                    	<a id="link_preview_img_3" onclick="ViewImageProduct(this)" data-bs-img-preview="idzoomimg" data-bs-img-input="{{asset('/public/media/img-product/none.png')}}"> 
	                    		<img id="preview_img_3" width="80" src="{{asset('/public/media/img-product/none.png')}}" >
	                    	</a>
	                    	@endif
	                    	<div class="d-flex mx-auto mt-1">
	                    		<label class="mx-1 text-info cursor-pointer" for="input_update_img3_product">
	                    			<i class="fas fa-plus-square"></i>
	                    		</label>
		                    	<a onclick="return confirm('Chú ý : Khi xóa ảnh, bạn sẽ phải thao tác lại những thay đổi đang được thực hiện !')" href="{{URL::to('/manage-product/delete-img/3'.'&'.$detail_pro->product_code)}}" class="mx-1 text-danger cursor-pointer">
	                    			<i class="fas fa-trash-alt"></i>
	                    		</a>
	                    	</div>
                   		 </div>
                   		
                    	<div class="flex-column d-flex">
	                    	@if($detail_pro->product_img4)
	                    	<a id="link_preview_img_4" onclick="ViewImageProduct(this)" data-bs-img-preview="idzoomimg" data-bs-img-input="{{asset('/public/media/img-product/'.$detail_pro->product_img4)}}"> 
	                    		<img id="preview_img_4" width="80" src="{{asset('/public/media/img-product/'.$detail_pro->product_img4)}}" >
	                    	</a>
	                    	@else
	                    	<a id="link_preview_img_4" onclick="ViewImageProduct(this)" data-bs-img-preview="idzoomimg" data-bs-img-input="{{asset('/public/media/img-product/none.png')}}"> 
	                    		<img id="preview_img_4" width="80" src="{{asset('/public/media/img-product/none.png')}}" >
	                    	</a>
	                    	@endif
	                    	<div class="d-flex mx-auto mt-1">
	                    		<label class="mx-1 text-info cursor-pointer" for="input_update_img4_product">
	                    			<i class="fas fa-plus-square"></i>
	                    		</label>
		                    	<a onclick="return confirm('Chú ý : Khi xóa ảnh, bạn sẽ phải thao tác lại những thay đổi đang được thực hiện !')" href="{{URL::to('/manage-product/delete-img/4'.'&'.$detail_pro->product_code)}}" class="mx-1 text-danger cursor-pointer">
	                    			<i class="fas fa-trash-alt"></i>
	                    		</a>
	                    	</div>
                   		 </div>

                    	<div class="flex-column d-flex">
                    		@if($detail_pro->product_img5)
	                    	<a id="link_preview_img_5" onclick="ViewImageProduct(this)" data-bs-img-preview="idzoomimg" data-bs-img-input="{{asset('/public/media/img-product/'.$detail_pro->product_img5)}}"> 
	                    		<img id="preview_img_5" width="80" src="{{asset('/public/media/img-product/'.$detail_pro->product_img5)}}" >
	                    	</a>
	                    	@else
	                    	<a id="link_preview_img_5" onclick="ViewImageProduct(this)" data-bs-img-preview="idzoomimg" data-bs-img-input="{{asset('/public/media/img-product/none.png')}}"> 
	                    		<img id="preview_img_5" width="80" src="{{asset('/public/media/img-product/none.png')}}" >
	                    	</a>
	                    	@endif
	                    	<div class="d-flex mx-auto mt-1">
	                    		<label class="mx-1 text-info cursor-pointer" for="input_update_img5_product">
	                    			<i class="fas fa-plus-square"></i>
	                    		</label>
		                    	<a onclick="return confirm('Chú ý : Khi xóa ảnh, bạn sẽ phải thao tác lại những thay đổi đang được thực hiện !')" href="{{URL::to('/manage-product/delete-img/5'.'&'.$detail_pro->product_code)}}" class="mx-1 text-danger cursor-pointer">
	                    			<i class="fas fa-trash-alt"></i>
	                    		</a>
	                    	</div>
                   		 </div>

                   		<div>
                   			@for($i=1 ; $i <=5 ; $i++)
                    		<input 
	                    		id="input_update_img{{$i}}_product" 
	                    		hidden type="file" 
	                    		accept="image/*"
	                    		name="input_update_img{{$i}}_product"
	                    		data-bs-img-preview="preview_img_{{$i}}"
	                    		data-link-zoom-img="link_preview_img_{{$i}}"
	                    		onchange="PreviewUploadImage(this)" 
	                    		>
	                    	@endfor
                    	</div>

                    </div>
                </div>
            </div>
            <div class="col-sm-4 info-detail-product p-2">
            	<div class="name-product form-group position-relative">
            		<small class="text-primary font-weight-bold">Mã sản phẩm : </small>
            		<input 
		            	  type="text" 
		            	  class="form-control" 
		            	  name="input_update_code_product"
		            	  id="input_update_code_product" 
		            	  pattern="[A-Za-z0-9]{1,}" 
		            	  maxlength="50"
		            	  onfocusout="check_format_input(2,this)"
		            	  data-mess-err="mess_err_add_code_product" 
		            	  placeholder="VD : 01" 
		            	  value="{{$detail_pro->product_code}}" 
		            	  autofocus
		            	  required
		            	  >
		            <div id="mess_err_add_code_product" class="invalid-tooltip">
		            	Mã sản phẩm chưa hợp lệ.
		            </div>            		
            	</div>
            	<div class="name-product form-group position-relative">
            		<small class="text-primary font-weight-bold">Tên sản phẩm : </small>
            		<input 
		            	  type="text" 
		            	  class="form-control" 
		            	  name="input_update_name_product"
		            	  id="input_update_name_product"
		            	  maxlength="100"
		            	  data-mess-err="mess_err_add_name_product"
		            	  placeholder="VD : CHUỐI FOHLA" 
		            	  value="{{$detail_pro->product_name}}" 
		            	  required
		            	  >
		            <div id="mess_err_add_name_product" class="invalid-tooltip">
		            	Tên sản phẩm chưa hợp lệ.
		            </div>            		
            	</div>
            	<div class="name-product form-group position-relative">
            		<small class="text-primary font-weight-bold">Đơn vị tính : </small>
            		<div class="input-group">
            			<input 
            			onchange="auto_change_text_dvt(this)" 
            			type="number" 
            			class="form-control" 
            			id="input_update_numberunit_product" 
            			name="input_update_numberunit_product" 
            			maxlength="10" 
            			value="{{$detail_pro->product_number_unit}}"
            			min="0" 
            			placeholder="Số lượng" 
            			required>
            			<div id="mess_err_add_numberunit_product" class="invalid-tooltip">
		            	Số lượng đơn vị chưa hợp lệ.
		           		 </div>
            			
            			<input onfocus="this.value=''" onchange="auto_change_text_dvt(this)" type="text" class="form-control" list="datalist_product_unit" id="input_update_unit_product" name="input_update_unit_product" placeholder="Đơn vị ..." maxlength="20" value="{{$detail_pro->product_unit}}" required>
            			<datalist id="datalist_product_unit">
            				<option value="Cặp">Cặp</option>
            				<option value="Cây">Cây</option>
            				<option value="Chai">Chai</option>
            				<option value="gram">gram</option>
            				<option value="Kg">Kg</option>
            				<option value="Hộp">Hộp</option>
            				<option value="Lon">Lon</option>
            				<option value="Gói">Gói</option>
            				<option value="Giỏ">Giỏ</option>
            				<option value="Lọ">Lọ</option>
            				<option value="Lốc">Lốc</option>
            				<option value="Mâm">Mâm</option>
            				<option value="Túi">Túi</option>
            				<option value="Thùng">Thùng</option>
            				<option value="Trái">Trái</option>
            				<option value="Tuýp">Tuýp</option>
            				<option value="Tép">Tép</option>
            				<option value="Vỉ">Vỉ</option>
            			</datalist>
            		{{-- 	<select onchange="auto_change_text_dvt(this)" class="form-control" id="input_update_unit_product" name="input_update_unit_product" required>
            				<option value="Cặp">Cặp</option>
            				<option value="Cây">Cây</option>
            				<option value="Chai">Chai</option>
            				<option value="gram">gram</option>
            				<option value="Kg">Kg</option>
            				<option value="Hộp">Hộp</option>
            				<option value="Lon">Lon</option>
            				<option value="Gói">Gói</option>
            				<option value="Giỏ">Giỏ</option>
            				<option value="Lọ">Lọ</option>
            				<option value="Lốc">Lốc</option>
            				<option value="Mâm">Mâm</option>
            				<option value="Túi">Túi</option>
            				<option value="Thùng">Thùng</option>
            				<option value="Trái">Trái</option>
            				<option value="Tuýp">Tuýp</option>
            				<option value="Tép">Tép</option>
            				<option value="Vỉ">Vỉ</option>
            			</select> --}}
            		</div>
            		<small>Lưu ý : là khối lượng nhỏ nhất có thể bán ra</small>
		            <div id="mess_err_add_brand_product" class="invalid-tooltip">
		            	Thương hiệu chưa hợp lệ.
		            </div>            		
            	</div>
            	<div class="name-product form-group position-relative">
            		<small class="text-primary font-weight-bold">Thuộc danh mục : </small>
            		<select class="custom-select" id="input_update_category_product" name="input_update_category_product" required>
            			<option disabled>Danh mục...</option>
            			@foreach ($list_category_product as $key => $cate_pro)
            				@if($cate_pro->category_sub == 0)
            				<option {{$detail_pro->product_category_id === $cate_pro->category_id ? 'selected':''}} value="{{$cate_pro->category_id}}">
            					{{$cate_pro->category_name}}
            				</option>
	            				@foreach ($list_category_product as $keys => $cate_sub_pro)
	            				@if($cate_sub_pro->category_sub ==  $cate_pro->category_id)
	            				<option class="small" {{$detail_pro->product_category_id === $cate_sub_pro->category_id ? 'selected':''}} value="{{$cate_sub_pro->category_id}}">
	            						&emsp;__  {{$cate_sub_pro->category_name}} 	
	            				</option>
	            				@endif
	            				@endforeach
            				@endif
            			@endforeach
            		</select>
		            <div id="mess_err_add_name_product" class="invalid-tooltip">
		            	Danh mục chưa hợp lệ.
		            </div>            		
            	</div>
            	<div class="name-product form-group position-relative">
            		<small class="text-primary font-weight-bold">Xuất xứ - Thương hiệu : </small>
            		<select class="custom-select" id="input_update_country_product" name="input_update_country_product" required>
            			<option disabled>Xuất xứ...</option>
            			@foreach ($list_country as $keys => $count_pro)
            			<option 
            			<?php
            				if (($detail_pro->product_brand_id == null) & ($detail_pro->product_country_id == $count_pro->country_id )) {
            					echo 'selected';
            				}
            				else echo '';
            			?>
            			value="{{$count_pro->country_id}}">
            				{{$count_pro->country_name}}
            				@foreach ($list_brand as $keyss => $brand_pro)
            				@if($brand_pro->brand_country_id == $count_pro->country_id)
	            				<option 
	            				{{$detail_pro->product_brand_id != null ? 'selected':''}}
	            				class="small" 
	            				value="{{$count_pro->country_id.'-'.$brand_pro->brand_id}}">
	            					&emsp;__ {{$brand_pro->brand_name}}
	            				</option>
            				@endif
            				@endforeach
            			</option>
            			@endforeach
            		</select>
		            <div id="mess_err_add_country_product" class="invalid-tooltip">
		            	Xuất xứ chưa hợp lệ.
		            </div>            		
            	</div>
{{--             	<div class="name-product form-group position-relative">
            		<small class="text-primary font-weight-bold">Thương hiệu : </small>
            		<select class="custom-select" id="input_update_brand_product" name="input_update_brand_product" required>
            			<option>Thương hiệu...</option>
            			<option class="branddropdown" hidden value="">Đà lạc</option>
            			<option class="branddropdown" value="">Onichan</option>
            		</select>
		            <div id="mess_err_add_brand_product" class="invalid-tooltip">
		            	Thương hiệu chưa hợp lệ.
		            </div>            		
            	</div> --}}
            	<div class="name-product input-group position-relative">
            		<small class="text-primary font-weight-bold">Giá nhập : </small>
            		&nbsp;
            		<input 
		            	  type="number" 
		            	  class="form-control" 
		            	  name="input_update_import_price_product"
		            	  id="input_update_import_price_product"
		            	  maxlength="10"
		            	  step="any"
		            	  onfocusout="auto_check_price(this)"
		            	  data-mess-err="mess_err_add_import_price_product"
		            	  placeholder="VD : 100000"
		            	  value="{{$detail_pro->product_import_price}}" 
		            	  required
		            	  >
		            	  <div class="input-group-prepend">
		            	  	<div class="input-group-text">Đồng/<div class="dvt__dvt">{{$detail_pro->product_number_unit}}{{$detail_pro->product_unit}}</div></div>
		            	  </div>
		            <div id="mess_err_add_import_price_product" class="invalid-tooltip">
		            	Giá nhập chưa hợp lệ.
		            </div>            		
            	</div>
            	<div class="name-product input-group position-relative">
            		<small class="text-primary font-weight-bold">Giá bán : </small>
            		&nbsp;
            		<input 
		            	  type="number" 
		            	  class="form-control" 
		            	  name="input_update_sell_price_product"
		            	  id="input_update_sell_price_product"
		            	  maxlength="10"
		            	  step="any"
		            	  onfocusout="auto_check_price(this)"
		            	  data-mess-err="mess_err_add_sell_price_product"
		            	  placeholder="VD : 150000"
		            	  value="{{$detail_pro->product_sell_price}}"
		            	  required
		            	  >
		            	  <div class="input-group-prepend">
		            	  	<div class="input-group-text">Đồng/<div class="dvt__dvt">{{$detail_pro->product_number_unit}}{{$detail_pro->product_unit}}</div></div>
		            	  </div>
		            <div id="mess_err_add_sell_price_product" class="invalid-tooltip">
		            	Giá bán chưa hợp lệ.
		            </div>            		
            	</div>
            	<div class="mt-3 form-check">
            		<label class="form-check-label text-primary font-weight-bold" for="saleprice_checkbox_update_product" data-toggle="collapse" data-target="#collapseSalePrice" aria-expanded="false" aria-controls="collapseSalePrice">
            			<input 
            			type="checkbox" 
            			{{$detail_pro->product_sale_status == 1 ? 'checked':''}} 
            			class="form-check-input" 
            			onclick="input_status_checkbox(this)"
            			value="{{$detail_pro->product_sale_status == 1 ? '1':'0'}}" 
            			id="saleprice_checkbox_update_product"
            			name="saleprice_checkbox_update_product">
            			Áp dụng khuyến mãi
            		</label>
            	</div>
            	<div class="form-group row">						
            		<div class="input-group ml-3 collapse {{$detail_pro->product_sale_status == 1 ? 'show':''}}" id="collapseSalePrice">
            			<small class="text-primary font-weight-bold">Giá khuyến mãi : </small>
            			&nbsp;
            			<input 
            			type="number" 
            			class="form-control" 
            			name="input_update_sale_price_product"
            			id="input_update_sale_price_product"
            			maxlength="10"
            			onfocusout="auto_check_price(this)" 
            			step="any"
            			data-mess-err="mess_err_add_sale_price_product"
            			placeholder="VD : 50000"
            			value="{{$detail_pro->product_sale_price}}" 
            			required
            			>
            			<div class="input-group-prepend">
            				<div class="input-group-text">Đồng/<div class="dvt__dvt">{{$detail_pro->product_number_unit}}{{$detail_pro->product_unit}}</div></div>
            			</div>
            			<div id="mess_err_add_sale_price_product" class="invalid-tooltip">
            				Giá khuyến mãi chưa hợp lệ.
            			</div>  
            		</div>
            	</div>
            	<div class="mt-3 form-check">
            		<label class="form-check-label text-primary font-weight-bold" for="outdate_status_checkbox_update_product" data-toggle="collapse" data-target="#collapseOutDateAddProduct" aria-expanded="false" aria-controls="collapseOutDateAddProduct">
            			<input 
            			type="checkbox"
            			{{$detail_pro->product_def_expires != 0 ? 'checked':''}}  
            			class="form-check-input" 
            			onclick="input_status_checkbox(this)"
            			id="outdate_status_checkbox_update_product"
            			name="outdate_status_checkbox_update_product" 
            			value="{{$detail_pro->product_def_expires == 0 ? '0':'1'}}">
            			Áp dụng hạn sử dụng tiêu chuẩn
            		</label>
            	</div>
            	<div class="form-group row">						
            		<div class="input-group ml-3 collapse {{$detail_pro->product_def_expires != 0 ? 'show':''}}" id="collapseOutDateAddProduct">
            			<div class="input-group">
	            			<small class="text-primary font-weight-bold">Kể từ nsx : </small>
	            			&nbsp;
	            			<input 
	            			type="number" 
	            			class="form-control" 
	            			name="input_update_def_expires_product"
	            			id="input_update_def_expires_product"
	            			maxlength="3"
	            			onfocusout="auto_check_price(this)" 
	            			step="any"
	            			data-mess-err="mess_err_add_sale_price_product"
	            			placeholder="VD : 30"
	            			value="{{$detail_pro->product_def_expires}}" 
	            			required
	            			>
	            			<div class="input-group-prepend">
	            				<select onchange="auto_change_text_ddmmyy(this)" class="custom-select" id="input_update_ddmmyy_product" name="input_update_ddmmyy_product" required>
	            						<option value="1">Ngày</option>
	            						<option value="2">Tháng</option>
	            						<option value="3">Năm</option>
	            				</select>
	            			</div>
            			</div>
            			<div>
            				<p class="ddmmyy small mt-1" ></p>
            			</div>
            		</div>
            	</div>
            	<hr> 
            	<div class="name-product form-group position-relative">
            		<small class="text-primary font-weight-bold">Từ Khóa SEO : </small>
            		<textarea 
		            	  type="text" 
		            	  class="form-control" 
		            	  name="input_update_keywords_product"
		            	  id="input_update_keywords_product"
		            	  maxlength="150"
		            	  rows="3"
		            	  data-mess-err="mess_err_add_keywords_product" 
		            	  placeholder="VD : 01,tukhoa,key"
		            	  data-role="tagsinput" 
		            	  >{{$detail_pro->product_keywords}}</textarea>
		          	 <small>Lưu ý : Các từ khóa SEO cách nhau bởi dấu phẩy ( , ).</small>
		            <div id="mess_err_add_keywords_product" class="invalid-tooltip">
		            	Từ khóa chưa hợp lệ.
		            </div>           		
            	</div>
            	<hr>
        	</div>
        	<div class="col-sm-3 info-detail-product p-2">
        		<div class="d-flex">
        			<label class="switch my-0 " for="input_update_status_product" data-toggle="collapse" data-target=".status_product" aria-expanded="false" aria-controls="collapseAdd_status1_product collapseAdd_status2_product">
        				<input
        				onclick="input_status_checkbox(this)"
        				id="input_update_status_product"
        				name="input_update_status_product" 
        				value="{{$detail_pro->product_status == 1 ? '1':'0'}}" 
        				{{$detail_pro->product_status == 1 ? 'checked':''}}
        				type="checkbox">
        				<div class="slider round"></div>
        			</label>
        			<span id="collapseAdd_status1_product" class="status_product text-success mx-1 align-content-center mx-2 collapse {{$detail_pro->product_status == 1 ? 'show':''}}">
        				Hiện sản phẩm này
        			</span>
        			<span id="collapseAdd_status2_product" class="status_product text-danger mx-1 align-content-center mx-2 collapse {{$detail_pro->product_status == 0 ? 'show':''}}">
        				Ẩn sản phẩm này
        			</span>
        		</div>
        		<hr>
            	<span class="text-dark font-weight-bold">QR:</span>
            	<div class="mt-2 text-center">
            		<div class="flex-column d-flex">
            			@if($detail_pro->product_qrcode)
            			<a id="link_preview_img_qrcode" onclick="ViewImageProduct(this)" data-bs-img-preview="idzoomimg" data-bs-img-input="{{asset('/public/media/img-product/qr-code-product/'.$detail_pro->product_qrcode)}}"> 
            				<img id="preview_img_qrcode" width="80" src="{{asset('/public/media/img-product/qr-code-product/'.$detail_pro->product_qrcode)}}" >
            			</a>
            			@else
            			<a id="link_preview_img_qrcode" onclick="ViewImageProduct(this)" data-bs-img-preview="idzoomimg" data-bs-img-input="{{asset('/public/media/img-product/qr-code-product/plus.png')}}"> 
            				<img id="preview_img_qrcode" width="80" src="{{asset('/public/media/img-product/qr-code-product/plus.png')}}" >
            			</a>
            			@endif
            			<div class="d-flex mx-auto mt-1">
            				<label class="mx-1 h3 text-info cursor-pointer" for="input_update_imgqrcode_product">
            					<i class="fas fa-plus-square"></i>
            				</label>
            				<label class="mx-1 h3 text-danger cursor-pointer">
	                    			<i class="fas fa-trash-alt"></i>
	                    		</label>
	                    </div>
	                </div>
	                <div>
	                	<input 
	                	id="input_update_imgqrcode_product" 
	                	hidden type="file" 
	                	accept="image/*"
	                	name="input_update_imgqrcode_product"
	                	data-bs-img-preview="preview_img_qrcode"
	                	data-link-zoom-img="link_preview_img_qrcode"
	                	onchange="PreviewUploadImage(this)" 
	                	>
	                </div>            		
            	</div>
        	</div>
        </div>
        <div class="mt-2">
        	<div>
        		<span class="text-primary h6 font-weight-bold">Mô tả sản phẩm này :</span>
        		<div class="text-dark form-group mx-1 mx-sm-5 position-relative">
        			<textarea
        				class="form-control p-sm-4"
        				rows="20"
        				id="input_update_desc_product"
        				name="input_update_desc_product"
        				minlength="20"
        				placeholder="Mô tả sản phẩm ít nhất 20 ký tự !"
        				required
        			>{{$detail_pro->product_desc}}</textarea>
        			<div id="mess_err_add_desc_product position-absolute" class="invalid-tooltip">
		            	Mổ tả phải trên 20 từ.
		            </div> 
        		</div>
        	</div>
        </div>
    </form>
    </div>
</section>

<div>
	<!-- Modal view image -->
	<div class="modal fade" id="ViewImgModal" tabindex="-1" aria-labelledby="ViewImgModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered">
			<div class="modal-body">
				<form>
					<div class="form-group">
						<img id="idzoomimgPrew" src="{{asset('/public/media/img-product/'.$detail_pro->product_img1)}}" style="max-width: 100%;" alt="...">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection