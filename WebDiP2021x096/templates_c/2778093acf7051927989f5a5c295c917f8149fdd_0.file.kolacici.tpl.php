<?php
/* Smarty version 4.0.0, created on 2022-06-02 16:42:10
  from '/opt/lampp/htdocs/Projekt/templates/kolacici.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_6298cc42dc4cf8_15081291',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2778093acf7051927989f5a5c295c917f8149fdd' => 
    array (
      0 => '/opt/lampp/htdocs/Projekt/templates/kolacici.tpl',
      1 => 1654180928,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6298cc42dc4cf8_15081291 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="opcenito--tablica-forma-wrapper">
    <div class="opcenito--forma">
        <h2 class="naslov-tablice">Kolačići</h2>
        <form class="opcenito--tablica-forma">
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
                        <td><input type="checkbox"></td>
                    </tr>
                    <tr>
                        <td>Zapamti ime</td>
                        <td>Ovaj kolačić koristi se za pamćenje korisničkog imena na formi za prijavu. Ako se na formi pritisne "Zapamti ime", ime će se zapamtiti, a u suprotnome se briše zapamćeno ime</td>
                        <td><input type="checkbox"></td>
                    </tr>
                    <tr>
                        <td>Povratak na stranicu</td>
                        <td>Ovaj kolačić pamti zadnju posjećenu stranicu korisnika nakon odjave ili odlaska sa sustava. Nakon prijave, korisnika se vraća na zadnju posjećenu stranicu nakon odjave ili odlaska</td>
                        <td><input type="checkbox"></td>
                    </tr>
                <tbody>
            </table>
        </form>
    </div>
</div><?php }
}
