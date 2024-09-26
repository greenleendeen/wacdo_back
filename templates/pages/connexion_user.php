<?php
/*
Template de page complète : affiche le formulaire de connexion 

Paramètres: néant
*/

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire de connexion equipes Wacdo </title>

    <link rel="stylesheet" href="/css/style.css">
</head>

<body class="">

    <div class=" ">
        <h1> Bonjour salarié Wacdo, pour commencer votre journée, connectez vous.</h1>
    </div>

    <div class="affiche">
        <form action="connecter_user.php" method="POST">
   <!--         <div>
                <label for="role">votre role:</label>
                <input type="text" id="role" name="role" required /> <br> <br>
            </div>-->

            <div>
                <label for="login">votre identifiant:</label>
                <input type="text" id="login" name="login" required /> <br> <br>
            </div>

            <div>
                <label for="motdepasse">votre mot de passe:</label>
                <input type="password" id="motdepasse" name="motdepasse" required /> <br> <br>
            </div>


            <input type="submit" value="se connecter" />
        </form>
    </div>





</body>

</html>