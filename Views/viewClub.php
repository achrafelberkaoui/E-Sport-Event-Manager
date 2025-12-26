<?php
include_once "console.php";
include_once "./Model/Club.php";
$consol = new Consolee();
$club = new Club($con);
do {
    echo "\n==== Gestion des Clubs ====\n";
    echo "1. Lister tous les clubs\n";
    echo "2. Ajouter un club\n";
    echo "3. Modifier un club\n";
    echo "4. Supprimer un club\n";
    echo "5. Retour au menu principal\n";
    echo "0. Exit\n";

    $choixClub = $consol->input("Votre choix");
    switch ($choixClub) {
        case '1':
            echo "=======LIST DES CLUBS=======\n";
            // $club->getAll();
            echo "id || name || ville || Date Creation\n";
            foreach($club->getAll() as $el){
                echo $el['id'] . "||" . $el['Name'] . "||" . $el['Ville'] . "||" . $el['Date_Creation'] . "\n";
            }
            break;
        case '2' :

    $name = $consol->input("Nom du club");;
    $ville = $consol->input("Ville du club");;
    $date = $consol->input("Date de création (YYYY-MM-DD)");

    $club->setName($name);
    $club->setVille($ville);
    $club->setDate($date);

    $club->creatClub ();
    break;

    case '3' :
    $id = $consol->input("Veuillez entrer Id pour supprime ?");;
    $name = $consol->input("Nom du club");;
    $ville = $consol->input("Ville du club");;
    $date = $consol->input("Date de création (YYYY-MM-DD)");
    $club->setId($id);
    $club->setName($name);
    $club->setVille($ville);
    $club->setDate($date);

    $club->edit ();
    break;

    case '4' :

    $id = $consol->input("Veuillez entrer Id pour supprime ?");;

    $club->setId($id);

    $club->delete ();
    break;
        case '5' : 
        include "index.php";
    break;
        default:
            break;
    }


} while($choixClub !== '0');