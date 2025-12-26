<?php
include_once "./bd/config.php";
include "../Participant.php";
class Joueur extends Participant {

    private $pseudo, $role, $salaire, $equipe_id;

    public function __construct(PDO $con, $pseudo, $role, $salaire, $equipe_id)
    {
        parent::__construct($pseudo);
        $this->con = $con;
        $this->pseudo = $pseudo;
        $this->role = $role;
        $this->salaire = $salaire;
        $this->equipe_id = $equipe_id;
    }

    public function create()
    {	
        $sql = "INSERT INTO joueur(Pseudo, Rôle, Salaire, EquipeID)
                VALUES(:p, :r, :s, :e)";
        $stmt = $this->con->prepare($sql);
        return $stmt->execute([
            ":p"=>$this->pseudo,
            ":r"=>$this->role,
            ":s"=>$this->salaire,
            ":e"=>$this->equipe_id
        ]);
    }

    // jointure
    public function getAll()
    {
        $sql = "
        SELECT J.Pseudo, J.Rôle, J.Salaire, E.Name, E.jeu 
        FROM joueur AS j
        join equipe E ON J.EquipeID = E.id";
        
        return $this->con->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
