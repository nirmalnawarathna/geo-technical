<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      
<style>
  .nav-sidebar .nav-link.active {
    background-color: rgba(253, 253, 253, 0.914) !important;
    color: #000000 !important;
}
</style>
      <li class="nav-item">
        <a href="{{ route('admin_home') }}" class="nav-link {{ request()->routeIs('admin_home') ? 'active' : '' }}">
          <i class="nav-icon fas fa-file"></i>
          <p>
           Job List
          </p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('admin_schedule') }}" class="nav-link {{ request()->routeIs('admin_schedule') ? 'active' : '' }}">
          <i class="nav-icon fas fa-calendar-check"></i>
          <p>
           Meeting Request
          </p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('admin_signup') }}" class="nav-link {{ request()->routeIs('admin_signup') ? 'active' : '' }}">
          <i class="nav-icon fas fa-users"></i>
          <p>
           Customers
          </p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('service') }}" class="nav-link {{ request()->routeIs('service') ? 'active' : '' }}">
          <i class="nav-icon fas fa-wrench"></i>
          <p>
           Services
          </p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('employee') }}" class="nav-link {{ request()->routeIs('employee') ? 'active' : '' }}">
          <i class="nav-icon fas fa-user-tie"></i>
          <p>
           Employees
          </p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('estimation_view') }}" class="nav-link {{ request()->routeIs('estimation_view') ? 'active' : '' }}">
          <i class="nav-icon fas fa-chart-line"></i>
          <p>
           Estimations
          </p>
        </a>
      </li>

      

  </nav>