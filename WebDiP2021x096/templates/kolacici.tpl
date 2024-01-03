<div class="opcenito--tablica-forma-wrapper">
    <div class="opcenito--forma">
        <h2 class="naslov-tablice">Kolačići</h2>
        <form class="opcenito--tablica-forma" method="POST" action="">
            <table border="1">
                <thead>
                    <tr>
                        <th>Naziv</th>
                        <th>Opis</th>
                        <th>Potvrdi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Uvjeti korištenja</td>
                        <td>Ovaj kolačić se koristi za dozvoljavanje ostalih kolačića u cijeloj aplikaciji. Ako je onemogućen, neće raditi dodatne funkcionalnosti</td>
                        <td><input type="checkbox" name="uvjeti_koristenja" value="uvjeti_koristenja" value="uvjeti_koristenja" {if $uvjeti_koristenja}checked=""{/if}></td>
                    </tr>
                    <tr>
                        <td>Zapamti ime</td>
                        <td>Ovaj kolačić koristi se za pamćenje korisničkog imena na formi za prijavu. Ako se na formi pritisne "Zapamti ime", ime će se zapamtiti, a u suprotnome se briše zapamćeno ime</td>
                        <td><input type="checkbox" name="zapamti_ime" value="zapamti_ime" value="zapamti_ime" {if $zapamti_ime}checked=""{/if}></td>
                    </tr>
                    <tr>
                        <td>Povratak na stranicu</td>
                        <td>Ovaj kolačić pamti zadnju posjećenu stranicu korisnika nakon odjave ili odlaska sa sustava. Nakon prijave, korisnika se vraća na zadnju posjećenu stranicu nakon odjave ili odlaska</td>
                        <td><input type="checkbox" name="zadnja_stranica" value="zadnja_stranica" value="zadnja_stranica" {if $zadnja_stranica}checked=""{/if}></td>
                    </tr>
                <tbody>
            </table>
            <div class="button-wrapper"><button type="submit" name="spremi" id="spremi" value="spremi" class="opcenito--vazan-gumb">Spremi</button></div>
        </form>
    </div>
</div>