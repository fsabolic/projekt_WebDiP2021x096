<?php

$direktorij = dirname(getcwd());

include_once "$direktorij/klase/baza.class.php";

$zahtjev_id = filter_input(INPUT_POST, 'zahtjev_id', FILTER_SANITIZE_STRING);

$baza = new Baza();
$baza->spojiDB();
$zahtjev = $baza->zahtjev_za_odvjetnikom_dohvati_zahtjev_id($zahtjev_id);
$baza->zatvoriDB();
$zahtjev_slika_sudskog_postupka = $zahtjev['slika_sudskog_postupka'];

$baza = new Baza();
$baza->spojiDB();
$baza->zahtjev_obrisi($zahtjev_id);
$baza->zatvoriDB();

@unlink("../slike_sudskih_postupaka/" . substr($zahtjev_slika_sudskog_postupka, strrpos($zahtjev_slika_sudskog_postupka, "/") + 1));

echo json_encode(array("uspio" => true));

