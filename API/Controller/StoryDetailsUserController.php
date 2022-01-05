<?php
/**
 * Gestion de la requetes et des differentes routes / methodes
 */
$METHOD = $_SERVER['REQUEST_METHOD'];

// On récuere toutes les methodes qui servent à communiquer avec la bdd

require_once('./API/PDOConnection.php');
require_once('./API/Repository/StoryDetailsUserRepository.php');
require_once('./API/Guard.php');

switch($METHOD){
    case "GET":
        $url = $_SERVER['REQUEST_URI'];
        $components = parse_url($url);
        parse_str($components['query'], $results);
        
        //echo($results['id']); 
        //die;

        getOneStory($results['id']);
        break;
    
}

function sendResponse($code, $message){
    header('Content-Type: application/json; charset=utf-8');
    http_response_code($code);
    echo json_encode($message);
}