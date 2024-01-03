<?php
/* Smarty version 4.0.0, created on 2022-06-14 23:28:33
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/prijava.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62a8fd819c5a66_37102446',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c7102579db6b87c5c727d4a91a22309e0424c1d' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/prijava.tpl',
      1 => 1655241865,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a8fd819c5a66_37102446 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="prijava--wrapper">
    <div class="opcenito--forma" id="prijava--div">
        <form id="prijava--forma" method="post" action="">
            <div class="opcenito--input">
                <label for="korisnicko_ime">Korisničko ime: </label>
                <input type="text" name="korisnicko_ime" id="korisnicko_ime" <?php if ($_smarty_tpl->tpl_vars['zapamti_ime']->value) {?>value="<?php echo $_smarty_tpl->tpl_vars['zapamti_ime']->value;?>
"<?php }?>>
            </div>
            <div class="opcenito--input">
                <label for="lozinka">Lozinka: </label>
                <input type="password" name="lozinka" id="lozinka">
            </div>

            <div class="opcenito--input">
                <label for="zapamti_ime">Zapamti ime: </label><br>
                <input type="checkbox" name="zapamti_ime" id="zapamti_ime">
            </div>

            <div id="prijava--zaboravljena-lozinka-wrapper">
                <p id="prijava--zaboravljena-lozinka">Zaboravljena lozinka</p>
            </div>
            <div class="button-wrapper" >
                <button class="opcenito--vazan-gumb" type="submit" name="prijavi_se" id="prijavi_se">Prijavi se</button>
            </div>

            <div id="prijava-greske" <?php if (count($_smarty_tpl->tpl_vars['greske_prijava']->value) === 0) {?>hidden=""<?php } else { ?>class="opcenito--polje-za-greske"<?php }?>>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['greske_prijava']->value, 'vrijednost', false, 'unos');
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
</div><?php }
}
