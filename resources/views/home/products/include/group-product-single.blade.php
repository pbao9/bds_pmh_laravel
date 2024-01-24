@if ($category != null)
<a href="{{route( 'indexProduct', [$category->slug, $value->land->slug] )}}">
    <div class="card card-product w-100">
        <div class="row g-0">
            <div class="col-md-4">
                <div class="position-relative">
                    <div class="product-avatar">
                        <img src="{{ asset( $value->land->avatar ) }}" class="card-img-top" height="100%">
                    </div>
                    <div class="position-absolute info-top-right">
                        <p class="tag-label">
                            {{ getLandPurpose($value->land->purpose) }}
                        </p>
                    </div>
                    <div class="position-absolute info-bot-left">
                        <span class="tag-label">
                            <!-- <img src="{{ asset('/public/home/img/avatar-1.jpeg') }}" width="30">  -->
                            {{ $value->land->admin->fullname }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body d-flex flex-column justify-content-between h-100">
                    <div>
                        <h5 class="card-title text-uppercase">{{ $value->land->title }}</h5>
                        <p class="is-divider"></p>
                        <p class="dientich-info m-0 pt-1 pb-1"><i class="fas fa-box"></i> Diện tích: {{ $value->land->area }} m<sup>2</sup></p>
                        <div class="card-text">
                            {{strip_tags(trim(html_entity_decode(Str::limit($value->land->content,500),   ENT_QUOTES, 'UTF-8'), "\xc2\xa0"))   }}
                        </div>
                    </div>
                    
                    <p class="card-text price ">
                        {{ $value->land->created_at->diffForHumans() }}
                        <span class="text-orange float-end">
                        {{ number_format($value->land->price) }} {{__('VNĐ')}}
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <p></p>
</a>
@else
<a href="{{route( 'indexProduct', [$value->category_to_land->first()->category->slug, $value->slug] )}}">
    <div class="card card-product w-100">
        <div class="row g-0">
            <div class="col-md-4">
                <div class="position-relative">
                    <div class="product-avatar">
                    <img src="{{ asset( $value->avatar ) }}" class="card-img-top" height="100%">
                    </div>
                    <div class="position-absolute info-top-right">
                        <p class="tag-label">
                            {{ getLandPurpose($value->purpose) }}
                        </p>
                    </div>
                    <div class="position-absolute info-bot-left">
                        <span class="tag-label">
                            <!-- <img src="{{ asset('/public/home/img/avatar-1.jpeg') }}" width="30">  -->
                            {{ $value->admin->fullname }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body d-flex flex-column justify-content-between h-100">
                    <div>
                        <h5 class="card-title text-uppercase">{{ $value->title }}</h5>
                        <p class="is-divider"></p>
                        <p class="dientich-info m-0 pt-1 pb-1"><i class="fas fa-box"></i> Diện tích: {{ $value->area }} m<sup>2</sup></p>
                        <div class="card-text">
                            {{strip_tags(trim(html_entity_decode(Str::limit($value->content,500),   ENT_QUOTES, 'UTF-8'), "\xc2\xa0"))   }}
                        </div>
                    </div>
                    
                    <p class="card-text price ">
                        {{ $value->created_at->diffForHumans() }}
                        <span class="text-orange float-end">
                        {{ number_format($value->price) }} {{__('VNĐ')}}
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <p></p>
</a>
@endif