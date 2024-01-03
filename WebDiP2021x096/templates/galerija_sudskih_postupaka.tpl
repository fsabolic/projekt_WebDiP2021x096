<div class="galerija--wrapper">
    <div class="galerija">
        <div>
            {*naslov*}
            <h2 class="opcenito--tablica--naslov-tablice" style="word-break: break-word">Galerija sudskih postupaka</h2>
        </div>
        <div class="galerija--zaglavlje">
            {*pretraživanje*} 
            <div class="galerija--pretrazivanje">
                <label for="pretrazi">Pretraži</label>
                <input type="text" name="pretrazi" id="pretrazi">
            </div>
            <div class="opcenito--skup-gumbova" style="max-width: 350px">
                <button class="opcenito--obican-gumb" id="vrijeme_trajanja" name="vrijeme_trajanja" style="float:right" value="vrijeme_trajanja">Vrijeme trajanja</button>
                <button class="opcenito--obican-gumb" id="zakljucak_postupka" name="zakljucak_postupka" style="float:right" value="zakljucak_postupka">Zaključak</button>
            </div>
        </div>
        <div class="galerija--grid">

        </div>
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
<input id="atribut_za_pretrazivanje" name="atribut_za_pretrazivanje" value="tuzitelj"hidden>
