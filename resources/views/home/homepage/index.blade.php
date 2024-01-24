@extends('home.layout')

@section('title', __('BDS123'))

@section('content')

<!-- Banner -->
<section class="bg-light position-relative p-0" id="banner_homepage">
    <!-- <div class="fill"></div> -->
    <div class="container d-mobi-none">
        <div class="row row align-items-center">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 text-center d-none">
                <p style="padding-bottom: 140px"></p>
                <h4 class="text-white mt-3">Tìm kiếm ngôi nhà yêu thích của bạn</h4>
                @include('home.search.formSearch')
            </div>
        </div>
    </div>
</section>

@foreach ($category as $key)
@if ($key->id % 2 != 0)
<section id="sec-home-1">
@else 
<section id="sec-home-2">
@endif
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="section-title section-title-bold text-center">
                    <span class="section-title-main title-gradient text-uppercase">
                        {{ $key->name }}
                    </span>
                </h2>
            </div>
        </div>
        <div class="row">
            @foreach ($key->address as $value)
                @include('home.products.include.single-product')
            @endforeach
            <div class="col-lg-12 text-center">
                <a class="btn btn-success btn-xemthem px-4">
                    <i class="fas fa-caret-right"></i> <span>Xem thêm</span>
                </a>
            </div>
        </div>
    </div>
</section>
@endforeach



<section id="sec-home-3">
    <div class="container">
        <!-- <div class="row pb-3">
            ---------------- Col blog tin tức ----------------
            <div class="col-lg-8 pb-2">
                <h2 class="section-title section-title-bold text-center">
                    <span class="section-title-main title-gradient">
                        TIN TỨC
                    </span>
                </h2>
                <div class="row">
                    
                </div>
            </div>
            ---------------- Col đọc nhiều ----------------
            <div class="col-lg-4 d-mobi-none">
                <h2 class="section-title section-title-bold text-center">
                    <span class="section-title-main title-gradient">
                        ĐỌC NHIỀU
                    </span>
                </h2>
                <div class="row">
                    
                </div>
            </div>
        </div> -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="section-title section-title-bold text-center">
                    <span class="section-title-main title-gradient">
                        KHÁCH HÀNG GÓP Ý / NHẬN XÉT VỀ CHÚNG TÔI
                    </span>
                </h2>
            </div>
            <div class="col-lg-6">
                @include('home.include.review.testimonials')
            </div>
            <div class="col-lg-6">
                @include('home.include.review.testimonials')
            </div>
            <div class="col-lg-12 text-center">
                <a class="btn btn-success btn-xemthem px-4">
                    <i class="fas fa-caret-right"></i> <span>Xem thêm</span>
                </a>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('/public/home/js/autoText.js') }}"></script>
<script src="{{ asset('/public/home/js/homepage.js') }}"></script>
@endsection
