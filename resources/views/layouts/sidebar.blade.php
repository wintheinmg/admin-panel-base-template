 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('admin.home') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
    @can('user_management_access')
    <li class="nav-item">
        <a class="nav-link collapsed " data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="fa-solid fa-users"></i><span>{{ trans('cruds.user_management.title') }}</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse {{ request()->is('admin/user*') || request()->is('admin/role*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
          @can('user_access')
          <li>
            <a href="{{ route('admin.user.index') }}">
              <i class="bi bi-circle"></i><span>{{ trans('cruds.user.title') }}</span>
            </a>
          </li>
          @endcan
          @can('role_access')
          <li>
            <a href="{{ route('admin.role.index') }}">
              <i class="bi bi-circle"></i><span>{{ trans('cruds.role.title') }}</span>
            </a>
          </li>
          @endcan
        </ul>
      </li>
    @endcan
    </ul>

  </aside><!-- End Sidebar-->
