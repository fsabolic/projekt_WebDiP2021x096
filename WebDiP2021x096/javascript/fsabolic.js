$(document).ready(function () {
    let naslov = $(document).find("title").text();
    switch (naslov) {
        case "Početna stranica":
            $("#zaglavlje--uvjeti-koristenja-odbij").click(function (event) {
                $("#zaglavlje--uvjeti-koristenja").hide();
            });
            $("#zaglavlje--uvjeti-koristenja-prihvati").click(spremiUvjeteKoristenja);


            break;
        case "Upravljanje konfiguracijom":
            upravljanjeKonfiguracijom();
            break;

        case "Blokirani korisnici":
            blokiraniKorisnici();
            break;
        case "Registracija":
            registracija();
            break;
        case "Prijava":
            prijava();
            break;

        case "Zahtjevi za odvjetnikom":
            zahtjeviZaOdvjetnikom();
            break;

        case "Kreiranje zahtjeva za odvjetnikom":
            kreiranjeZahtjevaZaOdvjetnikom();
            break;

        case "Prihvaćeni zahtjevi":
            prihvaceniZahtjevi();
            break;

        case "Dodaj obranu":
            dodajObranu();
            break;

        case "Ažuriranje aktivnog sudskog postupka":
            azuriranjeAktivnogSudskogPostupka();
            break;
        case "Zaprimljeni zahtjevi":
            zaprimljeniZahtjevi();
            break;
        case "Sudski postupci odvjetnika":
            sudskiPostupciOdvjetnika();
            break;
        case "Dodavanje sudskih postupaka odvjetnika":
            dodavanjeSudskogPostupkaOdvjetnika();
            break;
        case "Kategorije sudskih postupaka":
            kategorijeSudskihPostupaka();
            break;
        case "Moderatori":
            moderatori();
            break;
        case "Pravno savjetovanje klijenta":
            pravnoSavjetovanjeKlijenta();
            break;

        case "Zatražena pravna savjetovanja":
            zatrazenaPravnaSavjetovanja();
            break;
        case "Pravna savjetovanja":
            pravnaSavjetovanja();
            break;
        case "Dodavanje kategorije sudskog postupka":
            dodavanjeKategorijeSudskogPostupka();
            break;
        case "Dnevnik":
            dnevnik();
            break;
        case "Rang lista odvjetnika":
            rangListaOdvjetnika();
            break;
        case "Galerija sudskih postupaka":
            galerijaSudskihPostupaka();
            break;
        case "Napredovanje moderatora":
            napredovanjeModeratora();
            break;
    }
});

function napredovanjeModeratora() {
    postaviTablicuNapredovanjeModeratora();
    $("#prva").click({funkcija: postaviTablicuNapredovanjeModeratora}, prva);
    $("#sljedeca").click({funkcija: postaviTablicuNapredovanjeModeratora}, sljedeca);
    $("#prijasnja").click({funkcija: postaviTablicuNapredovanjeModeratora}, prijasnja);
    $("#posljednja").click({funkcija: postaviTablicuNapredovanjeModeratora}, posljednja);
    $(".opcenito--tablica-zaglavlje-hover").click({funkcija: postaviTablicuNapredovanjeModeratora}, sortiranjeTablice);
    $('body').on('click', '#promoviraj', promoviraj);
}

function promoviraj(event) {
    let korisnik_id = $(this).parent("tr").attr("id");
    let parametri = {korisnik_id: korisnik_id};
    $.post("skripte/promoviraj_moderatora.php", parametri, function () {
        alert("Moderator " + korisnik_id + " je promoviran u administratora");
        postaviTablicuNapredovanjeModeratora();
    }, "json");
}

function postaviTablicuNapredovanjeModeratora(event) {
    let atribut_za_sortiranje = ($("#atribut_za_sortiranje").val() != "") ? $("#atribut_za_sortiranje").val() : null;
    let smjer_sortiranja = ($("#smjer_sortiranja").val() != "") ? $("#smjer_sortiranja").val() : null;
    let broj_stranice = ($("#broj_stranice").val() != "") ? $("#broj_stranice").val() : null;

    let parametri = {atribut_za_sortiranje: atribut_za_sortiranje, smjer_sortiranja: smjer_sortiranja, broj_stranice: broj_stranice};
    $.post("skripte/dohvati_moderatore_za_napredovanje.php", parametri, function (data) {
        $(".opcenito--tablica").children("tbody").html("");
        if (data.tablica.length > 0) {
            $.each(data.tablica, function (atribut, vrijednost) {
                let tbody = "<tr id='" + vrijednost.korisnik_id + "'>";
                tbody += "<td id='korisnik_id'>" + vrijednost.korisnik_id + "</td>" +
                        "<td id='korisnicko_ime'>" + vrijednost.korisnicko_ime + "</td>" +
                        "<td id='ime_prezime'>" + vrijednost.ime_prezime + "</td>" +
                        "<td id='email'>" + vrijednost.email + "</td>" +
                        "<td id='broj_sudskih_postupaka'>" + vrijednost.broj_sudskih_postupaka + "</td>" +
                        "<td id='broj_prihvacenih_zahtjeva'>" + vrijednost.broj_prihvacenih_zahtjeva + "</td>" +
                        "<td id='broj_danih_savjetovanja'>" + vrijednost.broj_danih_savjetovanja + "</td>" +
                        "<td id='promoviraj' class='opcenito--tablica-hover'>Promoviraj</td>";
                tbody += "</tr>";
                $(".opcenito--tablica").children("tbody").append(tbody);
            });
            $("#broj_stranice").val(data.trenutna_stranica);
        } else {
            $("tbody").append("Nema podataka");
        }

    }, "json");
}

function galerijaSudskihPostupaka() {
    postaviGaleriju();
    $("#pretrazi").keyup(postaviGaleriju);
    $("#vrijeme_trajanja").click({funkcija: postaviGaleriju}, sortiranjeTablice);
    $("#zakljucak_postupka").click({funkcija: postaviGaleriju}, sortiranjeTablice);
    $("#prva").click({funkcija: postaviGaleriju}, prva);
    $("#sljedeca").click({funkcija: postaviGaleriju}, sljedeca);
    $("#prijasnja").click({funkcija: postaviGaleriju}, prijasnja);
    $("#posljednja").click({funkcija: postaviGaleriju}, posljednja);
}

function postaviGaleriju(event) {
    let atribut_za_sortiranje = ($("#atribut_za_sortiranje").val() != "") ? $("#atribut_za_sortiranje").val() : null;
    let smjer_sortiranja = ($("#smjer_sortiranja").val() != "") ? $("#smjer_sortiranja").val() : null;
    let broj_stranice = ($("#broj_stranice").val() != "") ? $("#broj_stranice").val() : null;
    let vrijednost_za_pretrazivanje = ($("#pretrazi").val() != "") ? $("#pretrazi").val() : null;
    let atribut_za_pretrazivanje = ($("#atribut_za_pretrazivanje").val() != "") ? $("#atribut_za_pretrazivanje").val() : null;
    let parametri = {atribut_za_sortiranje: atribut_za_sortiranje, smjer_sortiranja: smjer_sortiranja, broj_stranice: broj_stranice, vrijednost_za_pretrazivanje: vrijednost_za_pretrazivanje, atribut_za_pretrazivanje: atribut_za_pretrazivanje};
    $.post("skripte/dohvati_slike_sudskih_postupaka.php", parametri, function (data) {
        $(".galerija--grid").html("");
        if (data.tablica.length > 0) {
            $.each(data.tablica, function (atribut, vrijednost) {
                let tbody = "<div class='galerija--slika'>";
                tbody += "<a href='" + vrijednost.slika_sudskog_postupka + "'><img src='" + vrijednost.slika_sudskog_postupka + "'></a>" +
                        "<label>" + ((vrijednost.vrijeme_trajanja == null) ? "Postupak nije završio" : vrijednost.vrijeme_trajanja + " dana") + "</label>" +
                        "<hr style='border:1px black dashed;margin:15px 0;'>" +
                        "<label>" + vrijednost.tuzitelj + "</label>" +
                        "<hr style='border:1px black dashed;margin:15px 0;'>" +
                        "<label>" + ((vrijednost.zakljucak_postupka == null) ? "Postupak nije zaključen" : ((vrijednost.zakljucak_postupka == 0) ? "Nije kriv" : "Kriv")) + "</label>";

                tbody += "</div>";
                $(".galerija--grid").append(tbody);
            });
            $("#broj_stranice").val(data.trenutna_stranica);
        } else {
            $(".galerija--grid").append("Nema podataka");
        }

    }, "json");
}

function rangListaOdvjetnika() {
    postaviTablicuRangListaOdvjetnika();
    $("#filter").click(filter_rang_lista);
}


function filter_rang_lista(event) {
    postaviTablicuRangListaOdvjetnika();
}
function postaviTablicuRangListaOdvjetnika(event) {
    let datum_od = ($("#od").val() != "") ? $("#od").val() : null;
    let datum_do = ($("#do").val() != "") ? $("#do").val() : null;
    let parametri = {datum_od: datum_od, datum_do: datum_do};
    $.post("skripte/dohvati_rang_listu.php", parametri, function (data) {
        $(".opcenito--tablica").children("tbody").html("");
        if (data.tablica.length > 0) {
            $.each(data.tablica, function (atribut, vrijednost) {
                let tbody = "<tr>";
                tbody += "<td id='ime_prezime'>" + vrijednost.ime_prezime + "</td>" +
                        "<td id='korisnicko_ime'>" + vrijednost.korisnicko_ime + "</td>" +
                        "<td id='email'>" + vrijednost.email + "</td>" +
                        "<td id='naziv'>" + ((vrijednost.naziv == null) ? "/" : vrijednost.naziv) + "</td>" +
                        "<td id='br_prihvacenih_zahtjeva'>" + vrijednost.br_prihvacenih_zahtjeva + "</td>";
                tbody += "</tr>";
                (vrijednost);
                $(".opcenito--tablica").children("tbody").append(tbody);
            });
        } else {
            $("tbody").append("Nema podataka");
        }

    }, "json");

}

