<?php
include_once "console.php" ;
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
    $console = new Consolee();

    $choix = $console->input("Entre votre choix");
    switch ($choix) {
        case '1':
    include "viewClub.php";
            break;
            case '2':
    include "viewEquipe.php";
            break;
            case '3':
    include "viewJoueur.php";
            break;
            case '4':
    include "viewMatches.php";
            break;
            case '5':
    include "viewTournoi.php";
            break;
            case '6':
    include "viewSponsors.php";
            break;

        default:
            break;
    }
}while($choix !== '0');