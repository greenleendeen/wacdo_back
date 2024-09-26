<?php
/*
Template de page : fromulaire d'ajout d'un nouveau produit

parametres: 
$produit: l'objet 'produit' avec les champs: nom, categorie, prix, etc

*/


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout nouveau produit</title>

    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <h2>Formulaire d'ajout d'un nouveau produit</h2>

    <!--


-->
    <div class="affiche">

        <form method="POST" action="enregistrer_ajout_produit.php">
           
            <label>categorie<?= $produit->getSelectCategorie() ?></label>
            <label>nom du produit <input type="text" name="nom" value="<?= $produit->get("nom") ?>"></label> <br>
            <label>description <input type="text" name="description" value="<?= $produit->get("description") ?>"></label> <br>
            <label> prix: <input type="text" name="prix" value="<?= $produit->get("prix") ?>"></label><br>
            <label> image: <input type="file" name="file" value="<?= $produit->get("image") ?>"></label><br>
            


            <input type="submit" value="enregistrer">

        </form>
        <a href="afficher_liste_produits.php"> <button class="button">revenir à la liste des produits </button> </a>
    </div>

</body>

</html>