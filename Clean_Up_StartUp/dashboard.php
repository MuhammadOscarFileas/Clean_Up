<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        //header('Location: login/login.php');
        //exit;
    }

?>

<!DOCTYPE html>
<html lang="id">
<!-- Head section sama seperti sebelumnya -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CleanUp - Jasa Kebersihan Professional</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <style>
        .fixed-top {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }
        .sticky-nav {
            position: relative;
        }
        .service-card {
            transition: transform 0.3s;
            cursor: pointer;
        }
        .service-card:hover {
            transform: translateY(-5px);
        }
        .bg-custom {
            /* background-color: #f8f9fa; */
            background-color : rgb(40,76,116);
        }
        .carousel-item {
            height: 600px;
        }
        .carousel-item img {
            object-fit: cover;
            height: 100%;
            width: 100%;
        }
        .btn-primary {
            background-color: #0d6efd;
            border: none;
            padding: 10px 25px;
        }
        .card {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color : rgb(168, 124, 60);
        }
        
        .carousel-item::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.4);
        }
        .carousel-caption {
            z-index: 2;
            bottom: 100px;
        }
        .footer {
            background-color: #000;
            color: #ffc107;
            padding: 20px 0;
            text-align: center;
        }
        .footer-icon {
            width: 50px;
            height: 50px;
            color: #ffc107;
            border: 2px solid #ffc107;
            border-radius: 50%;
            padding: 5px;
            margin: 0 10px;
            display: inline-block;
            transition: background-color 0.3s, color 0.3s;
            font-size: 1.5em;
        }
        .footer-icon:hover {
            background-color: rgb(168, 124, 60);
            color: #000;
        }
        .custom-button {
            border: 2px solid rgb(40,76,116);
            color: rgb(40,76,116);
            background-color: transparent;
            transition: border-color 0.3s, box-shadow 0.3s, color 0.3s, background-color 0.3s; 
        }
        .custom-button:hover {
            border-color: rgb(60,96,136); 
            color: white; 
            background-color: rgb(40,76,116); 
            box-shadow: 0px 4px 8px rgba(40,76,116, 0.3); 
        }
        .logo {
            width: 30px; 
            height: auto; 
        }
        .profile-picture { 
            width: 40px; 
            height: 40px; 
            border-radius: 50%; 
         }
         .search-bar input[type="search"] {
            padding: 10px;
            border-radius: 20px 0 0 20px;
            border: 2px solid rgb(40,76,116);
            outline: none;
        }
        .search-bar button {
            background-color: rgb(40,76,116);
            color: white;
            border: 2px solid rgb(40,76,116);
            border-radius: 0 20px 20px 0;
            transition: background-color 0.3s, color 0.3s;
        }
        .search-bar button:hover {
            background-color: rgb(60,96,136);
            color: white;
        }
        .nav-item {
            font-weight:bold;
        }

        /* POPUP */
        .popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .popup-content {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            width: 90%;
            max-width: 400px;
            text-align: center;
        }
        .driver-photo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 15px;
        }
        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            cursor: pointer;
            font-size: 20px;
            color: black;
        }
        .contact-btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        .contact-btn:hover {
            background-color: #0056b3;
        }

        /* Popup container (sama seperti popup driver) */
        .popup-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        }

        /* Konten popup */
        .popup-box {
        background-color: #002f4b; /* Warna utama */
        color: white;
        padding: 20px;
        border-radius: 10px;
        width: 90%;
        max-width: 500px;
        text-align: center;
        font-family: Arial, sans-serif;
        }

        /* Judul popup */
        .popup-title {
        font-size: 20px;
        margin-bottom: 15px;
        }

        /* Bagian rating */
        .rating-section {
        margin: 15px 0;
        }

        .rating-section .stars span {
        font-size: 30px;
        cursor: pointer;
        color: white;
        margin: 0 5px;
        }

        .rating-section .stars span:hover,
        .rating-section .stars span.selected {
        color: gold;
        }

        /* Foto pekerja */
        .worker-photo {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        margin: 10px 0;
        }

        /* Detail informasi */
        .details {
        text-align: left;
        margin-top: 15px;
        }

        .details h5 {
        color: #ffd700; /* Warna kuning */
        margin-bottom: 5px;
        }

        /* Kotak review */
        .textarea-review {
        margin-top: 15px;
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        font-size: 14px;
        resize: none;
        }

        /* Tombol submit */
        .btn-submit {
        background-color: gold;
        color: #002f4b;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
        }

        .btn-submit:hover {
        background-color: #ffd700;
        }

    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
            <img src="aset_gambar/logo_clean_up.png" alt="Logo" class="logo me-2">CleanUp!</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Cek apakah user sudah login -->

                    <?php
                        if(isset($_SESSION['username'])){
                    ?>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Pesan Jasa</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Aktivitas</a>
                        </li>
                        <li class="nav-item">
                            <form class="search-bar d-flex me-3">
                                <input class="form-control me-2" type="search" placeholder="Cari layanan..." aria-label="Search">
                                <button class="btn btn-outline-primary" type="submit">Cari</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <img src="path_to_user_image.jpg" alt="Profile Picture" class="profile-picture ms-3">
                        </li>
                    <?php
                        }
                        else{
                    ?>
                        <li class="nav-item">
                        <!-- <button class="btn btn-primary ms-2 custom-button">DAFTAR/MASUK</button> -->
                        <a href="login/login.php" class="btn btn-primary ms-2 custom-button">DAFTAR/MASUK</a>
                        </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Carousel dengan gambar yang sesuai -->
    <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952" class="d-block w-100" alt="Home Cleaning">
                <div class="carousel-caption">
                    <h2 class="display-4 fw-bold">Bersih, Cepat, dan Praktis</h2>
                    <p class="fs-5">Jasa kebersihan professional untuk hunian Anda</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1527515545081-5db817172677" class="d-block w-100" alt="Deep Cleaning">
                <div class="carousel-caption">
                    <h2 class="display-4 fw-bold">Layanan Deep Cleaning</h2>
                    <p class="fs-5">Pembersihan menyeluruh dengan peralatan khusus</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b" class="d-block w-100" alt="Garden Cleaning">
                <div class="carousel-caption">
                    <h2 class="display-4 fw-bold">Perawatan Taman</h2>
                    <p class="fs-5">Buat taman Anda lebih asri dan terawat</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

        <?php if(isset($_SESSION['pesan_jasa'])){    ?>

        <div id="driverPopup" class="popup" style="">
            <div class="popup-content">
                <span class="close-btn">&times;</span>
                    <div class="driver-details">
                        <img id="driverPhoto" src="" alt="Foto Driver" class="driver-photo">
                        <h3 id="driverName">Nama Pekerja</h3>
                        <p id="driverInfo"></p>
                        <p id="driverVehicle"></p>
                    </div>
                <button id="contactDriver" class="contact-btn">Hubungi Driver</button>
            </div>
        </div>

        <?php }?>

        <?php if(isset($_SESSION['ulasan'])){    ?>

            <div id="ratingPopup" class="popup-container" style="">
            <div class="popup-box">
                <h3 class="popup-title">
                Terima Kasih Telah Menggunakan Jasa Cleanup! 😄
                </h3>
                <p>Untuk Pengalaman yang Lebih Baik</p>

                <!-- Rating -->
                <div class="rating-section">
                <p>Beri Rating Untuk Pekerja:</p>
                <div id="stars" class="stars">
                    <span data-value="1">&#9734;</span>
                    <span data-value="2">&#9734;</span>
                    <span data-value="3">&#9734;</span>
                    <span data-value="4">&#9734;</span>
                    <span data-value="5">&#9734;</span>
                </div>
                </div>

                <!-- Info Pekerja -->
                <div class="worker-info">
                <img src="https://via.placeholder.com/80" alt="Foto Pekerja" class="worker-photo">
                <h4 id="workerName">Dodi Dobby</h4>
                <p>Pekerja</p>
                </div>

                <!-- Detail Pesanan -->
                <div class="details">
                <h5>Detail Pesanan</h5>
                <p><strong>Jenis:</strong> Kamar Mandi + Ruang Tamu</p>
                <p><strong>Durasi:</strong> 3 Jam</p>
                <p><strong>Alat:</strong> Tidak menggunakan alat</p>
                <p><strong>Waktu:</strong> 10.00 WIB</p>
                </div>

                <!-- Detail Pembayaran -->
                <div class="details">
                <h5>Detail Pembayaran</h5>
                <p><strong>Total:</strong> Rp. 240.000,-</p>
                <p><strong>Metode:</strong> Mbanking - BCA</p>
                <p><strong>Status:</strong> Sudah Dibayarkan</p>
                </div>

                <!-- Review Box -->
                <textarea id="reviewText" placeholder="Ketik kesan & pesan..." class="textarea-review"></textarea>
                
                <!-- Submit Button -->
                <button id="submitRating" class="btn-submit">SUBMIT</button>
            </div>
            </div>

        <?php }?>

    <!-- Service Cards dengan gambar yang sesuai -->
    <section id="layanan" class="py-5 bg-custom">
        <div class="container">
            <h2 class="text-center text-light mb-5">Layanan Kami</h2>
            <div class="row g-4">
               
                <div class="col-md-6 col-lg-3">
                    <div class="card service-card h-100">
                        <img src="https://images.unsplash.com/photo-1527515637462-cff94eecc1ac" class="card-img-top" alt="Home Cleaning">
                        <div class="card-body text-center">
                            <h5 class="card-title">Home Cleaning</h5>
                            <p class="card-text">Jasa kebersihan sehari-hari untuk bagian dalam hunianmu</p>
                            <a href="pesan_jasa/homecleaning.php" class="btn btn-primary rounded-pill custom-button">Pesan Sekarang</a>
                            <!-- <button class="btn btn-primary rounded-pill custom-button">Pesan Sekarang</button> -->
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="card service-card h-100">
                        <img src="https://images.unsplash.com/photo-1557429287-b2e26467fc2b" class="card-img-top" alt="Garden Cleaning">
                        <div class="card-body text-center">
                            <h5 class="card-title">Garden Cleaning</h5>
                            <p class="card-text">Jasa kebersihan sehari-hari untuk bagian taman hunianmu</p>
                            <button class="btn btn-primary rounded-pill custom-button disabled">Coming Soon</button>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="card service-card h-100">
                        <img src="https://images.unsplash.com/photo-1584622650111-993a426fbf0a" class="card-img-top" alt="Bathroom Cleaning">
                        <div class="card-body text-center">
                            <h5 class="card-title">Bathroom Cleaning</h5>
                            <p class="card-text">Jasa kebersihan sehari-hari untuk bagian kamar mandi hunianmu</p>
                            <button class="btn btn-primary rounded-pill custom-button disabled">Coming Soon</button>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="card service-card h-100">
                        <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952" class="card-img-top" alt="Deep Cleaning">
                        <div class="card-body text-center">
                            <h5 class="card-title">Deep Cleaning</h5>
                            <p class="card-text">Pencucian furnitur dan pembersihan ruangan dengan peralatan khusus</p>
                            <button class="btn btn-primary rounded-pill custom-button disabled">Coming Soon</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section id="tentang" class="py-5 bg-custom">
        <div class="container">
            <h2 class="text-center text-light mb-5">Kenapa harus CleanUp?</h2>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card h-100 text-center p-3">
                        <h5>Praktis dan mudah</h5>
                        <p>Semua di ujung jari Anda, pesan kapan saja!</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100 text-center p-3">
                        <h5>Layanan profesional</h5>
                        <p>Dikerjakan oleh tenaga ahli dengan peralatan lengkap.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100 text-center p-3">
                        <h5>Harga terjangkau</h5>
                        <p>Bersih-bersih tanpa menguras kantong.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100 text-center p-3">
                        <h5>Jaminan kebersihan</h5>
                        <p>Kami tidak hanya membersihkan, tapi membuat rumah Anda lebih nyaman!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <!-- <section class="py-5 bg-primary text-white text-center">
        <div class="container">
            <h2 class="mb-4">Tentang Kami</h2>
            <p class="mb-4">Pesan CleanUp sekarang, dan rasakan rumah bersih tanpa repot!</p>
        </div>
    </section> -->
    <footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h5><i class="bi bi-broom"></i> Cleanup</h5>
      </div>
      <div class="col-12">
        <p>Tentang kami:</p>
        <a href="mailto:example@example.com" class="footer-icon"><i class="bi bi-envelope text-light"></i></a>
        <a href="https://instagram.com" class="footer-icon"><i class="bi bi-instagram text-light"></i></a>
        <a href="https://wa.me/123456789" class="footer-icon"><i class="bi bi-whatsapp text-light"></i></a>
      </div>
    </div>
  </div>
</footer>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const navbar = document.querySelector('.navbar');
            const carousel = document.getElementById('mainCarousel');

            window.addEventListener('scroll', function () {
                const carouselHeight = carousel.offsetHeight;
                const scrollPosition = window.scrollY;

                if (scrollPosition > carouselHeight) {
                    navbar.classList.remove('fixed-top');
                    navbar.classList.add('sticky-nav');
                } else {
                    navbar.classList.add('fixed-top');
                    navbar.classList.remove('sticky-nav');
                }
            });
        });
    </script>
    <script>
        fetch('/api/driver-found')
  .then(response => response.json())
  .then(data => {
    if (data.status === "success") {
      // Isi data popup
      document.getElementById("driverPhoto").src = data.driver.photo; // Foto driver
      document.getElementById("driverName").innerText = data.driver.name; // Nama driver
      document.getElementById("driverInfo").innerText = `Nomor HP: ${data.driver.phone}`;
      document.getElementById("driverVehicle").innerText = `Kendaraan: ${data.driver.vehicle}`;
      
      // Tampilkan popup
      document.getElementById("driverPopup").style.display = "flex";

      // Tambahkan aksi untuk tombol "Hubungi Driver"
      document.getElementById("contactDriver").onclick = function () {
        window.location.href = `tel:${data.driver.phone}`; // Membuka aplikasi telepon
      };

      // Tombol tutup popup
      document.querySelector(".close-btn").onclick = function () {
        document.getElementById("driverPopup").style.display = "none";
      };
    } else {
      console.log("Driver belum ditemukan.");
    }
  })
  .catch(error => console.error("Terjadi kesalahan:", error));
    </script>
    <script>
        function showRatingPopup() {
  document.getElementById("ratingPopup").style.display = "flex";
}

