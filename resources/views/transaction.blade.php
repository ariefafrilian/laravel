@extends('layouts.master')

@section('title', 'Transaction')

@section('home', 'active')

@section('content-title', 'Transaction')

@section('breadcrumb')
		    <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Transaction</li>
            </ol>
        </div>
@endsection

@section('content')
        <!-- Timelime example  -->
        <div class="row">
          <div class="col-md-12">

            <!-- The time line -->
            <div class="timeline">

              @foreach($signatures as $signature)
              <!-- timeline time label -->
              <div class="time-label">
                <span class="{{ $signature == now()->format('d M Y') ? 'bg-success' : 'bg-maroon' }}">{{ $signature }}</span>
              </div>
              <!-- /.timeline-label -->
                @foreach($transactions->where('signature', $signature) as $transaction)
                <!-- timeline item -->
                <div>
                  <i class="fas fa-user bg-blue"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="fas fa-clock"></i> {{ $transaction->created_at }}</span>
                    <h3 class="timeline-header"><a href="#">Support Team</a></h3>
                    <div class="timeline-body">
                      Customer {{ $transaction->customer->first_name }} Code {{ $transaction->customer->code }} bought {{ $transaction->inventorie->name }} {{ $transaction->qty }} pieces.
                    </div>
                    <div class="timeline-footer">
                      <a href="{{ url('invoice/'. $transaction->id) }}" class="btn btn-primary btn-sm">Invoice</a>
                      <a href="{{ url('invoice/'.$transaction->id) }}" class="btn btn-danger btn-sm btn-delete">Delete</a>
                    </div>
                  </div>
                </div>
                <!-- END timeline item -->
                @endforeach
              @endforeach

              <div>
                <i class="fas fa-clock bg-gray"></i>
              </div>  
            </div>
            
          </div>
          <!-- /.col -->
        </div>
@endsection

@push('scripts')
<script>
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
                $(document).ajaxStop(function(){
                  window.location.reload();
                });
                
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
</script>
@endpush