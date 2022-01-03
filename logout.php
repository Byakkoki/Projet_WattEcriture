<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/logout.css" rel="stylesheet">
    <title>Logout</title>
</head>
<body>
    <?php require_once("navbarlogin.php"); ?>

<?php
    if (isset($_POST['submitform']))
        {   
        ?>
    <script type="text/javascript">
        window.location = "https://majinbu-3000.ecole-404.com/index.php";
    </script>      
    <?php
    }
    setcookie("WP-Auth-Token", "null", time() +0, "/", "", true, true);

    //header('Location: https://majinbu-3000.ecole-404.com/index.php');
?>
    

    <section>
    <form name="submitform" id="logout" action="onclick" method="DELETE">
            <label for="Deconnexion">Vous êtes deconnecter</label>
            <input type="submit" value="Retourner a la page d'accueil" id="connectButton">
        </form>
    </section>



</body>
</html>