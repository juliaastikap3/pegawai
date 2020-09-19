<?php
/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=u8678548_dbjuliaastikaputri;host=localhost';
$user = 'u8678548_juliaastikaputri';
$password = 'Klatenbersinar';

try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,TRUE);
} catch (PDOException $e) {
    echo 'Gagal Koneksi dgn sebab ' . $e->getMessage();
}

?>