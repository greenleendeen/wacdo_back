<?php
// hashage d'un mot de passe
// parametre : GET pwd : mot de pase à hasher



$pwdToHash = $_GET["pwd"];
echo password_hash($pwdToHash, PASSWORD_DEFAULT);