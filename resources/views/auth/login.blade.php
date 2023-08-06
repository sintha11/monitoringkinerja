<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
  <style>
    body {
      background: #0D0D8C;
    }

    .btn-login {
      font-size: 0.9rem;
      letter-spacing: 0.05rem;
      padding: 0.75rem 1 rem;
    }

    .btn-google {
      color: white !important;
      background-color: #ea4335;
    }

    .btn-facebook {
      color: white !important;
      background-color: #3b5998;
    }
  </style>

  <head>

  <body>

<body>
  <div class="container">
    <div class="row mt-5 pt-2">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">

        @if (Session::get('success'))
          <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <strong>Sukses!</strong> Akun anda berhasil dibuat.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        @if (Session::get('error'))
          <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <strong>Oops!</strong> Email atau password salah.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <div class="card border-0 shadow rounded-3 mb-5 mt-2">
          <div class="card-body p-4 p-sm-5">
            <img src="asset/Logo.png" alt="satpol" width="130" height="150" style="display:block; margin:auto;">
            <h4 class="card-title text-center mb-3 fw-light fs-5 mt-3">SISTEM INFORMASI MONITORING KINERJA<br />SATUAN
              POLISI
              PAMONG PRAJA<br />KOTA MALANG</h4>
            <form action="{{ route('login.authenticate') }}" method="POST">
              @csrf

              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" name="email"
                  placeholder="name@example.com" required>
                <label for="floatingInput">Email</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password"
                  required>
                <label for="floatingPassword">Password</label>
              </div>

              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                <label class="form-check-label" for="rememberPasswordCheck">
                  Remember password
                </label>
              </div>
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign In</button>

                {{-- <br>
                <a href="{{ route('register') }}">Register Now</a> --}}
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
