<?php
/* Smarty version 4.0.0, created on 2022-06-14 22:57:22
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/dodavanje_kategorije_sudskog_postupka.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62a8f6321290b9_06739138',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '968f1fb5ee58c3b3fe59ad5f925caeedb63c4095' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/dodavanje_kategorije_sudskog_postupka.tpl',
      1 => 1655238994,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a8f6321290b9_06739138 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="opcenito--forma-wrapper">
    <h2 class="opcenito--forma-naslov-forme">Dodavanje kategorije sudskog postupka</h2>
    <form class="opcenito--forma" method="post" action="">
        <div class="opcenito--forma-stupci">
            <div class="opcenito--forma-prvi-stupac">
                <div class="opcenito--input">
                    <label>Naziv</label>
                    <input type="text" id="naziv" name="naziv" <?php if ($_smarty_tpl->tpl_vars['naziv']->value) {?>value="<?php echo $_smarty_tpl->tpl_vars['naziv']->value;?>
"<?php }?>>
                </div>

                <div class="opcenito--input">
                    <label>Opis</label>
                    <textarea id="opis" name="opis" ><?php if ($_smarty_tpl->tpl_vars['opis']->value) {
echo $_smarty_tpl->tpl_vars['opis']->value;
}?></textarea>
                </div>
            </div>
        </div>

        <div class="button-wrapper" >
            <button class="opcenito--vazan-gumb" type="submit" name="dodaj" id="dodaj">+ Dodaj</button>
        </div>

        <div id="kategorije-greske" class="opcenito--polje-za-greske" hidden=""></div>
    </form>
</div><?php }
}
