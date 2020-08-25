<?php

$data = file_get_contents('https://www.themealdb.com/api/json/v1/1/search.php?f=a');
$mahasiswa = json_decode($data, true);
$data = json_encode($mahasiswa);
echo $data;

