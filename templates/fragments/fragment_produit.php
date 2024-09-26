<?php

// Fragment de page affichant une ligne de tableau avec les données d'un prduit
// Paramètres : $produit: l'objet produit


?>
<!--Tableau produits-->

   
     <tbody>
       
        <tr>
            <td ><?= $produit->get("nom")?></td>
            <td><?= $produit->get("categorie")?></td>
            <td> <?= $produit->get("description")?></td>
            <td><?= $produit->get("prix")?></td>
            <td> Image</td>
            <td> <div class="circleGreen"></div></td>
            

            <td> 
            <a href="afficher_detail_produit.php?id=<?= $produit->id()?>"><button class="button">voir détail</button> </a> 
            <a href="afficher_form_modif_produit.php?id=<?= $produit->id()?>"> <button class="button">modifier</button>  </a> 
            <a href="supprimer_produit.php?id=<?= $produit->id()?>"> <button class="button">supprimer </button> </a>
            </td>
            
        </tr>

    </tbody>




</div>