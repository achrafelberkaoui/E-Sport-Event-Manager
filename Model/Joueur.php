<?php 
class Equipe {

    public $Pseudo, $Role, $Salaire;
    function __construct($Pseudo, $Role, $Salaire)
    {
        $this->Pseudo = $Pseudo;
        $this->Role = $Role;
        $this->Salaire = $Salaire;

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


