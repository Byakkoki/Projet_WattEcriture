<?php

function getChapitre($id){
    global $connectionPDO;

    $getChapitre = $connectionPDO->prepare('SELECT * FROM `chapitre` WHERE idChapitre="'.$id.'";');
    $getChapitre->execute();
    $getAllChapitre = $getChapitre->fetchAll(PDO::FETCH_ASSOC);
        
    foreach($getAllChapitre as $chapitre){
        echo "<section>";
        echo "<div class='Read'>";
        echo "<div class='name'><h3>".$chapitre['name']."</h3></div>";
        echo "<div class='text'><p>".$chapitre['text']."</p></div>";
        echo "<div class='button'><button class='buttonBack'><a href='https://majinbu-3000.ecole-404.com/index.php'>Retour</a></button></div>";
        echo "</div>";
        echo "<section>";
    }
}