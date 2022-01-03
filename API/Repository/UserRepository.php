<?php
/**
 * Ici on vas gerere le contact avec la base. Houston ?
 */
// on récupere l connection PDO
require_once("./API/PDOConnection.php");
// $connectionPDO = new PDO('mysql:host=localhost;dbname=dlardpou;charset=utf8', 'phpmyadmin', 'nath14PMA');

//Function qui récupère un user par rapport au token du cookie
function getOneUserByToken($token){
    global $connectionPDO;

    $allRequest = $connectionPDO->prepare('SELECT * FROM `user` WHERE token="'.$token.'";');
    $allRequest->execute();
    $data = $allRequest->fetch(PDO::FETCH_ASSOC); // LA DATA EST BRUT !
    
    return $data;
}