<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ICT Request - Login</title>

    <!-- Fonts & Styles -->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet" />

    <style>
      body {
        background-color: #f8f9fc;
        font-family: 'Poppins', sans-serif;
      }
      .login-card {
        max-width: 400px;
        margin: 80px auto;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        background: #ffffff;
      }
      .login-card h1 {
        font-size: 26px;
        font-weight: 600;
        margin-bottom: 20px;
        text-align: center;
        color: #000000; /* Hitam */
      }
      .form-control-user {
        border-radius: 8px;
        font-size: 14px;
      }
      .btn-green {
        background-color: #28a745;
        border-color: #28a745;
        color: #fff;
        border-radius: 8px;
        font-weight: 500;
        transition: background-color 0.3s ease;
      }
      .btn-green:hover {
        background-color: #218838;
        border-color: #1e7e34;
      }
      .alert {
        font-size: 14px;
        padding: 10px;
        margin-bottom: 20px;
        text-align: center;
      }
      .logo {
        display: block;
        margin: 0 auto 20px;
        max-width: 100px;
      }
    </style>
  </head>

  <body>
    <div class="login-card">
      <img src="<?= base_url('assets/image/emp.png') ?>" alt="EMP Logo" class="logo" />
      <h1>Login</h1>

      <?php
        $session = session();
        if ($session->getFlashdata('error') == 'failed') {
          echo "<div class='alert alert-danger'>Tolong isi form dengan benar.</div>";
        } else if ($session->getFlashdata('error') == 'invalid') {
          echo "<div class='alert alert-danger'>Username atau password salah.</div>";
        }
      ?>

      <form class="user" action="<?= site_url('/auth') ?>" method="post">
        <div class="form-group">
          <input
            type="text"
            class="form-control form-control-user"
            name="username"
            placeholder="Username"
          />
        </div>
        <div class="form-group">
          <input
            type="password"
            class="form-control form-control-user"
            name="password"
            placeholder="Password"
          />
        </div>
        <button type="submit" class="btn btn-green btn-block">
          Masuk
        </button>
      </form>
    </div>

    <!-- Scripts -->
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>
  </body>
</html>