<div id="registracija--wrapper">
    <div class="opcenito--forma" id="registracija--div">
        <form id="registracija--forma" method="POST">
            <div class="opcenito--input {if $greske_registracija.korisnicko_ime}opcenito--pogresan-unos{/if}">
                <label for="korisnicko_ime">Korisničko ime: </label>
                <input type="text" name="korisnicko_ime" id="korisnicko_ime" maxlength=50 {if $korisnicko_ime_registracija}value="{$korisnicko_ime_registracija}"{/if}>
            </div>
            <div class="opcenito--input {if $greske_registracija.ime_prezime}opcenito--pogresan-unos{/if}" >
                <label for="ime_prezime">Ime i prezime: </label>
                <input type="text" name="ime_prezime" id="ime_prezime" maxlength=50 {if $ime_prezime_registracija}value="{$ime_prezime_registracija}"{/if}>
            </div>
            <div class="opcenito--input {if $greske_registracija.email}opcenito--pogresan-unos{/if}">
                <label for="email">E-mail: </label>
                <input type="text" name="email" id="email" maxlength=50 {if $email_registracija}value="{$email_registracija}"{/if}>
            </div>
            <div class="opcenito--input {if $greske_registracija.lozinka}opcenito--pogresan-unos{/if}">
                <label for="lozinka">Lozinka: </label>
                <input type="password" name="lozinka" id="lozinka" maxlength=50 {if $lozinka_registracija}value="{$lozinka_registracija}"{/if}>
            </div>
            <div class="opcenito--input {if $greske_registracija.ponovljena_lozinka}opcenito--pogresan-unos{/if}">
                <label for="ponovljena_lozinka">Ponovljena lozinka: </label>
                <input type="password" name="ponovljena_lozinka" id="ponovljena_lozinka" maxlength=50 {if $ponovljena_lozinka_registracija}value="{$ponovljena_lozinka_registracija}"{/if}>
            </div>
            <div class='g-recaptcha' data-sitekey="6LeMXy8gAAAAAOOfH0Ropue91jfoMHyuSdhkZi83"></div>
            <div class="button-wrapper"><button class="opcenito--vazan-gumb" type="submit" name="registriraj_se" id="registriraj_se">Registriraj se</button></div>
            
            <div id="registracijske-greske" {if count($greske_registracija)===0}hidden=""{else}class="opcenito--polje-za-greske"{/if}>
                {foreach $greske_registracija key=unos item=vrijednost}
                    <p>{$vrijednost}</p>
                {/foreach}
            </div>
        </form>
    </div>
</div>

