<div id="prijava--wrapper">
    <div class="opcenito--forma" id="prijava--div">
        <form id="prijava--forma" method="post" action="">
            <div class="opcenito--input">
                <label for="korisnicko_ime">Korisničko ime: </label>
                <input type="text" name="korisnicko_ime" id="korisnicko_ime" {if $zapamti_ime}value="{$zapamti_ime}"{/if}>
            </div>
            <div class="opcenito--input">
                <label for="lozinka">Lozinka: </label>
                <input type="password" name="lozinka" id="lozinka">
            </div>

            <div class="opcenito--input">
                <label for="zapamti_ime">Zapamti ime: </label><br>
                <input type="checkbox" name="zapamti_ime" id="zapamti_ime">
            </div>

            <div id="prijava--zaboravljena-lozinka-wrapper">
                <p id="prijava--zaboravljena-lozinka">Zaboravljena lozinka</p>
            </div>
            <div class="button-wrapper" >
                <button class="opcenito--vazan-gumb" type="submit" name="prijavi_se" id="prijavi_se">Prijavi se</button>
            </div>

            <div id="prijava-greske" {if count($greske_prijava)===0}hidden=""{else}class="opcenito--polje-za-greske"{/if}>
                {foreach $greske_prijava key=unos item=vrijednost}
                    <p>{$vrijednost}</p>
                {/foreach}
            </div>
        </form>
    </div>
</div>