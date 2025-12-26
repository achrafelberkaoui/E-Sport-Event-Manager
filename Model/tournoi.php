<?php
include "./bd/config.php";
include "./competition.php";
include "./interfaces/archirvable.php";
class tournois extends competition implements Archivable{
    public static function createTournoi(PDO $con, $titre, $cash)
    {
    $stmt = $con->prepare("
    INSERT INTO tournois VALUES (NULL, ?, ?)");
    $stmt->execute([$titre, $cash]);
    }
    public function demarrer(){
        echo "Tournoi Start";
    }

    public function archive(){
        echo "Tournoi archive";
    }
}