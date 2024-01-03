<?php

$direktorij = dirname(getcwd());

include_once "$direktorij/klase/baza.class.php";

$sudski_postupak_id = filter_input(INPUT_POST, 'sudski_postupak_id', FILTER_SANITIZE_STRING);
$baza = new Baza();

$baza->spojiDB();

$baza->sudski_postupak_obrisi($sudski_postupak_id);

$baza->zatvoriDB();
echo json_encode(array("uspio" => true));

