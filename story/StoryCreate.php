<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/StoryCreate.css" rel="stylesheet">
    <link href="../css/navbar.css" rel="stylesheet">
    <title>Story Create</title>
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

    require_once('../API/PDOConnection.php');

    if(
        $_POST["title"] != "" &&
        $_POST["description"] != "" 
    ){
        $getUserWithToken = $connectionPDO->prepare('SELECT * FROM `user` WHERE token LIKE :token;');
        $getUserWithToken->execute(["token" => $_COOKIE["WP-Auth-Token"]]);
        $user = $getUserWithToken->fetch(PDO::FETCH_ASSOC);
        //print_r($user);
        //die;

        $insertStory = $connectionPDO->prepare('INSERT INTO `histoire` (idHistoire, user_idUser, name, description) VALUES (:idHistoire, :idUser, :Title, :Description);');
        $insertStory->execute(["idHistoire" => v4(), "idUser" => $user["idUser"], "Title" => $_POST["title"], "Description" => $_POST["description"] ]);


        $storyRequest = $insertStory->fetch(PDO::FETCH_ASSOC);
        echo "<script>alert(\"Your Story has been created\")</script>";

        //print_r($storyRequest);
        //die;

        //header('Location: https://majinbu-3000.ecole-404.com/main.php');

    }

?>

    <section>
    <form id="create" action="#" method="POST">
            <label for="TitleHistoire">Titre de l'Histoire :</label>
            <textarea type="text" name="title" class="p input" required></textarea>
            <label for="DescHistoire">Description de l'Histoire :</label>
            <textarea id="Desc" type="text" name="description" class="p input" required></textarea>
            <input type="submit" value="Sauvegarder" id="connectButton">
        </form>
    </section>

</body>
</html>