// Menutup popup (opsional, tambahkan tombol close jika diperlukan)
function closeRatingPopup() {
  document.getElementById("ratingPopup").style.display = "none";
}

// Logika rating bintang
const stars = document.querySelectorAll("#stars span");
let selectedRating = 0;

stars.forEach((star, index) => {
  star.addEventListener("click", function () {
    selectedRating = index + 1; // Nilai rating dari 1 hingga 5
    updateStars(selectedRating);
  });

  star.addEventListener("mouseover", function () {
    updateStars(index + 1);
  });

  star.addEventListener("mouseout", function () {
    updateStars(selectedRating);
  });
});

function updateStars(rating) {
  stars.forEach((star, index) => {
    star.classList.toggle("selected", index < rating);
  });
}

// Menangkap input dan submit
document.getElementById("submitRating").addEventListener("click", function () {
  const reviewText = document.getElementById("reviewText").value;

  if (selectedRating === 0) {
    alert("Silakan pilih rating terlebih dahulu!");
    return;
  }

  // Simpan data rating (bisa dikirim ke server melalui AJAX/Fetch)
  console.log("Rating:", selectedRating);
  console.log("Review:", reviewText);

  alert(`Rating berhasil dikirim!\nRating: ${selectedRating}\nReview: ${reviewText}`);
  closeRatingPopup(); // Tutup popup setelah submit
});

const urlParams = new URLSearchParams(window.location.search);
        const info = urlParams.get('info');

        const notyf = new Notyf({
        duration: 5000, // Durasi dalam milidetik
        position: { x: 'right', y: 'bottom' }, // Lokasi notifikasi
        });

        if(info === '3'){
            notyf.success('Akun anda berhasil didaftarkan, Silahkan Tunggu Admin Mereview');
        }
        else if(info === 'gagal'){
            notyf.error('/F4t4l 3rr0r/');
        }
        else if(info === 'logout'){
            notyf.success('Sudah Logout');
        }

    </script>
</body>
</html>