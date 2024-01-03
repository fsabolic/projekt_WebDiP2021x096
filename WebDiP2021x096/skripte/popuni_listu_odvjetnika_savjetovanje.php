<?php

$direktorij = dirname(getcwd());

include_once "$direktorij/klase/baza.class.php";

$baza = new Baza();
$baza->spojiDB();
$tablica = $baza->korisnik_dohvati_odvjetnike();
$baza->zatvoriDB();

echo json_encode($tablica);
