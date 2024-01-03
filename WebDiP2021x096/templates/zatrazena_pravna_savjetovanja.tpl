<div class="opcenito--tablica-wrapper-wrapper">
    <div class="opcenito--tablica-wrapper">
        <h2 class="opcenito--tablica--naslov-tablice">Postavljena pitanja</h2>
        <div class="opcenito--tablica-zaglavlje">
            <div class="opcenito--tablica-zaglavlje-pretrazivanje">
                <div class="opcenito--tablica-zaglavlje-pretrazivanje-input">
                    <label for="pretrazi">Pretraži</label>
                    <input type="text" name="pretrazi" id="pretrazi">
                </div>
                <select id="atribut_za_pretrazivanje">
                    <option id="psp.klijent" name="psp.klijent" value="psp.klijent">Klijent</option>
                    <option id="psp.razlog" name="psp.razlog" value="psp.razlog">Naslov</option>
                    <option id="psp.opis" name="psp.opis" value="psp.opis">Tekst pitanja</option>
                    <option id="psp.datum_vrijeme_postavljanja" name="psp.datum_vrijeme_postavljanja" value="psp.datum_vrijeme_postavljanja">Datum i vrijeme postavljanja</option>
                </select>
            </div>
        </div>
        <table class="opcenito--tablica">
            <thead>
                <tr>
                    <th id="psp.klijent" class="opcenito--tablica-zaglavlje-hover">Klijent</th>

                    <th id="psp.razlog" class="opcenito--tablica-zaglavlje-hover">Naslov</th>

                    <th id="psp.opis" class="opcenito--tablica-zaglavlje-hover">Pitanje</th>

                    <th id="psp.datum_vrijeme_postavljanja" class="opcenito--tablica-zaglavlje-hover">Datum i vrijeme postavljanja</th>

                    <th id="h--odgovori">Odgovori</th>
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

