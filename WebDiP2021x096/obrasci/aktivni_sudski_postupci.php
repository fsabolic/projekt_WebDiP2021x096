<?php

$naslov = "Ažuriranje aktivnog sudskog postupka";
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


$naziv = false;
$protuzakonita_radnja = false;
$dokaz = false;
$datum_vrijeme_pocetka = false;
$klijent = false;
$klijent_id = false;
$tuzitelj = false;
$kategorija_sudskog_postupka_id = false;
$kategorija_sudskog_postupka = false;
$datum_vrijeme_zavrsetka = false;
$zakljucak_sudskog_postupka = false;

if (isset($_GET['sudski_postupak_id']) && $_GET['sudski_postupak_id'] != "") {
    $sudski_postupak_id = filter_input(INPUT_GET, 'sudski_postupak_id', FILTER_SANITIZE_STRING);
    $baza = new Baza();
    $baza->spojiDB();
    $rezultat = $baza->sudski_postupak_dohvati_id($sudski_postupak_id);
    $baza->zatvoriDB();
    $naziv = $rezultat['naziv'];
    $protuzakonita_radnja = $rezultat['protuzakonita_radnja'];
    $dokaz = $rezultat['dokaz'];
    $datum_vrijeme_pocetka = date("d.m.Y. H:i:s", strtotime($rezultat['datum_vrijeme_pocetka']));
    $klijent_id = $rezultat['klijent_id'];
    $tuzitelj_id = $rezultat['tuzitelj_id'];
    $kategorija_sudskog_postupka_id = $rezultat['kategorija_sudskog_postupka_id'];
    $datum_vrijeme_zavrsetka = ($rezultat['datum_vrijeme_zavrsetka'] === null) ? false : date("d.m.Y. H:i:s", strtotime($rezultat['datum_vrijeme_zavrsetka']));
    $zakljucak_sudskog_postupka = ($rezultat['zakljucak_postupka'] === null) ? false : $rezultat['zakljucak_postupka'];

    $baza = new Baza();
    $baza->spojiDB();
    $klijent = $baza->korisnik_dohvati_korisnik_id($klijent_id)[0]['ime_prezime'];
    $tuzitelj = $baza->korisnik_dohvati_korisnik_id($tuzitelj_id)[0]['ime_prezime'];
    $kategorija_sudskog_postupka = $baza->kategorija_sudskog_postupka_dohvati($kategorija_sudskog_postupka_id)[0]['naziv'];
    $baza->zatvoriDB();

    if (isset($_POST['azuriraj'])) {
        $zakljucak_sudskog_postupka = isset($_POST['zakljucak_sudskog_postupka']) ? filter_input(INPUT_POST, 'zakljucak_sudskog_postupka', FILTER_SANITIZE_STRING) : false;
        $datum_vrijeme_zavrsetka = isset($_POST['datum_vrijeme_zavrsetka']) ? filter_input(INPUT_POST, 'datum_vrijeme_zavrsetka', FILTER_SANITIZE_STRING) : false;

        $konfiguracija = new Konfiguracija($direktorij);
        $trenutno_vrijeme = $konfiguracija->vratiPomak();
        $datum_vrijeme_zavrsetka = date("Y-m-d H:i:s", strtotime($datum_vrijeme_zavrsetka) + $trenutno_vrijeme * 60 * 60);

        if ($datum_vrijeme_zavrsetka && ($zakljucak_sudskog_postupka === "0" || $zakljucak_sudskog_postupka === "1")) {
            $atributi = array();
            $atributi['datum_vrijeme_zavrsetka'] = $datum_vrijeme_zavrsetka;
            $atributi['zakljucak_postupka'] = $zakljucak_sudskog_postupka;

            $baza = new Baza();
            $baza->spojiDB();
            $baza->sudski_postupak_azuriraj_zavrsno($sudski_postupak_id, $atributi);
            $baza->zatvoriDB();

            header("Location: ../prihvaceni_zahtjevi.php");
            exit();
        }
    }
} else {
    header("Location: ../prihvaceni_zahtjevi.php");
}

$smarty->assign("naziv", $naziv);
$smarty->assign("protuzakonita_radnja", $protuzakonita_radnja);
$smarty->assign("dokaz", $dokaz);
$smarty->assign("datum_vrijeme_pocetka", $datum_vrijeme_pocetka);
$smarty->assign("klijent_id", $klijent_id);
$smarty->assign("klijent", $klijent);
$smarty->assign("tuzitelj", $tuzitelj);
$smarty->assign("kategorija_sudskog_postupka", $kategorija_sudskog_postupka);
$smarty->assign("kategorija_sudskog_postupka_id", $kategorija_sudskog_postupka_id);
$smarty->assign("zakljucak_sudskog_postupka", $zakljucak_sudskog_postupka);
$smarty->assign("datum_vrijeme_zavrsetka", $datum_vrijeme_zavrsetka);

$smarty->display("aktivni_sudski_postupci.tpl");
$smarty->display("podnozje.tpl");
