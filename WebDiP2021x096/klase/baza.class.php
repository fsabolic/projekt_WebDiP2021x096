<?php

$direktorij = isset($direktorij) ? $direktorij : dirname(getcwd());

include_once "$direktorij/skripte/opcenito_funkcije.php";

include_once "$direktorij/klase/konfiguracija.class.php";
include_once "$direktorij/klase/sesija.class.php";

class Baza {

//    const server = "localhost";
//    const korisnik = "root"; //WebDiP2021x096
//    const lozinka = ""; //admin_SXFZ
//    const baza = "odvjetnicki_ured"; //WebDiP2021x096

    const server = "localhost";
    const korisnik = "WebDiP2021x096";
    const lozinka = "admin_SXFZ";
    const baza = "WebDiP2021x096";

    private $veza = null;
    private $greska = '';

    function spojiDB() {
        $this->veza = new mysqli(self::server, self::korisnik, self::lozinka, self::baza);
        if ($this->veza->connect_errno) {
            echo "Neuspješno spajanje na bazu: " . $this->veza->connect_errno . ", " .
            $this->veza->connect_error;
            $this->greska = $this->veza->connect_error;
        }
        $this->veza->set_charset("utf8");
        if ($this->veza->connect_errno) {
            echo "Neuspješno postavljanje znakova za bazu: " . $this->veza->connect_errno . ", " .
            $this->veza->connect_error;
            $this->greska = $this->veza->connect_error;
        }
        return $this->veza;
    }

    function zatvoriDB() {
        @$this->veza->close();
    }

//    function selectDB($upit) {
//        $rezultat = $this->veza->query($upit);
//        if ($this->veza->connect_errno) {
//            echo "Greška kod upita: {$upit} - " . $this->veza->connect_errno . ", " .
//            $this->veza->connect_error;
//            $this->greska = $this->veza->connect_error;
//        }
//        if (!$rezultat) {
//            $rezultat = null;
//        }
//        return $rezultat;
//    }
//
//    function updateDB($upit, $skripta = '') {
//        $rezultat = $this->veza->query($upit);
//        if ($this->veza->connect_errno) {
//            echo "Greška kod upita: {$upit} - " . $this->veza->connect_errno . ", " .
//            $this->veza->connect_error;
//            $this->greska = $this->veza->connect_error;
//        } else {
//            if ($skripta != '') {
//                header("Location: $skripta");
//            }
//        }
//
//        return $rezultat;
//    }
//
//    function pogreskaDB() {
//        if ($this->greska != '') {
//            return true;
//        } else {
//            return false;
//        }
//    }

    function dnevnik_prijava_odjava($radnja) {
        Sesija::kreirajSesiju();
        if (Sesija::korisnikJeKreiran()) {
            global $direktorij;
            $konfiguracija = new Konfiguracija($direktorij);

            $veza = $this->veza;
            $datum_vrijeme = date("Y-m-d H:i:s", strtotime($konfiguracija->virtualnoVrijeme()));
            $tip_zapisa_id = 1;
            $korisnik_id = isset($_SESSION['korisnik_id']) ? $_SESSION['korisnik_id'] : -1;

            $statement = $veza->prepare("INSERT INTO dnevnik (radnja,datum_vrijeme,tip_zapisa_id,korisnik_id) VALUES (?,?,?,?)");
            $statement->bind_param("ssii", $radnja, $datum_vrijeme, $tip_zapisa_id, $korisnik_id);

            $statement->execute();
        }
    }

    function dnevnik_rad_s_bazom($veza, $upit) {
        Sesija::kreirajSesiju();
        if (Sesija::korisnikJeKreiran()) {
            global $direktorij;
            $konfiguracija = new Konfiguracija($direktorij);

            $datum_vrijeme = date("Y-m-d H:i:s", strtotime($konfiguracija->virtualnoVrijeme()));
            $tip_zapisa_id = 2;
            $korisnik_id = isset($_SESSION['korisnik_id']) ? $_SESSION['korisnik_id'] : -1;

            $statement = $veza->prepare("INSERT INTO dnevnik (upit,datum_vrijeme,tip_zapisa_id,korisnik_id) VALUES (?,?,?,?)");
            $statement->bind_param("ssii", $upit, $datum_vrijeme, $tip_zapisa_id, $korisnik_id);

            $statement->execute();
        }
    }

    function dnevnik_ostale_radnje($radnja) {
        Sesija::kreirajSesiju();
        if (Sesija::korisnikJeKreiran()) {
            global $direktorij;
            $konfiguracija = new Konfiguracija($direktorij);

            $veza = $this->veza;
            $datum_vrijeme = date("Y-m-d H:i:s", strtotime($konfiguracija->virtualnoVrijeme()));
            $tip_zapisa_id = 3;
            $korisnik_id = isset($_SESSION['korisnik_id']) ? $_SESSION['korisnik_id'] : -1;

            $statement = $veza->prepare("INSERT INTO dnevnik (radnja,datum_vrijeme,tip_zapisa_id,korisnik_id) VALUES (?,?,?,?)");
            $statement->bind_param("ssii", $radnja, $datum_vrijeme, $tip_zapisa_id, $korisnik_id);

            $statement->execute();
        }
    }

