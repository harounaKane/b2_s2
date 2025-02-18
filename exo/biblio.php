<?php

include 'fonctions.php';


   if( isset($_POST['ville']) ){
        extract($_POST);

        // ON crée une instance PERSONNE
        $b = new Biblio(0, $ville);

        $query = "INSERT INTO biblio (ville) VALUES(:ville)";

        $stmt = $pdo->prepare($query);

        $stmt->execute([
            "ville"     => $b->getVille(),
        ]);

        header("location: biblio.php");
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

    <h1>Ajouter une bibliothèque</h1>

    <form action="" method="post">
        <div>
            <label for="">Ville</label>
            <input type="text" name="ville">
        </div>
      

        <input type="submit">
    </form>
    
</body>
</html>