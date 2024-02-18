@extends('frontend.master')
@section('content')
@include('frontend.incrouad.bladecomponet');

<!-- start of wpo-about-section -->
<section class="wpo-about-section section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 col-12">
                <div class="wpo-about-wrap">
                    <div class="wpo-about-img">
                        <img src="{{ asset('uploads/about') }}/{{ $about_info->image }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <div class="wpo-about-text">
                    <h4>ABOUT US</h4>
                    <h2>{{ $about_info->title }}</h2>
                    <p>{{ $about_info->description }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of wpo-about-section -->

<!-- start wpo-service-section -->
<section class="wpo-service-section">
    <div class="container">
        <div class="service-wrap">
            <div class="row">
                @foreach ( $about_services as $about_service )
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="service-item">
                            <div class="service-item-img">
                                <img src="{{ asset('uploads/about') }}/{{ $about_service->image }}" alt="">
                            </div>
                            <div class="service-item-text">
                                <h2>{{ $about_service->name }}</h2>
                                <p>{{ $about_service->title }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- end wpo-service-section -->

<!-- start themart-gallery-section-->
<section class="themart-gallery-section themart-gallery-section-s2 section-padding" id="gallery">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="wpo-section-title">
                    <h2>Image Gallery</h2>
                </div>
            </div>
        </div>
        <div class="sortable-gallery">
            <div class="gallery-filters"></div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="portfolio-grids gallery-container clearfix">
                        @foreach ( $about_gallery as $gallery )
                        <div class="grid">
                            <div class="img-holder">
                                <a href="{{ asset('uploads/about') }}/{{ $gallery->big_image }}" class="fancybox"
                                    data-fancybox-group="gall-1">
                                    <img src="{{ asset('uploads/about') }}/{{ $gallery->big_image }}" alt class="img img-responsive">
                                    <div class="hover-content">
                                        <i class="fi flaticon-eye"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end themart-gallery-section--> 
<!-- start of themart-cta-section -->
<section class="themart-cta-section section-padding">
    <div class="container">
        <div class="cta-wrap" style="background: url({{ asset('uploads/offer') }}/{{ $subs_ban->image }})">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-12">
                    <div class="cta-content">
                        <h2>{{ $subs_ban->title }}</h2>
                        <form action="{{ route('subscriber.store') }}" method="POST">
                            @csrf
                            <div class="input-1">
                                <input type="email" name="subscriber" class="form-control" placeholder="Your Email..."
                                    required="">
                                    @error('subscriber')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                <div class="submit clearfix">
                                    <button class="theme-btn-s2" type="submit">Subscribe</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of themart-cta-section -->   
@endsection