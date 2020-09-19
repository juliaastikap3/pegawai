<?php
	if(isset($_SESSION['MEMBER'])){
?>

<?php
$ar_judul = ['No','Jabatan','Action'];
?>
<a href="index.php?hal=form_jabatan" type="button" 
   class="btn btn-primary">Input Data</a>
<br/>   
<h3>Data Jabatan</h3>
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
    $model = new Jabatan();
    $rs = $model->dataJabatan();
    $no = 1;
    foreach($rs as $jab){
    ?>
        <tr>
            <th scope="row"><?= $no ?></th>
            <td><?= $jab['nama'] ?></td>
            <td>
              <a href="index.php?hal=form_jabatan&idedit=<?= $jab['id'] ?>" type="button" 
                 class="btn btn-warning">Edit</a>
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