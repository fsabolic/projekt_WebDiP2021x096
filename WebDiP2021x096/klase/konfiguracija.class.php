<?php

class Konfiguracija {

    private $naziv_datoteke = "";
    private $trajanje_kolacica = 2; //dana
    private $broj_stranica_stranicenja = 5;
    private $trajanje_sesije = 1; //sati
    private $broj_neuspjesnih_prijava = 3;
    private $pomak = 0;
    private $broj_sudskih_postupaka = 5;
    private $broj_zahtjeva = 5;
    private $broj_odgovora = 5;
    private $istek_verifikacije = 7;
    private $u_izradi = 0;
    private $datoteka = null;

    public function __construct($direktorij) {
        $this->naziv_datoteke = "$direktorij/configs/konfiguracija.config";
        if (($this->datoteka = fopen($this->naziv_datoteke, 'r')) == false) {
            if (fopen($this->naziv_datoteke, 'w') == false) {
                echo "Konfiguracijska datoteka nije uspješno stvorena!";
                exit();
            } else {
                $this->spremiKonfiguraciju();
            }
        } else {
            fclose($this->datoteka);
            $this->procitajKonfiguraciju();
        }
    }

    public function postaviKonfiguraciju($trajanje_kolacica = null, $broj_stranica_stranicenja = null, $trajanje_sesije = null, $broj_neuspjesnih_prijava = null, $pomak = null, $broj_sudskih_postupaka = null, $broj_zahtjeva = null, $broj_odgovora = null, $istek_verifikacije = null, $u_izradi = null) {
        if ($trajanje_kolacica !== null)
            $this->postaviTrajanjeKolacica($trajanje_kolacica);
        if ($broj_stranica_stranicenja !== null)
            $this->postaviBrojStranicaStranicenja($broj_stranica_stranicenja);
        if ($trajanje_sesije !== null)
            $this->postaviTrajanjeSesije($trajanje_sesije);
        if ($broj_neuspjesnih_prijava !== null)
            $this->postaviBrojNeuspjesnihPrijava($broj_neuspjesnih_prijava);
        if ($pomak !== null)
            $this->postaviPomak($pomak);
        if ($broj_sudskih_postupaka !== null)
            $this->postaviBrojSudskihPostupaka($broj_sudskih_postupaka);
        if ($broj_zahtjeva !== null)
            $this->postaviBrojZahtjeva($broj_zahtjeva);
        if ($broj_odgovora !== null)
            $this->postaviBrojOdgovora($broj_odgovora);
        if ($istek_verifikacije !== null)
            $this->postaviIstekVerifikacije($istek_verifikacije);
        if ($u_izradi !== null)
            $this->postaviUIzradi($u_izradi);
    }

    public function procitajKonfiguraciju() {
        if (($this->datoteka = fopen($this->naziv_datoteke, 'r')) == false) {
            echo "Greška u otvaranju datoteke";
            exit();
        }

        $vrijednosti_konfiguracije = array();
        while (($postavka = fgets($this->datoteka)) !== false) {
            $postavka = str_replace(["\r", "\n", " "], "", $postavka);
            $razdvojena_postavka = explode("=", $postavka);
            $naziv_postavke = $razdvojena_postavka[0];
            $vrijednost_postavke = $razdvojena_postavka[1];
            $vrijednosti_konfiguracije[$naziv_postavke] = $vrijednost_postavke;
        }
        fclose($this->datoteka);
        $this->postaviKonfiguraciju($vrijednosti_konfiguracije['trajanje_kolacica'], $vrijednosti_konfiguracije['broj_stranica_stranicenja'],
                $vrijednosti_konfiguracije['trajanje_sesije'], $vrijednosti_konfiguracije['broj_neuspjesnih_prijava'], $vrijednosti_konfiguracije['pomak'], $vrijednosti_konfiguracije['broj_sudskih_postupaka'], $vrijednosti_konfiguracije['broj_zahtjeva'], $vrijednosti_konfiguracije['broj_odgovora'], $vrijednosti_konfiguracije['istek_verifikacije'], $vrijednosti_konfiguracije['u_izradi']);
        return $vrijednosti_konfiguracije;
    }

