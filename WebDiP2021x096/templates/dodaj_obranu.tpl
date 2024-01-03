<div class="opcenito--forma-wrapper">
    <h2 class="opcenito--forma-naslov-forme">Dodaj obranu</h2>
    <form class="opcenito--forma" method="post" action="" >
        <div class="opcenito--forma-stupci">
            <div class="opcenito--forma-prvi-stupac">
                <div class="opcenito--input">
                    <label>Argumenti obrane</label>
                    <textarea id="argumenti_obrane" name="argumenti_obrane">{if $argumenti_obrane}{$argumenti_obrane}{/if}</textarea>
                </div>
            </div>
        </div>

        <div class="button-wrapper" >
            <button class="opcenito--vazan-gumb" type="submit" name="dodaj" id="dodaj">+ Dodaj</button>
        </div>

        <div id="obrana-greske" class="opcenito--polje-za-greske" hidden=""></div>
    </form>
</div>
