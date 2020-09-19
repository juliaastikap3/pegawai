<?php
class Gaji{
    //member1 var
    private $koneksi;
    //member2 konstruktor
    public function __construct(){
        global $dbh; // panggil var instance PDO
        $this->koneksi = $dbh;
    }
    //member3 fungsi2 CRUD
    public function dataGaji(){
        $sql = "SELECT gaji.*, pegawai.nama, pegawai.nip FROM gaji
                INNER JOIN pegawai ON pegawai.id = gaji.pegawai_id";  
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute(); //eksekusi
        $rs = $ps->fetchAll(); // ambil seluruh baris data
        return $rs;
    }

    public function getGaji($id){
        $sql = "SELECT g.*, p.nip, p.nama, p.foto, j.nama AS jab, d.nama AS bagian
                FROM gaji g
                INNER JOIN pegawai p ON p.id = g.pegawai_id
                INNER JOIN jabatan j ON j.id = p.idjabatan
                INNER JOIN divisi d ON d.id = p.iddivisi
                WHERE g.id = ?";  
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($id); //eksekusi
        $rs = $ps->fetch(); // ambil 1 baris data
        return $rs;
    }

    public function detailGaji($nip){
        $sql = "SELECT g.*, p.nip, p.nama, p.foto, j.nama AS jab, d.nama AS bagian
                FROM gaji g
                INNER JOIN pegawai p ON p.id = g.pegawai_id
                INNER JOIN jabatan j ON j.id = p.idjabatan
                INNER JOIN divisi d ON d.id = p.iddivisi
                WHERE p.nip = ?";  
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($nip); //eksekusi
        $rs = $ps->fetch(); // ambil 1 baris data
        return $rs;
    }
    
    public function simpan($data){
        $sql = "INSERT INTO gaji(pegawai_id,gapok,tunjab,bpjs,lain2) 
                VALUES (?,?,?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function ubah($data){
        $sql = "UPDATE gaji SET pegawai_id=?,gapok=?,tunjab=?,bpjs=?,lain2=? WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function hapus($id){
        $sql = "DELETE FROM gaji WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
    }


}