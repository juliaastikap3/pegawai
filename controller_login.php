<?php
session_start();
include_once 'koneksi.php';
include_once 'models/Login.php';
//1. tangkap request form
$username = $_POST['username'];
$password = $_POST['password'];
//2. simpan ke sebuah data array
$data = [
    $username, // ? 1
    $password // ? 2
]; 
//3. eksekusi tombol
$model = new Login(); //ciptakan object dari Model
$rs = $model->otentikasi($data); // panggil fungsi otentikasi di model
if(!empty($rs)){
    //1 baris data user disimpan oleh session
    $_SESSION['MEMBER'] = $rs;
    //4.arahkan ke suatu halaman/redirect/landing page
    header('location:index.php?hal=pegawai');
}
else{
    echo'<script>
        alert("Maaf username/password salah !!!");
        history.go(-1); //kembali ke halaman sebelumnya
    </script>';
}    
