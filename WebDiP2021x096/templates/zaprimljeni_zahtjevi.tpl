<div class="opcenito--tablica-wrapper-wrapper">
    <div class="opcenito--tablica-wrapper">
        <h2 class="opcenito--tablica--naslov-tablice">Zaprimljeni zahtjevi</h2>
        <div class="opcenito--tablica-zaglavlje">
            <div class="opcenito--tablica-zaglavlje-pretrazivanje">
                <div class="opcenito--tablica-zaglavlje-pretrazivanje-input">
                    <label for="pretrazi">Pretraži</label>
                    <input type="text" name="pretrazi" id="pretrazi">
                </div>
                <select id="atribut_za_pretrazivanje">
                    <option id="z.zahtjev_id" name="z.zahtjev_id" value="z.zahtjev_id">ID zahtjeva</option>
                    <option id="z.datum_vrijeme_slanja" name="z.datum_vrijeme_slanja" value="z.datum_vrijeme_slanja">Datum i vrijeme slanja</option>
                    <option id="sp.naziv" name="sp.naziv" value="sp.naziv">Naziv sudskog postupka</option>
                    <option id="sp.protuzakonita_radnja" name="sp.protuzakonita_radnja" value="sp.protuzakonita_radnja">Protuzakonita radnja</option>
                    <option id="sp.dokaz" name="sp.dokaz" value="sp.dokaz">Dokaz</option>
                    <option id="ime_prezime_tuzenika" name="ime_prezime_tuzenika" value="ime_prezime_tuzenika">Tuženik</option>
                    <option id="ime_prezime_tuzitelja" name="ime_prezime_tuzitelja" value="ime_prezime_tuzitelja">Tužitelj</option>
                </select>
            </div>
        </div>
        <div id="poruka" hidden>
            <p id="poruka--tekst"></p>
        </div>
        <table class="opcenito--tablica">
            <thead>
                <tr>
                    <th id="z.zahtjev_id" class="opcenito--tablica-zaglavlje-hover">ID zahtjeva</th>

                    <th id="z.datum_vrijeme_slanja" class="opcenito--tablica-zaglavlje-hover">Datum i vrijeme slanja</th>

                    <th id="sp.naziv" class="opcenito--tablica-zaglavlje-hover">Naziv sudskog postupka</th>

                    <th id="sp.protuzakonita_radnja" class="opcenito--tablica-zaglavlje-hover">Protuzakonita radnja</th>

                    <th id="sp.dokaz" class="opcenito--tablica-zaglavlje-hover">Dokaz</th>

                    <th id="ime_prezime_tuzenika" class="opcenito--tablica-zaglavlje-hover">Tuženik</th>

                    <th id="ime_prezime_tuzitelja" class="opcenito--tablica-zaglavlje-hover">Tužitelj</th>

                    <th id="h--prihvati" style="color:#E7FFEB">Prihvati</th>

                    <th id="h--odbij" style="color:#FFA5A5">Odbij</th>
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
