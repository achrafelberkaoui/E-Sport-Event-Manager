<?php
include_once "./bd/config.php";
include_once "./competition.php";
include_once "./interfaces/archirvable.php";
class tournois extends competition implements Archivable{
    public static function createTournoi(PDO $con, $titre, $cash, $format)
    {
    $stmt = $con->prepare("
    INSERT INTO tournoi(Titre, Cashprize, Format) VALUES (?,?,?)");
    $stmt->execute([$titre, $cash, $format]);
    }
    public function demarrer(){
        echo "Tournoi Start";
    }

    public function archive(){
        echo "Tournoi archive";
    }
}