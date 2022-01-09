<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/ChapterDelete.css" rel="stylesheet">
    <link href="../css/navbar.css" rel="stylesheet">
    <title>Chapter Delete</title>
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

    if (isset($_POST['check'])){
        // Ligne qui permet de récuperer seulement l'id dans la barre de recherche
        $url = $_SERVER['REQUEST_URI'];
        $components = parse_url($url);
        parse_str($components['query'], $results);
        //echo($results['id']);
    
        global $connectionPDO;

        //Supprime le chapitre par rapport a l'id de l'id chapitre
        $sql = 'DELETE FROM `chapitre`';
        $sql .= ' WHERE `idChapitre`="'.$results['id'].'";';
        $allRequest = $connectionPDO->prepare($sql);
        $allRequest->execute();

        echo "<script>alert(\"Your Chapter has been deleted !\")</script>";
        header('Location: https://majinbu-3000.ecole-404.com/story/StoryDetails.php?id='.$allRequest['histoire_idHistoire'].'');

    }else{

    }
?>

<section>
        <form id="deleteChapter" action="#" method="POST">
            <div class="deleteTop"><h1>Supprimer la Story</h1></div>
            <div class="deleteMid">
                <div class="deleteText"><h1>Je confirme vouloir supprimer ma Story</h1></div>
                <div class="deleteCheckbox"><input id="checkbox" type="checkbox" name="check" required></div>
                <div class="deleteText"><h1></br>ATTENTION</h1></div>
                <div class="deleteText" class="red"><p></br>Une fois le chapitre supprimer vous ne pourrez plus la récuperer!</p></div>
            </div>
            <div class="deleteBottom">
                <input type="submit" value="Supprimer" class='buttonYes' name="yesButton">
                <button class='buttonBack'><a href='https://majinbu-3000.ecole-404.com/main.php'>Annuler</a></button>
            </div>
        </form>
    </section>

</body>
</html>