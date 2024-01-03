<div id="konfiguracija-greske" hidden="">
</div>
<div class="opcenito--forma">
    <form id="konfiguracijska-forma" name="konfiguracijska-forma" method="POST" action="upravljanje_konfiguracijom.php">

        <div class="opcenito--input">
            <label for="trajanje_kolacica">Trajanje kolačića: </label>
            <input type="text" name="trajanje_kolacica" id="trajanje_kolacica" maxlength="5" value="{$trajanje_kolacica}">
        </div>

        <div class="opcenito--input">
            <label for="broj_stranica_stranicenja">Broj stranica straničenja: </label>
            <input type="text" name="broj_stranica_stranicenja" id="broj_stranica_stranicenja" maxlength="5" value="{$broj_stranica_stranicenja}">
        </div>

        <div class="opcenito--input">
            <label for="trajanje_sesije">Trajanje sesije: </label>
            <input type="text" name="trajanje_sesije" id="trajanje_sesije" maxlength="5" value="{$trajanje_sesije}">
        </div>

        <div class="opcenito--input">
            <label for="broj_neuspjesnih_prijava">Broj neuspješnih prijava: </label>
            <input type="text" name="broj_neuspjesnih_prijava" id="broj_neuspjesnih_prijava" maxlength="5" value="{$broj_neuspjesnih_prijava}">
        </div>

        <div class="opcenito--input">
            <label for="broj_sudskih_postupaka">Broj sudskih postupaka: </label>
            <input type="text" name="broj_sudskih_postupaka" id="broj_sudskih_postupaka" maxlength="5" value="{$broj_sudskih_postupaka}">
        </div>

        <div class="opcenito--input">
            <label for="broj_zahtjeva">Broj zahtjeva: </label>
            <input type="text" name="broj_zahtjeva" id="broj_zahtjeva" maxlength="5" value="{$broj_zahtjeva}">
        </div>

        <div class="opcenito--input">
            <label for="broj_odgovora">Broj odgovora: </label>
            <input type="text" name="broj_odgovora" id="broj_odgovora" maxlength="5" value="{$broj_odgovora}">
        </div> 

        <div class="opcenito--input">
            <label for="istek_verifikacije">Istek verifikacije: </label>
            <input type="text" name="istek_verifikacije" id="istek_verifikacije" maxlength="5" value="{$istek_verifikacije}">
        </div>
        <div class="button-wrapper"><button form="konfiguracijska-forma" type="submit" name="submit" id="spremi-konfiguraciju" class="opcenito--vazan-gumb">Spremi</button></div>

    </form>

</div>
<div id="pomak-greske" hidden="">
</div>
<div class="opcenito--forma">
    <div id="pomak-vremena">
        <div class="opcenito--input">
            <label for="pomak">Pomak: </label>
            <input type="text" name="pomak" id="pomak" disabled value="{$pomak}"> 
        </div>
        <div class="opcenito--skup-gumbova">
            <div class="button-wrapper"><button type="button" name="postavi-pomak" id="postavi-pomak" value="postavi" class="opcenito--obican-gumb">Postavi pomak</button>
                <button type="button" name="dohvati-pomak"  id="dohvati-pomak" value="dohvati" class="opcenito--obican-gumb">Dohvati pomak</button>
                <button type="button" name="spremi-pomak" id="spremi-pomak" value="spremi_pomak" class="opcenito--vazan-gumb">Spremi pomak</button></div>
        </div>
    </div>
</div>

<div class="opcenito--forma">
    <div id="uvjeti-koristenja-reset">
        <div class="opcenito--input">
            <label>Resetirajte sve kolačiće za uvjete korištenja</label>
        </div>

        <div class="button-wrapper"><button type="button" name="reset"  id="reset" value="reset" class="opcenito--vazan-gumb">Reset</button></div>

    </div>
</div>
<div id="css-greske" class="{$greske_klasa}">
    <p>{$css_greske}</p>
</div>
<div class="opcenito--forma">
    <form id="stilska-forma" name="stilska-forma" method="POST" action="upravljanje_konfiguracijom.php" enctype="multipart/form-data">
        <div class="opcenito--input"><label>Upload CSS datoteke: </label><input type="file" name="css_datoteka" id="css_datoteka"></div>
        <div class="button-wrapper"><button form="stilska-forma" type="submit" id="spremi-css" name="spremi-css" class="opcenito--vazan-gumb">Spremi CSS</button></div>
        <br><br><br><br>
        <div class="opcenito--input"><label>Uređivanje CSS datoteke: </label><textarea name="uredivanje-css" id="uredivanje-css">{$css}</textarea></div>
        <div class="button-wrapper"><button form="stilska-forma" type="submit" id="spremi-css-tekst" name="spremi-css-tekst" class="opcenito--vazan-gumb">Spremi CSS tekst</button></div>

    </form>
</div>