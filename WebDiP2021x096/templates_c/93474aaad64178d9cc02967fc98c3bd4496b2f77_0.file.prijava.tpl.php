<?php
/* Smarty version 4.0.0, created on 2022-06-02 18:41:07
  from '/opt/lampp/htdocs/Projekt/templates/prijava.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_6298e82377ff25_43959143',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '93474aaad64178d9cc02967fc98c3bd4496b2f77' => 
    array (
      0 => '/opt/lampp/htdocs/Projekt/templates/prijava.tpl',
      1 => 1654120829,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6298e82377ff25_43959143 (Smarty_Internal_Template $_smarty_tpl) {
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
