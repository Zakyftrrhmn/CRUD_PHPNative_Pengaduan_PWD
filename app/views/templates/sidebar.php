<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link text-center">
    <span class="brand-text font-bold">Pengaduan MI Pelalawan</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <a href="#" class="d-block">Zaky Fathur Rahman</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">MASTER DATA</li>

        <li class="nav-item">
          <a href="<?= base_url; ?>/home" class="nav-link" aria-label="Dashboard">
            <i class="nav-icon fas fa-home"></i> <!-- Ikon Rumah untuk Dashboard -->
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url; ?>/suratMasuk" class="nav-link" aria-label="Surat Masuk">
            <i class="nav-icon fas fa-envelope"></i> <!-- Ikon Amplop untuk Surat Masuk -->
            <p>Surat Masuk</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url; ?>/suratKeluar" class="nav-link" aria-label="Surat Keluar">
            <i class="nav-icon fas fa-paper-plane"></i> <!-- Ikon Pesawat Kertas untuk Surat Keluar -->
            <p>Surat Keluar</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url; ?>/disposisi" class="nav-link" aria-label="Disposisi">
            <i class="nav-icon fas fa-file-contract"></i> <!-- Ikon Dokumen dengan Tanda Tangan untuk Disposisi -->
            <p>Disposisi</p>
          </a>
        </li>


        <li class="nav-item">
          <a href="<?= base_url; ?>/user" class="nav-link" aria-label="User">
            <i class="nav-icon fas fa-user"></i>
            <p>User</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>