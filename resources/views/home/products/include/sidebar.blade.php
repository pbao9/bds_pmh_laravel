<!-- Sidebar -->
<div class="col-lg-3">
    <div class="card w-100 card-info-user">
        <div class="card-body text-center">
            <img src="{{ asset('/public/home/img/avatar-1.png') }}" />
            <h5 class="card-title m-0">{{$land->admin->fullname}}</h5>
            <p class="card-text mb-1">
                <a class="detail-read-more" href="{{ route('staffProduct', $land->admin_id)}}">
                Xem thêm {{ $count_blog }} tin khác</a></p>
            <p class="card-text mb-1"><a class="btn btn-danger w-100" href="tel:{{ $land->admin->phone }}">
                <i class="fas fa-phone-volume"></i> {{ $land->admin->phone }}</a>
            </p>
            <p class="card-text mb-1"> hoặc </p>
            <p class="is-divider"></p>
            <div class="card-more-option">
                <a href="tel:{{ $land->admin->phone }}" class="btn btn-white float-center">Gọi lại tôi</a>
            </div>
        </div>
    </div>
    @include('home.include.sidebar')
</div>