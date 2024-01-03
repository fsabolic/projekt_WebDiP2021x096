<div class="dokumentacija--wrapper">
    <div class="dokumentacija">
        <h1 style="text-align: center;"><strong>Projektni zadatak: </strong> Odvjetnički ured</h1>
        <h2><strong>Projektni zadatak</strong></h2>
        <p class="dokumentacija--paragraf">Projektni zadatak zahtjevao je izradu sustava za interakciju između klijenata, odvjetnika i partnera odvjetničke firme. Neregistrirani korisnici imaju mogućnost pregleda rang liste odvjetnika prema broju zahtjeva za obranu koje su prihvatili. Osim toga, neregistrirani korisnici vide galeriju svih sudskih postupaka i njihovih slika. Registrirani korisnici mogu zatražiti odvjetnika za obranu što odvjetnik može odbiti ili prihvatiti na temelju čega mora ili ne mora napisati obranu za dani sudski postupak. Registrirani korisnici također mogu tražiti pravno savjetovanje od svih odvjetnik na što im oni mogu odgovoriti. Na kraju, registrirani korisnici imaju uvid u statistiku vlastitih sudskih postupaka (kriv/nije kriv). Odvjetnici pak mogu pokrenuti sudski postupak protiv nekog klijenta. Odvjetnici mogu biti tužitelji (pokreću sudski postupak) ili branitelji (prihvaćaju zahtjev za obranom). Svaki odvjetnik ima uvid u statistiku kojom se vidi je li ispunio određene uvjete postavljene od strane partnera kako bi postao partner. Na kraju, partneri imaju mogućnost dodavanja kategorija sudskih postupaka i podjelu odvjetnika u određene kategorije. Osim toga, partneri su administratori sustava što znači da mogu upravljati blokiranjem, promoviranjem, konfiguracijom, pomakom za virtualno vrijeme i slično. Od statistike, partneri imaju uvid u dnevnik sustava i mogu na temelju njega izraditi izvješća.</p>
        <br>
        <h2><strong>Projektno rješenje</strong></h2>
        <p class="dokumentacija--paragraf">Projektno rješenje ne sadrži statistike kao što su navedene u projektnom zadatku. Ostale funkcionalnosti su u potpunosti imeplementirane uz dodatno korištenje jQuery AJAX-a i s pažnjom posvećenom na zaštitu od SQL injection napada. Djelomično je implementirana i zaštita od XSS napada no nisu implementirane zaštite za ispis koristeći htmlspecialchars() funckiju već samo zaštita pri unosu koristeći filter_input() funkciju. Većina CRUD operacija implementirana je u obliku tablica, a gotovo svaka tablica ima mogućnost pretraživanja, sortiranja i straničenja. Konfiguracija aplikacije implementirana je kao .config datoteka na serveru u koju se zapisuju relevatne konfiguracijske postavke. Dnevnik rada sustava implementiran je kao tablica u bazi podataka. Vrijeme potrebno za izradu je bilo 3 tjedna. U radu aplikacije se može primjetiti nekoliko grešaka koje mogu nastati neopreznim rukovanjem aplikacije. Jedna od njih bila bi zaključavanje mjesta sa stranicom u_izradi.php. Ako se administrator odjavi pri korištenju stranice za upravljanem konfiguracije, konfiguracija ne stigne promijeniti status stranice u otključanu. Česta su i upozorenja u konzoli zbog korištenja sesijskog kolačića i korištenja asinkronog AJAX poziva, no one ne utječu na pravilan rad aplikacije. Tehnologije korištene za izradu rješenja su programski jezici PHP i JavaScript, te mark-up jezik HTML i kaskadne stilske tablice (CSS). Od vanjskih resursa korišteni su Google-ov reCaptcha API i Google Fonts API.</p>

        <h2><stron>ERA model</stron></h2>
        <a href="./resursi/era.png" target="_blank"><img src="./resursi/era.png" class="dokumentacija--era"></a>

        <h2><stron>Popis i opis skripti</stron></h2>
        <div class="opcenito--tablica-wrapper-wrapper">
            <div class="opcenito--tablica-wrapper">
                <div class="opcenito--tablica"> <table class="opcenito--tablica">
                        <thead>
                            <tr>
                                <th>Naziv skripte</th>

                                <th>Opis</th>
                            </tr>    
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2">.</td>
                            </tr>
                            <tr>
                                <td>zaglavlje.php</td>
                                <td>Skripta koja se izvršava prije učitavanja svake stranice. Služi za postavljanje Smarty-ja u rad, kreiranje korisničke sesije, pozivanje osnovnih klasa koje se često koriste u svim stranicama, postavljanje vremena registracije i upravljanje trajanjem sesije,odjavljivanje korisnika iz sustava, implementaciju funkcionalnosti kolačića, postavljanje varijable za naziv stranice na svim stranicama u kojima se poziva i za zaključavanje i otključavanje sustava pri radu s konfiguracijom sustava</td>
                            </tr>
                            <tr>
                                <td>rang_lista_odvjetnika.php</td>
                                <td rowspan="18">Skripte u kojima se dodjeljuje naslov stranice, specificira se direktorij i putanja do skripte, poziva se skripta zaglavlja za izvršavanje općenitih operacija prije izvođenja skripte za stranicu i učitavaju se Smarty .tpl datoteke za određenu stranicu i podnožje. Osim toga, ove skripte upravljaju razinom pristupa stranicama (odnosno, definiraju koja uloga korisnika može pristupiti stranici)</td>
                            </tr>
                            <tr>
                                <td>galerija_sudskih_postupaka.php</td>

                            </tr>
                            <tr>
                                <td>blokirani_korisnici.php</td>
                            </tr>
                            <tr>
                                <td>dokumentacija.php</td>
                            </tr>
                            <tr>
                                <td>index.php</td>
                            </tr>                            
                            <tr>
                                <td>kategorije_sudskih_postupaka.php</td>
                            </tr>                            
                            <tr>
                                <td>napredovanje_moderatora.php</td>
                            </tr>                            
                            <tr>
                                <td>o_autoru.php</td>
                            </tr>                            
                            <tr>
                                <td>podnozje.php</td>
                            </tr>                            
                            <tr>
                                <td>potvrda_registracije.php</td>
                            </tr>                            
                            <tr>
                                <td>pravno_savjetovanje_klijenta.php</td>
                            </tr>                            
                            <tr>
                                <td>prihvacenih_zahtjevi.php</td>
                            </tr>                            
                            <tr>
                                <td>rang_lista_odvjetnika.php</td>
                            </tr>                            
                            <tr>
                                <td>sudski_postupci.php</td>
                            </tr>                            
                            <tr>
                                <td>u_izradi.php</td>
                            </tr>                           
                            <tr>
                                <td>zahtjevi_za_odvjetnikom.php</td>
                            </tr>                            
                            <tr>
                                <td>zaprimljeni_zahtjevi.php</td>
                            </tr>                            
                            <tr>
                                <td>zatrazena_pravna_savjetovanja.php</td>
                            </tr>                             
                            <tr>
                                <td>upravljanje_konfiguracijom.php</td>
                                <td>Skripta ima svrhu kao i prije navedene skripte, no uz to sadrži funkcionalnosti za pohranu i uređivanje glavne CSS datoteke aplikacije, ažuriranje konfiguracijske datoteke i spremanje pomaka za virtualno vrijeme</td>
                            </tr>
                            <tr>
                                <td colspan="2">javascript</td>
                            </tr>
                            <tr>
                                <td>fsabolic.js</td>
                                <td>Skripta za upravljanje aplikacijom na strani korisnika. Sastoji se od velikog broj funkcija koje se izvode ovisno o trenutnoj stranici na kojoj se korisnik nalazi. U njoj se koristi jQuery biblioteka za lakše rukovanje DOM-om. Iako sadrži mnogo funkcija, većina ima sličnu ili istu funkcionalnost primjenjenu na drugoj stranici s par izmjena. Funkcije koje nose naziv stranice na kojoj se nalazimo služe za postavljanje event-handlera za tu stranicu. One najčešće sadrže funkcije tipa "postaviTablicu[NAZIV STRANICE]" koje dohvaćaju podatke iz baze podataka i prikazuju ih u obliku HTML tablica. Te funkcije služe i za dohvaćanje naziva stupaca koji će se kasnije pretraživati i sortirati. Sve takve funkcije sadrže AJAX pozive za rad s bazom podataka. Treća "vrsta" funkcija koja se izvršava u ovoj skripti je tipa "provjeriUnose[NAZIV STRANICE]". U njoj se provjeravaju unosi korisnika tako da se validiraju kroz razne funkcije. Pomoću tih funkcija ispisuju se greške pri unosu na stranici na kojoj se korisnik trenutno nalazi. Četvrta vrsta funkcija je općenita i mogu služiti u razne svrhe, no najčešće se koriste za definiranje određenih događaja koji se moraju izvesti na zahtjev klijenta</td>
                            </tr>
                            <tr>
                                <td colspan="3">klase</td>
                            </tr>
                            <tr>
                                <td>baza.class.php</td>
                                <td>Klasa za lakši rad sa bazom podataka. Njene metode služe za spajanje, dohvaćanje, ažuriranje, brisanje, unos i odspajanje sa baze podataka.Klasa je preuzeta sa sustava Moodle i dorađena za potrebe projektnog rješenja</td>
                            </tr>
                            <tr>
                                <td>konfiguracija.class.php</td>
                                <td>Klasa napravljena za rukovanje konfiguracijkom datotekom. Služi za čitanje i pisanje u datoteku "konfiguracija.config", te za praćenje virtualnog vremena.</td>
                            </tr>
                            <tr>
                                <td>sesija.class.php</td>
                                <td>Klasa za lakše rukovanje sesijom.Klasa je preuzeta sa sustava Moodle i dorađena za potrebe projektnog rješenja</td>
                            </tr>
                            <tr>
                                <td colspan="2">skripte</td>
                            </tr>
                            <tr>
                                <td>azuriraj_moderatora.php</td>
                                <td rowspan="2">Skripte koje služe za obavljanje UPDATE operacije nad danom tablicom u bazi podataka. Koriste se u AJAX pozivima.</td>
                            </tr>
                            <tr>
                                <td>azuriraj_status_zahtjeva.php</td>
                            </tr>
                            <tr>
                                <td>dohvacanje_pomaka.php</td> 
                                <td rowspan="13">Skripte koje služe za dohvaćanje podataka iz tablice u bazi podataka (SELECT upiti). Koriste se u AJAX pozivima.</td>
                            </tr>
                            <tr>
                                <td>dohvati_dnevnik.php</td>
                            </tr>
                            <tr>
                                <td>dohvati_kategorije_sudskih_postupaka.php</td>
                            </tr>
                            <tr>
                                <td>dohvati_moderatore_za_napredovanje.php</td>
                            </tr>
                            <tr>
                                <td>dohvati_pravna_savjetovanja_za_klijenta.php</td>
                            </tr>
                            <tr>
                                <td>dohvati_prihvacene_zahtjeve.php</td>
                            </tr>
                            <tr>
                                <td>dohvati_rang_listu.php</td>
                            </tr>
                            <tr>
                                <td>dohvati_slike_sudskih_postupaka.php</td>
                            </tr>
                            <tr>
                                <td>dohvati_sudske_postupke_odvjetnika.php</td>
                            </tr>
                            <tr>
                                <td>dohvati_sve_korisnike_za_blokiranje.php</td>
                            </tr>
                            <tr>
                                <td>dohvati_zahtjeve_za_odvjetnikom.php</td>
                            </tr>
                            <tr>
                                <td>dohvati_zaprimljene_zahtjeve.php</td>
                            </tr>
                            <tr>
                                <td>dohvati_zatrazena_pravna_savjetovanja.php</td>
                            </tr>
                            <tr>
                                <td>obrisi_kategoriju.php</td>
                                <td rowspan="4">Skripte koje služe za izvođenje DELETE operacije nad tablicama u bazi podataka. Koriste se u AJAX pozivima.</td>
                            </tr>
                            <tr>
                                <td>obrisi_obranu.php</td>
                            </tr>
                            <tr>
                                <td>obrisi_sudski_postupak.php</td>
                            </tr>
                            <tr>
                                <td>obrisi_zahtjev.php</td>
                            </tr>
                            <tr>
                                <td>popuni_listu_korisnika.php</td>
                                <td rowspan="6">Skripte koje služe za dohvaćanje podataka iz tablica u bazi podataka kako bi se kasnije ti podaci prikazali u padajućim listama aplikacije.</td>
                            </tr>
                            <tr>
                                <td>popuni_listu_odvjetnika_dodaj_moderatori.php</td>
                            </tr>
                            <tr>
                                <td>popuni_listu_odvjetnika_obrisi_moderatori.php</td>
                            </tr>
                            <tr>
                                <td>popuni_listu_odvjetnika.php</td>
                            </tr>
                            <tr>
                                <td>popuni_listu_odvjetnika_savjetovanje.php</td>
                            </tr>
                            <tr>
                                <td>popuni_listu_sudskih_postupaka.php</td>
                            </tr>
                            <tr>
                                <td>provjeri_datum_pocetka_sudskog_postupka.php</td>
                                <td rowspan="3">Skripte koje služe za dohvaćanje podataka iz tablica u bazi podataka i njihovo uspoređivanje s podacima koje je unio klijent.</td>
                            </tr>
                            <tr>
                                <td>provjeri_korisnicko_ime.php</td>
                            </tr>
                            <tr>
                                <td>provjeri_pocetak_sudskog_postupka.php</td>
                            </tr>
                            <tr>
                                <td>spremi_konfiguraciju</td>
                                <td rowspan="4">Skripte koje služe za unos podataka u tablice baze podataka (INSERT naredba).</td>
                            </tr>
                            <tr>
                                <td>spremi_pravno_savjetovanje_odgovor</td>
                            </tr>
                            <tr>
                                <td>spremi_pravno_savjetovanje_pitanje</td>
                            </tr>
                            <tr>
                                <td>spremi_uvjete_koristenja</td>
                            </tr>
                            <tr>
                                <td>blokiraj_korisnika.php</td>
                                <td>Skripta kojom se ažurira status korisnika u "Blokiran"</td>
                            </tr>
                            <tr>
                                <td>odblokiraj_korisnika.php</td>
                                <td>Skripta kojom se ažurira status korisnika u "Odlokiran"</td>
                            </tr>
                            <tr>
                                <td>opcenito_funkcije.php</td>
                                <td>Skripta koja sadrži skup funkcija koje se mogu koristiti u drugim skriptama (općenite funkcije za provjeru unosa i slično)</td>
                            </tr>
                            <tr>
                                <td>promoviraj_moderatora.php</td>
                                <td>Skripta kojom se ažurira uloga korisnika u administratora</td>
                            </tr>
                            <tr>
                                <td>resetiraj_uvjete_koristenja.php</td>
                                <td>Skripta kojom se svi datumi prihvaćanja korištenja postavljaju na NULL</td>
                            </tr>
                            <tr>
                                <td>unos_pomaka.php</td>
                                <td>Skripta za unos pomaka u konfiguracijsku datoteku</td>
                            </tr>
                            <tr>
                                <td>vrati_nazive_datoteka.php</td>
                                <td>Skripta koja vraća naziv svih datoteka u direktoriju "slike_sudskih_postupaka"</td>
                            </tr>
                            <tr>
                                <td>zaboravljena_lozinka.php</td>
                                <td>Skripta za ažuriranje lozinke korisnika i slanje maila s novom lozinkom</td>
                            </tr>
                            <tr>
                                <td colspan="2">obrasci</td>
                            </tr>
                            <tr>
                                <td>aktivni_sudski_postupci</td>
                                <td rowspan="8">Skripte u kojima se dodjeljuje naslov stranice, specificira se direktorij i putanja do skripte, poziva se skripta zaglavlja za izvršavanje općenitih operacija prije izvođenja skripte za stranicu i učitavaju se Smarty .tpl datoteke za određenu stranicu i podnožje. Osim toga, ove skripte upravljaju razinom pristupa stranicama (odnosno, definiraju koja uloga korisnika može pristupiti stranici). Dodatno, skripte provjeravaju je li postavljen GET parametar u URL-u i ako je, šalju upit u bazu za podacima koji se moraju nalaziti na stranici i prikazuju ih kako bi se mogli ažurirati</td>
                            </tr>
                            <tr>
                                <td>dodaj_obranu.php</td>
                            </tr>
                            <tr>
                                <td>dodaj_sudski_postupak_odvjetnika.php</td>
                            </tr>
                            <tr>
                                <td>dodavanje_kategorije_sudskog_postupka.php</td>
                            </tr>
                            <tr>
                                <td>kolacici.php</td>
                            </tr>
                            <tr>
                                <td>kreiranje_zahtjeva_za_odvjetnikom.php</td>
                            </tr>
                            <tr>
                                <td>moderatori.php</td>
                            </tr>
                            <tr>
                                <td>pravno_savjetovanje_odgovor.php</td>
                            </tr>
                            <tr>
                                <td>prijava.php</td>
                                <td>Skripta za prijavu u kojoj se pokreće sesija za korsnika ukoliko su svi uneseni podaci točni. Skripta povećava zapis pokušaja prijave u bazi svaki puta kada je unesena lozinka. U slučaju previše pokušaja prijave, blokira korisnika. Uz to, skripta omogućava poziv funkcije za slanje maila kojom se resetira lozinka i šalje mail s novom lozinkom korisnika.</td>
                            </tr>
                            <tr>
                                <td>registracija.php</td>
                                <td>Skripta za unos novog korisnika u bazu podataka. Svaki pokušaj unosa se validira koristeći regularne izraze i funkcije za provjeru unosa. Skripta implementira reCaptcha API za zaštitu od automata. Nakon uspješnog unosa, skriptom se šalje mail za potvrdu registracije</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <h2><stron>Korišteni alati i tehnologije</stron></h2>
        <div class="opcenito--tablica-wrapper-wrapper">
            <div class="opcenito--tablica-wrapper">
                <div class="opcenito--tablica"> 
                    <table class="opcenito--tablica">
                        <thead>
                            <tr>
                                <th>Naziv</th>

                                <th>Opis</th>
                            </tr>    
                        </thead>
                        <tbody>
                            <tr>
                                <td>HTML</td>
                                <td>Markup jezik za izradu strukture i sadržaja web stranice</td>
                            </tr>
                            <tr>
                                <td>CSS</td>
                                <td>Stilovi za stiliziranje pojedine web stranice</td>
                            </tr>
                            <tr>
                                <td>JavaScript</td>
                                <td>Skriptni jezik za programiranje na strani klijenta</td>
                            </tr>
                            <tr>
                                <td>jQuery</td>
                                <td>Biblioteka za proširenje funkcionalnosti JavaScripta</td>
                            </tr>
                            <tr>
                                <td>PHP</td>
                                <td>Skriptni jezik za programiranje na strani klijenta</td>
                            </tr>
                            <tr>
                                <td>MySQL</td>
                                <td>Sustav za upravljanje bazom podataka</td>
                            </tr>
                            <tr>
                                <td>MySQL Workbench</td>
                                <td>Alat za lakše korištenje MySQL-a</td>
                            </tr>
                            <tr>
                                <td>phpMyAdmin</td>
                                <td>Alat za administraciju MySQL bazom podataka</td>
                            </tr>
                            <tr>
                                <td>Apache Netbeans IDE</td>
                                <td>Razvojno okruženje korišteno za izradu web aplikacije</td>
                            </tr>
                            <tr>
                                <td>Smarty</td>
                                <td>Sustav web predložaka napisan u PHP-u pomoću kojeg su izrađene sve stranice projektnog rješenja</td>
                            </tr>
                            <tr>
                                <td>reCAPTCHA v2</td>
                                <td>API za zaštitu od automatiziranog pristupa web stranici</td>
                            </tr>
                            <tr>
                                <td>Google Fonts</td>
                                <td>API za korištenje fontova</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <h2><stron>Popis vanjskih biblioteka</stron></h2>
            <div class="opcenito--tablica-wrapper-wrapper">
                <div class="opcenito--tablica-wrapper">
                    <div class="opcenito--tablica"> 
                        <table class="opcenito--tablica">
                            <thead>
                                <tr>
                                    <th>Naziv</th>

                                    <th>Opis</th>
                                </tr>    
                            </thead>
                            <tbody>
                                <tr>
                                    <td>sesija.class.php</td>
                                    <td>Klasa preuzeta sa sustava Moodle i dorađena za potrebe projekta. Korištenja je u svakoj skripti gdje je bilo potrebno pristupati varijablama sesije. Nadodane su neke metode koje su bile potrebne za lakši rad sa sesijom.</td>
                                </tr>
                                <tr>
                                    <td>baza.class.php</td>
                                    <td>Klasa preuzeta sa sustava Moodle i dorađena za potrebe projekta. Korištena je za rad s bazom podataka. Dodane su metode za izvršanje upita nad bazom koristeći pripremljene izraze (Prepared statements). Koristi se u gotovo svim skriptama, a osim glavne svrhe rada s bazom, koristi se za zapisivanje u dnevnik</td>
                                </tr>
                                <tr>
                                    <td>jQuery</td>
                                    <td>Skriptni jezik za programiranje na strani klijenta</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


