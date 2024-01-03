<?php

$direktorij = dirname(getcwd());

include_once "$direktorij/klase/baza.class.php";

$zahtjev_id = $_POST['zahtjev_id'];
$status = $_POST['status'];

$baza = new Baza();

$baza->spojiDB();

$baza->zahtjev_za_odvjetnikom_azuriraj_status($zahtjev_id, $status);

$baza->zatvoriDB();

echo json_encode(array("uspio" => true));

