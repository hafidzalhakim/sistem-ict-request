<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | ICT Request</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />

  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: #f6f5f7;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .container {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
                  0 10px 10px rgba(0,0,0,0.22);
      width: 800px;
      max-width: 100%;
      display: flex;
      overflow: hidden;
    }

    .login-form, .welcome {
      padding: 40px;
      width: 50%;
      position: relative;
    }

    .login-form {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .login-title {
      font-weight: 600;
      font-size: 26px;
      margin: 0;
      margin-bottom: 60px;
    }

    form {
      width: 100%;
      max-width: 300px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .input {
      background-color: #eee;
      border: none;
      padding: 12px 15px;
      margin: 8px 0;
      width: 100%;
      border-radius: 6px;
    }

    .btn {
      border-radius: 20px;
      border: none;
      padding: 12px 45px;
      background-color: #28a745;
      color: #fff;
      font-size: 14px;
      font-weight: bold;
      margin-top: 20px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .btn:hover {
      background-color: #218838;
    }

    .welcome {
      background: linear-gradient(to right, #28a745, #218838);
      color: #fff;
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
    }

    .welcome img {
      max-width: 100px;
      height: auto;
      margin-bottom: 20px;
    }

    .welcome h2 {
      font-size: 24px;
      font-weight: 600;
      margin-top: 10px; /* Sesuaikan ini untuk sejajarkan dengan "Login" */
      margin-bottom: 10px;
    }

    .welcome p {
      font-size: 14px;
      margin: 0;
      max-width: 250px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="login-form">
      <h2 class="login-title">Login</h2>
      <form action="<?= site_url('/auth') ?>" method="post">
        <input class="input" type="text" name="username" placeholder="Email" required />
        <input class="input" type="password" name="password" placeholder="Password" required />
        <button class="btn" type="submit">Masuk</button>
      </form>
    </div>

<div class="welcome">
  <img src="<?= base_url('assets/image/emp.png') ?>" alt="EMP Logo" />
  
  <!-- Spacer antar logo dan teks -->
  <div style="height: 20px;"></div>

  <h2>Selamat Datang di Sistem ICT Request</h2>
  <p>Silakan login untuk mengakses layanan internal perusahaan.</p>
</div>

