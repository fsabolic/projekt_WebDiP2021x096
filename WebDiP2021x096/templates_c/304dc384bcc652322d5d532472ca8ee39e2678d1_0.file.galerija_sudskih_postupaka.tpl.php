<?php
/* Smarty version 4.0.0, created on 2022-06-14 23:29:18
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/galerija_sudskih_postupaka.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62a8fdae7a1df9_67312984',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '304dc384bcc652322d5d532472ca8ee39e2678d1' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/galerija_sudskih_postupaka.tpl',
      1 => 1655241872,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a8fdae7a1df9_67312984 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="galerija--wrapper">
    <div class="galerija">
        <div>
                        <h2 class="opcenito--tablica--naslov-tablice" style="word-break: break-word">Galerija sudskih postupaka</h2>
        </div>
        <div class="galerija--zaglavlje">
             
            <div class="galerija--pretrazivanje">
                <label for="pretrazi">Pretraži</label>
                <input type="text" name="pretrazi" id="pretrazi">
            </div>
            <div class="opcenito--skup-gumbova" style="max-width: 350px">
                <button class="opcenito--obican-gumb" id="vrijeme_trajanja" name="vrijeme_trajanja" style="float:right" value="vrijeme_trajanja">Vrijeme trajanja</button>
                <button class="opcenito--obican-gumb" id="zakljucak_postupka" name="zakljucak_postupka" style="float:right" value="zakljucak_postupka">Zaključak</button>
            </div>
        </div>
        <div class="galerija--grid">

        </div>
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
<input id="atribut_za_pretrazivanje" name="atribut_za_pretrazivanje" value="tuzitelj"hidden>
<?php }
}
