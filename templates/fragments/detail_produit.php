<?php

/*

Template de fragment : détail d'un produit

Paramètres :
   $produit: objet produit

*/

?>
<div class="cartProd">
    
    <div>
        <p><b>nom du produit</b> : <?= htmlentities($produit->get("nom")) ?></p>
        <p><b>categorie</b> : <?= htmlentities($produit->getTarget("categorie")->get("nom_cat")) ?></p>
        <p><b>description</b> : <?= htmlentities($produit->get("description")) ?> </p>
        <p><b>prix</b> : <?= htmlentities($produit->get("prix")) ?> € </p>
        <p><b>image</b> : </p>
        <p><b>stock</b> :
            <?= htmlentities($produit->get("stock")) ?></p>

    </div>
    <div class="flex spaceAround">
        <a href="afficher_form_modif_produit.php?id=<?= $produit->id() ?>"> <button class="button">modifier</button> </a>
        <a href="supprimer_produit.php?id=<?= $produit->id() ?>"> <button class="button">supprimer </button> </a>
        <a href="afficher_liste_produits.php"> <button class="button">revenir </button> </a>
    </div>
</div>