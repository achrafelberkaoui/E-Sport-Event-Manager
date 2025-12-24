<?php 
include "./bd/config.php";
include"./Views/console.php";
class Club {
    private $con, $id, $nameBd, $name, $ville, $created_at;
    function __construct(PDO $con)
    {
        $this->con = $con;

    }

    // name/getter/setter
        public function setName($name)
    {
        $this->name = $name;
    }
        public function getName()
    {
        return $this->name;
    }
 
    // ville/getter/setter
    public function setVille($vil)
    {
        $this->ville = $vil;
    }
    public function getVille()
    {
        return $this->ville;
    }


    // ID/getter/setter
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }


    // date/getter/setter
    public function setDate($date)
    {
         $this->created_at = $date;
    }
    public function getDate()
    {
        return $this->created_at;
    }

    //CRUD
    //=============GET==========
    public function getAll ()
    {
        $sql = "SELECT * FROM club ORDER BY id DESC";
        return $this->con->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    //=============CREAT==========
    public function creatClub ()
    {
        $sql = "INSERT INTO club(Name, Ville, Date_Creation)VALUES(:name, :ville, :created_at)";
        $stmt = $this->con->prepare($sql);

        return $stmt->execute([
            ":name" => $this->name,
            ":ville" => $this->ville,
            ":created_at" => $this->created_at

        ]);
    }

    //=============DELETE==========
    public function delete ()
    {
        $sql = "DELETE FROM club WHERE id = :id";
        $stmt = $this->con->prepare($sql);

        return $stmt->execute([
            ":id" => $this->id
        ]);
    }

    //=============EDIT==========
    public function edit ()
    {
        $sql = "UPDATE club 
                SET Name = :name, Ville = :ville, 
                Date_Creation = :created_at
                WHERE id = :id";
        $stmt = $this->con->prepare($sql);
    return $stmt->execute([  
    ":name" => $this->name,
    ":ville" => $this->ville,
    ":created_at" => $this->created_at,
    ":id" => $this->id
    ]);

      
    }
};

// $club = new Club($con);
// print_r($club->);


$club = new Club($con);
// $console = new Console();
// echo "Nom du club: ";
//     $name = $console->input("Entre votre choix");;

// echo "Ville du club: ";
//     $ville = $console->input("Entre votre choix");;

// echo "Date de création (YYYY-MM-DD): ";
//     $date = $console->input("Entre votre choix");

// $club->setName($name);
// $club->setVille($ville);
// $club->setDate($date);
// $club->setId(1);

 // $club->edit ();
// $club->delete ();