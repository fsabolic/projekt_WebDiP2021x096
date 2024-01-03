<?php

$naslov = "Upravljanje konfiguracijom";

$direktorij = getcwd();
$putanja = dirname($_SERVER["REQUEST_URI"]);

include_once "$direktorij/zaglavlje.php";

if (!isset($_SESSION['uloga_id']) || $_SESSION['uloga_id'] < 4) {
    $baza = new Baza();
    $baza->spojiDB();
    $baza->dnevnik_ostale_radnje("POKUŠAJ prijave na stranicu '$naslov'");
    $baza->zatvoriDB();
    header("Location: ./index.php");
}



$redirekcija = false;
if(!Sesija::korisnikJeKreiran() || $_SESSION['uloga_id']!=4){
    $redirekcija = true;
    header("Location: ./index.php");
}

$greske = "";
$greske_klasa = "";
if (isset($_POST["spremi-css"])) {
    if ($_FILES['css_datoteka']['size'] > 0) {
        if (explode(".", $_FILES['css_datoteka']['name'])[1] == "css") {
            $ime = "./css/fsabolic.css";
            $temp = $_FILES['css_datoteka']['tmp_name'];

            $sig_ime = "./css/sigurnosna_kopija.css";

            file_put_contents($sig_ime, file_get_contents($ime));

            file_put_contents($ime, file_get_contents($temp));
        } else {
            $greske = "Niste unijeli CSS datoteku!";
            $greske_klasa = "opcenito--polje-za-greske";
        }
    } else {
        $greske = "Niste unijeli ni jednu datoteku!";
        $greske_klasa = "opcenito--polje-za-greske";
    }
} elseif (isset($_POST['spremi-css-tekst'])) {
    $css_tekst = $_POST['uredivanje-css'];
    $ime = "./css/fsabolic.css";
    $dat = fopen($ime, "w");
    file_put_contents($ime, $css_tekst);
    fclose($dat);
}

$konfiguracija = new Konfiguracija($direktorij);
$konfiguracija->procitajKonfiguraciju();
if ($konfiguracija->vratiUIzradi() == 0 && !$redirekcija) {
    $konfiguracija->postaviUIzradi(1);
    $konfiguracija->spremiKonfiguraciju();
}


$konfiguracija = new Konfiguracija($direktorij);
$vrijednosti_konfiguracije = $konfiguracija->procitajKonfiguraciju();

$trajanje_kolacica = provjeraPostavljenosti($vrijednosti_konfiguracije['trajanje_kolacica']);
$broj_stranica_stranicenja = provjeraPostavljenosti($vrijednosti_konfiguracije['broj_stranica_stranicenja']);
$trajanje_sesije = provjeraPostavljenosti($vrijednosti_konfiguracije['trajanje_sesije']);
$broj_neuspjesnih_prijava = provjeraPostavljenosti($vrijednosti_konfiguracije['broj_neuspjesnih_prijava']);
$pomak = provjeraPostavljenosti($vrijednosti_konfiguracije['pomak']);
$broj_sudskih_postupaka = provjeraPostavljenosti($vrijednosti_konfiguracije['broj_sudskih_postupaka']);
$broj_zahtjeva = provjeraPostavljenosti($vrijednosti_konfiguracije['broj_zahtjeva']);
$broj_odgovora = provjeraPostavljenosti($vrijednosti_konfiguracije['broj_odgovora']);
$istek_verifikacije = provjeraPostavljenosti($vrijednosti_konfiguracije['istek_verifikacije']);

$string = "";
$dat = fopen("./css/fsabolic.css", "r");
while (($line = fgets($dat)) != false) {
    $string .= "$line";
}
if (!isset($_POST['spremi-css-tekst'])) {
    $sig_ime = "./css/sigurnosna_kopija_tekstualna.css";
    $sigurnosna_kopija = fopen($sig_ime, "w");
    file_put_contents($sig_ime, $string);
    fclose($sigurnosna_kopija);
}
$smarty->assign("greske_klasa", $greske_klasa);
$smarty->assign("css_greske", $greske);
$smarty->assign("trajanje_kolacica", $trajanje_kolacica);
$smarty->assign("broj_stranica_stranicenja", $broj_stranica_stranicenja);
$smarty->assign("trajanje_sesije", $trajanje_sesije);
$smarty->assign("broj_neuspjesnih_prijava", $broj_neuspjesnih_prijava);
$smarty->assign("pomak", $pomak);
$smarty->assign("broj_sudskih_postupaka", $broj_sudskih_postupaka);
$smarty->assign("broj_zahtjeva", $broj_zahtjeva);
$smarty->assign("broj_odgovora", $broj_odgovora);
$smarty->assign("istek_verifikacije", $istek_verifikacije);

$smarty->assign("css", $string);

$smarty->display("upravljanje_konfiguracijom.tpl");
$smarty->display("podnozje.tpl");

