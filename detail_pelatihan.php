<?php
//tangkap request id di url
$id = $_GET['id'];
$model = new Pelatihan();
$mat = $model->detailPelatihan([$id]);
?>

<table class="table table-striped">
  <tbody>
    <tr>
        <th scope="col">Materi</th>
        <th scope="col">: </th>
        <td scope="col"><?= $mat['materi'] ?></td>
    </tr>
    <tr>
        <th scope="col">Nama Pegawai</th>
        <th scope="col">: </th>
        <td scope="col"><?= $mat['pegawai'] ?></td>
    </tr>
    <tr>
        <th scope="col">Tanggal Mulai</th>
        <th scope="col">: </th>
        <td scope="col"><?= $mat['tgl_mulai'] ?></td>
    </tr>
    <tr>
        <th scope="col">Tanggal Akhir</th>
        <th scope="col">: </th>
        <td scope="col"><?= $mat['tgl_akhir'] ?></td>
    </tr>
    <tr>
        <th scope="col">Keterangan</th>
        <th scope="col">: </th>
        <td scope="col"> <?= $mat['keterangan'] ?></td>
    </tr>
  </tbody>
</table>
<a href="index.php?hal=pelatihan" class="btn btn-primary btn btn-sm">Kembali</a>