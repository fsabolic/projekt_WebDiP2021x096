<div class="opcenito--tablica-wrapper-wrapper">
    <div class="opcenito--tablica-wrapper">
        <h2 class="opcenito--tablica--naslov-tablice">Rang lista odvjetnika</h2>

        <div class="opcenito--tablica-zaglavlje">
        </div>
        <table class="opcenito--tablica">
            <thead>
                <tr>
                    <th id="ime_prezime">Ime prezime</th>
                    <th id="korisnicko_ime">Korisničko ime</th>
                    <th id="email">E-mail</th>
                    <th id="naziv">Kategorija</th>
                    <th id="br_prihvacenih_zahtjeva">Broj prihvaćenih zahtjeva</th>
                </tr>    
            </thead>
            <tbody>

            </tbody>
        </table>
        <div class="opcenito--tablica-podnozje">
        </div>
    </div>
</div>
<div style="display: inline;float:left;text-align: center;margin-top: 60px;">
    <input id="od" name="od" type="date" style="border:2px #328cc1 solid;border-radius: 10px;margin-right:10px;" value="">
    <input id="do" name="do" type="date" style="border:2px #328cc1 solid;border-radius: 10px;margin-left:10px;" value="">
    <div class="button-wrapper"><button class="opcenito--obican-gumb" id="filter">Filtriraj</button>
    </div>
</div>

{*SELECT k.ime_prezime,k.korisnicko_ime,k.email,ksp.naziv,count(zzo.zahtjev_id) AS br_prihvacenih_zahtjeva FROM korisnik k LEFT JOIN zahtjev_za_odvjetnikom zzo ON zzo.odvjetnik_id=k.korisnik_id LEFT JOIN kategorija_sudskog_postupka ksp ON ksp.kategorija_sudskog_postupka_id=k.kategorija_sudskog_postupka_id WHERE zzo.status=1 AND k.uloga_id>2 AND zzo.datum_vrijeme_slanja>? AND zzo.datum_vrijeme_slanja<? GROUP BY k.korisnik_id UNION SELECT k.ime_prezime,k.korisnicko_ime,k.email,ksp.naziv,COUNT(NULL) AS br_prihvacenih_zahtjeva FROM korisnik k LEFT JOIN zahtjev_za_odvjetnikom zzo ON zzo.odvjetnik_id=k.korisnik_id LEFT JOIN kategorija_sudskog_postupka ksp ON ksp.kategorija_sudskog_postupka_id=k.kategorija_sudskog_postupka_id WHERE k.uloga_id>2 AND k.korisnik_id NOT IN (select k.korisnik_id AS br_prihvacenih_zahtjeva FROM korisnik k LEFT JOIN zahtjev_za_odvjetnikom zzo ON zzo.odvjetnik_id=k.korisnik_id WHERE zzo.status=1 AND k.uloga_id>2 AND zzo.datum_vrijeme_slanja>? AND zzo.datum_vrijeme_slanja<? GROUP BY k.korisnik_id) GROUP BY k.korisnik_id ORDER BY br_prihvacenih_zahtjeva DESC*}

{*SELECT k.ime_prezime,count(zzo.zahtjev_id) AS br_prihvacenih_zahtjeva FROM korisnik k LEFT JOIN zahtjev_za_odvjetnikom zzo ON zzo.odvjetnik_id=k.korisnik_id WHERE zzo.status=1 AND k.uloga_id>2 AND zzo.datum_vrijeme_slanja>? AND zzo.datum_vrijeme_slanja<? GROUP BY k.korisnik_id UNION SELECT k.ime_prezime,COUNT(NULL) AS br_prihvacenih_zahtjeva FROM korisnik k LEFT JOIN zahtjev_za_odvjetnikom zzo ON zzo.odvjetnik_id=k.korisnik_id WHERE k.uloga_id>2 AND k.korisnik_id NOT IN (select k.korisnik_id AS br_prihvacenih_zahtjeva FROM korisnik k LEFT JOIN zahtjev_za_odvjetnikom zzo ON zzo.odvjetnik_id=k.korisnik_id WHERE zzo.status=1 AND k.uloga_id>2 AND zzo.datum_vrijeme_slanja>? AND zzo.datum_vrijeme_slanja<? GROUP BY k.korisnik_id) GROUP BY k.korisnik_id ORDER BY br_prihvacenih_zahtjeva DESC*}