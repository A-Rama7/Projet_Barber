<?php require_once("inc/init.inc.php"); ?>
<?php require_once("inc/haut.inc.php"); ?>


<?php
    //--------------------------------- TRAITEMENTS PHP ---------------------------------//
    if(isset($_GET['action']) && $_GET['action'] == "deconnexion")
{
    session_destroy();
}
if(internauteEstConnecte())
{
    header("location:profil.php");
}

if($_POST)
{
    // $contenu .=  "pseudo : " . $_POST['pseudo'] . "<br>mdp : " .  $_POST['mdp'] . "";
    $resultat = executeRequete("SELECT * FROM membre WHERE pseudo='$_POST[pseudo]'");
    if($resultat->rowCount() != 0)
    {
        // $contenu .=  '<div style="background:green">pseudo connu!</div>';
        $membre = $resultat->fetch(PDO::FETCH_ASSOC);
        if($membre['mdp'] == $_POST['mdp'])
        {
            //$contenu .= '<div class="validation">mdp connu!</div>';
            foreach($membre as $indice => $element)
            {
                if($indice != 'mdp')
                {
                    $_SESSION['membre'][$indice] = $element;
                }
            }
            header("location:profil.php");
        }
        else
        {
            $contenu .= '<div class="erreur">Erreur de MDP</div>';
        }       
    }
    else
    {
        $contenu .= '<div class="erreur">Erreur de pseudo</div>';
    }
}
?>
//--------------------------------- AFFICHAGE HTML ---------------------------------//




<h1 class="title-connexion">Connexion</h1>
<div class="form-connexion">

    <form method="post" action="">
        
        <?php echo $contenu; ?>
        <br>
        <label for="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo"><br> <br>

        <label for="mdp">Mot de passe</label><br>
        <input type="text" id="mdp" name="mdp"><br><br>

        <input  class= "btn2 a" type="submit" value="Se connecter">
        <div>
        <a  class= "btn2" href="<?php echo RACINE_SITE; ?>inscription.php">
        Inscription
        </a>
        </div>
        
    </form>
</div>





    <?php require_once("inc/bas.inc.php"); ?>