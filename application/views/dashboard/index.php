<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Dashboard</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item">
              <a href="<?= base_url('dashboard') ?>">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="app-content">
    <div class="container-fluid">
      <div class="row">

        <?php if ($this->session->userdata('role') == 'admin') : ?>
          <!-- Total Menu -->
          <div class="col-lg-3 col-6">
            <div class="small-box text-bg-primary">
              <div class="inner">
                <h3><?= $jml_menu ?></h3>
                <p>Data Menu</p>
              </div>
              <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M3 6h18v2H3V6zm0 5h18v2H3v-2zm0 5h18v2H3v-2z" />
              </svg>
              <a href="<?= base_url('menu') ?>" class="small-box-footer">
                Lihat Menu <i class="bi bi-link-45deg"></i>
              </a>
            </div>
          </div>

          <!-- Total Pelanggan -->
          <div class="col-lg-3 col-6">
            <div class="small-box text-bg-success">
              <div class="inner">
                <h3><?= $jml_user ?></h3>
                <p>Data Pelanggan</p>
              </div>
              <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 12c2.7 0 4.5 2 4.5 4.5v1.5H7.5v-1.5C7.5 14 9.3 12 12 12Zm0-2.25a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Z" />
              </svg>
              <a href="<?= base_url('users') ?>" class="small-box-footer">
                Lihat Pelanggan <i class="bi bi-link-45deg"></i>
              </a>
            </div>
          </div>

          <!-- Total Pesanan -->
          <div class="col-lg-3 col-6">
            <div class="small-box text-bg-warning">
              <div class="inner">
                <h3><?= $jml_pesanan ?></h3>
                <p>Data Pesanan</p>
              </div>
              <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M3 6h18v2H3V6zm0 5h12v2H3v-2zm0 5h18v2H3v-2z" />
              </svg>
              <a href="<?= base_url('pesanan/kelola') ?>" class="small-box-footer">
                Lihat Pesanan <i class="bi bi-link-45deg"></i>
              </a>
            </div>
          </div>

        <?php else : ?>
          <!-- Untuk Pelanggan -->
          <div class="col-12">
            <div class="card">
              <div class="card-body text-center">
                <h3>Selamat Datang, <?= $this->session->userdata('nama') ?>!</h3>
                <p>Silakan pilih dan pesan makanan dari sistem ini.</p>
              </div>
            </div>
          </div>
        <?php endif; ?>

      </div>
    </div>
  </div>
</main>
