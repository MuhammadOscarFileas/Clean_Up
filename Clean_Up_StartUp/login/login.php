<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Akun Cleanup</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/notyf/notyf.min.css">
    <style>
        body {
            background-color: #ffd95a;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-card {
            background-color: #273043;
            color: #ffd95a;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .login-card h1 {
            font-weight: bold;
            margin-bottom: 30px;
        }
        .login-card .form-control {
            background-color: transparent;
            border-color: #ffd95a;
            color: #ffd95a;
        }
        .login-card .form-control:focus {
            box-shadow: none;
            border-color: #ffd95a;
        }
        .login-card .form-control::placeholder {
            color: #ffffff; /* Change this color to your desired color */
            opacity: 1; /* Ensures placeholder text is fully opaque */
        }
        .login-card .btn-primary {
            background-color: #ffd95a;
            border-color: #ffd95a;
            color: #273043;
            font-weight: bold;
        }
        .login-card .btn-primary:hover {
            background-color: #ffcc00;
            border-color: #ffcc00;
        }
        .login-card .form-text {
            color: #ffd95a;
        }
        .input-group-text {
            background-color: transparent;
            border-color: #ffd95a;
        }
        .input-group-text:hover {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h1 class="text-center mb-4">Masuk Akun Cleanup</h1>
        <h5 class="text-center mb-4">Welcome Back!! 👋</h5>
        <form action="../function/func_login.php" method = "POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name = "username" placeholder="Enter your username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name = "password" placeholder="Enter your password">
                    <span class="input-group-text" id="togglePassword">
                        <i class="bi bi-eye text-light" id="eyeIcon"></i>
                    </span>
                </div>
                <div class="form-text">Belum punya akun? <a href="regist_choice.php" class="text-decoration-none">Buat akun</a></div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>

    <script src="https://unpkg.com/notyf/notyf.min.js"></script>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const passwordInput = document.querySelector('#password');
        const eyeIcon = document.querySelector('#eyeIcon');

        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.querySelector('i').classList.toggle('bi-eye');
            this.querySelector('i').classList.toggle('bi-eye-slash');
        });

        const urlParams = new URLSearchParams(window.location.search);
        const info = urlParams.get('info');

        const notyf = new Notyf({
        duration: 5000, // Durasi dalam milidetik
        position: { x: 'right', y: 'bottom' }, // Lokasi notifikasi
        });

        if(info === 'berhasil'){
            notyf.success('Akun anda berhasil didaftarkan');
        }
        else if(info === 'gagal'){
            notyf.error('Salah Username/Password');
        }

    </script>
</body>
</html>
