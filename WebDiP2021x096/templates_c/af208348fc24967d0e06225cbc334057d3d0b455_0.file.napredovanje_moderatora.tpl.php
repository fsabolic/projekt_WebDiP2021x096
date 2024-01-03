<?php
/* Smarty version 4.0.0, created on 2022-06-14 18:51:33
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/napredovanje_moderatora.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62a8bc955edc27_57913998',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'af208348fc24967d0e06225cbc334057d3d0b455' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/napredovanje_moderatora.tpl',
      1 => 1655223978,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a8bc955edc27_57913998 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="opcenito--tablica-wrapper-wrapper">
    <div class="opcenito--tablica-wrapper">
        <h2 class="opcenito--tablica--naslov-tablice">Napredovanje moderatora</h2>
        <div class="opcenito--tablica-zaglavlje">
            <div class="opcenito--tablica-zaglavlje-pretrazivanje">
                
            </div>
        </div>
        <table class="opcenito--tablica">
            <thead>
                <tr>
                    
                    <th id="korisnik_id" class="opcenito--tablica-zaglavlje-hover">ID korisnika</th>
                    
                    <th id="korisnicko_ime" class="opcenito--tablica-zaglavlje-hover">Korisničko ime</th>

                    <th id="ime_prezime" class="opcenito--tablica-zaglavlje-hover">Ime i prezime</th>

                    <th id="email" class="opcenito--tablica-zaglavlje-hover">E-mail</th>

                    <th id="broj_sudskih_postupaka" class="opcenito--tablica-zaglavlje-hover">Pokrenuti sudski postupci</th>

                    <th id="broj_prihvacenih_zahtjeva" class="opcenito--tablica-zaglavlje-hover">Prihvaćeni zahtjevi</th>

                    <th id="broj_danih_savjetovanja" class="opcenito--tablica-zaglavlje-hover">Dana savjetovanja</th>

                    <th id="h--promoviraj" >Promoviraj</th>
                </tr>    
            </thead>
            <tbody>

            </tbody>
        </table>
        <div class="opcenito--tablica-podnozje">
            <div class="button-wrapper"><button class="opcenito--obican-gumb" id="prva">Prva</button></div>
            <div class="button-wrapper"><button class="opcenito--obican-gumb" id="prijasnja">Prijašnja</button></div>
            <div class="button-wrapper"><button class="opcenito--obican-gumb" id="sljedeca">Sljedeća</button></div>
            <div class="button-wrapper"><button class="opcenito--obican-gumb" id="posljednja">Posljednja</button></div>
        </div>
    </div>
</div>

<input id="atribut_za_sortiranje" name="atribut_za_sortiranje" value="" hidden>
<input id="smjer_sortiranja" name="smjer_sortiranja" value="ASC" hidden>
<input id="broj_stranice" name="broj_stranice" value="0" hidden>




<?php }
}
