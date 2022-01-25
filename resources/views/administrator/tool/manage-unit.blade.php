@extends('admin-layout')

@section('admin-content')
{{-- messenger box --}}
<div class="mess__box">
	@php
	$mess_err = Session::get('mess_err');
	$mess_success = Session::get('mess_success');

	if($mess_err) {

	@endphp
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
	@php
		}
		Session::put('mess_err', null);
		if($mess_success)
		{
	@endphp
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
	@php
	}
	Session::put('mess_success', null);
	@endphp
</div>

<!-- Page Heading -->
<div class="container-fluid">
	<div class="mb-5">
		<h1 class="h3 mb-0 text-gray-800">Đơn vị tính</h1>
	</div>
</div>


<div class="col-lg-12">
	<!-- Dropdown Card Example -->
	<div class="card shadow mb-4">
		<!-- Card Header - Dropdown -->
		<div
		class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary">Đơn vị tính</h6>
			<div class="dropdown no-arrow">
				<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
				data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<a class="btn border-info bg-white"
					   href="#" 
					   type="button" 
					   data-toggle="modal" 
					   data-target="#UnitModal">
						<i class="fas fa-plus nav-item text-info "></i>
					</a>
				</a>
			</div>
		</div>
		<!-- Card Body -->
		<div class="card-body">			
			<ul class="list-group">
				@foreach($list_unit as $key => $unit_pro)
				<li class="list-group-item d-flex justify-content-between">
					{{$unit_pro->unit_name}}
					<a onclick="return confirm('Bạn có muốn xóa đơn vị tính {{$unit_pro->unit_name}} ?')" href="{{URL::to('/delete-unit/'.$unit_pro->unit_id)}}"><i class="fas fa-times"></i>
					</a>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>


<!-- Modal add brand tag -->
<div>
	<div class="modal fade" id="UnitModal" tabindex="-1" role="dialog" aria-labelledby="UnitModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="UnitModalLabel">Thêm đơn vị tính</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form 
					id="form_add_unit" 
					name="form_add_unit" 
					action="{{URL::to('/add-unit')}}" 
					method="post"
					enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Nhãn hiệu :</label>
						<input 
						type="text" 
						class="form-control" 
						name="add_unit_name" 
						id="add_unit_name"
						{{-- required --}}
						maxlength="50">
						<small class="form-text text-muted">
							Hãy nhập tên đơn vị tính vào đây !
						</small>
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