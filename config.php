<?php
class database {
    public $pdo;
    public $localhost;
    public $userName;
    public $password;
    public $nameBd;
    public function __construct($host, $userName, $password, $nameBd)
    {
        $this->localhost = $host;
        $this->userName = $userName;
        $this->password = $password;
        $this->nameBd = $nameBd;
    }

    public function getConnection()
    {
        try{
        $this->pdo = new PDO("mysql:host=$this->localhost;dbname=$this->nameBd", $this->userName, $this->password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        echo"connexion successfull";
        }catch(PDOException $e)
        {
        echo "connexion failed : " . $e->getMessage();
        echo "mysql:host=$this->localhost;dbname=$this->nameBd";
        }
    }
};

$db = new database(host:"localhost",nameBd:"e_sport",userName:"root",password:"");
$con = $db->getConnection();