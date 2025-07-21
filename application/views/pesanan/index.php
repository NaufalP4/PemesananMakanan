<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Pesanan Saya</h3>
          <p class="text-muted">Halaman untuk melihat riwayat pesanan makanan Anda</p>
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
                <th>Menu</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Status</th>
                <th>Tanggal</th>
              </tr>
            </thead>
            <tbody>
            <?php $no = 1; foreach ($pesanan as $p): ?>
                <tr>
                <td><?= $no++ ?></td>
                <td><?= $p->nama_menu ?></td>
                <td><?= $p->jumlah ?></td>
                <td>Rp<?= number_format($p->total_harga, 0, ',', '.') ?></td>
                <td>
                    <span class="badge bg-<?= $p->status == 'selesai' ? 'success' : 'warning' ?>">
                    <?= ucfirst($p->status) ?>
                    </span>
                </td>
                <td><?= date('d/m/Y H:i', strtotime($p->tanggal)) ?></td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($pesanan)): ?>
                <tr>
                <td colspan="7" class="text-center text-muted">Belum ada pesanan.</td>
                </tr>
            <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</main>
