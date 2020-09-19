<?php
class Login{
    //member1 var
    private $koneksi;
    //member2 konstruktor
    public function __construct(){
        global $dbh; // panggil var instance PDO
        $this->koneksi = $dbh;
    }
    //member3 fungsi2 otentikasi user
    public function otentikasi($data){
        $sql = "SELECT * FROM member WHERE username=? AND password=SHA1(?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
        $rs = $ps->fetch();
        return $rs;
    }
}