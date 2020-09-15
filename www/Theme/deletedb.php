<?php
require_once ("../../modals/ConnexionPDO.php");
require_once ("../../modals/Utilisateur.php");
error_reporting(1);
extract($_POST,EXTR_OVERWRITE);
extract($_GET,EXTR_OVERWRITE);
//session_start();


 
            $con = new ConnexionPDO();
            $data = $con->getDataBase();
        try{
            
            if ($_GET['oper']==marque) {
                $query = "DELETE FROM `marque` WHERE  ID ={$_GET['id']} ";
            $stmt = $data->prepare($query);
           
            echo ''.$query;
            $resultat = $stmt->execute();
            header("location:marque.php?operation=marque");


            }elseif ($_GET['oper']==entite) {
            

             $query = "DELETE FROM `entite` WHERE  ID ={$_GET['id']} ";
            $stmt = $data->prepare($query);
           
            echo ''.$query;
            $resultat = $stmt->execute();
            header("location:marque.php?operation=entite");




            }elseif ($_GET['oper']==type) {
            

             $query = "DELETE FROM `equip_type` WHERE  ID ={$_GET['id']} ";
            $stmt = $data->prepare($query);
           
            echo ''.$query;
            $resultat = $stmt->execute();
            header("location:marque.php?operation=type");




            }elseif ($_GET['oper']==fournisseur) {
            

             $query = "DELETE FROM `ste_vendeur` WHERE  ID ={$_GET['id']} ";
            $stmt = $data->prepare($query);
           
            echo ''.$query;
            $resultat = $stmt->execute();
            header("location:marque.php?operation=fournisseur");




            }elseif ($_GET['oper']==maintenance) {
            

             $query = "DELETE FROM `ste_maintenance` WHERE  ID ={$_GET['id']} ";
            $stmt = $data->prepare($query);
           
            echo ''.$query;
            $resultat = $stmt->execute();
            header("location:marque.php?operation=maintenance");




            }elseif ($_GET['oper']==assurance) {
            

             $query = "DELETE FROM `ste_assurance` WHERE  ID ={$_GET['id']} ";
            $stmt = $data->prepare($query);
           
            echo ''.$query;
            $resultat = $stmt->execute();
            header("location:marque.php?operation=assurance");




            }
        }
        catch (PDOException $e){
            $e->getMessage();
        }