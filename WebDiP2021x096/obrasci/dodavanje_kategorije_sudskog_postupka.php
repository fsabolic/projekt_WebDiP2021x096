<?php

$naslov = "Dodavanje kategorije sudskog postupka";
$direktorij = dirname(getcwd());
$putanja = dirname(dirname($_SERVER["REQUEST_URI"]));

include_once "$direktorij/zaglavlje.php";
if (!isset($_SESSION['uloga_id']) || $_SESSION['uloga_id'] < 4) {
    $baza = new Baza();
    $baza->spojiDB();
    $baza->dnevnik_ostale_radnje("POKUŠAJ prijave na stranicu '$naslov'");
    $baza->zatvoriDB();
    header("Location: ../index.php");
}

$naziv = false;
$opis = false;

if (isset($_GET['kategorija_sudskog_postupka_id'])) {
    $kategorija_sudskog_postupka_id = filter_input(INPUT_GET, 'kategorija_sudskog_postupka_id', FILTER_SANITIZE_STRING);

    $baza = new Baza();
    $baza->spojiDB();

    $rezultat = $baza->kategorija_sudskog_postupka_dohvati($kategorija_sudskog_postupka_id)[0];

    $baza->zatvoriDB();

    $naziv = $rezultat['naziv'];
    $opis = $rezultat['opis'];
}

if (isset($_POST['dodaj'])) {
    $naziv = isset($_POST['naziv']) ? filter_input(INPUT_POST, 'naziv', FILTER_SANITIZE_STRING) : false;
    $opis = isset($_POST['opis']) ? filter_input(INPUT_POST, 'opis', FILTER_SANITIZE_STRING) : false;

    if ($naziv && $opis) {
        $atributi = array();
        $atributi["naziv"] = $naziv;
        $atributi["opis"] = $opis;

        if (isset($_GET['kategorija_sudskog_postupka_id'])) {
            $kategorija_sudskog_postupka_id = filter_input(INPUT_GET, 'kategorija_sudskog_postupka_id', FILTER_SANITIZE_STRING);
            $baza = new Baza();
            $baza->spojiDB();
            $baza->kategorija_sudskog_postupka_azuriraj($kategorija_sudskog_postupka_id, $atributi);
            $baza->zatvoriDB();
        } else {
            $baza = new Baza();
            $baza->spojiDB();
            $baza->kategorija_sudskog_postupka_spremi($atributi);
            $baza->zatvoriDB();
        }
        header("Location: ../kategorije_sudskih_postupaka.php");
    }
}

$smarty->assign("naziv", $naziv);
$smarty->assign("opis", $opis);

$smarty->display("dodavanje_kategorije_sudskog_postupka.tpl");
$smarty->display("podnozje.tpl");