function dnevnik() {
    postaviTablicuDnevnik();
    $("#pretrazi").keyup(postaviTablicuDnevnik);
    $(".opcenito--tablica-zaglavlje-hover").click({funkcija: postaviTablicuDnevnik}, sortiranjeTablice);
    $("#prva").click({funkcija: postaviTablicuDnevnik}, prva);
    $("#sljedeca").click({funkcija: postaviTablicuDnevnik}, sljedeca);
    $("#prijasnja").click({funkcija: postaviTablicuDnevnik}, prijasnja);
    $("#posljednja").click({funkcija: postaviTablicuDnevnik}, posljednja);
    $("#filter").click(filter);
}

function filter(event) {
    postaviTablicuDnevnik();
}

function postaviTablicuDnevnik() {
    let atribut_za_sortiranje = ($("#atribut_za_sortiranje").val() != "") ? $("#atribut_za_sortiranje").val() : null;
    let smjer_sortiranja = ($("#smjer_sortiranja").val() != "") ? $("#smjer_sortiranja").val() : null;
    let broj_stranice = ($("#broj_stranice").val() != "") ? $("#broj_stranice").val() : null;
    let vrijednost_za_pretrazivanje = ($("#pretrazi").val() != "") ? $("#pretrazi").val() : null;
    let datum_od = ($("#od").val() != "") ? $("#od").val() : null;
    let datum_do = ($("#do").val() != "") ? $("#do").val() : null;
    let atribut_za_pretrazivanje = ($("#atribut_za_pretrazivanje").val() != "") ? $("#atribut_za_pretrazivanje").val() : null;
    let parametri = {datum_od: datum_od, datum_do: datum_do, atribut_za_sortiranje: atribut_za_sortiranje, smjer_sortiranja: smjer_sortiranja, broj_stranice: broj_stranice, vrijednost_za_pretrazivanje: vrijednost_za_pretrazivanje, atribut_za_pretrazivanje: atribut_za_pretrazivanje};

    $.post("skripte/dohvati_dnevnik.php", parametri, function (data) {
        $(".opcenito--tablica").children("tbody").html("");
        if (data.tablica.length > 0) {
            $.each(data.tablica, function (atribut, vrijednost) {
                let tbody = "<tr>";
                tbody += "<td id='upit'>" + (vrijednost.upit == null ? "/" : vrijednost.upit) + "</td>" +
                        "<td id='radnja'>" + (vrijednost.radnja == null ? "/" : vrijednost.radnja) + "</td>" +
                        "<td id='datum_vrijeme'>" + vrijednost.datum_vrijeme + "</td>" +
                        "<td id='naziv'>" + vrijednost.naziv + "</td>" +
                        "<td id='korisnicko_ime'>" + vrijednost.korisnicko_ime + "</td>";
                tbody += "</tr>";
                $(".opcenito--tablica").children("tbody").append(tbody);
            });
            $("#broj_stranice").val(data.trenutna_stranica);
        } else {
            $("tbody").append("Nema podataka");
        }

    }, "json");

}

function dodavanjeKategorijeSudskogPostupka() {
    $("#dodaj").click(provjereUnosaDodavanjeKategorijaSudskogPostupka);
}

function provjereUnosaDodavanjeKategorijaSudskogPostupka(event) {
    let naziv = $("#naziv").val();
    let opis = $("#opis").val();
    let greske = {};
    let polje_unosa = {opis: opis, naziv: naziv};
    $.each(polje_unosa, function (unos, vrijednost) {
        if (prazanUnos(vrijednost)) {
            greske[unos] = parseCitljivost(unos) + " - Nije unesena vrijednost";
        } else {
            let uspjeh;
            switch (unos) {
                case "naziv":
                    uspjeh = dovoljanBrojZnakova(4, 50, vrijednost);
                    if (uspjeh !== true) {
                        greske[unos] = parseCitljivost(unos) + " - " + uspjeh;
                    }

                    break;
                case "opis":
                    uspjeh = dovoljanBrojZnakova(4, 5000, vrijednost);
                    if (uspjeh !== true) {
                        greske[unos] = parseCitljivost(unos) + " - " + uspjeh;
                    }

                    break;
            }
        }

    });
    ocistiPoljeGresaka("#kategorije-greske");
    if (Object.keys(greske).length > 0) {
        prikaziGreske(greske, "#kategorije-greske");
        event.preventDefault();
    }
}

function moderatori() {
    popuniListuOdvjetnikaDodajModeratora();
    popuniListuOdvjetnikaObrisiModeratora()
    $("#dodaj").click(dodajModeratora);
    $("#obrisi").click(obrisiModeratora);
}

function dodajModeratora(event) {
    event.preventDefault();

    if (provjereUnosaDodajModeratora()) {

        let korisnik_id = $("#dodaj_moderatora").val();
        let kategorija_sudskog_postupka_id = $("#kategorija_sudskog_postupka").attr("vrijednost");
        $.post("../skripte/azuriraj_moderatora.php", {korisnik_id: korisnik_id, kategorija_sudskog_postupka_id: kategorija_sudskog_postupka_id}, function (data) {
            popuniListuOdvjetnikaDodajModeratora();
            popuniListuOdvjetnikaObrisiModeratora();
        }, "json");
    }
}

function obrisiModeratora(event) {
    event.preventDefault();
    if (provjereUnosaObrisiModeratora()) {
        let korisnik_id = $("#obrisi_moderatora").val();
        $.post("../skripte/azuriraj_moderatora.php", {korisnik_id: korisnik_id, kategorija_sudskog_postupka_id: null}, function (data) {
            popuniListuOdvjetnikaDodajModeratora();
            popuniListuOdvjetnikaObrisiModeratora();
        }, "json");
    }
}

function provjereUnosaDodajModeratora(event) {
    let korisnik_id = $("#dodaj_moderatora").val();
    let greske = {};
    let polje_unosa = {korisnik_id: korisnik_id};
    $.each(polje_unosa, function (unos, vrijednost) {
        if (prazanUnos(vrijednost)) {
            greske[unos] = parseCitljivost(unos) + " - Nije unesen moderator za dodavanje";
        }
    });

    ocistiPoljeGresaka("#moderatori-greske");
    if (Object.keys(greske).length > 0) {
        prikaziGreske(greske, "#moderatori-greske");
        return false;
    }
    return true;
}

function provjereUnosaObrisiModeratora(event) {
    let korisnik_id = $("#obrisi_moderatora").val();
    let greske = {};
    let polje_unosa = {korisnik_id: korisnik_id};
    $.each(polje_unosa, function (unos, vrijednost) {
        if (prazanUnos(vrijednost)) {
            greske[unos] = parseCitljivost(unos) + " - Nije unesen moderator za brisanje";
        }
    });

    ocistiPoljeGresaka("#moderatori-greske");
    if (Object.keys(greske).length > 0) {
        prikaziGreske(greske, "#moderatori-greske");
        return false;
    }
    return true;
}

function popuniListuOdvjetnikaObrisiModeratora(event) {
    let kategorija_sudskog_postupka_id = $("#kategorija_sudskog_postupka").attr("vrijednost");
    $("#dodaj_moderatora").html("");
    $.post("../skripte/popuni_listu_odvjetnika_dodaj_moderatori.php", {kategorija_sudskog_postupka_id: kategorija_sudskog_postupka_id}, function (data) {
        $.each(data, function (naziv, vrijednost) {
            opcije = "<option value='" + vrijednost.korisnik_id + "'>" + vrijednost.ime_prezime + "</option>";
            $("#obrisi_moderatora").append(opcije);
        });

    }, "json");
}
function popuniListuOdvjetnikaDodajModeratora(event) {
    $("#obrisi_moderatora").html("");
    $.post("../skripte/popuni_listu_odvjetnika_obrisi_moderatori.php", function (data) {
        $.each(data, function (naziv, vrijednost) {
            opcije = "<option value='" + vrijednost.korisnik_id + "'>" + vrijednost.ime_prezime + "</option>";
            $("#dodaj_moderatora").append(opcije);
        });

    }, "json");
}

function kategorijeSudskihPostupaka() {
    postaviTablicuKategorijeSudskihPostupaka();
    $("#dodaj").click(otvoriDodavanjeKategorije);
    $("#pretrazi").keyup(postaviTablicuKategorijeSudskihPostupaka);
    $(".opcenito--tablica-zaglavlje-hover").click({funkcija: postaviTablicuKategorijeSudskihPostupaka}, sortiranjeTablice);
    $("#prva").click({funkcija: postaviTablicuKategorijeSudskihPostupaka}, prva);
    $("#sljedeca").click({funkcija: postaviTablicuKategorijeSudskihPostupaka}, sljedeca);
    $("#prijasnja").click({funkcija: postaviTablicuKategorijeSudskihPostupaka}, prijasnja);
    $("#posljednja").click({funkcija: postaviTablicuKategorijeSudskihPostupaka}, posljednja);
    $("body").on("click", "#obrisi", obrisiKategoriju);
}

function obrisiKategoriju() {
    let kategorija_sudskog_postupka_id = $(this).attr("id_retka");
    let potvrda = confirm("Brišete kategoriju " + kategorija_sudskog_postupka_id);
    if (potvrda) {
        $.post("skripte/obrisi_kategoriju.php", {kategorija_sudskog_postupka_id: kategorija_sudskog_postupka_id}, function (data) {
            postaviTablicuKategorijeSudskihPostupaka();
            alert("Obrisana je kategorija " + kategorija_sudskog_postupka_id);
        }, "json");
    }
}

function otvoriDodavanjeKategorije(event) {
    window.open("obrasci/dodavanje_kategorije_sudskog_postupka.php", "_self");
}

