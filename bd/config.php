<?php
class database {
    private $pdo;
    private $localhost;
    private $userName;
    private $password;
    private $nameBd;
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
        // echo"connexion successfull";
        return $this->pdo;
        }catch(PDOException $e)
        {
        die ("connexion failed : " . $e->getMessage());
        }
    }
};

$db = new database(host:"localhost",nameBd:"e_sport",userName:"root",password:"");
$con = $db->getConnection();