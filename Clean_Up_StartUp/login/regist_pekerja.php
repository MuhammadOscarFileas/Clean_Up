<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pengguna</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://api.tomtom.com/maps-sdk-for-web/6.x/6.14.0/maps/maps.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #ffd95a;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .registration-card-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            width: 100%;
            padding: 30px;
            box-sizing: border-box;
        }
        .registration-card {
            position: relative;
            background-color: #273043;
            color: #ffd95a;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }
        .registration-card h1 {
            font-weight: bold;
            margin-bottom: 20px;
        }
        .registration-card .form-control {
            background-color: transparent;
            border-color: #ffd95a;
            color: #ffd95a;
        }
        .registration-card .form-control:focus {
            box-shadow: none;
            border-color: #ffd95a;
        }
        .registration-card .form-control::placeholder {
            color: #ffffff;
            opacity: 1;
        }
        .registration-card .btn-primary {
            background-color: #ffd95a;
            border-color: #ffd95a;
            color: #273043;
            font-weight: bold;
        }
        .registration-card .btn-primary:hover {
            background-color: #ffcc00;
            border-color: #ffcc00;
        }
        .registration-card .form-text {
            color: #ffd95a;
        }
        .input-group-text {
            background-color: transparent;
            border-color: #ffd95a;
            cursor: pointer;
        }
        #map {
            width: 100%;
            height: 300px;
            border-radius: 10px;
            margin-bottom: 15px;
        }
        .back-icon {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: transparent;
            border: 2px solid rgb(168, 124, 60);
            color: #ffd95a;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            text-decoration: none;
        }
        .back-icon:hover {
            background-color: rgb(168, 124, 60);
            color : #ffffff;
        }
    </style>
</head>
<body>
    <div class="registration-card-container">
        <div class="registration-card">
            <a href="regist_choice.php" class="back-icon">
                <i class="bi bi-arrow-left"></i>
            </a>
            <form action="regist_pekerja_upload.php" method = "POST">
                <h1 class="text-center mb-4">Registrasi Pekerja</h1>
                <div class="mb-3">
                    <label for="fullName" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="fullName" name="fullname" placeholder="Enter your full name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                        <span class="input-group-text" id="togglePassword">
                            <i class="bi bi-eye text-light" id="eyeIcon"></i>
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Cek Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="cek_password" name="cek_password" placeholder="Enter your password" required>
                        <span class="input-group-text" id="togglePassword2">
                            <i class="bi bi-eye text-light" id="eyeIcon2"></i>
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">No. Hp</label>
                    <input type="tel" class="form-control" id="phone" name="no_telp" placeholder="Enter your phone number" required>
                </div>
                
                <!-- Map for selecting location -->
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <div id="map"></div>
                    <input type="hidden" id="latitude" name="latitude">
                    <input type="hidden" id="longitude" name="longitude">
                    <small class="form-text">Click on the map to select your location.</small>
                </div>
                <button type = "submit" class = "btn btn-primary w-100 mt-3">Next</button>
                <!-- <a href="regist_pekerja_upload.php" class="btn btn-primary w-100 mt-3">Next</a> -->
                <!-- <button type="submit" class="btn btn-primary w-100 mt-3">Next</button> -->
            </form>
        </div>
    </div>

    <script src="https://api.tomtom.com/maps-sdk-for-web/6.x/6.14.0/maps/maps-web.min.js"></script>
    <script>
        // Password toggle visibility
        const togglePassword = document.querySelector('#togglePassword');
        const passwordInput = document.querySelector('#password');
        const eyeIcon = document.querySelector('#eyeIcon');

        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            eyeIcon.classList.toggle('bi-eye');
            eyeIcon.classList.toggle('bi-eye-slash');
        });

        const togglePassword2 = document.querySelector('#togglePassword2');
        const passwordInput2 = document.querySelector('#cek_password');
        const eyeIcon2 = document.querySelector('#eyeIcon2');

        togglePassword.addEventListener('click', function () {
            const type = passwordInput2.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput2.setAttribute('type', type);
            eyeIcon2.classList.toggle('bi-eye');
            eyeIcon2.classList.toggle('bi-eye-slash');
        });

        const apiKey = 'tFrmWF0If1lscn3lGvAAoGAVUrIB2450'; // Ganti dengan API key TomTom Anda
        const initialPosition = { lat: -7.8032485, lng: 110.333645 }; // Yogyakarta, Indonesia

        const map = tt.map({
            key: apiKey,
            container: 'map',
            center: [initialPosition.lng, initialPosition.lat],
            zoom: 10,
        });

        // Tambahkan marker ke peta
        let marker = new tt.Marker({
            draggable: true,
        })
            .setLngLat([initialPosition.lng, initialPosition.lat])
            .addTo(map);

        // Event listener saat marker dipindahkan
        marker.on('dragend', () => {
            const lngLat = marker.getLngLat();
            document.getElementById("latitude").value = lngLat.lat;
            document.getElementById("longitude").value = lngLat.lng;
        });

        // Event listener untuk klik pada peta
        map.on('click', (event) => {
            const lngLat = event.lngLat;
            marker.setLngLat(lngLat);
            document.getElementById("latitude").value = lngLat.lat;
            document.getElementById("longitude").value = lngLat.lng;
        });
    </script>

</body>
</html>
