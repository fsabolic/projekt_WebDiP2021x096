<?php

$direktorij = dirname(getcwd());

include_once "$direktorij/klase/baza.class.php";
include_once "$direktorij/klase/konfiguracija.class.php";

$sudski_postupak_id = $_POST['sudski_postupak_id'];

$poceo = false;

$konfiguracija = new Konfiguracija($direktorij);
$trenutno_vrijeme = $konfiguracija->virtualnoVrijeme();

$baza = new Baza();
$baza->spojiDB();

$sudski_postupak = $baza->sudski_postupak_dohvati_id($sudski_postupak_id);

$baza->zatvoriDB();

$pocetak_sudskog_postupka = $sudski_postupak['datum_vrijeme_pocetka'];

if (strtotime($pocetak_sudskog_postupka) < strtotime($trenutno_vrijeme)) {
    $poceo = true;
}


echo json_encode(array("poceo" => $poceo, "asdf" => 3));
