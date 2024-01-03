<div class="pravno-savjetovanje-odgovor--wrapper-wrapper">
    <div class="pravno-savjetovanje-odgovor--wrapper">
        <div class="pravno-savjetovanje-odgovor">
            <div class="pravno-savjetovanje-odgovor--klijent">
                <p class="pravno-savjetovanje-odgovor--naslov">Klijent: </p>
                <p class="pravno-savjetovanje-odgovor--naslov-vrijednost"></p>{if $klijent}{$klijent}{/if}<br>
                <p class="pravno-savjetovanje-odgovor--naslov">Datum i vrijeme slanja: </p>
                <p class="pravno-savjetovanje-odgovor--naslov-vrijednost"></p>{if $datum_vrijeme_postavljanja}{$datum_vrijeme_postavljanja}{/if}<br>
                <p class="pravno-savjetovanje-odgovor--naslov">Naslov: </p>
                <p class="pravno-savjetovanje-odgovor--naslov-vrijednost"></p>{if $naslov}{$naslov}{/if}<br>
                <p class="pravno-savjetovanje-odgovor-block-naslov" id='pitanje' value='{$pitanje_id}'>Pitanje:</p>
                <p class="pravno-savjetovanje-odgovor-block-naslov-vrijednost">{if $pitanje}{$pitanje}{/if}</p>
            </div>
        </div>
        <hr style="border:1px black dashed;margin:30px 0;">
        <div class="pravno-savjetovanje-odgovor--odvjetnik">
            <div class="pravno-savjetovanje-odgovor--klijent" style="margin:0 auto;">
                <p class="pravno-savjetovanje-odgovor-block-naslov">Odgovor:</p>
                <textarea class="pravno-savjetovanje-odgovor--textarea" id="odgovor" name="odgovor"></textarea>
            </div>
        </div>
        <button class="opcenito--obican-gumb" style="float:right;box-shadow: none" id="odgovori" name="odgovori">Odgovori</button>
    </div>
</div>
<div id="pravno-savjetovanje-odgovor-greske" class="opcenito--polje-za-greske" hidden=""></div>