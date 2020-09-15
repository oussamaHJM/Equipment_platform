


<?php
/**
 * Created by PhpStorm.
 * User: oussama
 * Date: 18/03/2018
 * Time: 21:58
 */


require_once ("../modals/ConnexionPDO.php");
require_once ("../modals/Utilisateur.php");
error_reporting(1);
extract($_POST,EXTR_OVERWRITE);
extract($_GET,EXTR_OVERWRITE);
//session_start();
$utilisateur = new Utilisateur();


if($operation == 'connexion')
{
    session_start();

    //protection against XSS attacks

    $_SESSION['login'] = htmlspecialchars($Login);
    $_SESSION['password'] = htmlspecialchars(md5($Password));
    $_SESSION['authentification'] = $utilisateur->authentification($_SESSION['login'],$_SESSION['password']);

    if ($_SESSION['authentification'] == 1)
    {
        session_regenerate_id(true);
        $ligne = $utilisateur->infoUtilisateur($_SESSION['login']);
        $_SESSION['ID'] = $ligne['ID'];
        //$_SESSION['Name'] = $ligne['USER_NAME'];
        $_SESSION['login'] = $ligne['LOGIN'];
        $_SESSION['password'] = $ligne['PASSWORD'];
        $_SESSION['entite'] = $ligne['ENTITE'];
        $_SESSION['type'] = $ligne['TYPE'];

        header('location: ../www/Theme/index.php');

    }
    else
    {
        header('location: ../www/index.php?resultat=0');
    }
}

if ($operation == 'deconnexion')
{
    session_start();
    session_destroy();
    echo "<script language=Javascript>alert('vous étes déconnecter ooops !');</script>";
    echo '<script language=Javascript>document.location.replace("../www/index.php");</script>';
}

if ($operation == 'ajouterEquipement'){

 
  

    
    session_start();
   
   if ($_SESSION['login'] == 'admin') {
     $resultat = $utilisateur->ajouterEquipement($type,$serial_number,$description,$model,$marque,$entite,$vendeur,$date_achat,$date_fin_garentie,$respo_maintenance,$date_debut_maintenance,$date_fin_maintenance,$image,$licence,$cpu,$memoire,$nombre_disk,$date_debut_assurance,$date_fin_assurance);
       # code...
   }
   else {

    $resultat = $utilisateur->ajouterEquipement($type,$serial_number,$description,$model,$marque,$_SESSION['entite'],$vendeur,$date_achat,$date_fin_garentie,$respo_maintenance,$date_debut_maintenance,$date_fin_maintenance,$image,$licence,$cpu,$memoire,$nombre_disk,$date_debut_assurance,$date_fin_assurance);
   }
    // Create database connection
  $db = mysqli_connect("localhost", "root", "", "stage");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['ajouter'])) {
    // Get image name
    $image = $_FILES['image']['name'];
    // Get text
    

    // image file directory
    $target = "../www/Theme/images/".basename($image);

    $sql = "UPDATE `euipments` SET `ASSURANCE`='$image' WHERE `SERIAL_NUMBER`='$serial_number'";
    // execute query
    mysqli_query($db, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $msg = "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }
  }
    header("location:../www/Theme/AjouterEquip.php?resultat=".$resultat);
}

if($operation == 'modifier'){
    session_start();
    $resultat = $utilisateur->modifierEquipement($id,$type,$serial_number,$description,$model,$marque,$_SESSION['entite'],$vendeur,$date_achat,$date_fin_garentie,$respo_maintenance,$date_debut_maintenance,$date_fin_maintenance,$assurance,'',$cpu,$memoire,$nombre_disk);
    header("location:../www/Theme/ModifierTable.php?resultat=".$resultat);
}

if($operation == 'modifierUser'){
    session_start();
    $resultat = $utilisateur->modifierUser($id,$nom,$login,$entite,$password);
    header("location:../www/Theme/index.php?resultat=".$resultat);
}

if($operation == 'ajouterUser'){
    session_start();
    $resultat = $utilisateur->ajouterUser($id,$nom,$login,$entite,$password);
    header("location:../www/Theme/index.php?resultat=".$resultat);
}


if ($opertaion == 'suprimer') {
   /* echo "hhhhhhhhhhhhhhhh";
     header("refresh:1; url=index.php")

    $utilisateur->suprimerEquipement($_GET['id']);
     $data = $this->connection->getDataBase();
        try{
            $query = "DELETE FROM `euipments` WHERE ID_EQUIPMENT = :ID";
            $stmt = $data->prepare($query);
            $stmt->bindParam(':ID',$ID,PDO::PARAM_INT);
            $stmt = $data->prepare($query);
            echo ''.$query;
            $resultat = $stmt->execute();

    # code*/}

unset($utilisateur);