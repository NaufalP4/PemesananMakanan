<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <h3 class="mb-0">Edit Pengguna</h3>
      <p class="text-muted">Formulir untuk mengubah data pengguna aplikasi pemesanan makanan</p>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <form action="<?= base_url('users/update/' . $user->id_user) ?>" method="POST">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" name="nama" id="nama" class="form-control" value="<?= $user->nama ?>" required>
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" name="username" id="username" class="form-control" value="<?= $user->username ?>" required>
            </div>
            <div class="mb-3">
              <label for="role" class="form-label">Role</label>
              <select name="role" id="role" class="form-control" required>
                <option value="admin" <?= $user->role == 'admin' ? 'selected' : '' ?>>Admin</option>
                <option value="user" <?= $user->role == 'user' ? 'selected' : '' ?>>User</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password (opsional)</label>
              <input type="password" name="password" id="password" class="form-control">
              <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="<?= base_url('users') ?>" class="btn btn-secondary">Batal</a>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>