<?php
/* Smarty version 4.0.0, created on 2022-06-14 23:01:38
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/dnevnik.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62a8f732a39e10_66136846',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c95a51e7a8acb87ffad27b91a4b381d2aa6ed14f' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/dnevnik.tpl',
      1 => 1655239010,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a8f732a39e10_66136846 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="opcenito--tablica-wrapper-wrapper">
    <div class="opcenito--tablica-wrapper">
        <h2 class="opcenito--tablica--naslov-tablice">Dnevnik</h2>

        <div class="opcenito--tablica-zaglavlje">

            <div class="opcenito--tablica-zaglavlje-pretrazivanje">

                <div class="opcenito--tablica-zaglavlje-pretrazivanje-input">
                    <label for="pretrazi">Pretraži</label>
                    <input type="text" name="pretrazi" id="pretrazi">
                </div>
                <select id="atribut_za_pretrazivanje">
                    <option id="naziv" name="naziv" value="naziv">Tip zapisa</option>
                    <option id="upit" name="upit" value="upit">Upit</option>
                    <option id="radnja" name="radnja" value="radnja">Radnja</option>
                    <option id="datum_vrijeme" name="datum_vrijeme" value="datum_vrijeme">Datum i vrijeme</option>
                    <option id="korisnicko_ime" name="korisnicko_ime" value="korisnicko_ime">Korisničko ime</option>
                </select>
            </div>
        </div>
        <table class="opcenito--tablica">
            <thead>
                <tr>
                    <th id="upit" class="opcenito--tablica-zaglavlje-hover">Upit</th>
                    <th id="radnja" class="opcenito--tablica-zaglavlje-hover">Radnja</th>
                    <th id="datum_vrijeme" class="opcenito--tablica-zaglavlje-hover">Datum i vrijeme</th>
                    <th id="naziv" class="opcenito--tablica-zaglavlje-hover">Tip zapisa</th>
                    <th id="korisnicko_ime" class="opcenito--tablica-zaglavlje-hover">Korisničko ime</th>
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
<div style="display: inline;float:left;text-align: center;margin-top: 60px;">
    <input id="od" name="od" type="date" style="border:2px #328cc1 solid;border-radius: 10px;margin-right:10px;" value="">
    <input id="do" name="do" type="date" style="border:2px #328cc1 solid;border-radius: 10px;margin-left:10px;" value="">
    <div class="button-wrapper"><button class="opcenito--obican-gumb" id="filter">Filtriraj</button>
    </div>
</div>
<input id="atribut_za_sortiranje" name="atribut_za_sortiranje" value="" hidden>
<input id="smjer_sortiranja" name="smjer_sortiranja" value="ASC" hidden>
<input id="broj_stranice" name="broj_stranice" value="0" hidden>
<?php }
}
