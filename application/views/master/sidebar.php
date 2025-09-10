<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="<?= base_url('dashboard'); ?>" class="brand-link">
    <img src="" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Peminjaman Barang</span>
  </a>

  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url('assets/dist/img/logosmk.png'); ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">SMK Muhammadiyah 15</a>
        </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="<?= base_url('dashboard'); ?>" class="nav-link <?= (isset($title) && $title == 'Dashboard') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('peminjaman'); ?>" class="nav-link <?= (isset($title) && $title == 'Data Peminjaman') ? 'active' : ''; ?>">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Peminjaman
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('pengembalian'); ?>" class="nav-link <?= (isset($title) && $title == 'Data Pengembalian') ? 'active' : ''; ?>">
            <i class="nav-icon far fa-image"></i>
            <p>
              Pengembalian
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('user'); ?>" class="nav-link <?= (isset($title) && $title == 'User Management') ? 'active' : ''; ?>">
            <i class="nav-icon far fa-user"></i>
            <p>
              User
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('auth/logout'); ?>" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Logout
            </p>
          </a>
        </li>

      </ul>
    </nav>
    </div>
  </aside>