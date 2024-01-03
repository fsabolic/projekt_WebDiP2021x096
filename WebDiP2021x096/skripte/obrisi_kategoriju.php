<?php

$direktorij = dirname(getcwd());

include_once "$direktorij/klase/baza.class.php";

$kategorija_sudskog_postupka_id = filter_input(INPUT_POST, 'kategorija_sudskog_postupka_id', FILTER_SANITIZE_STRING);
$baza = new Baza();

$baza->spojiDB();

$baza->kategorija_obrisi($kategorija_sudskog_postupka_id);

$baza->zatvoriDB();

echo json_encode(array("uspio" => true));

