<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/register.css">
    <title>Register</title>
</head>
<body>
    <?php require_once("navbar.html"); ?>


<?php

    require_once('./API/PDOConnection.php');
    if(
        $_POST["registerEmail"] != "" &&
        $_POST["registerPassword"] != "" &&
        $_POST["registerPseudo"] != "" &&
        $_POST["registerlastName"] != "" &&
        $_POST["registerfirstName"] != ""

    ){

        // Regex pour le password
        $strPassword = $_POST['registerPassword'];
        $patternPassword = "/^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{6,})\S$/";
        $passwordRegex = print_r(preg_match($patternPassword, $strPassword));
    
        // Regex pour l'email
        $strEmail = $_POST['registerEmail'];
        $patternEmail = "/^([a-z0-9]+(?:[._-][a-z0-9]+)*)@([a-z0-9]+(?:[.-][a-z0-9]+)*\.[a-z]{2,})$/";
        $emailRegex = print_r(preg_match($patternEmail, $strEmail));

        // Verifie si le Regex est correctement fait pour l'email / password
        if(preg_match($patternPassword, $strPassword) == 0){
            echo "<script>alert(\"Vous avez mal inscrit votre Mot de Passe : 1 MAJ / 1 MIN / 1CHIFFRE !\")</script>";
            die;
        }else  
            if(preg_match($patternEmail, $strEmail) == 0){
                echo "<script>alert(\"Vous avez mal inscrit votre email : xxxxxx@xxxxx.com/fr/com/co/etc\")</script>";
            die;
        }

        // Recherche dans la BDD si il y a deja un compte avec cet email
        $getEmail = $connectionPDO->prepare('SELECT * FROM `user` WHERE email=:email; ');
        $getEmail->execute([ "email" => $_POST["registerEmail"] ]);
        $emailRequest = $getEmail->fetch(PDO::FETCH_ASSOC);

        if($emailRequest) {
            echo "<script>alert(\"This email have an account\")</script>";
        }else{
            // Recherche dans la BDD si il y a deja un compte avec ce pseudo
            $getPseudo = $connectionPDO->prepare('SELECT * FROM `user` WHERE pseudo=:pseudo; ');
            $getPseudo->execute([ "pseudo" => $_POST["registerPseudo"] ]);
            $pseudoRequest = $getPseudo->fetch(PDO::FETCH_ASSOC);

        if($pseudoRequest) {
            echo "<script>alert(\"This Pseudo have an Account\")</script>";
        }else{

            echo "<script>alert(\"Your account has been created\")</script>";

            // Hash le password pour la sécurite
            $hashedPassword = hash("SHA256", $_POST["registerPassword"]);

            // Insert a l'interieur de la BDD le compte enregistrer
            $createUser = $connectionPDO->prepare('INSERT INTO user (idUser, email, password, pseudo, lastName, firstName, role) VALUES (:idUser, :email, :password, :pseudo, :lastName, :firstName, :role);');
            $createUser->execute(["idUser" => v4(), "email" => $_POST["registerEmail"], "password" => $hashedPassword, "pseudo" => $_POST["registerPseudo"], "lastName" => $_POST["registerlastName"], "firstName" => $_POST["registerfirstName"], "role" => "ROLE_USER"]);

            $userRequest = $createUser->fetch(PDO::FETCH_ASSOC);

        
        }
    }
}
?>

    <section>
        <div id="corps">

        <form id="register" action="#" method="POST">
                <d>Adresse Email :</d>
                    <input type="email" class="inputs" placeholder="Email" name="registerEmail" required />
                <d>Mots de Passe :</d>
                    <input type="password" class="inputs" placeholder="MDP" name="registerPassword" minlength="8" required />
                <d>Pseudo :</d>
                    <input type="text" class="inputs" placeholder="Pseudo" name="registerPseudo" required />
                <d>Nom :</d>
                    <input type="text" class="inputs" placeholder="Nom" name="registerlastName" required />
                <d>Prenom :</d>
                    <input type="text" class="inputs" placeholder="Prenom" name="registerfirstName" required />

                <input type="submit" class="inputs" placeholder="Inscription" id="registerButton" required />

            </form>
        </div>

    </section>

</body>
</html>