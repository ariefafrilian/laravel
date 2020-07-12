@extends('layouts.master')

@section('title', 'About')

@section('about', 'active')

@section('content-title', 'About')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="position-relative p-4 bg-white shadow-sm">
    		<div class="ribbon-wrapper ribbon-lg">
        		<div class="ribbon bg-primary">Ribbon</div>
    		</div>
    		<dl>
                <dt>Country</dt>
                <dd>{{ $about->country }}</dd>
                <dt>Company name</dt>
                <dd>{{ $about->company }}</dd>
                <dt>City</dt>
                <dd>{{ $about->city }}</dd>
                <dt>Address</dt>
                <dd>{{ $about->address }}</dd>
                <dt>Email address</dt>
                <dd>{{ $about->email }}</dd>
                <dt>Phone number</dt>
                <dd>{{ $about->phone }}</dd>
            </dl>
            <a href="javascript:void(0);" class="btn btn-sm btn-warning" style="cursor: not-allowed;"><i class="fas fa-edit"></i> Edit</a>
		</div>
	</div>
</div>
@endsection

@push('scripts')

@endpush