<?php
    session_start();
    include '../function/koneksidb.php';
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://api.tomtom.com/maps-sdk-for-web/6.x/6.14.0/maps/maps.css">
    <link rel="stylesheet" href="https://unpkg.com/notyf/notyf.min.css">
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
            <h1 class="text-center mb-4">Registrasi Pengguna</h1>
            <form action="../function/func_regist.php" method = "POST">
                <div class="mb-3">
                    <label for="fullName" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="fullName" value="<?php echo isset($_SESSION['nama_lengkap_verif']) ? $_SESSION['nama_lengkap_verif'] : ''; ?>" name="fullname" placeholder="Enter your full name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" value="<?php echo isset($_SESSION['email_verif']) ? $_SESSION['email_verif'] : ''; ?>" name="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" value="<?php echo isset($_SESSION['username_verif']) ? $_SESSION['username_verif'] : ''; ?>" name="username" placeholder="Enter your username" required>
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
                        <input type="password" class="form-control" id="password_cek" name="password_cek" placeholder="Enter your password" required>
                        <span class="input-group-text" id="togglePassword2">
                            <i class="bi bi-eye text-light" id="eyeIcon2"></i>
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">No. Hp</label>
                    <input type="tel" class="form-control" id="phone" name="telp" value="<?php echo isset($_SESSION['no_telp_verif']) ? $_SESSION['no_telp_verif'] : ''; ?>" placeholder="Enter your phone number" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <div id="map"></div>
                    <input type="hidden" id="latitude" name="latitude" value="<?php echo isset($_SESSION['latitude_verif']) ? $_SESSION['latitude_verif'] : ''; ?>">
                    <input type="hidden" id="longitude" name="longitude" value="<?php echo isset($_SESSION['longtitude_verif']) ? $_SESSION['longtitude_verif'] : ''; ?>">
                    <small class="form-text">Click on the map to select your location.</small>
                </div>
    
                <button type="submit" class="btn btn-primary w-100 mt-3">Submit</button>
            </form>
            
            <!-- Map for selecting location -->
        </div>
    </div>

    <script src="https://unpkg.com/notyf/notyf.min.js"></script>
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
        const passwordInput2 = document.querySelector('#password_cek');
        const eyeIcon2 = document.querySelector('#eyeIcon2');

        togglePassword2.addEventListener('click', function () {
            const type = passwordInput2.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput2.setAttribute('type', type);
            eyeIcon2.classList.toggle('bi-eye');
            eyeIcon2.classList.toggle('bi-eye-slash');
        });

        // Initialize and add the map
        // function initMap() {
        //     const initialPosition = { lat: -6.200000, lng: 106.816666 }; // Default center, Jakarta, Indonesia
        //     const map = new google.maps.Map(document.getElementById("map"), {
        //         zoom: 10,
        //         center: initialPosition,
        //     });

        //     let marker = new google.maps.Marker({
        //         position: initialPosition,
        //         map: map,
        //         draggable: true
        //     });

        //     google.maps.event.addListener(map, 'click', function(event) {
        //         placeMarker(event.latLng);
        //     });

        //     function placeMarker(location) {
        //         marker.setPosition(location);
        //         document.getElementById("latitude").value = location.lat();
        //         document.getElementById("longitude").value = location.lng();
        //     }
        // }

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

        const urlParams = new URLSearchParams(window.location.search);
        const info = urlParams.get('info');

        const notyf = new Notyf({
        duration: 5000, // Durasi dalam milidetik
        position: { x: 'right', y: 'bottom' }, // Lokasi notifikasi
        });

        if(info === '30'){
            notyf.error('Cek Password Tidak Sesuai');
        }
        else if(info === '20'){
            notyf.error('Username Telah Digunakan');
        }
        else if(info === '21'){
            notyf.error('Email Telah Digunakan');
        }
        else if(info === '22'){
            notyf.error('Nomor Telepon Telah Digunakan');
        }
    </script>

    <!-- Replace YOUR_API_KEY with your actual API key -->
    <!-- <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
    </script> -->
</body>
</html>
