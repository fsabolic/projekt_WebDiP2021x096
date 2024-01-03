<?php

$direktorij = dirname(getcwd());

include_once "$direktorij/klase/baza.class.php";
include_once "$direktorij/klase/konfiguracija.class.php";

$konfiguracija = new Konfiguracija($direktorij);
$trenutno_vrijeme = $konfiguracija->virtualnoVrijeme();

$tekst = (isset($_POST['odgovor'])) ? filter_input(INPUT_POST, 'odgovor', FILTER_SANITIZE_STRING) : "";
$datum_vrijeme_odgovoranja = date("Y-m-d H:i:s", strtotime($trenutno_vrijeme));
$pitanje_id = (isset($_POST['pitanje_id'])) ? filter_input(INPUT_POST, 'pitanje_id', FILTER_SANITIZE_STRING) : "";

$atributi = array();
$atributi['tekst'] = $tekst;
$atributi['datum_vrijeme_odgovaranja'] = $datum_vrijeme_odgovoranja;
$atributi['pitanje_id'] = $pitanje_id;

$baza = new Baza();

$baza->spojiDB();
$baza->pravno_savjetovanje_odgovor_spremi($atributi);
$baza->zatvoriDB();

echo json_encode(array("spremljeno" => true, "array" => $atributi));
