<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      
           <style>
            .nav-sidebar .nav-link.active {
              background-color: rgba(253, 253, 253, 0.914) !important;
              color: #000000 !important;
          }
          </style>

      <!-- <li class="nav-item">
        <a href="{{ route('profile') }}" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Profile
          </p>
        </a>
      </li> -->

      <!-- <li class="nav-item">
        <a href="pages/calendar.html" class="nav-link">
          <i class="nav-icon far fa-calendar-alt"></i>
          <p>
            Maps
            <span class="badge badge-info right">2</span>
          </p>
        </a>
      </li> -->

      <li class="nav-item">
        <a href="{{ route('jobs') }}" class="nav-link {{ request()->routeIs('jobs') ? 'active' : '' }}">
          <i class="nav-icon fas fa-file"></i>
          <p>
           Home
          </p>
        </a>
      </li>

      <!-- <li class="nav-item">
        <a href="{{ route('shedule_call') }}" class="nav-link">
          <i class="nav-icon far fa-calendar-alt"></i>
          <p>
            Shedule a Call 
          </p>
        </a>
      </li> -->

      {{-- <li class="nav-item">
        <a href="{{ route('signup') }}" class="nav-link">
          <i class="nav-icon far fa-calendar-alt"></i>
          <p>
            User Register
          </p>
        </a>
      </li> --}}

      <!-- <li class="nav-item">
        <a href="{{ route('create_report') }}" class="nav-link">
          <i class="nav-icon far fa-plus-square"></i>
          <p>
            Make A Reports
          </p>
        </a>
      </li> -->

      {{-- <li class="nav-item">
        <a href="{{ route('create_request') }}" class="nav-link">
          <i class="nav-icon fas fa-book"></i>
          <p>
            Make Requests
          </p>
        </a>
      </li> --}}

      {{-- <li class="nav-item">
        <a href="{{ route('signup') }}" class="nav-link">
          <i class="nav-icon fas fa-user"></i>
          <p>
            Customer
          </p>
        </a>
      </li> --}}

      <!-- <li class="nav-item">
        <a href="{{ route('view_request') }}" class="nav-link">
          <i class="nav-icon fas fa-columns"></i>
          <p>
            View Request
          </p>
        </a>
      </li> -->
      
      {{-- <li class="nav-item">
        <a href="pages/kanban.html" class="nav-link">
          <i class="nav-icon fas fa-columns"></i>
          <p>
            Login
          </p>
        </a>
      </li>

      <li class="nav-item">
        <a href="pages/kanban.html" class="nav-link">
          <i class="nav-icon fas fa-columns"></i>
          <p>
            Sign Up
          </p>
        </a>
      </li>
    </ul> --}}

  </nav>