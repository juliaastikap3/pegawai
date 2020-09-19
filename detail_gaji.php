<?php
//tangkap request nip di url
$nip = $_GET['nip'];
$model = new Gaji();
$gaji = $model->detailGaji([$nip]);
$total_gaji = $gaji['gapok'] + $gaji['tunjab'] + $gaji['bpjs'] + $gaji['lain2']; 
?>
<center>
<div class="card" style="width: 24rem;">
<?php
    if(!empty($gaji['foto'])){ //jika ada file foto di db
?> 
  <img src="images/<?= $gaji['foto'] ?>" class="card-img-top" alt="...">
<?php
}else{ //jika kosong nama file foto
?>
  <img src="images/nophoto.png" class="card-img-top" alt="...">
<?php } ?>  
  <div class="card-body">
    <h5 class="card-title"><?= $gaji['nama'] ?></h5>
    <p class="card-text">
    NIP : <?= $gaji['nip'] ?><br/>
    Jabatan : <?= $gaji['jab'] ?><br/>
    Divisi : <?= $gaji['bagian'] ?><br/>
    Gaji Pokok : Rp. <?= number_format($gaji['gapok'], 0, ',', '.') ?><br/>
    Tunjangan Jabatan: Rp. <?= number_format($gaji['tunjab'], 0, ',', '.') ?><br/>
    BPJS : Rp. <?= number_format($gaji['bpjs'], 0, ',', '.') ?><br/>
    Lain-Lain : Rp. <?= number_format($gaji['lain2'], 0, ',', '.') ?><br/>
    <b>Total Gaji : Rp. <?= number_format($total_gaji, 0, ',', '.') ?></b><br/>
    </p>
    <a href="index.php?hal=gaji" class="btn btn-primary">Go Back</a>
  </div>
</div>
</center>