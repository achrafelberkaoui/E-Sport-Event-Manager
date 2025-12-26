<?php 
include_once "./bd/config.php";
include_once "./Views/console.php";
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
        
        $leTouts=$this->con->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $leTouts;
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
    public function checkId(){
        $sql ="SELECT id FROM club WHERE id = :id";

        $stmt = $this->con->prepare($sql);
        $stmt->execute([
            ":id" => $this->id
        ]);
       return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //=============DELETE==========
    public function delete ()
    {
    
        if($this->checkId()){
        $sql = "DELETE FROM club WHERE id = :id";
        $stmt = $this->con->prepare($sql);

        return $stmt->execute([
            ":id" => $this->id
        ]);
        }
        echo "id n'exist pas";
    }

    //=============EDIT==========
    public function edit ()
    {
    if($this->checkId()){
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
    echo "id n'exist pas";
    }
};


