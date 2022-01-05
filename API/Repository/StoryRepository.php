<?php

function getAllStory(){
    global $connectionPDO;

    $getAllStory = $connectionPDO->prepare('SELECT `Pseudo`, `idHistoire`, `user_idUser`, `name`, `description` FROM `histoire` JOIN user ON user_idUser = idUser;');
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
        echo "<button class='button1'><a href='https://majinbu-3000.ecole-404.com/StoryDetailsUser.php?id=".$story["idHistoire"]."'>Liste des Chapitre</a></button>";
        echo "</form>";
        echo "<div class='auteur'>";
        echo "<h2>Auteur : ".$story['Pseudo']."";
        echo "</div>";
        echo "</div>";
    }
}