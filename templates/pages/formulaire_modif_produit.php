<?php
/*

Template de page complète : formulaire de modification des données d'un produit
Paramètres :
    $produit :l'objet 'produit' avec ses détails

*/ 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification produit</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <h2>Formulaire de modification d'un produit</h2>



    <form method="POST" action="enregistrer_form_modif_produit.php?id=<?= $produit->id()?>">

           
           <label>categorie<?= $produit->getSelectCategorie() ?></label>
           <label>nom du produit <input type="text" name="nom" value="<?= $produit->get("nom") ?>"></label> <br>
           <label>description <input type="text" name="description" value="<?= $produit->get("description") ?>"></label> <br>
           <label> prix: <input type="text" name="prix" value="<?= $produit->get("prix") ?>"></label><br>
           <label> image: <input type="file" name="file" value="<?= $produit->get("image") ?>"></label><br><br>


           <input type="submit" value="enregistrer">

       </form>
       <a href="afficher_liste_produits.php"> <button class="button">revenir à la liste des produits </button> </a>


  

</body>
</html>


