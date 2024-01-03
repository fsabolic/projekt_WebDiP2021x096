<!DOCTYPE html>
<html lang="hr">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Fran Sabolić">
        <meta name="keywords" content="FOI, WebDiP">
        <meta name="description" content="26.5.2022.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{$naslov}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@100;200;300&display=swap" rel="stylesheet"> 

        <link rel="stylesheet" href="{$putanja}/css/fsabolic.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="{$putanja}/javascript/fsabolic.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>
        <header>
            <input type="checkbox" id="zaglavlje--skriveni-gumb">
            <div class="zaglavlje--skriveno-zaglavlje">
                <label for="zaglavlje--skriveni-gumb">
                    <img id="zaglavlje--hambi-ikona" class="opcenito--ikona" src="{$putanja}/resursi/menu.png" alt="">
                </label>

                <h1>
                    <label class="zaglavlje--naslov">{$naslov}</label> 
                </h1>
                <a href="{$putanja}/index.php">
                    <img class="opcenito--ikona" src="{$putanja}/resursi/logo.png" alt="">
                </a>
            </div>
            <div class="zaglavlje--zaglavlje">
                <label for="zaglavlje--skriveni-gumb">
                    <img id="zaglavlje--hambi-ikona" class="opcenito--ikona" src="{$putanja}/resursi/menu.png" alt="">
                </label>

                <h1>
                    <label class="zaglavlje--naslov">{$naslov}</label> 
                </h1>
                <a href="{$putanja}/index.php">
                    <img class="opcenito--ikona" src="{$putanja}/resursi/logo.png" alt="">
                </a>
            </div>

            {if $naslov!="U izradi..."}
                <nav class="zaglavlje--menu">

                    <label id="zaglavlje--cancel" for="zaglavlje--skriveni-gumb" ><img src="{$putanja}/resursi/cancel.png" class="opcenito--ikona"></label>

                    <div id="zaglavlje--podaci-korisnika">
                        <p><strong>Korisnik:</strong> {$korisnicko_ime}</p>
                        <p><strong>Uloga:</strong> {$uloga}</p>
                    </div>
                    <ul id="zaglavlje--izbornik"> 
                        {if $naslov!="Početna stranica"}<li><a href="{$putanja}/index.php">Početna stranica</a></li>{/if}
                        {if $naslov!="Prijava" && $uloga_id<2}<li><a href="{$putanja}/obrasci/prijava.php">Prijava</a></li>{/if}
                        {if $naslov!="Registracija" && $uloga_id<2}<li><a href="{$putanja}/obrasci/registracija.php">Registracija</a></li>{/if}
                        {if $naslov!="Rang lista odvjetnika"}<li><a href="{$putanja}/rang_lista_odvjetnika.php">Rang lista</a></li>{/if}
                        {if $naslov!="Galerija sudskih postupaka"}<li><a href="{$putanja}/galerija_sudskih_postupaka.php">Galerija sudskih postupaka</a></li>{/if}
                        {if $naslov!="Prihvaćeni zahtjevi" && $uloga_id>2}<li><a href="{$putanja}/prihvaceni_zahtjevi.php">Prihvaćeni zahtjevi</a></li>{/if}
                        {if $naslov!="Zahtjevi za odvjetnikom" && $uloga_id>1}<li><a href="{$putanja}/zahtjevi_za_odvjetnikom.php">Zahtjevi za odvjetnikom</a></li>{/if}
                        {if $naslov!="Sudski postupci odvjetnika" && $uloga_id>2}<li><a href="{$putanja}/sudski_postupci_odvjetnika.php">Sudski postupci odvjetnika</a></li>{/if}
                        {if $naslov!="Kategorije sudskih postupaka" && $uloga_id>3}<li><a href="{$putanja}/kategorije_sudskih_postupaka.php">Kategorije sudskih postupaka</a></li>{/if}
                        {if $naslov!="Pravno savjetovanje klijenta" && $uloga_id>1}<li><a href="{$putanja}/pravno_savjetovanje_klijenta.php">Pravno savjetovanje klijenta</a></li>{/if}
                        {if $naslov!="Zatražena pravna savjetovanja" && $uloga_id>2}<li><a href="{$putanja}/zatrazena_pravna_savjetovanja.php">Zatražena pravna savjetovanja</a></li>{/if} 

                        {if $naslov!="Dnevnik" && $uloga_id>3}<li><a href="{$putanja}/dnevnik.php">Dnevnik</a></li>{/if}
                        {if $naslov!="Kolačići" && $uloga_id>1}<li><a href="{$putanja}/obrasci/kolacici.php">Kolačići</a></li>{/if}
                        {if $naslov!="Blokirani korisnici" && $uloga_id>3}<li><a href="{$putanja}/blokirani_korisnici.php">Blokirani korisnici</a></li>{/if}
                        {if $naslov!="Napredovanje moderatora" && $uloga_id>3}<li><a href="{$putanja}/napredovanje_moderatora.php">Napredovanje moderatora</a></li>{/if}

                        {if $naslov!="Upravljanje konfiguracijom" && $uloga_id>3}<li><a href="{$putanja}/upravljanje_konfiguracijom.php">Upravljanje konfiguracijom</a></li>{/if}

                    </ul>

                    {if $uloga_id>1}<a href="{$putanja}/index.php?odjava=1" id="zaglavlje--odjava">Odjava</a>{/if}

                </nav>

            {/if}

        </header>
        {if $uvjeti_koristenja && $naslov=="Početna stranica"}
            <div id="zaglavlje--uvjeti-koristenja">
                <h1 id="zaglavlje--uvjeti-koristenja-naslov">UVJETI KORIŠTENJA</h1>
                <p>Prihvatite uvjete korištenja kako bi mogli koristiti sve funkcionalnosti stranice!</p>
                <button type="button" id="zaglavlje--uvjeti-koristenja-prihvati" class="opcenito--vazan-gumb">Prihvatite uvjete korištenja</button>
                <button type="button" id="zaglavlje--uvjeti-koristenja-odbij" class="opcenito--obican-gumb">Odbijte uvjete korištenja</button>
            </div>
        {/if}        

        <section {if $naslov!="Prijava" && $naslov!="Registracija" && $naslov!="Kolačići" && $naslov!="Dodavanje sudskih postupaka odvjetnika" && $naslov!="Kreiranje zahtjeva za odvjetnikom" && $naslov!="Dodaj obranu" && $naslov!="Ažuriranje aktivnog sudskog postupka" && $naslov!="Pravna savjetovanja" && $naslov!="Dodavanje kategorije sudskog postupka" && $naslov!="Moderatori"}class="glavni-sadrzaj"{/if}>