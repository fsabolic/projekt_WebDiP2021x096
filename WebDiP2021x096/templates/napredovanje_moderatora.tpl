<div class="opcenito--tablica-wrapper-wrapper">
    <div class="opcenito--tablica-wrapper">
        <h2 class="opcenito--tablica--naslov-tablice">Napredovanje moderatora</h2>
        <div class="opcenito--tablica-zaglavlje">
            <div class="opcenito--tablica-zaglavlje-pretrazivanje">
                
            </div>
        </div>
        <table class="opcenito--tablica">
            <thead>
                <tr>
                    
                    <th id="korisnik_id" class="opcenito--tablica-zaglavlje-hover">ID korisnika</th>
                    
                    <th id="korisnicko_ime" class="opcenito--tablica-zaglavlje-hover">Korisničko ime</th>

                    <th id="ime_prezime" class="opcenito--tablica-zaglavlje-hover">Ime i prezime</th>

                    <th id="email" class="opcenito--tablica-zaglavlje-hover">E-mail</th>

                    <th id="broj_sudskih_postupaka" class="opcenito--tablica-zaglavlje-hover">Pokrenuti sudski postupci</th>

                    <th id="broj_prihvacenih_zahtjeva" class="opcenito--tablica-zaglavlje-hover">Prihvaćeni zahtjevi</th>

                    <th id="broj_danih_savjetovanja" class="opcenito--tablica-zaglavlje-hover">Dana savjetovanja</th>

                    <th id="h--promoviraj" >Promoviraj</th>
                </tr>    
            </thead>
            <tbody>

            </tbody>
        </table>
        <div class="opcenito--tablica-podnozje">
            <div class="button-wrapper"><button class="opcenito--obican-gumb" id="prva">Prva</button></div>
            <div class="button-wrapper"><button class="opcenito--obican-gumb" id="prijasnja">Prijašnja</button></div>
            <div class="button-wrapper"><button class="opcenito--obican-gumb" id="sljedeca">Sljedeća</button></div>
            <div class="button-wrapper"><button class="opcenito--obican-gumb" id="posljednja">Posljednja</button></div>
        </div>
    </div>
</div>

<input id="atribut_za_sortiranje" name="atribut_za_sortiranje" value="" hidden>
<input id="smjer_sortiranja" name="smjer_sortiranja" value="ASC" hidden>
<input id="broj_stranice" name="broj_stranice" value="0" hidden>


{*SELECT k.ime_prezime,k.korisnicko_ime,k.email,count(sp.sudski_postupak_id) AS broj_sudskih_postupaka, count(zzo.zahtjev_id) AS broj_prihvacenih_zahtjeva,count(psp.pitanje_id) AS broj_danih_savjetovanja FROM korisnik k LEFT JOIN sudski_postupak sp ON sp.tuzitelj_id=k.korisnik_id LEFT JOIN zahtjev_za_odvjetnikom zzo ON zzo.odvjetnik_id=k.korisnik_id LEFT JOIN pravno_savjetovanje_pitanje psp ON k.korisnik_id=psp.odvjetnik_id LEFT JOIN pravno_savjetovanje_odgovor pso ON pso.pitanje_id=psp.pitanje_id  WHERE k.uloga_id>2 AND zzo.status=1 AND pso.datum_vrijeme_odgovaranja IS NOT NULL GROUP BY k.korisnik_id HAVING broj_sudskih_postupaka>= 0 AND broj_prihvacenih_zahtjeva>=1 AND broj_danih_savjetovanja>=1*}

{*SELECT korisnik_id,korisnicko_ime,ime_prezime,email,(SELECT count(sp.sudski_postupak_id) FROM sudski_postupak sp WHERE sp.tuzitelj_id=k.korisnik_id) AS broj_sudskih_postupaka,(SELECT count(zzo.zahtjev_id) FROM zahtjev_za_odvjetnikom zzo WHERE zzo.odvjetnik_id=k.korisnik_id) AS broj_prihvacenih_zahtjeva,(SELECT count(pso.odgovor_id) FROM pravno_savjetovanje_odgovor pso LEFT JOIN pravno_savjetovanje_pitanje psp ON psp.pitanje_id=pso.pitanje_id WHERE psp.odvjetnik_id=k.korisnik_id) AS broj_danih_savjetovanja FROM korisnik k WHERE uloga_id>2 HAVING broj_sudskih_postupaka>0 OR broj_prihvacenih_zahtjeva>0 OR broj_danih_savjetovanja>0*}

{*SELECT korisnik_id,korisnicko_ime,ime_prezime,email,(SELECT count(sp.sudski_postupak_id) FROM sudski_postupak sp WHERE sp.tuzitelj_id=k.korisnik_id) AS broj_sudskih_postupaka,(SELECT count(zzo.zahtjev_id) FROM zahtjev_za_odvjetnikom zzo WHERE zzo.odvjetnik_id=k.korisnik_id) AS broj_prihvacenih_zahtjeva,(SELECT count(pso.odgovor_id) FROM pravno_savjetovanje_odgovor pso LEFT JOIN pravno_savjetovanje_pitanje psp ON psp.pitanje_id=pso.pitanje_id WHERE psp.odvjetnik_id=k.korisnik_id) AS broj_danih_savjetovanja FROM korisnik k WHERE uloga_id>2 HAVING broj_sudskih_postupaka>? AND broj_prihvacenih_zahtjeva>? AND broj_danih_savjetovanja>?*}