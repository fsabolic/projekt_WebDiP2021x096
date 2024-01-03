<?php
/* Smarty version 4.0.0, created on 2022-06-14 22:57:17
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/kategorije_sudskih_postupaka.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62a8f62d55e7c3_56249967',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '86f2915156cc0786d240c7f5fb3dd76b09b926b4' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/kategorije_sudskih_postupaka.tpl',
      1 => 1655239004,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a8f62d55e7c3_56249967 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="opcenito--tablica-wrapper-wrapper">
    <div class="opcenito--tablica-wrapper">
        <h2 class="opcenito--tablica--naslov-tablice">Kategorije sudskih postupaka</h2>
        <div class="opcenito--tablica-zaglavlje">
            <div class="button-wrapper"><button class="opcenito--vazan-gumb" id="dodaj" name="dodaj">+ Dodaj kategoriju</button></div>
            <div class="opcenito--tablica-zaglavlje-pretrazivanje">
                <div class="opcenito--tablica-zaglavlje-pretrazivanje-input">
                    <label for="pretrazi">Pretraži</label>
                    <input type="text" name="pretrazi" id="pretrazi">
                </div>
                <select id="atribut_za_pretrazivanje">
                    <option id="kategorija_sudskog_postupka_id" name="kategorija_sudskog_postupka_id" value="kategorija_sudskog_postupka_id">ID kategorije</option>
                    <option id="naziv" name="naziv" value="naziv">Naziv kategorije</option>
                    <option id="opis" name="opis" value="opis">Opis</option>
                </select>
            </div>
        </div>
        <table class="opcenito--tablica">
            <thead>
                <tr>
                    <th id="kategorija_sudskog_postupka_id" class="opcenito--tablica-zaglavlje-hover">ID kategorije</th>

                    <th id="naziv" class="opcenito--tablica-zaglavlje-hover">Naziv kategorije</th>

                    <th id="opis" class="opcenito--tablica-zaglavlje-hover">Opis kategorije</th>

                    <th id="h--azuriraj">Ažuriraj</th>

                    <th id="h--obrisi">Obriši</th>

                    <th id="h--moderatori">Moderatori</th>

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
