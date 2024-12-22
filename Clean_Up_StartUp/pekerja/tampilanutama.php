<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cleanup Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
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
        .quote-banner {
            background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('/api/placeholder/1200/200');
            color: var(--accent-yellow);
            padding: 1.5rem;
            border-radius: 0.5rem;
            margin-bottom: 2rem;
            background-size: cover;
            position: relative;
            font-size: 0.9rem;
        }
        .status-card {
            background-color: var(--secondary-blue);
            color: white;
            padding: 2rem;
            border-radius: 0.5rem;
            text-align: center;
        }
        .status-card h4 {
            font-size: 1.2rem;
            color: var(--accent-yellow);
        }
        /* Custom Toggle Switch Styling */
        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 160px;
            height: 40px;
            margin: 10px;
        }
        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 20px;
        }
        .toggle-slider:before {
            position: absolute;
            content: "";
            height: 32px;
            width: 32px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        input:checked + .toggle-slider {
            background-color: var(--accent-yellow);
        }
        input:checked + .toggle-slider:before {
            transform: translateX(120px);
        }
        #statusLabel {
            position: absolute;
            color: var(--accent-yellow);
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            font-size: 1rem;
            font-weight: bold;
            z-index: 1;
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
        .profile-section h6 {
            font-size: 0.9rem;
        }
        .profile-section small {
            font-size: 0.8rem;
            opacity: 0.8;
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="profile-section">
            <div class="profile-image"></div>
            <div>
                <h6 class="mb-0">Dodi Dobby</h6>
                <small>Pekerja</small>
            </div>
        </div>
        
        <div class="nav flex-column">
            <a href="#" class="nav-link">
                <i class="fas fa-th-large"></i> Dashboard
            </a>
            <a href="#" class="nav-link">
                <i class="fas fa-dollar-sign"></i> Total Pinalti
            </a>
            <a href="#" class="nav-link">
                <i class="fas fa-file-invoice"></i> Biaya Admin
            </a>
            <a href="#" class="nav-link">
                <i class="fas fa-clock"></i> Timer
            </a>
            <a href="#" class="nav-link">
                <i class="fas fa-chart-line"></i> Aktivitas
            </a>
        </div>
    </div>

    <div class="main-content">
        <div class="search-bar">
            <i class="fas fa-search"></i>
            <input type="text" class="search-input" placeholder="Cari di Cleanup...">
        </div>
        
        <div class="quote-banner">
            <p class="h5 mb-0">"Masa depan itu tergantung pada apa yang sedang kamu lakukan hari ini."</p>
            <p class="mb-0">- Mahatma Gandhi</p>
        </div>

        <div class="status-card">
            <h4>Siap Menerima Pesanan Pekerjaan?</h4>
            <div class="d-flex justify-content-center align-items-center mt-3">
                <label class="toggle-switch">
                    <input type="checkbox" id="statusToggle">
                    <span class="toggle-slider"></span>
                    <span id="statusLabel">OFF</span>
                </label>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        const statusToggle = document.getElementById('statusToggle');
        const statusLabel = document.getElementById('statusLabel');

        statusToggle.addEventListener('change', function() {
            statusLabel.textContent = this.checked ? 'ON' : 'OFF';
        });
    </script>
</body>
</html>