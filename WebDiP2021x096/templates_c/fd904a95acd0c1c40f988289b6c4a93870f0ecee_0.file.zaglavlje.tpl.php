<?php
/* Smarty version 4.0.0, created on 2022-06-14 23:28:12
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/zaglavlje.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62a8fd6c953db1_00809858',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fd904a95acd0c1c40f988289b6c4a93870f0ecee' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/zaglavlje.tpl',
      1 => 1655241868,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a8fd6c953db1_00809858 (Smarty_Internal_Template $_smarty_tpl) {
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

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@100;200;300&display=swap" rel="stylesheet"> 

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
                        <?php if ($_smarty_tpl->tpl_vars['naslov']->value != "Rang lista odvjetnika") {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/rang_lista_odvjetnika.php">Rang lista</a></li><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['naslov']->value != "Galerija sudskih postupaka") {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/galerija_sudskih_postupaka.php">Galerija sudskih postupaka</a></li><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['naslov']->value != "Prihvaćeni zahtjevi" && $_smarty_tpl->tpl_vars['uloga_id']->value > 2) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/prihvaceni_zahtjevi.php">Prihvaćeni zahtjevi</a></li><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['naslov']->value != "Zahtjevi za odvjetnikom" && $_smarty_tpl->tpl_vars['uloga_id']->value > 1) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/zahtjevi_za_odvjetnikom.php">Zahtjevi za odvjetnikom</a></li><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['naslov']->value != "Sudski postupci odvjetnika" && $_smarty_tpl->tpl_vars['uloga_id']->value > 2) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/sudski_postupci_odvjetnika.php">Sudski postupci odvjetnika</a></li><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['naslov']->value != "Kategorije sudskih postupaka" && $_smarty_tpl->tpl_vars['uloga_id']->value > 3) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/kategorije_sudskih_postupaka.php">Kategorije sudskih postupaka</a></li><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['naslov']->value != "Pravno savjetovanje klijenta" && $_smarty_tpl->tpl_vars['uloga_id']->value > 1) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/pravno_savjetovanje_klijenta.php">Pravno savjetovanje klijenta</a></li><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['naslov']->value != "Zatražena pravna savjetovanja" && $_smarty_tpl->tpl_vars['uloga_id']->value > 2) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/zatrazena_pravna_savjetovanja.php">Zatražena pravna savjetovanja</a></li><?php }?> 

                        <?php if ($_smarty_tpl->tpl_vars['naslov']->value != "Dnevnik" && $_smarty_tpl->tpl_vars['uloga_id']->value > 3) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/dnevnik.php">Dnevnik</a></li><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['naslov']->value != "Kolačići" && $_smarty_tpl->tpl_vars['uloga_id']->value > 1) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/obrasci/kolacici.php">Kolačići</a></li><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['naslov']->value != "Blokirani korisnici" && $_smarty_tpl->tpl_vars['uloga_id']->value > 3) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/blokirani_korisnici.php">Blokirani korisnici</a></li><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['naslov']->value != "Napredovanje moderatora" && $_smarty_tpl->tpl_vars['uloga_id']->value > 3) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/napredovanje_moderatora.php">Napredovanje moderatora</a></li><?php }?>

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

        <section <?php if ($_smarty_tpl->tpl_vars['naslov']->value != "Prijava" && $_smarty_tpl->tpl_vars['naslov']->value != "Registracija" && $_smarty_tpl->tpl_vars['naslov']->value != "Kolačići" && $_smarty_tpl->tpl_vars['naslov']->value != "Dodavanje sudskih postupaka odvjetnika" && $_smarty_tpl->tpl_vars['naslov']->value != "Kreiranje zahtjeva za odvjetnikom" && $_smarty_tpl->tpl_vars['naslov']->value != "Dodaj obranu" && $_smarty_tpl->tpl_vars['naslov']->value != "Ažuriranje aktivnog sudskog postupka" && $_smarty_tpl->tpl_vars['naslov']->value != "Pravna savjetovanja" && $_smarty_tpl->tpl_vars['naslov']->value != "Dodavanje kategorije sudskog postupka" && $_smarty_tpl->tpl_vars['naslov']->value != "Moderatori") {?>class="glavni-sadrzaj"<?php }?>><?php }
}
