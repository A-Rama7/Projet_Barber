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
        $photo_bdd = RACINE_SITE . "inc/photo/$nom_photo";
        $photo_dossier = $_SERVER['DOCUMENT_ROOT'] . RACINE_SITE . "inc/photo/$nom_photo"; 
        copy($_FILES['photo']['tmp_name'],$photo_dossier);
    }
    foreach($_POST as $indice => $valeur)
    {
        $_POST[$indice] = htmlEntities(addSlashes($valeur));
    }
    executeRequete("INSERT INTO produit (reference, categorie, titre, details, photo, prix, stock)
    values ('$_POST[reference]', '$_POST[categorie]', '$_POST[titre]', '$_POST[details]', '$photo_bdd', '$_POST[prix]', '$_POST[stock]')");
    $contenu .= '<div class="validation">Le produit a été ajouté</div>';
}

//--- LIENS PRODUITS ---//
$contenu .= '<a href="?action=affichage">Affichage des produits</a><br>';
$contenu .= '<a href="?action=ajout">Ajout d\'un produit</a><br><br><hr><br>';
//--- AFFICHAGE PRODUITS ---//
if(isset($_GET['action']) && $_GET['action'] == "affichage")
{
    $resultat = executeRequete("SELECT * FROM produit");
    
    $contenu .= '<h2> Affichage des Produits </h2>';
    $contenu .= 'Nombre de produit(s) dans la boutique : ' . $resultat->rowCount();
    $contenu .= '<table border="1"><tr>';

    for($i = 0; $i < $resultat->columnCount(); $i++)
    {
        $colonne = $resultat->getColumnMeta($i);
        $contenu .= '<th>'.$colonne['name'].'</th>';
    }
    $contenu .= '<th>Modification</th>';
    $contenu .= '<th>Supression</th>';
    $contenu .= '</tr>';

    // while($colonne = $resultat->getColumnMeta())
    // {    
    //     $contenu .= '<th>' . $colonne . '</th>';
    // }
    // $contenu .= '<th>Modification</th>';
    // $contenu .= '<th>Supression</th>';
    // $contenu .= '</tr>';

    while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC))
    {
        $contenu .= '<tr>';
        foreach ($ligne as $indice => $information)
        {
            if($indice == "photo")
            {
                $contenu .= '<td><img src="' . $information . '" style= "max-width: 100px;"></td>';
            }
            else
            {
                $contenu .= '<td>' . $information . '</td>';
            }
        }
        $contenu .= '<td><a href="?action=modification&id_produit=' . $ligne['id_produit'] .'"><img src="../inc/img/edit.png"></a></td>';
        $contenu .= '<td><a href="?action=suppression&id_produit=' . $ligne['id_produit'] .'" OnClick="return(confirm(\'En êtes vous certain ?\'));"><img src="../inc/img/delete.png"></a></td>';
        $contenu .= '</tr>';
    }
    $contenu .= '</table><br><hr><br>';
}
//--------------------------------- AFFICHAGE HTML ---------------------------------//
require_once("../inc/haut.inc.php");
?>
<br><br><br><br><br>
<h1> Formulaire Produits </h1>
<br>
<?php echo $contenu; ?>
<br><br>
<form method="post" enctype="multipart/form-data" action="">
    <label for="reference">reference</label><br>
    <input type="text" id="reference" name="reference" placeholder="la référence de produit"> <br><br>

    <label for="categorie">categorie</label><br>
    <input type="text" id="categorie" name="categorie" placeholder="la categorie de produit"><br><br>

    <label for="titre">titre</label><br>
    <input type="text" id="titre" name="titre" placeholder="le titre du produit"> <br><br>

    <label for="details">description</label><br>
    <textarea name="details" id="details" placeholder="la description du produit"></textarea><br><br>

    
    <label for="photo">photo</label><br>
    <input type="file" id="photo" name="photo"><br><br>

    <label for="prix">prix</label><br>
    <input type="text" id="prix" name="prix" placeholder="le prix du produit"><br><br>
    
    <label for="stock">stock</label><br>
    <input type="text" id="stock" name="stock" placeholder="le stock du produit"><br><br>
    
    <input type="submit" value="enregistrement du produit">
</form>
<?php require_once("../inc/bas.inc.php"); ?>