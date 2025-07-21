<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Edit Pesanan</h3>
          <p class="text-muted">Form untuk mengubah data pesanan pengguna</p>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="<?= base_url('pesanan') ?>">Pesanan</a></li>
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
          <form action="<?= base_url('pesanan/update') ?>" method="post">
            <input type="hidden" name="id_pesanan" value="<?= $pesanan->id_pesanan ?>">

            <!-- Select User -->
            <div class="form-floating mb-3">
              <select name="id_user" class="form-select" id="id_user" required>
                <?php foreach ($users as $user): ?>
                  <option value="<?= $user->id_user ?>" <?= $user->id_user == $pesanan->id_user ? 'selected' : '' ?>>
                    <?= $user->nama ?>
                  </option>
                <?php endforeach; ?>
              </select>
              <label for="id_user">Nama User</label>
            </div>

            <!-- Select Menu -->
            <div class="form-floating mb-3">
              <select name="id_menu" class="form-select" id="id_menu" required>
                <?php foreach ($menu as $item): ?>
                  <option value="<?= $item->id_menu ?>" <?= $item->id_menu == $pesanan->id_menu ? 'selected' : '' ?>>
                    <?= $item->nama_menu ?> (Rp<?= number_format($item->harga, 0, ',', '.') ?>)
                  </option>
                <?php endforeach; ?>
              </select>
              <label for="id_menu">Menu</label>
            </div>

            <!-- Jumlah -->
            <div class="form-floating mb-3">
              <input type="number" name="jumlah" class="form-control" id="jumlah" value="<?= $pesanan->jumlah ?>" required>
              <label for="jumlah">Jumlah</label>
            </div>

            <!-- Status -->
            <div class="form-floating mb-3">
              <select name="status" class="form-select" id="status" required>
                <option value="menunggu" <?= $pesanan->status == 'menunggu' ? 'selected' : '' ?>>Menunggu</option>
                <option value="diproses" <?= $pesanan->status == 'diproses' ? 'selected' : '' ?>>Diproses</option>
                <option value="selesai" <?= $pesanan->status == 'selesai' ? 'selected' : '' ?>>Selesai</option>
              </select>
              <label for="status">Status Pesanan</label>
            </div>

            <button type="submit" class="btn btn-warning">Update</button>
            <a href="<?= base_url('pesanan/kelola') ?>" class="btn btn-secondary">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>
