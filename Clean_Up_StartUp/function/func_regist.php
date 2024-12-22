<?php
    include 'koneksidb.php';
    session_start();

    if ($conn === null) {
        die("Koneksi ke database gagal!");
    } else {
        echo "Koneksi berhasil!";
    }

    function generateRandomID($length = 7) {
        global $conn; 
        $unique = false;
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $randomID = '';
        $maxIndex = strlen($characters) - 1;
    
        while(!$unique){
            for ($i = 0; $i < $length; $i++) {
                $randomID .= $characters[rand(0, $maxIndex)];
            }
            echo $randomID;
            $result = mysqli_query($conn, "SELECT * FROM pengguna WHERE ID_pengguna = '$randomID'");
            $hasil = mysqli_num_rows($result);
    
            if ($hasil == 0) {
                $unique = true;
            }
        }
    
        return $randomID;
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    $cek_pass = $_POST['password_cek'];
    $email = $_POST['email'];
    $no_telp = $_POST['telp'];
    $latitude = (float)$_POST['latitude'];
    $longitude = (float)$_POST['longitude'];
    $nama_lengkap = $_POST['fullname'];
    $alamat = ' ';

    $_SESSION['username_verif'] = $username;
    //$_SESSION['password_verif'] = $password;
    $_SESSION['email_verif'] = $email;
    $_SESSION['no_telp_verif'] = $no_telp;
    $_SESSION['latitude_verif'] = $latitude;
    $_SESSION['longtitude_verif'] = $longitude;
    $_SESSION['nama_lengkap_verif'] = $nama_lengkap;

    $cek_data = mysqli_query($conn, "SELECT * FROM pengguna WHERE username = '$username'");
    $username_cek = mysqli_num_rows($cek_data);
    $cek_data2 = mysqli_query($conn, "SELECT * FROM pengguna WHERE email = '$email'");
    $email_cek = mysqli_num_rows($cek_data2);
    $cek_data3 = mysqli_query($conn, "SELECT * FROM pengguna WHERE no_telepon = '$no_telp'");
    $telp_cek = mysqli_num_rows($cek_data3);
    //$cek_data4 = mysqli_query($conn, "SELECT * FROM pengguna WHERE  = '$username'");


    $id = generateRandomID();


    if($username_cek > 0){
        header("location: ../login/regist_pengguna.php?info=20");
    }
    else if($email_cek > 0){
        header("location: ../login/regist_pengguna.php?info=21");
    }
    else if($telp_cek > 0){
        header("location: ../login/regist_pengguna.php?info=22");
    }
    else if($password != $cek_pass){
        header("location: ../login/regist_pengguna.php?info=30");
    }
    else{
        $stmt = $conn->prepare("INSERT INTO pengguna (ID_pengguna, nama_lengkap, email, password, no_telepon, alamat, deskripsi_alamat, username) 
    VALUES (?, ?, ?, ?, ?, ST_GeomFromText(?), ?, ?)");
        echo $latitude;
        echo $longitude;
        $geometry = "POINT($longitude $latitude)";

        $stmt->bind_param("ssssssss", $id, $nama_lengkap, $email, $password, $no_telp, $geometry, $alamat, $username);
        $stmt->execute();

        if($stmt){
            header("location: ../login/login.php?info=berhasil");
            $_SESSION['email_verif'] = null;
            $_SESSION['no_telp_verif'] = null;
            $_SESSION['latitude_verif'] = null;
            $_SESSION['longtitude_verif'] = null;
            $_SESSION['nama_lengkap_verif'] = null;
        }
        else{
            header("location: ../login/regist_pengguna.php?info=gagal");
        }
    }

?>