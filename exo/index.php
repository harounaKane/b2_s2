<?php

include "Personne.php";
include "Livre.php";
include "Biblio.php";

$b1 = new Biblio("Paris 13");

$l1 = new Livre(158655, 250, new Personne("Julie"), "ILCI");
$l2 = new Livre(555742, 250, new Personne("Jaques"), "ILCI");
$l3 = new Livre(158655, 250, new Personne("Toto"), "ILCI");


$b1->ajouter($l1);
$b1->ajouter($l2);


echo "collection des livres de la biblio de la ville de " . $b1->getVille();

foreach($b1->getLivres() as $livre){
    echo "livre numéro " . $livre->getNumero() .', page: ' . $livre->getNbrePage() ." dont l'auteur est: " .$livre->getAuteur()->getPrenom()."<br>";
}


if( $b1->retirer(158655) ){
    echo "le livre xxx de la ville de " . $b1->getVille() . " est supprimé";
    var_dump($b1);
}else{
    echo "aucun livre ne correspond à ce numéro: xxx";
}

