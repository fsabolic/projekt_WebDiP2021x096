<div class="opcenito--forma-wrapper">
    <h2 class="opcenito--forma-naslov-forme">Moderatori</h2>
    <form class="opcenito--forma" method="post" action="">
        <p class="kategorije--kategorija-naslov">Kategorija</p>
        <input type="text" id="kategorija_sudskog_postupka" class="kategorije--kategorija-input" vrijednost="{$kategorija_sudskog_postupka_id}" value="{$kategorija_sudskog_postupka_naziv}" disabled>
        <div class="opcenito--forma-stupci">
            <div class="opcenito--forma-prvi-stupac">
                <div class="opcenito--input">
                    <label>Dodaj moderatora</label>
                    <select id="dodaj_moderatora" name="dodaj_moderatora">
                        <option value=""> Odaberite moderatora</option> 
                    </select>
                </div>
                <div class="button-wrapper" >
                    <button class="opcenito--vazan-gumb" type="button" name="dodaj" id="dodaj">+ Dodaj</button>
                </div>
            </div>
            <div class="opcenito--forma-drugi-stupac">
                <div class="opcenito--input">
                    <label>Obriši moderatora</label>
                    <select id="obrisi_moderatora" name="obrisi_moderatora">
                        <option value=""> Odaberite moderatora</option> 
                    </select>
                </div>
                <div class="button-wrapper" >
                    <button class="opcenito--vazan-gumb" type="button" name="obrisi" id="obrisi">- Obriši</button>
                </div>
            </div>

        </div>
        <div id="moderatori-greske" class="moderatori-greske" hidden=""></div>
    </form>
</div>