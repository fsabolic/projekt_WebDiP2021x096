<div class="opcenito--forma-wrapper">
    <h2 class="opcenito--forma-naslov-forme">Dodavanje kategorije sudskog postupka</h2>
    <form class="opcenito--forma" method="post" action="">
        <div class="opcenito--forma-stupci">
            <div class="opcenito--forma-prvi-stupac">
                <div class="opcenito--input">
                    <label>Naziv</label>
                    <input type="text" id="naziv" name="naziv" {if $naziv}value="{$naziv}"{/if}>
                </div>

                <div class="opcenito--input">
                    <label>Opis</label>
                    <textarea id="opis" name="opis" >{if $opis}{$opis}{/if}</textarea>
                </div>
            </div>
        </div>

        <div class="button-wrapper" >
            <button class="opcenito--vazan-gumb" type="submit" name="dodaj" id="dodaj">+ Dodaj</button>
        </div>

        <div id="kategorije-greske" class="opcenito--polje-za-greske" hidden=""></div>
    </form>
</div>