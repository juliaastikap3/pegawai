<?php
include_once 'koneksi.php';
include_once 'models/Member.php';
//1.tangkap request element2 form
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];
$email = $_POST['email'];
$foto = $_POST['foto'];
//2.simpan ke sebuah array
$data = [
    $fullname, // ? 1
    $username, // ? 2
    $password, // ? 3
    $role, // ? 4
    $email, // ? 5
    $foto // ? 6
];
//3.eksekusi tombol
$tombol = $_POST['proses'];
$model = new Member(); //ciptkan object
if($tombol == 'simpan'){
    $model->simpan($data); // panggil fungsi simpan di model
}
else if($tombol == 'ubah'){
    // panggil fungsi ubah di model
    $data[] = $_POST['idx']; //tangkap hidden field dari form u/ ? 7 klausa where id = ?
    $model->ubah($data);
}
else if($tombol == 'hapus'){
    // panggil fungsi hapus di model
    unset($data); //hapus 5 ? di atas
    $id = [$_POST['idx']]; //tangkap hidden field dari form u/ ? 1 klausa where id = ?
    $model->hapus($id);
}
else{ //tombol batal
    header('Location:index.php?hal=member');
}
//4. setelah selesai proses diarahkan ke halaman/redirect/landing page
header('Location:index.php?hal=member');