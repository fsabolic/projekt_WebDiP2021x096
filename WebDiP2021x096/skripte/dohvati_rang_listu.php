<?php

$direktorij = dirname(getcwd());

include_once "$direktorij/klase/baza.class.php";
include_once "$direktorij/klase/konfiguracija.class.php";

$od = (isset($_POST['datum_od']) && $_POST['datum_od'] != "") ? $_POST['datum_od']: null;
$do = (isset($_POST['datum_do']) && $_POST['datum_do'] != "") ? $_POST['datum_do']: null;

$baza = new Baza();
$baza->spojiDB();
$tablica = $baza->korisnik_dohvati_rang_listu($od,$do);
$baza->zatvoriDB();

echo json_encode(array("tablica" => $tablica,"od"=>$od,"do"=>$do));
