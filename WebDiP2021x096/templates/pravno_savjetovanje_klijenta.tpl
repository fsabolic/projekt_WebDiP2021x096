<div class="opcenito--tablica-wrapper-wrapper">
    <div class="opcenito--tablica-wrapper">
        <h2 class="opcenito--tablica--naslov-tablice">Pravno savjetovanje klijenta</h2>

        <div id="pravno-savjetovnje-pitanje-greske" class="opcenito--polje-za-greske" hidden=""></div>
        <select id="odvjetnik_drop_down" style="max-width: 150px;margin:30px;margin-left: 0px;">
            <option value="">Odaberite odvjetnika</option>
        </select>
        <form method="post" action="" class="pravno-savjetovanje--forma">
            <div class="pravno-savjetovanje--forma-input">
                <label for="naslov">Naslov</label>
                <input id="naslov" name="naslov" type="text">
            </div>
            <div class="pravno-savjetovanje--forma-input" style="display:block">
                <label for="pitanje">Pitanje</label><br>
                <textarea id="pitanje" name="pitanje"></textarea>
            </div>
            <div class="button-wrapper" style="float:right"><button class="opcenito--obican-gumb" id="postavi">Postavi</button></div>
        </form>
        <hr style="border:1px black dashed;margin:30px 0;">
        <div class="opcenito--tablica-zaglavlje">
            <div class="opcenito--tablica-zaglavlje-pretrazivanje">
                <div class="opcenito--tablica-zaglavlje-pretrazivanje-input">
                    <label for="pretrazi">Pretraži</label>
                    <input type="text" name="pretrazi" id="pretrazi">
                </div>
                <select id="atribut_za_pretrazivanje">
                    <option id="psp.razlog" name="psp.razlog" value="psp.razlog">Naslov</option>
                    <option id="psp.opis" name="psp.opis" value="psp.opis">Tekst pitanja</option>
                    <option id="psp.datum_vrijeme_postavljanja" name="psp.datum_vrijeme_postavljanja" value="psp.datum_vrijeme_postavljanja">Datum i vrijeme postavljanja</option>
                    <option id="pso.tekst" name="pso.tekst" value="pso.tekst">Odgovor</option>
                </select>
            </div>
        </div>
        
        <table class="opcenito--tablica">
            <thead>
                <tr>
                    <th id="psp.razlog" class="opcenito--tablica-zaglavlje-hover">Naslov</th>

                    <th id="psp.opis" class="opcenito--tablica-zaglavlje-hover">Pitanje</th>

                    <th id="psp.datum_vrijeme_postavljanja" class="opcenito--tablica-zaglavlje-hover">Datum i vrijeme postavljanja</th>

                    <th id="pso.tekst" class="opcenito--tablica-zaglavlje-hover">Odgovor</th>
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

