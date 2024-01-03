<div class="opcenito--forma-wrapper">
    <h2 class="opcenito--forma-naslov-forme">Dodavanje sudskog postupka</h2>
    <form class="opcenito--forma" method="post" action="">
        <div class="opcenito--forma-stupci">
            <div class="opcenito--forma-prvi-stupac">
                <div class="opcenito--input">
                    <label>Naziv</label>
                    <input type="text" id="naziv" name="naziv" {if $naziv}value="{$naziv}"{/if}>
                </div>
                <div class="opcenito--input">
                    <label>Protuzakonita radnja</label>
                    <input type="text" id="protuzakonita_radnja" name="protuzakonita_radnja" {if $protuzakonita_radnja}value="{$protuzakonita_radnja}"{/if}>
                </div>
                <div class="opcenito--input">
                    <label>Dokaz</label>
                    <textarea id="dokaz" name="dokaz" >{if $dokaz}{$dokaz}{/if}</textarea>
                </div>
            </div>
            <div class="opcenito--forma-drugi-stupac">
                <div class="opcenito--input">
                    <label>Datum i vrijeme početka</label>
                    <input type="text" id="datum_vrijeme_pocetka" name="datum_vrijeme_pocetka" {if $datum_vrijeme_pocetka}value="{$datum_vrijeme_pocetka}"{/if}>
                </div>
                <div class="opcenito--input">
                    <label>Klijent</label>
                    <select id="klijent" name="klijent">
                        <option {if $klijent_id}value="{$klijent_id}"{/if}> {if $klijent}{$klijent}{else}Odaberite klijenta{/if}</option> 
                    </select>
                </div>
                <div class="opcenito--input">
                    <label>Tužitelj</label>
                    <input type="text" id="tuzitelj" name="tuzitelj" {if $tuzitelj}value="{$tuzitelj}"{/if} disabled>
                </div>
                <div class="opcenito--input">
                    <label>Kategorija</label>
                    <input type="text" id="kategorija" name="kategorija" {if $kategorija}value="{$kategorija}"{/if} disabled>
                </div>
            </div>

        </div>

        <div class="button-wrapper" >
            <button class="opcenito--vazan-gumb" type="submit" name="dodaj" id="dodaj">+ Dodaj</button>
        </div>

        <div id="sudski-postupak-odvjetnika-greske" class="opcenito--polje-za-greske" hidden=""></div>
    </form>
</div>