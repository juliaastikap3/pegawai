<?php
class Member{
    //member1 var
    private $koneksi;
    //member2 konstruktor
    public function __construct(){
        global $dbh; // panggil var instance PDO
        $this->koneksi = $dbh;
    }
    //member3 fungsi2 CRUD
    public function dataMember(){
        $sql = "SELECT * FROM member"; 
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute(); //eksekusi
        $rs = $ps->fetchAll(); // ambil seluruh baris data
        return $rs;
    }
    public function getMember($id){
        $sql = "SELECT * FROM member WHERE id = ?";  
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($id); //eksekusi
        $rs = $ps->fetch(); // ambil 1 baris data
        return $rs;
    }
    public function simpan($data){
        $sql = "INSERT INTO member(fullname,username,password,role,email,foto) 
                VALUES (?,?,SHA1(?),?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
    public function ubah($data){
        $sql = "UPDATE member SET
                fullname=?,username=?,password=SHA1(?),role=?,email=?,foto=? WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
    public function hapus($id){
        $sql = "DELETE FROM member WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
    }
}