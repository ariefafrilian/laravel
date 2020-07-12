@extends('layouts.master')

@section('title', 'Inventories')

@section('inventories', 'active')

@section('content-title', 'Inventories')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<a href="{{ url('inventories/create') }}" class="btn btn-sm btn-outline-primary float-right" data-toggle="modal" data-target="#modal" id="btn-create-item"><i class="fas fa-plus"></i> Create new item</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-sm table-bordered table-striped" id="datatables">
						<thead>
							<th>#</th>
							<th>Name</th>
							<th>Serial number</th>
							<th>Price</th>
							<th>Action</th>
						</thead>

						<tbody>
					
						</tbody>

						<tfoot>
							<th>#</th>
							<th>Name</th>
							<th>Serial number</th>
							<th>Price</th>
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
			ajax: "{{ url('inventories/datatables') }}",
			columns: [
				{data: "DT_RowIndex", name: "id"},
				{data: "name", name: "name"},
				{data: "serial", name: "serial"},
				{data: "price", name: "price"},
				{data: "action", name: "action"}
			]
		});

		$("#btn-create-item").click(function (e) {
			e.preventDefault();

			var url = $(this).attr("href");

			$.ajax({
    			url: url,
    			method: "GET",
    			dataType: "html",
    			success: function (response) {
    				$("#modal-title").text("Create new item");
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
					$("#modal-title").text("About product");
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
					$("#modal-title").text("Change item data");
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