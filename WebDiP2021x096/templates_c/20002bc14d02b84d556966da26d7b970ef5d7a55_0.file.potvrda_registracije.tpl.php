<?php
/* Smarty version 4.0.0, created on 2022-06-14 19:29:09
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/potvrda_registracije.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62a8c5657fba29_97814814',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '20002bc14d02b84d556966da26d7b970ef5d7a55' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/potvrda_registracije.tpl',
      1 => 1655223964,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a8c5657fba29_97814814 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="potvrda-registracije--wrapper">
    <div>
       <?php if ($_smarty_tpl->tpl_vars['aktiviran']->value) {?>
       
           <p>Uspješno ste aktivirali korisnički račun!</p>
           <a href="./obrasci/prijava.php">Prijava</a>
       <?php } else { ?>
           
           <p>Niste uspješno aktivirali korisniški račun...Ponovno se registrirajte!</p>
           <a href="./obrasci/registracija.php">Registracija</a>
           
       <?php }?> 
       
    </div>
    
</div>
<?php }
}
