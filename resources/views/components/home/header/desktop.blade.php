<style>
    .text-title{
    text-align: center;
    }
    .text-title h2 {
        font-family: ImpactCharcoal;
        font-weight: 700;
        font-size: 46px;
        color: rgb(40, 69, 153);
        margin: 0;
    }
    .text-title h4{
        font-family: sans-serif;
        font-weight: 700;
        font-size: 20px;
        color: rgb(0, 165, 81);
        margin: 0;
    } 
    .img-logo{
       text-align: center;
        padding-left: 10%;
    }
    .contact{
        padding-left: 20px;
    }
    .list_menu{
        padding-left: 10%;
        padding-right: 10%;
    }
    #list_menu{
        padding-left: 10%;
        font-size: 18px;
        font-weight: 700;
    }
    #ic-hotline {
    font-size: 24px;
    color: #e91e63;
    font-weight: 700;
    }
    #header li.nav-item a {
    color: rgb(41, 69, 154);
    text-transform: uppercase;
    }
</style>

<!-- Header desktop from max width 850px  -->
<nav class="navbar nav-menu-desktop navbar-expand-lg bg-light">
    <div class="container-fluid">
        <div class="col-sm-3  text-center">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('/public/images/logo_vh.png') }}" width="80px" height="" style="    margin-left: -30px;">
            </a>
        </div>
        <div class="col-sm-6 text-title p-0">
            <a class="navbar-brand" href="{{ route('home') }}">
                <h2 class="pt-3">Viet House Real Estate</h2>
                <h4>MỘT THƯƠNG HIỆU - TRIỆU TRÁI TIM</h4>
            </a>
        </div>
        <div class="col-sm-3 contact text-center">
        <div class="gtranslate_wrapper"></div>
<script>window.gtranslateSettings = {"default_language":"vi","languages":["vi","en","ko"],"wrapper_selector":".gtranslate_wrapper"}</script>
<script src="https://cdn.gtranslate.net/widgets/latest/flags.js" defer></script>
            <a href="tel: 0908916985">
                <span id="ic-hotline" > {{__('0908.916.985')}}</span>
            </a>
        </div>
    </div>
</nav>
<nav class="navbar nav-menu-desktop navbar-expand-lg bg-light">
    <div class="container-fluid list_menu">
        <div class="navbar-collapse" id="list_menu">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!------ List Menu ------>
                <li class="nav-item">
                    <a class="nav-link @if(\Request::is('trang-chu') ) active  @endif" aria-current="page" href="{{url('/')}}">
                        {{ __('Trang chủ') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(\Request::is('gioi-thieu') ) active  @endif" aria-current="page" href="{{url('gioi-thieu')}}">
                        {{ __('Giới thiệu') }}
                    </a>
                </li>
                @foreach($land as $key)
                <li class="nav-item dropdown">
                    <a class="nav-link dropbtn @if(\Request::is('muc-dich/'.$key->first()->purpose ) ) active  @endif" 
                        href="{{ route('purpose', $key->first()->purpose) }}">
                        {{ getLandPurpose($key->first()->purpose )}}
                    </a>
                    <!--<div class="dropdown-content">-->
                    <!--    @foreach($key->pluck('category_to_land')->collapse()->pluck('category')->unique() as $value)-->
                    <!--        <a href="{{ route('category', $value->slug) }}">{{ $value->name }}</a>-->
                    <!--    @endforeach-->
                    <!--</div>-->
                </li>
                @endforeach
                
                <li class="nav-item dropdown">
                    <a class="nav-link @if(\Request::is('tin-tuc') ) active  @endif" aria-current="page" href="{{ route('post') }}">
                        {{ __('Tin tức') }}
                    </a>
                    <div class="dropdown-content">
                        @foreach( $category_post as $value )
                            @if ($value->address_post != null)
                                <a href="{{ route('postCategory', $value->slug) }}">{{ $value->name }}</a>
                            @endif
                        @endforeach
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(\Request::is('gioi-thieu') ) active  @endif" aria-current="page" href="{{url('lien-he')}}">
                        {{ __('Liên hệ') }}
                    </a>
                </li>
                <li class="nav-item">
                @include('home.search.formSearch')
                </li>
            <!------ End List Menu ------>
            </ul>
        </div> 
    </div>
</nav>