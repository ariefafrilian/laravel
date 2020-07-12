@extends('layouts.auth')

@section('title', 'Login')

@section('page', 'login-page')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="javascript:void(0);"><b>{{ config('app.name') }}</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      @if(session()->has('error'))
      <p class="login-box-msg text-danger">{{ session()->get('error') }}</p>
      @else
      <p class="login-box-msg">Sign in to start your session</p>
      @endif

      <form action="{{ url('login') }}" method="POST" id="form" autocomplete="off">
      	@csrf
        <div class="input-group mb-3">
          <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
			<div class="invalid-feedback">
          		{{ $message }}
			</div>
          @enderror
        </div>

        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
			<div class="invalid-feedback">
          		{{ $message }}
			</div>
          @enderror
        </div>

        <div class="form-group">
        	<button type="button" class="btn btn-primary btn-block" id="btn-submit">Sign In</button>
        </div>

        <input name="remember" type="checkbox" id="remember">
        <label for="remember"> Remember Me</label>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
@endsection

@push('scripts')
<script>
	$(document).ready(function () {
		$("#btn-submit").click(function (e) {
			e.preventDefault();

			$(this).html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`);

			$("#form").submit();
		});
	});
</script>
@endpush