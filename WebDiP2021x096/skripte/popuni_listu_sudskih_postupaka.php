<?php

$direktorij = dirname(getcwd());

include_once "$direktorij/klase/baza.class.php";
include_once "$direktorij/klase/sesija.class.php";

Sesija::kreirajSesiju();

$korisnik_id=$_SESSION['korisnik_id'];

$baza=new Baza();

$baza->spojiDB();
$tablica=$baza->sudski_postupak_dohvati_sve_korisnikove($korisnik_id);
$baza->zatvoriDB();

echo json_encode($tablica);