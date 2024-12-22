<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Sebagai - Cleanup</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            max-width: 800px;
            width: 100%;
        }
        .login-card h1 {
            font-weight: bold;
            margin-bottom: 30px;
        }
        .login-option {
            background-color: #3b4e6b;
            border-radius: 10px;
            padding: 20px;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: transform 0.3s;
        }
        .login-option:hover {
            transform: translateY(-5px);
        }
        .login-option img {
            max-width: 100px;
            margin-right: 20px;
        }
        .login-option h5 {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .login-option p {
            margin-bottom: 0;
        }
        .login-option .btn {
            background-color: #ffd95a;
            border-color: #ffd95a;
            color: #273043;
            font-weight: bold;
        }
        .login-option .btn:hover {
            background-color: #ffcc00;
            border-color: #ffcc00;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h1 class="text-center mb-4">Masuk Sebagai:</h1>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="login-option">
                    <img src="https://via.placeholder.com/100" alt="Pengguna">
                    <div>
                        <h5>PENGGUNA</h5>
                        <p>Masuk sebagai pengguna jasa cleanup</p>
                        <a href="regist_pengguna.php" class="btn btn-primary">Masuk</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="login-option">
                    <img src="https://via.placeholder.com/100" alt="Pekerja">
                    <div>
                        <h5>PEKERJA</h5>
                        <p>Masuk sebagai pekerja jasa cleanup</p>
                        <a href="regist_pekerja.php" class="btn btn-primary">Masuk</a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3"> <!-- Centered text here -->
                <span class="form-text text-light">Sudah punya akun? <a href="login.php" class="text-decoration-none">Masuk</a></span>
            </div>
        </div>
    </div>
</body>
</html>