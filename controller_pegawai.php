<?php
include_once 'koneksi.php';
include_once 'models/Pegawai.php';
//1.tangkap request element2 form
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$jk = $_POST['gender'];
$tmp = $_POST['tmp'];
$tgl = $_POST['tgl'];
$jab = $_POST['jabatan'];
$div = $_POST['divisi'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$foto = $_POST['foto'];
//2.simpan ke sebuah array
$data = [
    $nip, // ? 1
    $nama, // ? 2
    $jk, // ? 3
    $tmp, // ? 4
    $tgl, // ? 5
    $jab, // ? 6
    $div, // ? 7
    $alamat, // ? 8
    $email, // ? 9 
    $foto // ? 10
];
//3.eksekusi tombol
$tombol = $_POST['proses'];
$model = new Pegawai(); //ciptkan object
if($tombol == 'simpan'){
    $model->simpan($data); // panggil fungsi simpan di model
}
else if($tombol == 'ubah'){
    // panggil fungsi ubah di model
    $data[] = $_POST['idx']; //tangkap hidden field dari form u/ ? 11 klausa where id = ?
    $model->ubah($data);
}
else if($tombol == 'hapus'){
    // panggil fungsi hapus di model
    unset($data); //hapus 10 ? di atas
    $id = [$_POST['idx']]; //tangkap hidden field dari form u/ ? 1 klausa where id = ?
    $model->hapus($id);
}
else{ //tombol batal
    header('Location:index.php?hal=pegawai');
}
//4. setelah selesai proses diarahkan ke halaman/redirect/landing page
header('Location:index.php?hal=pegawai');