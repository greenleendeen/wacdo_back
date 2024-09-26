<?php

// Fragment de page affichant une ligne de tableau avec les données d'un prduit
// Paramètres : $produit: l'objet produit


?>
<!--Tableau produits-->

<label> produit
<select name="produit" id="produit">
    <?php foreach ($produit->getListeProduitFromCat($idcategorie) as $id => $produit) { ?>
       <option value="<?= $id ?>"><?= $produit->get("nom") ?></option>
    <?php } ?>

</select>

</label>
