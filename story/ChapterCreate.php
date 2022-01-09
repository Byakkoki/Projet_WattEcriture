<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/StoryCreate.css" rel="stylesheet">
    <link href="../css/navbar.css" rel="stylesheet">
    <title>Chapter Create</title>
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
    
    if(
        $_POST["title"] != "" &&
        $_POST["description"] != "" 
    ){

        // Recupere la valeur id
        $components = parse_url($url);
        parse_str($components['query'], $results);
        createChapter($results['id']);
    }

    // Créer un Chapitre
    function createChapter($id){
        global $connectionPDO;

        $getStory = $connectionPDO->prepare('SELECT * FROM `histoire` WHERE idHistoire="'.$id.'";');
        $getStory->execute();
        $getOneStory = $getStory->fetchAll(PDO::FETCH_ASSOC);

        // Créer le chapitre par rapport a l'id de l'histoire
        $insertChapter = $connectionPDO->prepare('INSERT INTO `chapitre`(`idChapitre`, `histoire_idHistoire`, `name`, `text`) VALUES (:idChapitre, :idHistoire, :Name, :Text);');
        $insertChapter->execute(["idChapitre" => v4(), "idHistoire" => $id, "Name" => $_POST["title"], "Text" => $_POST["description"] ]);
        $chapterRequest = $insertChapter->fetch(PDO::FETCH_ASSOC);

        // Renvoie le user dans la page de details de son Histoire
        header('Location: https://majinbu-3000.ecole-404.com/story/StoryDetails.php?id='.$id.'');

    }

?>

    <section>
    <form id="create" action="#" method="POST">
            <label for="TitleChapitre">Titre du Chapitre :</label>
            <textarea type="text" name="title" class="p input" required></textarea>
            <label for="DescChapitre">Chapitre :</label>
            <textarea id="Desc" type="text" name="description" class="p input" required></textarea>
            <input type="submit" value="Sauvegarder" id="connectButton">
        </form>
    </section>

</body>
</html>