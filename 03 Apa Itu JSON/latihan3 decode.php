<?php

$data = file_get_contents('https://www.themealdb.com/api/json/v1/1/search.php?f=a');
$mahasiswa = json_decode($data, true);
var_dump($mahasiswa);

