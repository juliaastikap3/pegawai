<?php
//tangkap request id di url
$id = $_GET['id'];
$model = new Pegawai();
$peg = $model->detailPegawai([$id]);
?>

<div class="card" style="width: 20rem;">
<?php
    if(!empty($peg['foto'])){ //jika ada file foto di db
?> 
  <img src="images/<?= $peg['foto'] ?>" class="card-img-top" alt="...">
<?php
}else{ //jika kosong nama file foto
?>
  <img src="images/nophoto.png" class="card-img-top" alt="...">
<?php } ?>  
  <div class="card-body">
    <h5 class="card-title"><?= $peg['nama'] ?></h5>
    <p class="card-text">
    NIP : <?= $peg['nip'] ?> <br/>
    Jenis Kelamin : <?= $peg['gender'] ?> <br/>
    Jabatan : <?= $peg['jab'] ?> <br/>
    Divisi : <?= $peg['bagian'] ?> <br/>
    Tempat Lahir : <?= $peg['tempat_lahir'] ?> <br/>
    Tanggal Lahir : <?= $peg['tanggal_lahir'] ?> <br/>
    Alamat : <?= $peg['alamat'] ?> <br/>
    Email : <?= $peg['email'] ?> <br/>
    </p>
    <a href="index.php?hal=pegawai" class="btn btn-primary">Kembeli</a>
  </div>
</div>

