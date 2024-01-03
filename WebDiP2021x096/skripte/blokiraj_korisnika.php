<?php

$direktorij = dirname(getcwd());

include_once "$direktorij/klase/baza.class.php";

$korisnik_id = isset($_POST['korisnik_id']) ? filter_input(INPUT_POST, 'korisnik_id', FILTER_SANITIZE_STRING) : null;

$baza = new Baza();
$baza->spojiDB();
$baza->korisnik_azuriraj_blokiran_id($korisnik_id, 1);
$baza->zatvoriDB();

echo json_encode(array("blokiran" => true));
