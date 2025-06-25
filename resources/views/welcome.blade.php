<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ChieMedical | Aplikasi Poliklinik</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="icon" href="{{ asset('logo-chie-medical.png') }}" type="image/png">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: linear-gradient(to right, #f0f4f8, #d9e2ec);
      color: #333;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .welcome-container {
      background: #ffffff;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      text-align: center;
      max-width: 700px;
      width: 100%;
    }

    .welcome-container .icon {
      font-size: 48px;
      color: #4a148c;
      margin-bottom: 20px;
    }

    .welcome-container h1 {
      font-size: 2.2rem;
      font-weight: 700;
      color: #4a148c;
      margin-bottom: 10px;
    }

    .welcome-container p {
      font-size: 1rem;
      margin-bottom: 30px;
    }

    .login-options {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 30px;
      margin-top: 20px;
    }

    .login-box {
      background-color: #f9f9f9;
      border-radius: 12px;
      padding: 30px 20px;
      width: 280px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .login-box:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
    }

    .login-box i {
      font-size: 36px;
      color: #4a148c;
      margin-bottom: 15px;
    }

    .login-box h3 {
      font-size: 1.2rem;
      margin-bottom: 10px;
      color: #111;
    }

    .login-box p {
      font-size: 0.9rem;
      color: #666;
      margin-bottom: 15px;
    }

    .login-box a {
      display: inline-block;
      margin-top: 10px;
      padding: 10px 18px;
      background-color: #4a148c;
      color: #fff;
      text-decoration: none;
      border-radius: 8px;
      font-size: 0.95rem;
      transition: background-color 0.3s ease;
    }

    .login-box a:hover {
      background-color: #6a1b9a;
    }

    @media (max-width: 600px) {
      .login-box {
        width: 100%;
      }

      .welcome-container {
        padding: 30px 20px;
      }
    }
  </style>
</head>

<body>
  <div class="welcome-container">
    <div class="icon">
      <img src="{{ asset('AdminLTE-3.2.0/dist/img/logo-chie-medical.png') }}" alt="ChieMedical Logo" style="width: 200px; height: auto;">
    </div>
    <h1>Selamat Datang di Poliklinik ChieMedical</h1>
    <p>
      Aplikasi Poliklinik ChieMedical dirancang untuk memudahkan interaksi antara Dokter dan Pasien.
    </p>

    <div class="login-options">
      <div class="login-box">
        <i class="fas fa-user-md"></i>
        <h3>Login Sebagai Dokter</h3>
        <p>Apabila Anda adalah seorang Dokter, silakan login untuk mulai melayani pasien.</p>
        <a href="/pages/auth/login-dokter">Login Dokter</a>
      </div>

      <div class="login-box">
        <i class="fas fa-user"></i>
        <h3>Registrasi Sebagai Pasien</h3>
        <p>Apabila Anda adalah seorang Pasien, silahkan Registrasi terlebih dahulu.</p>
        <a href="/pages/auth/register">Registrasi Pasien</a>
      </div>
    </div>
  </div>
</body>

</html>
