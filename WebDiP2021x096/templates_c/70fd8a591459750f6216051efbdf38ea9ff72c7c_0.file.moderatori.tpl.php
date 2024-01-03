<?php
/* Smarty version 4.0.0, created on 2022-06-14 22:57:38
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/moderatori.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62a8f642357980_84050965',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '70fd8a591459750f6216051efbdf38ea9ff72c7c' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/moderatori.tpl',
      1 => 1655239009,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a8f642357980_84050965 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="opcenito--forma-wrapper">
    <h2 class="opcenito--forma-naslov-forme">Moderatori</h2>
    <form class="opcenito--forma" method="post" action="">
        <p class="kategorije--kategorija-naslov">Kategorija</p>
        <input type="text" id="kategorija_sudskog_postupka" class="kategorije--kategorija-input" vrijednost="<?php echo $_smarty_tpl->tpl_vars['kategorija_sudskog_postupka_id']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['kategorija_sudskog_postupka_naziv']->value;?>
" disabled>
        <div class="opcenito--forma-stupci">
            <div class="opcenito--forma-prvi-stupac">
                <div class="opcenito--input">
                    <label>Dodaj moderatora</label>
                    <select id="dodaj_moderatora" name="dodaj_moderatora">
                        <option value=""> Odaberite moderatora</option> 
                    </select>
                </div>
                <div class="button-wrapper" >
                    <button class="opcenito--vazan-gumb" type="button" name="dodaj" id="dodaj">+ Dodaj</button>
                </div>
            </div>
            <div class="opcenito--forma-drugi-stupac">
                <div class="opcenito--input">
                    <label>Obriši moderatora</label>
                    <select id="obrisi_moderatora" name="obrisi_moderatora">
                        <option value=""> Odaberite moderatora</option> 
                    </select>
                </div>
                <div class="button-wrapper" >
                    <button class="opcenito--vazan-gumb" type="button" name="obrisi" id="obrisi">- Obriši</button>
                </div>
            </div>

        </div>
        <div id="moderatori-greske" class="moderatori-greske" hidden=""></div>
    </form>
</div><?php }
}
