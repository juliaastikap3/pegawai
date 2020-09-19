<?php
class Pelatihan{
    //member1 var
    private $koneksi;
    //member2 konstruktor
    public function __construct(){
        global $dbh; // panggil var instance PDO
        $this->koneksi = $dbh;
    }

    //member3 fungsi2 CRUD
    public function dataPelatihan(){
        //$sql = "SELECT * FROM pelatihan";
        $sql = "SELECT pelatihan.*, materi.nama AS materi, pegawai.nama AS pegawai 
        FROM pelatihan 
        INNER JOIN materi ON materi.id = pelatihan.materi_id 
        INNER JOIN pegawai ON pegawai.id = pelatihan.pegawai_id";  
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute(); //eksekusi
        $rs = $ps->fetchAll(); // ambil seluruh baris data
        return $rs;
    }
    public function getPelatihan($id){
        $sql = "SELECT pelatihan.*, materi.nama AS materi, pegawai.nama AS pegawai 
        FROM pelatihan 
        INNER JOIN materi ON materi.id = pelatihan.materi_id 
        INNER JOIN pegawai ON pegawai.id = pelatihan.pegawai_id  
        WHERE pelatihan.id = ?";  
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($id); //eksekusi
        $rs = $ps->fetch(); // ambil 1 baris data
        return $rs;
    }
    public function detailPelatihan($id){
        $sql = "SELECT pelatihan.*, materi.nama AS materi, pegawai.nama AS pegawai 
        FROM pelatihan 
        INNER JOIN materi ON materi.id = pelatihan.materi_id 
        INNER JOIN pegawai ON pegawai.id = pelatihan.pegawai_id 
        WHERE pelatihan.id = ?";  
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($id); //eksekusi
        $rs = $ps->fetch(); // ambil 1 baris data
        return $rs;
    }
    public function simpan($data){
        $sql = "INSERT INTO pelatihan(materi_id,pegawai_id,tgl_mulai,tgl_akhir,keterangan) 
                VALUES (?,?,?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
    public function ubah($data){
        $sql = "UPDATE pelatihan SET 
                materi_id=?,pegawai_id=?,tgl_mulai=?,tgl_akhir=?,keterangan=?
                WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
    public function hapus($id){
        $sql = "DELETE FROM pelatihan WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
    }
}
