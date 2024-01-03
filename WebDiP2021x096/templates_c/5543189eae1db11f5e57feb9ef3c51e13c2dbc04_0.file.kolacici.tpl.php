<?php
/* Smarty version 4.0.0, created on 2022-06-14 18:59:09
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/kolacici.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62a8be5da25ba1_44127654',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5543189eae1db11f5e57feb9ef3c51e13c2dbc04' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/kolacici.tpl',
      1 => 1655223982,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a8be5da25ba1_44127654 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="opcenito--tablica-forma-wrapper">
    <div class="opcenito--forma">
        <h2 class="naslov-tablice">Kolačići</h2>
        <form class="opcenito--tablica-forma" method="POST" action="">
            <table border="1">
                <thead>
                    <tr>
                        <th>Naziv</th>
                        <th>Opis</th>
                        <th>Potvrdi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Uvjeti korištenja</td>
                        <td>Ovaj kolačić se koristi za dozvoljavanje ostalih kolačića u cijeloj aplikaciji. Ako je onemogućen, neće raditi dodatne funkcionalnosti</td>
                        <td><input type="checkbox" name="uvjeti_koristenja" value="uvjeti_koristenja" value="uvjeti_koristenja" <?php if ($_smarty_tpl->tpl_vars['uvjeti_koristenja']->value) {?>checked=""<?php }?>></td>
                    </tr>
                    <tr>
                        <td>Zapamti ime</td>
                        <td>Ovaj kolačić koristi se za pamćenje korisničkog imena na formi za prijavu. Ako se na formi pritisne "Zapamti ime", ime će se zapamtiti, a u suprotnome se briše zapamćeno ime</td>
                        <td><input type="checkbox" name="zapamti_ime" value="zapamti_ime" value="zapamti_ime" <?php if ($_smarty_tpl->tpl_vars['zapamti_ime']->value) {?>checked=""<?php }?>></td>
                    </tr>
                    <tr>
                        <td>Povratak na stranicu</td>
                        <td>Ovaj kolačić pamti zadnju posjećenu stranicu korisnika nakon odjave ili odlaska sa sustava. Nakon prijave, korisnika se vraća na zadnju posjećenu stranicu nakon odjave ili odlaska</td>
                        <td><input type="checkbox" name="zadnja_stranica" value="zadnja_stranica" value="zadnja_stranica" <?php if ($_smarty_tpl->tpl_vars['zadnja_stranica']->value) {?>checked=""<?php }?>></td>
                    </tr>
                <tbody>
            </table>
            <div class="button-wrapper"><button type="submit" name="spremi" id="spremi" value="spremi" class="opcenito--vazan-gumb">Spremi</button></div>
        </form>
    </div>
</div><?php }
}
