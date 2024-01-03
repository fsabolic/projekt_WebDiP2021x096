<?php

$direktorij = dirname(getcwd());

include_once "$direktorij/klase/baza.class.php";
include_once "$direktorij/klase/konfiguracija.class.php";

$konfiguracija = new Konfiguracija($direktorij);
$limit = $konfiguracija->vratiBrojStranicaStranicenja();

$atribut_za_sortiranje = (isset($_POST['atribut_za_sortiranje']) && $_POST['atribut_za_sortiranje'] != null) ? $_POST['atribut_za_sortiranje'] : null;

$smjer_sortiranja = (isset($_POST['smjer_sortiranja']) && $_POST['smjer_sortiranja'] != null) ? $_POST['smjer_sortiranja'] : null;

$trenutna_stranica = (isset($_POST['broj_stranice']) && $_POST['broj_stranice'] != null) ? $_POST['broj_stranice'] : 0;

$broj_sudskih_postupaka = $konfiguracija->vratiBrojSudskihPostupaka();
$broj_primljenih_zahtjeva = $konfiguracija->vratiBrojZahtjeva();
$broj_danih_savjetovanja = $konfiguracija->vratiBrojOdgovora();

$baza = new Baza();
$baza->spojiDB();
$broj_redova = count($baza->korisnik_dohvati_sve_moderatore_ispunjeni_uvjeti(999999999, 0, $atribut_za_sortiranje, $smjer_sortiranja, $broj_sudskih_postupaka, $broj_primljenih_zahtjeva, $broj_danih_savjetovanja));

$max_broj_stranica = ceil($broj_redova / $limit) - 1;
if ($trenutna_stranica > $max_broj_stranica) {
    $trenutna_stranica = $max_broj_stranica;
} elseif ($trenutna_stranica < 0) {
    $trenutna_stranica = 0;
}

$offset = $trenutna_stranica * $limit;
$tablica = $baza->korisnik_dohvati_sve_moderatore_ispunjeni_uvjeti($limit, $offset, $atribut_za_sortiranje, $smjer_sortiranja, $broj_sudskih_postupaka, $broj_primljenih_zahtjeva, $broj_danih_savjetovanja);
$baza->zatvoriDB();

echo json_encode(array("tablica" => $tablica, "trenutna_stranica" => $trenutna_stranica, "broj_redova" => $broj_redova));
