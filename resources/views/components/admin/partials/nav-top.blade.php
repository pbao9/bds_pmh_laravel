<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!--<div id="google_translate_element"></div>-->
    <div class="gtranslate_wrapper"></div>
<script>window.gtranslateSettings = {"default_language":"vi","languages":["vi","en","ko"],"wrapper_selector":".gtranslate_wrapper"}</script>
<script src="https://cdn.gtranslate.net/widgets/latest/flags.js" defer></script>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link d-flex justify-content-center align-items-center" data-toggle="dropdown" href="#">
            <span class="mr-2 d-none d-lg-inline small">
                {{ optional(auth()->guard('admin')->user())->fullname }}
            </span>
            <img src="{{ asset(config('custom.images.avatar')) }}" class="img-profile rounded-circle" alt="User Image" width="30">
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a class="dropdown-item" href="{{ route('admin.profile.index') }}">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                {{ __('Thông tin cá nhân') }}
            </a>
            <a class="dropdown-item" href="{{ route('admin.password.index') }}">
                <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                {{ __('Đổi mật khẩu') }}
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                {{ __('Đăng xuất') }}
            </a>
        </div>
      </li>
        
    </ul>
</nav>