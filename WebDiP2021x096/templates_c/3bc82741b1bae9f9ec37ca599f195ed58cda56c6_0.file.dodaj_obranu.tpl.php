<?php
/* Smarty version 4.0.0, created on 2022-06-14 19:09:23
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/dodaj_obranu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62a8c0c3dd4f53_16229699',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3bc82741b1bae9f9ec37ca599f195ed58cda56c6' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/dodaj_obranu.tpl',
      1 => 1655223965,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a8c0c3dd4f53_16229699 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="opcenito--forma-wrapper">
    <h2 class="opcenito--forma-naslov-forme">Dodaj obranu</h2>
    <form class="opcenito--forma" method="post" action="" >
        <div class="opcenito--forma-stupci">
            <div class="opcenito--forma-prvi-stupac">
                <div class="opcenito--input">
                    <label>Argumenti obrane</label>
                    <textarea id="argumenti_obrane" name="argumenti_obrane"><?php if ($_smarty_tpl->tpl_vars['argumenti_obrane']->value) {
echo $_smarty_tpl->tpl_vars['argumenti_obrane']->value;
}?></textarea>
                </div>
            </div>
        </div>

        <div class="button-wrapper" >
            <button class="opcenito--vazan-gumb" type="submit" name="dodaj" id="dodaj">+ Dodaj</button>
        </div>

        <div id="obrana-greske" class="opcenito--polje-za-greske" hidden=""></div>
    </form>
</div>
<?php }
}
