<?php
    session_start();
    $_SESSION['review_username'] = $_POST['username'];
    $_SESSION['review_fullname'] = $_POST['fullname'];
    $_SESSION['review_email'] = $_POST['email'];
    $_SESSION['review_password'] = $_POST['password'];
    $_SESSION['review_cekpassword'] = $_POST['cek_password'];
    $_SESSION['review_notelp'] = $_POST['no_telp'];
    $_SESSION['review_latitude'] = $_POST['latitude'];
    $_SESSION['review_longtitude'] = $_POST['longtitude'];


?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pekerja</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #ffd95a;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .card {
            background-color: #273043;
            border-radius: 20px;
            color: #ffd95a;
            padding: 2rem;
            width: 500px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        .form-control {
            background-color: transparent;
            border: 1px solid rgba(255,255,255,0.3);
            color: #ffd95a;
            margin-bottom: 1rem;
        }

        .form-select {
            background-color: transparent;
            border: 1px solid rgba(255,255,255,0.3);
            color: #000000;
            margin-bottom: 1rem;
        }

        .form-control:focus {
            background-color: rgba(255,255,255,0.1);
            color: #ffd95a;
            border-color: rgba(255,255,255,0.5);
        }

        .form-control::placeholder {
            color: #ffd95a;
            opacity: 1;
        }

        .upload-box {
            border: 1px dashed rgba(255,255,255,0.3);
            border-radius: 8px;
            padding: 2rem;
            text-align: center;
            margin-bottom: 1rem;
            cursor: pointer;
            position: relative;
        }

        .upload-box:hover {
            border-color: rgba(255,255,255,0.5);
        }

        .file-input {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .btn-submit {
            background-color: #ffd95a;
            border-color: #ffd95a;
            color: #273043;
            font-weight: bold;
        }

        .btn-submit:hover {
            background-color: #ffcc00;
            border-color: #ffcc00;
            color: #273043;
        }

        .form-check-input {
            background-color: transparent;
            border-color: rgba(255,255,255,0.3);
        }

        .close-btn {
            position: absolute;
            top: 1rem;
            right: 1rem;
            color: white;
            cursor: pointer;
        }

        .back-btn {
            position: absolute;
            top: 1rem;
            left: 1rem;
            color: white;
            cursor: pointer;
        }

        .preview-image {
            max-width: 100%;
            max-height: 100px;
            margin-top: 10px;
        }

        .preview-container {
            position: relative;
            display: none;
        }

        .delete-preview {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: #ff4444;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 12px;
        }

        .upload-content {
            display: block;
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
    <div class="card">
        <a href="regist_pekerja.php" class="back-icon">
                <i class="bi bi-arrow-left"></i>
            </a>
        <h2 class="text-center mb-4">Registrasi Pekerja<br>(lanjutan)</h2>
        
        <form action="../function/func_regist2.php" method = "POST">
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Umur" required>
            </div>

            <div class="mb-3">
                <label for="bank" class="form-label">Pilih Bank</label>
                <select id="bank" class="form-select" name="bank" required onchange="toggleRekening()" required>
                    <option value="" selected disabled>Pilih Bank</option>
                    <option value="tidak_ada">Tidak Memiliki Rekening</option>
                    <option value="bca">Bank Central Asia (BCA)</option>
                    <option value="bri">Bank Rakyat Indonesia (BRI)</option>
                    <option value="bni">Bank Negara Indonesia (BNI)</option>
                    <option value="mandiri">Bank Mandiri</option>
                    <option value="cimb">CIMB Niaga</option>
                    <option value="permata">Bank Permata</option>
                    <option value="danamon">Bank Danamon</option>
                    <option value="muamalat">Bank Muamalat</option>
                    <option value="btn">Bank Tabungan Negara (BTN)</option>
                    <option value="maybank">Maybank Indonesia</option>
                    <option value="mega">Bank Mega</option>
                    <option value="panin">Panin Bank</option>
                    <option value="jateng">Bank Jateng</option>
                    <option value="jatim">Bank Jatim</option>
                    <option value="dki">Bank DKI</option>
                </select>
            </div>
            
            <div class="mb-3">
                <input type="text"  id="rekening" class="form-control" placeholder="No. Rekening" required>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="upload-box">
                        <div class="upload-content" id="uploadContent1">
                            <input type="file" class="file-input" accept="image/*" onchange="previewImage(this, 'preview1', 'previewContainer1', 'uploadContent1')" id="ktp" required>
                            <div class="mb-2">Scan KTP (maks 5 MB)</div>
                            <div class="text-warning">+</div>
                        </div>
                        <div class="preview-container" id="previewContainer1">
                            <img id="preview1" class="preview-image">
                            <div class="delete-preview" onclick="deleteImage('ktp', 'preview1', 'previewContainer1', 'uploadContent1')">×</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="upload-box">
                        <div class="upload-content" id="uploadContent2">
                            <input type="file" class="file-input" accept="image/*" onchange="previewImage(this, 'preview2', 'previewContainer2', 'uploadContent2')" id="foto" required>
                            <div class="mb-2">Foto Wajah (maks 5 MB)</div>
                            <div class="text-warning">+</div>
                        </div>
                        <div class="preview-container" id="previewContainer2">
                            <img id="preview2" class="preview-image">
                            <div class="delete-preview" onclick="deleteImage('foto', 'preview2', 'previewContainer2', 'uploadContent2')">×</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" id="terms" onchange="toggleSubmit()">
                <label class="form-check-label" for="terms">
                    <a href="term.php"><span class="text-warning">Kontrak & Pernjanjian</span></a>
                </label>
            </div>
            
            <div class="text-center">
                <button type="submit" id = "submitBtn" class="btn btn-submit px-4">SUBMIT</button>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleRekening() {
        const bankSelect = document.getElementById("bank");
        const rekeningInput = document.getElementById("rekening");

        if (bankSelect.value === "tidak_ada") {
            rekeningInput.value = "";
            rekeningInput.setAttribute("disabled", "true");
        } else {
            rekeningInput.removeAttribute("disabled");
            }
        }

        function toggleSubmit() {
        const termsCheckbox = document.getElementById("terms");
        const submitButton = document.getElementById("submitBtn");

        if (termsCheckbox.checked) {
            submitButton.removeAttribute("disabled");
        } else {
            submitButton.setAttribute("disabled", "true");
        }
    }

        function previewImage(input, previewId, previewContainerId, uploadContentId) {
            const maxSize = 5 * 1024 * 1024;
            const file = input.files[0];
            
            if (file) {
                if (file.size > maxSize) {
                    alert('Ukuran file melebihi 5MB');
                    input.value = '';
                    return;
                }

                const reader = new FileReader();
                const preview = document.getElementById(previewId);
                const previewContainer = document.getElementById(previewContainerId);
                const uploadContent = document.getElementById(uploadContentId);
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.style.display = 'block';
                    uploadContent.style.display = 'none';
                }
                
                reader.readAsDataURL(file);
            }
        }

        function deleteImage(inputId, previewId, previewContainerId, uploadContentId) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);
            const previewContainer = document.getElementById(previewContainerId);
            const uploadContent = document.getElementById(uploadContentId);

            input.value = '';
            preview.src = '';
            previewContainer.style.display = 'none';
            uploadContent.style.display = 'block';
        }
    </script>
</body>
</html>