@extends('layouts.master')

@section('title', 'Users')

@section('users', 'active')

@section('content-title', 'Users')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<a href="{{ url('users/create') }}" class="btn btn-sm btn-outline-primary float-right" data-toggle="modal" data-target="#modal" id="btn-create-user"><i class="fas fa-plus"></i> Create new user</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-sm table-bordered table-striped" id="datatables">
						<thead>
							<th>#</th>
							<th>NIP</th>
							<th>First name</th>
							<th>Gender</th>
							<th>Action</th>
						</thead>

						<tbody>
					
						</tbody>

						<tfoot>
							<th>#</th>
							<th>NIP</th>
							<th>First name</th>
							<th>Gender</th>
							<th>Action</th>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
<script>
	$(document).ready(function () {
		$("#datatables").DataTable({
			responsive: true,
			processing: true,
			serverSide: true,
			ajax: "{{ url('users/datatables') }}",
			columns: [
				{data: "DT_RowIndex", name: "id"},
				{data: "nip", name: "nip"},
				{data: "first_name", name: "first_name"},
				{data: "gender", name: "gender"},
				{data: "action", name: "action"},
			]
		});

		$("#btn-create-user").click(function (e) {
			e.preventDefault();

			var url = $(this).attr("href");

			$.ajax({
    			url: url,
    			method: "GET",
    			dataType: "html",
    			success: function (response) {
    				$("#modal-title").text("Create new user");
					$("#modal-body").html(response);
					$("#btn-submit").text("Create");
					$("#btn-submit").show();
    			},
    			error: function (xhr) {
					Swal.fire({
  						icon: 'error',
  						title: 'Oops...',
  						text: 'Something went wrong!',
  						footer: '<a href="javascript:void(0);">Why do I have this issue?</a>'
					});
				}
			});
		});

		$("body").on("click", ".btn-show", function (e) {
			e.preventDefault();

			var url = $(this).attr("href");

			$.ajax({
				url: url,
				method: "GET",
				dataType: "html",
				success: function (response) {
					$("#modal-title").text("About user");
					$("#modal-body").html(response);
					$("#btn-submit").hide();
					$("#modal").modal("show");
				},
				error: function (xhr) {
					Swal.fire({
  						icon: 'error',
  						title: 'Oops...',
  						text: 'Something went wrong!',
  						footer: '<a href="javascript:void(0);">Why do I have this issue?</a>'
					});
				}
			});
		});

		$("body").on("click", ".btn-edit", function (e) {
			e.preventDefault();

			var url = $(this).attr("href");

			$.ajax({
				url: url,
				method: "GET",
				dataType: "html",
				success: function (response) {
					$("#modal-title").text("Change user data");
					$("#modal-body").html(response);
					$("#btn-submit").text("Update");
					$("#btn-submit").show();
				},
				error: function (xhr) {
					Swal.fire({
  						icon: 'error',
  						title: 'Oops...',
  						text: 'Something went wrong!',
  						footer: '<a href="javascript:void(0);">Why do I have this issue?</a>'
					});
				}
			});
		});

		$("body").on("click", ".btn-delete", function (e) {
			e.preventDefault();

			var url = $(this).attr("href");

			Swal.fire({
  				title: 'Are you sure?',
  				text: "You won't be able to revert this!",
  				icon: 'warning',
  				showCancelButton: true,
  				confirmButtonColor: '#3085d6',
  				cancelButtonColor: '#d33',
  				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
  				if (result.value) {
  					$.ajax({
  						headers: {
        					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    					},
  						url: url,
  						method: "DELETE",
  						success: function (response) {
  							$("#datatables").DataTable().ajax.reload();

  							const Toast = Swal.mixin({
  								toast: true,
  								position: 'top-end',
  								showConfirmButton: false,
  								timer: 3000,
  								timerProgressBar: true,
  								onOpen: (toast) => {
    								toast.addEventListener('mouseenter', Swal.stopTimer)
    								toast.addEventListener('mouseleave', Swal.resumeTimer)
  								}
							});

							Toast.fire({
  								icon: 'success',
  								title: 'Action successfully performed'
							});
  						},
  						error: function (xhr) {
							Swal.fire({
  								icon: 'error',
  								title: 'Oops...',
  								text: 'Something went wrong!',
  								footer: '<a href="javascript:void(0);">Why do I have this issue?</a>'
							});
  						}
  					});
  				}
			});
		});

		$("body").on("click", "#btn-delete-photo", function (e) {
			e.preventDefault();

			var url = $(this).attr("href");

			Swal.fire({
  				title: 'Are you sure?',
  				text: "You won't be able to revert this!",
  				icon: 'warning',
  				showCancelButton: true,
  				confirmButtonColor: '#3085d6',
  				cancelButtonColor: '#d33',
  				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
  				if (result.value) {
  					$.ajax({
  						headers: {
        					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    					},
  						url: url,
  						method: "DELETE",
  						beforeSend: function () {
            				$("#modal-content").prepend(`<div class="overlay d-flex justify-content-center align-items-center" id="overlay"><i class="fas fa-2x fa-sync fa-spin"></i></div>`);
            			},
  						success: function (response) {
  							$("#overlay").remove();
            				$("#modal").modal("hide");
            				
  							const Toast = Swal.mixin({
  								toast: true,
  								position: 'top-end',
  								showConfirmButton: false,
  								timer: 3000,
  								timerProgressBar: true,
  								onOpen: (toast) => {
    								toast.addEventListener('mouseenter', Swal.stopTimer)
    								toast.addEventListener('mouseleave', Swal.resumeTimer)
  								}
							});

							Toast.fire({
  								icon: 'success',
  								title: 'Action successfully performed'
							});
  						},
  						error: function (xhr) {
							Swal.fire({
  								icon: 'error',
  								title: 'Oops...',
  								text: 'Something went wrong!',
  								footer: '<a href="javascript:void(0);">Why do I have this issue?</a>'
							});
  						}
  					});
  				}
			});
		});

		$("#btn-submit").click(function (e) {
			e.preventDefault();

			var form = $("#form"),
				url = form.attr("action"),
				method = form.attr("method");
				
			form.find(".form-control").removeClass("is-invalid");
			form.find(".invalid-feedback").remove();

			$.ajax({
				headers: {
        			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    			},
				url: url,
				method: method,
				data: new FormData(form[0]),
				processData: false,
            	contentType: false,
            	cache: false,
            	beforeSend: function () {
            		$("#modal-content").prepend(`<div class="overlay d-flex justify-content-center align-items-center" id="overlay"><i class="fas fa-2x fa-sync fa-spin"></i></div>`);
            	},
				success: function (response) {
					$("#overlay").remove();

					form.trigger("reset");
					
					$("#modal").modal("hide");
					$("#datatables").DataTable().ajax.reload();

					const Toast = Swal.mixin({
  						toast: true,
  						position: 'top-end',
  						showConfirmButton: false,
  						timer: 3000,
  						timerProgressBar: true,
  						onOpen: (toast) => {
    						toast.addEventListener('mouseenter', Swal.stopTimer)
    						toast.addEventListener('mouseleave', Swal.resumeTimer)
  						}
					});

					Toast.fire({
  						icon: 'success',
  						title: 'Action successfully performed'
					});
				},
				error: function (xhr) {
					$("#overlay").remove();
					var error = xhr.responseJSON;

					if ($.isEmptyObject(error) == false) {
						$.each(error.errors, function (key, value) {
							$("#" + key)
								.addClass("is-invalid")
								.closest(".form-group")
								.append(`<div class="invalid-feedback">${value}</div>`);
						});
					}
				}
			});
		});
	});
</script>
@endpush