<?php

function getAllStory(){
    global $connectionPDO;

    $getAllStory = $connectionPDO->prepare('SELECT idHistoire, user_idUser, name, description, pseudo, GROUP_CONCAT(`imagePrincipale`) as image FROM histoire
    JOIN user
    ON user.idUser = histoire.user_idUser
    JOIN histoire_has_categorie
    ON histoire.idHistoire = histoire_has_categorie.categorie_idHistoire
    JOIN categorie
    ON histoire_has_categorie.categorie_idCategorie = categorie.idCategorie
    GROUP BY histoire.idHistoire;');
    $getAllStory->execute();
    $getStory = $getAllStory->fetchAll(PDO::FETCH_ASSOC);

    foreach($getStory as $story){
        $images = explode(",", $story['image']);
        echo "<div class='histoire'>";
        echo "<div class='caseName'>";
        echo "<h2>";
        echo $story['name'];
        echo "</h2>";
        echo "</div>";
        echo "<div class='categorie'>";
        foreach($images as $img){
            echo "<img src=".$img.">";
        }
        echo "<div class='caseDesc'>";
        echo "<p>";
        echo $story['description'];
        echo "</p>";
        echo "</div>";
        echo "<form class='caseButton'>";
        echo "<button class='button1'><a href='https://majinbu-3000.ecole-404.com/StoryDetailsUser.php?id=".$story["idHistoire"]."'>Liste des Chapitre</a></button>";
        echo "</form>";
        echo "<div class='auteur'>";
        echo "<h2>Auteur : ".$story['pseudo']."";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        
    }
}

