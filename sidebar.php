<?php
$obj1 = new Divisi();
$ar_divisi = $obj1->dataDivisi();
$obj2 = new Jabatan();
$ar_jabatan = $obj2->dataJabatan();
?>
<div class="col-md-3">

	<?php
	//---------------sidebar filter data hanya untuk member user---------------------
	if(isset($_SESSION['MEMBER'])){ 
	?>

	<div class="list-group">
		<a href="#" class="list-group-item list-group-item-action active">Divisi</a>
		<?php
		foreach($ar_divisi as $div){
		?>
			<div class="list-group-item">
				<a href="index.php?hal=pegawai&id=<?= $div['id'] ?>">
					<?= $div['nama'] ?>
				</a>
			</div>
		<?php } ?>
	</div>
	<br/><br/>
	<div class="list-group">
		<a href="#" class="list-group-item list-group-item-action active">Jabatan</a>
	<?php
	foreach($ar_jabatan as $jab){
	?>
		<div class="list-group-item">
			<a href="index.php?hal=pegawai&idj=<?= $jab['id'] ?>">
				<?= $jab['nama'] ?>
			</a>
		</div>
	<?php } ?>
	</div>

	<?php
	}
	else{ //---------------sidebar yg belum login berupa form login---------------------
		include_once 'form_login.php';
	}		
	?>

</div>
</div>