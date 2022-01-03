<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/StoryDetails.css" rel="stylesheet">
    <title>Story Details</title>
</head>
<body>
    <?php require_once("../navbarlogin.php"); ?>

<div class="container">

    <div class="story">
        <div class="caseName"><h2>Nom Histoire</h2></div>
        <div class="caseDesc"><p>Description de l'histoire</p></div>
        <form class="caseButton">
            <input type="submit" class="button1" value="Modifier"></input>
        </form>
    </div>

    <div class="chapter">
        <div class="list"><h2>Liste des Chapitre</h2><button class="buttonlist"><a href="https://majinbu-3000.ecole-404.com/main.php">Nouveau Chapitre</a></button></div> 
        <div class="chapterlist">
            <div class="chapitre">
                <div class="nameChapter"><h3>Chapitre 1 : Le début !</h3></div>
                <div class="buttonChapter">
                    <button class="buttonRead">Lire</button>
                    <button class="buttonUpdate">Modifier</button>
                    <button class="buttonDelete">Supprimer</button>
                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>