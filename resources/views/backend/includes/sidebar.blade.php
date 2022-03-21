<div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/backend/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            {{ auth()->user()->name }}
          </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
            <a href="#1" class="nav-link @if (request()->is('backend/dashboard')) active @endif">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                Dashboard
                </p>
            </a>
            </li>
          <li class="nav-header">Quản lý chung</li>
          <li class="nav-item  @if (request()->routeIs('backend.posts.*')) menu-open @endif ">
            <a href="#2" class="nav-link @if (request()->routeIs('backend.posts.*')) active @endif ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Quản lý Blog
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.posts.create') }}" class="nav-link @if (request()->routeIs('backend.posts.create')) active @endif ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tạo mới Blog</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.posts.index') }}" class="nav-link @if (request()->routeIs('backend.posts.index')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách Blog</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Hệ thống</li>
          <li class="nav-item  @if (request()->routeIs('backend.users.*')) menu-open @endif ">
            <a href="" class="nav-link  @if (request()->routeIs('backend.users.*')) active @endif ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Quản lý Users
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.users.create') }}" class="nav-link  @if (request()->routeIs('backend.users.create')) active @endif ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tạo mới user</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.users.edit', ['user' => '1']) }}" class="nav-link  @if (request()->routeIs('backend.users.edit')) active @endif ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Chỉnh sửa user</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.users.index') }}" class="nav-link  @if (request()->routeIs('backend.users.index')) active @endif ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách users</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item  @if (request()->routeIs('backend.categories.*')) menu-open @endif ">
            <a href="" class="nav-link  @if (request()->routeIs('backend.categories.*')) active @endif ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Quản lý Categories
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.categories.create') }}" class="nav-link  @if (request()->routeIs('backend.categories.create')) active @endif ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tạo mới Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.categories.edit', ['category' => '1']) }}" class="nav-link  @if (request()->routeIs('backend.categories.edit')) active @endif ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Chỉnh sửa Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.categories.index') }}" class="nav-link  @if (request()->routeIs('backend.categories.index')) active @endif ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách Categories</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>