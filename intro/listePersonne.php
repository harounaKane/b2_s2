<?php

include "Personne.php";

$pdo = new PDO("mysql:host=localhost;dbname=b2_intro", "root", "");

// test si $_GET['action']
if( isset($_GET['action']) ){

    // si action == up => recup infos de la ligne à modifier
    if( $_GET['action'] == 'up' ){
        
        // récuperation de la ligne pour afficher au formulaire
        $stmt = $pdo->prepare("SELECT * FROM personne where prenom = :pr");
        $stmt->execute(["pr" => $_GET['id']]);

        $res = $stmt->fetch();

        $personneUp = new Personne($res['prenom'], $res['nom'], $res['age'], $res['ville']);

        // si le formulaire pour modificartion est sumis
        if( isset($_POST['age']) ){
            $stmt = $pdo->prepare("UPDATE personne SET age = :age, ville = :ville WHERE prenom = :prenom");

            $stmt->execute([
                "age"   => $_POST['age'],
                "ville"  => $_POST['ville'],
                "prenom"   => $_GET['id'],
            ]);

            header("location: listePersonne.php");
            exit;
        }
        // si action == del => supprime la ligne sur laquelle on a cliqué
    }else if( $_GET['action'] == 'del' ){
        $stmt = $pdo->prepare("DELETE FROM personne WHERE prenom = ?");
        $stmt->execute([$_GET['id']]);

        header("location: listePersonne.php");
        exit;
    }

}

// recup toutes les lignes de la table PERSONNE
$statement = $pdo->prepare("SELECT * FROM personne");

$statement->execute();

// on prépare un tableau vide
$tab = []; 

// à chaque itération, fetch() renvoie une ligne dans '$p'
while($p = $statement->fetch(PDO::FETCH_ASSOC)){
    $personne = new Personne($p['prenom'], $p['nom'], $p['age'], $p['ville']);

    // ajout de l'objet '$personne' dans le tableau '$tab'
    $tab[] = $personne;
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

    <h1>Liste de personnes</h1>

    <table>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Age</th>
            <th>Ville</th>
            <th>Actions</th>
        </tr>

        <!-- parcour du tableau '$tab' as '$personne' => un objet personne -->
        <?php foreach($tab as $personne): ?>
            <tr>
                <td> <?= $personne->getPrenom() ?> </td>
                <td> <?= $personne->getNom() ?> </td>
                <td> <?= $personne->getAge() ?> </td>
                <td> <?= $personne->getVille() ?> </td>
                <td>
                    <a href="?action=up&id=<?= $personne->getPrenom() ?>">U</a> | 
                    <a href="?action=del&id=<?= $personne->getPrenom() ?>">X</a>
                </td>
            </tr>
        <?php endforeach;?>

    </table>

    <!-- si la variable (instance personne) personneUp existe, on affiche le formulaire -->
    <?php if( isset($personneUp) ): ?>
        <form action="" method="post">      
            <label for="">Age</label>
            <input type="text" name="age" value="<?= $personneUp->getAge()?>"> <br><br>
            <label for="">Ville</label>
            <input type="text" name="ville" value="<?= $personneUp->getVille() ?>"> <br><br>    

            <input type="submit">
        </form>
    <?php endif; ?>
    
</body>
</html>