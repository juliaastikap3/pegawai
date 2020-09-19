<?php
if(isset($_SESSION['MEMBER']) && $_SESSION['MEMBER']['role'] != 'staff'){
?>

<?php
$ar_judul = ['No','Pegawai','Gaji Pokok','Tunjangan Jabatan','BPJS','Lain-Lain','Action'];
?>
<h3>Data Gaji Pegawai</h3>
<a href="index.php?hal=form_gaji" type="button" 
   class="btn btn-primary">Input Data</a>
<br/><br/>
<table class="table table-striped">
  <thead>
    <tr>
    <?php
    foreach($ar_judul as $jdl){
    ?>
      <th scope="col"><?= $jdl ?></th>
    <?php } ?>  
    </tr>
  </thead>
  <tbody>
    <?php
    //ciptakan object
    $model = new Gaji();
    $rs = $model->dataGaji();
    $no = 1;
    foreach($rs as $gaji){
    ?>
        <tr>
            <th scope="row"><?= $no ?></th>
            <td><?= $gaji['nama'] ?></td>
            <td>Rp. <?= number_format($gaji['gapok'], 0, ',', '.') ?></td>
            <td>Rp. <?= number_format($gaji['tunjab'], 0, ',', '.') ?></td>
            <td>Rp. <?= number_format($gaji['bpjs'], 0, ',', '.') ?></td>
            <td>Rp. <?= number_format($gaji['lain2'], 0, ',', '.') ?></td>
            <td>
              <a href="index.php?hal=detail_gaji&nip=<?= $gaji['nip'] ?>" type="button" 
                 class="btn btn-primary">Detail</a>
              <a href="index.php?hal=form_gaji&idedit=<?= $gaji['id'] ?>" type="button" 
                 class="btn btn-info">Edit</a>   
            </td>
        </tr>
    <?php $no++; } ?>    
  </tbody>
</table>

<?php 
} 
else{ //jika belum login
  include_once 'terlarang.php';
}
?>