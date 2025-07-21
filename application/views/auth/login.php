<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?= base_url('assets/css/adminlte.css') ?>" />
  </head>
  <body class="login-page bg-body-secondary">
    <div class="login-box">
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <h1 class="mb-0">Login</h1>
        </div>
        <div class="card-body login-card-body">
          <p class="login-box-msg">Masuk untuk memesan makanan</p>

          <?php if (isset($error)) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <?= $error; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php endif; ?>

          <form action="<?= base_url('auth/login') ?>" method="post">
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

            <div class="text-center">
              <button type="submit" class="btn btn-primary w-50">Sign In</button>
            </div>
          </form>

          <p class="mt-3 mb-0 text-center">
            <a href="<?= base_url('auth/register'); ?>">Belum punya akun? Daftar</a>
          </p>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/js/adminlte.js') ?>"></script>
  </body>
</html>