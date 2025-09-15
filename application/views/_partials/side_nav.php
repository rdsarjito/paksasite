<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-1">
  <!-- Brand Logo -->
  <a href="<?= site_url('dashboard') ?>" class="brand-link">
    <img src="<?php echo base_url()?>assets/img/img_properties/logoNew.png" alt="AdminLTE Logo" class="brand-image">
    <span class="brand-text font-weight-light">Pengelola KAS</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <div class="bg-success nav-link text-white">
            <i class="nav-icon fas fa-money-bill-wave"></i>
            <p>Sisa Uang: <?= number_format($jumlah_uang_kas - $jumlah_pengeluaran); ?></p>
          </div>
        </li>
        <li class="nav-item has-treeview <?= ($this->uri->segment(1) == 'dashboard') ? 'menu-open' : '' ?>">
          <a href="<?= site_url('dashboard') ?>" class="nav-link <?= ($this->uri->segment(1) == 'dashboard') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= site_url('siswa') ?>" class="nav-link <?= ($this->uri->segment(1) == 'siswa') ? 'active' : '' ?>">
            <i class="fas fa-user-tie nav-icon"></i>
            <p>Siswa</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= site_url('uang_kas') ?>" class="nav-link <?= ($this->uri->segment(1) == 'uang_kas') ? 'active' : '' ?>">
            <i class="fas fa-dollar-sign nav-icon"></i>
            <p>Uang Kas</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= site_url('pengeluaran') ?>" class="nav-link <?= ($this->uri->segment(1) == 'pengeluaran') ? 'active' : '' ?>">
            <i class="fas fa-sign-out-alt nav-icon"></i>
            <p>Pengeluaran</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= site_url('laporan') ?>" class="nav-link <?= ($this->uri->segment(1) == 'laporan') ? 'active' : '' ?>">
            <i class="fas fa-file nav-icon"></i>
            <p>Laporan</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= site_url('setting') ?>" class="nav-link <?= ($this->uri->segment(1) == 'setting') ? 'active' : '' ?>">
            <i class="fas fa-cog nav-icon"></i>
            <p>Pengaturan</p>
          </a>
        </li>
        <div class="dropdown-divider"></div>
        <li class="nav-item">
          <a href="<?= site_url('riwayat') ?>" class="nav-link <?= ($this->uri->segment(1) == 'riwayat_uang_kas') ? 'active' : '' ?>">
            <i class="fas fa-stopwatch nav-icon"></i>
            <p>Riwayat Uang Kas</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= site_url('riwayat_pengeluaran') ?>" class="nav-link <?= ($this->uri->segment(1) == 'riwayat_pengeluaran') ? 'active' : '' ?>">
            <i class="fas fa-stopwatch nav-icon"></i>
            <p>Riwayat Pengeluaran</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>