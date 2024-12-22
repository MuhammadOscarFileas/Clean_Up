<?php
    session_start();

    include 'koneksidb.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    //echo $username + "  " + $password;

    $data = mysqli_query($conn, "SELECT * FROM pengguna WHERE username='$username' AND password='$password'")
                        or die (mysqli_error($conn));

    $cek = mysqli_num_rows($data);
    $result = mysqli_fetch_assoc($data);
    if($cek > 0){
            $_SESSION['username'] = $result['username'];
            $_SESSION['id'] = $result['user_id'];
            $_SESSION['status'] = "login";
            $_SESSION['pesan_jasa'] = null;
            $_SESSION['ulasan'] = null;
            header("location:../dashboard.php");
    }else{
        header("location:../login/login.php?info=gagal");
    }
?>