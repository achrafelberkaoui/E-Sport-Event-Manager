<?php 
class Equipe {
    public $id, $Name, $Jeu;
    function __construct($nom, $jeu)
    {
        $this->Name = $nom;
        $this->Jeu = $jeu;

    }

    
    public function getAll ()
    {
        $conn = $this->nameBd->getConnection();
    }

    public function creatClub ()
    {

    }

    public function delete ()
    {

    }
    public function edite ()
    {

    }
};


