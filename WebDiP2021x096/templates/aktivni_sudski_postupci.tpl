<div class="opcenito--forma-wrapper">
    <h2 class="opcenito--forma-naslov-forme">Ažuriranje sudskog postupka</h2>
    <form class="opcenito--forma" method="post" action="">
        <div class="opcenito--forma-stupci">
            <div class="opcenito--forma-prvi-stupac">
                <div class="opcenito--input">
                    <label>Datum i vrijeme završetka</label>
                    <input type="text" id="datum_vrijeme_zavrsetka" name="datum_vrijeme_zavrsetka" {if $datum_vrijeme_zavrsetka}value="{$datum_vrijeme_zavrsetka}"{/if}>
                </div>
                <div class="opcenito--input">
                    <label>Zaključak postupka</label>
                    <select id="zakljucak_sudskog_postupka" name="zakljucak_sudskog_postupka">
                        <option id="kriv" value="1" {if $zakljucak_sudskog_postupka==1}selected{/if}>Kriv</option>
                        <option id="nije_kriv" value="0" {if $zakljucak_sudskog_postupka==0}selected{/if}>Nije kriv</option>
                    </select>
                </div>
                <hr style="border:1px #083c5d dashed;margin-top:30px;margin-bottom:30px;">
                <div class="opcenito--input">
                    <label>Naziv</label>
                    <input type="text" id="naziv" name="naziv" {if $naziv}value="{$naziv}"{/if} disabled>
                </div><div class="opcenito--input">
                    <label>Protuzakonita radnja</label>
                    <input type="text" id="protuzakonita_radnja" name="protuzakonita_radnja" {if $protuzakonita_radnja}value="{$protuzakonita_radnja}"{/if} disabled>
                </div>
                <div class="opcenito--input">
                    <label>Dokaz</label>
                    <textarea id="dokaz" name="dokaz" disabled>{if $dokaz}{$dokaz}{/if}</textarea>
                </div>
                <div class="opcenito--input">
                    <label>Datum i vrijeme početka</label>
                    <input type="text" id="datum_vrijeme_pocetka" name="datum_vrijeme_pocetka" {if $datum_vrijeme_pocetka}value="{$datum_vrijeme_pocetka}"{/if}} disabled>
                </div>
                <div class="opcenito--input">
                    <label>Klijent</label>
                    <input type="text" id="klijent" name="klijent" {if $klijent}value="{$klijent}"{/if} disabled>
                </div>
                <div class="opcenito--input">
                    <label>Tužitelj</label>
                    <input type="text" id="tuzitelj" name="tuzitelj" {if $tuzitelj}value="{$tuzitelj}"{/if} disabled>
                </div>
                <div class="opcenito--input">
                    <label>Kategorija</label>
                    <input type="text" id="kategorija" name="kategorija" {if $kategorija_sudskog_postupka}value="{$kategorija_sudskog_postupka}"{/if} disabled>
                </div>
            </div>

        </div>

        <div class="button-wrapper" >
            <button class="opcenito--vazan-gumb" type="submit" name="azuriraj" id="azuriraj">Ažuriraj</button>
        </div>

        <div id="azuriranje-postupka-greske" class="opcenito--polje-za-greske" hidden=""></div>
    </form>
</div>