<?php

$naslov = "Rang lista odvjetnika";

$direktorij = getcwd();
$putanja = dirname($_SERVER["REQUEST_URI"]);

include_once "$direktorij/zaglavlje.php";

$smarty->display("rang_lista_odvjetnika.tpl");
$smarty->display("podnozje.tpl");
