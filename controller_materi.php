<?php
include_once 'koneksi.php';
include_once 'models/Materi.php';
//1. tangkap request form
$nama = $_POST['nama'];
//2. simpan ke sebuah data array
$data = [$nama]; // ? 1
//3. eksekusi tombol
$tombol = $_POST['proses'];
$model = new Materi(); //ciptakan object dari Model
switch ($tombol) {
    case 'simpan': $model->input($data); break;
    case 'ubah': 
        $data[] = $_POST['idx']; // tangkap hidden field u/ ? 2
        $model->ubah($data); break;
    case 'hapus':
        unset($data); //hapus ? di atas
        $id = [$_POST['idx']]; // tangkap hidden field di form u/ WHERE id = ? 
        $model->hapus($id); break;   
    default: header('location:index.php?hal=materi'); // tombol batal 
}
//4.arahkan ke suatu halaman/redirect/landing page
header('location:index.php?hal=materi');
