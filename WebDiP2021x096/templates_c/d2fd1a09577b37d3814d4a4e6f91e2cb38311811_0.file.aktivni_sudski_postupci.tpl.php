<?php
/* Smarty version 4.0.0, created on 2022-06-14 18:48:02
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/aktivni_sudski_postupci.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62a8bbc28b1ee7_27947969',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd2fd1a09577b37d3814d4a4e6f91e2cb38311811' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/aktivni_sudski_postupci.tpl',
      1 => 1655223970,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a8bbc28b1ee7_27947969 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="opcenito--forma-wrapper">
    <h2 class="opcenito--forma-naslov-forme">Ažuriranje sudskog postupka</h2>
    <form class="opcenito--forma" method="post" action="">
        <div class="opcenito--forma-stupci">
            <div class="opcenito--forma-prvi-stupac">
                <div class="opcenito--input">
                    <label>Datum i vrijeme završetka</label>
                    <input type="text" id="datum_vrijeme_zavrsetka" name="datum_vrijeme_zavrsetka" <?php if ($_smarty_tpl->tpl_vars['datum_vrijeme_zavrsetka']->value) {?>value="<?php echo $_smarty_tpl->tpl_vars['datum_vrijeme_zavrsetka']->value;?>
"<?php }?>>
                </div>
                <div class="opcenito--input">
                    <label>Zaključak postupka</label>
                    <select id="zakljucak_sudskog_postupka" name="zakljucak_sudskog_postupka">
                        <option id="kriv" value="1" <?php if ($_smarty_tpl->tpl_vars['zakljucak_sudskog_postupka']->value == 1) {?>selected<?php }?>>Kriv</option>
                        <option id="nije_kriv" value="0" <?php if ($_smarty_tpl->tpl_vars['zakljucak_sudskog_postupka']->value == 0) {?>selected<?php }?>>Nije kriv</option>
                    </select>
                </div>
                <hr style="border:1px #083c5d dashed;margin-top:30px;margin-bottom:30px;">
                <div class="opcenito--input">
                    <label>Naziv</label>
                    <input type="text" id="naziv" name="naziv" <?php if ($_smarty_tpl->tpl_vars['naziv']->value) {?>value="<?php echo $_smarty_tpl->tpl_vars['naziv']->value;?>
"<?php }?> disabled>
                </div><div class="opcenito--input">
                    <label>Protuzakonita radnja</label>
                    <input type="text" id="protuzakonita_radnja" name="protuzakonita_radnja" <?php if ($_smarty_tpl->tpl_vars['protuzakonita_radnja']->value) {?>value="<?php echo $_smarty_tpl->tpl_vars['protuzakonita_radnja']->value;?>
"<?php }?> disabled>
                </div>
                <div class="opcenito--input">
                    <label>Dokaz</label>
                    <textarea id="dokaz" name="dokaz" disabled><?php if ($_smarty_tpl->tpl_vars['dokaz']->value) {
echo $_smarty_tpl->tpl_vars['dokaz']->value;
}?></textarea>
                </div>
                <div class="opcenito--input">
                    <label>Datum i vrijeme početka</label>
                    <input type="text" id="datum_vrijeme_pocetka" name="datum_vrijeme_pocetka" <?php if ($_smarty_tpl->tpl_vars['datum_vrijeme_pocetka']->value) {?>value="<?php echo $_smarty_tpl->tpl_vars['datum_vrijeme_pocetka']->value;?>
"<?php }?>} disabled>
                </div>
                <div class="opcenito--input">
                    <label>Klijent</label>
                    <input type="text" id="klijent" name="klijent" <?php if ($_smarty_tpl->tpl_vars['klijent']->value) {?>value="<?php echo $_smarty_tpl->tpl_vars['klijent']->value;?>
"<?php }?> disabled>
                </div>
                <div class="opcenito--input">
                    <label>Tužitelj</label>
                    <input type="text" id="tuzitelj" name="tuzitelj" <?php if ($_smarty_tpl->tpl_vars['tuzitelj']->value) {?>value="<?php echo $_smarty_tpl->tpl_vars['tuzitelj']->value;?>
"<?php }?> disabled>
                </div>
                <div class="opcenito--input">
                    <label>Kategorija</label>
                    <input type="text" id="kategorija" name="kategorija" <?php if ($_smarty_tpl->tpl_vars['kategorija_sudskog_postupka']->value) {?>value="<?php echo $_smarty_tpl->tpl_vars['kategorija_sudskog_postupka']->value;?>
"<?php }?> disabled>
                </div>
            </div>

        </div>

        <div class="button-wrapper" >
            <button class="opcenito--vazan-gumb" type="submit" name="azuriraj" id="azuriraj">Ažuriraj</button>
        </div>

        <div id="azuriranje-postupka-greske" class="opcenito--polje-za-greske" hidden=""></div>
    </form>
</div><?php }
}