    public function spremiKonfiguraciju() {
        if (($this->datoteka = fopen($this->naziv_datoteke, 'w')) === false) {
            echo "Greška u otvaranju datoteke";
            exit();
        }
        $postavke_za_spremanje = "trajanje_kolacica=" . $this->vratiTrajanjeKolacica() .
                "\nbroj_stranica_stranicenja=" . $this->vratiBrojStranicaStranicenja() .
                "\ntrajanje_sesije=" . $this->vratiTrajanjeSesije() .
                "\nbroj_neuspjesnih_prijava=" . $this->vratiBrojNeuspjesnihPrijava() .
                "\npomak=" . $this->vratiPomak() .
                "\nbroj_sudskih_postupaka=" . $this->vratiBrojSudskihPostupaka() .
                "\nbroj_zahtjeva=" . $this->vratiBrojZahtjeva() .
                "\nbroj_odgovora=" . $this->vratiBrojOdgovora() .
                "\nistek_verifikacije=" . $this->vratiIstekVerifikacije() .
                "\nu_izradi=" . $this->vratiUIzradi() . "\n";
        fwrite($this->datoteka, $postavke_za_spremanje);
        fclose($this->datoteka);
    }

    public function postaviTrajanjeKolacica($trajanje_kolacica) {
        $this->trajanje_kolacica = $trajanje_kolacica;
    }

    public function postaviBrojStranicaStranicenja($broj_stranica_stranicenja) {
        $this->broj_stranica_stranicenja = $broj_stranica_stranicenja;
    }

    public function postaviTrajanjeSesije($trajanje_sesije) {
        $this->trajanje_sesije = $trajanje_sesije;
    }

    public function postaviBrojNeuspjesnihPrijava($broj_neuspjesnih_prijava) {
        $this->broj_neuspjesnih_prijava = $broj_neuspjesnih_prijava;
    }

    public function postaviPomak($pomak) {
        $this->pomak = $pomak;
    }

    public function postaviBrojSudskihPostupaka($broj_sudskih_postupaka) {
        $this->broj_sudskih_postupaka = $broj_sudskih_postupaka;
    }

    public function postaviBrojZahtjeva($broj_zahtjeva) {
        $this->broj_zahtjeva = $broj_zahtjeva;
    }

    public function postaviBrojOdgovora($broj_odgovora) {
        $this->broj_odgovora = $broj_odgovora;
    }

    public function postaviIstekVerifikacije($istek_verifikacije) {
        $this->istek_verifikacije = $istek_verifikacije;
    }

    public function postaviUIzradi($u_izradi) {
        $this->u_izradi = $u_izradi;
    }

    public function vratiTrajanjeKolacica() {
        return $this->trajanje_kolacica;
    }

    public function vratiBrojStranicaStranicenja() {
        return $this->broj_stranica_stranicenja;
    }

    public function vratiTrajanjeSesije() {
        return $this->trajanje_sesije;
    }

    public function vratiBrojNeuspjesnihPrijava() {
        return $this->broj_neuspjesnih_prijava;
    }

    public function vratiPomak() {
        return $this->pomak;
    }

    public function vratiBrojSudskihPostupaka() {
        return $this->broj_sudskih_postupaka;
    }

    public function vratiBrojZahtjeva() {
        return $this->broj_zahtjeva;
    }

    public function vratiBrojOdgovora() {
        return $this->broj_odgovora;
    }

    public function vratiIstekVerifikacije() {
        return $this->istek_verifikacije;
    }

    public function vratiUIzradi() {
        return $this->u_izradi;
    }

    public function virtualnoVrijeme() {
        $this->procitajKonfiguraciju();
        $pomak = $this->vratiPomak();
        return date('Y-m-d H:i:s', time() + ($pomak * 60 * 60));
    }

}
