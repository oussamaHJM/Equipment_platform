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
                $query = "INSERT INTO `marque` (`nom_marque`) VALUES ('$marque')";
            $stmt = $data->prepare($query);
            $resultat =  $stmt->execute();
            header("location:marque.php?operation=marque");


            }elseif ($_GET['oper']==entite) {
            

             $query = "INSERT INTO `entite` (`nom_entite`) VALUES ('$entite') ";
            $stmt = $data->prepare($query);
            $resultat = $stmt->execute();
            header("location:marque.php?operation=entite");




            }elseif ($_GET['oper']==type) {
            

             $query = "INSERT INTO `equip_type` (`type`) VALUES ('$type')";
            $stmt = $data->prepare($query);
            $resultat = $stmt->execute();
            header("location:marque.php?operation=type");




            }elseif ($_GET['oper']==fournisseur) {
            

             $query = "INSERT INTO `ste_vendeur` (`nom_ste`) VALUES ('$fournisseur') ";
            $stmt = $data->prepare($query);
            $resultat = $stmt->execute();
            header("location:marque.php?operation=fournisseur");




            }elseif ($_GET['oper']==maintenance) {
            

             $query = "INSERT INTO `ste_maintenance` (`nom_ste`) VALUES ('$maintenance')";
            $stmt = $data->prepare($query);
            $resultat = $stmt->execute();
            header("location:marque.php?operation=maintenance");




            }elseif ($_GET['oper']==assurance) {
            

             $query = "INSERT INTO `ste_assurance` (`nom_ste`) VALUES ('$assurance') ";
            $stmt = $data->prepare($query);
            $resultat = $stmt->execute();
            header("location:marque.php?operation=assurance");




            }
        }
        catch (PDOException $e){
            $e->getMessage();
        }