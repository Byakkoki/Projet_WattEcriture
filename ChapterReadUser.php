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
    <a href="https://majinbu-3000.ecole-404.com/index.php" id="home"><img src="../assets/page-daccueil.png"></a>
    <div id="nav-mid">
        <a href="https://majinbu-3000.ecole-404.com/index.php" id="creation">Retour</a>
    </div>
</header>
<?php

    // Appel l'API
    require_once("./API/Controller/ChapterReadUserController.php");

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