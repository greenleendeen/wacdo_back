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
<h2>charger image</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" encrypte="multipart/form-data">
           
            <label for="file"> selectionner une image: </label><br>
            <input type="file" id="file" name="file"  accept="image/png, image/jpeg" >
            <button type = "submit"> charger</button>
          
        </form>

        <a href="afficher_liste_produits.php"> <button class="button">revenir à la liste des produits </button> </a>
    </div>

</body>

</html>