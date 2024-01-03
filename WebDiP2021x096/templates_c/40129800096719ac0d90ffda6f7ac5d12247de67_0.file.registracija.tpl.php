<?php
/* Smarty version 4.0.0, created on 2022-06-14 19:27:02
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/registracija.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62a8c4e666b9b2_24687199',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '40129800096719ac0d90ffda6f7ac5d12247de67' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/registracija.tpl',
      1 => 1655223966,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a8c4e666b9b2_24687199 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="registracija--wrapper">
    <div class="opcenito--forma" id="registracija--div">
        <form id="registracija--forma" method="POST">
            <div class="opcenito--input <?php if ($_smarty_tpl->tpl_vars['greske_registracija']->value['korisnicko_ime']) {?>opcenito--pogresan-unos<?php }?>">
                <label for="korisnicko_ime">Korisničko ime: </label>
                <input type="text" name="korisnicko_ime" id="korisnicko_ime" maxlength=50 <?php if ($_smarty_tpl->tpl_vars['korisnicko_ime_registracija']->value) {?>value="<?php echo $_smarty_tpl->tpl_vars['korisnicko_ime_registracija']->value;?>
"<?php }?>>
            </div>
            <div class="opcenito--input <?php if ($_smarty_tpl->tpl_vars['greske_registracija']->value['ime_prezime']) {?>opcenito--pogresan-unos<?php }?>" >
                <label for="ime_prezime">Ime i prezime: </label>
                <input type="text" name="ime_prezime" id="ime_prezime" maxlength=50 <?php if ($_smarty_tpl->tpl_vars['ime_prezime_registracija']->value) {?>value="<?php echo $_smarty_tpl->tpl_vars['ime_prezime_registracija']->value;?>
"<?php }?>>
            </div>
            <div class="opcenito--input <?php if ($_smarty_tpl->tpl_vars['greske_registracija']->value['email']) {?>opcenito--pogresan-unos<?php }?>">
                <label for="email">E-mail: </label>
                <input type="text" name="email" id="email" maxlength=50 <?php if ($_smarty_tpl->tpl_vars['email_registracija']->value) {?>value="<?php echo $_smarty_tpl->tpl_vars['email_registracija']->value;?>
"<?php }?>>
            </div>
            <div class="opcenito--input <?php if ($_smarty_tpl->tpl_vars['greske_registracija']->value['lozinka']) {?>opcenito--pogresan-unos<?php }?>">
                <label for="lozinka">Lozinka: </label>
                <input type="password" name="lozinka" id="lozinka" maxlength=50 <?php if ($_smarty_tpl->tpl_vars['lozinka_registracija']->value) {?>value="<?php echo $_smarty_tpl->tpl_vars['lozinka_registracija']->value;?>
"<?php }?>>
            </div>
            <div class="opcenito--input <?php if ($_smarty_tpl->tpl_vars['greske_registracija']->value['ponovljena_lozinka']) {?>opcenito--pogresan-unos<?php }?>">
                <label for="ponovljena_lozinka">Ponovljena lozinka: </label>
                <input type="password" name="ponovljena_lozinka" id="ponovljena_lozinka" maxlength=50 <?php if ($_smarty_tpl->tpl_vars['ponovljena_lozinka_registracija']->value) {?>value="<?php echo $_smarty_tpl->tpl_vars['ponovljena_lozinka_registracija']->value;?>
"<?php }?>>
            </div>
            <div class='g-recaptcha' data-sitekey="6LeMXy8gAAAAAOOfH0Ropue91jfoMHyuSdhkZi83"></div>
            <div class="button-wrapper"><button class="opcenito--vazan-gumb" type="submit" name="registriraj_se" id="registriraj_se">Registriraj se</button></div>
            
            <div id="registracijske-greske" <?php if (count($_smarty_tpl->tpl_vars['greske_registracija']->value) === 0) {?>hidden=""<?php } else { ?>class="opcenito--polje-za-greske"<?php }?>>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['greske_registracija']->value, 'vrijednost', false, 'unos');
$_smarty_tpl->tpl_vars['vrijednost']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['unos']->value => $_smarty_tpl->tpl_vars['vrijednost']->value) {
$_smarty_tpl->tpl_vars['vrijednost']->do_else = false;
?>
                    <p><?php echo $_smarty_tpl->tpl_vars['vrijednost']->value;?>
</p>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
        </form>
    </div>
</div>

<?php }
}