function postaviTablicuKategorijeSudskihPostupaka(event) {
    let atribut_za_sortiranje = ($("#atribut_za_sortiranje").val() != "") ? $("#atribut_za_sortiranje").val() : null;
    let smjer_sortiranja = ($("#smjer_sortiranja").val() != "") ? $("#smjer_sortiranja").val() : null;
    let broj_stranice = ($("#broj_stranice").val() != "") ? $("#broj_stranice").val() : null;
    let vrijednost_za_pretrazivanje = ($("#pretrazi").val() != "") ? $("#pretrazi").val() : null;
    let atribut_za_pretrazivanje = ($("#atribut_za_pretrazivanje").val() != "") ? $("#atribut_za_pretrazivanje").val() : null;
    let parametri = {atribut_za_sortiranje: atribut_za_sortiranje, smjer_sortiranja: smjer_sortiranja, broj_stranice: broj_stranice, vrijednost_za_pretrazivanje: vrijednost_za_pretrazivanje, atribut_za_pretrazivanje: atribut_za_pretrazivanje};
    $.post("skripte/dohvati_kategorije_sudskih_postupaka.php", parametri, function (data) {
        $(".opcenito--tablica").children("tbody").html("");
        if (data.tablica.length > 0) {
            $.each(data.tablica, function (atribut, vrijednost) {
                let tbody = "<tr id='" + vrijednost.kategorija_sudskog_postupka_id + "'>";
                tbody += "<td id='kategorije_sudskih_postupaka_id'>" + vrijednost.kategorija_sudskog_postupka_id + "</td>" +
                        "<td id='naziv'>" + vrijednost.naziv + "</td>" +
                        "<td id='opis'>" + vrijednost.opis + "</td>" +
                        "<td id='azuriraj' class='opcenito--tablica-hover'><a href='obrasci/dodavanje_kategorije_sudskog_postupka.php?kategorija_sudskog_postupka_id=" + vrijednost.kategorija_sudskog_postupka_id + "'>Ažuriraj</a></td>" + "<td id='obrisi' id_retka='" + vrijednost.kategorija_sudskog_postupka_id + "' class='opcenito--tablica-hover-crveno'>Obriši</td>" +
                        "<td id='moderatori' class='opcenito--tablica-hover'><a href='obrasci/moderatori.php?kategorija_sudskog_postupka_id=" + vrijednost.kategorija_sudskog_postupka_id + "'>Dodaj/Obriši moderatora</a></td>";

                tbody += "</tr>";
                $(".opcenito--tablica").children("tbody").append(tbody);
            });
            $("#broj_stranice").val(data.trenutna_stranica);
        } else {
            $("tbody").append("Nema podataka");
        }

    }, "json");
}


function blokiraniKorisnici() {
    postaviTablicuBlokiraniKorisnici();
    $('body').on('click', '#blokiraj', blokiraj);
    $('body').on('click', '#odblokiraj', odblokiraj);
    $("#pretrazi").keyup(postaviTablicuBlokiraniKorisnici);
    $(".opcenito--tablica-zaglavlje-hover").click({funkcija: postaviTablicuBlokiraniKorisnici}, sortiranjeTablice);
    $("#prva").click({funkcija: postaviTablicuBlokiraniKorisnici}, prva);
    $("#sljedeca").click({funkcija: postaviTablicuBlokiraniKorisnici}, sljedeca);
    $("#prijasnja").click({funkcija: postaviTablicuBlokiraniKorisnici}, prijasnja);
    $("#posljednja").click({funkcija: postaviTablicuBlokiraniKorisnici}, posljednja);
}

function blokiraj(event) {
    let korisnik_id = $(this).parent("tr").attr("id");
    let parametri = {korisnik_id: korisnik_id};
    $.post("skripte/blokiraj_korisnika.php", parametri, function () {
        alert("Korisnik " + korisnik_id + " je blokiran");
        postaviTablicuBlokiraniKorisnici();
    }, "json");
}

function odblokiraj(event) {
    let korisnik_id = $(this).parent("tr").attr("id");
    let parametri = {korisnik_id: korisnik_id};
    $.post("skripte/odblokiraj_korisnika.php", parametri, function () {
        alert("Korisnik " + korisnik_id + " je odblokiran");
        postaviTablicuBlokiraniKorisnici();
    }, "json");
}

function postaviTablicuBlokiraniKorisnici(event) {
    let atribut_za_sortiranje = ($("#atribut_za_sortiranje").val() != "") ? $("#atribut_za_sortiranje").val() : null;
    let smjer_sortiranja = ($("#smjer_sortiranja").val() != "") ? $("#smjer_sortiranja").val() : null;
    let broj_stranice = ($("#broj_stranice").val() != "") ? $("#broj_stranice").val() : null;
    let vrijednost_za_pretrazivanje = ($("#pretrazi").val() != "") ? $("#pretrazi").val() : null;
    let atribut_za_pretrazivanje = ($("#atribut_za_pretrazivanje").val() != "") ? $("#atribut_za_pretrazivanje").val() : null;
    let parametri = {atribut_za_sortiranje: atribut_za_sortiranje, smjer_sortiranja: smjer_sortiranja, broj_stranice: broj_stranice, vrijednost_za_pretrazivanje: vrijednost_za_pretrazivanje, atribut_za_pretrazivanje: atribut_za_pretrazivanje};
    $.post("skripte/dohvati_sve_korisnike_za_blokiranje.php", parametri, function (data) {
        $(".opcenito--tablica").children("tbody").html("");
        if (data.tablica.length > 0) {
            $.each(data.tablica, function (atribut, vrijednost) {
                let tbody = "<tr id='" + vrijednost.korisnik_id + "'>";
                tbody += "<td id='korisnicko_ime'>" + vrijednost.korisnicko_ime + "</td>" +
                        "<td id='ime_prezime'>" + vrijednost.ime_prezime + "</td>" +
                        "<td id='email'>" + vrijednost.email + "</td>" +
                        "<td id='pokusaji_prijave'>" + vrijednost.pokusaji_prijave + "</td>" +
                        ((vrijednost.blokiran == 0) ? "<td id='blokiran' style='color:#7CAE7A'>Aktivan</td>" : "<td id='blokiran' style='font-weight:bold;color:#D84727'>Blokiran</td>") +
                        "<td id='naziv'>" + vrijednost.naziv + "</td>" +
                        ((vrijednost.blokiran == 0) ? "<td id='blokiraj' class='opcenito--tablica-hover-crveno'>BLOKIRAJ</td>" : "<td id='odblokiraj' class='opcenito--tablica-hover-zeleno'>ODBLOKIRAJ</td>");

                tbody += "</tr>";
                $(".opcenito--tablica").children("tbody").append(tbody);
            });
            $("#broj_stranice").val(data.trenutna_stranica);
        } else {
            $("tbody").append("Nema podataka");
        }

    }, "json");
}

function pravnaSavjetovanja() {
    $("#odgovori").click(odgovoriNaPravnoSavjetovanje);
}

function odgovoriNaPravnoSavjetovanje(event) {
    let odgovor = $("#odgovor").val();
    let pitanje_id = $("#pitanje").attr("value");
    let greske = {};
    let polje_unosa = {odgovor: odgovor, pitanje_id: pitanje_id};
    $.each(polje_unosa, function (unos, vrijednost) {
        if (prazanUnos(vrijednost)) {
            greske[unos] = parseCitljivost(unos) + " - Nije unesena vrijednost";
        } else {
            let uspjeh;
            switch (unos) {
                case "odgovor":
                    uspjeh = dovoljanBrojZnakova(8, 50000, vrijednost);
                    if (uspjeh !== true) {
                        greske[unos] = parseCitljivost(unos) + " - " + uspjeh;
                    }

                    break;
            }
        }

    });
    ocistiPoljeGresaka("#pravno-savjetovanje-odgovor-greske");
    if (Object.keys(greske).length > 0) {
        prikaziGreske(greske, "#pravno-savjetovanje-odgovor-greske");
        event.preventDefault();
    } else {
        let podaci = polje_unosa;
        $.ajax({
            type: "POST",
            url: "../skripte/spremi_pravno_savjetovanje_odgovor.php",
            data: podaci,
            dataType: 'json',
            async: false,
            success: function (data) {
                window.open("../zatrazena_pravna_savjetovanja.php", "_self");
            }
        });
    }
}

function zatrazenaPravnaSavjetovanja() {
    postaviTablicuZatrazenaPravnaSavjetovanja();
    $("#pretrazi").keyup(postaviTablicuZatrazenaPravnaSavjetovanja);
    $(".opcenito--tablica-zaglavlje-hover").click({funkcija: postaviTablicuZatrazenaPravnaSavjetovanja}, sortiranjeTablice);
    $("#prva").click({funkcija: postaviTablicuZatrazenaPravnaSavjetovanja}, prva);
    $("#sljedeca").click({funkcija: postaviTablicuZatrazenaPravnaSavjetovanja}, sljedeca);
    $("#prijasnja").click({funkcija: postaviTablicuZatrazenaPravnaSavjetovanja}, prijasnja);
    $("#posljednja").click({funkcija: postaviTablicuZatrazenaPravnaSavjetovanja}, posljednja);
}

function postaviTablicuZatrazenaPravnaSavjetovanja(event) {
    let atribut_za_sortiranje = ($("#atribut_za_sortiranje").val() != "") ? $("#atribut_za_sortiranje").val() : null;
    let smjer_sortiranja = ($("#smjer_sortiranja").val() != "") ? $("#smjer_sortiranja").val() : null;
    let broj_stranice = ($("#broj_stranice").val() != "") ? $("#broj_stranice").val() : null;
    let vrijednost_za_pretrazivanje = ($("#pretrazi").val() != "") ? $("#pretrazi").val() : null;
    let atribut_za_pretrazivanje = ($("#atribut_za_pretrazivanje").val() != "") ? $("#atribut_za_pretrazivanje").val() : null;
    let parametri = {atribut_za_sortiranje: atribut_za_sortiranje, smjer_sortiranja: smjer_sortiranja, broj_stranice: broj_stranice, vrijednost_za_pretrazivanje: vrijednost_za_pretrazivanje, atribut_za_pretrazivanje: atribut_za_pretrazivanje};
    $.post("skripte/dohvati_zatrazena_pravna_savjetovanja.php", parametri, function (data) {
        $(".opcenito--tablica").children("tbody").html("");
        if (data.tablica.length > 0) {
            $.each(data.tablica, function (atribut, vrijednost) {
                let tbody = "<tr>";
                tbody += "<td id='psp.klijent'>" + vrijednost.klijent + "</td>" +
                        "<td id='psp.razlog'>" + vrijednost.razlog + "</td>" +
                        "<td id='psp.opis'>" + vrijednost.opis + "</td>" +
                        "<td id='psp.datum_vrijeme_postavljanja'>" + vrijednost.datum_vrijeme_postavljanja + "</td>" +
                        "<td id='odgovori'><a href='obrasci/pravno_savjetovanje_odgovor.php?pitanje_id=" + vrijednost.pitanje_id + "'>Odgovori</a></td>";

                tbody += "</tr>";
                $(".opcenito--tablica").children("tbody").append(tbody);
            });
            $("#broj_stranice").val(data.trenutna_stranica);
        } else {
            $("tbody").append("Nema podataka");
        }

    }, "json");
}


