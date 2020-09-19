<?php
class Materi{
    //member1 var
    private $koneksi;
    //member2 konstruktor
    public function __construct(){
        global $dbh; // panggil var instance PDO
        $this->koneksi = $dbh;
    }
    //member3 fungsi2 CRUD
    public function dataMateri(){
        $sql = "SELECT * FROM materi";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute(); //eksekusi
        $rs = $ps->fetchAll(); // ambil seluruh baris data
        return $rs;
    }
    public function getMateri($id){
        $sql = "SELECT * FROM materi WHERE id=?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($id); //eksekusi
        $rs = $ps->fetch(); // ambil 1 baris data yg mau diedit
        return $rs;
    }
    public function input($data){
        $sql = "INSERT INTO materi (nama) VALUES (?)";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($data); //eksekusi 
    }
    public function ubah($data){
        $sql = "UPDATE materi SET nama=? WHERE id=?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($data); //eksekusi 
    }
    public function hapus($id){
        $sql = "DELETE FROM materi WHERE id=?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($id); //eksekusi 
    }
}