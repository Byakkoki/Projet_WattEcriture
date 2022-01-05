<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/StoryDetailsUser.css" rel="stylesheet">
    <link href="../css/navbar.css" rel="stylesheet">
    <title>Story Details</title>
</head>
<body>
<header id="navbar">
    <a href="https://majinbu-3000.ecole-404.com/index.php" id="home"><img src="../assets/page-daccueil.png"></a>
    <div id="nav-mid">
        <a href="https://majinbu-3000.ecole-404.com/index.php" id="creation">Retour</a>
    </div>
        <div id="nav-right">
            <a href="https://majinbu-3000.ecole-404.com/logout.php" id="connexion">Deconnexion</a>
        </div>
</header>

<div class="container">
    <div class='chapter'>
    <div class='list'><h2>Liste des Chapitre</h2></div>
    <div class='chapterlist'>
<?php

    require_once("./API/Controller/StoryDetailsUserController.php");

?>
    </div>
    </div>

</div>

</body>
</html>