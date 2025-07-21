<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row mb-3">
        <div class="col-sm-6">
          <h3>Data Pengguna</h3>
          <p class="text-muted">Manajemen pengguna aplikasi pemesanan makanan</p>
          <a href="<?= base_url('users/tambah') ?>" class="btn btn-primary btn-sm">Tambah User</a>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Pengguna</li>
          </ol>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Role</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($users as $u): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $u->nama ?></td>
                <td><?= $u->username ?></td>
                <td><span class="badge bg-<?= $u->role == 'admin' ? 'primary' : 'secondary' ?>"><?= ucfirst($u->role) ?></span></td>
                <td>
                  <a href="<?= base_url('users/edit/'.$u->id_user) ?>" class="btn btn-warning btn-sm">Edit</a>
                  <a href="<?= base_url('users/hapus/'.$u->id_user) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus user ini?')">Hapus</a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>