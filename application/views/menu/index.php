<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Daftar Menu</h3>
          <p class="text-muted">
            <?php if ($this->session->userdata('role') == 'admin'): ?>
              Halaman untuk mengelola menu makanan
            <?php else: ?>
              Silakan pilih makanan yang ingin dipesan
            <?php endif; ?>
          </p>

          <?php if ($this->session->userdata('role') == 'admin'): ?>
            <a href="<?= base_url('menu/tambah') ?>" class="btn btn-primary btn-sm mb-3">Tambah Menu</a>
          <?php endif; ?>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Menu</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
          <?php endif; ?>

          <div class="row">
            <?php if (!empty($menu)): ?>
              <?php foreach ($menu as $m): ?>
                <div class="col-md-4 mb-4">
                  <div class="card h-100">
                    <?php if ($m->gambar): ?>
                      <img src="<?= base_url('uploads/menu/' . $m->gambar) ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <?php endif; ?>
                    <div class="card-body text-start">
                    <p class="fw-bold mb-1" style="font-size: 18px;"><?= $m->nama_menu ?></p>
                    <div class="text-primary" style="font-size: 16px;">Rp<?= number_format($m->harga, 0, ',', '.') ?></div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                      <?php if ($this->session->userdata('role') == 'admin'): ?>
                        <div>
                          <a href="<?= base_url('menu/edit/' . $m->id_menu) ?>" class="btn btn-warning btn-sm">Edit</a>
                          <a href="<?= base_url('menu/hapus/' . $m->id_menu) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </div>
                      <?php else: ?>
                        <a href="<?= base_url('pesanan/pesan/' . $m->id_menu) ?>" class="btn btn-success btn-sm w-100">Pesan</a>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <div class="col-12 text-center text-muted">
                Tidak ada data menu.
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
