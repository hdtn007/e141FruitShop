@extends('admin-layout')

@section('admin-content')
<div class="container-fluid">
	<div class="mb-5">
		<h1 class="h3 mb-0 text-gray-800">Tag thương hiệu</h1>
	</div>
	<!-- Content Row -->
	<div class="row">
		<!-- Area Chart -->
		<div class="col-xl-7 col-lg-7">
			<div class="card shadow mb-4">
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
						<a class="nav-link list-group-item d-flex justify-content-between active" id="brandtag-pills-list-01" data-toggle="pill" href="#brandtag-pills-tab-01" role="tab" aria-controls="brandtag-pills-tab-01" aria-selected="true">
							<p>
								<img src="{{asset('public/media/img-icons/country/vietnam.png')}}" width="22">
								Vietnam
								<span class="badge badge-success badge-pill">14</span>
							</p>
							<div>
								<button class="btn btn-warning"
										type="button"
										data-toggle="modal" 
										data-target="#BrandTagCountryModalEdit" 
										data-namecountry="Vietnam"
										data-ensigncountry="united-kingdom.png" 
										data-idcountry="01">
									<i class="far fa-edit"></i>
								</button>
								<button class="btn btn-danger">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</a>
						<a class="nav-link list-group-item d-flex justify-content-between" id="v-pills-profile-tab" data-toggle="pill" href="#brandtag-pills-tab-02" role="tab" aria-controls="brandtag-pills-tab-02" aria-selected="false">
							<p>
								<img src="{{asset('public/media/img-icons/country/vietnam.png')}}" width="22">
								Vietnam
								<span class="badge badge-success badge-pill">14</span>
							</p>
							<div>
								<button class="btn btn-warning"
										type="button"
										data-toggle="modal" 
										data-target="#BrandTagCountryModalEdit" 
										data-namecountry="Vietnam"
										data-ensigncountry="vietnam.png" 
										data-idcountry="01">
									<i class="far fa-edit"></i>
								</button>
								<button class="btn btn-danger">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</a>
						<a class="nav-link list-group-item d-flex justify-content-between" id="v-pills-messages-tab" data-toggle="pill" href="#brandtag-pills-tab-03" role="tab" aria-controls="brandtag-pills-tab-03" aria-selected="false">
							<p>
								<img src="{{asset('public/media/img-icons/country/vietnam.png')}}" width="22">
								Vietnam
								<span class="badge badge-success badge-pill">14</span>
							</p>
							<div>
								<button class="btn btn-warning"
										type="button"
										data-toggle="modal" 
										data-target="#BrandTagCountryModalEdit" 
										data-namecountry="Vietnam"
										data-ensigncountry="vietnam.png" 
										data-idcountry="01">
									<i class="far fa-edit"></i>
								</button>
								<button class="btn btn-danger">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</a>
						<a class="nav-link list-group-item d-flex justify-content-between" id="v-pills-settings-tab" data-toggle="pill" href="#brandtag-pills-tab-04" role="tab" aria-controls="brandtag-pills-tab-04" aria-selected="false">
							<p>
								<img src="{{asset('public/media/img-icons/country/vietnam.png')}}" width="22">
								Vietnam
								<span class="badge badge-success badge-pill">14</span>
							</p>
							<div>
								<button class="btn btn-warning"
										type="button"
										data-toggle="modal" 
										data-target="#BrandTagCountryModalEdit" 
										data-namecountry="Vietnam"
										data-ensigncountry="vietnam.png" 
										data-idcountry="01">
									<i class="far fa-edit"></i>
								</button>
								<button class="btn btn-danger">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>

		<!-- Pie Chart -->
		<div class="col-xl-5 col-lg-5">
			<div class="card shadow mb-4">
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
						<div class="tab-pane fade show active" id="brandtag-pills-tab-01" role="tabpanel" aria-labelledby="brandtag-pills-list-01">
							<p class="text-gray-dark">Các thương hiệu Vietnam <img src="{{asset('public/media/img-icons/country/vietnam.png')}}" width="22"> :</p>
							<span class="bg-warning rounded-pill px-2 mx-2 text-gray-800">
								<b>caigi</b> <a href="#"><i class="fas fa-times"></i></a>
							</span>
							<span class="bg-warning rounded-pill px-2 mx-2 text-gray-800">
								<b>caigi</b> <a href="#"><i class="fas fa-times"></i></a>
							</span>
							<a class="mx-1 px-1 span bg-light text-info rounded-pill"
									 href="#" 
									 type="button" 
									 data-toggle="modal" 
									 data-namecountry="Vietnam"
									 data-idcountry ="vietnam"
									 data-target="#AddBrandTagModal">
									<i class="fas fa-plus nav-item text-info bg-light px-2 rounded-pill "></i>
							</a>
						</div>
						<div class="tab-pane fade" id="brandtag-pills-tab-02" role="tabpanel" aria-labelledby="brandtag-pills-list-02">
							<span class="bg-warning rounded-pill px-2 mx-2 text-gray-800">
								<b>caigi</b> <a href="#"><i class="fas fa-times"></i></a>
							</span>
							<span class="bg-warning rounded-pill px-2 mx-2 text-gray-800">
								<b>caigi</b> <a href="#"><i class="fas fa-times"></i></a>
							</span>
						</div>
						<div class="tab-pane fade" id="brandtag-pills-tab-03" role="tabpanel" aria-labelledby="brandtag-pills-list-03">
							<span class="bg-warning rounded-pill px-2 mx-2 text-gray-800">
								<b>caigi</b> <a href="#"><i class="fas fa-times"></i></a>
							</span>
							<span class="bg-warning rounded-pill px-2 mx-2 text-gray-800">
								<b>caigi</b> <a href="#"><i class="fas fa-times"></i></a>
							</span>
						</div>
						<div class="tab-pane fade" id="brandtag-pills-tab-04" role="tabpanel" aria-labelledby="brandtag-pills-list-04">
							<span class="bg-warning rounded-pill px-2 mx-2 text-gray-800">
								<b>caigi</b> <a href="#"><i class="fas fa-times"></i></a>
							</span>
							<span class="bg-warning rounded-pill px-2 mx-2 text-gray-800">
								<b>caigi</b> <a href="#"><i class="fas fa-times"></i></a>
							</span>
						</div>
					</div>
				</div>
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
								action="{{URL::to('/Add-Country')}}" 
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
												onchange="PreviewImage(this)"
												data-bs-img-preview="Addcountry_imgpreview" 
												data-bs-mess-err="mess_err_add_country_img"
												>
								</div>
							</div>
							<div class="mt-0 mb-3">
								<small id="mess_err_add_country_img" class="form-text text-muted">Bạn chưa chọn ảnh quốc kỳ !</small>
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

<!-- Modal Edit country __________________________________________________________ -->
<div>
	<div>
		<div class="modal fade" id="BrandTagCountryModalEdit" tabindex="-1" role="dialog" aria-labelledby="BrandTagCountryModalEditLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="BrandTagCountryModalEditLabel">Danh Mục Mới</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form 
								id="form_edit_country" 
								name="form_edit_country" 
								action="{{URL::to('/Edit-Country')}}" 
								onsubmit="return validateFormEditCountry()" 
								method="post"
								enctype="multipart/form-data">
							{{csrf_field()}}
							<div class="form-group">
								<label for="recipient-name" class="col-form-label">Tên quốc gia :</label>
								<input 
											type="text" 
											class="form-control" 
											name="edit_name_country" 
											id="edit_name_country"
											required
											maxlength="50">
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
												onchange="PreviewImage(this)"
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
								id="form_add_country" 
								name="form_add_country" 
								action="{{URL::to('/Add-Country')}}" 
								onsubmit="return validateFormAddCountry()" 
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
												Các nhãn hiệu cách nhau bởi dấu phẩy ( , ) !
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

@endsection