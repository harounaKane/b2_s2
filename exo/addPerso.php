<?php

    include "classes/Personne.php";

    $pdo = new PDO("mysql:host=127.0.0.1;dbname=b2_biblio", "root", "");

   if( isset($_POST['prenom']) ){
        extract($_POST);

        // ON crée une instance PERSONNE
        $p = new Personne(0, $prenom, $nom, $age, $ville);

        $query = "INSERT INTO personne (prenom, nom, age, ville) VALUES(:prenom, :nom, :age, :ville)";

        $stmt = $pdo->prepare($query);

        $stmt->execute([
            "prenom"    => $p->getPrenom(),
            "nom"       => $p->getNom(),
            "age"       => $p->getAge(),
            "ville"     => $p->getVille(),
        ]);

        header("location: personne.php");
        exit;
   }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <nav>
        <a href="personne.php">Personne</a>
        <a href="livre.php">Livre</a>
        <a href="biblio.php">Bibliothèque</a>
    </nav>

    <h1>Ajouter un auteur</h1>

    <form action="" method="post">
        <div>
            <label for="">Prénom</label>
            <input type="text" name="prenom">
        </div>
        <div>
            <label for="">Nom</label>
            <input type="text" name="nom">
        </div>
        <div>
            <label for="">Âge</label>
            <input type="number" name="age">
        </div>
        <div>
            <label for="">Ville</label>
            <input type="text" name="ville">
        </div>

        <input type="submit">
    </form>
    
</body>
</html>