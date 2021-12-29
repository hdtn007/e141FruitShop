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
{{-- end messenger box --}}
<div class="container-fluid">
	<div class="mb-5">
		<h1 class="h3 mb-0 text-gray-800">Tag thương hiệu</h1>
	</div>
	<!-- Content Row -->
	<div class="row">
		<!-- Area Chart -->
		<div class="col-xl-7 col-lg-7">
			<div class="card mb-4">
				<!-- Card Header - Dropdown -->
				<div
				class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-danger">Tag quốc gia ( xuất xứ )
						<img src="{{asset('public/media/img-icons/country/vietnam.png')}}" width="28">
					</h6> 
					<div class="dropdown no-arrow">
						<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							{{-- <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i> --}}
							<a class="btn border-info bg-white"
								 href="#" 
								 type="button" 
								 data-toggle="modal" 
								 data-target="#AddCountryModal">
							<i class="fas fa-plus nav-item text-info "></i>
						</a>
							
						</a>
					</div>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<div class="nav flex-column nav-pills list-group list-group-flush" id="brandtag-pills-tablist" role="tablist" aria-orientation="vertical">
						<?php
						 $stt = 1;
						 ?>
						@foreach ($list_country as $key => $co_pro)

						@if($stt==1)

						<a class="nav-link list-group-item d-flex justify-content-between active" id="brandtag-pills-list-0{{$co_pro->country_id}}" data-toggle="pill" href="#brandtag-pills-tab-0{{$co_pro->country_id}}" role="tab" aria-controls="brandtag-pills-tab-0{{$co_pro->country_id}}" aria-selected="true">
							<p>
								<img src="{{asset('public/media/img-icons/country/'.$co_pro->country_ensign)}}" width="22">
								{{$co_pro->country_name}}
								<span class="badge badge-success badge-pill">
								{{$co_pro->country_counttag}}
								</span>
							</p>
							<div>
								<button class="btn btn-warning"
										type="button"
										data-toggle="modal" 
										data-target="#BrandTagCountryModalEdit" 
										data-namecountry="{{$co_pro->country_name}}"
										data-ensigncountry="{{$co_pro->country_ensign}}" 
										data-idcountry="{{$co_pro->country_id}}"
										data-desccountry="{{$co_pro->country_desc}}">
									<i class="far fa-edit"></i>
								</button>
								<button onclick="
																var r = confirm('Bạn có muốn xóa tag quốc gia {{$co_pro->country_name}} !');
																if (r == true) {
																	location.href='{{URL::to('/delete-country/'.$co_pro->country_id)}}';
																}"
																class="btn btn-danger">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</a>
							@else
							<a class="nav-link list-group-item d-flex justify-content-between" id="brandtag-pills-list-0{{$co_pro->country_id}}" data-toggle="pill" href="#brandtag-pills-tab-0{{$co_pro->country_id}}" role="tab" aria-controls="brandtag-pills-tab-0{{$co_pro->country_id}}" aria-selected="true">
							<p>
								<img src="{{asset('public/media/img-icons/country/'.$co_pro->country_ensign)}}" width="22">
								{{$co_pro->country_name}}
								<span class="badge badge-success badge-pill">
									{{$co_pro->country_counttag}}
								</span>
							</p>
							<div>
								<button class="btn btn-warning"
										type="button"
										data-toggle="modal" 
										data-target="#BrandTagCountryModalEdit" 
										data-namecountry="{{$co_pro->country_name}}"
										data-ensigncountry="{{$co_pro->country_ensign}}" 
										data-idcountry="{{$co_pro->country_id}}"
										data-desccountry="{{$co_pro->country_desc}}">
									<i class="far fa-edit"></i>
								</button>
								<button onclick="
																var r = confirm('Bạn có muốn xóa tag quốc gia {{$co_pro->country_name}} !');
																if (r == true) {
																	location.href='{{URL::to('/delete-country/'.$co_pro->country_id)}}';
																}"
																class="btn btn-danger">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</a>

							@endif

							<?php
								$stt = $stt + 1;
							 ?>
						@endforeach
					</div>
				</div>
			</div>
		</div>

		<!-- Pie Chart -->
		<div class="col-xl-5 col-lg-5">
			<div class="card mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-dark">Tag nhãn hiệu <i class="fas fa-trophy text-warning"></i></h6>
					<div class="dropdown no-arrow">
						{{-- ...... --}}
					</div>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<div class="tab-content" id="brandtag-pills-tabContent">
						<?php
							$stt_tag = 1;
						?>
						@foreach ($list_country as $key => $co_pro)

						@if($stt_tag == 1)
						<div class="tab-pane fade show active" id="brandtag-pills-tab-0{{$co_pro->country_id}}" role="tabpanel" aria-labelledby="brandtag-pills-list-0{{$co_pro->country_id}}">
							<p class="text-gray-dark">Các thương hiệu đến từ {{$co_pro->country_name}} <img src="{{asset('public/media/img-icons/country/'.$co_pro->country_ensign)}}" width="22"> :</p>
							@foreach ($list_brand as $keys => $brand_pro)
							@if($brand_pro->brand_country_id == $co_pro->country_id)
							<span class="bg-warning rounded-pill px-2 mx-2 text-gray-800">
								<b>{{$brand_pro->brand_name}}</b> <a onclick="return confirm('Bạn có muốn xóa tag thương hiệu {{$brand_pro->brand_name}}')" href="{{URL::to('/delete-brand/'.$brand_pro->brand_id.'&'.$co_pro->country_id)}}"><i class="fas fa-times"></i></a>
							</span>
							@endif
							@endforeach
							<a class="mx-1 px-1 span bg-light text-info rounded-pill"
									 href="#" 
									 type="button" 
									 data-toggle="modal" 
									 data-namecountry="{{$co_pro->country_name}}"
									 data-idcountry ="{{$co_pro->country_id}}"
									 data-target="#AddBrandTagModal">
									<i class="fas fa-plus nav-item text-info bg-light px-2 rounded-pill "></i>
							</a>
						</div>
						@else
						<div class="tab-pane fade" id="brandtag-pills-tab-0{{$co_pro->country_id}}" role="tabpanel" aria-labelledby="brandtag-pills-list-0{{$co_pro->country_id}}">
							<p class="text-gray-dark">Các thương hiệu đến từ {{$co_pro->country_name}} <img src="{{asset('public/media/img-icons/country/'.$co_pro->country_ensign)}}" width="22"> :</p>
							@foreach ($list_brand as $keys => $brand_pro)
							@if($brand_pro->brand_country_id == $co_pro->country_id)
							<span class="bg-warning rounded-pill px-2 mx-2 text-gray-800">
								<b>{{$brand_pro->brand_name}}</b> <a onclick="return confirm('Bạn có muốn xóa tag thương hiệu {{$brand_pro->brand_name}}')" href="{{URL::to('/delete-brand/'.$brand_pro->brand_id.'&'.$co_pro->country_id)}}"><i class="fas fa-times"></i></a>
							</span>
							@endif
							@endforeach
							<a class="mx-1 px-1 span bg-light text-info rounded-pill"
									 href="#" 
									 type="button" 
									 data-toggle="modal" 
									 data-namecountry="{{$co_pro->country_name}}"
									 data-idcountry ="{{$co_pro->country_id}}"
									 data-target="#AddBrandTagModal">
									<i class="fas fa-plus nav-item text-info bg-light px-2 rounded-pill "></i>
							</a>
						</div>
						@endif
						<?php
							$stt_tag = $stt_tag + 1;
						?>
						@endforeach
					</div>
				</div>
			</div>
		</div>

		<!-- Pie Chart -->
		<div class="col-12">
			<div class="card shadow-sm mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-dark">Nhà cung cấp <i class="fas fa-home text-info"></i></h6>
					<div class="dropdown no-arrow">
						<div>
							<button 
							   class="btn border-info bg-white text-info" 
								 href="#" 
								 type="button" 
								 data-toggle="modal" 
								 data-target="#supplier_modal">
								<i class="fas fa-plus"></i>
							</button>
						</div>
					</div>
				</div>
				<!-- Card Body -->
				@foreach ($list_supplier as $key => $sup_pro)
				<div class="card-body">
					<div class="d-flex bd-highlight">
						<div class="w-100 bd-highlight mt-2 p-1 border border-dark">
						<p>
							<span class="text-info font-weight-bold">
								<i class="fas fa-home text-info"></i>
								{{$sup_pro->supplier_code}}. {{$sup_pro->supplier_name}}
								<button 
									 class="btn-sm btn btn-outline-warning"
									 type="button" 
									 data-toggle="modal" 
									 data-namesupplier="{{$sup_pro->supplier_name}}"
									 data-addresssupplier ="{{$sup_pro->supplier_address}}"
									 data-phonesupplier="{{$sup_pro->supplier_phone}}"
									 data-emailsupplier="{{$sup_pro->supplier_email}}"
									 data-idsupplier="{{$sup_pro->supplier_id}}"
									 data-target="#supplier_modal_edit">
									<i class="fas fa-edit"></i>
								</button>
							</span>
								
							<br>
							<i class="fas fa-map-marker-alt"></i>
							__Địa chỉ : {{$sup_pro->supplier_address}}
							<br>
							<i class="fas fa-phone-square-alt"></i>
							__SĐT : <a href="tel://{{$sup_pro->supplier_phone}}">{{$sup_pro->supplier_phone}}</a>
							<br>
							<i class="fas fa-envelope"></i>
							__Email : <a href="mailto:{{$sup_pro->supplier_email}}">{{$sup_pro->supplier_email}}</a>
						</p>
					</div>
					<div class="p-1 flex-shrink-1 bd-highlight">
						<a onclick="return confirm('Bạn có muốn xóa nhà cung cấp {{$sup_pro->supplier_name}} ?')" href="{{URL::to('/delete-supplier/'.$sup_pro->supplier_id)}}" class="text-danger text-decoration-none">
							<i class="fas fa-backspace"></i>
						</a>
					</div>						
					</div>
				</div>
				@endforeach

			</div>
		</div>
	</div>
