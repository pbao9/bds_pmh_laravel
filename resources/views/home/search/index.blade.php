@extends('home.layout')

@section('title', __('BDS'))

@section('content')
    <section id="sec-detail-blog-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 pb-3">
                    @include('home.search.formSearch')
                    <p></p>
                    <h5>Kết quả tìm kiếm <span class="text-danger">({{ $land->count() }} tin tức)</span></h5>
                    @foreach($land as $value)
                        @include('home.products.include.group-product-single')
                    @endforeach
                </div>
                
                <!-- Sidebar -->
                <div class="col-lg-4">
                    @include('home.include.sidebar')
                </div>
            </div>
        </div>
    </section>
    <style>
        #main .search-form input {
            color: black !important;
        }
    </style>
@endsection