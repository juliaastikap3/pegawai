<?php
	if(isset($_SESSION['MEMBER'])){
?>

<?php
$ar_judul = ['No','NIP','Nama','Gender','Jabatan','Divisi','Foto','Action'];
?>
<h3>Data Pegawai</h3>
<a href="index.php?hal=form_pegawai" type="button" 
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
    $model = new Pegawai();
    //fitur cari nama dan filter divisi
    $nama = $_GET['nama']; //tangkap request search di url
    $id = $_GET['id']; //tangkap request filter divisi dari sidebar yg ada di url
    $idj = $_GET['idj']; //tangkap request filter jabatan dari sidebar yg ada di url
    //print_r($nama); print_r($id); exit;
    if(!empty($nama)){
      $rs = $model->cariPegawai($nama); //tampilkan sesuai data yg dicari
    }
    else if(!empty($id)){  
      $rs = $model->filterDivisi($id); //tampilkan data pegawai berdasarkan filter divisi
    }
    else if(!empty($idj)){  
      $rs = $model->filterJabatan($idj); //tampilkan data pegawai berdasarkan filter jabatan
    }
    else{  
      $rs = $model->dataPegawai(); //tampilkan seluruh data pegawai
    }  

    $no = 1;
    foreach($rs as $peg){
    ?>
        <tr>
            <th scope="row"><?= $no ?></th>
            <td><?= $peg['nip'] ?></td>
            <td><?= $peg['nama'] ?></td>
            <td><?= $peg['gender'] ?></td>
            <td><?= $peg['jab'] ?></td>
            <td><?= $peg['bagian'] ?></td>
            <td>
            <?php
            if(!empty($peg['foto'])){ //jika ada file foto di db
            ?>
              <img src="images/<?= $peg['foto'] ?>" width="10%" />
            <?php
            }
            else{ //jika kosong nama file foto di db
            ?>
              <img src="images/nophoto.png" width="10%" />
            <?php } ?>  
            </td>
            <td>
              <a href="index.php?hal=detail_pegawai&id=<?= $peg['id'] ?>" type="button" 
                 class="btn btn-primary">Detail</a>
              <a href="index.php?hal=form_pegawai&idedit=<?= $peg['id'] ?>" type="button" 
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