    function dohvatiTablicu($naziv_tablice) {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "SELECT * FROM $naziv_tablice");
        $statement = $veza->prepare("SELECT * FROM $naziv_tablice");
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function obrana_obrisi($obrana_id) {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "DELETE FROM obrana WHERE obrana_id=$obrana_id");
        $statement = $veza->prepare("DELETE FROM obrana WHERE obrana_id=?");
        $statement->bind_param("i", $obrana_id);
        $statement->execute();
    }

    function kategorija_obrisi($kategorija_sudskog_postupka_id) {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "DELETE FROM kategorija_sudskog_postupka WHERE kategorija_sudskog_postupka_id=$kategorija_sudskog_postupka_id");
        $statement = $veza->prepare("DELETE FROM kategorija_sudskog_postupka WHERE kategorija_sudskog_postupka_id=?");
        $statement->bind_param("i", $kategorija_sudskog_postupka_id);
        $statement->execute();
    }

    function zahtjev_obrisi($zahtjev_id) {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "DELETE FROM zahtjev_za_odvjetnikom WHERE zahtjev_id=$zahtjev_id");
        $statement = $veza->prepare("DELETE FROM zahtjev_za_odvjetnikom WHERE zahtjev_id=?");
        $statement->bind_param("i", $zahtjev_id);
        $statement->execute();
    }

    function sudski_postupak_obrisi($sudski_postupak_id) {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "DELETE FROM sudski_postupak WHERE sudski_postupak_id=$sudski_postupak_id");
        $statement = $veza->prepare("DELETE FROM sudski_postupak WHERE sudski_postupak_id=?");
        $statement->bind_param("i", $sudski_postupak_id);
        $statement->execute();
    }

    function korisnik_spremi($atributi) {
        $korisnicko_ime = $atributi['korisnicko_ime'];
        $ime_prezime = $atributi['ime_prezime'];
        $email = $atributi['email'];
        $lozinka = $atributi['lozinka'];

        $sha256 = sha256($lozinka);

        $lozinka_sha256 = $sha256['sha256'];
        $sol = $sha256['sol'];
        $datum_vrijeme_registracije = $atributi['datum_vrijeme_registracije'];
        $uvjeti_koristenja = $atributi['uvjeti_koristenja'];
        $aktivacijski_kod = $atributi['aktivacijski_kod'];
        $uloga_id = 2;

        $veza = $this->veza;

        $this->dnevnik_rad_s_bazom($veza, "INSERT INTO korisnik (korisnicko_ime,ime_prezime,email,lozinka,lozinka_sha256,sol,datum_vrijeme_registracije,uvjeti_koristenja,aktivacijski_kod,uloga_id) VALUES ('$korisnicko_ime', '$ime_prezime', '$email', '$lozinka', '$lozinka_sha256', '$sol', '$datum_vrijeme_registracije', '$uvjeti_koristenja', '$aktivacijski_kod', $uloga_id)");

        $statement = $veza->prepare("INSERT INTO korisnik (korisnicko_ime,ime_prezime,email,lozinka,lozinka_sha256,sol,datum_vrijeme_registracije,uvjeti_koristenja,aktivacijski_kod,uloga_id) VALUES (?,?,?,?,?,?,?,?,?,?)");
        $statement->bind_param("sssssssssi", $korisnicko_ime, $ime_prezime, $email, $lozinka, $lozinka_sha256, $sol, $datum_vrijeme_registracije, $uvjeti_koristenja, $aktivacijski_kod, $uloga_id);

        $statement->execute();
    }

    function korisnik_azuriraj_aktiviran($korisnicko_ime) {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "UPDATE korisnik SET aktiviran=1 WHERE korisnicko_ime='$korisnicko_ime'");
        $statement = $veza->prepare("UPDATE korisnik SET aktiviran=1 WHERE korisnicko_ime=?");
        $statement->bind_param("s", $korisnicko_ime);
        $statement->execute();
    }

    function korisnik_azuriraj_blokiran($korisnicko_ime, $int) {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "UPDATE korisnik SET blokiran=$int WHERE korisnicko_ime='$korisnicko_ime'");
        $statement = $veza->prepare("UPDATE korisnik SET blokiran=? WHERE korisnicko_ime=?");
        $statement->bind_param("is", $int, $korisnicko_ime);
        $statement->execute();
    }

    function korisnik_dohvati_aktivacijski_kod($korisnicko_ime, $aktivacijski_kod) {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "SELECT datum_vrijeme_registracije,aktiviran FROM korisnik WHERE korisnicko_ime='$korisnicko_ime' AND aktivacijski_kod='$aktivacijski_kod'");
        $statement = $veza->prepare("SELECT datum_vrijeme_registracije,aktiviran FROM korisnik WHERE korisnicko_ime=? AND aktivacijski_kod=?");
        $statement->bind_param("ss", $korisnicko_ime, $aktivacijski_kod);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function korisnik_obrisi($korisnicko_ime) {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "DELETE FROM korisnik WHERE korisnicko_ime='$korisnicko_ime'");
        $statement = $veza->prepare("DELETE FROM korisnik WHERE korisnicko_ime=?");
        $statement->bind_param("s", $korisnicko_ime);
        $statement->execute();
    }

    function korisnik_dohvati_zasticeno() {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "SELECT * FROM korisnik");
        $statement = $veza->prepare("SELECT * FROM korisnik");
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function korisnik_dohvati_prijava($korisnicko_ime) {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "SELECT korisnicko_ime,lozinka_sha256,sol FROM korisnik WHERE korisnicko_ime='$korisnicko_ime'");
        $statement = $veza->prepare("SELECT korisnicko_ime,lozinka_sha256,sol FROM korisnik WHERE korisnicko_ime=?");
        $statement->bind_param("s", $korisnicko_ime);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function korisnik_dohvati($korisnicko_ime) {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "SELECT * FROM korisnik WHERE korisnicko_ime='$korisnicko_ime'");
        $statement = $veza->prepare("SELECT * FROM korisnik WHERE korisnicko_ime=?");
        $statement->bind_param("s", $korisnicko_ime);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function korisnik_azuriraj_pokusaji_prijave_increment($korisnicko_ime) {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "UPDATE korisnik SET pokusaji_prijave=pokusaji_prijave+1 WHERE korisnicko_ime='$korisnicko_ime'");
        $statement = $veza->prepare("UPDATE korisnik SET pokusaji_prijave=pokusaji_prijave+1 WHERE korisnicko_ime=?");
        $statement->bind_param("s", $korisnicko_ime);
        $statement->execute();
    }

    function korisnik_azuriraj_pokusaji_prijave_reset($korisnicko_ime) {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "UPDATE korisnik SET pokusaji_prijave=0 WHERE korisnicko_ime='$korisnicko_ime'");
        $statement = $veza->prepare("UPDATE korisnik SET pokusaji_prijave=0 WHERE korisnicko_ime=?");
        $statement->bind_param("s", $korisnicko_ime);
        $statement->execute();
    }

    function korisnik_azuriraj_lozinka($korisnicko_ime, $lozinka, $sol, $lozinka_sha256) {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "UPDATE korisnik SET lozinka='$lozinka', lozinka_sha256='$lozinka_sha256',sol='$sol' WHERE korisnicko_ime='$korisnicko_ime'");
        $statement = $veza->prepare("UPDATE korisnik SET lozinka=?, lozinka_sha256=?,sol=? WHERE korisnicko_ime=?");
        $statement->bind_param("ssss", $lozinka, $lozinka_sha256, $sol, $korisnicko_ime);
        $statement->execute();
    }

    function korisnik_azuriraj_uvjeti_koristenja($korisnicko_ime, $datum) {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "UPDATE korisnik SET uvjeti_koristenja='$datum' WHERE korisnicko_ime='$korisnicko_ime'");
        $statement = $veza->prepare("UPDATE korisnik SET uvjeti_koristenja=? WHERE korisnicko_ime=?");
        $statement->bind_param("ss", $datum, $korisnicko_ime);
        $statement->execute();
    }

    function korisnik_azuriraj_uvjeti_koristenja_svi($datum) {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "UPDATE korisnik SET uvjeti_koristenja='$datum'");
        $statement = $veza->prepare("UPDATE korisnik SET uvjeti_koristenja=?");
        $statement->bind_param("s", $datum);
        $statement->execute();
    }

    function korisnik_dohvati_sve_osim($korisnik_id) {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "SELECT korisnik_id,korisnicko_ime,ime_prezime FROM korisnik WHERE korisnik_id<>$korisnik_id ORDER BY ime_prezime");
        $statement = $veza->prepare("SELECT korisnik_id,korisnicko_ime,ime_prezime FROM korisnik WHERE korisnik_id<>? ORDER BY ime_prezime");
        $statement->bind_param("i", $korisnik_id);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function kategorija_sudskog_postupka_dohvati($kategorija_sudskog_postupka_id) {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "SELECT * FROM kategorija_sudskog_postupka WHERE kategorija_sudskog_postupka_id=$kategorija_sudskog_postupka_id");
        $statement = $veza->prepare("SELECT * FROM kategorija_sudskog_postupka WHERE kategorija_sudskog_postupka_id=?");
        $statement->bind_param("i", $kategorija_sudskog_postupka_id);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function sudski_postupak_spremi($atributi) {
        $naziv = $atributi['naziv'];
        $protuzakonita_radnja = $atributi['protuzakonita_radnja'];
        $dokaz = $atributi['dokaz'];
        $datum_vrijeme_pocetka = $atributi['datum_vrijeme_pocetka'];
        $status = $atributi['status'];
        $klijent_id = $atributi['klijent_id'];
        $tuzitelj_id = $atributi['tuzitelj_id'];
        $kategorija_sudskog_postupka_id = $atributi['kategorija_sudskog_postupka_id'];

        $veza = $this->veza;

        $this->dnevnik_rad_s_bazom($veza, "INSERT INTO sudski_postupak (naziv,protuzakonita_radnja,dokaz,datum_vrijeme_pocetka,status,klijent_id,tuzitelj_id,kategorija_sudskog_postupka_id) VALUES (?,?,?,?,?,?,?,?)");
        $statement = $veza->prepare("INSERT INTO sudski_postupak (naziv,protuzakonita_radnja,dokaz,datum_vrijeme_pocetka,status,klijent_id,tuzitelj_id,kategorija_sudskog_postupka_id) VALUES ('$naziv', '$protuzakonita_radnja', '$dokaz', '$datum_vrijeme_pocetka', $status, $klijent_id, $tuzitelj_id, $kategorija_sudskog_postupka_id)");
        $statement->bind_param("ssssiiii", $naziv, $protuzakonita_radnja, $dokaz, $datum_vrijeme_pocetka, $status, $klijent_id, $tuzitelj_id, $kategorija_sudskog_postupka_id);

        $statement->execute();
    }

    function sudski_postupak_dohvati_napravljene($korisnik_id, $limit, $offset, $atribut_za_sortiranje = null, $smjer_sortiranja = null, $atribut_za_pretrazivanje = null, $vrijednost_za_pretrazivanje = null) {
        $upit = "SELECT sp.sudski_postupak_id,sp.naziv, sp.protuzakonita_radnja, sp.dokaz, sp.datum_vrijeme_pocetka, sp.datum_vrijeme_zavrsetka,  sp.zakljucak_postupka, sp.status, k.korisnicko_ime, k.ime_prezime, sp.klijent_id, sp.tuzitelj_id FROM sudski_postupak sp JOIN korisnik k on k.korisnik_id=sp.klijent_id WHERE tuzitelj_id=?";
        $vrijednost_za_pretrazivanje = "%$vrijednost_za_pretrazivanje%";
        $veza = $this->veza;
        if ($atribut_za_pretrazivanje != null && $atribut_za_sortiranje != null) {
            switch ($atribut_za_pretrazivanje) {
                case "sp.protuzakonita_radnja":
                    $upit .= " AND sp.protuzakonita_radnja LIKE ?";
                    break;
                case "sp.sudski_postupak_id":
                    $upit .= " AND sp.sudski_postupak_id LIKE ?";
                    break;
                case "sp.naziv":
                    $upit .= " AND sp.naziv LIKE ?";
                    break;
                case "sp.dokaz":
                    $upit .= " AND sp.dokaz LIKE ?";
                    break;
                case "sp.datum_vrijeme_pocetka":
                    $upit .= " AND sp.datum_vrijeme_pocetka LIKE ?";
                    break;
                case "k.ime_prezime":
                    $upit .= " AND k.ime_prezime LIKE ?";
                    break;
            }
            switch ($atribut_za_sortiranje) {
                case "sp.sudski_postupak_id":
                    $upit .= " ORDER BY sp.sudski_postupak_id";
                    break;
                case "sp.naziv":
                    $upit .= " ORDER BY sp.naziv";
                    break;
                case "sp.protuzakonita_radnja":
                    $upit .= " ORDER BY sp.protuzakonita_radnja";
                    break;
                case "sp.dokaz":
                    $upit .= " ORDER BY sp.dokaz";
                    break;
                case "sp.datum_vrijeme_pocetka":
                    $upit .= " ORDER BY sp.datum_vrijeme_pocetka";
                    break;
                case "sp.datum_vrijeme_zavrsetka":
                    $upit .= " ORDER BY sp.datum_vrijeme_zavrsetka";
                    break;
                case "sp.zakljucak_postupka":
                    $upit .= " ORDER BY sp.zakljucak_postupka";
                    break;
                case "sp.status":
                    $upit .= " ORDER BY sp.status";
                    break;
                case "k.korisnicko_ime":
                    $upit .= " ORDER BY k.korisnicko_ime";
                    break;
                case "k.ime_prezime":
                    $upit .= " ORDER BY k.ime_prezime";
                    break;
            }
            if ($smjer_sortiranja == "ASC") {
                $upit .= " ASC";
            } else {
                $upit .= " DESC";
            }
            $upit .= " LIMIT ? OFFSET ?";
            $this->dnevnik_rad_s_bazom($veza, "SELECT sp.sudski_postupak_id,sp.naziv, sp.protuzakonita_radnja, sp.dokaz, sp.datum_vrijeme_pocetka, sp.datum_vrijeme_zavrsetka,  sp.zakljucak_postupka, sp.status, k.korisnicko_ime, k.ime_prezime, sp.klijent_id, sp.tuzitelj_id FROM sudski_postupak sp JOIN korisnik k on k.korisnik_id=sp.klijent_id WHERE tuzitelj_id=$korisnik_id AND $atribut_za_pretrazivanje LIKE '$vrijednost_za_pretrazivanje' ORDER BY $atribut_za_sortiranje LIMIT $limit OFFSET $offset");
            $statement = $veza->prepare($upit);
            $statement->bind_param("isii", $korisnik_id, $vrijednost_za_pretrazivanje, $limit, $offset);
        } elseif ($atribut_za_sortiranje != null) {
            switch ($atribut_za_sortiranje) {
                case "sp.sudski_postupak_id":
                    $upit .= " ORDER BY sp.sudski_postupak_id";
                    break;
                case "sp.naziv":
                    $upit .= " ORDER BY sp.naziv";
                    break;
                case "sp.protuzakonita_radnja":
                    $upit .= " ORDER BY sp.protuzakonita_radnja";
                    break;
                case "sp.dokaz":
                    $upit .= " ORDER BY sp.dokaz";
                    break;
                case "sp.datum_vrijeme_pocetka":
                    $upit .= " ORDER BY sp.datum_vrijeme_pocetka";
                    break;
                case "sp.datum_vrijeme_zavrsetka":
                    $upit .= " ORDER BY sp.datum_vrijeme_zavrsetka";
                    break;
                case "sp.zakljucak_postupka":
                    $upit .= " ORDER BY sp.zakljucak_postupka";
                    break;
                case "sp.status":
                    $upit .= " ORDER BY sp.status";
                    break;
                case "k.korsnicko_ime":
                    $upit .= " ORDER BY k.korsnicko_ime";
                    break;
                case "k.ime_prezime":
                    $upit .= " ORDER BY k.ime_prezime";
                    break;
            }
            if ($smjer_sortiranja == "ASC") {
                $upit .= " ASC";
            } else {
                $upit .= " DESC";
            }
            $upit .= " LIMIT ? OFFSET ?";
            $this->dnevnik_rad_s_bazom($veza, "SELECT sp.sudski_postupak_id,sp.naziv, sp.protuzakonita_radnja, sp.dokaz, sp.datum_vrijeme_pocetka, sp.datum_vrijeme_zavrsetka,  sp.zakljucak_postupka, sp.status, k.korisnicko_ime, k.ime_prezime, sp.klijent_id, sp.tuzitelj_id FROM sudski_postupak sp JOIN korisnik k on k.korisnik_id=sp.klijent_id WHERE tuzitelj_id=$korisnik_id ORDER BY $atribut_za_sortiranje LIMIT $limit OFFSET $offset");
            $statement = $veza->prepare($upit);
            $statement->bind_param("iii", $korisnik_id, $limit, $offset);
        } else if ($atribut_za_pretrazivanje != null) {
            switch ($atribut_za_pretrazivanje) {
                case "sp.protuzakonita_radnja":
                    $upit .= " AND sp.protuzakonita_radnja LIKE ?";
                    break;
                case "sp.sudski_postupak_id":
                    $upit .= " AND sp.sudski_postupak_id LIKE ?";
                    break;
                case "sp.naziv":
                    $upit .= " AND sp.naziv LIKE ?";
                    break;
                case "sp.dokaz":
                    $upit .= " AND sp.dokaz LIKE ?";
                    break;
                case "sp.datum_vrijeme_pocetka":
                    $upit .= " AND sp.datum_vrijeme_pocetka LIKE ?";
                    break;
                case "k.ime_prezime":
                    $upit .= " AND k.ime_prezime LIKE ?";
                    break;
            }
            $upit .= " LIMIT ? OFFSET ?";
            $this->dnevnik_rad_s_bazom($veza, "SELECT sp.sudski_postupak_id,sp.naziv, sp.protuzakonita_radnja, sp.dokaz, sp.datum_vrijeme_pocetka, sp.datum_vrijeme_zavrsetka,  sp.zakljucak_postupka, sp.status, k.korisnicko_ime, k.ime_prezime, sp.klijent_id, sp.tuzitelj_id FROM sudski_postupak sp JOIN korisnik k on k.korisnik_id=sp.klijent_id WHERE tuzitelj_id=$korisnik_id AND $atribut_za_pretrazivanje LIKE '$vrijednost_za_pretrazivanje' LIMIT $limit OFFSET $offset");
            $statement = $veza->prepare($upit);
            $statement->bind_param("isii", $korisnik_id, $vrijednost_za_pretrazivanje, $limit, $offset);
        } else {
            $upit .= " LIMIT ? OFFSET ?";
            $this->dnevnik_rad_s_bazom($veza, "SELECT sp.sudski_postupak_id,sp.naziv, sp.protuzakonita_radnja, sp.dokaz, sp.datum_vrijeme_pocetka, sp.datum_vrijeme_zavrsetka,  sp.zakljucak_postupka, sp.status, k.korisnicko_ime, k.ime_prezime, sp.klijent_id, sp.tuzitelj_id FROM sudski_postupak sp JOIN korisnik k on k.korisnik_id=sp.klijent_id WHERE tuzitelj_id=$korisnik_id LIMIT $limit OFFSET $offset");
            $statement = $veza->prepare($upit);
            $statement->bind_param("iii", $korisnik_id, $limit, $offset);
        }
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function sudski_postupak_dohvati_tuzitelj_id_sudski_postupak_id($tuzitelj_id, $sudski_postupak_id) {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "SELECT * FROM sudski_postupak WHERE tuzitelj_id=$tuzitelj_id AND sudski_postupak_id=$sudski_postupak_id");
        $statement = $veza->prepare("SELECT * FROM sudski_postupak WHERE tuzitelj_id=? AND sudski_postupak_id=?");
        $statement->bind_param("ii", $tuzitelj_id, $sudski_postupak_id);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function dohvati_broj_redova_tablice($upit_za_tablicu) {
        $veza = $this->veza;
        $cijeli_upit = "SELECT COUNT(*) AS 'broj' FROM " . $upit_za_tablicu;
        $this->dnevnik_rad_s_bazom($veza, $cijeli_upit);
        $statement = $veza->prepare($cijeli_upit);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC)[0]['broj'];
    }

    function korisnik_dohvati_korisnik_id($korisnik_id) {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "SELECT korisnik_id,korisnicko_ime,ime_prezime FROM korisnik WHERE korisnik_id=$korisnik_id");
        $statement = $veza->prepare("SELECT korisnik_id,korisnicko_ime,ime_prezime FROM korisnik WHERE korisnik_id=?");
        $statement->bind_param("i", $korisnik_id);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function sudski_postupak_azuriraj($sudski_postupak_id, $atributi) {
        $naziv = (!isset($atributi['naziv'])) ? null : $atributi['naziv'];
        $protuzakonita_radnja = (!isset($atributi['protuzakonita_radnja'])) ? null : $atributi['protuzakonita_radnja'];
        $dokaz = (!isset($atributi['dokaz'])) ? null : $atributi['dokaz'];
        $datum_vrijeme_pocetka = (!isset($atributi['datum_vrijeme_pocetka'])) ? null : $atributi['datum_vrijeme_pocetka'];
        $datum_vrijeme_zavrsetka = (!isset($atributi['datum_vrijeme_zavrsetka'])) ? null : $atributi['datum_vrijeme_zavrsetka'];
        $zakljucak_postupka = (!isset($atributi['zakljucak_postupka'])) ? null : $atributi['zakljucak_postupka'];
        $status = (!isset($atributi['status'])) ? null : $atributi['status'];
        $klijent_id = (!isset($atributi['klijent_id'])) ? null : $atributi['klijent_id'];
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "UPDATE sudski_postupak SET naziv='$naziv',protuzakonita_radnja='$protuzakonita_radnja',dokaz='$dokaz',datum_vrijeme_pocetka='$datum_vrijeme_pocetka',datum_vrijeme_zavrsetka='$datum_vrijeme_zavrsetka', zakljucak_postupka='$zakljucak_postupka',status=$status,klijent_id=$klijent_id WHERE sudski_postupak_id=$sudski_postupak_id");
        $statement = $veza->prepare("UPDATE sudski_postupak SET naziv=?,protuzakonita_radnja=?,dokaz=?,datum_vrijeme_pocetka=?,datum_vrijeme_zavrsetka=?, zakljucak_postupka=?,status=?,klijent_id=? WHERE sudski_postupak_id=?");
        $statement->bind_param("sssssiiii", $naziv, $protuzakonita_radnja, $dokaz, $datum_vrijeme_pocetka, $datum_vrijeme_zavrsetka, $zakljucak_postupka, $status, $klijent_id, $sudski_postupak_id);
        $statement->execute();
    }

    function sudski_postupak_dohvati_sve_korisnikove($korisnik_id) {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "SELECT sudski_postupak_id,naziv FROM sudski_postupak WHERE klijent_id=$korisnik_id ORDER BY naziv");
        $statement = $veza->prepare("SELECT sudski_postupak_id,naziv FROM sudski_postupak WHERE klijent_id=? ORDER BY naziv");
        $statement->bind_param("i", $korisnik_id);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function korisnik_dohvati_sve_odvjetnike_osim_ciji_je_sudski_postupak($tuzitelj_id) {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "SELECT DISTINCT k.korisnik_id,k.ime_prezime,k.kategorija_sudskog_postupka_id FROM korisnik k LEFT JOIN sudski_postupak sp ON sp.tuzitelj_id=k.korisnik_id WHERE (sp.tuzitelj_id<>$tuzitelj_id OR sp.sudski_postupak_id IS NULL) AND k.uloga_id>2 AND k.kategorija_sudskog_postupka_id IN (SELECT kategorija_sudskog_postupka_id FROM korisnik WHERE korisnik_id=$tuzitelj_id)");
        $statement = $veza->prepare("SELECT DISTINCT k.korisnik_id,k.ime_prezime,k.kategorija_sudskog_postupka_id FROM korisnik k LEFT JOIN sudski_postupak sp ON sp.tuzitelj_id=k.korisnik_id WHERE (sp.tuzitelj_id<>? OR sp.sudski_postupak_id IS NULL) AND k.uloga_id>2 AND k.kategorija_sudskog_postupka_id IN (SELECT kategorija_sudskog_postupka_id FROM korisnik WHERE korisnik_id=?)");
        $statement->bind_param("ii", $tuzitelj_id, $tuzitelj_id);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function sudski_postupak_dohvati_id($sudski_postupak_id) {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "SELECT * FROM sudski_postupak WHERE sudski_postupak_id=$sudski_postupak_id");
        $statement = $veza->prepare("SELECT * FROM sudski_postupak WHERE sudski_postupak_id=?");
        $statement->bind_param("i", $sudski_postupak_id);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC)[0];
    }

    function zahtjev_za_odvjetnikom_spremi($atributi) {
        $slika_sudskog_postupka = $atributi['slika_sudskog_postupka'];
        $sudski_postupak_id = $atributi['sudski_postupak_id'];
        $odvjetnik_id = $atributi['odvjetnik_id'];
        $datum_vrijeme_slanja = $atributi['datum_vrijeme_slanja'];
        $status = $atributi['status'];
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "INSERT INTO zahtjev_za_odvjetnikom (slika_sudskog_postupka, datum_vrijeme_slanja, status, sudski_postupak_id, odvjetnik_id) VALUES ('$slika_sudskog_postupka', '$datum_vrijeme_slanja', $status, $sudski_postupak_id, $odvjetnik_id)");
        $statement = $veza->prepare("INSERT INTO zahtjev_za_odvjetnikom (slika_sudskog_postupka, datum_vrijeme_slanja, status, sudski_postupak_id, odvjetnik_id) VALUES (?,?,?,?,?)");
        $statement->bind_param("ssiii", $slika_sudskog_postupka, $datum_vrijeme_slanja, $status, $sudski_postupak_id, $odvjetnik_id);

        $statement->execute();
    }

    function zahtjev_za_odvjetnikom_dohvati_korisnikove($korisnik_id, $limit, $offset, $atribut_za_sortiranje = null, $smjer_sortiranja = null, $atribut_za_pretrazivanje = null, $vrijednost_za_pretrazivanje = null) {
        $upit = "SELECT z.zahtjev_id, z.slika_sudskog_postupka,z.datum_vrijeme_slanja,z.status,sp.naziv,k.ime_prezime FROM zahtjev_za_odvjetnikom z JOIN sudski_postupak sp ON z.sudski_postupak_id=sp.sudski_postupak_id JOIN korisnik k on k.korisnik_id=z.odvjetnik_id WHERE sp.klijent_id=?";
        $vrijednost_za_pretrazivanje = "%$vrijednost_za_pretrazivanje%";
        $veza = $this->veza;
        if ($atribut_za_pretrazivanje != null && $atribut_za_sortiranje != null) {
            switch ($atribut_za_pretrazivanje) {
                case "z.zahtjev_id":
                    $upit .= " AND z.zahtjev_id LIKE ?";
                    break;
                case "z.slika_sudskog_postupka":
                    $upit .= " AND z.slika_sudskog_postupka LIKE ?";
                    break;
                case "z.datum_vrijeme_slanja":
                    $upit .= " AND z.datum_vrijeme_slanja LIKE ?";
                    break;
                case "z.status":
                    $upit .= " AND z.status LIKE ?";
                    break;
                case "sp.naziv":
                    $upit .= " AND sp.naziv LIKE ?";
                    break;
                case "k.ime_prezime":
                    $upit .= " AND k.ime_prezime LIKE ?";
                    break;
            }
            switch ($atribut_za_sortiranje) {
                case "z.zahtjev_id":
                    $upit .= " ORDER BY z.zahtjev_id";
                    break;
                case "z.slika_sudskog_postupka":
                    $upit .= " ORDER BY z.slika_sudskog_postupka";
                    break;
                case "z.datum_vrijeme_slanja":
                    $upit .= " ORDER BY z.datum_vrijeme_slanja";
                    break;
                case "z.status":
                    $upit .= " ORDER BY z.status";
                    break;
                case "sp.naziv":
                    $upit .= " ORDER BY sp.naziv";
                    break;
                case "k.ime_prezime":
                    $upit .= " ORDER BY k.ime_prezime";
                    break;
            }
            if ($smjer_sortiranja == "ASC") {
                $upit .= " ASC";
            } else {
                $upit .= " DESC";
            }
            $upit .= " LIMIT ? OFFSET ?";
            $this->dnevnik_rad_s_bazom($veza, "SELECT z.zahtjev_id, z.slika_sudskog_postupka,z.datum_vrijeme_slanja,z.status,sp.naziv,k.ime_prezime FROM zahtjev_za_odvjetnikom z JOIN sudski_postupak sp ON z.sudski_postupak_id=sp.sudski_postupak_id JOIN korisnik k on k.korisnik_id=z.odvjetnik_id WHERE sp.klijent_id=$korisnik_id AND $atribut_za_pretrazivanje LIKE '$vrijednost_za_pretrazivanje' ORDER BY $atribut_za_sortiranje LIMIT $limit OFFSET $offset");
            $statement = $veza->prepare($upit);
            $statement->bind_param("isii", $korisnik_id, $vrijednost_za_pretrazivanje, $limit, $offset);
        } elseif ($atribut_za_sortiranje != null) {
            switch ($atribut_za_sortiranje) {
                case "z.zahtjev_id":
                    $upit .= " ORDER BY z.zahtjev_id";
                    break;
                case "z.slika_sudskog_postupka":
                    $upit .= " ORDER BY z.slika_sudskog_postupka";
                    break;
                case "z.datum_vrijeme_slanja":
                    $upit .= " ORDER BY z.datum_vrijeme_slanja";
                    break;
                case "z.status":
                    $upit .= " ORDER BY z.status";
                    break;
                case "sp.naziv":
                    $upit .= " ORDER BY sp.naziv";
                    break;
                case "k.ime_prezime":
                    $upit .= " ORDER BY k.ime_prezime";
                    break;
            }
            if ($smjer_sortiranja == "ASC") {
                $upit .= " ASC";
            } else {
                $upit .= " DESC";
            }
            $upit .= " LIMIT ? OFFSET ?";
            $this->dnevnik_rad_s_bazom($veza, "SELECT z.zahtjev_id, z.slika_sudskog_postupka,z.datum_vrijeme_slanja,z.status,sp.naziv,k.ime_prezime FROM zahtjev_za_odvjetnikom z JOIN sudski_postupak sp ON z.sudski_postupak_id=sp.sudski_postupak_id JOIN korisnik k on k.korisnik_id=z.odvjetnik_id WHERE sp.klijent_id=$korisnik_id ORDER BY $atribut_za_sortiranje LIMIT $limit OFFSET $offset");
            $statement = $veza->prepare($upit);
            $statement->bind_param("iii", $korisnik_id, $limit, $offset);
        } else if ($atribut_za_pretrazivanje != null) {
            switch ($atribut_za_pretrazivanje) {
                case "z.zahtjev_id":
                    $upit .= " AND z.zahtjev_id LIKE ?";
                    break;
                case "z.slika_sudskog_postupka":
                    $upit .= " AND z.slika_sudskog_postupka LIKE ?";
                    break;
                case "z.datum_vrijeme_slanja":
                    $upit .= " AND z.datum_vrijeme_slanja LIKE ?";
                    break;
                case "z.status":
                    $upit .= " AND z.status LIKE ?";
                    break;
                case "sp.naziv":
                    $upit .= " AND sp.naziv LIKE ?";
                    break;
                case "k.ime_prezime":
                    $upit .= " AND k.ime_prezime LIKE ?";
                    break;
            }
            $upit .= " LIMIT ? OFFSET ?";
            $this->dnevnik_rad_s_bazom($veza, "SELECT z.zahtjev_id, z.slika_sudskog_postupka,z.datum_vrijeme_slanja,z.status,sp.naziv,k.ime_prezime FROM zahtjev_za_odvjetnikom z JOIN sudski_postupak sp ON z.sudski_postupak_id=sp.sudski_postupak_id JOIN korisnik k on k.korisnik_id=z.odvjetnik_id WHERE sp.klijent_id=$korisnik_id AND $atribut_za_pretrazivanje LIKE '$vrijednost_za_pretrazivanje' LIMIT $limit OFFSET $offset");
            $statement = $veza->prepare($upit);
            $statement->bind_param("isii", $korisnik_id, $vrijednost_za_pretrazivanje, $limit, $offset);
        } else {
            $upit .= " LIMIT ? OFFSET ?";
            $this->dnevnik_rad_s_bazom($veza, "SELECT z.zahtjev_id, z.slika_sudskog_postupka,z.datum_vrijeme_slanja,z.status,sp.naziv,k.ime_prezime FROM zahtjev_za_odvjetnikom z JOIN sudski_postupak sp ON z.sudski_postupak_id=sp.sudski_postupak_id JOIN korisnik k on k.korisnik_id=z.odvjetnik_id WHERE sp.klijent_id=$korisnik_id LIMIT $limit OFFSET $offset");
            $statement = $veza->prepare($upit);
            $statement->bind_param("iii", $korisnik_id, $limit, $offset);
        }
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function zahtjev_za_odvjetnikom_dohvati_zahtjev_id($zahtjev_id) {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "SELECT * FROM zahtjev_za_odvjetnikom WHERE zahtjev_id=$zahtjev_id");
        $statement = $veza->prepare("SELECT * FROM zahtjev_za_odvjetnikom WHERE zahtjev_id=?");
        $statement->bind_param("i", $zahtjev_id);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC)[0];
    }

    function zahtjev_za_odvjetnikom_dohvati_zaprimljene($korisnik_id, $limit, $offset, $atribut_za_sortiranje = null, $smjer_sortiranja = null, $atribut_za_pretrazivanje = null, $vrijednost_za_pretrazivanje = null) {
        $upit = "SELECT z.zahtjev_id,z.datum_vrijeme_slanja,sp.naziv,sp.protuzakonita_radnja,sp.dokaz,k1.ime_prezime as ime_prezime_tuzenika,k2.ime_prezime AS ime_prezime_tuzitelja FROM zahtjev_za_odvjetnikom z JOIN sudski_postupak sp ON sp.sudski_postupak_id=z.sudski_postupak_id JOIN korisnik k1 ON k1.korisnik_id=sp.klijent_id JOIN korisnik k2 ON k2.korisnik_id=sp.tuzitelj_id WHERE z.status IS NULL AND z.odvjetnik_id=?";
        $vrijednost_za_pretrazivanje = "%$vrijednost_za_pretrazivanje%";
        $veza = $this->veza;
        if ($atribut_za_pretrazivanje != null && $atribut_za_sortiranje != null) {
            switch ($atribut_za_pretrazivanje) {
                case "z.zahtjev_id":
                    $upit .= " AND z.zahtjev_id LIKE ?";
                    break;
                case "z.datum_vrijeme_slanja":
                    $upit .= " AND z.datum_vrijeme_slanja LIKE ?";
                    break;
                case "sp.naziv":
                    $upit .= " AND sp.naziv LIKE ?";
                    break;
                case "sp.protuzakonita_radnja":
                    $upit .= " AND sp.protuzakonita_radnja LIKE ?";
                    break;
                case "sp.dokaz":
                    $upit .= " AND sp.dokaz LIKE ?";
                    break;
                case "ime_prezime_tuzenika":
                    $upit .= " AND k1.ime_prezime LIKE ?";
                    break;
                case "ime_prezime_tuzitelja":
                    $upit .= " AND k2.ime_prezime LIKE ?";
                    break;
            }
            switch ($atribut_za_sortiranje) {
                case "z.zahtjev_id":
                    $upit .= " ORDER BY z.zahtjev_id";
                    break;
                case "z.datum_vrijeme_slanja":
                    $upit .= " ORDER BY z.datum_vrijeme_slanja";
                    break;
                case "sp.naziv":
                    $upit .= " ORDER BY sp.naziv";
                    break;
                case "sp.protuzakonita_radnja":
                    $upit .= " ORDER BY sp.protuzakonita_radnja";
                    break;
                case "sp.dokaz":
                    $upit .= " ORDER BY sp.dokaz";
                    break;
                case "ime_prezime_tuzenika":
                    $upit .= " ORDER BY ime_prezime_tuzenika";
                    break;
                case "ime_prezime_tuzitelja":
                    $upit .= " ORDER BY ime_prezime_tuzitelja";
                    break;
            }
            if ($smjer_sortiranja == "ASC") {
                $upit .= " ASC";
            } else {
                $upit .= " DESC";
            }
            $upit .= " LIMIT ? OFFSET ?";
            $this->dnevnik_rad_s_bazom($veza, "SELECT z.zahtjev_id,z.datum_vrijeme_slanja,sp.naziv,sp.protuzakonita_radnja,sp.dokaz,k1.ime_prezime as ime_prezime_tuzenika,k2.ime_prezime AS ime_prezime_tuzitelja FROM zahtjev_za_odvjetnikom z JOIN sudski_postupak sp ON sp.sudski_postupak_id=z.sudski_postupak_id JOIN korisnik k1 ON k1.korisnik_id=sp.klijent_id JOIN korisnik k2 ON k2.korisnik_id=sp.tuzitelj_id WHERE z.status IS NULL AND z.odvjetnik_id=$korisnik_id AND $atribut_za_pretrazivanje LIKE '$vrijednost_za_pretrazivanje' ORDER BY $atribut_za_sortiranje LIMIT $limit OFFSET $offset");
            $statement = $veza->prepare($upit);
            $statement->bind_param("isii", $korisnik_id, $vrijednost_za_pretrazivanje, $limit, $offset);
        } elseif ($atribut_za_sortiranje != null) {
            switch ($atribut_za_sortiranje) {
                case "z.zahtjev_id":
                    $upit .= " ORDER BY z.zahtjev_id";
                    break;
                case "z.datum_vrijeme_slanja":
                    $upit .= " ORDER BY z.datum_vrijeme_slanja";
                    break;
                case "sp.naziv":
                    $upit .= " ORDER BY sp.naziv";
                    break;
                case "sp.protuzakonita_radnja":
                    $upit .= " ORDER BY sp.protuzakonita_radnja";
                    break;
                case "sp.dokaz":
                    $upit .= " ORDER BY sp.dokaz";
                    break;
                case "ime_prezime_tuzenika":
                    $upit .= " ORDER BY ime_prezime_tuzenika";
                    break;
                case "ime_prezime_tuzitelja":
                    $upit .= " ORDER BY ime_prezime_tuzitelja";
                    break;
            }
            if ($smjer_sortiranja == "ASC") {
                $upit .= " ASC";
            } else {
                $upit .= " DESC";
            }
            $upit .= " LIMIT ? OFFSET ?";
            $this->dnevnik_rad_s_bazom($veza, "SELECT z.zahtjev_id,z.datum_vrijeme_slanja,sp.naziv,sp.protuzakonita_radnja,sp.dokaz,k1.ime_prezime as ime_prezime_tuzenika,k2.ime_prezime AS ime_prezime_tuzitelja FROM zahtjev_za_odvjetnikom z JOIN sudski_postupak sp ON sp.sudski_postupak_id=z.sudski_postupak_id JOIN korisnik k1 ON k1.korisnik_id=sp.klijent_id JOIN korisnik k2 ON k2.korisnik_id=sp.tuzitelj_id WHERE z.status IS NULL AND z.odvjetnik_id=$korisnik_id ORDER BY $atribut_za_sortiranje LIMIT $limit OFFSET $offset");
            $statement = $veza->prepare($upit);
            $statement->bind_param("iii", $korisnik_id, $limit, $offset);
        } else if ($atribut_za_pretrazivanje != null) {
            switch ($atribut_za_pretrazivanje) {
                case "z.zahtjev_id":
                    $upit .= " AND z.zahtjev_id LIKE ?";
                    break;
                case "z.datum_vrijeme_slanja":
                    $upit .= " AND z.datum_vrijeme_slanja LIKE ?";
                    break;
                case "sp.naziv":
                    $upit .= " AND sp.naziv LIKE ?";
                    break;
                case "sp.protuzakonita_radnja":
                    $upit .= " AND sp.protuzakonita_radnja LIKE ?";
                    break;
                case "sp.dokaz":
                    $upit .= " AND sp.dokaz LIKE ?";
                    break;
                case "ime_prezime_tuzenika":
                    $upit .= " AND k1.ime_prezime LIKE ?";
                    break;
                case "ime_prezime_tuzitelja":
                    $upit .= " AND k2.ime_prezime LIKE ?";
                    break;
            }
            $upit .= " LIMIT ? OFFSET ?";
            $this->dnevnik_rad_s_bazom($veza, "SELECT z.zahtjev_id,z.datum_vrijeme_slanja,sp.naziv,sp.protuzakonita_radnja,sp.dokaz,k1.ime_prezime as ime_prezime_tuzenika,k2.ime_prezime AS ime_prezime_tuzitelja FROM zahtjev_za_odvjetnikom z JOIN sudski_postupak sp ON sp.sudski_postupak_id=z.sudski_postupak_id JOIN korisnik k1 ON k1.korisnik_id=sp.klijent_id JOIN korisnik k2 ON k2.korisnik_id=sp.tuzitelj_id WHERE z.status IS NULL AND z.odvjetnik_id=$korisnik_id AND $atribut_za_pretrazivanje LIKE '$vrijednost_za_pretrazivanje' LIMIT $limit OFFSET $offset");
            $statement = $veza->prepare($upit);
            $statement->bind_param("isii", $korisnik_id, $vrijednost_za_pretrazivanje, $limit, $offset);
        } else {
            $upit .= " LIMIT ? OFFSET ?";
            $this->dnevnik_rad_s_bazom($veza, "SELECT z.zahtjev_id,z.datum_vrijeme_slanja,sp.naziv,sp.protuzakonita_radnja,sp.dokaz,k1.ime_prezime as ime_prezime_tuzenika,k2.ime_prezime AS ime_prezime_tuzitelja FROM zahtjev_za_odvjetnikom z JOIN sudski_postupak sp ON sp.sudski_postupak_id=z.sudski_postupak_id JOIN korisnik k1 ON k1.korisnik_id=sp.klijent_id JOIN korisnik k2 ON k2.korisnik_id=sp.tuzitelj_id WHERE z.status IS NULL AND z.odvjetnik_id=$korisnik_id LIMIT $limit OFFSET $offset");
            $statement = $veza->prepare($upit);
            $statement->bind_param("iii", $korisnik_id, $limit, $offset);
        }
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function zahtjev_za_odvjetnikom_azuriraj_status($zahtjev_id, $status) {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "UPDATE zahtjev_za_odvjetnikom SET status=$status WHERE zahtjev_id=$zahtjev_id");
        $statement = $veza->prepare("UPDATE zahtjev_za_odvjetnikom SET status=? WHERE zahtjev_id=?");
        $statement->bind_param("ii", $status, $zahtjev_id);
        $statement->execute();
    }

    function zahtjev_za_odvjetnikom_dohvati_prihvacene($korisnik_id, $limit, $offset, $atribut_za_sortiranje = null, $smjer_sortiranja = null, $atribut_za_pretrazivanje = null, $vrijednost_za_pretrazivanje = null) {
        $upit = "SELECT z.zahtjev_id,z.datum_vrijeme_slanja,sp.sudski_postupak_id,sp.naziv,sp.protuzakonita_radnja,sp.dokaz,k1.ime_prezime as ime_prezime_tuzenika,k2.ime_prezime AS ime_prezime_tuzitelja, o.obrana_id, o.argumenti_obrane FROM zahtjev_za_odvjetnikom z JOIN sudski_postupak sp ON sp.sudski_postupak_id=z.sudski_postupak_id JOIN korisnik k1 ON k1.korisnik_id=sp.klijent_id JOIN korisnik k2 ON k2.korisnik_id=sp.tuzitelj_id LEFT JOIN obrana o ON o.zahtjev_id=z.zahtjev_id WHERE z.status=1 AND z.odvjetnik_id=?";
        $vrijednost_za_pretrazivanje = "%$vrijednost_za_pretrazivanje%";
        $veza = $this->veza;
        if ($atribut_za_pretrazivanje != null && $atribut_za_sortiranje != null) {
            switch ($atribut_za_pretrazivanje) {
                case "z.zahtjev_id":
                    $upit .= " AND z.zahtjev_id LIKE ?";
                    break;
                case "z.datum_vrijeme_slanja":
                    $upit .= " AND z.datum_vrijeme_slanja LIKE ?";
                    break;
                case "sp.naziv":
                    $upit .= " AND sp.naziv LIKE ?";
                    break;
                case "sp.protuzakonita_radnja":
                    $upit .= " AND sp.protuzakonita_radnja LIKE ?";
                    break;
                case "sp.dokaz":
                    $upit .= " AND sp.dokaz LIKE ?";
                    break;
                case "k1.ime_prezime":
                    $upit .= " AND k1.ime_prezime LIKE ?";
                    break;
                case "k2.ime_prezime":
                    $upit .= " AND k2.ime_prezime LIKE ?";
                    break;
                case "o.obrana_id":
                    $upit .= " AND o.obrana_id LIKE ?";
                    break;
                case "o.argumenti_obrane":
                    $upit .= " AND o.argumenti_obrane LIKE ?";
                    break;
            }
            switch ($atribut_za_sortiranje) {
                case "z.zahtjev_id":
                    $upit .= " ORDER BY z.zahtjev_id";
                    break;
                case "z.datum_vrijeme_slanja":
                    $upit .= " ORDER BY z.datum_vrijeme_slanja";
                    break;
                case "sp.naziv":
                    $upit .= " ORDER BY sp.naziv";
                    break;
                case "sp.protuzakonita_radnja":
                    $upit .= " ORDER BY sp.protuzakonita_radnja";
                    break;
                case "sp.dokaz":
                    $upit .= " ORDER BY sp.dokaz";
                    break;
                case "k1.ime_prezime":
                    $upit .= " ORDER BY k1.ime_prezime";
                    break;
                case "k2.ime_prezime":
                    $upit .= " ORDER BY k2.ime_prezime";
                    break;
                case "o.obrana_id":
                    $upit .= " ORDER BY o.obrana_id";
                    break;
                case "o.argumenti_obrane":
                    $upit .= " ORDER BY o.argumenti_obrane";
                    break;
            }
            if ($smjer_sortiranja == "ASC") {
                $upit .= " ASC";
            } else {
                $upit .= " DESC";
            }
            $upit .= " LIMIT ? OFFSET ?";
            $this->dnevnik_rad_s_bazom($veza, "SELECT z.zahtjev_id,z.datum_vrijeme_slanja,sp.sudski_postupak_id,sp.naziv,sp.protuzakonita_radnja,sp.dokaz,k1.ime_prezime as ime_prezime_tuzenika,k2.ime_prezime AS ime_prezime_tuzitelja, o.obrana_id, o.argumenti_obrane FROM zahtjev_za_odvjetnikom z JOIN sudski_postupak sp ON sp.sudski_postupak_id=z.sudski_postupak_id JOIN korisnik k1 ON k1.korisnik_id=sp.klijent_id JOIN korisnik k2 ON k2.korisnik_id=sp.tuzitelj_id LEFT JOIN obrana o ON o.zahtjev_id=z.zahtjev_id WHERE z.status=1 AND z.odvjetnik_id=$korisnik_id AND $atribut_za_pretrazivanje LIKE '$vrijednost_za_pretrazivanje' ORDER BY $atribut_za_sortiranje LIMIT $limit OFFSET $offset");
            $statement = $veza->prepare($upit);
            $statement->bind_param("isii", $korisnik_id, $vrijednost_za_pretrazivanje, $limit, $offset);
        } elseif ($atribut_za_sortiranje != null) {
            switch ($atribut_za_sortiranje) {
                case "z.zahtjev_id":
                    $upit .= " ORDER BY z.zahtjev_id";
                    break;
                case "z.datum_vrijeme_slanja":
                    $upit .= " ORDER BY z.datum_vrijeme_slanja";
                    break;
                case "sp.naziv":
                    $upit .= " ORDER BY sp.naziv";
                    break;
                case "sp.protuzakonita_radnja":
                    $upit .= " ORDER BY sp.protuzakonita_radnja";
                    break;
                case "sp.dokaz":
                    $upit .= " ORDER BY sp.dokaz";
                    break;
                case "k1.ime_prezime":
                    $upit .= " ORDER BY k1.ime_prezime";
                    break;
                case "k2.ime_prezime":
                    $upit .= " ORDER BY k2.ime_prezime";
                    break;
                case "o.obrana_id":
                    $upit .= " ORDER BY o.obrana_id";
                    break;
                case "o.argumenti_obrane":
                    $upit .= " ORDER BY o.argumenti_obrane";
                    break;
            }
            if ($smjer_sortiranja == "ASC") {
                $upit .= " ASC";
            } else {
                $upit .= " DESC";
            }
            $upit .= " LIMIT ? OFFSET ?";
            $this->dnevnik_rad_s_bazom($veza, "SELECT z.zahtjev_id,z.datum_vrijeme_slanja,sp.sudski_postupak_id,sp.naziv,sp.protuzakonita_radnja,sp.dokaz,k1.ime_prezime as ime_prezime_tuzenika,k2.ime_prezime AS ime_prezime_tuzitelja, o.obrana_id, o.argumenti_obrane FROM zahtjev_za_odvjetnikom z JOIN sudski_postupak sp ON sp.sudski_postupak_id=z.sudski_postupak_id JOIN korisnik k1 ON k1.korisnik_id=sp.klijent_id JOIN korisnik k2 ON k2.korisnik_id=sp.tuzitelj_id LEFT JOIN obrana o ON o.zahtjev_id=z.zahtjev_id WHERE z.status=1 AND z.odvjetnik_id=$korisnik_id ORDER BY $atribut_za_sortiranje LIMIT $limit OFFSET $offset");
            $statement = $veza->prepare($upit);
            $statement = $veza->prepare($upit);
            $statement->bind_param("iii", $korisnik_id, $limit, $offset);
        } else if ($atribut_za_pretrazivanje != null) {
            switch ($atribut_za_pretrazivanje) {
                case "z.zahtjev_id":
                    $upit .= " AND z.zahtjev_id LIKE ?";
                    break;
                case "z.datum_vrijeme_slanja":
                    $upit .= " AND z.datum_vrijeme_slanja LIKE ?";
                    break;
                case "sp.naziv":
                    $upit .= " AND sp.naziv LIKE ?";
                    break;
                case "sp.protuzakonita_radnja":
                    $upit .= " AND sp.protuzakonita_radnja LIKE ?";
                    break;
                case "sp.dokaz":
                    $upit .= " AND sp.dokaz LIKE ?";
                    break;
                case "k1.ime_prezime":
                    $upit .= " AND k1.ime_prezime LIKE ?";
                    break;
                case "k2.ime_prezime":
                    $upit .= " AND k2.ime_prezime LIKE ?";
                    break;
                case "o.obrana_id":
                    $upit .= " AND o.obrana_id LIKE ?";
                    break;
                case "o.argumenti_obrane":
                    $upit .= " AND o.argumenti_obrane LIKE ?";
                    break;
            }
            $upit .= " LIMIT ? OFFSET ?";
            $this->dnevnik_rad_s_bazom($veza, "SELECT z.zahtjev_id,z.datum_vrijeme_slanja,sp.sudski_postupak_id,sp.naziv,sp.protuzakonita_radnja,sp.dokaz,k1.ime_prezime as ime_prezime_tuzenika,k2.ime_prezime AS ime_prezime_tuzitelja, o.obrana_id, o.argumenti_obrane FROM zahtjev_za_odvjetnikom z JOIN sudski_postupak sp ON sp.sudski_postupak_id=z.sudski_postupak_id JOIN korisnik k1 ON k1.korisnik_id=sp.klijent_id JOIN korisnik k2 ON k2.korisnik_id=sp.tuzitelj_id LEFT JOIN obrana o ON o.zahtjev_id=z.zahtjev_id WHERE z.status=1 AND z.odvjetnik_id=$korisnik_id AND $atribut_za_pretrazivanje LIKE '$vrijednost_za_pretrazivanje' LIMIT $limit OFFSET $offset");
            $statement = $veza->prepare($upit);
            $statement = $veza->prepare($upit);
            $statement->bind_param("isii", $korisnik_id, $vrijednost_za_pretrazivanje, $limit, $offset);
        } else {
            $upit .= " LIMIT ? OFFSET ?";
            $this->dnevnik_rad_s_bazom($veza, "SELECT z.zahtjev_id,z.datum_vrijeme_slanja,sp.sudski_postupak_id,sp.naziv,sp.protuzakonita_radnja,sp.dokaz,k1.ime_prezime as ime_prezime_tuzenika,k2.ime_prezime AS ime_prezime_tuzitelja, o.obrana_id, o.argumenti_obrane FROM zahtjev_za_odvjetnikom z JOIN sudski_postupak sp ON sp.sudski_postupak_id=z.sudski_postupak_id JOIN korisnik k1 ON k1.korisnik_id=sp.klijent_id JOIN korisnik k2 ON k2.korisnik_id=sp.tuzitelj_id LEFT JOIN obrana o ON o.zahtjev_id=z.zahtjev_id WHERE z.status=1 AND z.odvjetnik_id=$korisnik_id LIMIT $limit OFFSET $offset");
            $statement = $veza->prepare($upit);
            $statement = $veza->prepare($upit);
            $statement->bind_param("iii", $korisnik_id, $limit, $offset);
        }
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function obrana_spremi($atributi) {
        $zahtjev_id = $atributi['zahtjev_id'];
        $argumenti_obrane = $atributi['argumenti_obrane'];

        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "INSERT INTO obrana (argumenti_obrane,zahtjev_id) VALUES ('$argumenti_obrane',$zahtjev_id)");
        $statement = $veza->prepare("INSERT INTO obrana (argumenti_obrane,zahtjev_id) VALUES (?,?)");
        $statement->bind_param("si", $argumenti_obrane, $zahtjev_id);

        $statement->execute();
    }

    function obrana_azuriraj($obrana_id, $atributi) {
        $argumenti_obrane = (!isset($atributi['argumenti_obrane']) ? null : $atributi['argumenti_obrane']);

        $veza = $this->veza;

        $this->dnevnik_rad_s_bazom($veza, "UPDATE obrana SET argumenti_obrane=? WHERE obrana_id=$obrana_id");
        $statement = $veza->prepare("UPDATE obrana SET argumenti_obrane=? WHERE obrana_id=?");
        $statement->bind_param("si", $argumenti_obrane, $obrana_id);

        $statement->execute();
    }

    function obrana_dohvati($obrana_id) {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "SELECT * FROM obrana WHERE obrana_id=$obrana_id");
        $statement = $veza->prepare("SELECT * FROM obrana WHERE obrana_id=?");
        $statement->bind_param("i", $obrana_id);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC)[0];
    }

    function zahtjev_za_odvjetnikom_azuriraj_kod_klijenta($zahtjev_id, $atributi) {
        $slika_sudskog_postupka = (!isset($atributi['slika_sudskog_postupka'])) ? null : $atributi['slika_sudskog_postupka'];
        $sudski_postupak_id = (!isset($atributi['sudski_postupak_id'])) ? null : $atributi['sudski_postupak_id'];
        $odvjetnik_id = (!isset($atributi['odvjetnik_id'])) ? null : $atributi['odvjetnik_id'];
        $veza = $this->veza;
        if ($slika_sudskog_postupka == null) {
            $this->dnevnik_rad_s_bazom($veza, "UPDATE zahtjev_za_odvjetnikom SET sudski_postupak_id=$sudski_postupak_id,odvjetnik_id=$odvjetnik_id WHERE zahtjev_id=$zahtjev_id");
            $statement = $veza->prepare("UPDATE zahtjev_za_odvjetnikom SET sudski_postupak_id=?,odvjetnik_id=? WHERE zahtjev_id=?");
            $statement->bind_param("iii", $sudski_postupak_id, $odvjetnik_id, $zahtjev_id);
        } else {
            $this->dnevnik_rad_s_bazom($veza, "UPDATE zahtjev_za_odvjetnikom SET slika_sudskog_postupka='$slika_sudskog_postupka',sudski_postupak_id=$sudski_postupak_id,odvjetnik_id=$odvjetnik_id WHERE zahtjev_id=$zahtjev_id");
            $statement = $veza->prepare("UPDATE zahtjev_za_odvjetnikom SET slika_sudskog_postupka=?,sudski_postupak_id=?,odvjetnik_id=? WHERE zahtjev_id=?");
            $statement->bind_param("siii", $slika_sudskog_postupka, $sudski_postupak_id, $odvjetnik_id, $zahtjev_id);
        }

        $statement->execute();
    }

    function sudski_postupak_azuriraj_zavrsno($sudski_postupak_id, $atributi) {
        $datum_vrijeme_zavrsetka = (!isset($atributi['datum_vrijeme_zavrsetka'])) ? null : $atributi['datum_vrijeme_zavrsetka'];
        $zakljucak_postupka = (!isset($atributi['zakljucak_postupka'])) ? null : $atributi['zakljucak_postupka'];
        $status = 1;
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "UPDATE sudski_postupak SET datum_vrijeme_zavrsetka='$datum_vrijeme_zavrsetka', zakljucak_postupka=$zakljucak_postupka,status=$status WHERE sudski_postupak_id=$sudski_postupak_id");
        $statement = $veza->prepare("UPDATE sudski_postupak SET datum_vrijeme_zavrsetka=?, zakljucak_postupka=?,status=? WHERE sudski_postupak_id=?");
        $statement->bind_param("siii", $datum_vrijeme_zavrsetka, $zakljucak_postupka, $status, $sudski_postupak_id);
        $statement->execute();
    }

    function korisnik_dohvati_odvjetnike() {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "SELECT * FROM korisnik WHERE uloga_id>2");
        $statement = $veza->prepare("SELECT * FROM korisnik WHERE uloga_id>2");
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function pravno_savjetovanje_pitanje_spremi($atributi) {
        $razlog = $atributi['razlog'];
        $pitanje = $atributi['pitanje'];
        $datum_vrijeme_postavljanja = $atributi['datum_vrijeme_postavljanja'];
        $odvjetnik_id = $atributi['odvjetnik_id'];
        $korisnik_id = $atributi['korisnik_id'];

        $veza = $this->veza;

        $this->dnevnik_rad_s_bazom($veza, "INSERT INTO pravno_savjetovanje_pitanje (razlog, opis, datum_vrijeme_postavljanja, odvjetnik_id, korisnik_id) VALUES ('$razlog', '$pitanje', '$datum_vrijeme_postavljanja', $odvjetnik_id, $korisnik_id)");
        $statement = $veza->prepare("INSERT INTO pravno_savjetovanje_pitanje (razlog, opis, datum_vrijeme_postavljanja, odvjetnik_id, korisnik_id) VALUES (?,?,?,?,?)");
        $statement->bind_param("sssii", $razlog, $pitanje, $datum_vrijeme_postavljanja, $odvjetnik_id, $korisnik_id);
        $statement->execute();
    }

    function pravno_savjetovanje_pitanje_dohvati_sve_korisnikove_za_odvjetnika($korisnik_id, $odvjetnik_id, $limit, $offset, $atribut_za_sortiranje = null, $smjer_sortiranja = null, $atribut_za_pretrazivanje = null, $vrijednost_za_pretrazivanje = null) {
        $upit = "SELECT psp.razlog,psp.opis,psp.datum_vrijeme_postavljanja,psp.odvjetnik_id,k1.ime_prezime AS ime_prezime_klijenta,k2.ime_prezime AS ime_prezime_odvjetnika,pso.tekst FROM pravno_savjetovanje_pitanje psp LEFT JOIN pravno_savjetovanje_odgovor pso ON psp.pitanje_id=pso.pitanje_id JOIN korisnik k1 ON k1.korisnik_id=psp.korisnik_id JOIN korisnik k2 ON k2.korisnik_id=psp.odvjetnik_id WHERE psp.korisnik_id=? AND psp.odvjetnik_id=?";
        $vrijednost_za_pretrazivanje = "%$vrijednost_za_pretrazivanje%";
        $veza = $this->veza;
        if ($atribut_za_pretrazivanje != null && $atribut_za_sortiranje != null) {
            switch ($atribut_za_pretrazivanje) {
                case "psp.razlog":
                    $upit .= " AND psp.razlog LIKE ?";
                    break;
                case "psp.opis":
                    $upit .= " AND psp.opis LIKE ?";
                    break;
                case "psp.datum_vrijeme_postavljanja":
                    $upit .= " AND psp.datum_vrijeme_postavljanja LIKE ?";
                    break;
                case "pso.tekst":
                    $upit .= " AND pso.tekst LIKE ?";
                    break;
            }
            switch ($atribut_za_sortiranje) {
                case "psp.razlog":
                    $upit .= " ORDER BY psp.razlog";
                    break;
                case "psp.opis":
                    $upit .= " ORDER BY psp.opis";
                    break;
                case "psp.datum_vrijeme_postavljanja":
                    $upit .= " ORDER BY psp.datum_vrijeme_postavljanja";
                    break;
                case "pso.tekst":
                    $upit .= " ORDER BY pso.tekst";
                    break;
            }
            if ($smjer_sortiranja == "ASC") {
                $upit .= " ASC";
            } else {
                $upit .= " DESC";
            }
            $upit .= " LIMIT ? OFFSET ?";
            $this->dnevnik_rad_s_bazom($veza, "SELECT psp.razlog,psp.opis,psp.datum_vrijeme_postavljanja,psp.odvjetnik_id,k1.ime_prezime AS ime_prezime_klijenta,k2.ime_prezime AS ime_prezime_odvjetnika,pso.tekst FROM pravno_savjetovanje_pitanje psp LEFT JOIN pravno_savjetovanje_odgovor pso ON psp.pitanje_id=pso.pitanje_id JOIN korisnik k1 ON k1.korisnik_id=psp.korisnik_id JOIN korisnik k2 ON k2.korisnik_id=psp.odvjetnik_id WHERE psp.korisnik_id=$korisnik_id AND psp.odvjetnik_id=$odvjetnik_id AND $atribut_za_pretrazivanje LIKE '$vrijednost_za_pretrazivanje' ORDER BY $atribut_za_sortiranje LIMIT $limit OFFSET $offset");
            $statement = $veza->prepare($upit);
            $statement->bind_param("iisii", $korisnik_id, $odvjetnik_id, $vrijednost_za_pretrazivanje, $limit, $offset);
        } elseif ($atribut_za_sortiranje != null) {
            switch ($atribut_za_sortiranje) {
                case "psp.razlog":
                    $upit .= " ORDER BY psp.razlog";
                    break;
                case "psp.opis":
                    $upit .= " ORDER BY psp.opis";
                    break;
                case "psp.datum_vrijeme_postavljanja":
                    $upit .= " ORDER BY psp.datum_vrijeme_postavljanja";
                    break;
                case "pso.tekst":
                    $upit .= " ORDER BY pso.tekst";
                    break;
            }
            if ($smjer_sortiranja == "ASC") {
                $upit .= " ASC";
            } else {
                $upit .= " DESC";
            }
            $upit .= " LIMIT ? OFFSET ?";
            $this->dnevnik_rad_s_bazom($veza, "SELECT psp.razlog,psp.opis,psp.datum_vrijeme_postavljanja,psp.odvjetnik_id,k1.ime_prezime AS ime_prezime_klijenta,k2.ime_prezime AS ime_prezime_odvjetnika,pso.tekst FROM pravno_savjetovanje_pitanje psp LEFT JOIN pravno_savjetovanje_odgovor pso ON psp.pitanje_id=pso.pitanje_id JOIN korisnik k1 ON k1.korisnik_id=psp.korisnik_id JOIN korisnik k2 ON k2.korisnik_id=psp.odvjetnik_id WHERE psp.korisnik_id=$korisnik_id AND psp.odvjetnik_id=$odvjetnik_id ORDER BY $atribut_za_sortiranje LIMIT $limit OFFSET $offset");
            $statement = $veza->prepare($upit);
            $statement->bind_param("iiii", $korisnik_id, $odvjetnik_id, $limit, $offset);
        } else if ($atribut_za_pretrazivanje != null) {
            switch ($atribut_za_pretrazivanje) {
                case "psp.razlog":
                    $upit .= " AND psp.razlog LIKE ?";
                    break;
                case "psp.opis":
                    $upit .= " AND psp.opis LIKE ?";
                    break;
                case "psp.datum_vrijeme_postavljanja":
                    $upit .= " AND psp.datum_vrijeme_postavljanja LIKE ?";
                    break;
                case "pso.tekst":
                    $upit .= " AND pso.tekst LIKE ?";
                    break;
            }
            $upit .= " LIMIT ? OFFSET ?";
            $this->dnevnik_rad_s_bazom($veza, "SELECT psp.razlog,psp.opis,psp.datum_vrijeme_postavljanja,psp.odvjetnik_id,k1.ime_prezime AS ime_prezime_klijenta,k2.ime_prezime AS ime_prezime_odvjetnika,pso.tekst FROM pravno_savjetovanje_pitanje psp LEFT JOIN pravno_savjetovanje_odgovor pso ON psp.pitanje_id=pso.pitanje_id JOIN korisnik k1 ON k1.korisnik_id=psp.korisnik_id JOIN korisnik k2 ON k2.korisnik_id=psp.odvjetnik_id WHERE psp.korisnik_id=$korisnik_id AND psp.odvjetnik_id=$odvjetnik_id AND $atribut_za_pretrazivanje LIKE '$vrijednost_za_pretrazivanje' LIMIT $limit OFFSET $offset");
            $statement = $veza->prepare($upit);
            $statement->bind_param("iisii", $korisnik_id, $odvjetnik_id, $vrijednost_za_pretrazivanje, $limit, $offset);
        } else {
            $upit .= " LIMIT ? OFFSET ?";
            $this->dnevnik_rad_s_bazom($veza, "SELECT psp.razlog,psp.opis,psp.datum_vrijeme_postavljanja,psp.odvjetnik_id,k1.ime_prezime AS ime_prezime_klijenta,k2.ime_prezime AS ime_prezime_odvjetnika,pso.tekst FROM pravno_savjetovanje_pitanje psp LEFT JOIN pravno_savjetovanje_odgovor pso ON psp.pitanje_id=pso.pitanje_id JOIN korisnik k1 ON k1.korisnik_id=psp.korisnik_id JOIN korisnik k2 ON k2.korisnik_id=psp.odvjetnik_id WHERE psp.korisnik_id=$korisnik_id AND psp.odvjetnik_id=$odvjetnik_id LIMIT $limit OFFSET $offset");
            $statement = $veza->prepare($upit);
            $statement->bind_param("iiii", $korisnik_id, $odvjetnik_id, $limit, $offset);
        }
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function pravno_savjetovanje_pitanje_dohvati_sva_pitanja_za_odvjetnika(
            $korisnik_id, $limit, $offset, $atribut_za_sortiranje = null, $smjer_sortiranja = null, $atribut_za_pretrazivanje = null, $vrijednost_za_pretrazivanje = null) {
        $upit = "SELECT psp.pitanje_id, psp.razlog, psp.opis, psp.datum_vrijeme_postavljanja, pso.tekst, k.ime_prezime AS klijent FROM pravno_savjetovanje_pitanje psp LEFT JOIN pravno_savjetovanje_odgovor pso ON psp.pitanje_id = pso.pitanje_id JOIN korisnik k ON k.korisnik_id = psp.korisnik_id WHERE psp.odvjetnik_id = ? AND pso.odgovor_id IS NULL";
        $vrijednost_za_pretrazivanje = "%$vrijednost_za_pretrazivanje%";
        $veza = $this->veza;
        if ($atribut_za_pretrazivanje != null && $atribut_za_sortiranje != null) {
            switch ($atribut_za_pretrazivanje) {
                case "psp.klijent":
                    $upit .= " AND k.ime_prezime LIKE ?";
                    break;
                case "psp.razlog":
                    $upit .= " AND psp.razlog LIKE ?";
                    break;
                case "psp.opis":
                    $upit .= " AND psp.opis LIKE ?";
                    break;
                case "psp.datum_vrijeme_postavljanja":
                    $upit .= " AND psp.datum_vrijeme_postavljanja LIKE ?";
                    break;
            }
            switch ($atribut_za_sortiranje) {
                case "psp.klijent":
                    $upit .= " ORDER BY k.ime_prezime";
                    break;
                case "psp.razlog":
                    $upit .= " ORDER BY psp.razlog";
                    break;
                case "psp.opis":
                    $upit .= " ORDER BY psp.opis";
                    break;
                case "psp.datum_vrijeme_postavljanja":
                    $upit .= " ORDER BY psp.datum_vrijeme_postavljanja";
                    break;
            }
            if ($smjer_sortiranja == "ASC") {
                $upit .= " ASC";
            } else {
                $upit .= " DESC";
            }
            $upit .= " LIMIT ? OFFSET ?";
            $this->dnevnik_rad_s_bazom($veza, "SELECT psp.pitanje_id, psp.razlog, psp.opis, psp.datum_vrijeme_postavljanja, pso.tekst, k.ime_prezime AS klijent FROM pravno_savjetovanje_pitanje psp LEFT JOIN pravno_savjetovanje_odgovor pso ON psp.pitanje_id = pso.pitanje_id JOIN korisnik k ON k.korisnik_id = psp.korisnik_id WHERE psp.odvjetnik_id = $korisnik_id AND pso.odgovor_id IS NULL AND $atribut_za_pretrazivanje LIKE '$vrijednost_za_pretrazivanje' ORDER BY $atribut_za_sortiranje LIMIT $limit OFFSET $offset");
            $statement = $veza->prepare($upit);
            $statement->bind_param("isii", $korisnik_id, $vrijednost_za_pretrazivanje, $limit, $offset);
        } elseif ($atribut_za_sortiranje != null) {
            switch ($atribut_za_sortiranje) {
                case "psp.klijent":
                    $upit .= " ORDER BY k.ime_prezime";
                    break;
                case "psp.razlog":
                    $upit .= " ORDER BY psp.razlog";
                    break;
                case "psp.opis":
                    $upit .= " ORDER BY psp.opis";
                    break;
                case "psp.datum_vrijeme_postavljanja":
                    $upit .= " ORDER BY psp.datum_vrijeme_postavljanja";
                    break;
            }
            if ($smjer_sortiranja == "ASC") {
                $upit .= " ASC";
            } else {
                $upit .= " DESC";
            }
            $upit .= " LIMIT ? OFFSET ?";
            $this->dnevnik_rad_s_bazom($veza, "SELECT psp.pitanje_id, psp.razlog, psp.opis, psp.datum_vrijeme_postavljanja, pso.tekst, k.ime_prezime AS klijent FROM pravno_savjetovanje_pitanje psp LEFT JOIN pravno_savjetovanje_odgovor pso ON psp.pitanje_id = pso.pitanje_id JOIN korisnik k ON k.korisnik_id = psp.korisnik_id WHERE psp.odvjetnik_id = $korisnik_id AND pso.odgovor_id IS NULL ORDER BY $atribut_za_sortiranje LIMIT $limit OFFSET $offset");
            $statement = $veza->prepare($upit);
            $statement->bind_param("iii", $korisnik_id, $limit, $offset);
        } else if ($atribut_za_pretrazivanje != null) {
            switch ($atribut_za_pretrazivanje) {
                case "psp.klijent":
                    $upit .= " AND k.ime_prezime LIKE ?";
                    break;
                case "psp.razlog":
                    $upit .= " AND psp.razlog LIKE ?";
                    break;
                case "psp.opis":
                    $upit .= " AND psp.opis LIKE ?";
                    break;
                case "psp.datum_vrijeme_postavljanja":
                    $upit .= " AND psp.datum_vrijeme_postavljanja LIKE ?";
                    break;
            }
            $upit .= " LIMIT ? OFFSET ?";
            $this->dnevnik_rad_s_bazom($veza, "SELECT psp.pitanje_id, psp.razlog, psp.opis, psp.datum_vrijeme_postavljanja, pso.tekst, k.ime_prezime AS klijent FROM pravno_savjetovanje_pitanje psp LEFT JOIN pravno_savjetovanje_odgovor pso ON psp.pitanje_id = pso.pitanje_id JOIN korisnik k ON k.korisnik_id = psp.korisnik_id WHERE psp.odvjetnik_id = $korisnik_id AND pso.odgovor_id IS NULL AND $atribut_za_pretrazivanje LIKE '$vrijednost_za_pretrazivanje' LIMIT $limit OFFSET $offset");
            $statement = $veza->prepare($upit);
            $statement->bind_param("isii", $korisnik_id, $vrijednost_za_pretrazivanje, $limit, $offset);
        } else {
            $upit .= " LIMIT ? OFFSET ?";
            $this->dnevnik_rad_s_bazom($veza, "SELECT psp.pitanje_id, psp.razlog, psp.opis, psp.datum_vrijeme_postavljanja, pso.tekst, k.ime_prezime AS klijent FROM pravno_savjetovanje_pitanje psp LEFT JOIN pravno_savjetovanje_odgovor pso ON psp.pitanje_id = pso.pitanje_id JOIN korisnik k ON k.korisnik_id = psp.korisnik_id WHERE psp.odvjetnik_id = $korisnik_id AND pso.odgovor_id IS NULL LIMIT $limit OFFSET $offset");
            $statement = $veza->prepare($upit);
            $statement->bind_param("iii", $korisnik_id, $limit, $offset);
        }
        $statement->execute();
        //return array($korisnik_id, $limit, $offset, $atribut_za_sortiranje, $smjer_sortiranja, $atribut_za_pretrazivanje, $vrijednost_za_pretrazivanje);
        //return "SELECT sp.sudski_postupak_id, sp.naziv, sp.protuzakonita_radnja, sp.dokaz, sp.datum_vrijeme_pocetka, sp.datum_vrijeme_zavrsetka, sp.zakljucak_postupka, sp.status, k.korisnicko_ime, k.ime_prezime, sp.klijent_id, sp.tuzitelj_id FROM sudski_postupak sp JOIN korisnik k on k.korisnik_id = sp.klijent_id WHERE tuzitelj_id = $korisnik_id"." AND $atribut_za_pretrazivanje LIKE '$vrijednost_za_pretrazivanje'"." LIMIT $limit OFFSET $offset";

        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function pravno_savjetovanje_pitanje_dohvati_pitanje($pitanje_id) {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "SELECT psp.razlog, psp.opis, psp.datum_vrijeme_postavljanja, k.ime_prezime, k.korisnicko_ime FROM korisnik k JOIN pravno_savjetovanje_pitanje psp ON psp.korisnik_id = k.korisnik_id WHERE psp.pitanje_id = $pitanje_id");
        $statement = $veza->prepare("SELECT psp.razlog, psp.opis, psp.datum_vrijeme_postavljanja, k.ime_prezime, k.korisnicko_ime FROM korisnik k JOIN pravno_savjetovanje_pitanje psp ON psp.korisnik_id = k.korisnik_id WHERE psp.pitanje_id = ?");
        $statement->bind_param("i", $pitanje_id);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC)[0];
    }

    function pravno_savjetovanje_odgovor_spremi($atributi) {
        $tekst = $atributi['tekst'];
        $datum_vrijeme_odgovoranja = $atributi['datum_vrijeme_odgovaranja'];
        $pitanje_id = $atributi['pitanje_id'];

        $veza = $this->veza;

        $this->dnevnik_rad_s_bazom($veza, "INSERT INTO pravno_savjetovanje_odgovor(tekst, datum_vrijeme_odgovaranja, pitanje_id) VALUES('$tekst', '$datum_vrijeme_odgovoranja', $pitanje_id)");
        $statement = $veza->prepare("INSERT INTO pravno_savjetovanje_odgovor(tekst, datum_vrijeme_odgovaranja, pitanje_id) VALUES(?, ?, ?)");
        $statement->bind_param("ssi", $tekst, $datum_vrijeme_odgovoranja, $pitanje_id);

        $statement->execute
        ();
    }

    function korisnik_dohvati_za_blokiranje($limit, $offset, $atribut_za_sortiranje = null, $smjer_sortiranja = null, $atribut_za_pretrazivanje = null, $vrijednost_za_pretrazivanje = null) {
        $upit = "SELECT korisnik_id, korisnicko_ime, ime_prezime, email, pokusaji_prijave, blokiran, naziv FROM korisnik k JOIN uloga u ON u.uloga_id = k.uloga_id WHERE 1";
        $vrijednost_za_pretrazivanje = "%$vrijednost_za_pretrazivanje%";
        $veza = $this->veza;
        if ($atribut_za_pretrazivanje != null && $atribut_za_sortiranje != null) {
            switch ($atribut_za_pretrazivanje) {
                case "korisnicko_ime":
                    $upit .= " AND korisnicko_ime LIKE ?";
                    break;
                case "ime_prezime":
                    $upit .= " AND ime_prezime LIKE ?";
                    break;
                case "email":
                    $upit .= " AND email LIKE ?";
                    break;
                case "pokusaji_prijave":
                    $upit .= " AND pokusaji_prijave LIKE ?";
                    break;
                case "blokiran":
                    $upit .= " AND blokiran LIKE ?";
                    break;
                case "naziv":
                    $upit .= " AND naziv LIKE ?";
                    break;
            }
            switch ($atribut_za_sortiranje) {
                case "korisnicko_ime":
                    $upit .= " ORDER BY korisnicko_ime";
                    break;
                case "ime_prezime":
                    $upit .= " ORDER BY ime_prezime";
                    break;
                case "email":
                    $upit .= " ORDER BY email";
                    break;
                case "pokusaji_prijave":
                    $upit .= " ORDER BY pokusaji_prijave";
                    break;
                case "blokiran":
                    $upit .= " ORDER BY blokiran";
                    break;
                case "naziv":
                    $upit .= " ORDER BY naziv";
                    break;
            }
            if ($smjer_sortiranja == "ASC") {
                $upit .= " ASC";
            } else {
                $upit .= " DESC";
            }
            $upit .= " LIMIT ? OFFSET ?";
            $this->dnevnik_rad_s_bazom($veza, "SELECT korisnik_id, korisnicko_ime, ime_prezime, email, pokusaji_prijave, blokiran, naziv FROM korisnik k JOIN uloga u ON u.uloga_id = k.uloga_id WHERE 1 AND $atribut_za_pretrazivanje LIKE '$vrijednost_za_pretrazivanje' ORDER BY $atribut_za_sortiranje LIMIT $limit OFFSET $offset");
            $statement = $veza->prepare($upit);
            $statement->bind_param("sii", $vrijednost_za_pretrazivanje, $limit, $offset);
        } elseif ($atribut_za_sortiranje != null) {
            switch ($atribut_za_sortiranje) {
                case "korisnicko_ime":
                    $upit .= " ORDER BY korisnicko_ime";
                    break;
                case "ime_prezime":
                    $upit .= " ORDER BY ime_prezime";
                    break;
                case "email":
                    $upit .= " ORDER BY email";
                    break;
                case "pokusaji_prijave":
                    $upit .= " ORDER BY pokusaji_prijave";
                    break;
                case "blokiran":
                    $upit .= " ORDER BY blokiran";
                    break;
                case "naziv":
                    $upit .= " ORDER BY naziv";
                    break;
            }
            if ($smjer_sortiranja == "ASC") {
                $upit .= " ASC";
            } else {
                $upit .= " DESC";
            }
            $upit .= " LIMIT ? OFFSET ?";
            $this->dnevnik_rad_s_bazom($veza, "SELECT korisnik_id, korisnicko_ime, ime_prezime, email, pokusaji_prijave, blokiran, naziv FROM korisnik k JOIN uloga u ON u.uloga_id = k.uloga_id WHERE 1 ORDER BY $atribut_za_sortiranje LIMIT $limit OFFSET $offset");
            $statement = $veza->prepare($upit);
            $statement->bind_param("ii", $limit, $offset);
        } else if ($atribut_za_pretrazivanje != null) {
            switch ($atribut_za_pretrazivanje) {
                case "korisnicko_ime":
                    $upit .= " AND korisnicko_ime LIKE ?";
                    break;
                case "ime_prezime":
                    $upit .= " AND ime_prezime LIKE ?";
                    break;
                case "email":
                    $upit .= " AND email LIKE ?";
                    break;
                case "pokusaji_prijave":
                    $upit .= " AND pokusaji_prijave LIKE ?";
                    break;
                case "blokiran":
                    $upit .= " AND blokiran LIKE ?";
                    break;
                case "naziv":
                    $upit .= " AND naziv LIKE ?";
                    break;
            }
            $upit .= " LIMIT ? OFFSET ?";
            $this->dnevnik_rad_s_bazom($veza, "SELECT korisnik_id, korisnicko_ime, ime_prezime, email, pokusaji_prijave, blokiran, naziv FROM korisnik k JOIN uloga u ON u.uloga_id = k.uloga_id WHERE 1 AND $atribut_za_pretrazivanje LIKE '$vrijednost_za_pretrazivanje' LIMIT $limit OFFSET $offset");
            $statement = $veza->prepare($upit);
            $statement->bind_param("sii", $vrijednost_za_pretrazivanje, $limit, $offset);
        } else {
            $upit .= " LIMIT ? OFFSET ?";
            $this->dnevnik_rad_s_bazom($veza, "SELECT korisnik_id, korisnicko_ime, ime_prezime, email, pokusaji_prijave, blokiran, naziv FROM korisnik k JOIN uloga u ON u.uloga_id = k.uloga_id WHERE 1 LIMIT $limit OFFSET $offset");
            $statement = $veza->prepare($upit);
            $statement->bind_param("ii", $limit, $offset);
        }
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function korisnik_azuriraj_blokiran_id($korisnik_id, $int) {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "UPDATE korisnik SET blokiran = $int WHERE korisnik_id = $korisnik_id");
        $statement = $veza->prepare("UPDATE korisnik SET blokiran = ? WHERE korisnik_id = ?");
        $statement->bind_param("ii", $int, $korisnik_id);
        $statement->execute();
    }

    function korisnik_azuriraj_pokusaji_prijave_reset_id($korisnik_id) {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "UPDATE korisnik SET pokusaji_prijave = 0 WHERE korisnik_id = $korisnik_id");
        $statement = $veza->prepare("UPDATE korisnik SET pokusaji_prijave = 0 WHERE korisnik_id = ?");
        $statement->bind_param("i", $korisnik_id);
        $statement->execute
        ();
    }

    function kategorija_sudskog_postupka_dohvati_sve($limit, $offset, $atribut_za_sortiranje = null, $smjer_sortiranja = null, $atribut_za_pretrazivanje = null, $vrijednost_za_pretrazivanje = null) {
        $upit = "SELECT * FROM kategorija_sudskog_postupka WHERE 1";
        $vrijednost_za_pretrazivanje = "%$vrijednost_za_pretrazivanje%";
        $veza = $this->veza;
        if ($atribut_za_pretrazivanje != null && $atribut_za_sortiranje != null) {
            switch ($atribut_za_pretrazivanje) {
                case "kategorija_sudskog_postupka_id":
                    $upit .= " AND kategorija_sudskog_postupka_id LIKE ?";
                    break;
                case "naziv":
                    $upit .= " AND naziv LIKE ?";
                    break;
                case "opis":
                    $upit .= " AND opis LIKE ?";
                    break;
            }
            switch ($atribut_za_sortiranje) {
                case "kategorija_sudskog_postupka_id":
                    $upit .= " ORDER BY kategorija_sudskog_postupka_id";
                    break;
                case "naziv":
                    $upit .= " ORDER BY naziv";
                    break;
                case "opis":
                    $upit .= " ORDER BY opis";
                    break;
            }
            if ($smjer_sortiranja == "ASC") {
                $upit .= " ASC";
            } else {
                $upit .= " DESC";
            }
            $upit .= " LIMIT ? OFFSET ?";
            $this->dnevnik_rad_s_bazom($veza, "SELECT * FROM kategorija_sudskog_postupka WHERE 1 AND $atribut_za_pretrazivanje LIKE '$vrijednost_za_pretrazivanje' ORDER BY $atribut_za_sortiranje LIMIT $limit OFFSET $offset");
            $statement = $veza->prepare($upit);
            $statement->bind_param("sii", $vrijednost_za_pretrazivanje, $limit, $offset);
        } elseif ($atribut_za_sortiranje != null) {
            switch ($atribut_za_sortiranje) {
                case "kategorija_sudskog_postupka_id":
                    $upit .= " ORDER BY kategorija_sudskog_postupka_id";
                    break;
                case "naziv":
                    $upit .= " ORDER BY naziv";
                    break;
                case "opis":
                    $upit .= " ORDER BY opis";
                    break;
            }
            if ($smjer_sortiranja == "ASC") {
                $upit .= " ASC";
            } else {
                $upit .= " DESC";
            }
            $upit .= " LIMIT ? OFFSET ?";
            $this->dnevnik_rad_s_bazom($veza, "SELECT * FROM kategorija_sudskog_postupka WHERE 1 ORDER BY $atribut_za_sortiranje LIMIT $limit OFFSET $offset");
            $statement = $veza->prepare($upit);
            $statement->bind_param("ii", $limit, $offset);
        } else if ($atribut_za_pretrazivanje != null) {
            switch ($atribut_za_pretrazivanje) {
                case "kategorija_sudskog_postupka_id":
                    $upit .= " AND kategorija_sudskog_postupka_id LIKE ?";
                    break;
                case "naziv":
                    $upit .= " AND naziv LIKE ?";
                    break;
                case "opis":
                    $upit .= " AND opis LIKE ?";
                    break;
            }
            $upit .= " LIMIT ? OFFSET ?";
            $this->dnevnik_rad_s_bazom($veza, "SELECT * FROM kategorija_sudskog_postupka WHERE 1 AND $atribut_za_pretrazivanje LIKE '$vrijednost_za_pretrazivanje' LIMIT $limit OFFSET $offset");
            $statement = $veza->prepare($upit);
            $statement->bind_param("sii", $vrijednost_za_pretrazivanje, $limit, $offset);
        } else {
            $upit .= " LIMIT ? OFFSET ?";
            $statement = $veza->prepare($upit);
            $statement->bind_param("ii", $limit, $offset);
        }
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function kategorija_sudskog_postupka_spremi($atributi) {
        $naziv = $atributi["naziv"];
        $opis = $atributi["opis"];

        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "INSERT INTO kategorija_sudskog_postupka(naziv, opis) VALUES('$naziv', '$opis')");
        $statement = $veza->prepare("INSERT INTO kategorija_sudskog_postupka(naziv, opis) VALUES(?, ?)");
        $statement->bind_param("ss", $naziv, $opis);

        $statement->execute
        ();
    }

    function kategorija_sudskog_postupka_azuriraj($kategorija_sudskog_postupka_id, $atributi) {
        $naziv = (!isset($atributi['naziv'])) ? null : $atributi['naziv'];
        $opis = (!isset($atributi['opis'])) ? null : $atributi['opis'];
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "UPDATE kategorija_sudskog_postupka SET naziv = '$naziv' , opis = '$opis' WHERE kategorija_sudskog_postupka_id = $kategorija_sudskog_postupka_id");
        $statement = $veza->prepare("UPDATE kategorija_sudskog_postupka SET naziv = ? , opis = ? WHERE kategorija_sudskog_postupka_id = ?");
        $statement->bind_param("ssi", $naziv, $opis, $kategorija_sudskog_postupka_id);
        $statement->execute();
    }

    function korisnik_dohvati_moderatore_kategorije($kategorija_sudskog_postupka_id) {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "SELECT korisnik_id, ime_prezime FROM korisnik WHERE kategorija_sudskog_postupka_id = $kategorija_sudskog_postupka_id");
        $statement = $veza->prepare("SELECT korisnik_id, ime_prezime FROM korisnik WHERE kategorija_sudskog_postupka_id = ?");
        $statement->bind_param("i", $kategorija_sudskog_postupka_id);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function korisnik_dohvati_odvjetnike_bez_kategorije() {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "SELECT korisnik_id, ime_prezime FROM korisnik WHERE kategorija_sudskog_postupka_id IS NULL AND uloga_id>2");
        $statement = $veza->prepare("SELECT korisnik_id, ime_prezime FROM korisnik WHERE kategorija_sudskog_postupka_id IS NULL AND uloga_id>2");
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function korisnik_azuriraj_kategorija_sudskog_postupka_id($korisnik_id, $kategorija_sudskog_postupka_id) {
        $veza = $this->veza;
        if ($kategorija_sudskog_postupka_id == null) {
            $this->dnevnik_rad_s_bazom($veza, "UPDATE korisnik SET kategorija_sudskog_postupka_id = null WHERE korisnik_id = $korisnik_id");
            $statement = $veza->prepare("UPDATE korisnik SET kategorija_sudskog_postupka_id = null WHERE korisnik_id = ?");
            $statement->bind_param("i", $korisnik_id);
        } else {
            $this->dnevnik_rad_s_bazom($veza, "UPDATE korisnik SET kategorija_sudskog_postupka_id = $kategorija_sudskog_postupka_id WHERE korisnik_id = $korisnik_id");
            $statement = $veza->prepare("UPDATE korisnik SET kategorija_sudskog_postupka_id = ? WHERE korisnik_id = ?");
            $statement->bind_param("ii", $kategorija_sudskog_postupka_id, $korisnik_id);
        }
        $statement->execute();
    }

    function dnevnik_dohvati_sve($limit, $offset, $atribut_za_sortiranje = null, $smjer_sortiranja = null, $atribut_za_pretrazivanje = null, $vrijednost_za_pretrazivanje = null, $od = null, $do = null) {
        $upit = "SELECT upit,radnja,datum_vrijeme,naziv,korisnicko_ime FROM dnevnik d JOIN tip_zapisa tz ON tz.tip_zapisa_id=d.tip_zapisa_id JOIN korisnik k ON k.korisnik_id=d.korisnik_id WHERE 1";
        $vrijednost_za_pretrazivanje = "%$vrijednost_za_pretrazivanje%";
        $veza = $this->veza;
        if ($atribut_za_pretrazivanje != null && $atribut_za_sortiranje != null && ($od != null && $do != null)) {
            switch ($atribut_za_pretrazivanje) {
                case "upit":
                    $upit .= " AND upit LIKE ?";
                    break;
                case "radnja":
                    $upit .= " AND radnja LIKE ?";
                    break;
                case "datum_vrijeme":
                    $upit .= " AND datum_vrijeme LIKE ?";
                    break;
                case "naziv":
                    $upit .= " AND naziv LIKE ?";
                    break;
                case "korisnicko_ime":
                    $upit .= " AND korisnicko_ime LIKE ?";
                    break;
            }
            $upit .= " AND datum_vrijeme>? AND datum_vrijeme<?";
            switch ($atribut_za_sortiranje) {
                case "upit":
                    $upit .= " ORDER BY upit";
                    break;
                case "radnja":
                    $upit .= " ORDER BY radnja";
                    break;
                case "datum_vrijeme":
                    $upit .= " ORDER BY datum_vrijeme";
                    break;
                case "naziv":
                    $upit .= " ORDER BY naziv";
                    break;
                case "korisnicko_ime":
                    $upit .= " ORDER BY korisnicko_ime";
                    break;
            }
            if ($smjer_sortiranja == "ASC") {
                $upit .= " ASC";
            } else {
                $upit .= " DESC";
            }
            $upit .= " LIMIT ? OFFSET ?";

            $statement = $veza->prepare($upit);
            $statement->bind_param("sssii", $vrijednost_za_pretrazivanje, $od, $do, $limit, $offset);
        } else if ($atribut_za_sortiranje != null && ($od != null && $do != null)) {
            $upit .= " AND datum_vrijeme>? AND datum_vrijeme<?";
            switch ($atribut_za_sortiranje) {
                case "upit":
                    $upit .= " ORDER BY upit";
                    break;
                case "radnja":
                    $upit .= " ORDER BY radnja";
                    break;
                case "datum_vrijeme":
                    $upit .= " ORDER BY datum_vrijeme";
                    break;
                case "naziv":
                    $upit .= " ORDER BY naziv";
                    break;
                case "korisnicko_ime":
                    $upit .= " ORDER BY korisnicko_ime";
                    break;
            }
            if ($smjer_sortiranja == "ASC") {
                $upit .= " ASC";
            } else {
                $upit .= " DESC";
            }
            $upit .= " LIMIT ? OFFSET ?";
            $statement = $veza->prepare($upit);
            $statement->bind_param("ssii", $od, $do, $limit, $offset);
        } else if ($atribut_za_pretrazivanje != null && ($od != null && $do != null)) {
            switch ($atribut_za_pretrazivanje) {
                case "upit":
                    $upit .= " AND upit LIKE ?";
                    break;
                case "radnja":
                    $upit .= " AND radnja LIKE ?";
                    break;
                case "datum_vrijeme":
                    $upit .= " AND datum_vrijeme LIKE ?";
                    break;
                case "naziv":
                    $upit .= " AND naziv LIKE ?";
                    break;
                case "korisnicko_ime":
                    $upit .= " AND korisnicko_ime LIKE ?";
                    break;
            }
            $upit .= " AND datum_vrijeme>? AND datum_vrijeme<?";
            $upit .= " LIMIT ? OFFSET ?";

            $statement = $veza->prepare($upit);
            $statement->bind_param("sssii", $vrijednost_za_pretrazivanje, $od, $do, $limit, $offset);
        } else if ($atribut_za_pretrazivanje != null && $atribut_za_sortiranje != null) {
            switch ($atribut_za_pretrazivanje) {
                case "upit":
                    $upit .= " AND upit LIKE ?";
                    break;
                case "radnja":
                    $upit .= " AND radnja LIKE ?";
                    break;
                case "datum_vrijeme":
                    $upit .= " AND datum_vrijeme LIKE ?";
                    break;
                case "naziv":
                    $upit .= " AND naziv LIKE ?";
                    break;
                case "korisnicko_ime":
                    $upit .= " AND korisnicko_ime LIKE ?";
                    break;
            }
            switch ($atribut_za_sortiranje) {
                case "upit":
                    $upit .= " ORDER BY upit";
                    break;
                case "radnja":
                    $upit .= " ORDER BY radnja";
                    break;
                case "datum_vrijeme":
                    $upit .= " ORDER BY datum_vrijeme";
                    break;
                case "naziv":
                    $upit .= " ORDER BY naziv";
                    break;
                case "korisnicko_ime":
                    $upit .= " ORDER BY korisnicko_ime";
                    break;
            }
            if ($smjer_sortiranja == "ASC") {
                $upit .= " ASC";
            } else {
                $upit .= " DESC";
            }
            $upit .= " LIMIT ? OFFSET ?";

            $statement = $veza->prepare($upit);
            $statement->bind_param("sii", $vrijednost_za_pretrazivanje, $limit, $offset);
        } else if ($atribut_za_sortiranje != null) {

            switch ($atribut_za_sortiranje) {
                case "upit":
                    $upit .= " ORDER BY upit";
                    break;
                case "radnja":
                    $upit .= " ORDER BY radnja";
                    break;
                case "datum_vrijeme":
                    $upit .= " ORDER BY datum_vrijeme";
                    break;
                case "naziv":
                    $upit .= " ORDER BY naziv";
                    break;
                case "korisnicko_ime":
                    $upit .= " ORDER BY korisnicko_ime";
                    break;
            }
            if ($smjer_sortiranja == "ASC") {
                $upit .= " ASC";
            } else {
                $upit .= " DESC";
            }
            $upit .= " LIMIT ? OFFSET ?";
            $statement = $veza->prepare($upit);
            $statement->bind_param("ii", $limit, $offset);
        } else if ($atribut_za_pretrazivanje != null) {
            switch ($atribut_za_pretrazivanje) {
                case "upit":
                    $upit .= " AND upit LIKE ?";
                    break;
                case "radnja":
                    $upit .= " AND radnja LIKE ?";
                    break;
                case "datum_vrijeme":
                    $upit .= " AND datum_vrijeme LIKE ?";
                    break;
                case "naziv":
                    $upit .= " AND naziv LIKE ?";
                    break;
                case "korisnicko_ime":
                    $upit .= " AND korisnicko_ime LIKE ?";
                    break;
            }
            $upit .= " LIMIT ? OFFSET ?";

            $statement = $veza->prepare($upit);
            $statement->bind_param("sii", $vrijednost_za_pretrazivanje, $limit, $offset);
        } else if ($od != null && $do != null) {
            $upit .= " AND datum_vrijeme>? AND datum_vrijeme<?";
            $upit .= " LIMIT ? OFFSET ?";

            $statement = $veza->prepare($upit);
            $statement->bind_param("ssii", $od, $do, $limit, $offset);
        } else {
            $upit .= " LIMIT ? OFFSET ?";
            $statement = $veza->prepare($upit);
            $statement->bind_param("ii", $limit, $offset);
        }
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function korisnik_dohvati_rang_listu($od = null, $do = null) {
        $upit = "SELECT k.ime_prezime,k.korisnicko_ime,k.email,ksp.naziv,count(zzo.zahtjev_id) AS br_prihvacenih_zahtjeva FROM korisnik k LEFT JOIN zahtjev_za_odvjetnikom zzo ON zzo.odvjetnik_id=k.korisnik_id LEFT JOIN kategorija_sudskog_postupka ksp ON ksp.kategorija_sudskog_postupka_id=k.kategorija_sudskog_postupka_id WHERE zzo.status=1 AND k.uloga_id>2 AND zzo.datum_vrijeme_slanja>? AND zzo.datum_vrijeme_slanja<? GROUP BY k.korisnik_id UNION SELECT k.ime_prezime,k.korisnicko_ime,k.email,ksp.naziv,COUNT(NULL) AS br_prihvacenih_zahtjeva FROM korisnik k LEFT JOIN zahtjev_za_odvjetnikom zzo ON zzo.odvjetnik_id=k.korisnik_id LEFT JOIN kategorija_sudskog_postupka ksp ON ksp.kategorija_sudskog_postupka_id=k.kategorija_sudskog_postupka_id WHERE k.uloga_id>2 AND k.korisnik_id NOT IN (select k.korisnik_id AS br_prihvacenih_zahtjeva FROM korisnik k LEFT JOIN zahtjev_za_odvjetnikom zzo ON zzo.odvjetnik_id=k.korisnik_id WHERE zzo.status=1 AND k.uloga_id>2 AND zzo.datum_vrijeme_slanja>? AND zzo.datum_vrijeme_slanja<? GROUP BY k.korisnik_id) GROUP BY k.korisnik_id ORDER BY br_prihvacenih_zahtjeva DESC";
        if ($od == null || $do == null) {
            $od = '1970-01-01';
            $do = '9999-01-01';
        }
        $veza = $this->veza;
        $statement = $veza->prepare($upit);
        $statement->bind_param("ssss", $od, $do, $od, $do);

        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function sudski_postupak_dohvati_galeriju($limit, $offset, $atribut_za_sortiranje = null, $smjer_sortiranja = null, $atribut_za_pretrazivanje = null, $vrijednost_za_pretrazivanje = null) {
        $upit = "SELECT slika_sudskog_postupka, DATEDIFF(datum_vrijeme_zavrsetka,datum_vrijeme_pocetka) AS vrijeme_trajanja,ime_prezime AS tuzitelj,zakljucak_postupka FROM sudski_postupak sp LEFT JOIN korisnik k ON k.korisnik_id=sp.tuzitelj_id JOIN zahtjev_za_odvjetnikom zzo ON zzo.sudski_postupak_id=sp.sudski_postupak_id WHERE 1";
        $vrijednost_za_pretrazivanje = "%$vrijednost_za_pretrazivanje%";
        $veza = $this->veza;
        if ($atribut_za_pretrazivanje != null && $atribut_za_sortiranje != null) {
            switch ($atribut_za_pretrazivanje) {
                case "tuzitelj":
                    $upit .= " AND ime_prezime LIKE ?";
                    break;
            }
            switch ($atribut_za_sortiranje) {
                case "vrijeme_trajanja":
                    $upit .= " ORDER BY vrijeme_trajanja";
                    break;
                case "zakljucak_postupka":
                    $upit .= " ORDER BY zakljucak_postupka";
                    break;
            }
            if ($smjer_sortiranja == "ASC") {
                $upit .= " ASC";
            } else {
                $upit .= " DESC";
            }
            $upit .= " LIMIT ? OFFSET ?";

            $statement = $veza->prepare($upit);
            $statement->bind_param("sii", $vrijednost_za_pretrazivanje, $limit, $offset);
        } else if ($atribut_za_sortiranje != null) {
            switch ($atribut_za_sortiranje) {
                case "vrijeme_trajanja":
                    $upit .= " ORDER BY vrijeme_trajanja";
                    break;
                case "zakljucak_postupka":
                    $upit .= " ORDER BY zakljucak_postupka";
                    break;
            }
            if ($smjer_sortiranja == "ASC") {
                $upit .= " ASC";
            } else {
                $upit .= " DESC";
            }
            $upit .= " LIMIT ? OFFSET ?";
            $statement = $veza->prepare($upit);
            $statement->bind_param("ii", $limit, $offset);
        } else if ($atribut_za_pretrazivanje != null) {
            switch ($atribut_za_pretrazivanje) {
                case "tuzitelj":
                    $upit .= " AND ime_prezime LIKE ?";
                    break;
            }
            $upit .= " LIMIT ? OFFSET ?";

            $statement = $veza->prepare($upit);
            $statement->bind_param("sii", $vrijednost_za_pretrazivanje, $limit, $offset);
        } else {
            $upit .= " LIMIT ? OFFSET ?";
            $statement = $veza->prepare($upit);
            $statement->bind_param("ii", $limit, $offset);
        }
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function korisnik_dohvati_sve_moderatore_ispunjeni_uvjeti($limit, $offset, $atribut_za_sortiranje = null, $smjer_sortiranja = null, $broj_sudskih_postupaka, $broj_primljenih_zahtjeva, $broj_danih_savjetovanja) {
        $upit = "SELECT korisnik_id,korisnicko_ime,ime_prezime,email,(SELECT count(sp.sudski_postupak_id) FROM sudski_postupak sp WHERE sp.tuzitelj_id=k.korisnik_id) AS broj_sudskih_postupaka,(SELECT count(zzo.zahtjev_id) FROM zahtjev_za_odvjetnikom zzo WHERE zzo.odvjetnik_id=k.korisnik_id) AS broj_prihvacenih_zahtjeva,(SELECT count(pso.odgovor_id) FROM pravno_savjetovanje_odgovor pso LEFT JOIN pravno_savjetovanje_pitanje psp ON psp.pitanje_id=pso.pitanje_id WHERE psp.odvjetnik_id=k.korisnik_id) AS broj_danih_savjetovanja FROM korisnik k WHERE uloga_id=3 HAVING broj_sudskih_postupaka>=? AND broj_prihvacenih_zahtjeva>=? AND broj_danih_savjetovanja>=?";
        $veza = $this->veza;
        if ($atribut_za_sortiranje != null) {
            switch ($atribut_za_sortiranje) {
                case "korisnicko_ime":
                    $upit .= " ORDER BY korisnicko_ime";
                    break;
                case "korisnik_id":
                    $upit .= " ORDER BY korisnik_id";
                    break;
                case "ime_prezime":
                    $upit .= " ORDER BY ime_prezime";
                    break;
                case "email":
                    $upit .= " ORDER BY email";
                    break;
                case "broj_sudskih_postupaka":
                    $upit .= " ORDER BY broj_sudskih_postupaka";
                    break;
                case "broj_prihvacenih_zahtjeva":
                    $upit .= " ORDER BY broj_prihvacenih_zahtjeva";
                    break;
                case "broj_danih_savjetovanja":
                    $upit .= " ORDER BY broj_danih_savjetovanja";
                    break;
            }
            if ($smjer_sortiranja == "ASC") {
                $upit .= " ASC";
            } else {
                $upit .= " DESC";
            }
            $upit .= " LIMIT ? OFFSET ?";

            $statement = $veza->prepare($upit);
            $statement->bind_param("iiiii", $broj_sudskih_postupaka, $broj_primljenih_zahtjeva, $broj_danih_savjetovanja, $limit, $offset);
        } else {
            $upit .= " LIMIT ? OFFSET ?";

            $statement = $veza->prepare($upit);
            $statement->bind_param("iiiii", $broj_sudskih_postupaka, $broj_primljenih_zahtjeva, $broj_danih_savjetovanja, $limit, $offset);
        }
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function korisnik_azuriraj_promoviran_id($korisnik_id) {
        $veza = $this->veza;
        $this->dnevnik_rad_s_bazom($veza, "UPDATE korisnik SET uloga_id = 4 WHERE korisnik_id = $korisnik_id");
        $statement = $veza->prepare("UPDATE korisnik SET uloga_id = 4 WHERE korisnik_id = ?");
        $statement->bind_param("i", $korisnik_id);
        $statement->execute();
    }

//    function dohvatiSveDB($naziv_tablice, $sortiranje = '') {
//
//        $upit = "select * from " . $naziv_tablice;
//
//        if ($sortiranje != '') {
//            $upit .= " ORDER BY " . $sortiranje['atribut'] . " " . $sortiranje['smjer'];
//        }
//
//        $rezultat = $this->selectDB($upit);
//        $nazivi_stupaca = array();
//        if ($red = mysqli_fetch_assoc($rezultat)) {
//            foreach ($red as $kljuc => $vrijednost) {
//                $nazivi_stupaca[] = $kljuc;
//            }
//        }
//        mysqli_data_seek($rezultat, 0);
//        $redovi = array();
//        while ($red = mysqli_fetch_assoc($rezultat)) {
//            $redovi[] = $red;
//        }
//        $tablica = array('nazivi_stupaca' => $nazivi_stupaca, 'redovi' => $redovi);
//        return $tablica;
//    }
//    function pronadiUTablici($naziv_tablice, $naziv_atributa, $podatak) {
//        $rezultat = $this->dohvatiSveDB($naziv_tablice);
//
//        $nazivi_stupaca = $rezultat['nazivi_stupaca'];
//        $redovi = $rezultat['redovi'];
//
//        $indeks_atributa = array_search($naziv_atributa, $nazivi_stupaca);
//
//        if (!$indeks_atributa) {
//
//            return false;
//        }
//        $pronadeno = false;
//        if ($indeks_atributa) {
//            foreach ($redovi as $red) {
//                if ($red[$naziv_atributa] === $podatak) {
//                    return true;
//                }
//            }
//        }
//
//        return false;
//    }
//    function dodajUTablicu($naziv_tablice, $niz_vrijednosti) {
//        $zagrada_s_vrijednostima = "(";
//        for ($i = 0; $i < count($niz_vrijednosti) - 1; $i++) {
//            $zagrada_s_vrijednostima .= $niz_vrijednosti[$i] . ", ";
//        }
//        $zagrada_s_vrijednostima .= $niz_vrijednosti[$i] . ")";
//
//        $upit = "insert into " . $naziv_tablice . " values " . $zagrada_s_vrijednostima;
//        return $this->updateDB($upit);
//    }
//    function azurirajRedakTablice($naziv_tablice, $atributi_za_azuriranje, $identifikator, $identifikator_vrijednost) {
//        $upit = "UPDATE $naziv_tablice SET ";
//        foreach ($atributi_za_azuriranje as $atribut => $vrijednost) {
//            $upit .= $atribut . " = " . (is_string($vrijednost) ? "'$vrijednost' " : $vrijednost) . ", ";
//        }
//        $upit = substr($upit, 0, strlen($upit) - 1);
//
//        $upit .= " WHERE $identifikator = $identifikator_vrijednost";
//
//        return $this->updateDB($upit);
//    }
//
//    function dohvatiKorisnika($id) {
//        $rezultat = $this->selectDB("SELECT * FROM DZ4_korisnik WHERE korisnik_id = $id");
//        if (isset($rezultat)) {
//            return mysqli_fetch_assoc($rezultat);
//        }
//        return false;
//    }
//    function validirajKorisnika($korisnicko_ime, $lozinka) {
//        $rezultat = $this->selectDB("SELECT * FROM DZ4_korisnik WHERE korisnicko_ime = '$korisnicko_ime'");
//        if ($rezultat['lozinka'] === $lozinka) {
//            return true;
//        }
//        return false;
//    }
//
//    function dohvatiKorisnika_korisnicko_ime($korime) {
//        $rezultat = $this->selectDB("SELECT * FROM DZ4_korisnik WHERE korisnicko_ime = '$korime'");
//        if (isset($rezultat)) {
//            return mysqli_fetch_assoc($rezultat);
//        }
//        return false;
//    }
//
//    function obrisiKorisnika($id) {
//
//        return $this->updateDB("DELETE from DZ4_korisnik WHERE korisnik_id = " . $id);
//    }
//
//    function dohvatiStranicu($offset, $limit) {
//        $rezultat = $this->selectDB("SELECT * FROM DZ4_dnevnik ORDER BY korisnik_id LIMIT $limit OFFSET $offset");
//        if (isset($rezultat)) {
//            $redovi = array();
//            while ($red = mysqli_fetch_assoc($rezultat)) {
//                $redovi[] = $red;
//            }
//            $tablica = array('redovi' => $redovi);
//            return $tablica;
//        }
//        return false;
//    }
}

?>