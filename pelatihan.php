<?php
if(isset($_SESSION['MEMBER']) && $_SESSION['MEMBER']['role'] != 'staff'){
?>

<?php
$ar_judul = ['No','Materi','Pegawai','Tgl Mulai','Tgl Akhir','Keterangan','Action'];
?>
<h3>Data Pelatihan</h3>
<!--a href="index.php?hal=form_gaji" type="button" 
   class="btn btn-primary">Input Data</a-->
<!------------awal modal--------------->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_pelatihan">
  Input Data
</button>

<!-- Modal -->
<div class="modal fade" id="form_pelatihan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Pelatihan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include_once 'form_gaji.php' ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!--button type="button" class="btn btn-primary">Save changes</button-->
      </div>
    </div>
  </div>
</div>
<!------------akhir modal---------------> 
<br/></br>
<h3>Data Pelatihan</h3>
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
    $model = new Pelatihan();
    $rs = $model->dataPelatihan();
    $no = 1;
    foreach($rs as $mat){
    ?>
        <tr>
            <th scope="row"><?= $no ?></th>
            <td><?= $mat['materi'] ?></td>
            <td><?= $mat['pegawai'] ?></td>
            <td><?= $mat['tgl_mulai'] ?></td>
            <td><?= $mat['tgl_akhir'] ?></td>
            <td><?= $mat['keterangan'] ?></td>
            <td>
            <a href="index.php?hal=detail_pelatihan&id=<?= $mat['id'] ?>" type="button" 
                 class="btn btn-primary">Detail</a>
            <a href="index.php?hal=form_pelatihan&idedit=<?= $mat['id'] ?>" type="button" 
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