function pravnoSavjetovanjeKlijenta() {
    $(this).on("load", popuniListuOdvjetnikaSavjetovanje());
    $("#postavi").click(dodajPitanje);
    $("#odvjetnik_drop_down").change(postaviTablicuPravnoSavjetovanjeKlijenta);
    $("#pretrazi").keyup(postaviTablicuPravnoSavjetovanjeKlijenta);
    $("th").click({funkcija: postaviTablicuPravnoSavjetovanjeKlijenta}, sortiranjeTablice);
    $("#prva").click({funkcija: postaviTablicuPravnoSavjetovanjeKlijenta}, prva);
    $("#sljedeca").click({funkcija: postaviTablicuPravnoSavjetovanjeKlijenta}, sljedeca);
    $("#prijasnja").click({funkcija: postaviTablicuPravnoSavjetovanjeKlijenta}, prijasnja);
    $("#posljednja").click({funkcija: postaviTablicuPravnoSavjetovanjeKlijenta}, posljednja);
}

function dodajPitanje() {
    event.preventDefault();
    let naslov = $("#naslov").val();
    let pitanje = $("#pitanje").val();
    let odvjetnik = $("#odvjetnik_drop_down").val();
    let greske = {};
    let polje_unosa = {razlog: naslov, pitanje: pitanje, odvjetnik_id: odvjetnik};
    $.each(polje_unosa, function (unos, vrijednost) {
        if (prazanUnos(vrijednost)) {
            greske[unos] = parseCitljivost(unos) + " - Nije unesena vrijednost";
        }

    });
    ocistiPoljeGresaka("#pravno-savjetovnje-pitanje-greske");
    if (Object.keys(greske).length > 0) {
        prikaziGreske(greske, "#pravno-savjetovnje-pitanje-greske");
    } else {
        let podaci = polje_unosa;
        $.ajax({
            type: "POST",
            url: "skripte/spremi_pravno_savjetovanje_pitanje.php",
            data: podaci,
            dataType: 'json',
            async: false,
            success: function (data) {
                $("#naslov").val("");
                $("#pitanje").val("");
                postaviTablicuPravnoSavjetovanjeKlijenta();
            }
        });
    }
}

function postaviTablicuPravnoSavjetovanjeKlijenta(event) {
    let atribut_za_sortiranje = ($("#atribut_za_sortiranje").val() != "") ? $("#atribut_za_sortiranje").val() : null;
    let smjer_sortiranja = ($("#smjer_sortiranja").val() != "") ? $("#smjer_sortiranja").val() : null;
    let broj_stranice = ($("#broj_stranice").val() != "") ? $("#broj_stranice").val() : null;
    let vrijednost_za_pretrazivanje = ($("#pretrazi").val() != "") ? $("#pretrazi").val() : null;
    let atribut_za_pretrazivanje = ($("#atribut_za_pretrazivanje").val() != "") ? $("#atribut_za_pretrazivanje").val() : null;
    let odvjetnik_id = ($("#odvjetnik_drop_down").val() != "") ? $("#odvjetnik_drop_down").val() : null;
    let parametri = {odvjetnik_id: odvjetnik_id, atribut_za_sortiranje: atribut_za_sortiranje, smjer_sortiranja: smjer_sortiranja, broj_stranice: broj_stranice, vrijednost_za_pretrazivanje: vrijednost_za_pretrazivanje, atribut_za_pretrazivanje: atribut_za_pretrazivanje};
    $.post("skripte/dohvati_pravna_savjetovanja_za_klijenta.php", parametri, function (data) {
        $(".opcenito--tablica").children("tbody").html("");
        if (data.tablica.length > 0) {
            $.each(data.tablica, function (atribut, vrijednost) {
                let tbody = "<tr>";
                tbody += "<td id='psp.razlog'>" + vrijednost.razlog + "</td>" +
                        "<td id='psp.opis'>" + vrijednost.opis + "</td>" +
                        "<td id='psp.datum_vrijeme_postavljanja'>" + vrijednost.datum_vrijeme_postavljanja + "</td>" +
                        ((vrijednost.tekst == null) ? "<td id='pso.tekst' style='color:grey;font-style:italic;background:#ffdebd'>Odvjetnik još nije odgovorio</td>" : "<td id='pso.tekst' style='background:#ffdebd'>" + vrijednost.tekst + "</td>");

                tbody += "</tr>";
                $(".opcenito--tablica").children("tbody").append(tbody);
            });
            $("#broj_stranice").val(data.trenutna_stranica);
        } else {
            $("tbody").append("Nema podataka");
        }

    }, "json");
}

function popuniListuOdvjetnikaSavjetovanje(event) {
    $.post("skripte/popuni_listu_odvjetnika_savjetovanje.php", function (data) {
        $.each(data, function (naziv, vrijednost) {
            opcije = "<option value='" + vrijednost.korisnik_id + "'>" + vrijednost.ime_prezime + "</option>";
            $("#odvjetnik_drop_down").append(opcije);
        });

    }, "json");
}

function azuriranjeAktivnogSudskogPostupka() {
    $("#azuriraj").click(provjereAzuriranjeAktivnogSudskogPostupka);
}

function provjereAzuriranjeAktivnogSudskogPostupka(event) {
    let datum_vrijeme_zavrsetka = $("#datum_vrijeme_zavrsetka").val();
    let greske = {};
    let polje_unosa = {datum_vrijeme_zavrsetka: datum_vrijeme_zavrsetka};
    $.each(polje_unosa, function (unos, vrijednost) {
        if (prazanUnos(vrijednost)) {
            greske[unos] = parseCitljivost(unos) + " - Nije unesena vrijednost";
        } else {
            let uspjeh;
            switch (unos) {
                case "datum_vrijeme_zavrsetka":
                    uspjeh = dovoljanBrojZnakova(8, 50, vrijednost);
                    if (uspjeh !== true) {
                        greske[unos] = parseCitljivost(unos) + " - " + uspjeh;
                    }
                    if (!provjeriDatum(vrijednost)) {
                        greske[unos] = parseCitljivost(unos) + " - Krivi format datuma";
                    }
                    break;
            }
        }

    });
    ocistiPoljeGresaka("#azuriranje-postupka-greske");
    if (Object.keys(greske).length > 0) {
        prikaziGreske(greske, "#azuriranje-postupka-greske");
        event.preventDefault();
    }
}


function dodajObranu() {
    $("#dodaj").click(provjereUnosaDodajObranu);
}


function provjereUnosaDodajObranu(event) {
    let argumenti_obrane = $("#argumenti_obrane").val();
    let greske = {};
    let polje_unosa = {argumenti_obrane: argumenti_obrane};
    $.each(polje_unosa, function (unos, vrijednost) {
        if (prazanUnos(vrijednost)) {
            greske[unos] = parseCitljivost(unos) + " - Nije unesena obrana";
        }
    });

    ocistiPoljeGresaka("#obrana-greske");
    if (Object.keys(greske).length > 0) {
        prikaziGreske(greske, "#obrana-greske");
        event.preventDefault();
    }
}

function prihvaceniZahtjevi() {
    postaviTablicuPrihvaceniZahtjevi();
    $("#pregledaj").click(otvoriZaprimljeniZahtjevi);
    $('body').on('click', '#dodaj', _dodajObranu);
    $('body').on('click', '#azuriraj', _azurirajObranu);
    $("#pretrazi").keyup(postaviTablicuPrihvaceniZahtjevi);
    $(".opcenito--tablica-zaglavlje-hover").click({funkcija: postaviTablicuPrihvaceniZahtjevi}, sortiranjeTablice);
    $("#prva").click({funkcija: postaviTablicuPrihvaceniZahtjevi}, prva);
    $("#sljedeca").click({funkcija: postaviTablicuPrihvaceniZahtjevi}, sljedeca);
    $("#prijasnja").click({funkcija: postaviTablicuPrihvaceniZahtjevi}, prijasnja);
    $("#posljednja").click({funkcija: postaviTablicuPrihvaceniZahtjevi}, posljednja);
    $("body").on('click', '#obrisi', obrisiObranu);
}

function obrisiObranu(event) {
    let obrana_id = $(this).attr("id_retka");
    $.post("skripte/obrisi_obranu.php", {obrana_id: obrana_id}, function (data) {
        postaviTablicuPrihvaceniZahtjevi();
        alert("Obrisana je obrana " + obrana_id);

    }, "json");
}

function _dodajObranu(event) {
    let zahtjev_id = $(this).parent().attr("id");
    window.open("./obrasci/dodaj_obranu.php?zahtjev_id=" + zahtjev_id, "_self");
}

function _azurirajObranu(event) {
    let zahtjev_id = $(this).parent().attr("id");
    let obrana_id = $(this).attr("value");
    window.open("./obrasci/dodaj_obranu.php?zahtjev_id=" + zahtjev_id + "&obrana_id=" + obrana_id, "_self");
}

