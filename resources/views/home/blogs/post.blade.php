@extends('home.layout')

@section('title', __('BDS'))

@section('content')
    <section id="sec-detail-blog-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 pb-3">
                    <div class="fotorama" data-nav="thumbs" data-width="50%">
                        @if ($post->avatar != null)
                            <img src="{{ asset($post->avatar) }}" width="144" height="69">
                        @else
                            <img src="{{ asset('/public/images/default-image.png') }}" width="50%" >
                        @endif
                    </div>
                    <p></p>

                    <x-home.partials.breadcrumb_2>
                        <span class="divider text-muted">
                            <a href="{{route( 'post' ) }}">
                                Tin tức</a> » 
                        <span class="breadcrumb_last text-dark" aria-current="page">
                        {{$post->title}}</span>
                    </x-home.partials.breadcrumb_2>
                    <h3 class="text-uppercase">{{ $post->title }}</h3>
                    
                    <div class="blog-detail-info pb-2 d-mobi-none">
                        <p class="m-2"><span class="text-small">Ngày đăng: {{ $post->created_at->diffForHumans() }}</span>
                        <span class="text-orange text-small"> - (Cập nhật: {{ $post->updated_at->diffForHumans() }})</span></p>
                    </div>
                    
                    <div class="blog-detail-info pb-2 d-sm-none">
                        <p class="m-2"><span class="text-small">Ngày đăng: {{ $post->created_at->diffForHumans() }}</span>
                        <span class="text-orange text-small"> - (Cập nhật: {{ $post->updated_at->diffForHumans() }})</span></p>
                    </div>
                    <!-- Content Blog -->
                    <div class="blog-detail-content">
                        {!! $post->content !!}
                    </div>    

                </div>
                
                <div class="col-lg-3 pb-3">
                    <!-- Sidebar -->
                    @include('home.include.sidebar')
                </div>
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