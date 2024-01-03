<?php
/* Smarty version 4.0.0, created on 2022-05-28 02:09:49
  from '/opt/lampp/htdocs/Projekt/templates/u_izradi.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_6291684d214a01_04680626',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd6878a9f8d02e4f3fe7de2829339c688e80ddc8e' => 
    array (
      0 => '/opt/lampp/htdocs/Projekt/templates/u_izradi.tpl',
      1 => 1653696571,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6291684d214a01_04680626 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="u_izradi--poruka">
    <p>U izradi!</p>
    <img src="./resursi/izrada.gif" alt="izrada.gif">
    <br>
    <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/index.php"><p>Pokušaj se vratiti na početnu...</p></a>
</div>
<?php }
}
