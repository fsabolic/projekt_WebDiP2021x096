<?php
/* Smarty version 4.0.0, created on 2022-06-14 23:07:23
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/dodaj_sudski_postupak_odvjetnika.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62a8f88bd10de9_74078408',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '734eafddac0656e6689c8ca63e866cbb6b152e76' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/dodaj_sudski_postupak_odvjetnika.tpl',
      1 => 1655239011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a8f88bd10de9_74078408 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="opcenito--forma-wrapper">
    <h2 class="opcenito--forma-naslov-forme">Dodavanje sudskog postupka</h2>
    <form class="opcenito--forma" method="post" action="">
        <div class="opcenito--forma-stupci">
            <div class="opcenito--forma-prvi-stupac">
                <div class="opcenito--input">
                    <label>Naziv</label>
                    <input type="text" id="naziv" name="naziv" <?php if ($_smarty_tpl->tpl_vars['naziv']->value) {?>value="<?php echo $_smarty_tpl->tpl_vars['naziv']->value;?>
"<?php }?>>
                </div>
                <div class="opcenito--input">
                    <label>Protuzakonita radnja</label>
                    <input type="text" id="protuzakonita_radnja" name="protuzakonita_radnja" <?php if ($_smarty_tpl->tpl_vars['protuzakonita_radnja']->value) {?>value="<?php echo $_smarty_tpl->tpl_vars['protuzakonita_radnja']->value;?>
"<?php }?>>
                </div>
                <div class="opcenito--input">
                    <label>Dokaz</label>
                    <textarea id="dokaz" name="dokaz" ><?php if ($_smarty_tpl->tpl_vars['dokaz']->value) {
echo $_smarty_tpl->tpl_vars['dokaz']->value;
}?></textarea>
                </div>
            </div>
            <div class="opcenito--forma-drugi-stupac">
                <div class="opcenito--input">
                    <label>Datum i vrijeme početka</label>
                    <input type="text" id="datum_vrijeme_pocetka" name="datum_vrijeme_pocetka" <?php if ($_smarty_tpl->tpl_vars['datum_vrijeme_pocetka']->value) {?>value="<?php echo $_smarty_tpl->tpl_vars['datum_vrijeme_pocetka']->value;?>
"<?php }?>>
                </div>
                <div class="opcenito--input">
                    <label>Klijent</label>
                    <select id="klijent" name="klijent">
                        <option <?php if ($_smarty_tpl->tpl_vars['klijent_id']->value) {?>value="<?php echo $_smarty_tpl->tpl_vars['klijent_id']->value;?>
"<?php }?>> <?php if ($_smarty_tpl->tpl_vars['klijent']->value) {
echo $_smarty_tpl->tpl_vars['klijent']->value;
} else { ?>Odaberite klijenta<?php }?></option> 
                    </select>
                </div>
                <div class="opcenito--input">
                    <label>Tužitelj</label>
                    <input type="text" id="tuzitelj" name="tuzitelj" <?php if ($_smarty_tpl->tpl_vars['tuzitelj']->value) {?>value="<?php echo $_smarty_tpl->tpl_vars['tuzitelj']->value;?>
"<?php }?> disabled>
                </div>
                <div class="opcenito--input">
                    <label>Kategorija</label>
                    <input type="text" id="kategorija" name="kategorija" <?php if ($_smarty_tpl->tpl_vars['kategorija']->value) {?>value="<?php echo $_smarty_tpl->tpl_vars['kategorija']->value;?>
"<?php }?> disabled>
                </div>
            </div>

        </div>

        <div class="button-wrapper" >
            <button class="opcenito--vazan-gumb" type="submit" name="dodaj" id="dodaj">+ Dodaj</button>
        </div>

        <div id="sudski-postupak-odvjetnika-greske" class="opcenito--polje-za-greske" hidden=""></div>
    </form>
</div><?php }
}
