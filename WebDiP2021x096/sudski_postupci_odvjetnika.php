<?php

$naslov = "Sudski postupci odvjetnika";

$direktorij = getcwd();
$putanja = dirname($_SERVER["REQUEST_URI"]);

include_once "$direktorij/zaglavlje.php";

if (!isset($_SESSION['uloga_id']) || $_SESSION['uloga_id'] < 3) {
    $baza = new Baza();
    $baza->spojiDB();
    $baza->dnevnik_ostale_radnje("POKUŠAJ prijave na stranicu '$naslov'");
    $baza->zatvoriDB();
    header("Location: ./index.php");
}



$smarty->display("sudski_postupci_odvjetnika.tpl");
$smarty->display("podnozje.tpl");
