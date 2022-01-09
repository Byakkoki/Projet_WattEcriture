<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/StoryUpdate.css" rel="stylesheet">
    <link href="../css/navbar.css" rel="stylesheet">
    <title>Story Update</title>
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

    <section>
        <div class='base'>
        <?php
            require_once('../API/Guard.php');
            require_once('../API/PDOConnection.php');

            // Ligne qui permet de récuperer seulement l'id dans la barre de recherche
            $url = $_SERVER['REQUEST_URI'];
            $components = parse_url($url);
            parse_str($components['query'], $results);
            //echo($results['id']);
        
            global $connectionPDO;

            $getStory = $connectionPDO->prepare('SELECT * FROM `histoire` WHERE idHistoire="'.$results['id'].'";');
            $getStory->execute();
            $getOneStory = $getStory->fetch(PDO::FETCH_ASSOC);

            $desc = $getOneStory['description'];

            
            echo("<div class='baseStoryName'>");
            echo("<div class='storyName'>".$getOneStory['name']."</div>");
            echo("</div>");
            echo("<form method='POST'>");
            echo("<textarea type='text' required name='modif'>".$desc."</textarea>");
            echo("<div class='button'><input type='submit' value='Modifier votre Description' class='buttonBack'></div>");
            echo("</form>");

            if(
                $_POST["modif"] == ""
            ){

            }else{
                global $connectionPDO;
    
                $updateStory = $connectionPDO->prepare("UPDATE `histoire` SET `description`='".$_POST['modif']."' WHERE idHistoire='".$results['id']."'");
                $updateStory->execute();

                header('Location: https://majinbu-3000.ecole-404.com/story/StoryDetails.php?id='.$results['id'].'');
            }

            
        ?>
        </div>
    </section>

</body>
</html>