<?php require_once("inc/init.inc.php"); ?>
<?php require_once("inc/haut.inc.php"); ?>
<?php 
// require_once("inc/fonction.inc.php");
?>
    <br><br><br><br>
    <h1>La boutique</h1>
<?php

    //Affichage multiple (SELECT ):
        $result = $pdo->query("SELECT * FROM produit");
        while($produit = $result ->fetch(PDO::FETCH_ASSOC))
        {
            echo "<pre>";
            print_r($produit);
            echo "</pre>";
            echo "Bonjour le produit d'id $produit[id_produit] de référence $produit[reference] 
            de la catégorie $produit[categorie] qui s'appel $produit[titre] a une description : $produit[details].
            <br>
            Son prix est de $produit[prix]";
        }
//----------------------------------------------------------------
?>
<?php
$résultat = $pdo->query("SELECT * FROM produit");

echo "<table border=\"5\"> <tr>";
for($i=0; $i<$résultat->columnCount(); $i++)
{
    $colonne = $résultat->getColumnMeta($i);
    echo '<th>'.$colonne['name'].'</th>';
}
echo "</tr>";

while ($ligne = $résultat->fetch(PDO::FETCH_ASSOC))
{
    echo '<tr>';
    foreach ($ligne as $indice => $information)
    {
        echo '<td>' . $information .'</td>';
    }
    echo '</tr>';
}
echo '</table>';
?>

    <?php require_once("inc/bas.inc.php"); ?>
