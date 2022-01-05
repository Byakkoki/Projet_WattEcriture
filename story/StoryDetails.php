<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/StoryDetails.css" rel="stylesheet">
    <link href="../css/navbar.css" rel="stylesheet">
    <title>Story Details</title>
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

<div class="container">
<?php

    require_once('../API/Guard.php');
    require_once('../API/PDOConnection.php');

    // Ligne qui permet de récuperer seulement l'id dans la barre de recherche
    $url = $_SERVER['REQUEST_URI'];
    
    $components = parse_url($url);
    parse_str($components['query'], $results);
    //echo($results['id']); 

    getOneStory($results['id']);

    function getAllStory(){
        global $connectionPDO;

        $getStory = $connectionPDO->prepare('SELECT * FROM `histoire`');
        $getStory->execute();
        $getAllStory = $getStory->fetch(PDO::FETCH_ASSOC);

        return $getAllStory;
    }

    function getOneStory($id){
        global $connectionPDO;
    
        $getStory = $connectionPDO->prepare('SELECT * FROM `histoire` WHERE idHistoire="'.$id.'";');
        $getStory->execute();
        $getOneStory = $getStory->fetchAll(PDO::FETCH_ASSOC);

        $getChapitre = $connectionPDO->prepare('SELECT * FROM `chapitre` WHERE histoire_idHistoire="'.$id.'";');
        $getChapitre->execute();
        $getAllChapitre = $getChapitre->fetchAll(PDO::FETCH_ASSOC);
        
        //print_r($getOneStory);
        //die;
        foreach($getOneStory as $story)
            echo "<div class='story'>";
            echo "<div class='caseName'><h2>".$story['name']."</h2></div>";

            echo "<div class='caseDesc'>";
            echo "<p>";
            echo $story["description"];
            echo "</p>";
            echo "</div>";

            echo "<form class='caseButton'>";
            echo "<button class='button1'><a href='https://majinbu-3000.ecole-404.com/story/StoryUpdate.php?id=".$id."''>Modifier</a></button>";
            echo "<button class='button2'><a href='https://majinbu-3000.ecole-404.com/story/StoryDelete.php?id=".$id."''>Supprimer</a></button>";
            echo "</form>";
            echo "</div>";

            echo "<div class='chapter'>";
            echo "<div class='list'><h2>Liste des Chapitre</h2><button class='buttonlist'><a href='https://majinbu-3000.ecole-404.com/story/ChapterCreate.php?id=".$id."'>Nouveau Chapitre</a></button></div>";
            echo "<div class='chapterlist'>";


            foreach($getAllChapitre as $chapter){
                echo "<div class='chapitre'>";
                echo "<div class='nameChapter'>";
                echo "<h3>";
                echo $chapter["name"];
                echo "<h3>";
                echo "</div>";
                echo "<div class='buttonChapter'>";
                echo "<button class='buttonRead'><a href='https://majinbu-3000.ecole-404.com/story/ChapterRead.php?id=".$chapter["idChapitre"]."'>Read</a></button>";
                echo "<button class='buttonUpdate'><a href='https://majinbu-3000.ecole-404.com/story/ChapterUpdate.php?id=".$chapter["idChapitre"]."'>Update</a></button>";
                echo "<button class='buttonDelete'><a href='https://majinbu-3000.ecole-404.com/story/ChapterDelete.php?id=".$chapter["idChapitre"]."'>Delete</a></button>";
                echo "</div>";


            }
        }
?>

</div>

</body>
</html>