<?php
class Pegawai{
    //member1 var
    private $koneksi;
    //member2 konstruktor
    public function __construct(){
        global $dbh; // panggil var instance PDO
        $this->koneksi = $dbh;
    }
    //member3 fungsi2 CRUD
    public function dataPegawai(){
        //$sql = "SELECT * FROM pegawai";
        $sql = "SELECT pegawai.*, jabatan.nama AS jab, divisi.nama AS bagian
                FROM pegawai 
                INNER JOIN jabatan ON jabatan.id = pegawai.idjabatan
                INNER JOIN divisi ON divisi.id = pegawai.iddivisi";  
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute(); //eksekusi
        $rs = $ps->fetchAll(); // ambil seluruh baris data
        return $rs;
    }
    public function detailPegawai($id){
        $sql = "SELECT pegawai.*, jabatan.nama AS jab, divisi.nama AS bagian
                FROM pegawai 
                INNER JOIN jabatan ON jabatan.id = pegawai.idjabatan
                INNER JOIN divisi ON divisi.id = pegawai.iddivisi
                WHERE pegawai.id = ?";  
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($id); //eksekusi
        $rs = $ps->fetch(); // ambil 1 baris data
        return $rs;
    }
    public function cariPegawai($nama){
        $sql = "SELECT pegawai.*, jabatan.nama AS jab, divisi.nama AS bagian
                FROM pegawai 
                INNER JOIN jabatan ON jabatan.id = pegawai.idjabatan
                INNER JOIN divisi ON divisi.id = pegawai.iddivisi
                WHERE pegawai.nama
                LIKE '%$nama%'"; //execute cari tanpa parameter
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute(); //eksekusi
        $rs = $ps->fetchAll(); // ambil seluruh baris data
        return $rs;
    }
    public function filterDivisi($id){
        $sql = "SELECT pegawai.*, jabatan.nama AS jab, divisi.nama AS bagian
                FROM pegawai 
                INNER JOIN jabatan ON jabatan.id = pegawai.idjabatan
                INNER JOIN divisi ON divisi.id = pegawai.iddivisi
                WHERE pegawai.iddivisi=$id";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute(); //eksekusi
        $rs = $ps->fetchAll(); // ambil seluruh baris data
        return $rs;
    }
    public function filterJabatan($jab){
        $sql = "SELECT pegawai.*, jabatan.nama AS jab, divisi.nama AS bagian
                FROM pegawai 
                INNER JOIN jabatan ON jabatan.id = pegawai.idjabatan
                INNER JOIN divisi ON divisi.id = pegawai.iddivisi
                WHERE pegawai.idjabatan=$jab";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute(); //eksekusi
        $rs = $ps->fetchAll(); // ambil seluruh baris data
        return $rs;
    }
    public function simpan($data){
        $sql = "INSERT INTO pegawai(nip,nama,gender,tempat_lahir,
                tanggal_lahir,idjabatan,iddivisi,alamat,email,foto) 
                VALUES (?,?,?,?,?,?,?,?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
    public function ubah($data){
        $sql = "UPDATE pegawai SET
                nip=?,nama=?,gender=?,tempat_lahir=?,
                tanggal_lahir=?,idjabatan=?,iddivisi=?,alamat=?,email=?,foto=? 
                WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
    public function hapus($id){
        $sql = "DELETE FROM pegawai WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
    }
}