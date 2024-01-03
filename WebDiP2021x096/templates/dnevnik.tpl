<div class="opcenito--tablica-wrapper-wrapper">
    <div class="opcenito--tablica-wrapper">
        <h2 class="opcenito--tablica--naslov-tablice">Dnevnik</h2>

        <div class="opcenito--tablica-zaglavlje">

            <div class="opcenito--tablica-zaglavlje-pretrazivanje">

                <div class="opcenito--tablica-zaglavlje-pretrazivanje-input">
                    <label for="pretrazi">Pretraži</label>
                    <input type="text" name="pretrazi" id="pretrazi">
                </div>
                <select id="atribut_za_pretrazivanje">
                    <option id="naziv" name="naziv" value="naziv">Tip zapisa</option>
                    <option id="upit" name="upit" value="upit">Upit</option>
                    <option id="radnja" name="radnja" value="radnja">Radnja</option>
                    <option id="datum_vrijeme" name="datum_vrijeme" value="datum_vrijeme">Datum i vrijeme</option>
                    <option id="korisnicko_ime" name="korisnicko_ime" value="korisnicko_ime">Korisničko ime</option>
                </select>
            </div>
        </div>
        <table class="opcenito--tablica">
            <thead>
                <tr>
                    <th id="upit" class="opcenito--tablica-zaglavlje-hover">Upit</th>
                    <th id="radnja" class="opcenito--tablica-zaglavlje-hover">Radnja</th>
                    <th id="datum_vrijeme" class="opcenito--tablica-zaglavlje-hover">Datum i vrijeme</th>
                    <th id="naziv" class="opcenito--tablica-zaglavlje-hover">Tip zapisa</th>
                    <th id="korisnicko_ime" class="opcenito--tablica-zaglavlje-hover">Korisničko ime</th>
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
<div style="display: inline;float:left;text-align: center;margin-top: 60px;">
    <input id="od" name="od" type="date" style="border:2px #328cc1 solid;border-radius: 10px;margin-right:10px;" value="">
    <input id="do" name="do" type="date" style="border:2px #328cc1 solid;border-radius: 10px;margin-left:10px;" value="">
    <div class="button-wrapper"><button class="opcenito--obican-gumb" id="filter">Filtriraj</button>
    </div>
</div>
<input id="atribut_za_sortiranje" name="atribut_za_sortiranje" value="" hidden>
<input id="smjer_sortiranja" name="smjer_sortiranja" value="ASC" hidden>
<input id="broj_stranice" name="broj_stranice" value="0" hidden>
