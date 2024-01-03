<?php
/* Smarty version 4.0.0, created on 2022-06-14 22:55:08
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/kreiranje_zahtjeva_za_odvjetnikom.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62a8f5ace6b8e8_76840335',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f0b3f15625ac3c9d931818fc7bcc04d3f73873cf' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/kreiranje_zahtjeva_za_odvjetnikom.tpl',
      1 => 1655239000,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a8f5ace6b8e8_76840335 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="opcenito--forma-wrapper">
    <h2 class="opcenito--forma-naslov-forme">Kreiranje zahtjeva za odvjetnikom</h2>
    <form class="opcenito--forma" enctype="multipart/form-data" method="post" action="" >
        <div class="opcenito--forma-stupci">
            <div class="opcenito--forma-prvi-stupac">
                <div class="opcenito--input">
                    <label>Slika sudskog postupka</label>
                    <input type="file" id="slika_sudskog_postupka" name="slika_sudskog_postupka" >
                </div>
                
               <?php if ($_smarty_tpl->tpl_vars['slika_sudskog_postupka']->value) {?>
                   <a href="<?php echo $_smarty_tpl->tpl_vars['slika_sudskog_postupka']->value;?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['slika_sudskog_postupka']->value;?>
" class="opcenito--ikona-slika"></a>
               <?php }?> 

                <div class="opcenito--input">
                    <label>Sudski postupak</label>
                    <select id="sudski_postupak" name="sudski_postupak">
                        <option <?php if ($_smarty_tpl->tpl_vars['sudski_postupak_id']->value) {?>value="<?php echo $_smarty_tpl->tpl_vars['sudski_postupak_id']->value;?>
"<?php }?>> <?php if ($_smarty_tpl->tpl_vars['sudski_postupak_naziv']->value) {
echo $_smarty_tpl->tpl_vars['sudski_postupak_naziv']->value;
} else { ?>Odaberite sudski postupak<?php }?></option> 
                    </select>
                </div>
                <div class="opcenito--input">
                    <label>Odvjetnik</label>
                    <select id="odvjetnik" name="odvjetnik">
                        <option <?php if ($_smarty_tpl->tpl_vars['odvjetnik_id']->value) {?>value="<?php echo $_smarty_tpl->tpl_vars['odvjetnik_id']->value;?>
"<?php }?>> <?php if ($_smarty_tpl->tpl_vars['odvjetnik_ime_prezime']->value) {
echo $_smarty_tpl->tpl_vars['odvjetnik_ime_prezime']->value;
} else { ?>Odaberite odvjetnika<?php }?></option> 
                    </select>
                </div>
            </div>
        </div>

        <div class="button-wrapper" >
            <button class="opcenito--vazan-gumb" type="submit" name="dodaj" id="dodaj">+ Dodaj</button>
        </div>

        <div id="sudski-postupak-odvjetnika-greske" class="opcenito--polje-za-greske" hidden=""></div>
    </form>
</div>
<?php }
}
