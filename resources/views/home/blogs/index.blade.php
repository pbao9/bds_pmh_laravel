@extends('home.layout')

@section('title', __('BDS'))

@section('content')
    <section id="sec-detail-blog-1">
        <div class="container">
            @if($request != null)
                <x-home.partials.breadcrumb_2>
                    <span class="divider text-muted">
                        <a href="{{ route('post') }}">Tin tức »</a></span> 
                    <span class="divider breadcrumb_last text-dark">
                        {{ $category->name }}</span> 
                </x-home.partials.breadcrumb_2>
            @endif

            @if($request == null)
                <x-home.partials.breadcrumb_2>
                    <span class="divider breadcrumb_last text-dark">
                        Tin tức</span> 
                </x-home.partials.breadcrumb_2>
            @endif

            @if($request != null)
            <div class="row">
                <div class="col-lg-8 pb-3">
                    @foreach($category->address_post as $value)
                        @include('home.blogs.include.single-blog-sidebar')
                    @endforeach
                </div>
                
                <!-- Sidebar -->
                <div class="col-lg-4">
                    @include('home.include.sidebar')
                </div>
            </div>
            @endif

            @if($request == null)
            <div class="row">
                <div class="col-lg-8 pb-3">
                    @foreach($post as $value)
                        @include('home.blogs.include.single-blog-sidebar')
                    @endforeach
                </div>
                
                <!-- Sidebar -->
                <div class="col-lg-4">
                    @include('home.include.sidebar')
                </div>
            </div>
            @endif
        </div>
    </section>
    
@endsection