<?php

include "Personne.php";
include "Livre.php";

$pdo = new PDO("mysql:host=localhost;dbname=b2_intro", "root", "");

if( !empty($_POST['prenom']) ){

    
    $p = new Personne($_POST['prenom'], $_POST['nom'], $_POST['age'], $_POST['ville']);

    //$query = "INSERT INTO personne VALUES(?, ?, ?, ?)";
    $query = "INSERT INTO personne VALUES(:prenom, :nom, :age, :city)";

    $statement = $pdo->prepare($query);

    $statement->execute([
        "prenom" => $p->getPrenom(),
        "nom" => $p->getNom(),
        "age" => $p->getAge(),
        "city" => $p->getVille(),
    ]);
    
    header("location: listePersonne.php");
    exit;
}
