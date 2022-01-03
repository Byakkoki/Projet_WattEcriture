<?php

function verifyToken($role = "ROLE_USER"){

    // print_r($_COOKIE);
    // die;

    if(array_key_exists("WP-Auth-Token", $_COOKIE) != true){
        sendGuardResponse(401, ["message" => "You need to be logged"]);
        die;
    }else{
        $user = getOneUserByToken($_COOKIE["WP-Auth-Token"]);
        if($user == null || $user == false || $user == ""){
            sendGuardResponse(401, ["message" => "You need to be logged"]);
            die;
        }

        $admin = getOneUserByToken($_COOKIE["WP-Auth-Token"]);
        if($admin["role"] == "ROLE_ADMIN"){
            getAllStory();
        }else{
            if($admin["role"] == null){
                sendGuardResponse(401, ["message" => "You have not a ROLE"]);
                die; 
            }else{
                if($admin["role"] == "ROLE_USER"){
                    getStory();
                }
            }
        }
    }
}


function sendGuardResponse($code, $message){
    header('Content-Type: application/json; charset=utf-8');
    http_response_code($code);
    echo json_encode($message);
}