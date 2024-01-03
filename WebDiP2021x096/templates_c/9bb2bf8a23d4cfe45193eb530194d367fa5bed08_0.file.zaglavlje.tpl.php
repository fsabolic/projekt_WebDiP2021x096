<?php
/* Smarty version 4.0.0, created on 2022-06-09 15:53:16
  from '/opt/lampp/htdocs/Projekt/templates/zaglavlje.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62a1fb4ce82d82_42159593',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9bb2bf8a23d4cfe45193eb530194d367fa5bed08' => 
    array (
      0 => '/opt/lampp/htdocs/Projekt/templates/zaglavlje.tpl',
      1 => 1654371088,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a1fb4ce82d82_42159593 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="hr">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Fran Sabolić">
        <meta name="keywords" content="FOI, WebDiP">
        <meta name="description" content="26.5.2022.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $_smarty_tpl->tpl_vars['naslov']->value;?>
</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/css/fsabolic.css">
        <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"><?php echo '</script'; ?>
>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/javascript/fsabolic.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src='https://www.google.com/recaptcha/api.js'><?php echo '</script'; ?>
>
    </head>
    <body>
        <header>
            <input type="checkbox" id="zaglavlje--skriveni-gumb">
            <div class="zaglavlje--skriveno-zaglavlje">
                <label for="zaglavlje--skriveni-gumb">
                    <img id="zaglavlje--hambi-ikona" class="opcenito--ikona" src="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/resursi/menu.png" alt="">
                </label>

                <h1>
                    <label class="zaglavlje--naslov"><?php echo $_smarty_tpl->tpl_vars['naslov']->value;?>
</label> 
                </h1>
                <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/index.php">
                    <img class="opcenito--ikona" src="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/resursi/logo.png" alt="">
                </a>
            </div>
            <div class="zaglavlje--zaglavlje">
                <label for="zaglavlje--skriveni-gumb">
                    <img id="zaglavlje--hambi-ikona" class="opcenito--ikona" src="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/resursi/menu.png" alt="">
                </label>

                <h1>
                    <label class="zaglavlje--naslov"><?php echo $_smarty_tpl->tpl_vars['naslov']->value;?>
</label> 
                </h1>
                <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/index.php">
                    <img class="opcenito--ikona" src="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/resursi/logo.png" alt="">
                </a>
            </div>

            <?php if ($_smarty_tpl->tpl_vars['naslov']->value != "U izradi...") {?>
                <nav class="zaglavlje--menu">

                    <label id="zaglavlje--cancel" for="zaglavlje--skriveni-gumb" ><img src="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/resursi/cancel.png" class="opcenito--ikona"></label>

                    <div id="zaglavlje--podaci-korisnika">
                        <p><strong>Korisnik:</strong> <?php echo $_smarty_tpl->tpl_vars['korisnicko_ime']->value;?>
</p>
                        <p><strong>Uloga:</strong> <?php echo $_smarty_tpl->tpl_vars['uloga']->value;?>
</p>
                    </div>
                    <ul id="zaglavlje--izbornik"> 
                        <?php if ($_smarty_tpl->tpl_vars['naslov']->value != "Početna stranica") {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/index.php">Početna stranica</a></li><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['naslov']->value != "Prijava" && $_smarty_tpl->tpl_vars['uloga_id']->value < 2) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/obrasci/prijava.php">Prijava</a></li><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['naslov']->value != "Registracija" && $_smarty_tpl->tpl_vars['uloga_id']->value < 2) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/obrasci/registracija.php">Registracija</a></li><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['naslov']->value != "Zahtjevi za odvjetnikom" && $_smarty_tpl->tpl_vars['uloga_id']->value > 1) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/zahtjevi_za_odvjetnikom.php">Zahtjevi za odvjetnikom</a></li><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['naslov']->value != "Sudski postupci odvjetnika" && $_smarty_tpl->tpl_vars['uloga_id']->value > 2) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/sudski_postupci_odvjetnika.php">Sudski postupci odvjetnika</a></li><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['naslov']->value != "Kolačići" && $_smarty_tpl->tpl_vars['uloga_id']->value > 1) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/obrasci/kolacici.php">Kolačići</a></li><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['naslov']->value != "Upravljanje konfiguracijom" && $_smarty_tpl->tpl_vars['uloga_id']->value > 3) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/upravljanje_konfiguracijom.php">Upravljanje konfiguracijom</a></li><?php }?>

                    </ul>

                    <?php if ($_smarty_tpl->tpl_vars['uloga_id']->value > 1) {?><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/index.php?odjava=1" id="zaglavlje--odjava">Odjava</a><?php }?>

                </nav>

            <?php }?>

        </header>
        <?php if ($_smarty_tpl->tpl_vars['uvjeti_koristenja']->value && $_smarty_tpl->tpl_vars['naslov']->value == "Početna stranica") {?>
            <div id="zaglavlje--uvjeti-koristenja">
                <h1 id="zaglavlje--uvjeti-koristenja-naslov">UVJETI KORIŠTENJA</h1>
                <p>Prihvatite uvjete korištenja kako bi mogli koristiti sve funkcionalnosti stranice!</p>
                <button type="button" id="zaglavlje--uvjeti-koristenja-prihvati" class="opcenito--vazan-gumb">Prihvatite uvjete korištenja</button>
                <button type="button" id="zaglavlje--uvjeti-koristenja-odbij" class="opcenito--obican-gumb">Odbijte uvjete korištenja</button>
            </div>
        <?php }?>
        <section <?php if ($_smarty_tpl->tpl_vars['naslov']->value != "Prijava" && $_smarty_tpl->tpl_vars['naslov']->value != "Registracija" && $_smarty_tpl->tpl_vars['naslov']->value != "Kolačići" && $_smarty_tpl->tpl_vars['naslov']->value != "Dodavanje sudskih postupaka odvjetnika" && $_smarty_tpl->tpl_vars['naslov']->value != "Kreiranje zahtjeva za odvjetnikom") {?>class="glavni-sadrzaj"<?php }?>><?php }
}
