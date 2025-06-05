<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Tiket Sepakbola</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      min-height: 100vh;
      background: linear-gradient(135deg, #43c6ac 0%, #388e3c 100%);
      font-family: 'Poppins', Arial, sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      overflow: hidden;
    }

    /* Lapangan bola efek */
    body::before {
      content: "";
      position: absolute;
      left: 50%;
      top: 50%;
      width: 600px;
      height: 600px;
      background: radial-gradient(circle at 50% 50%, #a5d6a7 60%, transparent 100%);
      transform: translate(-50%, -50%);
      z-index: 0;
      opacity: 0.25;
      border-radius: 50%;
    }

    .login-wrapper {
      width: 100%;
      max-width: 400px;
      margin: 40px auto;
      z-index: 1;
    }

    .card {
      border-radius: 18px;
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.17);
      border: none;
      padding: 32px 28px 24px 28px;
      background: #fff;
      margin-bottom: 24px;
      animation: fadeIn 0.7s;
      position: relative;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(30px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .card h1 {
      font-size: 2rem;
      font-weight: 700;
      color: #388e3c;
      margin-bottom: 18px;
      text-align: center;
      letter-spacing: 1px;
    }

    .form-control {
      border-radius: 10px;
      margin-bottom: 18px;
      font-size: 1rem;
      padding: 12px;
      border: 1.5px solid #c8e6c9;
    }

    .btn-primary {
      background: linear-gradient(90deg, #388e3c 0%, #ffd600 100%);
      border: none;
      border-radius: 10px;
      font-weight: 700;
      font-size: 1.1rem;
      padding: 10px 0;
      width: 100%;
      color: #222;
      transition: background 0.2s, color 0.2s;
      box-shadow: 0 2px 8px rgba(56, 142, 60, 0.08);
    }

    .btn-primary:hover {
      background: linear-gradient(90deg, #ffd600 0%, #388e3c 100%);
      color: #fff;
    }

    .change_link {
      text-align: center;
      margin-top: 12px;
      font-size: 0.98rem;
    }

    .change_link a {
      color: #388e3c;
      font-weight: 600;
      text-decoration: none;
      transition: color 0.2s;
    }

    .change_link a:hover {
      color: #ffd600;
      text-decoration: underline;
    }

    .logo {
      display: flex;
      justify-content: center;
      margin-bottom: 18px;
    }

    .logo i {
      font-size: 2.7rem;
      color: #ffd600;
      text-shadow: 0 2px 8px #388e3c44;
      background: #388e3c;
      border-radius: 50%;
      padding: 12px;
      border: 3px solid #fff;
      box-shadow: 0 2px 8px #388e3c33;
    }

    .alert {
      font-size: 0.98rem;
      padding: 8px 12px;
      margin-bottom: 18px;
      border-radius: 8px;
    }

    .stadium {
      position: absolute;
      bottom: -30px;
      left: 50%;
      transform: translateX(-50%);
      width: 120px;
      opacity: 0.13;
      z-index: 0;
    }

    @media (max-width: 500px) {
      .login-wrapper {
        max-width: 98vw;
        padding: 0 4vw;
      }

      .card {
        padding: 20px 8px 16px 8px;
      }

      .stadium {
        width: 70px;
      }
    }
  </style>
</head>

<body>
  <img src="https://cdn.pixabay.com/photo/2013/07/13/12/46/soccer-146930_1280.png" class="stadium" alt="stadium">
  <div class="login-wrapper">
    <!-- Login Card -->
    <div class="card" id="loginCard">
      <div class="logo">
        <i class="fas fa-futbol"></i>
      </div>
      <h1>Login</h1>
      <form action="<?= base_url() ?>" method="post">
        <?php if ((session()->getFlashdata('pesan') !== NULL)) : ?>
          <div class="alert alert-danger">
            <?= session()->getFlashdata('pesan'); ?>
          </div>
        <?php else : ?>
          <div class="alert alert-success text-center">
            Masuk untuk beli tiket pertandingan favoritmu!
          </div>
        <?php endif; ?>
        <input type="text" class="form-control" placeholder="Username" name="username" required />
        <input type="password" class="form-control" placeholder="Password" name="password" required />
        <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt me-1"></i>Login</button>
        <div class="change_link mt-2">
          Belum punya akun? <a href="#" onclick="showRegister(event)">Daftar Sekarang</a>
        </div>
      </form>
    </div>
    <!-- Register Card -->
    <div class="card d-none" id="registerCard">
      <div class="logo">
        <i class="fas fa-user-plus"></i>
      </div>
      <h1>Daftar Akun</h1>
      <form action="<?= base_url(); ?>daftar/simpandata" method="post">
        <input type="text" class="form-control" placeholder="Nama" required name="nama" />
        <input type="text" class="form-control" placeholder="Username" required name="username" />
        <input type="password" class="form-control" placeholder="Password" required name="password" />
        <select name="status" id="status" class="form-control mb-3" required>
          <option value="" selected disabled>-- Status --</option>
          <option value="USER">User</option>
        </select>
        <button type="submit" class="btn btn-primary"><i class="fas fa-user-plus me-1"></i>Daftar</button>
        <div class="change_link mt-2">
          Sudah punya akun? <a href="#" onclick="showLogin(event)">Login</a>
        </div>
      </form>
    </div>
  </div>
  <script>
    function showRegister(e) {
      e.preventDefault();
      document.getElementById('loginCard').classList.add('d-none');
      document.getElementById('registerCard').classList.remove('d-none');
    }

    function showLogin(e) {
      e.preventDefault();
      document.getElementById('registerCard').classList.add('d-none');
      document.getElementById('loginCard').classList.remove('d-none');
    }
    // Optional: Show register if #signup in URL
    if (window.location.hash === "#signup") showRegister({
      preventDefault: () => {}
    });
  </script>
</body>

</html>