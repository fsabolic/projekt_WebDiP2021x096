<?php

$direktorij = dirname(getcwd());

include_once "$direktorij/klase/baza.class.php";

$obrana_id = filter_input(INPUT_POST, 'obrana_id', FILTER_SANITIZE_STRING);
$baza = new Baza();

$baza->spojiDB();

$baza->obrana_obrisi($obrana_id);

$baza->zatvoriDB();

echo json_encode(array("uspio" => true));

