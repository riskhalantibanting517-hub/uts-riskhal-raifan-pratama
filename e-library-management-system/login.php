
<?php
session_start();
$pesan = "";
// jika sudah login via session, langsung ke beranda
if (!empty($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
// cek cookie 'remember_user' untuk otomatis login sederhana
if (empty($_SESSION['user_id']) && !empty($_COOKIE['remember_user'])) {
    $_SESSION['username'] = $_COOKIE['remember_user'];
    // lookup id jika perlu
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("koneksi.php");

    // sanitasi input
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $pesan = 'Username dan password wajib diisi.';
    } else {
        // gunakan prepared statement untuk mencegah SQL injection
        $stmt = $koneksi->prepare('SELECT id, username, pass FROM users WHERE username = ? LIMIT 1');
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            // periksa password (asumsikan md5, jika sudah di-hash lain ganti dengan password_verify)
            if (hash('md5', $password) === $row['pass']) {
                // login success
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                // remember me
                if (!empty($_POST['cek']) && $_POST['cek'] === 'yes') {
                    setcookie('remember_user', $row['username'], time() + (86400 * 30), '/');
                }
                header('Location: index.php');
                exit;
            } else {
                $pesan = 'Username atau password salah.';
            }
        } else {
            $pesan = 'Username atau password salah.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="/riskhal-raifan-pratama/css/theme.css">
</head>

<body class="login-page">
    <div class="login-container d-flex align-items-center justify-content-center vh-100">
        <div class="w-100">
            <div class="text-center">
                <img src="https://upload.wikimedia.org/wikipedia/commons/3/33/Jumpman.png" alt="Michael Jordan" class="login-logo">
                <h2 class="text-white mb-4">Welcome Back</h2>
                <?php if($pesan){ ?>
                <div class="alert alert-danger" role="alert"><?=$pesan?></div>
                <?php } ?>
            </div>
            <form id="loginForm" action="login.php" method="post" class="mt-3 needs-validation" novalidate>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                    <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" required>
                    <div class="invalid-feedback">Please enter your username.</div>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" id="passwordField" name="password" class="form-control form-control-lg" placeholder="Password" required>
                    <span class="input-group-text" id="togglePassword" style="cursor:pointer;"><i class="fa-solid fa-eye"></i></span>
                    <div class="invalid-feedback">Please enter your password.</div>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" name="cek" value="yes" class="form-check-input" id="rememberCheck">
                    <label class="form-check-label text-white" for="rememberCheck">Remember me</label>
                </div>
                <button type="submit" name="tombol" id="loginBtn" class="btn btn-login btn-lg w-100">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <span class="btn-text">LOG IN</span>
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script>
        // bootstrap validation & spinner
        (function () {
            'use strict';
            var form = document.getElementById('loginForm');
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    var btn = document.getElementById('loginBtn');
                    btn.classList.add('loading');
                }
                form.classList.add('was-validated');
            }, false);
        })();

        // toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function () {
            var pw = document.getElementById('passwordField');
            var icon = this.querySelector('i');
            if (pw.type === 'password') {
                pw.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                pw.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>
</body>

</html>
