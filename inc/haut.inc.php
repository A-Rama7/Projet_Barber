<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo RACINE_SITE; ?>inc/css/style.css">
    <link rel="stylesheet" href="<?php echo RACINE_SITE; ?>/fontawesome-free-5.15.3-web/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,600;1,700&display=swap" rel="stylesheet"> 
    <title>Document</title>
</head>
<body>
    <div class="header">
        <nav class="navbar">
            <div class="logo">
                <a href="<?php echo RACINE_SITE; ?>index.php">
                    <img src="<?php echo RACINE_SITE; ?>inc/images/Logo_barber_black.png" alt="logo">
                </a>
            </div>
            <ul class="navbar-links">
                <li class="link">
                    <a href="<?php echo RACINE_SITE; ?>about.php">About</a>
                </li>
                <li class="link">
                    <a href="<?php echo RACINE_SITE; ?>menu.php">Menu</a>
                </li>
                <li class="link">
                    <a href="<?php echo RACINE_SITE; ?>staff.php">Staff</a>
                </li>
                <li class="link">
                    <a href="<?php echo RACINE_SITE; ?>boutique.php">Shop</a>
                </li>

                <!-- <li class="link">
                    <a href="<?php //echo RACINE_SITE; ?>connexion.php">Connexion</a>
                </li> -->
                <?php
                    if(internauteEstConnecteEtEstAdmin())
                    {
                        echo '
                        <li class = "link">
                            <a href="' . RACINE_SITE . 'profil.php">Profil</a>
                        </li>';
                        echo '
                        <li class = "link">
                            <a href="' . RACINE_SITE . 'connexion.php?action=deconnexion">Deconnexion</a>
                        </li>
                        ';
                    }
                    if(internauteEstConnecte() && !internauteEstConnecteEtEstAdmin())
                    {
                        echo '
                        <li class = "link">
                            <a href="' . RACINE_SITE . 'profil.php">Profil</a>
                        </li>';
                        echo '
                        <li class = "link">
                            <a href="' . RACINE_SITE . 'connexion.php?action=deconnexion">Deconnexion</a>
                        </li>
                        ';
                        echo '
                        <li class = "link">
                            <a href="' . RACINE_SITE . 'panier.php">
                                <span style="font-size: 30px; color: #F5B98C;">
                                    <i class="fas fa-shopping-cart"></i>
                                </span>
                            </a>
                        </li>';
                    }
                    elseif(!internauteEstConnecte())
                    {
                        echo '
                        <li class = "link">
                            <a href="' . RACINE_SITE . 'inscription.php">Inscription</a>
                        </li>';
                        echo '
                        <li class = "link">
                            <a href="' . RACINE_SITE . 'connexion.php">Connexion</a>
                        </li>';

                    }
                    ?>
            </ul>
            <div class="burger">
                <div class="line line1"></div>
                <div class="line line2"></div>
                <div class="line line3"></div>
            </div>
        </nav>
    </div>