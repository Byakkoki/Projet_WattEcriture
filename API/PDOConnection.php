<?php

//permet de se connecter a la BDD
$connectionPDO = new PDO('mysql:host=localhost;dbname=wattecriture;charset=utf8', 'phpmyadmin', 'password');

//Function permettant de créer un UUID V4
function v4() {
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
      mt_rand(0, 0xffff), mt_rand(0, 0xffff),
      mt_rand(0, 0xffff),
      mt_rand(0, 0x0fff) | 0x4000,
      mt_rand(0, 0x3fff) | 0x8000,
      mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
  }