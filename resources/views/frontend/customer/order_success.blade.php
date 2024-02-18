@extends('frontend.master')
@section('content')
@if (session('success'))
 <!-- start wpo-page-title -->
 @include('frontend.incrouad.bladecomponet');
<!-- end page-title -->

<!-- start error-404-section -->
<section class="error-404-section section-padding p-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xs-12 m-auto">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <p>Order Success</p>
                        <p>{{ session('success') }}</p>
                    </div>
                    <div class="card-body">
                        <div class="content clearfix">
                            <div class="error">
                                <img src="{{ asset('frontend/images/order_success.jpg') }}" width="400" alt>
                            </div>
                            <div class="error-message m-0">
                                <h3>Congratulation!</h3>
                                <a href="{{ route('index') }}" class="theme-btn">Back to home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
<!-- end error-404-section --> 
@else
@php
    abort('404')
@endphp
@endif  
@endsection