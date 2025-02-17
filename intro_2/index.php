<?php

include "Compte.php";
include "Personne.php";

$c1 = new Compte(4000, new Personne("toto", "tata", 35, "Mopti"));
$c2 = new Compte(20000.0, new Personne("toto", "tata", 35, "Mopti"));


var_dump($c1);
var_dump($c2);