</div>

<!-- Modal add country -->
<div>
    <div class="modal fade" id="AddCountryModal" tabindex="-1" role="dialog" aria-labelledby="AddCountryModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
          <div class="modal-header">
           <h5 class="modal-title" id="AddCountryModalLabel">Thêm xuất xứ</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
          </div>
          <div class="modal-body">
            <form 
									id="form_add_country" 
									name="form_add_country" 
									action="{{URL::to('/add-country')}}" 
									onsubmit="return validateFormAddCountry()" 
									method="post"
									enctype="multipart/form-data">
							{{csrf_field()}}
							<div class="form-group">
								<label for="recipient-name" class="col-form-label">Tên quốc gia :</label>
								<input 
											type="text" 
											class="form-control" 
											name="add_name_country" 
											id="add_name_country"
											required
											maxlength="50">
							</div>
							<div class="form-group">
								<label for="recipient-name" class="col-form-label">Giới thiệu chung :</label>
								<textarea
											type="text" 
											class="form-control" 
											name="input_add_country_desc" 
											id="input_add_country_desc"
											required
											rows="2"
											maxlength="100"></textarea>
							</div>
							<div class="input-group mb-0">
								<label for="input_add_country_img" class="col-form-label bg-light px-2 rounded-pill" style="cursor: pointer; font-size: 14px;">Thêm ảnh <i class="fas fa-upload"></i> </label>
								<div class="align-middle mx-3 mt-1">
			        			<img 
			        					id="Addcountry_imgpreview" 
			        					class="img-avatar-preview" 
			        					src="{{asset('public/media/img-icons/country/vietnam.png')}}"
			        					width="28">
			        		</div>
								<div class="custom-file">
									<input 
												hidden 
												type="file" 
												class="custom-file-input" 
												id="input_add_country_img"
												name="input_add_country_img" 
												accept="image/*"
												onchange="PreviewUploadImage(this)"
												data-bs-img-preview="Addcountry_imgpreview" 
												data-bs-mess-err="mess_err_add_country_img"
												>
								</div>
							</div>
							<div class="mt-0 mb-3">
								<small id="mess_err_add_country_img" class="form-text text-muted">
										Bạn chưa chọn ảnh quốc kỳ !
								</small>
							</div>
							<br>
							<div class="float-right">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">
											Hủy
								</button>
								<input type="submit" class="btn btn-primary" value="Lưu" >
							</div>
						</form>
          </div>
        </div>
      </div>
    </div>    
