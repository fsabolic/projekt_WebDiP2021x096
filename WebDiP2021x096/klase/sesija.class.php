<?php

/*
 * The MIT License
 *
 * Copyright 2014 Matija Novak <matija.novak@foi.hr>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 * 
 * Klasa za upravljanje sa sesijama
 *
 * @author Matija Novak <matija.novak@foi.hr>
 */

class Sesija {

    const KORISNICKO_IME = "korisnicko_ime";
    const ULOGA = "uloga";
    const ULOGA_ID = "uloga_id"; // konstanta uloga
    const KOSARICA = "kosarica";
    const SESSION_NAME = "sesija";
    const KORISNIK_ID = "korisnik_id";

    static function kreirajSesiju() {
        if (session_id() == "") {
            session_name(self::SESSION_NAME);
            @session_start();
        }
    }

    static function postojiSesija() {
        return !(session_id() == "");
    }

    static function korisnikJeKreiran() {
        return (isset($_SESSION['korisnicko_ime']) && isset($_SESSION['uloga']) && isset($_SESSION['korisnik_id']) & isset($_SESSION['uloga_id']));
    }

    static function kreirajKorisnika($korisnik_id, $uloga_id, $korisnicko_ime) {
        self::kreirajSesiju();
        $_SESSION[self::KORISNIK_ID] = $korisnik_id;
        $_SESSION[self::ULOGA_ID] = $uloga_id;
        $_SESSION[self::KORISNICKO_IME] = $korisnicko_ime;
        $uloga = "";
        switch ($uloga_id) {
            case 1:
                $uloga = "Neregistriran";
                break;
            case 2:
                $uloga = "Klijent";
                break;
            case 3:
                $uloga = "Odvjetnik";
                break;
            case 4:
                $uloga = "Partner";
                break;
        }
        $_SESSION[self::ULOGA] = $uloga;
    }

    static function kreirajKosaricu($kosarica) {
        self::kreirajSesiju();
        $_SESSION[self::KOSARICA] = $kosarica;
    }

    static function dajKorisnika() {
        self::kreirajSesiju();
        if (isset($_SESSION[self::KORISNIK])) {
            $korisnik[self::KORISNIK] = $_SESSION[self::KORISNIK];
            $korisnik[self::ULOGA] = $_SESSION[self::ULOGA];
            $korisnik[self::KORISNIK_ID] = $korisnik_id;
        } else {
            return null;
        }
        return $korisnik; // vraca asocijativni niz korisnik
    }

    static function dajKosaricu() {
        self::kreirajSesiju();
        if (isset($_SESSION[self::KOSARICA])) {
            $kosarica = $_SESSION[self::KOSARICA];
        } else {
            return null;
        }
        return $kosarica;
    }

    /**
     * Odjavljuje korisnika tj. briše sesiju
     */
    static function obrisiSesiju() {
        if (session_id() != "") {
            session_unset();
            session_destroy();
        }
    }

}
