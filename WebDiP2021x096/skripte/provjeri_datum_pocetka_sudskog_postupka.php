<?php

$direktorij = dirname(getcwd());

include_once "$direktorij/klase/baza.class.php";
include_once "$direktorij/klase/konfiguracija.class.php";

$sudski_postupak_id = filter_input(INPUT_POST, 'sudski_postupak_id', FILTER_SANITIZE_STRING);

$baza = new Baza();
$baza->spojiDB();
$datum_vrijeme_pocetka = $baza->sudski_postupak_dohvati_id($sudski_postupak_id)['datum_vrijeme_pocetka'];
$baza->zatvoriDB();

$konfiguracija = new Konfiguracija($direktorij);

$trenutno_vrijeme = $konfiguracija->virtualnoVrijeme();

$proslo = false;
if (strtotime($trenutno_vrijeme) >= (strtotime($datum_vrijeme_pocetka) + 7 * 24 * 60 * 60)) {
    $proslo = true;
}

echo json_encode(array("proslo" => $proslo, "sudski_postupak_id" => $sudski_postupak_id));
