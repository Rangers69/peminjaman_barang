<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; ?></title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/')?>plugins/fontawesome-free/css/all.min.css">
  <!-- icheckbootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/')?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/')?>dist/css/adminlte.min.css?v=3.2.0">
  <style>
    body {
      background: linear-gradient(135deg, #6dd5ed 0%, #2193b0 100%);
      min-height: 100vh;
    }
    .login-box {
      width: 100%;
      max-width: 420px;
      margin: 40px auto;
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
      border-radius: 16px;
      background: rgba(255,255,255,0.95);
    }
    .login-logo {
      margin-bottom: 0;
      padding-top: 24px;
    }
    .avatar {
      width: 80px;
      height: 80px;
      background: #2193b0;
      color: #fff;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2.5rem;
      margin: 0 auto 20px auto;
      box-shadow: 0 2px 8px rgba(33,147,176,0.15);
    }
    .card {
      border-radius: 16px;
      border: none;
    }
    .login-card-body {
      padding: 2rem 2rem 1.5rem 2rem;
    }
    .form-control:focus {
      border-color: #2193b0;
      box-shadow: 0 0 0 0.2rem rgba(33,147,176,0.15);
    }
    .btn-primary {
      background: linear-gradient(90deg, #2193b0 0%, #6dd5ed 100%);
      border: none;
      transition: background 0.3s;
    }
    .btn-primary:hover {
      background: linear-gradient(90deg, #6dd5ed 0%, #2193b0 100%);
    }
    .login-box-msg {
      font-weight: 500;
      color: #2193b0;
      margin-bottom: 1.5rem;
    }
    @media (max-width: 576px) {
      .login-box {
        margin: 20px;
        max-width: 100%;
      }
      .login-card-body {
        padding: 1rem;
      }
    }
  </style>
</head>
<body>
  <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?= base_url(); ?>"><b><?= $title; ?></b></a>
      </div>
      <div class="avatar mb-2">
        <i class="fas fa-sign-in-alt"></i>
      </div>
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in to start your session</p>
          <?= $this->session->flashdata('message'); ?>
          <form class="user" method="post" action="<?= base_url('auth/login'); ?>">
            <div class="input-group mb-3">
              <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email"
              value="<?= set_value('email'); ?>">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-8">
                <div class="icheck-primary">
                  <input type="checkbox" id="remember">
                  <label for="remember">
                    Remember Me
                  </label>
                </div>
              </div>
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block py-2">Sign In</button>
              </div>
            </div>
          </form>
          <p class="mb-1">
            <a href="" style="color:#2193b0;">I forgot my password</a>
          </p>
          <p class="mb-0">
            <a href="<?= base_url('auth/register'); ?>" class="text-center" style="color:#2193b0;">Register a new membership</a>
          </p>
        </div>
      </div>
    </div>
  </div>
<!-- jQuery -->
<script src="<?= base_url('assets/')?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/')?>dist/js/adminlte.min.js?v=3.2.0"></script>
</body>
</html>