<?php

$naslov = "Registracija";

$direktorij = dirname(getcwd());
$putanja = dirname(dirname($_SERVER["REQUEST_URI"]));

include_once "$direktorij/zaglavlje.php";
include_once "$direktorij/skripte/opcenito_funkcije.php";
include_once "$direktorij/klase/baza.class.php";

if (Sesija::korisnikJeKreiran()) {
    header("Location: ../index.php");
}

$smarty->assign("korisnicko_ime_registracija", "");
$smarty->assign("ime_prezime_registracija", "");
$smarty->assign("email_registracija", "");
$smarty->assign("lozinka_registracija", "");
$smarty->assign("ponovljena_lozinka_registracija", "");
$greske = array();

if (isset($_POST['registriraj_se'])) {
    $korisnicko_ime = filter_input(INPUT_POST, "korisnicko_ime", FILTER_SANITIZE_STRING);
    $ime_prezime = filter_input(INPUT_POST, "ime_prezime", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
    $lozinka = filter_input(INPUT_POST, "lozinka", FILTER_SANITIZE_STRING);
    $ponovljena_lozinka = filter_input(INPUT_POST, "ponovljena_lozinka", FILTER_SANITIZE_STRING);
    $captcha = $_POST['g-recaptcha-response'];

    $smarty->assign("korisnicko_ime_registracija", htmlspecialchars($korisnicko_ime));
    $smarty->assign("ime_prezime_registracija", htmlspecialchars($ime_prezime));
    $smarty->assign("email_registracija", htmlspecialchars($email));
    $smarty->assign("lozinka_registracija", htmlspecialchars($lozinka));
    $smarty->assign("ponovljena_lozinka_registracija", htmlspecialchars($ponovljena_lozinka));

    $polje_unosa = array("korisnicko_ime" => $korisnicko_ime, "ime_prezime" => $ime_prezime, "email" => $email, "lozinka" => $lozinka, "ponovljena_lozinka" => $ponovljena_lozinka);


    if (!captchaUspjela()) {
        $greske['captcha'] = 'Captcha - Niste označili CAPTCHA autentikaciju!';
    }

    foreach ($polje_unosa as $unos => $vrijednost) {
        if (prazanUnos($vrijednost)) {
            $greske[$unos] = parseCitljivost($unos) . " - Nije unesena vrijednost";
        } else {
            $uspjeh;
            $regularni_izraz;
            switch ($unos) {
                case "korisnicko_ime":
                    $uspjeh = dovoljanBrojZnakova(5, 50, $vrijednost);
                    $regularni_izraz = '/^([^-]|[a-z,A-Z,0-9,ČĆŽĐŠčćžđš,_])[a-z,A-Z,0-9,ČĆŽĐŠčćžđš,_,-]{4,50}$/';
                    if ($uspjeh !== true) {
                        $greske[$unos] = parseCitljivost($unos) . " - " . $uspjeh;
                    } elseif (!preg_match($regularni_izraz, $vrijednost)) {
                        $greske[$unos] = parseCitljivost($unos) . " - Korisničko ime se smije sastojati samo od malih i velikih slova, brojeva te znakova '-' i '_' s time da ne smije počinjati znakom '-'";
                    }
                    break;
                case "ime_prezime":
                    $uspjeh = dovoljanBrojZnakova(0, 50, $vrijednost);
                    $regularni_izraz = '/^(([A-Z,ČĆŽĐŠ][a-z,čćžđš]{1,})(([ ]|[-])([A-Z,ČĆŽĐŠ][a-z,čćžđš]{1,}))?)[ ](([A-Z,ČĆŽĐŠ][a-z,čćžđš]{1,})(([ ]|[-])([A-Z,ČĆŽĐŠ][a-z,čćžđš]{1,}))?)$/i';
                    if ($uspjeh !== true) {
                        $greske[$unos] = parseCitljivost($unos) . " - " . $uspjeh;
                    } elseif (!preg_match($regularni_izraz, $vrijednost)) {
                        $greske[$unos] = parseCitljivost($unos) . " - Format imena i prezimena mora biti Ime[[-|' ']Ime] Prezime[[-|' ']Prezime]";
                    }
                    break;
                case "email":
                    $uspjeh = dovoljanBrojZnakova(10, 50, $vrijednost);
                    $regularni_izraz = '/^([A-Z,a-z,ČĆŽĐŠčćžđš][a-z,A-Z,0-9,ČĆŽĐŠčćžđš,_,-]{2,}@[a-z]{2,}[.][a-z][a-z]{1,})$/';
                    if ($uspjeh !== true) {
                        $greske[$unos] = parseCitljivost($unos) . " - " . $uspjeh;
                    } elseif (!preg_match($regularni_izraz, $vrijednost)) {
                        $greske[$unos] = parseCitljivost($unos) . " - E-mail mora biti u formatu 'korime@imedomene.domena'";
                    }
                    break;
                case "lozinka":
                    $uspjeh = dovoljanBrojZnakova(8, 50, $vrijednost);
                    $regularni_izraz = '/^(?=((.*[0-9]){2,}))(?=((.*[A-ZČĆŽĐŠ]){2,}))(?=((.*[a-z,čćžđš]){2,})).{8,50}$/';
                    if ($uspjeh !== true) {
                        $greske[$unos] = parseCitljivost($unos) . " - " . $uspjeh;
                    } elseif (!preg_match($regularni_izraz, $vrijednost)) {
                        $greske[$unos] = parseCitljivost($unos) . " - Lozinka mora imati barem 2 mala slova, 2 velika slova i 2 broja";
                    }
                    break;
                case "ponovljena_lozinka":
                    if ($vrijednost !== $lozinka) {
                        $greske[$unos] = parseCitljivost($unos) . " - Ponovljena lozinka se ne podudara s lozinkom";
                    }
                    break;
            }
        }
    }
    if (count($greske) === 0) {
        $konfiguracija = new Konfiguracija($direktorij);
        $datum_vrijeme_registracije = $konfiguracija->virtualnoVrijeme();
        $uvjeti_koristenja = $konfiguracija->virtualnoVrijeme();
        $aktivacijski_kod = aktivacijskiKod();

        $atributi = array(
            "korisnicko_ime" => $korisnicko_ime,
            "ime_prezime" => $ime_prezime,
            "email" => $email,
            "lozinka" => $lozinka,
            "datum_vrijeme_registracije" => $datum_vrijeme_registracije,
            "uvjeti_koristenja" => $uvjeti_koristenja,
            "aktivacijski_kod" => $aktivacijski_kod,
        );

        $baza = new Baza();
        $baza->spojiDB();
        $baza->korisnik_spremi($atributi);
        $baza->zatvoriDB();

        verifikacijskiMail($email, $korisnicko_ime, $aktivacijski_kod, $datum_vrijeme_registracije);

        $baza->spojiDB();
        $baza->dnevnik_ostale_radnje("Registracija");
        $baza->zatvoriDB();

        header("Location: $putanja/index.php");
    }
}

$smarty->assign("greske_registracija", $greske);

$smarty->display("registracija.tpl");
$smarty->display("podnozje.tpl");

function captchaUspjela() {
    if (empty($_POST['g-recaptcha-response'])) {
        return false;
    } else {
        $secret_key = '6LeMXy8gAAAAAHf_gaKjbPcLHBskDjAwKlXG1fyo';

        $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $_POST['g-recaptcha-response']);

        $response_data = json_decode($response);

        if (!$response_data->success) {
            return false;
        }
        return true;
    }
}
