<?php

// Fragment de l'en-tête affichant l'utilisateur connecté ou un bouton pour se connecter
// Paramètres : néant

if (session_isconnected()) {
?>
    <!--<div hidden class=" user">-->
    <div class=" ">
        <h2> Bonjour <?= session_userconnected()->get("nom_user") ?></h2>
       
    </div>
    
<?php } else { ?>
    <a href="connecter_user.php" class="button">Se connecter</a>
<?php } ?>