</div>

<!-- Modal Edit country __________________________________________________________ -->
<div>
	<div>
		<div class="modal fade" id="BrandTagCountryModalEdit" tabindex="-1" role="dialog" aria-labelledby="BrandTagCountryModalEditLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="BrandTagCountryModalEditLabel">Thông tin xuất xứ từ</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form 
								id="form_edit_country" 
								name="form_edit_country" 
								action="{{URL::to('/edit-country')}}" 
								onsubmit="return validateFormEditCountry()" 
								method="post"
								enctype="multipart/form-data">
							{{csrf_field()}}
							<div class="form-group">
								<label for="recipient-name" class="col-form-label">Tên quốc gia :</label>
								<input 
											type="text" 
											class="form-control" 
											name="input_edit_name_country" 
											id="input_edit_name_country"
											required
											maxlength="50">
							</div>
							<div class="form-group">
								<label for="recipient-name" class="col-form-label">Giới thiệu chung :</label>
								<textarea
											type="text" 
											class="form-control" 
											name="input_edit_country_desc" 
											id="input_edit_country_desc"
											required
											rows="2"
											maxlength="100"></textarea>
							</div>
							<div class="input-group mb-0">
								<label for="input_edit_country_img" class="col-form-label bg-light px-2 rounded-pill" style="cursor: pointer; font-size: 14px;">Thêm ảnh <i class="fas fa-upload"></i> </label>
								<div class="align-middle mx-3 mt-1">
			        			<img 
			        					id="country_edit_imgpreview" 
			        					class="img-avatar-preview" 
			        					src=""
			        					width="28">
			        		</div>
								<div class="custom-file">
									<input 
												hidden 
												type="file" 
												class="custom-file-input" 
												id="input_edit_country_img"
												name="input_edit_country_img" 
												accept="image/*"
												onchange="PreviewUploadImage(this)"
												data-bs-img-preview="country_edit_imgpreview" 
												data-bs-mess-err="mess_err_edit_country_img"
												>
								</div>
							</div>
							<div class="mt-0 mb-3">
								<small id="mess_err_edit_country_img" class="form-text text-muted">Chọn ảnh quốc kỳ !</small>
							</div>

							<div class="code-edit-modal-hidden">
								<input hidden type="text" class="form-control" name="input_id_country" id="input_id_country" required="true" readonly>
							</div>
							<br>
							<div class="float-right">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
								<input type="submit" class="btn btn-primary" value="Lưu" >
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>    
	</div>
