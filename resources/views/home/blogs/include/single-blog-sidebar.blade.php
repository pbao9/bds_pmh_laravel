@if ($request != null)
<a href="{{ route('indexPost', [$request, $value->post->slug]) }}">
    <div class="card card-product w-100">
        <div class="row g-0">
            <div class="col-md-4">
                <div class="position-relative">
                    <div class="product-avatar">
                        <img src="{{ asset( $value->post->avatar ) }}" class="card-img-top" height="100%">
                    </div>
                    <div class="position-absolute info-top-right">
                        <p class="tag-label">
                            {{ $value->post->categories->first()->name }}
                        </p>
                    </div>
                    <div class="position-absolute info-bot-left">
                        <span class="tag-label">
                            {{ $value->post->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body d-flex flex-column justify-content-between h-100">
                    <div>
                        <h5 class="card-title text-uppercase">{{ $value->post->title }}</h5>
                        <p class="is-divider"></p>
                        <p class="card-text mb-2">
                            <strong>Danh mục:</strong> 
                            @foreach($value->post->categories as $item)
                                #{{ $item->name }}
                            @endforeach
                        </p>
                        <div class="card-text">
                            {{strip_tags(trim(html_entity_decode(Str::limit($value->post->content,500),   
                                ENT_QUOTES, 'UTF-8'), "\xc2\xa0"))   }}
                        </div>
                    </div>
                    
                    <p class="card-text price ">
                        <small>{{ Carbon\Carbon::parse($value->post->created_at)->format('d/m/Y') }}</small>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <p></p>
</a>
@endif

@if ($request == null)
<a href="{{ route('indexPost', $value->slug ) }}">
    <div class="card card-product w-100">
        <div class="row g-0">
            <div class="col-md-4">
                <div class="position-relative">
                    <div class="product-avatar">
                    <img src="{{ asset( $value->avatar ) }}" class="card-img-top" height="100%">
                    </div>
                    <!-- <div class="position-absolute info-top-right">
                        <p class="tag-label">
                            $value->categories->first()->name 
                        </p>
                    </div> -->
                    <div class="position-absolute info-bot-left">
                        <span class="tag-label">
                            {{ $value->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body d-flex flex-column justify-content-between h-100">
                    <div>
                        <h5 class="card-title text-uppercase">{{ $value->title }}</h5>
                        <p class="is-divider"></p>
                        <!-- <p class="card-text mb-2">
                            <strong>Danh mục:</strong> 
                            @foreach($value->categories as $item)
                                #{{ $item->name }}
                            @endforeach
                        </p> -->
                        <div class="card-text">
                            {{strip_tags(trim(html_entity_decode(Str::limit($value->content,500),   ENT_QUOTES, 'UTF-8'), "\xc2\xa0"))   }}
                        </div>
                    </div>
                    
                    <p class="card-text price ">
                        <small>{{ Carbon\Carbon::parse($value->created_at)->format('d/m/Y') }}</small>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <p></p>
</a>
@endif