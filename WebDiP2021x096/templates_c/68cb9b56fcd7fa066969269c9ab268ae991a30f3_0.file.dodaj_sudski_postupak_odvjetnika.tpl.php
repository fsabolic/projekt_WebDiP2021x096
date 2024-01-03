<?php
/* Smarty version 4.0.0, created on 2022-06-03 11:00:23
  from '/opt/lampp/htdocs/Projekt/templates/dodaj_sudski_postupak_odvjetnika.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_6299cda7430561_76849513',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '68cb9b56fcd7fa066969269c9ab268ae991a30f3' => 
    array (
      0 => '/opt/lampp/htdocs/Projekt/templates/dodaj_sudski_postupak_odvjetnika.tpl',
      1 => 1654246821,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6299cda7430561_76849513 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="opcenito--forma-wrapper">
    <h2 class="opcenito--forma-naslov-forme">Dodavanje sudskog postupka</h2>
    <form class="opcenito--forma" method="post">
        <div class="opcenito--forma-stupci">
            <div class="opcenito--forma-prvi-stupac">
                <div class="opcenito--input">
                    <label>Naziv</label>
                    <input type="text" id="naziv" name="naziv">
                </div>
                <div class="opcenito--input">
                    <label>Protuzakonita radnja</label>
                    <input type="text" id="protuzakonita_radnja" name="protuzakonita_radnja">
                </div>
                <div class="opcenito--input">
                    <label>Dokaz</label>
                    <textarea id="dokaz" name="dokaz"></textarea>
                </div>
            </div>
            <div class="opcenito--forma-drugi-stupac">
                <div class="opcenito--input">
                    <label>Datum i vrijeme početka</label>
                    <input type="datetime-local" id="datum_vrijeme_pocetka" name="datum_vrijeme_pocetka">
                </div>
                <div class="opcenito--input">
                    <label>Klijent</label>
                    <select id="klijent" name="klijent">

                    </select>
                </div>
                <div class="opcenito--input">
                    <label>Tužitelj</label>
                    <input type="text" id="tuzitelj" name="tuzitelj">
                </div>
                <div class="opcenito--input">
                    <label>Kategorija</label>
                    <input type="text" id="kategorija" name="kategorija">
                </div>
            </div>
        </div>

        <div class="button-wrapper" >
            <button class="opcenito--vazan-gumb" type="submit" name="dodaj" id="dodaj">+ Dodaj</button>
        </div>
    </form>
</div><?php }
}
