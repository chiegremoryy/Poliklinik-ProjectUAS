<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ChieMedical | Sign Up</title>
  <link rel="icon" type="image/png" href="{{ asset('logo-chie-medical.png') }}">

  <!-- Google Font: Poppins -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&display=swap">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/dist/css/adminlte.min.css') }}">

  <style>
    body {
      background: linear-gradient(to right, #f0f4f8, #d9e2ec);
      font-family: 'Poppins', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .register-box {
      max-width: 500px;
      margin: auto;
    }

    .card {
      border-radius: 7px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      background-color: #ffffff;
    }

    .login-logo {
      text-align: center;
      margin-bottom: 15px;
    }

    .login-logo img {
      height: 80px;
      margin-bottom: 10px;
    }

    .card-header .h1 {
      font-weight: bold;
      font-size: 26px;
      color: #4a148c;
      text-decoration: none;
    }

    .form-group label {
      color: #4a148c;
      font-weight: 500;
    }

    .form-control {
      border-radius: 5px;
      font-size: 13px;
    }

    .form-control:focus {
      border-color: #4a148c;
      box-shadow: 0 0 5px rgba(74, 20, 140, 0.5);
    }

    .input-group-text {
      background-color: #fff;
      border-left: 0;
      border-radius: 0 5px 5px 0;
    }

    .input-group-text span {
      color: #4a148c;
    }

    .btn-primary {
      background-color: #4a148c;
      border-color: #4a148c;
      border-radius: 10px;
      transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #6a1b9a;
      border-color: #6a1b9a;
    }

    .text-center a {
      color: #4a148c;
    }

    p {
      font-size: 15px;
    }
  </style>
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="card">
      <div class="card-header text-center">
        <img src="{{ asset('AdminLTE-3.2.0/dist/img/logo-chie-medical.png') }}" alt="ChieMedical Logo" class="img-fluid mb-3" style="height: 60px;">
        <a href="/" class="h1"><b>Chie</b>Medical</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg text-center">Create your account to start your medical journey</p>

        <form action="/pages/auth/register" method="post">
          @csrf

          <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="alamat">Alamat Lengkap</label>
            <div class="input-group mb-3">
              <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap" rows="2" required></textarea>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-map-marker-alt"></span>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="no_hp">Nomor HP</label>
            <div class="input-group mb-3">
              <input type="tel" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor HP" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-phone"></span>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="no_ktp">Nomor KTP</label>
            <div class="input-group mb-3">
              <input type="number" class="form-control" id="no_ktp" name="no_ktp" placeholder="Nomor KTP" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-id-card"></span>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
          </div>
        </form>

        <p class="mt-3 mb-0 text-center">
          Already have an account? <a href="login">Login here</a>
        </p>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="{{ asset('AdminLTE-3.2.0/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('AdminLTE-3.2.0/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
