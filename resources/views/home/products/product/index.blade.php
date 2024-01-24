@extends('home.layout')

@section('title', __('BDS'))

@section('content')
    <section id="sec-detail-blog-1">
        <div class="container">
            <!-- <x-home.partials.breadcrumb_2>
                    <span class="divider text-muted">
                        <a href="{{route( 'category', $category->slug ) }}">
                            {{ $category->name }}</a> » 
                        <a href="{{route( 'indexDistrict', $land->district->codename )}}">{{$land->district->name}}</a> » </span>
                    <span class="breadcrumb_last text-dark" aria-current="page">
                    {{$land->title}}</span>
            </x-home.partials.breadcrumb_2> -->
            <div class="row">
                <div class="col-lg-9 pb-3">
                    <div class="fotorama" data-nav="thumbs" data-width="100%">
                        @if ($land->image != null)
                            @foreach ($land->image as $img)
                                <img src="{{ asset($img) }}" width="144" height="69">
                            @endforeach
                        @else
                                <img src="{{ asset('/public/images/default-image.png') }}" width="100%" >
                        @endif
                    </div>
                    <p></p>
                    <x-home.partials.breadcrumb_2>
                        <span class="divider text-muted">
                            <a href="{{route( 'category', $category->slug ) }}">
                                {{ $category->name }}</a> » 
                            <a href="{{route( 'indexDistrict', $land->district->codename )}}">{{$land->district->name}}</a> » </span>
                        <span class="breadcrumb_last text-dark" aria-current="page">
                        {{$land->title}}</span>
                    </x-home.partials.breadcrumb_2>

                    <h3 class="text-uppercase">{{ $land->title }}</h3>
                    
                    <div class="blog-detail-info pb-2 d-mobi-none">
                        <p class="m-2"><span class="text-small">Ngày đăng: {{ $land->created_at->diffForHumans() }}</span>
                        <span class="text-orange text-small"> - (Cập nhật: {{ $land->updated_at->diffForHumans() }})</span></p>
                        <div class="row" id="info-dientich">
                            <div class="col-6 col-lg-4">
                                <span><i class="fas fa-box"></i> Diện tích: {{ $land->area }}m<sup>2</sup></span>
                            </div>
                            <div class="col-6 col-lg-4 text-center">
                                <span><i class="fas fa-location-arrow"></i> Hướng: {{ $land->door_direction }}</span>
                            </div>
                            <div class="col-6 col-lg-4 text-end">
                                <span><i class="fas fa-bed"></i> Phòng ngủ: {{ $land->bedroom }}</span>
                            </div>
                            <!-- dong duoi -->
                            <div class="col-6 col-lg-4">
                                <span><i class="fas fa-home"></i> Tầng: {{ $land->floor }}</span>
                            </div>
                            <div class="col-6 col-lg-4 text-center">
                                <span><i class="fas fa-restroom"></i> Nhà vệ sinh: {{ $land->toilet }}</span>
                            </div>
                            <div class="col-6 col-lg-4 text-end">
                                <span><i class="fas fa-road"></i> Đường trước: {{ $land->road_house }}m<sup>2</sup></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="blog-detail-info pb-2 d-sm-none">
                        <p class="m-2"><span class="text-small">Ngày đăng: {{ $land->created_at->diffForHumans() }}</span>
                        <span class="text-orange text-small"> - (Cập nhật: {{ $land->updated_at->diffForHumans() }})</span></p>
                        <div class="row" id="info-dientich">
                            <div class="col-6">
                                <span><i class="fas fa-box"></i> Diện tích: {{ $land->area }}m<sup>2</sup></span>
                            </div>
                            <div class="col-6">
                                <span><i class="fas fa-clock"></i> Hướng: {{ $land->door_direction }}</span>
                            </div>
                            <div class="col-6">
                                <span><i class="fas fa-bed"></i> Phòng ngủ: {{ $land->bedroom }}</span>
                            </div>
                            <!-- dong duoi -->
                            <div class="col-6">
                                <span><i class="fas fa-home"></i> Tầng: {{ $land->floor }}</span>
                            </div>
                            <div class="col-6">
                                <span><i class="fas fa-clock"></i> Nhà vệ sinh: {{ $land->toilet }}</span>
                            </div>
                            <div class="col-12">
                                <span><i class="fas fa-clock"></i> Đường trước: {{ $land->road_house }}m<sup>2</sup></span>
                            </div>
                        </div>
                    </div>
                    <!-- accordion thong tin chi tiet -->
                    <!-- <div class="accordion pb-2" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="fas fa-bars px-2"></i> Thông tin chi tiết
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ol data-toc=".blog-detail-content"></ol>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- Content Blog -->
                    <div class="blog-detail-content">
                        {!! $land->content !!}
                    </div>
                </div>
                
                <!-- Sidebar -->
                @include('home.products.include.sidebar')
            </div>
        </div>
    </section>

<!-- Form meeting -->
<form>
    <div class="modal modal-form fade" id="formMeeting">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <p>Quý khách hàng vui lòng<br> điền đầy đủ thông tin bên dưới!</p>
                    <input type="text" class="form-control mb-2" value=""
                        placeholder="Thông tin khách hàng">

                    <input type="phone" class="form-control mb-2" value=""
                        placeholder="Số điện thoại">

                    <input type="email" class="form-control mb-2" value=""
                        placeholder="Email">

                    <input type="file" class="form-control mb-2" value="Ảnh"
                        placeholder="Email">

                    <textarea type="text" class="form-control mb-2" value=""
                        placeholder="Nội dung"></textarea>

                    <a class="btn btn-danger w-100" style="font-size: 13px">Hoàn tất</a>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End form meeting -->
<script src="{{asset('/public/home/jquery.toc/jquery.toc.js')}}"></script>
@endsection