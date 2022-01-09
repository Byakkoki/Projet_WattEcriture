<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/ChapterUpdate.css" rel="stylesheet">
    <link href="../css/navbar.css" rel="stylesheet">
    <title>Chapter Update</title>
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

        //recupere le chapitre par rapport a l'id chapitre
        $getChapitre = $connectionPDO->prepare('SELECT * FROM `chapitre` WHERE idChapitre="'.$results['id'].'";');
        $getChapitre->execute();
        $getAllChapitre = $getChapitre->fetch(PDO::FETCH_ASSOC);

        echo "<form method='POST'>";
        echo "<div class='Update'>";
        echo("<div class='UpdateName'><textarea type='text' class='ChapterName' name='modif'>".$getAllChapitre['name']."</textarea></div>");
        echo "<div class='UpdateText'><textarea type='text' class='ChapterText' name='modif2'>".$getAllChapitre['text']."</textarea></div>";
        echo("<div class='button'><input type='submit' value='Modifier votre Chapitre' class='buttonBack'></div>");
        echo "</div>";
        echo "<form>";



        if(
            $_POST["modif"] == "" &&
            $_POST["modif2"] == "" 
        ){
    }else{

        global $connectionPDO;
    
        // Update de la BDD avec les nouvelle valeur
        $updateChapter = $connectionPDO->prepare("UPDATE `chapitre` SET `name`='".$_POST['modif']."', `text`='".$_POST['modif2']."' WHERE idChapitre='".$results['id']."'");
        $updateChapter->execute();

        header('Location: https://majinbu-3000.ecole-404.com/story/StoryDetails.php?id='.$getAllChapitre['histoire_idHistoire'].'');
    }


?>

<!--
    <form method='POST'>
        <div class='Update'>
            <div class='name'><input type='text' classe='ChapterName' name='modifName' value=''></div>
            <div class='text'><input type='text' class='ChapterText' name='modifText' value=''></div>
            <div class='button'><button class='buttonBack'><a href="https://majinbu-3000.ecole-404.com/main.php">Modifier</a></button></div>
        </div>
    </form>
-->

</body>
</html>