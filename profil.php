<?php
require_once("inc/init.inc.php");
//--------------------------------- TRAITEMENTS PHP ---------------------------------//
if(!internauteEstConnecte()) header("location:connexion.php");
// debug($_SESSION);
$contenu .= '<p class="centre">Bonjour <strong>' . $_SESSION['membre']['pseudo'] . '</strong></p>';
$contenu .= '<div class="cadre"><h2> Voici vos informations </h2>';
$contenu .= '<p> votre email est: ' . $_SESSION['membre']['email'] . '<br>';
$contenu .= 'votre ville est: ' . $_SESSION['membre']['ville'] . '<br>';
$contenu .= 'votre code postal est: ' . $_SESSION['membre']['code_postal'] . '<br>';
$contenu .= 'votre adresse est: ' . $_SESSION['membre']['adresse'] . '</p></div><br><br>';
?>
<!-- //--------------------------------- AFFICHAGE HTML ---------------------------------// -->
<?php require_once("inc/haut.inc.php"); ?>
<br><br><br><br><br>
<h1>Page profil</h1>

<?php echo $contenu; 
if(internauteEstConnecteEtEstAdmin())
                    {
                        echo '
                        <h3>
                            <a href="' . RACINE_SITE . 'admin/gestion_membre.php">Gestion des membres</a>
                        </h3>';
                        echo '
                        <h3>
                            <a href="' . RACINE_SITE . 'admin/gestion_commande.php">Gestion des commandes</a>
                        </h3>';
                        echo '
                        <h3>
                            <a href="' . RACINE_SITE . 'admin/gestion_boutique.php">Gestion de la boutique</a>
                        </h3>';
                        echo '
                        <h3>
                            <a href="' . RACINE_SITE . 'connexion.php?action=deconnexion">Se déconnecter</a>
                        </h3>
                        ';
                    }
                    elseif(internauteEstConnecte())
                    {
                        echo '
                        <h3>
                            <a href="' . RACINE_SITE . 'connexion.php?action=deconnexion">Se déconnecter</a>
                        </h3>
                        ';
                    }
?>
<?php require_once("inc/bas.inc.php"); ?>