function postaviTablicuPrihvaceniZahtjevi(event) {
    let atribut_za_sortiranje = ($("#atribut_za_sortiranje").val() != "") ? $("#atribut_za_sortiranje").val() : null;
    let smjer_sortiranja = ($("#smjer_sortiranja").val() != "") ? $("#smjer_sortiranja").val() : null;
    let broj_stranice = ($("#broj_stranice").val() != "") ? $("#broj_stranice").val() : null;
    let vrijednost_za_pretrazivanje = ($("#pretrazi").val() != "") ? $("#pretrazi").val() : null;
    let atribut_za_pretrazivanje = ($("#atribut_za_pretrazivanje").val() != "") ? $("#atribut_za_pretrazivanje").val() : null;
    let parametri = {atribut_za_sortiranje: atribut_za_sortiranje, smjer_sortiranja: smjer_sortiranja, broj_stranice: broj_stranice, vrijednost_za_pretrazivanje: vrijednost_za_pretrazivanje, atribut_za_pretrazivanje: atribut_za_pretrazivanje};

    $.post("skripte/dohvati_prihvacene_zahtjeve.php", parametri, function (data) {
        $(".opcenito--tablica").children("tbody").html("");
        if (data.tablica.length > 0) {
            $.each(data.tablica, function (atribut, vrijednost) {
                let tbody = "<tr id='" + vrijednost.zahtjev_id + "'>";
                tbody += "<td id='z.zahtjev_id'>" + vrijednost.zahtjev_id + "</td>" +
                        "<td id='z.datum_vrijeme_slanja'>" + vrijednost.datum_vrijeme_slanja + "</td>" +
                        "<td id='sp.naziv'>" + vrijednost.naziv + "</td>" +
                        "<td id='sp.protuzakonita_radnja'>" + vrijednost.protuzakonita_radnja + "</td>" +
                        "<td id='sp.dokaz'>" + vrijednost.dokaz + "</td>" +
                        "<td class='opcenito--tablica-hover'>" + (((sedamDanaOdPocetkaSudskogPostupka(vrijednost.sudski_postupak_id))) ? ("<a id='azuriranje_sudskog_postupka' href='obrasci/aktivni_sudski_postupci.php?sudski_postupak_id=" + vrijednost.sudski_postupak_id + "'>Ažuriraj</a></td>") : "<p style='color:grey;font-style:italic'>Nije prošlo 7 dana od početka sudskog postupka</p>") +
                        "<td id='k1.ime_prezime'>" + vrijednost.ime_prezime_tuzenika + "</td>" +
                        "<td id='k2.ime_prezime'>" + vrijednost.ime_prezime_tuzitelja + "</td>" +
                        ((vrijednost.obrana_id == null) ? ("<td colspan=2 style='color:grey;font-style:italic;'>Obrana nije unesena</td>") : ("<td id='o.obrana_id'>" + vrijednost.obrana_id + "</td>" + "<td id='o.argumenti_obrane'>" + vrijednost.argumenti_obrane + "</td>")) +
                        ((vrijednost.obrana_id == null) ? ("<td id='dodaj' class='opcenito--tablica-hover'>Dodaj</td>") :
                                ("<td id='azuriraj' class='opcenito--tablica-hover' value='" + vrijednost.obrana_id + "'>Ažuriraj</td>")) +
                        ((vrijednost.obrana_id == null) ? "<td style='font-style:italic;color:grey'>Obriši</td>" : ("<td id='obrisi' id_retka='" + vrijednost.obrana_id + "' class='opcenito--tablica-hover-crveno'>Obriši</td>"));

                tbody += "</tr>";
                $(".opcenito--tablica").children("tbody").append(tbody);
            });
            $("#broj_stranice").val(data.trenutna_stranica);
        } else {
            $("tbody").append("Nema podataka");
        }

    }, "json");
}

function sedamDanaOdPocetkaSudskogPostupka(sudski_postupak_id) {
    let podaci = {sudski_postupak_id: sudski_postupak_id};
    let proslo;
    $.ajax({
        type: "POST",
        url: "skripte/provjeri_datum_pocetka_sudskog_postupka.php",
        data: podaci,
        dataType: 'json',
        async: false,
        success: function (data) {
            if (data.proslo) {
                proslo = true;
            } else {
                proslo = false;
            }
        }
    });
    return proslo;
}

function zaprimljeniZahtjevi() {
    postaviTablicuZaprimljeniZahtjevi();
    $('body').on('click', '#prihvati', prihvatiZaprimljeniZahtjevi);
    $('body').on('click', '#odbij', odbijZaprimljeniZahtjevi);
    $("#pretrazi").keyup(postaviTablicuZaprimljeniZahtjevi);
    $(".opcenito--tablica-zaglavlje-hover").click({funkcija: postaviTablicuZaprimljeniZahtjevi}, sortiranjeTablice);
    $("#prva").click({funkcija: postaviTablicuZaprimljeniZahtjevi}, prva);
    $("#sljedeca").click({funkcija: postaviTablicuZaprimljeniZahtjevi}, sljedeca);
    $("#prijasnja").click({funkcija: postaviTablicuZaprimljeniZahtjevi}, prijasnja);
    $("#posljednja").click({funkcija: postaviTablicuZaprimljeniZahtjevi}, posljednja);
}


function prihvatiZaprimljeniZahtjevi(event) {
    let zahtjev_id = $(this).parent().attr("id");
    ajaxAzurirajStatusZahtjeva(zahtjev_id, 1);
}

function odbijZaprimljeniZahtjevi(event) {
    let zahtjev_id = $(this).parent().attr("id");
    ajaxAzurirajStatusZahtjeva(zahtjev_id, 0);
}


function ajaxAzurirajStatusZahtjeva(zahtjev_id, status) {
    let podaci = {zahtjev_id: zahtjev_id, status: status};
    $.ajax({
        type: "POST",
        url: "skripte/azuriraj_status_zahtjeva.php",
        data: podaci,
        dataType: 'json',
        async: false,
        success: function (data) {
            $("#poruka").show();
            if (status == 0) {
                $("#poruka").removeClass("opcenito--polje-za-greske-tocno");
                $("#poruka").addClass("opcenito--polje-za-greske");
                $("#poruka").children("p").html("Zahtjev " + zahtjev_id + " je odbijen");
            } else {
                $("#poruka").removeClass("opcenito--polje-za-greske");
                $("#poruka").addClass("opcenito--polje-za-greske-tocno");
                $("#poruka").children("p").html("Zahtjev " + zahtjev_id + " je prihvaćen");
            }
            $("#poruka").delay(700).fadeOut('slow');
            postaviTablicuZaprimljeniZahtjevi();
        }
    });
}

function otvoriZaprimljeniZahtjevi(event) {
    event.preventDefault();
    window.open("./zaprimljeni_zahtjevi.php", "_self");
}

function postaviTablicuZaprimljeniZahtjevi(event) {
    let atribut_za_sortiranje = ($("#atribut_za_sortiranje").val() != "") ? $("#atribut_za_sortiranje").val() : null;
    let smjer_sortiranja = ($("#smjer_sortiranja").val() != "") ? $("#smjer_sortiranja").val() : null;
    let broj_stranice = ($("#broj_stranice").val() != "") ? $("#broj_stranice").val() : null;
    let vrijednost_za_pretrazivanje = ($("#pretrazi").val() != "") ? $("#pretrazi").val() : null;
    let atribut_za_pretrazivanje = ($("#atribut_za_pretrazivanje").val() != "") ? $("#atribut_za_pretrazivanje").val() : null;
    let parametri = {atribut_za_sortiranje: atribut_za_sortiranje, smjer_sortiranja: smjer_sortiranja, broj_stranice: broj_stranice, vrijednost_za_pretrazivanje: vrijednost_za_pretrazivanje, atribut_za_pretrazivanje: atribut_za_pretrazivanje};


    $.post("skripte/dohvati_zaprimljene_zahtjeve.php", parametri, function (data) {
        $(".opcenito--tablica").children("tbody").html("");
        if (data.tablica.length > 0) {
            $.each(data.tablica, function (atribut, vrijednost) {
                let tbody = "<tr id='" + vrijednost.zahtjev_id + "'>";
                tbody += "<td id='z.zahtjev_id'>" + vrijednost.zahtjev_id + "</td>" +
                        "<td id='z.datum_vrijeme_slanja'>" + vrijednost.datum_vrijeme_slanja + "</td>" +
                        "<td id='sp.naziv'>" + vrijednost.naziv + "</td>" +
                        "<td id='sp.protuzakonita_radnja'>" + vrijednost.protuzakonita_radnja + "</td>" +
                        "<td id='sp.dokaz'>" + vrijednost.dokaz + "</td>" +
                        "<td id='ime_prezime_tuzenika'>" + vrijednost.ime_prezime_tuzenika + "</td>" +
                        "<td id='ime_prezime_tuzitelja'>" + vrijednost.ime_prezime_tuzitelja + "</td>" +
                        "<td id='prihvati' class='opcenito--tablica-hover-zeleno'>Prihvati</td>" +
                        "<td id='odbij' class='opcenito--tablica-hover-crveno'>Odbij</td>";

                tbody += "</tr>";
                $(".opcenito--tablica").children("tbody").append(tbody);
            });
            $("#broj_stranice").val(data.trenutna_stranica);
        } else {
            $("tbody").append("Nema podataka");
        }

    }, "json");
}

function kreiranjeZahtjevaZaOdvjetnikom() {
    $("#sudski_postupak").focus(popuniListuSudskihPostupaka);
    //$("#sudski_postupak").click(popuniListuSudskihPostupaka);
    $("#odvjetnik").focus(popuniListuOdvjetnika);
    //$("#odvjetnik").click(popuniListuOdvjetnika);
    $("#dodaj").click(provjereUnosaKreiranjeZahtjevaZaOdvjetnikom);
}



function provjereUnosaKreiranjeZahtjevaZaOdvjetnikom(event) {
    let naziv_datoteke = $("#slika_sudskog_postupka").val().split("\\").pop();
    let sudski_postupak_id = $("#sudski_postupak").val() == "Odaberite sudski postupak" ? null : $("#sudski_postupak").val();
    let odvjetnik_id = $("#odvjetnik").val() == "Odaberite odvjetnika" ? null : $("#odvjetnik").val();
    let greske = {};
    let polje_unosa = {naziv_datoteke: naziv_datoteke, sudski_postupak_id: sudski_postupak_id, odvjetnik_id: odvjetnik_id};
    if (!sudskiPostupakPoceo(sudski_postupak_id)) {
        $.each(polje_unosa, function (unos, vrijednost) {

            if (prazanUnos(vrijednost) && !(unos == 'naziv_datoteke' && window.location.href.indexOf("zahtjev_id") > -1)) {
                greske[unos] = parseCitljivost(unos) + " - Nije unesena vrijednost";
            } else {
                switch (unos) {
                    case "naziv_datoteke":
                        if (document.getElementById("slika_sudskog_postupka").value != "") {
                            let ekstenzija_datoteke = naziv_datoteke.split(".")[1];
                            if (ekstenzija_datoteke.toUpperCase() != "PNG" &&
                                    ekstenzija_datoteke.toUpperCase() != "JPEG" && ekstenzija_datoteke.toUpperCase() != "JPG") {
                                greske[unos] = parseCitljivost(unos) + " - Datoteka mora imati ekstenzije .jpg, .png ili .jpeg";

                            } else if ($("#slika_sudskog_postupka")[0].files[0].size > 1000000) {
                                greske[unos] = parseCitljivost(unos) + " - Datoteka mora biti manja od 1MB";
                            } else {
                                $.ajax({
                                    type: "POST",
                                    url: "../skripte/vrati_nazive_datoteka.php",
                                    dataType: 'json',
                                    async: false,
                                    success: function (data) {
                                        for (let i = 0; i < data.length; i++) {
                                            if (data[i] == naziv_datoteke) {
                                                greske[unos] = parseCitljivost(unos) + " - Datoteka s tim imenom već postoji";
                                                break;
                                            }
                                        }
                                    }
                                });
                            }
                        }
                        break;

                }
            }

        });
    } else {
        greske['unos'] = "Sudski postupak" + " - Sudski postupak je već počeo";
    }
    ocistiPoljeGresaka("#sudski-postupak-odvjetnika-greske");
    if (Object.keys(greske).length > 0) {
        prikaziGreske(greske, "#sudski-postupak-odvjetnika-greske");
        event.preventDefault();
    }
}

