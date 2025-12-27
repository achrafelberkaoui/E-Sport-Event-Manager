<?php
include_once "console.php" ;
include_once "./db/config.php";
include "./Model/Matches.php";
include_once "./Model/tournoi.php";
do{
    echo "\n";
    echo "\n======= MENU ======= \n";
    echo "1. Gestion des clubs \n" ;
    echo "2. Gestion des equipes \n" ;
    echo "3. Gestion des joueurs \n" ;
    echo "4. crée match \n" ;
    echo "5. crée tournoi \n" ;
    echo "6. Gestion Scores \n" ;
    echo "7. Scores Matches \n" ; 
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
         MatchGenerator::generate(
                $con,
                $console->input("Id Tournoi")
         );
            break;
            case '5':
                tournois::createTournoi(
                $con,
                $console->input("Titre de Tournoi"),
                $console->input("Cash de Tournoi"),
                $console->input("Format de Tournoi")
                );
            break;
            case '6':
                Matches::setResult(
                $con,
                $console->input("score EquipeA"),
                $console->input("score EquipeB"),
                $console->input("ID de match")
                );
            break;
                case '7':
                echo "\n--- LISTE DES MATCHES ---\n";
                $Matches = AffichageMatch::affich($con);
                foreach($Matches as $match){
                        // var_dump($Matches);
                echo $match['id'] . " | " . $match['equipeA'] . " vs " . $match['equipeB'] . " => " . $match['Score_A'] . " - " . $match['Score_B'] . "\n";
            }
            break;
        default:
            break;
    }
}while($choix !== '0');