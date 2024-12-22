<?php
    session_start();
    include '../function/koneksidb.php';


    $query = mysqli_query($conn, "SELECT ID_review, nama, email, password, no_telepon, jenis_bank, rekening, umur, ktp_path, foto_muka_path, ST_X(alamat) AS longitude, ST_Y(alamat) AS latitude, username FROM queue_review WHERE status = 'Diajukan'")
    or die (mysqli_error($conn));


?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://api.tomtom.com/maps-sdk-for-web/6.x/6.14.0/maps/maps.css">
    <style>
        :root {
            --sidebar-width: 200px;
            --primary-blue: #1e3a5f;
            --secondary-blue: #234974;
            --accent-yellow: #fbb517;
        }
        body {
            background-color: white;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background-color: var(--primary-blue);
            padding: 0.5rem;
        }
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 1rem;
            background-color: white;
        }
        .nav-link {
            color: #fff;
            padding: 0.6rem 1rem;
            margin: 0.2rem 0;
            border-radius: 0.5rem;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
        }
        .nav-link i {
            width: 20px;
            margin-right: 0.5rem;
        }
        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--accent-yellow);
        }
        .profile-section {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
            padding: 0.5rem;
            color: white;
        }
        .profile-image {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            margin-right: 0.8rem;
            background-color: #fff;
        }
        .btn {
            font-size: 0.8rem;
            margin: 0.2rem;
        }
        .search-bar {
            background-color: var(--secondary-blue);
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }
        .search-bar i {
            color: #fff;
            margin-right: 0.5rem;
        }
        .search-input {
            background-color: transparent;
            border: none;
            color: white;
            width: 100%;
            font-size: 0.9rem;
        }
        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        .search-input:focus {
            outline: none;
        }
        details {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 1rem;
            padding: 0.5rem;
        }
        summary {
            font-weight: bold;
            cursor: pointer;
        }
        summary:hover {
            color: var(--accent-yellow);
        }
        .details-content {
            margin-top: 1rem;
        }
        .map-container {
            width: 100%;
            height: 300px;
            border-radius: 10px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="profile-section">
            <div class="profile-image"></div>
            <div>
                <h6 class="mb-0">Admin</h6>
                <small>Dashboard</small>
            </div>
        </div>
        <div class="nav flex-column">
            <a href="#" class="nav-link active">
                <i class="fas fa-clipboard-list"></i> Daftar Permintaan
            </a>
            <a href="../dashboard.php" class = "btn btn-danger">Logout</a>
            <!-- <button class = "btn btn-danger" >Logout</button> -->
        </div>
    </div>

    <div class="main-content">
        <div class="search-bar">
            <i class="fas fa-search"></i>
            <input type="text" class="search-input" placeholder="Cari Permintaan...">
        </div>

        <h4 class="mb-3">Daftar Permintaan</h4>

        <?php
        $data = mysqli_fetch_assoc($query);
            if($data == 0){
                echo "Tidak ada data";
            }
            else{
                while($data){

        ?>
<details>
    <summary><?php echo '#' . $data['ID_review'] . ' ' . $data['nama'] . ' - ' . 'Pendaftaran Akun'?></summary>
    <div class="details-content">
        <p><strong>Nama Panjang :</strong> <?php echo $data['nama'];?> </p>
        <p><strong>Umur :</strong> <?php echo $data['umur'];?> </p>
        <p><strong>Nomor Telepon :</strong> <?php echo $data['no_telepon'];?> </p>
        <p><strong>Jenis Bank :</strong> <?php echo $data['jenis_bank'];?> </p>
        <p><strong>Rekening :</strong> <?php echo $data['rekening'];?> </p>
        <p><strong>Email :</strong> <?php echo $data['email'];?> </p>
        <p><strong>Alamat :</strong> </p>  
        <div id="map-<?= $data['ID_review'] ?>" class="map-container"></div>
                        <script>
                            (function() {
                                var map = tt.map({
                                    key: 'tFrmWF0If1lscn3lGvAAoGAVUrIB2450',
                                    container: 'map-<?= $data['ID_review'] ?>',
                                    center: [<?= $data['longitude'] ?>, <?= $data['latitude'] ?>],
                                    zoom: 15
                                });

                                // Tambahkan marker
                                var marker = new tt.Marker()
                                    .setLngLat([<?= $data['longitude'] ?>, <?= $data['latitude'] ?>])
                                    .addTo(map);

                                    // Fungsi untuk mendapatkan alamat dari API Reverse Geocoding TomTom
                                        function getAddress(longitude, latitude) {
                                            var apiKey = 'tFrmWF0If1lscn3lGvAAoGAVUrIB2450';
                                            var url = `https://api.tomtom.com/search/2/reverseGeocode/${latitude},${longitude}.json?key=${apiKey}`;

                                            fetch(url)
                                                .then(response => response.json())
                                                .then(data => {
                                                    if (data && data.addresses && data.addresses.length > 0) {
                                                        var address = data.addresses[0].address.freeformAddress;

                                                        // Tambahkan popup dengan detail alamat
                                                        var popup = new tt.Popup({ offset: 35 })
                                                            .setHTML(`<strong>Alamat:</strong> ${address}`);

                                                        // Kaitkan popup dengan marker
                                                        marker.setPopup(popup).togglePopup();
                                                    } else {
                                                        console.error('Tidak dapat menemukan alamat untuk koordinat ini.');
                                                    }
                                                })
                                                .catch(error => console.error('Error saat mendapatkan data alamat:', error));
                                        }

                                        // Panggil fungsi untuk mendapatkan alamat
                                        getAddress(<?= $data['longitude'] ?>, <?= $data['latitude'] ?>);
                            })();
                        </script>
        <p><strong>Permintaan:</strong> Pendaftaran Akun</p>
        <p><strong>Dokumen</strong> Pas Foto</p>
        <img src= "<?php echo $data['foto_muka_path'] ?>" alt="Dokumen" class="img-fluid mb-2">
        <p><strong>Dokumen</strong> KTP </p>
        <img src= "<?php echo $data['ktp_path'] ?>" alt="Dokumen" class="img-fluid mb-2">

        <div>
            <button class="btn btn-success btn-sm">Accept</button>
            <button class="btn btn-danger btn-sm">Decline</button>
        </div>
    </div>
</details>
        <?php
                }
            }
        ?>


        <!-- <details>
            <summary>#2 Jane Smith - Perubahan Data</summary>
            <div class="details-content">
                <p><strong>Email:</strong> jane.smith@example.com</p>
                <p><strong>Permintaan:</strong> Perubahan Data</p>
                <p><strong>Detail Permintaan:</strong> Jane Smith mengajukan perubahan data pribadi. Berikut adalah dokumen pendukung:</p>
                <img src="https://via.placeholder.com/400" alt="Dokumen" class="img-fluid mb-2">
                <div>
                    <button class="btn btn-success btn-sm">Accept</button>
                    <button class="btn btn-danger btn-sm">Decline</button>
                </div>
            </div>
        </details> -->
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/6.x/6.14.0/maps/maps-web.min.js"></script>
</body>
</html>
