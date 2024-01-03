<?php

$naslov = "Dodavanje sudskih postupaka odvjetnika";
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

$tuzitelj_id = $_SESSION['korisnik_id'];
$tuzitelj = $_SESSION['korisnicko_ime'];

$baza = new Baza();
$baza->spojiDB();
$rezultat = $baza->korisnik_dohvati($tuzitelj)[0];
$kategorija_id = $rezultat['kategorija_sudskog_postupka_id'];
$kategorija_rezultat = $baza->kategorija_sudskog_postupka_dohvati($kategorija_id)[0];
$kategorija = $kategorija_rezultat['naziv'];

$baza->zatvoriDB();

$naziv = false;
$protuzakonita_radnja = false;
$dokaz = false;
$datum_vrijeme_pocetka = false;
$klijent_id = false;
$status = 0;
$klijent = false;

if (isset($_GET['sudski_postupak_id'])) {
    $sudski_postupak_id = filter_input(INPUT_GET, 'sudski_postupak_id', FILTER_SANITIZE_STRING);

    $baza = new Baza();
    $baza->spojiDB();

    $sudski_postupak_za_azuriranje = $baza->sudski_postupak_dohvati_tuzitelj_id_sudski_postupak_id($tuzitelj_id, $sudski_postupak_id);

    $baza->zatvoriDB();

    if (count($sudski_postupak_za_azuriranje) > 0) {
        $naziv = $sudski_postupak_za_azuriranje[0]['naziv'];
        $protuzakonita_radnja = $sudski_postupak_za_azuriranje[0]['protuzakonita_radnja'];
        $dokaz = $sudski_postupak_za_azuriranje[0]['dokaz'];
        $datum_vrijeme_pocetka_neformatirano = $sudski_postupak_za_azuriranje[0]['datum_vrijeme_pocetka'];
        $klijent_id = $sudski_postupak_za_azuriranje[0]['klijent_id'];

        $datum_vrijeme_pocetka = date("d.m.Y. H:i:s", strtotime($datum_vrijeme_pocetka_neformatirano));

        $baza = new Baza();
        $baza->spojiDB();

        $klijent_neformatirano = $baza->korisnik_dohvati_korisnik_id($klijent_id)[0];

        $baza->zatvoriDB();

        $klijent = $klijent_neformatirano['ime_prezime'] . " (" . $klijent_neformatirano['korisnicko_ime'] . ")";
    } else {
        header("Location: ../index.php");
    }
}

if (isset($_POST['dodaj'])) {
    $konfiguracija = new Konfiguracija($direktorij);
    $trenutno_vrijeme = $konfiguracija->vratiPomak();

    $naziv = isset($_POST['naziv']) ? filter_input(INPUT_POST, 'naziv', FILTER_SANITIZE_STRING) : false;
    $protuzakonita_radnja = isset($_POST['protuzakonita_radnja']) ? filter_input(INPUT_POST, 'protuzakonita_radnja', FILTER_SANITIZE_STRING) : false;
    $dokaz = isset($_POST['dokaz']) ? filter_input(INPUT_POST, 'dokaz', FILTER_SANITIZE_STRING) : false;
    $datum_vrijeme_pocetka = isset($_POST['datum_vrijeme_pocetka']) ? filter_input(INPUT_POST, 'datum_vrijeme_pocetka', FILTER_SANITIZE_STRING) : false;
    $klijent_id = isset($_POST['klijent']) ? filter_input(INPUT_POST, 'klijent', FILTER_SANITIZE_STRING) : false;

    $datum_vrijeme_pocetka = date("Y-m-d H:i:s", strtotime($datum_vrijeme_pocetka) + $trenutno_vrijeme * 60 * 60);

    if ($naziv && $protuzakonita_radnja && $dokaz && $datum_vrijeme_pocetka && $klijent_id) {
        $atributi = array();
        $atributi['naziv'] = $naziv;
        $atributi['protuzakonita_radnja'] = $protuzakonita_radnja;
        $atributi['dokaz'] = $dokaz;
        $atributi['datum_vrijeme_pocetka'] = $datum_vrijeme_pocetka;
        $atributi['status'] = $status;
        $atributi['klijent_id'] = $klijent_id;
        $atributi['tuzitelj_id'] = $tuzitelj_id;
        $atributi['kategorija_sudskog_postupka_id'] = $kategorija_id;

        if (!isset($_GET['sudski_postupak_id'])) {
            $baza = new Baza();
            $baza->spojiDB();
            $baza->sudski_postupak_spremi($atributi);
            $baza->zatvoriDB();
        } else {
            unset($atributi['status']);
            $baza = new Baza();
            $baza->spojiDB();
            $baza->sudski_postupak_azuriraj($sudski_postupak_id, $atributi);
            $baza->zatvoriDB();
        }
        header("Location: ../sudski_postupci_odvjetnika.php");
    }
}



$smarty->assign("datum_vrijeme_pocetka", $datum_vrijeme_pocetka);
$smarty->assign("dokaz", $dokaz);
$smarty->assign("protuzakonita_radnja", $protuzakonita_radnja);
$smarty->assign("naziv", $naziv);
$smarty->assign("klijent", $klijent);
$smarty->assign("klijent_id", $klijent_id);

$smarty->assign("tuzitelj", $tuzitelj);
$smarty->assign("kategorija", $kategorija);

$smarty->display("dodaj_sudski_postupak_odvjetnika.tpl");
$smarty->display("podnozje.tpl");
