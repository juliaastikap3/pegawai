<?php
//tangkap request nip di url
$id = $_GET['id'];
$model = new Member();
$member = $model->getMember([$id]);
?>
<center>
<div class="card" style="width: 24rem;">
<?php
    if(!empty($member['foto'])){ //jika ada file foto di db
?> 
  <img src="images/<?= $member['foto'] ?>" class="card-img-top" width="100%">
<?php
}else{ //jika kosong nama file foto
?>
  <img src="images/nopic.png" class="card-img-top" alt="...">
<?php } ?>  
  <div class="card-body">
    <h5 class="card-title"><?= $member['fullname'] ?></h5>
    <p class="card-text">
    Username : <?= $member['username'] ?><br/>
    Role : <?= $member['role'] ?><br/>
    Email : <?= $member['email'] ?></p>
    <a href="index.php?hal=member" class="btn btn-primary">Go Back</a>
  </div>
</div>
</center>