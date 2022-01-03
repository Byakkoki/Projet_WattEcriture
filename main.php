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

        //print_r($getStoryUser);
        //die;
    }
    //Function pour le ROLE_ADMIN qui permet d'avoir toute les histoire
    function getAllStory(){
        global $connectionPDO;

        $getAllStory = $connectionPDO->prepare('SELECT * FROM `histoire`');
        $getAllStory->execute();
        $getStory = $getAllStory->fetchAll(PDO::FETCH_ASSOC);

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



<div id="container">
    <div class="histoire">
        <div class="caseName"></div>
        <div class="caseDesc"></div>
        <div class="caseButton"></div>
    </div>
</div>
</body>
</html>