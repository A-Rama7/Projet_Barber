<?php
require_once("../inc/init.inc.php");
//--------------------------------- TRAITEMENTS PHP ---------------------------------//
//--- VERIFICATION ADMIN ---//
if(!internauteEstConnecteEtEstAdmin())
{
    header("location:../connexion.php");
    exit();
}
//--- ENREGISTREMENT PRODUIT ---//
if(!empty($_POST))
{   // debug($_POST);
    $photo_bdd = ""; 
    if(!empty($_FILES['photo']['name']))
    {   // debug($_FILES);
        $nom_photo = $_POST['reference'] . '_' .$_FILES['photo']['name'];
        $photo_bdd = RACINE_SITE . "photo/$nom_photo";
        $photo_dossier = $_SERVER['DOCUMENT_ROOT'] . RACINE_SITE . "/photo/$nom_photo"; 
        copy($_FILES['photo']['tmp_name'],$photo_dossier);
    }
    foreach($_POST as $indice => $valeur)
    {
        $_POST[$indice] = htmlEntities(addSlashes($valeur));
    }
    executeRequete("INSERT INTO produit (id_produit, reference, categorie, titre, details, photo, prix, stock)
    values ('', '$_POST[reference]', '$_POST[categorie]', '$_POST[titre]', '$_POST[details]',  '$photo_bdd',  '$_POST[prix]',  '$_POST[stock]')");
    $contenu .= '<div class="validation">Le produit a été ajouté</div>';
}
//--------------------------------- AFFICHAGE HTML ---------------------------------//
require_once("../inc/haut.inc.php");
echo $contenu;
?>
<h1> Formulaire Produits </h1>
<form method="post" enctype="multipart/form-data" action="">
    <label for="reference">reference</label><br>
    <input type="text" id="reference" name="reference" placeholder="la référence de produit"> <br><br>

    <label for="categorie">categorie</label><br>
    <input type="text" id="categorie" name="categorie" placeholder="la categorie de produit"><br><br>

    <label for="titre">titre</label><br>
    <input type="text" id="titre" name="titre" placeholder="le titre du produit"> <br><br>

    <label for="description">description</label><br>
    <textarea name="description" id="description" placeholder="la description du produit"></textarea><br><br>

    
    <label for="photo">photo</label><br>
    <input type="file" id="photo" name="photo"><br><br>

    <label for="prix">prix</label><br>
    <input type="text" id="prix" name="prix" placeholder="le prix du produit"><br><br>
    
    <label for="stock">stock</label><br>
    <input type="text" id="stock" name="stock" placeholder="le stock du produit"><br><br>
    
    <input type="submit" value="enregistrement du produit">
</form>
<?php require_once("../inc/bas.inc.php"); ?>