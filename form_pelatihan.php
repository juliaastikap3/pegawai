<?php
  if(isset($_SESSION['MEMBER'])){
?>
<?php
  if($_SESSION['MEMBER']['role'] != 'staff'){
?>
<?php
//---------awal proses edit data--------------
//1.tangkap request idedit
$idedit = $_REQUEST['idedit'];
// print_r($idedit); exit;
$model = new Pelatihan();
if(!empty($idedit)){ //modus edit data lama
  $rs = $model->detailPelatihan([$idedit]);
}else{ //modus entry data baru 
  $rs = [];
}
//---------akhir proses edit data--------------
$obj1 = new Materi();
$obj2 = new Pegawai();
$ar_materi = $obj1->dataMateri();
$ar_pegawai = $obj2->dataPegawai();
?>
<h3>Form Pelatihan</h3>
<form method="POST" action="controller_pelatihan.php">
<div class="form-group row">
    <label for="materi" class="col-4 col-form-label">Materi</label> 
    <div class="col-8">
      <select id="materi" name="materi" class="custom-select">
        <option value="">-- Pilih Materi ---</option>
       <?php
       foreach($ar_materi as $mat){
           //tampilkan data lama
           $sel = ($mat['id'] == $rs['materi_id']) ? 'selected' : '';
           ?>
             <option value="<?= $mat['id'] ?>" <?= $sel ?>> <?= $mat['nama'] ?> </option>
           <?php } ?>
           </select>  
    </div>
  </div>
  <div class="form-group row">
    <label for="pegawai" class="col-4 col-form-label">Pegawai</label> 
    <div class="col-8">
      <select id="pegawai" name="pegawai" class="custom-select">
        <option value="">-- Pilih Pegawai ---</option>
        <?php
       foreach($ar_pegawai as $peg){
           //tampilkan data lama
           $sel = ($peg['id'] == $rs['pegawai_id']) ? 'selected' : '';
           ?>
             <option value="<?= $peg['id'] ?>" <?= $sel ?>> <?= $peg['nama'] ?> </option>
           <?php } ?>
       
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="tgl_mulai" class="col-4 col-form-label">Tanggal Mulai</label> 
    <div class="col-8">
      <input id="tgl_mulai" name="tgl_mulai" value="<?= $rs['tgl_mulai'] ?>" type="date" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="tgl_akhir" class="col-4 col-form-label">Tanggal Akhir</label> 
    <div class="col-8">
      <input id="tgl_akhir" name="tgl_akhir" value="<?= $rs['tgl_akhir'] ?>"type="date" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Keterangan</label> 
    <div class="col-8">
      <input id="keterangan" name="keterangan" value="<?= $rs['keterangan'] ?>" type="text" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
    <?php
    if(empty($idedit)){ //--------modus entry data baru--------
    ?>
      <button name="proses" value="simpan" type="submit" class="btn btn-primary">Simpan</button>
    <?php
    }
    else{ //--------modus edit data lama--------
    ?>
      <button name="proses" value="ubah" type="submit" class="btn btn-warning">Ubah</button>
      <button name="proses" value="hapus" type="submit" 
              onclick="return confirm('Ciuus mau dihapus?')" class="btn btn-danger">Hapus</button>
      <!-- hidden field untuk melempar idedit ke controller -->
      <input type="hidden" name="idx" value="<?= $idedit ?>" />
    <?php } ?>
    <button name="proses" value="batal" type="submit" class="btn btn-info">Batal</button>
    </div>
  </div>
</form>
<?php 
}
else{ //jika selain administrator dan manager
  include_once'terlarang.php';
}
?>
<?php
}
else{ //jika belum login
  include_once'terlarang.php';
}
?>
