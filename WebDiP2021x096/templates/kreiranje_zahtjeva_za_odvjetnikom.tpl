<div class="opcenito--forma-wrapper">
    <h2 class="opcenito--forma-naslov-forme">Kreiranje zahtjeva za odvjetnikom</h2>
    <form class="opcenito--forma" enctype="multipart/form-data" method="post" action="" >
        <div class="opcenito--forma-stupci">
            <div class="opcenito--forma-prvi-stupac">
                <div class="opcenito--input">
                    <label>Slika sudskog postupka</label>
                    <input type="file" id="slika_sudskog_postupka" name="slika_sudskog_postupka" {*{if $naziv}value="{$naziv}"{/if}*}>
                </div>
                
               {if $slika_sudskog_postupka}
                   <a href="{$slika_sudskog_postupka}" target="_blank"><img src="{$slika_sudskog_postupka}" class="opcenito--ikona-slika"></a>
               {/if} 

                <div class="opcenito--input">
                    <label>Sudski postupak</label>
                    <select id="sudski_postupak" name="sudski_postupak">
                        <option {if $sudski_postupak_id}value="{$sudski_postupak_id}"{/if}> {if $sudski_postupak_naziv}{$sudski_postupak_naziv}{else}Odaberite sudski postupak{/if}</option> 
                    </select>
                </div>
                <div class="opcenito--input">
                    <label>Odvjetnik</label>
                    <select id="odvjetnik" name="odvjetnik">
                        <option {if $odvjetnik_id}value="{$odvjetnik_id}"{/if}> {if $odvjetnik_ime_prezime}{$odvjetnik_ime_prezime}{else}Odaberite odvjetnika{/if}</option> 
                    </select>
                </div>
            </div>
        </div>

        <div class="button-wrapper" >
            <button class="opcenito--vazan-gumb" type="submit" name="dodaj" id="dodaj">+ Dodaj</button>
        </div>

        <div id="sudski-postupak-odvjetnika-greske" class="opcenito--polje-za-greske" hidden=""></div>
    </form>
</div>
