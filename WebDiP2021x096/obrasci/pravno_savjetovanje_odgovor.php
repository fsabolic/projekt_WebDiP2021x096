<?php

$naslov = "Pravna savjetovanja";
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

$datum_vrijeme_postavljanja = false;
$klijent = false;
$naslov = false;
$pitanje = false;
$pitanje_id = false;
if (isset($_GET['pitanje_id'])) {
    $pitanje_id = filter_input(INPUT_GET, 'pitanje_id', FILTER_SANITIZE_STRING);
    $baza = new Baza();

    $baza->spojiDB();

    $pravno_savjetovanje = $baza->pravno_savjetovanje_pitanje_dohvati_pitanje($pitanje_id);

    $baza->zatvoriDB();

    $datum_vrijeme_postavljanja = isset($pravno_savjetovanje['datum_vrijeme_postavljanja']) ? date("d.m.Y. H:i:s", strtotime($pravno_savjetovanje['datum_vrijeme_postavljanja'])) : false;
    $klijent = (isset($pravno_savjetovanje['ime_prezime']) && isset($pravno_savjetovanje['korisnicko_ime'])) ? htmlspecialchars($pravno_savjetovanje['korisnicko_ime'] . " (" . $pravno_savjetovanje['ime_prezime'] . ")") : false;
    $naslov = isset($pravno_savjetovanje['razlog']) ? htmlspecialchars($pravno_savjetovanje['razlog']) : false;
    $pitanje = isset($pravno_savjetovanje['opis']) ? htmlspecialchars($pravno_savjetovanje['opis']) : false;
}

$smarty->assign("pitanje_id", $pitanje_id);
$smarty->assign("datum_vrijeme_postavljanja", $datum_vrijeme_postavljanja);
$smarty->assign("klijent", $klijent);
$smarty->assign("naslov", $naslov);
$smarty->assign("pitanje", $pitanje);

$smarty->display("pravno_savjetovanje_odgovor.tpl");
$smarty->display("podnozje.tpl");
