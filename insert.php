<?php
$pdo = new PDO('mysql:host=localhost;dbname=the_barber', 'root', '',
array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
echo '<pre>'; print_r($pdo); echo '</pre>';
echo '<pre>'; print_r(get_class_methods($pdo)); echo '</pre>';

// // Insertion :
// $result = $pdo->query("INSERT INTO produit (reference, categorie, titre, details, photo, prix, stock) 
// VALUES ('p2', 'barbe', 'Coffret barbe', 'ceci est un coffret de soin pour la barbe', 'url', '10', '2'); ");
// if($result === false){
//     var_dump($pdo->errorInfo());
//     die ('Erreur SQL');
// }
