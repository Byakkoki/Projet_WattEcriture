<?php
/**
 * Ici on vas gerere le contact avec la base. Houston ?
 */
// on récupere l connection PDO
// $connectionPDO = new PDO('mysql:host=localhost;dbname=dlardpou;charset=utf8', 'phpmyadmin', 'nath14PMA');

//Function pour les ROLE_USER pour avoir seulement leur histoire
function getStory(){
    global $connectionPDO;

    $getUserWithToken = $connectionPDO->prepare('SELECT * FROM `user` WHERE token LIKE :token;');
    $getUserWithToken->execute(["token" => $_COOKIE["WP-Auth-Token"]]);
    $user = $getUserWithToken->fetch(PDO::FETCH_ASSOC);


    $getStory = $connectionPDO->prepare('SELECT * FROM `histoire` WHERE user_idUser LIKE :idUser;');
    $getStory->execute(["idUser" => $user["idUser"]]);
    $getStoryUser = $getStory->fetchAll(PDO::FETCH_ASSOC);

    print_r($getStoryUser);
    die;
}
//Function pour le ROLE_ADMIN qui permet d'avoir toute les histoire
function getAllStory(){
    global $connectionPDO;

    $getAllStory = $connectionPDO->prepare('SELECT * FROM `histoire`');
    $getAllStory->execute();
    $getStory = $getAllStory->fetchAll(PDO::FETCH_ASSOC);

    print_r($getStory);
    die;
}