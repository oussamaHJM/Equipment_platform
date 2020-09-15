<?php
/**
 * Created by PhpStorm.
 * User: oussama
 * Date: 17/07/2018
 * Time: 23:15
 */

class ConnexionPDO extends PDO
{
    private $dbtype = "mysql";
    private $dbhost = "localhost";
    private $dbname = "stage";
    private $dbuser = "root";
    private $dbpass = "";
    private $erreur = "";
    private $db;
    public $conn;

    public function __construct()
    {
        if (!$this->conn)
        {
            try{
                $this->db = new PDO('mysql:host='.$this->dbhost.';dbname='.$this->dbname,$this->dbuser,$this->dbpass);
                $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $this->db->exec('SET NAMES utf8');
                $this->conn = true;

            }
            catch (PDOException $e){
                $this->erreur = $e->getMessage();
                $this->conn = false;
            }
        }
        else
        {
            $this->conn = true;
        }

    }

    public function getDataBase(){
        return $this->db;
    }

    public function getErreur(){
        die($this->erreur);
    }

    public function close(){
        $this->db = null;
    }
}