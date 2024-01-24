<div class="col-lg-3 pb-3">
    <a href="{{ route('indexProduct', [$key->slug, $value->land->slug]) }}">
        <div class="card card-product w-100">
            <div class="position-relative">
                <div class="product-avatar">
                    <img src="{{ asset($value->land->avatar) }}" class="card-img-top">
                </div>
                <div class="position-absolute info-top-right">
                    <p class="tag-label">{{ getLandPurpose($value->land->purpose) }}</p>
                </div>
                <div class="position-absolute info-bot-left">
                    <span class="tag-label">
@if(isset($value->land->admin))
                        {{ $value->land->admin->fullname }}
@endif
                    </span>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title type-blog-home text-uppercase">{{ $value->land->title }}</h5>
                <p class="card-text">
                    {{ $value->land->created_at->diffForHumans() }}
                    <span class="text-orange float-end">{{ number_format($value->land->price) }} {{__('VNĐ')}}</span>
                    <p class="is-divider"></p>
                </p>
                <p class="card-text">
                    <i class="fas fa-bed"></i> {{ $value->land->bedroom }}
                    <span class="float-end"><i class="fas fa-circle"></i> {{ $value->land->area }} m<sup>2</sup></span>
                </p>
            </div>
        </div>
    </a>
</div>