<?php

$direktorij = dirname(getcwd());

include_once "$direktorij/klase/baza.class.php";

$korisnik_id = filter_input(INPUT_POST, 'korisnik_id', FILTER_SANITIZE_STRING);
$kategorija_sudskog_postupka_id = filter_input(INPUT_POST, 'kategorija_sudskog_postupka_id', FILTER_SANITIZE_STRING);

$baza = new Baza();

$baza->spojiDB();

$baza->korisnik_azuriraj_kategorija_sudskog_postupka_id($korisnik_id, $kategorija_sudskog_postupka_id);

$baza->zatvoriDB();

echo json_encode(array("uspio" => true,"kategorija"=>$kategorija_sudskog_postupka_id,"korisnik_id"=>$korisnik_id));

