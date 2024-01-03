<?php
/* Smarty version 4.0.0, created on 2022-06-14 19:12:08
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/pravno_savjetovanje_odgovor.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62a8c168de6285_51535925',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c2b320e0b60e3a31e3ce9ea6896daad3cf1c1f5a' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/pravno_savjetovanje_odgovor.tpl',
      1 => 1655223967,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a8c168de6285_51535925 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="pravno-savjetovanje-odgovor--wrapper-wrapper">
    <div class="pravno-savjetovanje-odgovor--wrapper">
        <div class="pravno-savjetovanje-odgovor">
            <div class="pravno-savjetovanje-odgovor--klijent">
                <p class="pravno-savjetovanje-odgovor--naslov">Klijent: </p>
                <p class="pravno-savjetovanje-odgovor--naslov-vrijednost"></p><?php if ($_smarty_tpl->tpl_vars['klijent']->value) {
echo $_smarty_tpl->tpl_vars['klijent']->value;
}?><br>
                <p class="pravno-savjetovanje-odgovor--naslov">Datum i vrijeme slanja: </p>
                <p class="pravno-savjetovanje-odgovor--naslov-vrijednost"></p><?php if ($_smarty_tpl->tpl_vars['datum_vrijeme_postavljanja']->value) {
echo $_smarty_tpl->tpl_vars['datum_vrijeme_postavljanja']->value;
}?><br>
                <p class="pravno-savjetovanje-odgovor--naslov">Naslov: </p>
                <p class="pravno-savjetovanje-odgovor--naslov-vrijednost"></p><?php if ($_smarty_tpl->tpl_vars['naslov']->value) {
echo $_smarty_tpl->tpl_vars['naslov']->value;
}?><br>
                <p class="pravno-savjetovanje-odgovor-block-naslov" id='pitanje' value='<?php echo $_smarty_tpl->tpl_vars['pitanje_id']->value;?>
'>Pitanje:</p>
                <p class="pravno-savjetovanje-odgovor-block-naslov-vrijednost"><?php if ($_smarty_tpl->tpl_vars['pitanje']->value) {
echo $_smarty_tpl->tpl_vars['pitanje']->value;
}?></p>
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
<div id="pravno-savjetovanje-odgovor-greske" class="opcenito--polje-za-greske" hidden=""></div><?php }
}
