<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/index.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <title>Accueil</title>
</head>
<body>
    <?php require_once("navbarlogin.html"); ?>




<div id="container">
    <?php
    require_once('./API/Guard.php');
    require_once('./API/PDOConnection.php');

    verifyToken("ROLE_ADMIN");
    //Function pour les ROLE_USER pour avoir seulement leur histoire
    function getStory(){
        global $connectionPDO;

        $getUserWithToken = $connectionPDO->prepare('SELECT * FROM `user` WHERE token LIKE :token;');
        $getUserWithToken->execute(["token" => $_COOKIE["WP-Auth-Token"]]);
        $user = $getUserWithToken->fetch(PDO::FETCH_ASSOC);


        $getStory = $connectionPDO->prepare('SELECT * FROM `histoire` WHERE user_idUser LIKE :idUser;');
        $getStory->execute(["idUser" => $user["idUser"]]);
        $getStoryUser = $getStory->fetchAll(PDO::FETCH_ASSOC);

        foreach($getStoryUser as $story){
            echo "<div class='histoire'>";

            echo "<div class='caseName'>";
            echo "<h2>";
            echo $story['name'];
            echo "</h2>";
            echo "</div>";

            echo "<div class='caseDesc'>";
            echo "<p>";
            echo $story['description'];
            echo "</p>";
            echo "</div>";

            echo "<form class='caseButton'>";
            echo "<input type='submit' class='button1' value='Liste des Chapitre'></input>";
            echo "<input type='submit' class='button2' value='Modifier'></input>";
            echo "</form>";

            echo "</div>";
        }
        //print_r($getStoryUser);
        //die;
    }
    //Function pour le ROLE_ADMIN qui permet d'avoir toute les histoire
    function getAllStory(){
        global $connectionPDO;

        $getAllStory = $connectionPDO->prepare('SELECT * FROM `histoire`');
        $getAllStory->execute();
        $getStory = $getAllStory->fetchAll(PDO::FETCH_ASSOC);

        foreach($getStory as $story){
            echo "<div class='histoire'>";
            echo "<div class='caseName'>";
            echo "<h2>";
            echo $story['name'];
            echo "</h2>";
            echo "</div>";
            echo "<div class='caseDesc'>";
            echo "<p>";
            echo $story['description'];
            echo "</p>";
            echo "</div>";
            echo "<form class='caseButton'>";
            echo "<input type='submit' class='button1' value='Liste des Chapitre'></input>";
            echo "<input type='submit' class='button2' value='Modifier'></input>";
            echo "</form>";
            echo "</div>";
        }

        //print_r($getStory);
        //die;

    }
    function getOneUserByToken($token){
        global $connectionPDO;
    
        $allRequest = $connectionPDO->prepare('SELECT * FROM `user` WHERE token="'.$token.'";');
        $allRequest->execute();
        $data = $allRequest->fetch(PDO::FETCH_ASSOC); // LA DATA EST BRUT !
        
        return $data;
    }

    ?>
        <!--
        <div class="histoire">
            <div class="caseName"><h2>Les 101 Byakko</h2></div>
            <div class="caseDesc"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed scelerisque ex lacus. Suspendisse potenti. Sed molestie nisi eget porttitor lobortis. Vivamus non libero ut dui elementum interdum. Praesent in ultrices tortor. Aliquam vitae tincidunt dui, in sagittis justo. Mauris non massa sit amet diam aliquet cursus id et libero. Curabitur nibh felis, fringilla ut diam sit amet, fermentum pulvinar velit. Praesent nec sem dictum, hendrerit nunc vel, suscipit felis. Praesent scelerisque a arcu varius ultrices. Sed fringilla massa urna, vel euismod lacus cursus nec. In porta eu metus et commodo. Donec rutrum faucibus arcu. Integer sollicitudin ipsum sem, non luctus eros blandit sed. In tincidunt odio arcu, nec iaculis neque eleifend quis. Nam dictum lectus sem, eu pretium ligula lobortis ac.</p></div>
            <form class="caseButton">
                <input type="submit" class="button1" value="Liste des Chapitre"></input>
                <input type="submit" class="button2" value="Modifier"></input>
            </form>
        </div>
        -->
</div>
</body>
</html>