<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/css/adminlte.css') ?>" />
  </head>
  <body class="register-page bg-body-secondary">
    <div class="register-box">
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <h1 class="mb-0">Register</h1>
        </div>
        <div class="card-body login-card-body">
          <p class="login-box-msg">Daftar untuk mulai memesan makanan</p>

          <form action="<?= base_url('auth/proses_register') ?>" method="post">
            <div class="input-group mb-3">
              <div class="form-floating flex-grow-1">
                <input name="nama" id="nama" type="text" class="form-control" placeholder="Nama Lengkap" required />
                <label for="nama">Nama Lengkap</label>
              </div>
              <div class="input-group-text"><i class="bi bi-person-badge"></i></div>
            </div>
            <div class="input-group mb-3">
              <div class="form-floating flex-grow-1">
                <input name="username" id="loginUsername" type="text" class="form-control" placeholder="Username" required />
                <label for="loginUsername">Username</label>
              </div>
              <div class="input-group-text"><i class="bi bi-person"></i></div>
            </div>
            <div class="input-group mb-3">
              <div class="form-floating flex-grow-1">
                <input name="password" id="loginPassword" type="password" class="form-control" placeholder="Password" required />
                <label for="loginPassword">Password</label>
              </div>
              <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
            </div>
            <div class="input-group mb-3">
              <select name="role" class="form-select" required>
                <option value="" disabled selected>Pilih Role</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
              </select>
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary btn-block w-50">Register</button>
            </div>
          </form>

          <p class="mt-3 mb-0 text-center">
            <a href="<?= base_url('auth') ?>">Sudah punya akun? Login</a>
          </p>

          <?php if (validation_errors()): ?>
            <div class="alert alert-danger">
              <?= validation_errors('<div>- ', '</div>') ?>
            </div>
          <?php endif; ?>

          <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
              <?= $this->session->flashdata('error') ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/js/adminlte.js') ?>"></script>
  </body>
</html>