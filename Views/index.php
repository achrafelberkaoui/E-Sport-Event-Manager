<?php
require_once "console.php" ;
do{
    echo "\n";
    echo "\n======= MENU ======= \n";
    echo "1. Gestion des clubs \n" ;
    echo "2. Gestion des equipes \n" ;
    echo "3. Gestion des joueurs \n" ;
    echo "4. Gestion des matches \n" ;
    echo "5. Gestion de tournois \n" ;
    echo "6. Gestion des sponsors \n" ;
    echo "0. Exit \n";
    $console = new Console();

    $choix = $console->input("Entre votre choix");
    switch ($choix) {
        case '1':
    include "viewClub.php";
            break;
            case '2':
    include "../Model/viewEquipe.php";
            break;
            case '3':
    include "../Model/viewJoueur.php";
            break;
            case '4':
    include "../Model/viewMatches.php";
            break;
            case '5':
    include "../Model/viewTournoi.php";
            break;
            case '6':
    include "../Model/viewSponsors.php";
            break;

        default:
            break;
    }
}while($choix !== '0');