</div>

<!-- Modal add brand tag -->
<div>
    <div class="modal fade" id="AddBrandTagModal" tabindex="-1" role="dialog" aria-labelledby="AddBrandTagModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
          <div class="modal-header">
           <h5 class="modal-title" id="AddBrandTagModalLabel">Thêm xuất xứ</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
          </div>
          <div class="modal-body">
            <form 
								id="form_add_brand" 
								name="form_add_brand" 
								action="{{URL::to('/add-brand')}}" 
								method="post"
								enctype="multipart/form-data">
							{{csrf_field()}}
							<div class="form-group">
								<label for="recipient-name" class="col-form-label">Nhãn hiệu :</label>
								<input 
											type="text" 
											class="form-control" 
											name="add_name_brand" 
											id="add_name_brand"
											required
											maxlength="50">
											<small class="form-text text-muted">
												Hãy nhập tên thương hiệu vào đây !
											</small>
							</div>
							<div class="code-edit-modal-hidden">
								<input hidden type="text" class="form-control" name="input_id_country" id="input_id_country" required="true" readonly>
							</div>
							<br>
							<div class="float-right">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
								<input type="submit" class="btn btn-primary" value="Lưu" >
							</div>
						</form>
          </div>
        </div>
      </div>
    </div>    
</div>

