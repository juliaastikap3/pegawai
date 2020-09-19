<?php
include_once 'koneksi.php';
include_once 'models/Gaji.php';
//1.tangkap request element2 form
$pegawai = $_POST['pegawai'];
$gapok = $_POST['gapok'];
$tunjab = $_POST['tunjab'];
$bpjs = $_POST['bpjs'];
$lain2 = $_POST['lain2'];
//2.simpan ke sebuah array
$data = [
    $pegawai, // ? 1
    $gapok, // ? 2
    $tunjab, // ? 3
    $bpjs, // ? 4
    $lain2, // ? 5
];
//3.eksekusi tombol
$tombol = $_POST['proses'];
$model = new Gaji(); //ciptkan object
if($tombol == 'simpan'){
    $model->simpan($data); // panggil fungsi simpan di model
}
else if($tombol == 'ubah'){
    // panggil fungsi ubah di model
    $data[] = $_POST['idx']; //tangkap hidden field dari form u/ ? 6 klausa where id = ?
    $model->ubah($data);
}
else if($tombol == 'hapus'){
    // panggil fungsi hapus di model
    unset($data); //hapus 5 ? di atas
    $id = [$_POST['idx']]; //tangkap hidden field dari form u/ ? 1 klausa where id = ?
    $model->hapus($id);
}
else{ //tombol batal
    header('Location:index.php?hal=gaji');
}
//4. setelah selesai proses diarahkan ke halaman/redirect/landing page
header('Location:index.php?hal=gaji');