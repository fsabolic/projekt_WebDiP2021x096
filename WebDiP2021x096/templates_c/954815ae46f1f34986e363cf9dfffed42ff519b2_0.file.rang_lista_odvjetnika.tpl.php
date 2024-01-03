<?php
/* Smarty version 4.0.0, created on 2022-06-14 23:29:27
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/rang_lista_odvjetnika.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62a8fdb70ebe12_11018957',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '954815ae46f1f34986e363cf9dfffed42ff519b2' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/rang_lista_odvjetnika.tpl',
      1 => 1655241870,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a8fdb70ebe12_11018957 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="opcenito--tablica-wrapper-wrapper">
    <div class="opcenito--tablica-wrapper">
        <h2 class="opcenito--tablica--naslov-tablice">Rang lista odvjetnika</h2>

        <div class="opcenito--tablica-zaglavlje">
        </div>
        <table class="opcenito--tablica">
            <thead>
                <tr>
                    <th id="ime_prezime">Ime prezime</th>
                    <th id="korisnicko_ime">Korisničko ime</th>
                    <th id="email">E-mail</th>
                    <th id="naziv">Kategorija</th>
                    <th id="br_prihvacenih_zahtjeva">Broj prihvaćenih zahtjeva</th>
                </tr>    
            </thead>
            <tbody>

            </tbody>
        </table>
        <div class="opcenito--tablica-podnozje">
        </div>
    </div>
</div>
<div style="display: inline;float:left;text-align: center;margin-top: 60px;">
    <input id="od" name="od" type="date" style="border:2px #328cc1 solid;border-radius: 10px;margin-right:10px;" value="">
    <input id="do" name="do" type="date" style="border:2px #328cc1 solid;border-radius: 10px;margin-left:10px;" value="">
    <div class="button-wrapper"><button class="opcenito--obican-gumb" id="filter">Filtriraj</button>
    </div>
</div>


<?php }
}