function sudskiPostupakPoceo(sudski_postupak_id) {
    let poceo = false;
    $.ajax({
        type: "POST",
        url: "../skripte/provjeri_pocetak_sudskog_postupka.php",
        data: {sudski_postupak_id: sudski_postupak_id},
        dataType: 'json',
        async: false,
        success: function (data) {
            poceo = data.poceo;
        }
    });

    return poceo;
}

function popuniListuSudskihPostupaka(event) {
    $("#" + event.target.id).html("");
    $.post("../skripte/popuni_listu_sudskih_postupaka.php", function (data) {
        $.each(data, function (naziv, vrijednost) {
            opcije = "<option value='" + vrijednost.sudski_postupak_id + "'>" + vrijednost.naziv + "</option>";
            $("#" + event.target.id).append(opcije);
        });

    }, "json");
    $("#odvjetnik").html("");
}

function popuniListuOdvjetnika(event) {
    $("#" + event.target.id).html("");
    let sudski_postupak_id = $("#sudski_postupak").val();
    $.post("../skripte/popuni_listu_odvjetnika.php", {sudski_postupak_id: sudski_postupak_id}, function (data) {
        $.each(data, function (naziv, vrijednost) {
            opcije = "<option value='" + vrijednost.korisnik_id + "'>" + vrijednost.ime_prezime + "</option>";
            $("#" + event.target.id).append(opcije);
        });

    }, "json");
}

function zahtjeviZaOdvjetnikom() {
    postaviTablicuZahtjeviZaOdvjetnikom();
    $("#dodaj").click(otvoriKreiranjeZahtjevaZaOdvjetnikom);
    $("#pretrazi").keyup(postaviTablicuZahtjeviZaOdvjetnikom);
    $("th").click({funkcija: postaviTablicuZahtjeviZaOdvjetnikom}, sortiranjeTablice);
    $("#prva").click({funkcija: postaviTablicuZahtjeviZaOdvjetnikom}, prva);
    $("#sljedeca").click({funkcija: postaviTablicuZahtjeviZaOdvjetnikom}, sljedeca);
    $("#prijasnja").click({funkcija: postaviTablicuZahtjeviZaOdvjetnikom}, prijasnja);
    $("#posljednja").click({funkcija: postaviTablicuZahtjeviZaOdvjetnikom}, posljednja);
    $("body").on('click', '#obrisi', obrisiZahtjev);
}

function obrisiZahtjev(event) {
    let zahtjev_id = $(this).attr("id_retka");
    $.post("skripte/obrisi_zahtjev.php", {zahtjev_id: zahtjev_id}, function (data) {
        postaviTablicuZahtjeviZaOdvjetnikom();
        alert("Obrisan je zahtjev " + zahtjev_id);
    }, "json");
}

function sortiranjeTablice(event) {
    let atribut_za_sortiranje = event.target.id;
    let smjer_sortiranja = ($("#smjer_sortiranja").val() == "DESC" && $("#atribut_za_sortiranje").val() == atribut_za_sortiranje) ? $("#smjer_sortiranja").val("ASC") : $("#smjer_sortiranja").val("DESC");
    $("#atribut_za_sortiranje").val(atribut_za_sortiranje);
    event.data.funkcija();
}


function postaviTablicuZahtjeviZaOdvjetnikom(event) {
    let atribut_za_sortiranje = ($("#atribut_za_sortiranje").val() != "") ? $("#atribut_za_sortiranje").val() : null;
    let smjer_sortiranja = ($("#smjer_sortiranja").val() != "") ? $("#smjer_sortiranja").val() : null;
    let broj_stranice = ($("#broj_stranice").val() != "") ? $("#broj_stranice").val() : null;
    let vrijednost_za_pretrazivanje = ($("#pretrazi").val() != "") ? $("#pretrazi").val() : null;
    let atribut_za_pretrazivanje = ($("#atribut_za_pretrazivanje").val() != "") ? $("#atribut_za_pretrazivanje").val() : null;
    let parametri = {atribut_za_sortiranje: atribut_za_sortiranje, smjer_sortiranja: smjer_sortiranja, broj_stranice: broj_stranice, vrijednost_za_pretrazivanje: vrijednost_za_pretrazivanje, atribut_za_pretrazivanje: atribut_za_pretrazivanje};


    $.post("skripte/dohvati_zahtjeve_za_odvjetnikom.php", parametri, function (data) {
        $(".opcenito--tablica").children("tbody").html("");

        if (data.tablica.length > 0) {
            $.each(data.tablica, function (atribut, vrijednost) {
                let tbody = "<tr>";
                tbody += "<td id='z.zahtjev_id'>" + vrijednost.zahtjev_id + "</td>" +
                        "<td id='z.slika_sudskog_postupka'><a href='" + vrijednost.slika_sudskog_postupka + "' target='_blank'><img src='" + vrijednost.slika_sudskog_postupka + "' class='opcenito--ikona-slika'></a></td>" +
                        "<td id='z.datum_vrijeme_slanja'>" + vrijednost.datum_vrijeme_slanja + "</td>"
                        + "<td id='sp.naziv'>" + vrijednost.naziv + "</td>" +
                        "<td id='k.ime_prezime'>" + vrijednost.ime_prezime + "</td>" + (((vrijednost.status === null) ? "<td id='z.status'>Poslan" : ((vrijednost.status === 0) ? "<td id='z.status' style='background:#FFA5A5'>Odbijen" : "<td id='z.status' style='background:#E7FFEB'>Prihvaćen"))) + "</td>" +
                        ((vrijednost.status === null) ? ("<td class='opcenito--tablica-hover'><a href='./obrasci/kreiranje_zahtjeva_za_odvjetnikom.php?zahtjev_id=" + vrijednost.zahtjev_id + "'>Ažuriraj</a></td>") : ("<td style='color:grey;font-style:italic'>Ažuriraj</td>")) +
                        ((vrijednost.status != null) ? "<td style='font-style:italic;color:grey'>Obriši</td>" : "<td id='obrisi' id_retka='" + vrijednost.zahtjev_id + "' class='opcenito--tablica-hover-crveno'>Obriši</td>");
                tbody += "</tr>";
                $(".opcenito--tablica").children("tbody").append(tbody);
            });
            $("#broj_stranice").val(data.trenutna_stranica);
        } else {
            $("tbody").append("Nema podataka");
        }

    }, "json");
}

function otvoriKreiranjeZahtjevaZaOdvjetnikom(event) {
    event.preventDefault();
    window.open("./obrasci/kreiranje_zahtjeva_za_odvjetnikom.php", "_self");
}

function dodavanjeSudskogPostupkaOdvjetnika() {
    $("#klijent").focus(popuniListuKorisnika);
    //$("#klijent").click(popuniListuKorisnika);
    $("#dodaj").click(provjereUnosaDodavanjeSudskihPostupakaOdvjetnika);


}

function provjereUnosaDodavanjeSudskihPostupakaOdvjetnika(event) {
    let naziv = $("#naziv").val();
    let protuzakonita_radnja = $("#protuzakonita_radnja").val();
    let dokaz = $("#dokaz").val();
    let datum_vrijeme_pocetka = $("#datum_vrijeme_pocetka").val();
    let klijent = $("#klijent").val();
    let greske = {};
    let polje_unosa = {naziv: naziv, protuzakonita_radnja: protuzakonita_radnja, dokaz: dokaz, datum_vrijeme_pocetka: datum_vrijeme_pocetka, klijent: klijent};
    $.each(polje_unosa, function (unos, vrijednost) {
        if (prazanUnos(vrijednost)) {
            greske[unos] = parseCitljivost(unos) + " - Nije unesena vrijednost";
        } else {
            let uspjeh;
            let regularni_izraz;
            switch (unos) {
                case "naziv":
                    uspjeh = dovoljanBrojZnakova(6, 50, vrijednost);
                    if (uspjeh !== true) {
                        greske[unos] = parseCitljivost(unos) + " - " + uspjeh;
                    }
                    break;
                case "protuzakonita_radnja":
                    uspjeh = dovoljanBrojZnakova(15, 50, vrijednost);
                    if (uspjeh !== true) {
                        greske[unos] = parseCitljivost(unos) + " - " + uspjeh;
                    }
                    break;
                case "dokaz":
                    uspjeh = dovoljanBrojZnakova(20, 500, vrijednost);
                    if (uspjeh !== true) {
                        greske[unos] = parseCitljivost(unos) + " - " + uspjeh;
                    }
                    break;
                case "datum_vrijeme_pocetka":
                    uspjeh = dovoljanBrojZnakova(8, 50, vrijednost);
                    if (uspjeh !== true) {
                        greske[unos] = parseCitljivost(unos) + " - " + uspjeh;
                    }
                    if (!provjeriDatum(vrijednost)) {
                        greske[unos] = parseCitljivost(unos) + " - Krivi format datuma";
                    }
                    break;
                case "klijent":
                    if (klijent == "Odaberite klijenta") {
                        greske[unos] = parseCitljivost(unos) + " - " + "Niste unijeli vrijednost";
                    }
                    break;
            }
        }

    });
    ocistiPoljeGresaka("#sudski-postupak-odvjetnika-greske");
    if (Object.keys(greske).length > 0) {
        prikaziGreske(greske, "#sudski-postupak-odvjetnika-greske");
        event.preventDefault();
    }
}

