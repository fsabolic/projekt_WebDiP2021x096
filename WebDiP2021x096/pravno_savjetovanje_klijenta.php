<?php

$naslov = "Pravno savjetovanje klijenta";

$direktorij = getcwd();
$putanja = dirname($_SERVER["REQUEST_URI"]);

include_once "$direktorij/zaglavlje.php";

if (!isset($_SESSION['uloga_id']) || $_SESSION['uloga_id'] < 2) {
    $baza = new Baza();
    $baza->spojiDB();
    $baza->dnevnik_ostale_radnje("POKUŠAJ prijave na stranicu '$naslov'");
    $baza->zatvoriDB();
    header("Location: ./index.php");
}



$smarty->display("pravno_savjetovanje_klijenta.tpl");
$smarty->display("podnozje.tpl");
