<?php

include 'fonctions.php';

    $res = $pdo->query("SELECT * FROM personne");

    

    $personnes = [];

    while($r = $res->fetch(PDO::FETCH_ASSOC)){
        extract($r);
        $personne = new Personne($id, $prenom, $nom, $age, $ville);
        $personnes[] = $personne;
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

    <a href="addPerso.php">Ajouter</a>
    
    <?php foreach($personnes as $personne): ?>
        <div> <?= $personne->getPrenom(); ?> </div>
    <?php endforeach; ?>

</body>
</html>