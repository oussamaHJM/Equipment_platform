<?php
/**
 * Created by PhpStorm.
 * User: oussama
 * Date: 12/03/2018
 * Time: 23:36
 */
require_once ("ConnexionPDO.php");
class Utilisateur
{
    var $connection;
    function __construct()
    {
        $this->connection = new ConnexionPDO();
    }

    function __destruct()
    {
        // TODO: Implement __destruct() method.
        $this->connection->close();
        unset($this->connection);
    }

    public function authentification($USER_LOGIN , $USER_PASSWORD)
    {
        $data = $this->connection->getDataBase();
        try{
            $query = "SELECT * FROM users WHERE LOGIN = :USER_LOGIN AND PASSWORD = :USER_PASSWORD";
            $stmt = $data->prepare($query);
            $stmt->bindParam(':USER_LOGIN',$USER_LOGIN,PDO::PARAM_STR);
            $stmt->bindParam(':USER_PASSWORD',$USER_PASSWORD,PDO::PARAM_STR);
            $stmt->execute();
            $nombre_ligne = $stmt->rowCount();
            return(($nombre_ligne>0)?1:0);
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function infoUtilisateur($USER_LOGIN)
    {
        $data = $this->connection->getDataBase();
        try{
            $query = "SELECT * FROM users WHERE LOGIN = :USER_LOGIN";
            $stmt = $data->prepare($query);
            $stmt->bindParam(':USER_LOGIN',$USER_LOGIN,PDO::PARAM_STR);
            $stmt->execute();
            $ligne = $stmt->fetch();
            return $ligne;
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function ajouterEquipement($type,$serial_number,$description,$model,$marque,$entite,$vendeur,$date_achat,$date_fin_garentie,$respo_maintenance,$date_debut_maintenance,$date_fin_maintenance,$image,$licence,$cpu,$memoire,$nombre_disk,$date_debut_assurance,$date_fin_assurance){
        $data = $this->connection->getDataBase();
        try{


            
   
    // Get text
   

    // image file directory
            if ($type == 'server' || $type == 'server BHP' || $type == 'HMC'){
                $query = "INSERT INTO `euipments` ( `SERIAL_NUMBER`, `DESCRIPTION`, `MODEL`, `MARQUE`, `TYPE`, `ENTITE`, `DATE_ACHAT`, `DATE_FIN_GARENTIE`, `VENDEUR`, `RESPO_MAINTENANCE`, `DATE_DEBUT_MAINTENANCE`, `DATE_FIN_MAINTENANCE`, `ASSURANCE`, `ID_LICENCE`, `CPU`, `MEMOIRE`, `NOMBRE_DISKS` , `DATE_D_ASSURANCE`,`DATE_F_ASSURANCE`) VALUES ( '$serial_number', '$description', '$model', '$marque', '$type', '$entite','$date_achat','$date_fin_garentie','$vendeur','$respo_maintenance','$date_debut_maintenance','$date_fin_maintenance','$image','$licence','$cpu','$memoire','$nombre_disk','$date_debut_assurance','$date_fin_assurance')";
            }
            else{
                $query = "INSERT INTO `euipments` ( `SERIAL_NUMBER`, `DESCRIPTION`, `MODEL`, `MARQUE`, `TYPE`, `ENTITE`, `DATE_ACHAT`, `DATE_FIN_GARENTIE`, `VENDEUR`, `RESPO_MAINTENANCE`, `DATE_DEBUT_MAINTENANCE`, `DATE_FIN_MAINTENANCE`, `ASSURANCE`, `ID_LICENCE`, `CPU`, `MEMOIRE`, `NOMBRE_DISKS`, `DATE_D_ASSURANCE`,`DATE_F_ASSURANCE`) VALUES ( '$serial_number', '$description', '$model', '$marque', '$type', '$entite','$date_achat','$date_fin_garentie','$vendeur','$respo_maintenance','$date_debut_maintenance','$date_fin_maintenance','$image','$licence','','','','$date_debut_assurance' ,'$date_fin_assurance'  )";
            }
            $stmt = $data->prepare($query);
            $resultat = $stmt->execute();
            if (!$resultat) {
                return 0;
            }
            else {
                return 1;
            }
        }
        catch (PDOException $e){
            $e->getMessage();
        }
    }

    public function modifierEquipement($ID,$type,$serial_number,$description,$model,$marque,$entite,$vendeur,$date_achat,$date_fin_garentie,$respo_maintenance,$date_debut_maintenance,$date_fin_maintenance,$assurance,$licence,$cpu,$memoire,$nombre_disk){
        $data = $this->connection->getDataBase();
        try{
            $query = "UPDATE `euipments` SET `SERIAL_NUMBER`='$serial_number',`DESCRIPTION`='$description',`MODEL`='$model',`MARQUE`='$marque',`ENTITE`='$entite',`DATE_ACHAT`='$date_achat',`DATE_FIN_GARENTIE`='$date_fin_garentie',`VENDEUR`='$vendeur',`RESPO_MAINTENANCE`='$respo_maintenance',`DATE_DEBUT_MAINTENANCE`='$date_debut_maintenance',`DATE_FIN_MAINTENANCE`='$date_fin_maintenance',`ASSURANCE`='$assurance',`ID_LICENCE`='$licence',`CPU`='$cpu',`MEMOIRE`='$memoire',`NOMBRE_DISKS`='$nombre_disk' WHERE ID_EQUIPMENT = $ID ";
            $stmt = $data->prepare($query);
            echo ''.$query;
            $resultat = $stmt->execute();
            if (!$resultat) {
                return 0;
            }
            else {
                return 1;
            }
        }
        catch (PDOException $e){
            $e->getMessage();
        }
    }

        public function modifierUser($id,$nom,$login,$entite,$password){
        $data = $this->connection->getDataBase();
        try{
            $query = "UPDATE `users` SET `NAME`='$nom',`LOGIN`='$login',`ENTITE`='$entite',`PASSWORD`='$password' WHERE ID =$id";
            $stmt = $data->prepare($query);
            echo ''.$query;
            $resultat = $stmt->execute();
            if (!$resultat) {
                return 0;
            }
            else {
                return 1;
            }
        }
        catch (PDOException $e){
            $e->getMessage();
        }
    }


    public function ajouterUser($id,$nom,$login,$entite,$password){
        $data = $this->connection->getDataBase();
        try{
            $query = "INSERT INTO `users` ( `NAME`, `LOGIN`, `ENTITE`, `PASSWORD`) VALUES ( '$nom', '$login', '$entite', '$password')";
            $stmt = $data->prepare($query);
            echo ''.$query;
            $resultat = $stmt->execute();
            if (!$resultat) {
                return 0;
            }
            else {
                return 1;
            }
        }
        catch (PDOException $e){
            $e->getMessage();
        }
    }


    public function suprimerEquipement($ID){
        $data = $this->connection->getDataBase();
        try{
            $query = "DELETE FROM `euipments` WHERE ID_EQUIPMENT = :ID";
            $stmt = $data->prepare($query);
            $stmt->bindParam(':ID',$ID,PDO::PARAM_INT);
            $stmt = $data->prepare($query);
            echo ''.$query;
            $resultat = $stmt->execute();
            if (!$resultat) {
                return 0;
            }
            else {
                return 1;
            }
        }
        catch (PDOException $e){
            $e->getMessage();
        }
    }

    public function returnEquipement($ID){
        $data = $this->connection->getDataBase();
        try{
            $query = "SELECT * FROM users WHERE ID_EQUIPMENT = :ID";
            $stmt = $data->prepare($query);
            $stmt->bindParam(':ID',$ID,PDO::PARAM_STR);
            $stmt->execute();
            $ligne = $stmt->fetch();
            return $ligne;
        }
        catch (PDOException $e){
            $e->getMessage();
        }
    }




}