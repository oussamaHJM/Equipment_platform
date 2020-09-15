<?php
require_once ("../../modals/ConnexionPDO.php");
require_once ("../../modals/Utilisateur.php");
error_reporting(1);
extract($_POST,EXTR_OVERWRITE);
extract($_GET,EXTR_OVERWRITE);
//session_start();
$utilisateur = new Utilisateur();

 $data = $utilisateur->connection->getDataBase();
        try{
            $query = "DELETE FROM `euipments` WHERE ID_EQUIPMENT ={$_GET['id']} ";
            $stmt = $data->prepare($query);
           
            echo ''.$query;
            $resultat = $stmt->execute();
            header("location:SupprimerEquip.php?resultat".$resultat);
        }
        catch (PDOException $e){
            $e->getMessage();
        }