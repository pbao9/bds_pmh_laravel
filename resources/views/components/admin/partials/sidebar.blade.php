<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <x-link :href="route('admin.dashboard')" class="brand-link">
        <img src="{{ asset( getConfigLogo() ) }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ __('Admin') }}</span>
    </x-link>

<!-- Sidebar -->
<div class="sidebar">    

<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
        @foreach($menu as $item)
            @if(count($item['role']) == 0 || in_array(auth()->guard('admin')->user()->role, $item['role']))
                <li class="nav-item">
                    <x-link :href="$routeName($item['routeName'])" :title="__($item['title'])" class="nav-link">
                        <x-link.icon :class="$item['iconClass']" />
                        @if(count($item['sub']))
                            <x-slot name="append">
                                <x-link.icon class="right fas fa-angle-left" />
                            </x-slot>
                        @endif
                    </x-link>
                    @if(count($item['sub']))
                        <ul class="nav nav-treeview">
                            @foreach($item['sub'] as $item)
                                @if(count($item['role']) == 0 || in_array(auth()->guard('admin')->user()->role, $item['role']))
                                    <li class="nav-item">
                                        <x-link :href="$routeName($item['routeName'])" :title="__($item['title'])" class="nav-link">
                                            <x-link.icon :class="$item['iconClass']" />
                                        </x-link>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    @endif
                </li>
                <div class="dropdown-divider"></div>
            @endif
        @endforeach
    </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>