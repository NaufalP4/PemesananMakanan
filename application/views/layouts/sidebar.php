<aside class="app-sidebar bg-primary-subtle" data-bs-theme="light">
  <div class="sidebar-brand">
    <a href="<?= base_url('dashboard') ?>" class="brand-link">
      <img src="<?= base_url('assets/img/AdminLTELogo.png') ?>" alt="Logo" class="brand-image opacity-75 shadow" />
      <span class="brand-text fw-light">Pemesanan Makanan</span>
    </a>
  </div>

  <div class="sidebar-wrapper">
    <nav class="mt-2">
      <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu">

        <!-- Dashboard -->
        <li class="nav-item <?= ($this->uri->segment(1) == 'dashboard') ? 'menu-open' : '' ?>">
          <a href="<?= base_url('dashboard') ?>" class="nav-link <?= ($this->uri->segment(1) == 'dashboard') ? 'active' : '' ?>">
            <i class="nav-icon bi bi-speedometer2"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <!-- Menu dan Pesanan -->
        <li class="nav-item <?= in_array($this->uri->segment(1), ['menu', 'pesanan']) ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?= in_array($this->uri->segment(1), ['menu', 'pesanan']) ? 'active' : '' ?>">
            <i class="nav-icon bi bi-basket2-fill"></i>
            <p>Data <i class="nav-arrow bi bi-chevron-right"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <?php if ($this->session->userdata('role') == 'admin'): ?>
              <li class="nav-item">
                <a href="<?= base_url('menu') ?>" class="nav-link <?= ($this->uri->segment(1) == 'menu') ? 'active' : '' ?>">
                  <i class="nav-icon bi bi-list-ul"></i>
                  <p>Menu Makanan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('pesanan/kelola') ?>" class="nav-link <?= ($this->uri->segment(2) == 'kelola') ? 'active' : '' ?>">
                  <i class="nav-icon bi bi-receipt"></i>
                  <p>Kelola Pesanan</p>
                </a>
              </li>
            <?php else: ?>
            <li class="nav-item">
                <a href="<?= base_url('menu/daftar') ?>" class="nav-link <?= ($this->uri->segment(2) == 'daftar') ? 'active' : '' ?>">
                <i class="nav-icon bi bi-list-ul"></i>
                <p>Menu Makanan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('pesanan') ?>" class="nav-link <?= ($this->uri->segment(1) == 'pesanan') ? 'active' : '' ?>">
                <i class="nav-icon bi bi-bag-check"></i>
                <p>Pesanan Saya</p>
                </a>
            </li>
            <?php endif; ?>
          </ul>
        </li>

        <!-- Manajemen Pengguna (Admin Only) -->
        <?php if ($this->session->userdata('role') == 'admin') : ?>
        <li class="nav-item <?= ($this->uri->segment(1) == 'users') ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?= ($this->uri->segment(1) == 'users') ? 'active' : '' ?>">
            <i class="nav-icon bi bi-person-gear"></i>
            <p>Manajemen User <i class="nav-arrow bi bi-chevron-right"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('users') ?>" class="nav-link <?= ($this->uri->segment(1) == 'users') ? 'active' : '' ?>">
                <i class="nav-icon bi bi-people-fill"></i>
                <p>Data Pengguna</p>
              </a>
            </li>
          </ul>
        </li>
        <?php endif; ?>

      </ul>
    </nav>
  </div>
</aside>
