<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/StoryCreate.css" rel="stylesheet">
    <title>Story Create</title>
</head>
<body>
    <?php require_once("../navbarlogin.php"); ?>

<?php


?>

    <section>
    <form id="create" action="#" method="POST">
            <label for="TitleChapitre">Titre du Chapitre :</label>
            <input type="text" name="title" class="p input" required>
            <label for="DescChapitre">Chapitre :</label>
            <input id="Desc" type="text" name="description" class="p input" required>
            <input type="submit" value="Sauvegarder" id="connectButton">
        </form>
    </section>

</body>
</html>