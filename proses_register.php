<?php

    include_once("function/koneksi.php");
    include_once("function/helper.php");

    $level = "customer";
    $status = "on";
    $nama_lengkap = $_POST['nama_lengkap'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$alamat = $_POST['alamat'];
	$password = $_POST['password'];
    $re_password = $_POST['re_password'];
    
    unset($_POST['password']); //supaya password tidak terlihat di link
    unset($_POST['re_password']);
    $dataForm = http_build_query($_POST);

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email'"); //query validasi email

    if(empty($nama_lengkap) || empty($email) || empty($phone) || empty($alamat) || empty($password)){
        header("location: ".BASE_URL."index.php?page=register&notif=require&$dataForm");
    }elseif($password != $re_password){
		header("location: ".BASE_URL."index.php?page=register&notif=password&$dataForm");
	}elseif(mysqli_num_rows($query) == 1){
		header("location: ".BASE_URL."index.php?page=register&notif=email&$dataForm");
    }
    else { // jika pengisi form lengkap jalan perintah dibawah ini
    $password = md5($password);
    mysqli_query($koneksi, "INSERT INTO user (level, nama, email, alamat, phone, password, status)
                                        VALUES ('$level', '$nama_lengkap', '$email', '$alamat', '$phone', '$password', '$status')");

    header("location: ".BASE_URL."index.php?page=login");
    }