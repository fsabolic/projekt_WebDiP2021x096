<?php

$naslov = "Dodaj obranu";
$direktorij = dirname(getcwd());
$putanja = dirname(dirname($_SERVER["REQUEST_URI"]));

include_once "$direktorij/zaglavlje.php";
if (!isset($_SESSION['uloga_id']) || $_SESSION['uloga_id'] < 3) {
    $baza = new Baza();
    $baza->spojiDB();
    $baza->dnevnik_ostale_radnje("POKUŠAJ prijave na stranicu '$naslov'");
    $baza->zatvoriDB();
    header("Location: ../index.php");
}

$argumenti_obrane = false;

if (isset($_GET['obrana_id'])) {
    $obrana_id = filter_input(INPUT_GET, 'obrana_id', FILTER_SANITIZE_STRING);
    $baza = new Baza();
    $baza->spojiDB();
    $argumenti_obrane = $baza->obrana_dohvati($obrana_id)['argumenti_obrane'];
    $baza->zatvoriDB();
}

if (isset($_GET['zahtjev_id'])) {
    if (isset($_POST['dodaj'])) {
        $zahtjev_id = isset($_GET['zahtjev_id']) ? filter_input(INPUT_GET, 'zahtjev_id', FILTER_SANITIZE_STRING) : false;
        $argumenti_obrane = isset($_POST['argumenti_obrane']) ? filter_input(INPUT_POST, 'argumenti_obrane', FILTER_SANITIZE_STRING) : false;

        if ($zahtjev_id && $argumenti_obrane) {
            $atributi = array();
            $atributi['zahtjev_id'] = $zahtjev_id;
            $atributi['argumenti_obrane'] = $argumenti_obrane;

            if (!isset($_GET['obrana_id'])) {
                $baza = new Baza();
                $baza->spojiDB();
                $baza->obrana_spremi($atributi);
                $baza->zatvoriDB();
            } else {
                $obrana_id = filter_input(INPUT_GET, 'obrana_id', FILTER_SANITIZE_STRING);
                $baza = new Baza();
                $baza->spojiDB();
                $baza->obrana_azuriraj($obrana_id, $atributi);
                $baza->zatvoriDB();
            }

            header("Location: ../prihvaceni_zahtjevi.php");
        }
    }
}

$smarty->assign("argumenti_obrane", $argumenti_obrane);

$smarty->display("dodaj_obranu.tpl");
$smarty->display("podnozje.tpl");
