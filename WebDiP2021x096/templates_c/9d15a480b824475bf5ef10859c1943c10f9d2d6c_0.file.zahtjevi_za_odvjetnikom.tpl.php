<?php
/* Smarty version 4.0.0, created on 2022-06-14 23:28:49
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/zahtjevi_za_odvjetnikom.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62a8fd911a1419_34100984',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9d15a480b824475bf5ef10859c1943c10f9d2d6c' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/zahtjevi_za_odvjetnikom.tpl',
      1 => 1655241861,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a8fd911a1419_34100984 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="opcenito--tablica-wrapper-wrapper">
    <div class="opcenito--tablica-wrapper">
        <h2 class="opcenito--tablica--naslov-tablice">Zahtjevi za odvjetnikom</h2>
        <div class="opcenito--tablica-zaglavlje">
            <div class="button-wrapper"><button class="opcenito--vazan-gumb" id="dodaj" name="dodaj">+ Dodaj zahtjev</button></div>
            <div class="opcenito--tablica-zaglavlje-pretrazivanje">

                <div class="opcenito--tablica-zaglavlje-pretrazivanje-input">
                    <label for="pretrazi">Pretraži</label>
                    <input type="text" name="pretrazi" id="pretrazi">
                </div>
                <select id="atribut_za_pretrazivanje">
                    <option id="z.zahtjev_id" name="z.zahtjev_id" value="z.zahtjev_id">ID zahtjeva</option>
                    <option id="z.datum_vrijeme_slanja" name="z.datum_vrijeme_slanja" value="z.datum_vrijeme_slanja">Datum i vrijeme slanja</option>
                    <option id="sp.naziv" name="sp.naziv" value="sp.naziv">Naziv sudskog postupka</option>
                    <option id="k.ime_prezime" name="k.ime_prezime" value="k.ime_prezime">Odvjetnik</option>
                </select>
            </div>
        </div>
        <table class="opcenito--tablica">
            <thead>
                <tr>
                    <th id="z.zahtjev_id" class="opcenito--tablica-zaglavlje-hover">ID zahtjeva</th>

                    <th id="z.slika_sudskog_postupka" class="opcenito--tablica-zaglavlje-hover">Slika sudskog postupka</th>

                    <th id="z.datum_vrijeme_slanja" class="opcenito--tablica-zaglavlje-hover">Datum i vrijeme slanja</th>

                    <th id="sp.naziv" class="opcenito--tablica-zaglavlje-hover">Naziv sudskog postupka</th>

                    <th id="k.ime_prezime" class="opcenito--tablica-zaglavlje-hover">Ime i prezime odvjetnika</th>

                    <th id="z.status" class="opcenito--tablica-zaglavlje-hover">Status</th>

                    <th id="azuriraj" >Ažuriraj</th>

                    <th id="h--obrisi" >Obriši</th>
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
