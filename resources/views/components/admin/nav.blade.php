<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="{{ asset('admin/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">iDesk</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('admin/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Waruna Malinda</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item {{isset($slug) && $slug == 'dashboard' ? ' active' : ''}}">
              <a href="{{ url('admin/dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
          </li>

          <li class="nav-item has-treeview {{isset($slug) && $slug == 'member-list' || $slug == 'member-create' ? ' active' : ''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
              Member Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item {{isset($slug) && $slug == 'member-list' ? ' active' : ''}}">
                <a href="{{ url('admin/member/index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Member List</p>
                </a>
              </li>
              <li class="nav-item {{isset($slug) && $slug == 'student-list' ? ' active' : ''}}">
                <a href="{{ url('admin/member/student') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Students List</p>
                </a>
              </li>

              <li class="nav-item {{isset($slug) && $slug == 'staff-list' ? ' active' : ''}}">
                <a href="{{ url('admin/member/staff') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Staff List</p>
                </a>
              </li>
              <li class="nav-item {{isset($slug) && $slug == 'member-create' ? ' active' : ''}}">
                <a href="{{ url('admin/member/create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Member create</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview {{isset($slug) && $slug == 'grade-list' || $slug == 'grade-create' ? ' active' : ''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
              Grade Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item {{isset($slug) && $slug == 'grade-list' ? ' active' : ''}}">
                <a href="{{ url('admin/grade/index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grade List</p>
                </a>
              </li>
              <li class="nav-item {{isset($slug) && $slug == 'grade-create' ? ' active' : ''}}">
                <a href="{{ url('admin/grade/create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grade create</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{isset($slug) && $slug == 'subject-list' || $slug == 'subject-create' ? ' active' : ''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
              Subject Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item {{isset($slug) && $slug == 'subject-list' ? ' active' : ''}}">
                <a href="{{ url('admin/subject/index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subject List</p>
                </a>
              </li>
              <li class="nav-item {{isset($slug) && $slug == 'subject-create' ? ' active' : ''}}">
                <a href="{{ url('admin/subject/create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subject create</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{isset($slug) && $slug == 'class-list' || $slug == 'class-create' ? ' active' : ''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
              Class Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item {{isset($slug) && $slug == 'class-list' ? ' active' : ''}}">
                <a href="{{ url('admin/class/index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Class List</p>
                </a>
              </li>
              <li class="nav-item {{isset($slug) && $slug == 'class-create' ? ' active' : ''}}">
                <a href="{{ url('admin/class/create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Class create</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{isset($slug) && $slug == 'academic-year-list' || $slug == 'create-academic-year' ? ' active' : ''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
              Academic Year
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item {{isset($slug) && $slug == 'academic-year-list' ? ' active' : ''}}">
                <a href="{{ url('admin/academic-year/index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Academic Year List</p>
                </a>
              </li>
              <li class="nav-item {{isset($slug) && $slug == 'academic-year-create' ? ' active' : ''}}">
                <a href="{{ url('admin/academic-year/create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Academic Year create</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{isset($slug) && $slug == 'user-list' || $slug == 'user-create' ? ' active' : ''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
              User Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item {{isset($slug) && $slug == 'user-list' ? ' active' : ''}}">
                <a href="{{ url('admin/user/index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User List</p>
                </a>
              </li>
              <li class="nav-item {{isset($slug) && $slug == 'user-create' ? ' active' : ''}}">
                <a href="{{ url('admin/user/create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User create</p>
                </a>
              </li>
            </ul>
          </li>
          
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>