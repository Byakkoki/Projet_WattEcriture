<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/ChapterRead.css" rel="stylesheet">
    <link href="../css/navbar.css" rel="stylesheet">
    <title>Chapter Read</title>
</head>
<body>
<header id="navbar">
    <a href="https://majinbu-3000.ecole-404.com/main.php" id="home"><img src="../assets/page-daccueil.png"></a>
    <div id="nav-mid">
        <a href="https://majinbu-3000.ecole-404.com/main.php" id="creation">Retour</a>
    </div>
        <div id="nav-right">
            <a href="https://majinbu-3000.ecole-404.com/logout.php" id="connexion">Deconnexion</a>
        </div>
</header>
<?php
    require_once('../API/Guard.php');
    require_once('../API/PDOConnection.php');

        // Ligne qui permet de récuperer seulement l'id dans la barre de recherche
        $url = $_SERVER['REQUEST_URI'];
        $components = parse_url($url);
        parse_str($components['query'], $results);
        //echo($results['id']);

        global $connectionPDO;

        //récupere le chapitre par rapport a l'id chapitre
        $getChapitre = $connectionPDO->prepare('SELECT * FROM `chapitre` WHERE idChapitre="'.$results['id'].'";');
        $getChapitre->execute();
        $getAllChapitre = $getChapitre->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($getAllChapitre as $chapitre){
            echo "<section>";
            echo "<div class='Read'>";
            echo "<div class='name'><h3>".$chapitre['name']."</h3></div>";
            echo "<div class='text'><p>".$chapitre['text']."</p></div>";
            echo "<div class='button'><button class='buttonBack'><a href='https://majinbu-3000.ecole-404.com/story/StoryDetails.php?id=".$chapitre['histoire_idHistoire']."'>Retour</a></button></div>";
            echo "</div>";
            echo "<section>";
        }
?>

<!--
    <section>
        <div class='Read'>
            <div class='name'><h3></h3></div>
            <div class='text'><p></p></div>
            <div class='button'><button class='buttonBack'><a href="https://majinbu-3000.ecole-404.com/main.php">Retour</a></button></div>
        </div>
    </section>
-->

</body>
</html>