<!-- Modal add supplier -->
<div>
    <div class="modal fade" id="supplier_modal" tabindex="-1" role="dialog" aria-labelledby="supplier_modalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
          <div class="modal-header">
           <h5 class="modal-title" id="supplier_modalLabel">Thêm nhà cung cấp</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
          </div>
          <div class="modal-body">
            <form
								id="form_add_supplier"
								name="form_add_supplier"
								action="{{URL::to('/add-supplier')}}"
								method="post"
								enctype="multipart/form-data">
							{{csrf_field()}}
							<div class="form-group">
								<label for="recipient-name" class="col-form-label">Tên nhà cung cấp :</label>
								<input 
											type="text" 
											class="form-control" 
											name="add_name_supplier" 
											id="add_name_supplier"
											required
											maxlength="50">
							</div>
							<div class="form-group">
								<label for="recipient-name" class="col-form-label">Địa chỉ :</label>
								<input 
											type="text" 
											class="form-control" 
											name="add_address_supplier" 
											id="add_address_supplier"
											required>
							</div>
							<div class="form-group">
								<label for="recipient-name" class="col-form-label">Số điện thoại :</label>
								<input 
											type="text" 
											class="form-control" 
											name="add_phone_supplier" 
											id="add_phone_supplier"
											maxlength="11">
							</div>
							<div class="form-group">
								<label for="recipient-name" class="col-form-label">Email :</label>
								<input 
											type="email" 
											class="form-control" 
											name="add_email_supplier" 
											id="add_email_supplier"
											maxlength="50">
							</div>
							<br>
							<div class="float-right">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
								<input type="submit" class="btn btn-primary" value="Lưu" >
							</div>
						</form>
          </div>
        </div>
      </div>
    </div>    
</div>

<!-- Modal edit supplier -->
<div>
    <div class="modal fade" id="supplier_modal_edit" tabindex="-1" role="dialog" aria-labelledby="supplier_modal_editLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
          <div class="modal-header">
           <h5 class="modal-title" id="supplier_modal_editLabel">Sửa nhà cung cấp</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
          </div>
          <div class="modal-body">
            <form
								id="form_edit_supplier"
								name="form_edit_supplier"
								action="{{URL::to('/edit-supplier')}}"
								method="post">
							{{csrf_field()}}
							<div class="form-group">
								<label for="recipient-name" class="col-form-label">Tên nhà cung cấp :</label>
								<input 
											type="text" 
											class="form-control" 
											name="edit_name_supplier" 
											id="edit_name_supplier"
											required
											maxlength="50">
							</div>
							<div class="form-group">
								<label for="recipient-name" class="col-form-label">Địa chỉ :</label>
								<input 
											type="text" 
											class="form-control" 
											name="edit_address_supplier" 
											id="edit_address_supplier"
											required>
							</div>
							<div class="form-group">
								<label for="recipient-name" class="col-form-label">Số điện thoại :</label>
								<input 
											type="text" 
											class="form-control" 
											name="edit_phone_supplier" 
											id="edit_phone_supplier"
											maxlength="11">
							</div>
							<div class="form-group">
								<label for="recipient-name" class="col-form-label">Email :</label>
								<input 
											type="email" 
											class="form-control" 
											name="edit_email_supplier" 
											id="edit_email_supplier"
											maxlength="50">
							</div>
							<div class="code-edit-modal-hidden">
								<input hidden type="text" class="form-control" name="input_id_supplier_edit" id="input_id_supplier_edit" required="true" readonly>
							</div>
							<br>
							<div class="float-right">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
								<input type="submit" class="btn btn-primary" value="Lưu" >
							</div>
						</form>
          </div>
        </div>
      </div>
    </div>    
</div>

@endsection