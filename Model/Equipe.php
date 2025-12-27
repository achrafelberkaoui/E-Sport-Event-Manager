<?php 
include_once "./bd/config.php";
include_once "./Participant.php";
class Equipe extends Participant{
    private $jeu, $club_id;

       function __construct(PDO $con,$name, $jeu ,$club_id)
    {
        $this->con = $con;
        parent::__construct($name);
        $this->name = $name;
        $this->jeu = $jeu; 
        $this->club_id = $club_id;

    }

    public function setId($id)
    {
        $this->id = $id;
    }

    //CRUD
    //=============GET==========
    public function getAll ()
    {
        $sql = "SELECT equipe.id, equipe.Name, equipe.Jeu ,club.Name as club_name
        FROM equipe
        JOIN club ON club.id = equipe.club_id;";
        return $this->con->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    //=============CREAT==========
    public function creatEquipe ()
    {
        $sql = "INSERT INTO equipe(Name, Jeu, club_id)VALUES(:name, :jeu, :club_id)";
        $stmt = $this->con->prepare($sql);

        return $stmt->execute([
            ":name" => $this->name,
            ":jeu" => $this->jeu,
            ":club_id" => $this->club_id
        ]);
    }

    //=============DELETE==========
    public function delete ()
    {
        $sql = "DELETE FROM equipe WHERE id = :id";
        $stmt = $this->con->prepare($sql);

        return $stmt->execute([
            ":id" => $this->id
        ]);
    }

    //=============EDIT==========
    public function edit ()
    {
        $sql = "UPDATE equipe 
                SET Name = :name, Jeu = :jeu, 
                club_id = :club_id
                WHERE id = :id";
        $stmt = $this->con->prepare($sql);
    return $stmt->execute([  
    ":name" => $this->name,
    ":jeu" => $this->jeu,
    ":club_id" => $this->club_id,
    ":id" => $this->id
    ]);

      
    }
};