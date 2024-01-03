<?php


$naslov = "Moderatori";
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

$kategorija_sudskog_postupka_id = false;
$kategorija_sudskog_postupka_naziv = false;

if (isset($_GET['kategorija_sudskog_postupka_id'])) {
    $kategorija_sudskog_postupka_id = filter_input(INPUT_GET, 'kategorija_sudskog_postupka_id', FILTER_SANITIZE_STRING);
    $baza = new Baza();
    $baza->spojiDB();
    $rezultat = $baza->kategorija_sudskog_postupka_dohvati($kategorija_sudskog_postupka_id)[0];
    $baza->zatvoriDB();
    $kategorija_sudskog_postupka_naziv = $rezultat['naziv'];
}

$smarty->assign("kategorija_sudskog_postupka_id", $kategorija_sudskog_postupka_id);
$smarty->assign("kategorija_sudskog_postupka_naziv", $kategorija_sudskog_postupka_naziv);

$smarty->display("moderatori.tpl");
$smarty->display("podnozje.tpl");
