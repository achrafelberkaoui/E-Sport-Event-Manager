<?php
include "./Model/Club.php";
include "console.php";

$club = new Club($con);
do {
    echo "\n==== Gestion des Clubs ====\n";
    echo "1. Lister tous les clubs\n";
    echo "2. Ajouter un club\n";
    echo "3. Modifier un club\n";
    echo "4. Supprimer un club\n";
    echo "0. Retour au menu principal\n";

    $choixClub = $console->input("Votre choix");


} while($choixClub !== '0');
