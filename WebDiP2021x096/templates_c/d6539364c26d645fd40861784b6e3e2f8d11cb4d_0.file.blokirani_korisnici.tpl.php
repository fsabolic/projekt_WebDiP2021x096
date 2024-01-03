<?php
/* Smarty version 4.0.0, created on 2022-06-14 19:31:18
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/blokirani_korisnici.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62a8c5e66232d7_85248653',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd6539364c26d645fd40861784b6e3e2f8d11cb4d' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/blokirani_korisnici.tpl',
      1 => 1655223977,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a8c5e66232d7_85248653 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="opcenito--tablica-wrapper-wrapper">
    <div class="opcenito--tablica-wrapper">
        <h2 class="opcenito--tablica--naslov-tablice">Blokirani korisnici</h2>
        <div class="opcenito--tablica-zaglavlje">
            <div class="opcenito--tablica-zaglavlje-pretrazivanje">
                <div class="opcenito--tablica-zaglavlje-pretrazivanje-input">
                    <label for="pretrazi">Pretraži</label>
                    <input type="text" name="pretrazi" id="pretrazi">
                </div>
                <select id="atribut_za_pretrazivanje">
                    <option id="korisnicko_ime" name="korisnicko_ime" value="korisnicko_ime">Korisničko ime</option>
                    <option id="ime_prezime" name="ime_prezime" value="ime_prezime">Ime i prezime</option>
                    <option id="email" name="email" value="email">E-mail</option>
                    <option id="pokusaji_prijave" name="pokusaji_prijave" value="pokusaji_prijave">Pokušaji prijave</option>
                    <option id="naziv" name="naziv" value="naziv">Uloga</option>
                </select>
            </div>
        </div>
        <table class="opcenito--tablica">
            <thead>
                <tr>
                    <th id="korisnicko_ime" class="opcenito--tablica-zaglavlje-hover">Korisničko ime</th>

                    <th id="ime_prezime" class="opcenito--tablica-zaglavlje-hover">Ime i prezime</th>

                    <th id="email" class="opcenito--tablica-zaglavlje-hover">E-mail</th>

                    <th id="pokusaji_prijave" class="opcenito--tablica-zaglavlje-hover">Pokušaji prijave</th>

                    <th id="blokiran" class="opcenito--tablica-zaglavlje-hover">Blokiran</th>

                    <th id="naziv" class="opcenito--tablica-zaglavlje-hover">Uloga</th>

                    <th id="h--blokiraj" >Blokiraj/odblokiraj</th>
                </tr>    
            </thead>
            <tbody>

            </tbody>
        </table>
        <div class="opcenito--tablica-podnozje">
            <div class="button-wrapper"><button class="opcenito--obican-gumb" id="prva">Prva</button></div>
            <div class="button-wrapper"><button class="opcenito--obican-gumb" id="prijasnja">Prijašnja</button></div>
            <div class="button-wrapper"><button class="opcenito--obican-gumb" id="sljedeca">Sljedeća</button></div>
            <div class="button-wrapper"><button class="opcenito--obican-gumb" id="posljednja">Posljednja</button></div>
        </div>
    </div>
</div>

<input id="atribut_za_sortiranje" name="atribut_za_sortiranje" value="" hidden>
<input id="smjer_sortiranja" name="smjer_sortiranja" value="ASC" hidden>
<input id="broj_stranice" name="broj_stranice" value="0" hidden>

<?php }
}