function popuniListuKorisnika(event) {
    $("#" + event.target.id).html("");
    $.post("../skripte/popuni_listu_korisnika.php", function (data) {
        $.each(data, function (naziv, vrijednost) {
            opcije = "<option value='" + vrijednost.korisnik_id + "'>" + vrijednost.ime_prezime + " (" + vrijednost.korisnicko_ime + ")</option>";
            $("#" + event.target.id).append(opcije);
        });

    }, "json");
}

function sudskiPostupciOdvjetnika() {
    postaviTablicuSudskiPostupciOdvjetnika();
    $("#dodaj").click(otvoriDodavanjeSudskogPostupka);
    $("#pretrazi").keyup(postaviTablicuSudskiPostupciOdvjetnika);
    $("th").click({funkcija: postaviTablicuSudskiPostupciOdvjetnika}, sortiranjeTablice);
    $("#prva").click({funkcija: postaviTablicuSudskiPostupciOdvjetnika}, prva);
    $("#sljedeca").click({funkcija: postaviTablicuSudskiPostupciOdvjetnika}, sljedeca);
    $("#prijasnja").click({funkcija: postaviTablicuSudskiPostupciOdvjetnika}, prijasnja);
    $("#posljednja").click({funkcija: postaviTablicuSudskiPostupciOdvjetnika}, posljednja);
    $("body").on("click", "#obrisi", obrisiSudskiPostupak);
}

function obrisiSudskiPostupak(event) {
    let sudski_postupak_id = $(this).attr("id_retka");
    $.post("skripte/obrisi_sudski_postupak.php", {sudski_postupak_id: sudski_postupak_id}, function (data) {
        postaviTablicuSudskiPostupciOdvjetnika();
        alert("Obrisan je sudski postupak  " + sudski_postupak_id);

    }, "json");
}

function sortiranjeSudskiPostupciOdvjetnika(event) {
    let atribut_za_sortiranje = event.target.id;
    let smjer_sortiranja = ($("#smjer_sortiranja").val() == "DESC" && $("#atribut_za_sortiranje").val() == atribut_za_sortiranje) ? $("#smjer_sortiranja").val("ASC") : $("#smjer_sortiranja").val("DESC");
    $("#atribut_za_sortiranje").val(atribut_za_sortiranje);
    postaviTablicuSudskiPostupciOdvjetnika(event);
}

function prva(event) {
    $("#broj_stranice").val(0);
    event.data.funkcija();
}

function sljedeca(event) {
    let trenutna = $("#broj_stranice").val();
    $("#broj_stranice").val(parseInt(trenutna) + 1);
    event.data.funkcija();
}

function prijasnja(event) {
    let trenutna = $("#broj_stranice").val();
    $("#broj_stranice").val(parseInt(trenutna) - 1);
    event.data.funkcija();
}

function posljednja(event) {
    $("#broj_stranice").val(9999999);
    event.data.funkcija();
}

function postaviTablicuSudskiPostupciOdvjetnika(event) {
    let atribut_za_sortiranje = ($("#atribut_za_sortiranje").val() != "") ? $("#atribut_za_sortiranje").val() : null;
    let smjer_sortiranja = ($("#smjer_sortiranja").val() != "") ? $("#smjer_sortiranja").val() : null;
    let broj_stranice = ($("#broj_stranice").val() != "") ? $("#broj_stranice").val() : null;
    let vrijednost_za_pretrazivanje = ($("#pretrazi").val() != "") ? $("#pretrazi").val() : null;
    let atribut_za_pretrazivanje = ($("#atribut_za_pretrazivanje").val() != "") ? $("#atribut_za_pretrazivanje").val() : null;
    let parametri = {atribut_za_sortiranje: atribut_za_sortiranje, smjer_sortiranja: smjer_sortiranja, broj_stranice: broj_stranice, vrijednost_za_pretrazivanje: vrijednost_za_pretrazivanje, atribut_za_pretrazivanje: atribut_za_pretrazivanje};
    $.post("skripte/dohvati_sudske_postupke_odvjetnika.php", parametri, function (data) {
        $(".opcenito--tablica").children("tbody").html("");
        if (data.tablica.length > 0) {
            $.each(data.tablica, function (atribut, vrijednost) {
                let tbody = "<tr>";
                tbody += "<td id='sp.sudski_postupak_id'>" + vrijednost.sudski_postupak_id + "</td>" +
                        "<td id='sp.naziv'>" + vrijednost.naziv + "</td>" +
                        "<td id='sp.protuzakonita_radnja'>" + vrijednost.protuzakonita_radnja + "</td>" +
                        "<td id='sp.dokaz'>" + vrijednost.dokaz + "</td>" +
                        "<td id='sp.datum_vrijeme_pocetka'>" + vrijednost.datum_vrijeme_pocetka + "</td>" +
                        "<td id='sp.datum_vrijeme_zavrsetka'>" + ((vrijednost.datum_vrijeme_zavrsetka == null) ? "Postupak nije završio" : vrijednost.datum_vrijeme_zavrsetka) + "</td>" +
                        "<td id='sp.zakljucak_postupka'>" + ((vrijednost.zakljucak_postupka == null) ? "Zaključak nije donesen" : ((vrijednost.zakljucak_postupka == 1) ? "Kriv" : "Nije kriv")) + "</td>" +
                        "<td id='sp.status'>" + ((vrijednost.status == 0) ? "Nije završen" : "Završen") + "</td>" +
                        "<td id='k.korisnicko_ime'>" + vrijednost.korisnicko_ime + "</td>" +
                        "<td id='k.ime_prezime'>" + vrijednost.ime_prezime + "</td>" +
                        "<td class='opcenito--tablica-hover'><a href='./obrasci/dodaj_sudski_postupak_odvjetnika.php?sudski_postupak_id=" + vrijednost.sudski_postupak_id + "'>Ažuriraj</a></td>" +
                        ((vrijednost.zakljucak_postupka == null) ? "<td id='obrisi' id_retka='" + vrijednost.sudski_postupak_id + "' class='opcenito--tablica-hover-crveno'>Obriši</td>" : "<td style='font-style:italic;color:grey;'>Obriši</td>");
                tbody += "</tr>";
                $(".opcenito--tablica").children("tbody").append(tbody);
            });
            $("#broj_stranice").val(data.trenutna_stranica);
        } else {
            $("tbody").append("Nema podataka");
        }

    }, "json");
}

function otvoriDodavanjeSudskogPostupka(event) {
    event.preventDefault();
    window.open("./obrasci/dodaj_sudski_postupak_odvjetnika.php", "_self");
}

function prijava() {

    $("#prijava--zaboravljena-lozinka").click(function (event) {
        let korisnicko_ime = $("#korisnicko_ime").val();
        if (prazanUnos(korisnicko_ime)) {
            alert("Morate unijeti korisničko ime kako bi mogli resetirati lozinku!");

        } else if (!postojiKorisnickoIme(korisnicko_ime)) {
            alert("Korisničko ime ne postoji!");
        } else {
            $.post("../skripte/zaboravljena_lozinka.php", {korisnicko_ime: korisnicko_ime}, function (data) {
                alert("Nova lozinka poslana Vam je na mail adresu!");
            });
        }
    });
}

function spremiUvjeteKoristenja(event) {
    $.post("skripte/spremi_uvjete_koristenja.php", {korisnicko_ime: "korime"}, function (data) {
    });
    $("#zaglavlje--uvjeti-koristenja").hide();
}


function registracija() {
    $("#registriraj_se").click(provjeriUnoseRegistracija);
}

function provjeriUnoseRegistracija(event) {
    let korisnicko_ime = $("#korisnicko_ime").val();
    let ime_prezime = $("#ime_prezime").val();
    let email = $("#email").val();
    let lozinka = $("#lozinka").val();
    let ponovljena_lozinka = $("#ponovljena_lozinka").val();
    let greske = {};
    let polje_unosa = {korisnicko_ime: korisnicko_ime, ime_prezime: ime_prezime, email: email, lozinka: lozinka, ponovljena_lozinka: ponovljena_lozinka};
    $.each(polje_unosa, function (unos, vrijednost) {
        if (prazanUnos(vrijednost)) {
            greske[unos] = parseCitljivost(unos) + " - Nije unesena vrijednost";
        } else {
            let uspjeh;
            let regularni_izraz;
            switch (unos) {
                case "korisnicko_ime":
                    uspjeh = dovoljanBrojZnakova(5, 50, vrijednost);
                    regularni_izraz = new RegExp('^([^-]|[a-z,A-Z,0-9,ČĆŽĐŠčćžđš,_])[a-z,A-Z,0-9,ČĆŽĐŠčćžđš,_,-]{4,50}$', 'g');
                    if (uspjeh !== true) {
                        greske[unos] = parseCitljivost(unos) + " - " + uspjeh;
                    } else if (!regularni_izraz.test(vrijednost)) {
                        greske[unos] = parseCitljivost(unos) + " - Korisničko ime se smije sastojati samo od malih i velikih slova, brojeva te znakova '-' i '_' s time da ne smije počinjati znakom '-'";
                    } else if (postojiKorisnickoIme(korisnicko_ime)) {
                        greske[unos] = parseCitljivost(unos) + " - Korisničko ime " + korisnicko_ime + " već postoji!";
                    }
                    break;
                case "ime_prezime":
                    uspjeh = dovoljanBrojZnakova(0, 50, vrijednost);
                    regularni_izraz = new RegExp('^(([A-Z,ČĆŽĐŠ][a-z,čćžđš]{1,})(([ ]|[-])([A-Z,ČĆŽĐŠ][a-z,čćžđš]{1,}))?)[ ](([A-Z,ČĆŽĐŠ][a-z,čćžđš]{1,})(([ ]|[-])([A-Z,ČĆŽĐŠ][a-z,čćžđš]{1,}))?)$', 'g');
                    if (uspjeh !== true) {
                        greske[unos] = parseCitljivost(unos) + " - " + uspjeh;
                    } else if (!regularni_izraz.test(vrijednost)) {
                        greske[unos] = parseCitljivost(unos) + " - Format imena i prezimena mora biti Ime[[-|' ']Ime] Prezime[[-|' ']Prezime]";
                    }
                    break;
                case "email":
                    uspjeh = dovoljanBrojZnakova(10, 50, vrijednost);
                    regularni_izraz = new RegExp('^([A-Z,a-z,ČĆŽĐŠčćžđš][a-z,A-Z,0-9,ČĆŽĐŠčćžđš,_,-]{2,}@[a-z]{2,}[.][a-z][a-z]{1,})$', 'g');
                    if (uspjeh !== true) {
                        greske[unos] = parseCitljivost(unos) + " - " + uspjeh;
                    } else if (!regularni_izraz.test(vrijednost)) {
                        greske[unos] = parseCitljivost(unos) + " - E-mail mora biti u formatu 'korime@imedomene.domena'";
                    }

                    break;
                case "lozinka":
                    uspjeh = dovoljanBrojZnakova(8, 50, vrijednost);
                    regularni_izraz = new RegExp('^(?=((.*[0-9]){2,}))(?=((.*[A-ZČĆŽĐŠ]){2,}))(?=((.*[a-z,čćžđš]){2,})).{8,50}$', 'g');
                    if (uspjeh !== true) {
                        greske[unos] = parseCitljivost(unos) + " - " + uspjeh;
                    } else if (!regularni_izraz.test(vrijednost)) {
                        greske[unos] = parseCitljivost(unos) + " - Lozinka mora imati barem 2 mala slova, 2 velika slova i 2 broja";
                    }

                    break;
                case "ponovljena_lozinka":
                    if (vrijednost !== lozinka) {
                        greske[unos] = parseCitljivost(unos) + " - Ponovljena lozinka se ne podudara s lozinkom";
                    }

                    break;
            }
        }

    });
    ocistiPoljeGresaka("#registracijske-greske");
    if (Object.keys(greske).length > 0) {
        prikaziGreske(greske, "#registracijske-greske");
        event.preventDefault();
    } else {
        postaviTocnoPolje("#registracijske-greske");
    }



}

