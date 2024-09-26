<?php

/*

Template de fragment : s'affiche sur la page d'accueil d'un équipier connecté (et sur la borne du client)
pour la création d'une commande

Paramètres :
   néant

   //
*/

?>

<div class="margin">
            <h3 class="padding"> vous pouvez créer une commande:</h3>
            <div class="flex spaceAround ">
                <!-- formulaire de CREATION commande "sur place"-->
                <form method="post" action="afficher_form_crea_commande.php">
                    <select hidden id="lieu" name="lieu">
                        <option value="place" selected>sur place</option>
                    </select>

                    <select hidden id="statut" name="statut">
                        <option value="0" selected>en cours</option>
                    </select>


                    <input class="button" type="submit" name="submit" value="sur place">
                </form>


                <!-- formulaire de CREATION commande "à emporter"-->
                <form method="post" action="afficher_form_crea_commande.php">
                    <select hidden id="lieu" name="lieu">
                        <option value="emport" selected>sur place</option>
                    </select>
                    <select hidden id="statut" name="statut">
                        <option value="0" selected>en cours</option>
                    </select>
                    <input class="button" type="submit" name="submit" value="à emporter">
                </form>


                
                <a href="enregistrer_commande.php"><button class="button">valider le paiement</button> </a>
            </div>
        </div>
