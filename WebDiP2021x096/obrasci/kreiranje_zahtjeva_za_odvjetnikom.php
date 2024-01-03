<?php

$naslov = "Kreiranje zahtjeva za odvjetnikom";
$direktorij = dirname(getcwd());
$putanja = dirname(dirname($_SERVER["REQUEST_URI"]));

include_once "$direktorij/zaglavlje.php";
if (!isset($_SESSION['uloga_id']) || $_SESSION['uloga_id'] <2) {
    $baza = new Baza();
    $baza->spojiDB();
    $baza->dnevnik_ostale_radnje("POKUŠAJ prijave na stranicu '$naslov'");
    $baza->zatvoriDB();
    header("Location: ../index.php");
}

$korisnik_id = $_SESSION['korisnik_id'];

$sudski_postupak_id = false;
$sudski_postupak_naziv = false;
$odvjetnik_id = false;
$odvjetnik_ime_prezime = false;
$slika_sudskog_postupka = false;

if (isset($_GET['zahtjev_id'])) {
    $zahtjev_id = filter_input(INPUT_GET, 'zahtjev_id', FILTER_SANITIZE_STRING);

    $baza = new Baza();
    $baza->spojiDB();

    $zahtjev = $baza->zahtjev_za_odvjetnikom_dohvati_zahtjev_id($zahtjev_id);

    $sudski_postupak_id = $zahtjev['sudski_postupak_id'];
    $odvjetnik_id = $zahtjev['odvjetnik_id'];

    $slika_sudskog_postupka = $zahtjev['slika_sudskog_postupka'];

    $sudski_postupak_naziv = $baza->sudski_postupak_dohvati_id($sudski_postupak_id)['naziv'];
    $odvjetnik_ime_prezime = $baza->korisnik_dohvati_korisnik_id($odvjetnik_id)[0]['ime_prezime'];
    $baza->zatvoriDB();
}


if (isset($_POST['dodaj'])) {
    $konfiguracija = new Konfiguracija($direktorij);
    $trenutno_vrijeme = $konfiguracija->virtualnoVrijeme();

    $slika_sudskog_postupka = is_uploaded_file($_FILES['slika_sudskog_postupka']['tmp_name']) ? "$putanja/slike_sudskih_postupaka/" . $_FILES['slika_sudskog_postupka']['name'] : false;
    $sudski_postupak_id = isset($_POST['sudski_postupak']) ? filter_input(INPUT_POST, 'sudski_postupak', FILTER_SANITIZE_STRING) : false;
    $odvjetnik_id = isset($_POST['odvjetnik']) ? filter_input(INPUT_POST, 'odvjetnik', FILTER_SANITIZE_STRING) : false;

    $datum_vrijeme_slanja = $trenutno_vrijeme;

    if ($sudski_postupak_id && $odvjetnik_id && $datum_vrijeme_slanja) {
        $atributi = array();
        $atributi['slika_sudskog_postupka'] = $slika_sudskog_postupka;
        $atributi['sudski_postupak_id'] = $sudski_postupak_id;
        $atributi['odvjetnik_id'] = $odvjetnik_id;
        $atributi['datum_vrijeme_slanja'] = $datum_vrijeme_slanja;
        $atributi['status'] = null;

        if (!isset($_GET['zahtjev_id'])) {
            $putanja_od = $_FILES['slika_sudskog_postupka']['tmp_name'];
            $putanja_do = "../slike_sudskih_postupaka/" . $_FILES['slika_sudskog_postupka']['name'];
            move_uploaded_file($putanja_od, $putanja_do);
            $baza = new Baza();
            $baza->spojiDB();
            $baza->zahtjev_za_odvjetnikom_spremi($atributi);
            $baza->zatvoriDB();
        } else {
            $zahtjev_id = filter_input(INPUT_GET, 'zahtjev_id', FILTER_SANITIZE_STRING);
            if (is_uploaded_file($_FILES['slika_sudskog_postupka']['tmp_name'])) {
                $baza = new Baza();
                $baza->spojiDB();
                $zahtjev = $baza->zahtjev_za_odvjetnikom_dohvati_zahtjev_id($zahtjev_id);
                $baza->zatvoriDB();
                $zahtjev_slika_sudskog_postupka = $zahtjev['slika_sudskog_postupka'];
                @unlink("../slike_sudskih_postupaka/" . substr($zahtjev_slika_sudskog_postupka, strrpos($zahtjev_slika_sudskog_postupka, "/") + 1));
                $putanja_od = $_FILES['slika_sudskog_postupka']['tmp_name'];
                $putanja_do = "../slike_sudskih_postupaka/" . $_FILES['slika_sudskog_postupka']['name'];
                move_uploaded_file($putanja_od, $putanja_do);
            } else {
                $atributi['slika_sudskog_postupka'] = null;
            }
            $baza = new Baza();
            $baza->spojiDB();
            $baza->zahtjev_za_odvjetnikom_azuriraj_kod_klijenta($zahtjev_id, $atributi);
            $baza->zatvoriDB();
        }
        header("Location: ../zahtjevi_za_odvjetnikom.php");
    }
}

$smarty->assign("sudski_postupak_id", $sudski_postupak_id);
$smarty->assign("sudski_postupak_naziv", $sudski_postupak_naziv);
$smarty->assign("odvjetnik_id", $odvjetnik_id);
$smarty->assign("odvjetnik_ime_prezime", $odvjetnik_ime_prezime);
$smarty->assign("slika_sudskog_postupka", $slika_sudskog_postupka);

$smarty->display("kreiranje_zahtjeva_za_odvjetnikom.tpl");
$smarty->display("podnozje.tpl");
