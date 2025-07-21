<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Edit Menu</h3>
          <p class="text-muted">Form untuk mengubah data menu makanan</p>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="<?= base_url('menu') ?>">Menu</a></li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <form action="<?= base_url('menu/update') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_menu" value="<?= $menu->id_menu ?>">
            <div class="form-floating mb-3">
              <input type="text" name="nama_menu" class="form-control" id="nama_menu" value="<?= $menu->nama_menu ?>" required>
              <label for="nama_menu">Nama Menu</label>
            </div>
            <div class="form-floating mb-3">
              <input type="number" name="harga" class="form-control" id="harga" value="<?= $menu->harga ?>" required>
              <label for="harga">Harga (Rp)</label>
            </div>
            <!-- <div class="form-floating mb-3">
              <textarea name="deskripsi" class="form-control" id="deskripsi" style="height: 100px;"><?= $menu->deskripsi ?></textarea>
              <label for="deskripsi">Deskripsi</label>
            </div> -->
            <div class="mb-3">
              <label for="gambar" class="form-label">Ganti Gambar (biarkan kosong jika tidak diubah)</label><br>
              <?php if ($menu->gambar): ?>
                <img src="<?= base_url('uploads/menu/' . $menu->gambar) ?>" width="100" class="img-thumbnail mb-2">
              <?php endif; ?>
              <input type="file" name="gambar" class="form-control" id="gambar" accept="image/*">
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
            <a href="<?= base_url('menu') ?>" class="btn btn-secondary">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>
