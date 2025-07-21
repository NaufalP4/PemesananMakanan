<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Tambah Menu</h3>
          <p class="text-muted">Form untuk menambahkan menu makanan</p>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="<?= base_url('menu') ?>">Menu</a></li>
            <li class="breadcrumb-item active">Tambah</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
          <?php endif; ?>
          <form action="<?= base_url('menu/simpan') ?>" method="post" enctype="multipart/form-data">
            <div class="form-floating mb-3">
              <input type="text" name="nama_menu" class="form-control" id="nama_menu" placeholder="Nama Menu" required>
              <label for="nama_menu">Nama Menu</label>
            </div>
            <div class="form-floating mb-3">
              <input type="number" name="harga" class="form-control" id="harga" placeholder="Harga" required>
              <label for="harga">Harga (Rp)</label>
            </div>
            <!-- <div class="form-floating mb-3">
              <textarea name="deskripsi" class="form-control" placeholder="Deskripsi" id="deskripsi" style="height: 100px;"></textarea>
              <label for="deskripsi">Deskripsi</label>
            </div> -->
            <div class="mb-3">
              <label for="gambar" class="form-label">Gambar</label>
              <input type="file" name="gambar" class="form-control" id="gambar" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= base_url('menu') ?>" class="btn btn-secondary">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>
