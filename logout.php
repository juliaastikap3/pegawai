<?php
session_start();
unset($_SESSION['MEMBER']); //session_destroy();
header('location:index.php?hal=home');
?>