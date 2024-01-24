@extends('home.layout')

@section('title', __('BDS'))

@section('content')
    <section id="sec-detail-blog-1">
        <div class="container">


            @if ($category != null)
                <x-home.partials.breadcrumb_2>
                    <span class="divider breadcrumb_last text-dark">
                        <a href="{{route( 'category', $category->slug )}}">{{ $category->name }}</a></span> 
                </x-home.partials.breadcrumb_2>
            @elseif ($name_staff != null)
                <x-home.partials.breadcrumb>{{ $name_staff }}</x-home.partials.breadcrumb>
            @elseif ($name_district != null)
                <x-home.partials.breadcrumb_2>
                    <span class="divider breadcrumb_last text-dark">
                        <a href="">{{ $name_district }}</a></span> 
                </x-home.partials.breadcrumb_2>
            @else
                <x-home.partials.breadcrumb>{{ getLandPurpose($name_purpose) }}</x-home.partials.breadcrumb>
            @endif
            
            <div class="row">
                <div class="col-lg-8 pb-3">
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
    
@endsection