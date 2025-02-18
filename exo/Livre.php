<?php

    include 'fonctions.php';

    $res = $pdo->query("SELECT * FROM personne");

    $personnes = [];

    while($r = $res->fetch(PDO::FETCH_ASSOC)){
        extract($r);
        $personne = new Personne($id, $prenom, $nom, $age, $ville);
        $personnes[] = $personne;
    }

    // BIBLIOTHEQUE
    $res = $pdo->query("SELECT * FROM biblio");

    $biblios = [];

    while($r = $res->fetch(PDO::FETCH_ASSOC)){
        extract($r);
        $biblio = new Biblio($id, $ville);
        $biblios[] = $biblio;
    }

    if( isset($_POST['editeur']) ){
        extract($_POST);

        extract(getObjet("personne", $auteur));
        extract(getObjet("biblio", $biblio));
        
        $aut = new Personne($id, $prenom, $nom, $age, $ville);
        $bibl = new Biblio($id, $ville);

        $livre = new Livre(0, $nbrePages, $aut, $editeur, $bibl);

        $query = "INSERT INTO livre (nbrePages, auteur, editeur, biblio) VALUES(:pages, :auteur, :editeur, :biblio)";

        $stmt = $pdo->prepare($query);

        $stmt->execute([
            "pages"    => $livre->getNbrePage(),
            "auteur"   => $livre->getAuteur()->getId(),
            "editeur"  => $livre->getEditeur(),
            "biblio"   => $livre->getBiblio()->getId()
        ]);
    }

    function getObjet($table, $id){
        global $pdo;

        $stmt = $pdo->prepare("SELECT * FROM $table WHERE id = ?");
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
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

    <h1>Ajouter un livre</h1>

    <form action="" method="post">
        <div>
            <label for="">Nombre de pages</label>
            <input type="number" name="nbrePages">
        </div>
        <div>
            <label for="">Editeur</label>
            <input type="text" name="editeur">
        </div>
        <div>
            <label for="">Auteur</label>
            <select name="auteur" id="">
                <?php foreach($personnes as $p): ?>
                    <option value="<?= $p->getId() ?>"> <?= $p->getPrenom() ?> </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="">Bibliotèque</label>
            <select name="biblio" id="">
                <?php foreach($biblios as $biblio): ?>
                    <option value="<?= $biblio->getId() ?>">Bibliothèque de :    <?= $biblio->getVille() ?> </option>
                <?php endforeach; ?>
            </select>
        </div>

        <input type="submit">
    </form>
    
</body>
</html>