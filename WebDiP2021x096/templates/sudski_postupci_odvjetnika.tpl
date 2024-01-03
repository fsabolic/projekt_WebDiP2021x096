<div class="opcenito--tablica-wrapper-wrapper">
    <div class="opcenito--tablica-wrapper">
        <h2 class="opcenito--tablica--naslov-tablice">Sudski postupci odvjetnika</h2>
        <div class="opcenito--tablica-zaglavlje">
            <div class="button-wrapper"><button class="opcenito--vazan-gumb" id="dodaj" name="dodaj">+ Dodaj sudski postupak</button></div>
            <div class="opcenito--tablica-zaglavlje-pretrazivanje">
                <div class="opcenito--tablica-zaglavlje-pretrazivanje-input">
                    <label for="pretrazi">Pretraži</label>
                    <input type="text" name="pretrazi" id="pretrazi">
                </div>
                <select id="atribut_za_pretrazivanje">
                    <option id="sp.sudski_postupak_id" name="sp.sudski_postupak_id" value="sp.sudski_postupak_id">ID sudskog postupka</option>
                    <option id="sp.naziv" name="sp.naziv" value="sp.naziv">Naziv sudskog postupka</option>
                    <option id="sp.protuzakonita_radnja" name="sp.protuzakonita_radnja" value="sp.protuzakonita_radnja">Protuzakonita radnja</option>
                    <option id="sp.dokaz" name="sp.dokaz" value="sp.dokaz">Dokaz</option>
                    <option id="sp.datum_vrijeme_pocetka" name="sp.datum_vrijeme_pocetka" value="sp.datum_vrijeme_pocetka">Datum i vrijeme početka</option>
                    <option id="sp.klijent_id" name="k.ime_prezime" value="k.ime_prezime">Tuženik</option>
                </select>
            </div>
        </div>
        <table class="opcenito--tablica">
            <thead>
                <tr>
                    <th id="sp.sudski_postupak_id" class="opcenito--tablica-zaglavlje-hover">ID sudskog postupka</th>

                    <th id="sp.naziv" class="opcenito--tablica-zaglavlje-hover">Naziv sudskog postupka</th>

                    <th id="sp.protuzakonita_radnja" class="opcenito--tablica-zaglavlje-hover">Protuzakonita radnja</th>

                    <th id="sp.dokaz" class="opcenito--tablica-zaglavlje-hover">Dokaz</th>

                    <th id="sp.datum_vrijeme_pocetka" class="opcenito--tablica-zaglavlje-hover">Datum i vrijeme početka</th>

                    <th id="sp.datum_vrijeme_zavrsetka" class="opcenito--tablica-zaglavlje-hover">Datum i vrijeme završetka</th>

                    <th id="sp.zakljucak_postupka" class="opcenito--tablica-zaglavlje-hover">Zaključak</th>

                    <th id="sp.status" class="opcenito--tablica-zaglavlje-hover">Status</th>

                    <th id="k.korisnicko_ime" class="opcenito--tablica-zaglavlje-hover">Korisničko ime</th>

                    <th id="k.ime_prezime" class="opcenito--tablica-zaglavlje-hover">Tuženik</th>

                    <th id="h--azuriraj" >Ažuriraj</th>

                    <th id="h--obrisi" >Obriši</th>
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
