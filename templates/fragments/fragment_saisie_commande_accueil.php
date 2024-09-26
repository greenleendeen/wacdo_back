<?php

/*

Template de fragment : formuliare de saisie d'une commande (précédée de 'afficher_form_crea_commande')
   opération:  selection des produits, un par un pour leur ajout au panier

Paramètres :
   néant

   //
*/

?>

<div class="cartProd">
    

<form method="POST" action="ajouter_produit_panier.php">
<!--cette div doit être hidden. elle sert pour garder le n] de la commande jusqu'à la validation du formulaire par le N° de paiement -->
  <div ><label>N commande<?= $commande->id() ?></label> <br><br> </div>



<!--LA COMPOSITION DE LA COMMANDE-->  
<!--la div qui affiche le select pour les catégories des produits -->
<div id="affiche-categorie">           
    <label>categorie<?= $produit->getSelectCategorie() ?></label> <br><br>
</div>

<!--la div qui affiche le select pour les produits d'une catégorie -->
<div id="affiche-produits"> 
    
</div>  <br> <br>

<!-- si la catégorie est = 'menu' -> affiche 'choix taille menu' sinon, affiche '...'
<div id="choix-taille"> 
<select name="menu" id="taille-menu">
  <option value="">--choix taille menu--</option>
  <option value="normal">Normal</option>
  <option value="grand">XL</option>
</div>  
-->

<!--les boutons pour quantité -->

<div id="affiche-quantite" class="flex quantityContainer">
<button id="removeButton" class="quantityButton">-</button>
  <span id="numberDisplay">0</span>
  <button id="addButton" class="quantityButton">+</button>
</div>

<!--a revoir -->

<input type="submit" value="ajouter à ma commande">
</form>
</div>
<script src="js/app.js" defer></script>
<script src="js/script.js" defer></script>

