<?php
/*

essaie d'uploader l'image methode livre */

//création de l'objet produit
$produit = new produit();

// vérification si le formulaire a été sousmis

if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $nom = $_POST['nom'];
    $categorie = $_POST['categorie'];
    $prix= $_POST['prix'];
    $image = $_FILES['image'];

    //verification du fichier
    if ($_FILES ["file"]["error"]== UPLOAD_ERR_OK) {
        // chemin du répértoire de destination !!!!!!!!!!!!!!
        $uploadDir = "uploads/...."; //!!!!!!!!!!!!!!

    // nom du fichier
    $fileName = basename($_FILES["file"]["name"]);

    // chemin complet du fichier sur le serveur
    $filePath = $uploadDir . $fileName;

    // obtenir l'extention du fichier
    $fileExtention = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

    // verification du type MIME du fichier
    $fileMimeType=mime_content_type($_FILES["file"]["tmp_name"]);
    $alowedMimeTypes = array('image/png','image/jpeg');

    if(!in_array($fileMimeType, $alowedMimeTypes)){
        echo "erreur: type de fichier non autorisé. ";
        return;
    }

    //vérification de l'extention du fichier
    $alowedExtentions = array('png', 'jpg', 'jpeg');
    if(!in_array($fileExtention, $alowedExtentions)) {
        echo "Erreur: extention de fichier non autorisée";
        return;
    }
    // déplacement du fichier vers le répértoire de destination
    if(move_uploaded_file($_FILES["file"]["tmp_name"], $filePath)){
        echo "chargement reussi";
    }else {
        echo "erreur";
    }
    } else {
        echo "erreur: ". $_FILES ["file"]["error"];
    }
}