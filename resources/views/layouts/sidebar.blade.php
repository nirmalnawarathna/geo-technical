<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="" class="brand-link" style="background-color: #262D59">
        <img src="{{url('image/profile.png')}}"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3">
             <span class="brand-text font-weight-light" style="font-size: 10px;">MELBOURNE GEOTECHNICAL</span>
    </a>

    <style>
        [class*=sidebar-dark-] .nav-sidebar>.nav-item.menu-open>.nav-link,
        [class*=sidebar-dark-] .nav-sidebar>.nav-item:hover>.nav-link,
        [class*=sidebar-dark-] .nav-sidebar>.nav-item>.nav-link:focus {
            background-color: rgba(207, 207, 207, 0.926) !important;
            color: #000000 !important;
        }
    </style>

    <div class="sidebar" style="background-color: #ffffff">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>

</aside>
