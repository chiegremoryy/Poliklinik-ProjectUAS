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
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      color: #333;
    }

    .welcome-box {
      background: #ffffff;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      text-align: center;
      max-width: 500px;
      width: 100%;
    }

    .welcome-box h1 {
      font-size: 2rem;
      margin-bottom: 1rem;
      color: #4a148c;
    }

    .welcome-box p {
      font-size: 1rem;
      margin-bottom: 30px;
    }

    .welcome-box a {
      display: inline-block;
      margin: 10px;
      padding: 10px 20px;
      background-color: #4a148c;
      color: #fff;
      text-decoration: none;
      border-radius: 8px;
      font-size: 0.95rem;
      transition: background-color 0.3s ease;
    }

    .welcome-box a:hover {
      background-color: #6a1b9a;
    }

    .icon {
      font-size: 40px;
      color: #4a148c;
      margin-bottom: 10px;
    }
  </style>
</head>

<body>
  <div class="welcome-box">
    <div class="icon">
      <i class="fas fa-stethoscope"></i>
    </div>
    <h1>SELAMAT DATANG DI APLIKASI POLIKLINIK</h1>
    <p>Silakan pilih jenis login Anda:</p>
    <a href="/pages/auth/login-dokter"><i class="fas fa-user-md"></i> Login Dokter/Admin</a>
    <a href="/pages/auth/login"><i class="fas fa-user"></i> Login Pasien</a>
  </div>
</body>

</html>
