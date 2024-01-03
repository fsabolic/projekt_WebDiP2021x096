<?php

$direktorij = dirname(getcwd());

include_once "$direktorij/klase/baza.class.php";

$kategorija_id = filter_input(INPUT_POST, 'kategorija_sudskog_postupka_id', FILTER_SANITIZE_STRING);

$baza = new Baza();
$baza->spojiDB();
$tablica = $baza->korisnik_dohvati_moderatore_kategorije($kategorija_id);
$baza->zatvoriDB();

echo json_encode($tablica);
