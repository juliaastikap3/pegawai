<?php
if(isset($_SESSION['MEMBER']) && $_SESSION['MEMBER']['role'] != 'staff'){
?>

<?php
//menampilkan data pegawai di select option
$obj = new Pegawai();
$ar_pegawai = $obj->dataPegawai();
//edit data gaji
$idedit = $_REQUEST['idedit'];
$model = new Gaji();
if(!empty($idedit)){ //--------modus edit data lama-----------
  $rs = $model->getGaji([$idedit]);
}else{//--------modus entri data baru-----------
  $rs = [];
}
?>
<h3>Form Gaji Pegawai</h3>
<form method="POST" action="controller_gaji.php">
  <div class="form-group row">
    <label for="pegawai" class="col-4 col-form-label">Pegawai</label> 
    <div class="col-8">
      <select id="pegawai" name="pegawai" class="custom-select">
        <option value="">-- Pilih Pegawai --</option>
      <?php
      foreach($ar_pegawai as $peg){
        //edit data lama
        $sel = ($peg['id'] == $rs['pegawai_id']) ? 'selected' : '';
      ?>
        <option value="<?= $peg['id'] ?>" <?= $sel ?> > <?= $peg['nama'] ?> </option>
      <?php } ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="nip" class="col-4 col-form-label">Gaji Pokok</label> 
    <div class="col-8">
      <input id="gapok" name="gapok" type="text" value="<?= $rs['gapok'] ?>" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Tunjangan Jabatan</label> 
    <div class="col-8">
      <input id="tunjab" name="tunjab" type="text" value="<?= $rs['tunjab'] ?>" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="tmp" class="col-4 col-form-label">BPJS</label> 
    <div class="col-8">
      <input id="bpjs" name="bpjs" type="text" value="<?= $rs['bpjs'] ?>" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="tgl" class="col-4 col-form-label">Lain-Lain</label> 
    <div class="col-8">
      <input id="lain2" name="lain2" type="text" value="<?= $rs['lain2'] ?>" class="form-control">
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
else{ //jika belum login
  include_once 'terlarang.php';
}
?>