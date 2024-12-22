<?php
    include 'koneksidb.php'
    session_start();

    $username = $_SESSION['review_username'];
    $password = $_SESSION['review_password'];
    $no_telp = $_SESSION['review_notelp'];
    //$cek_pass = $_POST['password_cek'];
    $email = $_SESSION['review_email'];
    $latitude = (float)$_SESSION['review_latitude'];
    $longitude = (float)$_SESSION['review_longtitude'];
    $nama_lengkap = $_SESSION['review_fullname'];
    $bank = $_POST['bank'];
    $rekening = $_POST['rekening'];
    $umur = $_POST['umur'];
    $alamat = ' ';

    $targetDir = "../file_upload_review/";

    if (isset($_FILES['ktp']) && $_FILES['ktp']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['ktp']['tmp_name'];
        $fileName = $_FILES['ktp']['name'];
        $fileSize = $_FILES['ktp']['size'];
        $fileType = $_FILES['ktp']['type'];
    
        // Validasi file (contoh: hanya gambar dengan ukuran < 5MB)
        if ($fileSize > 5 * 1024 * 1024) { // 5MB
            echo "Ukuran file terlalu besar. Maksimum 5MB.";
            exit;
        }
    
        // Buat nama file unik
        $newFileName = 'KTP - ' . time() . '-' . $username . '-' . basename($fileName);
        $destPath = $targetDir . $newFileName;
    
        // Pindahkan file ke folder tujuan
        if (move_uploaded_file($fileTmpPath, $destPath)) {
            echo "File berhasil diunggah. Lokasi: $destPath";
            $destktp = $destPath;
        } else {
            echo "Terjadi kesalahan saat mengunggah file.";
        }
    } else {
        echo "Tidak ada file yang diunggah atau terjadi kesalahan.";
    }

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['foto']['tmp_name'];
        $fileName = $_FILES['foto']['name'];
        $fileSize = $_FILES['foto']['size'];
        $fileType = $_FILES['foto']['type'];
    
        // Validasi file (contoh: hanya gambar dengan ukuran < 5MB)
        if ($fileSize > 5 * 1024 * 1024) { // 5MB
            echo "Ukuran file terlalu besar. Maksimum 5MB.";
            exit;
        }
    
        // Buat nama file unik
        $newFileName = 'Foto - ' . time() . '-' . $username . '-' . basename($fileName);
        $destPath = $targetDir . $newFileName;
    
        // Pindahkan file ke folder tujuan
        if (move_uploaded_file($fileTmpPath, $destPath)) {
            echo "File berhasil diunggah. Lokasi: $destPath";
            $destfoto = $destPath;
        } else {
            echo "Terjadi kesalahan saat mengunggah file.";
        }
    } else {
        echo "Tidak ada file yang diunggah atau terjadi kesalahan.";
    }

    $cek_data = mysqli_query($conn, "SELECT * FROM pekerja WHERE username = '$username'");
    $username_cek = mysqli_num_rows($cek_data);
    $cek_data2 = mysqli_query($conn, "SELECT * FROM pekerja WHERE email = '$email'");
    $email_cek = mysqli_num_rows($cek_data2);
    $cek_data3 = mysqli_query($conn, "SELECT * FROM pekerja WHERE no_telepon = '$no_telp'");
    $telp_cek = mysqli_num_rows($cek_data3);

    if($username_cek > 0){
        header("location: ../login/regist_pekerja_upload.php?info=20");
    }
    else if($email_cek > 0){
        header("location: ../login/regist_pekerja_upload.php?info=21");
    }
    else if($telp_cek > 0){
        header("location: ../login/regist_pekerja_upload.php?info=22");
    }
    else if($password != $cek_pass){
        header("location: ../login/regist_pekerja_upload.php?info=30");
    }
    else{
        $stmt = $conn->prepare("INSERT INTO queue_review (nama, email, password, no_telepon, jenis_bank, rekening, umur, ktp_path, foto_muka_path, alamat, username) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ST_GeomFromText(?), ?)");
        echo $latitude;
        echo $longitude;
        $geometry = "POINT($longitude $latitude)";

        $stmt->bind_param("ssssssss", $nama_lengkap, $email, $password, $no_telp, $bank, $rekening, $umur, $destktp, $destfoto, $geometry, $username);
        $stmt->execute();

        if($stmt){
            header("location: ../dashboard.php?info=3");
            $_SESSION['review_username'] = null;
            $_SESSION['review_fullname'] = null;
            $_SESSION['review_email'] = null;
            $_SESSION['review_password'] = null;
            //$_SESSION['review_cekpassword'] = $_POST['cek_password'];
            $_SESSION['review_notelp'] = null;
            $_SESSION['review_latitude'] = null;
            $_SESSION['review_longtitude'] = null;
        }
        else{
            header("location: ../login/regist_pekerja_upload.php?info=gagal");
        }
    }
?>