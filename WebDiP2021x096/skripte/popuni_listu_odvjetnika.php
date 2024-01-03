<?php

$direktorij = dirname(getcwd());

include_once "$direktorij/klase/baza.class.php";
include_once "$direktorij/klase/sesija.class.php";

Sesija::kreirajSesiju();

$sudski_postupak_id = $_POST['sudski_postupak_id'];

$baza = new Baza();
$baza->spojiDB();
$tuzitelj_sa_sudskog_postupka = $baza->sudski_postupak_dohvati_id($sudski_postupak_id);
$tuzitelj_id = $tuzitelj_sa_sudskog_postupka['tuzitelj_id'];
$tablica = $baza->korisnik_dohvati_sve_odvjetnike_osim_ciji_je_sudski_postupak($tuzitelj_id);
$baza->zatvoriDB();

echo json_encode($tablica);
