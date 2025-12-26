<?php
include_once "./bd/config.php";
include_once "console.php";
include_once "./Model/Equipe.php";
$Equipe = new Equipe($con, "", "", "");
$consol = new Consolee();
do {
    echo "\n==== Gestion des Equipes ====\n";
    echo "1. Lister tous les Equipe\n";
    echo "2. Ajouter un Equipe\n";
    echo "3. Modifier un Equipe\n";
    echo "4. Supprimer un Equipe\n";
    echo "5. Retour au menu principal\n";
    echo "0. Exit\n";

    $choixEquipe = $consol->input("Votre choix");
    switch ($choixEquipe) {
        case '1':
            echo "======= LIST Des Equipes =======\n";
            // $club->getAll();
            echo "id || name || jeu || Club\n";
            foreach($Equipe->getAll() as $el){
                echo $el['id'] . "||" . $el['Name'] . "||" . $el['Jeu'] . "||" . $el['club_name'] . "\n";
            }
            break;
        case '2' :

    $name = $consol->input("Nom du Equipe");;
    $jeu = $consol->input("jeu du Equipe");;
    $club_id = $consol->input("club_id");
    $Equipe = new Equipe($con, $name, $jeu, $club_id);
    $Equipe->creatEquipe ();
    break;

    case '3' :
    $id = $consol->input("Veuillez entrer Id pour Modifier ?");;
    $name = $consol->input("Nom du Equipe");;
    $jeu = $consol->input("jeu du Equipe");;
    $club_id = $consol->input("club_id");
    $Equipe = new Equipe($con, $name, $jeu, $club_id);
    $Equipe->setId($id);
    $Equipe->edit ();
    break;

    case '4' :

    $id = $consol->input("Veuillez entrer Id pour supprime ?");;

    $Equipe->setId($id);

    $Equipe->delete ();
    break;
        case '5' : 
        include "index.php";
    break;
        default:
            break;
    }


} while($choixEquipe !== '0');