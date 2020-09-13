  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url()?>" class="brand-link">
      <img src="<?=base_url('dist/img/AdminLTELogo.png')?>" alt="Dashboard" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?=base_url('users')?>" class="nav-link <?=$file === "users"?" active ":""; ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>Users
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('ads')?>" class="nav-link <?=$file === "ads"?" active ":""; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>Ads
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=base_url('logout')?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
