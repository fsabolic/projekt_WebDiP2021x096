<?php

$direktorij = dirname(getcwd());

include_once "$direktorij/klase/baza.class.php";
include_once "$direktorij/klase/sesija.class.php";
include_once "$direktorij/klase/konfiguracija.class.php";

Sesija::kreirajSesiju();

$konfiguracija = new Konfiguracija($direktorij);
$trenutno_vrijeme = $konfiguracija->virtualnoVrijeme();

$razlog = (isset($_POST['razlog'])) ? filter_input(INPUT_POST, 'razlog', FILTER_SANITIZE_STRING) : "";
$pitanje = (isset($_POST['pitanje'])) ? filter_input(INPUT_POST, 'pitanje', FILTER_SANITIZE_STRING) : "";
$datum_vrijeme_postavljanja = date("Y-m-d H:i:s", strtotime($trenutno_vrijeme));
$odvjetnik_id = (isset($_POST['odvjetnik_id'])) ? filter_input(INPUT_POST, 'odvjetnik_id', FILTER_SANITIZE_STRING) : "";
$korisnik_id = $_SESSION['korisnik_id'];

$atributi = array();
$atributi['razlog'] = $razlog;
$atributi['pitanje'] = $pitanje;
$atributi['datum_vrijeme_postavljanja'] = $datum_vrijeme_postavljanja;
$atributi['odvjetnik_id'] = $odvjetnik_id;
$atributi['korisnik_id'] = $korisnik_id;

$baza = new Baza();

$baza->spojiDB();
$baza->pravno_savjetovanje_pitanje_spremi($atributi);
$baza->zatvoriDB();

echo json_encode(array("spremljeno" => true, "array" => $atributi));
