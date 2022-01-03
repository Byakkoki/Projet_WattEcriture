<link href="../css/navbar.css" rel="stylesheet">
<header id="navbar">
    <a href="https://majinbu-3000.ecole-404.com/main.php" id="home"><img src="../assets/page-daccueil.png"></a>
    <div id="nav-mid">
        <a href="story/StoryCreate.php" id="creation">CREER</a>
    </div>
        <div id="nav-right">
            <a href="https://majinbu-3000.ecole-404.com/logout.php" id="connexion">Deconnexion</a>
        </div>
</header>


<?php

    if($_COOKIE["WP-Auth-Token"] == null){
        header('Location: https://majinbu-3000.ecole-404.com/index.php');
    }

    if($_SERVER['REQUEST_URI'] == './story/StoryDetails.php') {
        echo "<script>alert(\"Tes sur la bonne page\")</script>";
    }