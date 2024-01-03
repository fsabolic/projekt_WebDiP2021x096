<div class="opcenito--tablica-wrapper-wrapper">
    <div class="opcenito--tablica-wrapper">
        <h2 class="opcenito--tablica--naslov-tablice">Kategorije sudskih postupaka</h2>
        <div class="opcenito--tablica-zaglavlje">
            <div class="button-wrapper"><button class="opcenito--vazan-gumb" id="dodaj" name="dodaj">+ Dodaj kategoriju</button></div>
            <div class="opcenito--tablica-zaglavlje-pretrazivanje">
                <div class="opcenito--tablica-zaglavlje-pretrazivanje-input">
                    <label for="pretrazi">Pretraži</label>
                    <input type="text" name="pretrazi" id="pretrazi">
                </div>
                <select id="atribut_za_pretrazivanje">
                    <option id="kategorija_sudskog_postupka_id" name="kategorija_sudskog_postupka_id" value="kategorija_sudskog_postupka_id">ID kategorije</option>
                    <option id="naziv" name="naziv" value="naziv">Naziv kategorije</option>
                    <option id="opis" name="opis" value="opis">Opis</option>
                </select>
            </div>
        </div>
        <table class="opcenito--tablica">
            <thead>
                <tr>
                    <th id="kategorija_sudskog_postupka_id" class="opcenito--tablica-zaglavlje-hover">ID kategorije</th>

                    <th id="naziv" class="opcenito--tablica-zaglavlje-hover">Naziv kategorije</th>

                    <th id="opis" class="opcenito--tablica-zaglavlje-hover">Opis kategorije</th>

                    <th id="h--azuriraj">Ažuriraj</th>

                    <th id="h--obrisi">Obriši</th>

                    <th id="h--moderatori">Moderatori</th>

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
