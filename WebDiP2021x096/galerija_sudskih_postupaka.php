<?php

$naslov = "Galerija sudskih postupaka";

$direktorij = getcwd();
$putanja = dirname($_SERVER["REQUEST_URI"]);

include_once "$direktorij/zaglavlje.php";

$smarty->display("galerija_sudskih_postupaka.tpl");
$smarty->display("podnozje.tpl");
