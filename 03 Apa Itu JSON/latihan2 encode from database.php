<?php 
$dbh = new PDO('mysql:host=localhost;dbname=wpu_phpdasar', 'root', '');
$db = $dbh->prepare('SELECT * FROM mahasiswa');
$db->execute();

$mahasiswa = json_encode($db->fetchAll(PDO::FETCH_ASSOC));
$data = $mahasiswa;
echo $data;