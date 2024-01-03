<?php
/* Smarty version 4.0.0, created on 2022-06-14 18:37:21
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/zatrazena_pravna_savjetovanja.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62a8b94140ecd2_85224513',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13094d2fd66b70796247914a42731155da474d99' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x096/templates/zatrazena_pravna_savjetovanja.tpl',
      1 => 1655223976,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a8b94140ecd2_85224513 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="opcenito--tablica-wrapper-wrapper">
    <div class="opcenito--tablica-wrapper">
        <h2 class="opcenito--tablica--naslov-tablice">Postavljena pitanja</h2>
        <div class="opcenito--tablica-zaglavlje">
            <div class="opcenito--tablica-zaglavlje-pretrazivanje">
                <div class="opcenito--tablica-zaglavlje-pretrazivanje-input">
                    <label for="pretrazi">Pretraži</label>
                    <input type="text" name="pretrazi" id="pretrazi">
                </div>
                <select id="atribut_za_pretrazivanje">
                    <option id="psp.klijent" name="psp.klijent" value="psp.klijent">Klijent</option>
                    <option id="psp.razlog" name="psp.razlog" value="psp.razlog">Naslov</option>
                    <option id="psp.opis" name="psp.opis" value="psp.opis">Tekst pitanja</option>
                    <option id="psp.datum_vrijeme_postavljanja" name="psp.datum_vrijeme_postavljanja" value="psp.datum_vrijeme_postavljanja">Datum i vrijeme postavljanja</option>
                </select>
            </div>
        </div>
        <table class="opcenito--tablica">
            <thead>
                <tr>
                    <th id="psp.klijent" class="opcenito--tablica-zaglavlje-hover">Klijent</th>

                    <th id="psp.razlog" class="opcenito--tablica-zaglavlje-hover">Naslov</th>

                    <th id="psp.opis" class="opcenito--tablica-zaglavlje-hover">Pitanje</th>

                    <th id="psp.datum_vrijeme_postavljanja" class="opcenito--tablica-zaglavlje-hover">Datum i vrijeme postavljanja</th>

                    <th id="h--odgovori">Odgovori</th>
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
