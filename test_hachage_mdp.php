<?php

// Teste du hachage des mots de pass


echo password_hash("equipier", PASSWORD_DEFAULT) . "<br>";


if (password_verify("1234567", "$2y$10$0XJC8vUbGVdbeBuIMOk.d.hS5nxogy424ns1usu2/BDeC/vanjvp6")) {
    echo " C'est  1234567";
} else {
    echo " Ce n'est pas 1234567";
}
if (password_verify("123456", "$2y$10$0XJC8vUbGVdbeBuIMOk.d.hS5nxogy424ns1usu2/BDeC/vanjvp6")) {
    echo " C'est  123456";
} else {
    echo " Ce n'est pas 123456";
}