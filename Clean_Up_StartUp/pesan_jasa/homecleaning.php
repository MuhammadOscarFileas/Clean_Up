<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: ../dashboard.php');
        //exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cleanup</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #1a4971;
            --primary-yellow: #ffd95a;
            --secondary-brown: #96723D;
        }

        body {
            background-color: var(--primary-blue);
            min-height: 100vh;
        }

        .navbar {
            background-color: var(--primary-yellow);
            padding: 15px;
        }

        .navbar-brand {
            color: var(--primary-blue);
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-brand i {
            font-size: 24px;
        }

        .address-section {
            background-color: var(--secondary-brown);
            color: white;
            padding: 15px;
            position: relative;
        }

        .edit-btn {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background-color: var(--primary-yellow);
            border: none;
            padding: 5px 15px;
            border-radius: 4px;
            font-weight: bold;
        }

        .section-title {
            background-color: var(--primary-blue);
            color: white;
            padding: 15px;
            margin: 0;
        }

        .dropdown-section {
            background-color: var(--primary-yellow);
            padding: 15px;
            cursor: pointer;
        }

        .dropdown-section .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .location-input {
            background-color: var(--primary-yellow);
            border: none;
            border-radius: 4px;
            padding: 10px;
            margin: 5px 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .location-input:hover {
            background-color: #ffb300;
        }

        .location-number {
            background-color: var(--primary-blue);
            color: white;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
        }

        .payment-info {
            background-color: var(--secondary-brown);
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .pay-btn {
            background-color: var(--primary-yellow);
            border: none;
            padding: 5px 20px;
            border-radius: 4px;
            font-weight: bold;
        }

        .dropdown-content {
            display: none;
            padding: 10px;
        }

        .dropdown-content.active {
            display: block;
        }

        /* Custom checkbox and radio styles */
        .custom-control {
            display: flex;
            align-items: center;
            gap: 10px;
            width: 100%;
        }

        .custom-control input[type="checkbox"],
        .custom-control input[type="radio"] {
            width: 18px;
            height: 18px;
            margin-right: 10px;
        }

        .selected-location {
            font-weight: bold;
            color: var(--primary-blue);
        }

        @media (max-width: 576px) {
            .payment-info {
                flex-direction: column;
                gap: 10px;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <img src="../aset_gambar/logo_clean_up.png" alt="" class="logo me-2" style = width:50px; height: auto;>
                Cleanup
            </a>
        </div>
    </nav>

    <div class="address-section">
        <div>
            <strong>Catatan Alamat :</strong>
            <p class="mb-0">Jl Babarsari Jl. Tambak Bayan No.2, Janti, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281</p>
        </div>
        <button class="edit-btn">EDIT</button>
    </div>

    <h4 class="section-title">Detail Pesanan</h4>

    <div class="dropdown-section" onclick="toggleDropdown('locations')">
        <div class="header">
            <span>Tempat yang ingin Dibersihkan</span>
            <i class="fas fa-chevron-down"></i>
        </div>
        <div id="locations" class="dropdown-content">
            <div class="location-input">
                <label class="custom-control">
                    <input type="checkbox" name="location" value="Kamar Mandi" onchange="updatePaymentInfo()">
                    <span class="location-number">1</span>
                    Kamar Mandi
                </label>
            </div>
            <div class="location-input">
                <label class="custom-control">
                    <input type="checkbox" name="location" value="Ruang Tamu" onchange="updatePaymentInfo()">
                    <span class="location-number">2</span>
                    Ruang Tamu
                </label>
            </div>
            <div class="location-input">
                <label class="custom-control">
                    <input type="checkbox" name="location" value="Dapur" onchange="updatePaymentInfo()">
                    <span class="location-number">3</span>
                    Dapur
                </label>
            </div>
            <div class="location-input">
                <label class="custom-control">
                    <input type="checkbox" name="location" value="Kamar Tidur" onchange="updatePaymentInfo()">
                    <span class="location-number">4</span>
                    Kamar Tidur
                </label>
            </div>
        </div>
    </div>

    <div class="dropdown-section" onclick="toggleDropdown('duration')">
        <div class="header">
            <span>Durasi Jam</span>
            <i class="fas fa-chevron-down"></i>
        </div>
        <div id="duration" class="dropdown-content">
            <div class="location-input">
                <label class="custom-control">
                    <input type="radio" name="duration" value="1" onchange="updatePaymentInfo()">
                    1 Jam
                </label>
            </div>
            <div class="location-input">
                <label class="custom-control">
                    <input type="radio" name="duration" value="2" onchange="updatePaymentInfo()">
                    2 Jam
                </label>
            </div>
            <div class="location-input">
                <label class="custom-control">
                    <input type="radio" name="duration" value="3" onchange="updatePaymentInfo()">
                    3 Jam
                </label>
            </div>
        </div>
    </div>

    <div class="dropdown-section" onclick="toggleDropdown('tools')">
        <div class="header">
            <span>Menggunakan alat (ya/tidak)</span>
            <i class="fas fa-chevron-down"></i>
        </div>
        <div id="tools" class="dropdown-content">
            <div class="location-input">
                <label class="custom-control">
                    <input type="radio" name="tools" value="Ya" onchange="updatePaymentInfo()">
                    Ya
                </label>
            </div>
            <div class="location-input">
                <label class="custom-control">
                    <input type="radio" name="tools" value="Tidak" onchange="updatePaymentInfo()">
                    Tidak
                </label>
            </div>
        </div>
    </div>

    <h4 class="section-title">Pembayaran</h4>

    <div class="dropdown-section" onclick="toggleDropdown('payment')">
        <div class="header">
            <span>Metode Pembayaran</span>
            <i class="fas fa-chevron-down"></i>
        </div>
        <div id="payment" class="dropdown-content">
            <div class="location-input">
                <label class="custom-control">
                    <input type="radio" name="payment" value="bank">
                    Transfer Bank
                </label>
            </div>
            <div class="location-input">
                <label class="custom-control">
                    <input type="radio" name="payment" value="ewallet">
                    E-Wallet
                </label>
            </div>
            <div class="location-input">
                <label class="custom-control">
                    <input type="radio" name="payment" value="cash">
                    Cash
                </label>
            </div>
        </div>
    </div>

    <div class="payment-info">
        <span id="payment-details">Pilih layanan untuk melihat detail</span>
        <div>
            <span class="me-2" id="payment-amount">Rp. 0</span>
            <button class="pay-btn">BAYAR</button>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleDropdown(id) {
            const dropdown = document.getElementById(id);
            const allDropdowns = document.querySelectorAll('.dropdown-content');
            
            allDropdowns.forEach(dp => {
                if (dp.id !== id) {
                    dp.classList.remove('active');
                }
            });
            
            dropdown.classList.toggle('active');
        }

        // Prevent dropdown from closing when clicking on inputs
        document.querySelectorAll('.custom-control').forEach(control => {
            control.addEventListener('click', (e) => {
                e.stopPropagation();
            });
        });

        function updatePaymentInfo() {
            // Get selected locations
            const selectedLocations = Array.from(document.querySelectorAll('input[name="location"]:checked'))
                .map(checkbox => checkbox.value);

            // Get selected duration
            const selectedDuration = document.querySelector('input[name="duration"]:checked')?.value || '';

            // Get selected tools option
            const selectedTools = document.querySelector('input[name="tools"]:checked')?.value || '';

            // Get current time
            const currentTime = new Date().toLocaleTimeString('id-ID', {
                hour: '2-digit',
                minute: '2-digit',
                hour12: false
            });

            // Calculate price based on selections
            let basePrice = selectedLocations.length * 50000; // 50000 per location
            if (selectedDuration) {
                basePrice *= selectedDuration; // multiply by hours
            }
            if (selectedTools === 'Ya') {
                basePrice += 20000; // additional cost for tools
            }

            // Update payment details
            const paymentDetails = document.getElementById('payment-details');
            const paymentAmount = document.getElementById('payment-amount');

            if (selectedLocations.length > 0 || selectedDuration || selectedTools) {
                let details = '';
                
                if (selectedLocations.length > 0) {
                    details += selectedLocations.join(' + ');
                }
                
                if (selectedDuration) {
                    details += `, Durasi ${selectedDuration} Jam`;
                }
                
                if (selectedTools) {
                    details += ` // ${selectedTools} menggunakan Alat`;
                }
                
                details += ` (${currentTime} WIB)`;
                
                paymentDetails.textContent = details;
                paymentAmount.textContent = `Rp. ${basePrice.toLocaleString('id-ID')}`;
            } else {
                paymentDetails.textContent = 'Pilih layanan untuk melihat detail';
                paymentAmount.textContent = 'Rp. 0';
            }
        }
    </script>
</body>
</html>