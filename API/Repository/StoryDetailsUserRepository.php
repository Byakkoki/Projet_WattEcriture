<?php

function getOneStory($id){
    global $connectionPDO;

    $getChapitre = $connectionPDO->prepare('SELECT * FROM `chapitre` WHERE histoire_idHistoire="'.$id.'";');
    $getChapitre->execute();
    $getAllChapitre = $getChapitre->fetchAll(PDO::FETCH_ASSOC);
    
    //print_r($getOneStory);
    //print_r($getAllChapitre);
    //die;

    foreach($getAllChapitre as $chapter){
        echo "<div class='chapitre'>";
        echo "<div class='nameChapter'>";
        echo "<h3>";
        echo $chapter["name"];
        echo "<h3>";
        echo "</div>";
        echo "<div class='buttonChapter'>";
        echo "<button class='buttonRead'><a href='https://majinbu-3000.ecole-404.com/ChapterReadUser.php?id=".$chapter["idChapitre"]."'>Read</a></button>";
        echo "</div>";
        echo "</div>";
    }
}