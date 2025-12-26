<?php
include_once "./bd/config.php";
include_once "console.php";
include_once "./Model/Joueur.php";

$consol = new Consolee();
$Joueur = new Joueur($con, "", "", "", "");

do {
    echo "\n==== Gestion des Joueurs ====\n";
    echo "1. Lister tous les Joueurs\n";
    echo "2. Ajouter un Joueur\n";
    echo "3. Retour au menu principal\n";
    echo "0. Exit\n";

    $choix = $consol->input("Votre choix");

    switch ($choix) {


        case '1':
            echo "======= LISTE DES JOUEURS =======\n";
            var_dump($con);
            echo "id || pseudo || role || salaire || equipe || jeu\n";

            foreach($Joueur->getAll() as $el){
                echo $el['id'] . " || " . $el['Pseudo'] . " || " . $el['Rôle'] . " || " . $el['Salaire'] . " || " . $el['Name'] . " || " . $el['jeu'] . "\n";
            }

            break;

        case '2':
            $pseudo = $consol->input("Pseudo du joueur");
            $role   = $consol->input("Role du joueur");
            $salaire = $consol->input("Salaire");
            $equipe_id = $consol->input("ID de l'équipe");
            $Joueur = new Joueur($con, $pseudo, $role, $salaire, $equipe_id);
            $Joueur->create();
            break;

        case '3':
            include "index.php";
            break;
    }

} while($choix !== '0');