function dovoljanBrojZnakova(min, max, unos) {
    if (unos.length < min)
        return "Uneseno je manje od " + min + " znakova";
    if (unos.length > max)
        return "Uneseno je više od " + max + " znakova";
    return true;
}

function prazanUnos(unos) {
    return !$.trim(unos).length > 0;
}

function postojiKorisnickoIme(korisnicko_ime) {
    var postoji;
    let podaci_za_slanje = {korisnicko_ime: korisnicko_ime};
    $.ajax({
        type: "POST",
        url: "../skripte/provjeri_korisnicko_ime.php",
        data: podaci_za_slanje,
        dataType: 'json',
        async: false,
        success: function (data) {
            postoji = data.postoji;
        }
    });

    return korisnicko_ime == postoji;
}

function upravljanjeKonfiguracijom() {
    $("#spremi-konfiguraciju").click({skripta: "skripte/spremi_konfiguraciju.php"}, spremiKonfiguraciju);
    $("#postavi-pomak").click({servis: "http://barka.foi.hr/WebDiP/pomak_vremena/vrijeme.html"}, pozoviServis);
    $("#dohvati-pomak").click(vratiPomak);
    $("#spremi-pomak").click(spremiPomak);
    $("#reset").click(function (event) {
        $.post("skripte/resetiraj_uvjete_koristenja.php", function (data) {
            alert("Resetirali ste uvjete korištenja svim korisnicima!");
        });
    });
}



function spremiKonfiguraciju(event) {
    event.preventDefault();
    let skripta = event.data.skripta;
    let trajanje_kolacica = $("#trajanje_kolacica").val();
    let broj_stranica_stranicenja = $("#broj_stranica_stranicenja").val();
    let trajanje_sesije = $("#trajanje_sesije").val();
    let broj_neuspjesnih_prijava = $("#broj_neuspjesnih_prijava").val();
    let broj_sudskih_postupaka = $("#broj_sudskih_postupaka").val();
    let broj_zahtjeva = $("#broj_zahtjeva").val();
    let broj_odgovora = $("#broj_odgovora").val();
    let istek_verifikacije = $("#istek_verifikacije").val();
    let parametri = {
        trajanje_kolacica: trajanje_kolacica,
        broj_stranica_stranicenja: broj_stranica_stranicenja,
        trajanje_sesije: trajanje_sesije,
        broj_neuspjesnih_prijava: broj_neuspjesnih_prijava,
        broj_sudskih_postupaka: broj_sudskih_postupaka,
        broj_zahtjeva: broj_zahtjeva,
        broj_odgovora: broj_odgovora,
        istek_verifikacije: istek_verifikacije
    }

    $("#konfiguracijska-forma").children("div").removeClass("opcenito--pogresan-unos");
    let greske = provjeriKonfiguracijskeParametre(parametri);
    if (Object.keys(greske).length > 0) {
        prikaziGreske(greske, "#konfiguracija-greske");
    } else {
        greske = pozoviSkriptu(skripta, parametri);
        prikaziGreske(greske);
    }
    if (!greske) {
        ocistiPoljeGresaka("#konfiguracija-greske");
        postaviTocnoPolje("#konfiguracija-greske");
    }

}

function provjeriKonfiguracijskeParametre(parametri) {
    let greske = {};
    $.each(parametri, function (key, value) {
        if (!value || value == "") {
            greske[key] = parseCitljivost(key) + " - Vrijednost nije unesena";
        } else if (!broj_je(value)) {
            greske[key] = parseCitljivost(key) + " - Nije broj!";
        } else if (value > 99999 || value < -99999) {
            greske[key] = parseCitljivost(key) + " - Broj je prevelik!";
        }
    });
    return greske;
}

function posrednickaFunkcijaAjax(event) {
    event.data.funkcija(event.data.metoda, event.data.skripta, event.data.parametri, event.data.funkcija_obrada);
}

function pozoviServis(event) {
    window.open(event.data.servis);
}

function pozoviSkriptu(skripta, parametri) {
    $.post(skripta, parametri, function (data) {
    }, "json");
}

function pozoviObradiSkriptu(metoda, skripta, parametri, funkcija) {
    if (metoda == "get")
        $.get(skripta, parametri, funkcija, "json");
    else {
        $.post(skripta, parametri, funkcija, "json");
    }
}

function vratiPomak(event) {
    $.post("skripte/dohvacanje_pomaka.php", function (data) {
        $("#pomak").val(data);
    });
}

function spremiPomak(event) {
    let pomak = $("#pomak").val();
    let parametri = {pomak: pomak};
    $.post("skripte/unos_pomaka.php", parametri, function (data) {
        postaviTocnoPolje("#pomak-greske");
    }, "json");
}


function parseCitljivost(string) {
    return string.charAt(0).toUpperCase() + string.substring(1).replaceAll("_", " ");
}

function broj_je(vrijednost) {
    return !isNaN(vrijednost) && parseInt(Number(vrijednost)) == vrijednost && !isNaN(parseInt(vrijednost, 10));
}

function prikaziGreske(greske, polje_gresaka) {
    $(polje_gresaka).removeClass("opcenito--polje-za-greske-tocno");
    $(polje_gresaka).addClass("opcenito--polje-za-greske");
    $(polje_gresaka).html("");
    $(polje_gresaka).show();
    $.each(greske, function (key, value) {
        $(polje_gresaka).append("<p>" + value + "</p>");
        $("#" + key).parent("div").addClass("opcenito--pogresan-unos");
    });
}

function ocistiPoljeGresaka(polje_gresaka) {
    $(polje_gresaka).html("");
    //$(polje_gresaka).siblings(".opcenito--input").removeClass("opcenito--pogresan-unos");
    $("*").removeClass("opcenito--pogresan-unos");

    $(polje_gresaka).hide();
}

function postaviTocnoPolje(polje_gresaka) {
    $(polje_gresaka).show();
    $(polje_gresaka).html("Uspjeh!");
    $(polje_gresaka).removeClass("opcenito--polje-za-greske")
    $(polje_gresaka).addClass("opcenito--polje-za-greske-tocno");
    $(polje_gresaka).delay(700).fadeOut('slow');
}

function provjeriDatum(unos_datum) {
    if (unos_datum.length !== 20)
        return false;

    let cijeli_zapis = unos_datum.split(' ');
    if (cijeli_zapis.length !== 2)
        return false;

    let datum = cijeli_zapis[0].split('.');
    if (datum.length !== 4)
        return false;

    let vrijeme = cijeli_zapis[1].split(':');
    if (vrijeme.length !== 3)
        return false;

    let dan = datum[0];
    let mjesec = datum[1];
    let godina = datum[2];

    let sati = vrijeme[0];
    let minute = vrijeme[1];
    let sekunde = vrijeme[2];

    let spoj = dan + mjesec + godina + sati + minute + sekunde;
    for (let slovo of spoj) {
        if (parseInt(slovo) != slovo)
            return false;
    }
    if (dan.length !== 2 || mjesec.length !== 2 || godina.length !== 4 || sati.length !== 2 || minute.length !== 2 || sekunde.length !== 2) {
        return false;
    } else if (parseInt(dan[0]) > 3 || parseInt(dan[0]) < 0)
        return false;
    else if (parseInt(dan[1]) > 9 || parseInt(dan[1]) < 0)
        return;
    else if (parseInt(mjesec[0]) > 1 || parseInt(mjesec[0]) < 0)
        return false;
    else if (parseInt(mjesec[1]) > 9 || parseInt(mjesec[1]) < 0)
        return false;
    else if (parseInt(godina[0]) > 9 || parseInt(godina[0]) < 0)
        return false;
    else if (parseInt(godina[1]) > 9 || parseInt(godina[1]) < 0)
        return false;
    else if (parseInt(godina[2]) > 9 || parseInt(godina[2]) < 0)
        return false;
    else if (parseInt(godina[3]) > 9 || parseInt(godina[3]) < 0)
        return false;
    else if (parseInt(sati[0]) < 0 || parseInt(sati[0]) > 2)
        return false;
    else if (parseInt(sati[1]) < 0 || parseInt(sati[1]) > 9)
        return false;
    else if (parseInt(minute[0]) < 0 || parseInt(minute[0]) > 5)
        return false;
    else if (parseInt(minute[1]) < 0 || parseInt(minute[1]) > 9)
        return false;
    else if (parseInt(sekunde[0]) < 0 || parseInt(sekunde[0]) > 5)
        return false;
    else if (parseInt(sekunde[1]) < 0 || parseInt(sekunde[1]) > 9)
        return false;

    return true;
}