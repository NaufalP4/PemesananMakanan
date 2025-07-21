<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Kelola Pesanan</h3>
          <p class="text-muted">Halaman untuk mengelola semua pesanan dari pengguna</p>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Pesanan</li>
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

          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>User</th>
                <th>Menu</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php $no = 1; foreach ($pesanan as $p): ?>
                <tr>
                <td><?= $no++ ?></td>
                <td><?= $p->nama_user ?></td>
                <td><?= $p->nama_menu ?></td>
                <td><?= $p->jumlah ?></td>
                <td>Rp<?= number_format($p->total_harga, 0, ',', '.') ?></td>
                <td>
                    <form method="post" action="<?= base_url('pesanan/update_status/' . $p->id_pesanan) ?>">
                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                        <option value="menunggu" <?= $p->status == 'menunggu' ? 'selected' : '' ?>>Menunggu</option>
                        <option value="diproses" <?= $p->status == 'diproses' ? 'selected' : '' ?>>Diproses</option>
                        <option value="selesai" <?= $p->status == 'selesai' ? 'selected' : '' ?>>Selesai</option>
                    </select>
                    </form>
                </td>
                <td><?= date('d/m/Y H:i', strtotime($p->tanggal)) ?></td>
                <td>
                    <a href="<?= base_url('pesanan/edit/' . $p->id_pesanan) ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?= base_url('pesanan/hapus/' . $p->id_pesanan) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($pesanan)): ?>
                <tr>
                <td colspan="8" class="text-center text-muted">Tidak ada pesanan.</td>
                </tr>
            <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</main>
