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



    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $idHistoire = v4();

        $getUserWithToken = $connectionPDO->prepare('SELECT * FROM `user` WHERE token LIKE :token;');
        $getUserWithToken->execute(["token" => $_COOKIE["WP-Auth-Token"]]);
        $user = $getUserWithToken->fetch(PDO::FETCH_ASSOC);

        $insertStory = $connectionPDO->prepare('INSERT INTO `histoire` (idHistoire, user_idUser, name, description) VALUES (:idHistoire, :idUser, :Title, :Description);');
        $insertStory->execute(["idHistoire" => $idHistoire, "idUser" => $user["idUser"], "Title" => $_POST["title"], "Description" => $_POST["description"] ]);
        $storyRequest = $insertStory->fetch(PDO::FETCH_ASSOC);


        $case_1 = $_POST["amour"];
        $case_2 = $_POST["aventure"];
        $case_3 = $_POST["action"];
        $case_4 = $_POST["policier"];
        $case_5 = $_POST["sciencefiction"];
        $case_6 = $_POST["fantaisie"];
        if(isset($case_1))
        { 
            $insertAmour = $connectionPDO->prepare('INSERT INTO `histoire_has_categorie` (categorie_idHistoire, categorie_idCategorie) VALUES (:idHistoire, :idCategorie);');
            $insertAmour->execute(["idHistoire" => $idHistoire, "idCategorie" => "7c7bfe7e-cf2a-419d-83e8-976572690b86"]);
            $amourRequest = $insertAmour->fetch(PDO::FETCH_ASSOC); 
        }  
        if (isset($case_2))
        { 
            $insertAventure = $connectionPDO->prepare('INSERT INTO `histoire_has_categorie` (categorie_idHistoire, categorie_idCategorie) VALUES (:idHistoire, :idCategorie);');
            $insertAventure->execute(["idHistoire" => $idHistoire, "idCategorie" => "9516fc9f-de3d-4514-94b4-2716c29e137f"]);
            $aventureRequest = $insertAventure->fetch(PDO::FETCH_ASSOC); 
        }
        if (isset($case_3))
        { 
            $insertAction = $connectionPDO->prepare('INSERT INTO `histoire_has_categorie` (categorie_idHistoire, categorie_idCategorie) VALUES (:idHistoire, :idCategorie);');
            $insertAction->execute(["idHistoire" => $idHistoire, "idCategorie" => "6f3ad7dd-9e41-464e-a269-197da05f50e2"]);
            $actionRequest = $insertAction->fetch(PDO::FETCH_ASSOC); 
        }
        if (isset($case_4))
        { 
            $insertPolice = $connectionPDO->prepare('INSERT INTO `histoire_has_categorie` (categorie_idHistoire, categorie_idCategorie) VALUES (:idHistoire, :idCategorie);');
            $insertPolice->execute(["idHistoire" => $idHistoire, "idCategorie" => "590cf38f-eac0-4a9f-b933-393fbd3af8a3"]);
            $policeRequest = $insertPolice->fetch(PDO::FETCH_ASSOC);
        }
        if (isset($case_5))
        { 
            $insertScienceFiction = $connectionPDO->prepare('INSERT INTO `histoire_has_categorie` (categorie_idHistoire, categorie_idCategorie) VALUES (:idHistoire, :idCategorie);');
            $insertScienceFiction->execute(["idHistoire" => $idHistoire, "idCategorie" => "e85a912e-3af1-45c3-a411-d015d845f0a0"]);
            $ScienceFictionRequest = $insertScienceFiction->fetch(PDO::FETCH_ASSOC);
        }
        if (isset($case_6))
        { 
            $insertFantaisie = $connectionPDO->prepare('INSERT INTO `histoire_has_categorie` (categorie_idHistoire, categorie_idCategorie) VALUES (:idHistoire, :idCategorie);');
            $insertFantaisie->execute(["idHistoire" => $idHistoire, "idCategorie" => "7e1860d2-4ada-4e49-836d-19144bae2483"]);
            $fantaisieRequest = $insertFantaisie->fetch(PDO::FETCH_ASSOC); 
        }

        header('Location: https://majinbu-3000.ecole-404.com/main.php');
    }

?>

    <section>
    <form id="create" action="#" method="POST">
        <label for="TitleHistoire">Titre de l'Histoire :</label>
        <textarea type="text" name="title" class="p input" required></textarea>
        <label for="DescHistoire">Description de l'Histoire :</label>
        <textarea id="Desc" type="text" name="description" class="p input" required></textarea>
        <div class='categorie'>
            <div class='choice'>
                <h2>Choissisez les catégorie de votre Story</h2>
            </div>
            <div class='srcchoice'>
                <img classe='cube' src="https://media.discordapp.net/attachments/685246708807893037/928181892052815892/romantique.png">
                <img classe='cube' src="https://media.discordapp.net/attachments/685246708807893037/928182194327912458/aventure.png">
                <img classe='cube' src="https://media.discordapp.net/attachments/685246708807893037/928182289228251186/gens.png">
                <img classe='cube' src="https://media.discordapp.net/attachments/685246708807893037/928182410405883934/policier.png">
                <img classe='cube' src="https://media.discordapp.net/attachments/685246708807893037/928182509957685258/science-fiction.png">
                <img classe='cube' src="https://media.discordapp.net/attachments/685246708807893037/928182576429015060/fantaisie.png">
            </div>
            <div class='checkboxchoice'>
                <div class="deleteCheckbox"><input  type="checkbox" name="amour"></div>
                <div class="deleteCheckbox"><input  type="checkbox" name="aventure"></div>
                <div class="deleteCheckbox"><input  type="checkbox" name="action"></div>
                <div class="deleteCheckbox"><input  type="checkbox" name="policier"></div>
                <div class="deleteCheckbox"><input  type="checkbox" name="sciencefiction"></div>
                <div class="deleteCheckbox"><input  type="checkbox" name="fantaisie"></div>
            </div>
        </div>
        <input type="submit" value="Sauvegarder" id="connectButton">
    </form>
</section>

</body>
</html>