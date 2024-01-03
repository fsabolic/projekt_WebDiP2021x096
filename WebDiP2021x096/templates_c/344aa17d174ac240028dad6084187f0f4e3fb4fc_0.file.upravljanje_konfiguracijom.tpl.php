<?php
/* Smarty version 4.0.0, created on 2022-06-03 00:43:21
  from '/opt/lampp/htdocs/Projekt/templates/upravljanje_konfiguracijom.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62993d09892a86_95400915',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '344aa17d174ac240028dad6084187f0f4e3fb4fc' => 
    array (
      0 => '/opt/lampp/htdocs/Projekt/templates/upravljanje_konfiguracijom.tpl',
      1 => 1654164195,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62993d09892a86_95400915 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="konfiguracija-greske" hidden="">
</div>
<div class="opcenito--forma">
    <form id="konfiguracijska-forma" name="konfiguracijska-forma" method="POST" action="upravljanje_konfiguracijom.php">

        <div class="opcenito--input">
            <label for="trajanje_kolacica">Trajanje kolačića: </label>
            <input type="text" name="trajanje_kolacica" id="trajanje_kolacica" maxlength="5" value="<?php echo $_smarty_tpl->tpl_vars['trajanje_kolacica']->value;?>
">
        </div>

        <div class="opcenito--input">
            <label for="broj_stranica_stranicenja">Broj stranica straničenja: </label>
            <input type="text" name="broj_stranica_stranicenja" id="broj_stranica_stranicenja" maxlength="5" value="<?php echo $_smarty_tpl->tpl_vars['broj_stranica_stranicenja']->value;?>
">
        </div>

        <div class="opcenito--input">
            <label for="trajanje_sesije">Trajanje sesije: </label>
            <input type="text" name="trajanje_sesije" id="trajanje_sesije" maxlength="5" value="<?php echo $_smarty_tpl->tpl_vars['trajanje_sesije']->value;?>
">
        </div>

        <div class="opcenito--izbor">
            <label for="smjer_sortiranja">Smjer sortiranja: </label>
            <select name="smjer_sortiranja" id="smjer_sortiranja" >
                <option value="0" <?php if ($_smarty_tpl->tpl_vars['smjer_sortiranja']->value == 0) {?>selected<?php }?>>Uzlazno</option>
                <option value="1"  <?php if ($_smarty_tpl->tpl_vars['smjer_sortiranja']->value == 1) {?>selected<?php }?>>Silazno</option>
            </select>
        </div>

        <div class="opcenito--input">
            <label for="broj_neuspjesnih_prijava">Broj neuspješnih prijava: </label>
            <input type="text" name="broj_neuspjesnih_prijava" id="broj_neuspjesnih_prijava" maxlength="5" value="<?php echo $_smarty_tpl->tpl_vars['broj_neuspjesnih_prijava']->value;?>
">
        </div>

        <div class="opcenito--input">
            <label for="broj_sudskih_postupaka">Broj sudskih postupaka: </label>
            <input type="text" name="broj_sudskih_postupaka" id="broj_sudskih_postupaka" maxlength="5" value="<?php echo $_smarty_tpl->tpl_vars['broj_sudskih_postupaka']->value;?>
">
        </div>

        <div class="opcenito--input">
            <label for="broj_zahtjeva">Broj zahtjeva: </label>
            <input type="text" name="broj_zahtjeva" id="broj_zahtjeva" maxlength="5" value="<?php echo $_smarty_tpl->tpl_vars['broj_zahtjeva']->value;?>
">
        </div>

        <div class="opcenito--input">
            <label for="broj_odgovora">Broj odgovora: </label>
            <input type="text" name="broj_odgovora" id="broj_odgovora" maxlength="5" value="<?php echo $_smarty_tpl->tpl_vars['broj_odgovora']->value;?>
">
        </div> 

        <div class="opcenito--input">
            <label for="istek_verifikacije">Istek verifikacije: </label>
            <input type="text" name="istek_verifikacije" id="istek_verifikacije" maxlength="5" value="<?php echo $_smarty_tpl->tpl_vars['istek_verifikacije']->value;?>
">
        </div>
        <div class="button-wrapper"><button form="konfiguracijska-forma" type="submit" name="submit" id="spremi-konfiguraciju" class="opcenito--vazan-gumb">Spremi</button></div>

    </form>

</div>
<div id="pomak-greske" hidden="">
</div>
<div class="opcenito--forma">
    <div id="pomak-vremena">
        <div class="opcenito--input">
            <label for="pomak">Pomak: </label>
            <input type="text" name="pomak" id="pomak" disabled value="<?php echo $_smarty_tpl->tpl_vars['pomak']->value;?>
"> 
        </div>
        <div class="opcenito--skup-gumbova">
            <div class="button-wrapper"><button type="button" name="postavi-pomak" id="postavi-pomak" value="postavi" class="opcenito--obican-gumb">Postavi pomak</button>
                <button type="button" name="dohvati-pomak"  id="dohvati-pomak" value="dohvati" class="opcenito--obican-gumb">Dohvati pomak</button>
                <button type="button" name="spremi-pomak" id="spremi-pomak" value="spremi_pomak" class="opcenito--vazan-gumb">Spremi pomak</button></div>
        </div>
    </div>
</div>

<div class="opcenito--forma">
    <div id="uvjeti-koristenja-reset">
        <div class="opcenito--input">
            <label>Resetirajte sve kolačiće za uvjete korištenja</label>
        </div>

        <div class="button-wrapper"><button type="button" name="reset"  id="reset" value="reset" class="opcenito--vazan-gumb">Reset</button></div>

    </div>
</div>
<div id="css-greske" class="<?php echo $_smarty_tpl->tpl_vars['greske_klasa']->value;?>
">
    <p><?php echo $_smarty_tpl->tpl_vars['css_greske']->value;?>
</p>
</div>
<div class="opcenito--forma">
    <form id="stilska-forma" name="stilska-forma" method="POST" action="upravljanje_konfiguracijom.php" enctype="multipart/form-data">
        <div class="opcenito--input"><label>Upload CSS datoteke: </label><input type="file" name="css_datoteka" id="css_datoteka"></div>
        <div class="button-wrapper"><button form="stilska-forma" type="submit" id="spremi-css" name="spremi-css" class="opcenito--vazan-gumb">Spremi CSS</button></div>
        <br><br><br><br>
        <div class="opcenito--input"><label>Uređivanje CSS datoteke: </label><textarea name="uredivanje-css" id="uredivanje-css"><?php echo $_smarty_tpl->tpl_vars['css']->value;?>
</textarea></div>
        <div class="button-wrapper"><button form="stilska-forma" type="submit" id="spremi-css-tekst" name="spremi-css-tekst" class="opcenito--vazan-gumb">Spremi CSS tekst</button></div>

    </form>
</div><?php }
}
