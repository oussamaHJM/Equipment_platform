
  

<?php
session_start();
//verifier si une variable enregistrer dans la session
if ($_SESSION['authentification']!=1) {
    echo '<body bgcolor="#FFFFFF"></body>';
    echo "<script language=JavaScript>alert('cette page est reservée aux administrateurs Seulement (-_-!)')</script>";
    echo '<script language=Javascript>document.location.replace("../index.php");</script>';
}
else {/*
    if ($_SESSION['entite'] == "Animateur") {
        header('location: ../../View/AnimateurPage.php');
    }
    elseif ($_SESSION['type'] == "Animateur") {
        header('location: ../../View/AnimateurPage.php');
    }
    elseif ($_SESSION['type'] == "Utilisateur") {
        header('location: ../../View/welcome.html');
    }*/
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>OCP   | Plateform</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <?php require_once ('componenets/topmenu.php');  ?>
      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <?php require_once ('componenets/sidemenu.php'); ?>
      <!--sidebar end-->
      <?php
require_once ('../../modals/ConnexionPDO.php');
?>
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Ajouter Un equipement</h3>
              <?php
            $con = new ConnexionPDO();
            $data = $con->getDataBase();
            try{
                $query = "SELECT * FROM `equip_type`";
                $stmt = $data->prepare($query);
                $stmt->execute();

                $query = "SELECT * FROM `marque`";
                $stmtMarque = $data->prepare($query);
                $stmtMarque->execute();

                $query = "SELECT * FROM `ste_vendeur`";
                $stmtVendeur = $data->prepare($query);
                $stmtVendeur->execute();

                $query = "SELECT * FROM `ste_maintenance`";
                $stmtMaintenance = $data->prepare($query);
                $stmtMaintenance->execute();


                $query = "SELECT * FROM `ste_assurance`";
                $stmtAssurance = $data->prepare($query);
                $stmtAssurance->execute();

                $query = "SELECT * FROM `entite`";
                $stmtEntite = $data->prepare($query);
                $stmtEntite->execute();
                
            }
            catch (PDOException $e){
                $e->getMessage();
            }
            ?>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                    <div class="sghir">

                      <h4 class="mb"><i class="fa fa-angle-right"></i> Information d'equipement</h4>
                      <form class="form-horizontal style-form" action="../../controller/gestionFomulaire.php?operation=ajouterEquipement" method="post" enctype="multipart/form-data">
                           <div   class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" >Select equipement *</label>
                              <div class="col-sm-10">
                                  <select name="type" class="form-control" onchange="selectEnt(this.value)" id="selectEquip">
                                    <?php 

                                    while ($ligne = $stmt->fetch()) {
                                      # code...
                                      echo "<option id='".$ligne['type']."' value='".$ligne['type']."' >".$ligne['type']."</option> \n  ";
                                    };


                                    ?>
                                
                                  </select>
                              </div>
                          </div>
                            <div id="bano" class="form-group" style="display: none">
                              <label class="col-sm-2 col-sm-2 control-label" >CPU</label>
                              <div class="col-sm-10">
                                  <input  type="text" name="cpu" class="form-control" >
                              </div>
                          </div> 
                          <div  id="bano1"class="form-group" style="display: none" >
                              <label class="col-sm-2 col-sm-2 control-label"  >Memoire</label>
                              <div class="col-sm-10">
                                  <input  type="text" name="memoire" class="form-control">
                              </div>
                          </div>
                          <div id="bano2" class="form-group" style="display: none" >
                              <label class="col-sm-2 col-sm-2 control-label" >Nombre de Disks</label>
                              <div class="col-sm-10">
                                  <input  type="text" name="nombre_disk" class="form-control">
                              </div>
                          </div>
                          <?php 

                          if($_SESSION['login']=='admin'){

                            ?>
                            <div class='form-group' >
                              <label class='col-sm-2 col-sm-2 control-label'>Entité *</label>
                              <div class='col-sm-10'>
                                   <select name="entite" class="form-control"  id="selectEntite">
                                    <?php 

                                    while ($ligne = $stmtEntite->fetch()) {
                                      # code...
                                      echo "<option id='".$ligne['nom_entite']."' value='".$ligne['nom_entite']."' >".$ligne['nom_entite']."</option> \n  ";
                                    };


                                    ?>
                                
                                  </select>
                               
                              </div>
                          </div>
                          <?php
                          }

                          ?>
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Marque *</label>
                              <div class="col-sm-10">
                                   <select name="marque" class="form-control"  id="selectMarque">
                                    <?php 

                                    while ($ligne = $stmtMarque->fetch()) {
                                      # code...
                                      echo "<option id='".$ligne['nom_marque']."' value='".$ligne['nom_marque']."' >".$ligne['nom_marque']."</option> \n  ";
                                    };


                                    ?>
                                  </select>
                              </div>
                          </div>
                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Model *</label>
                              <div class="col-sm-10">
                                  <input required="required" type="text" name="model" class="form-control">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" >Serial Number *</label>
                              <div class="col-sm-10">
                                  <input required="required" type="text" name="serial_number" class="form-control"   >
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Description *</label>
                              <div class="col-sm-10">
                                  <input required="required" type="text" name="description" class="form-control">
                              </div>
                          </div>
                        
                         
                          <div class="form-group" >
                              <label class="col-sm-2 col-sm-2 control-label">Vendeur *</label>
                              <div class="col-sm-10">
                                  <select name="vendeur" class="form-control"  id="selectVendeur">
                                    <?php 

                                    while ($ligne = $stmtVendeur->fetch()) {
                                      # code...
                                      echo "<option id='".$ligne['nom_ste']."' value='".$ligne['nom_ste']."' >".$ligne['nom_ste']."</option> \n  ";
                                    };


                                    ?>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Date d'achat *</label>
                              <div class="col-sm-10">
                                  <input required="required" type="date" name="date_achat" class="form-control">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Date fin de garantie *</label>
                              <div class="col-sm-10">
                                  <input required="required" type="date" name="date_fin_garentie" id="date_fin_garentie" class="form-control" onchange="handler(event);" >

                              </div>
                          </div> 


                             <!--  si l'equipement hors de la garantie on saisir les info de maintenance     -->
                            

                            <script type="text/javascript">
                              function handler(e){
                                var date = document.getElementById('date_fin_garentie').value ;

                                var today = new Date();
                                var date = new Date(date);
                                if(today > date){

                                    document.getElementById('maintDiv').style.display = 'block';
                                }
                                else {

                                   document.getElementById('maintDiv').style.display = 'none';
                                }
                                                          }

                            </script>


            <!--la fin des champ obligatoir -->


        
                          

                         <div id="maintDiv" style="display: none;">
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Respo maintenance</label>
                              <div class="col-sm-10">
                                  <select name="respo_maintenance" class="form-control"  id="selectMaintenance">
                                    <?php 

                                    while ($ligne = $stmtMaintenance->fetch()) {
                                      # code...
                                      echo "<option id='".$ligne['nom_ste']."' value='".$ligne['nom_ste']."' >".$ligne['nom_ste']."</option> \n  ";
                                    };


                                    ?>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Date debut maintenance</label>
                              <div class="col-sm-10">
                                  <input type="date" name="date_debut_maintenance" class="form-control">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Date fin Maintenance</label>
                              <div class="col-sm-10">
                                  <input  type="date" name="date_fin_maintenance" class="form-control">
                              </div>
                          </div>
                         </div>



                         <!--  si il est assurer en saisi les info d'assurance     -->
                         <div class="form-group" >
                              <label class="col-sm-2 col-sm-2 control-label">Assuré ?</label>
                              <div class="col-sm-10">
                                 <select name="assurOrNot" id="assurOrNot" class="form-control" onchange="assurChek(event);">
                                <option value="oui">Assuré</option>
                                <option value="non"> Non Assuré</option>
                              </select>
                              </div>
                          </div>


                         
                          <script type="text/javascript">
                            function assurChek(e){

                             var test = document.getElementById('assurOrNot').value;
                             if (test == 'oui') {

                                document.getElementById('assurDiv').style.display = 'block';

                             }else {

                              document.getElementById('assurDiv').style.display = 'none';
                             }

                            }
                          </script>
    


                              
                                <!--assurance-->


                           <div id="assurDiv" style="display: none;">
                            <div class="form-group" >
                              <label class="col-sm-2 col-sm-2 control-label">Societé d'Assurance *</label>
                              <div class="col-sm-10">
                                  <select name="assureur" class="form-control"  id="selectAssureur">
                                    <?php 

                                    while ($ligne = $stmtAssurance->fetch()) {
                                      # code...
                                      echo "<option id='".$ligne['nom_ste']."' value='".$ligne['nom_ste']."' >".$ligne['nom_ste']."</option> \n  ";
                                    };


                                    ?>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Assurance *</label>

                                       <input    name="size" value="1000000" hidden="true">
                                    <div  class="col-sm-10">
                                            <input required="required" type="file" name="image" class="form-control">
                                    </div>
                                          
                            </div>

                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Date debut d'assurance *</label>
                              <div class="col-sm-10">
                                  <input required="required" type="date" name="date_debut_assurance" class="form-control">
                              </div>
                          </div>
                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Date fin d'assurance *</label>
                              <div class="col-sm-10">
                                  <input required="required" type="date" name="date_fin_assurance" class="form-control">
                              </div>
                          </div>
                             

                           </div>



                          <div id="licence" class="form-group"  style="display: none">
                              <label class="col-sm-2 col-sm-2 control-label">Licence</label>
                              <div class="col-sm-10">
                                  <input type="text" name="licence" class="form-control">
                              </div>
                          </div>
                          <input  class="ajouter" name="ajouter" type="submit" value="Ajouter" onclick="save()">
                          <?php
                          if (isset($_GET["resultat"]))
                          { ?>
                              <?php
                              if ($_GET["resultat"] == 1){
                                  $resultat = "Operation terminée avec succés!";
                              }
                              if ($_GET["resultat"] == 0){
                                  $resultat = "Une erreur est survenue lors de la derniere operation";
                              }
                              echo "<div><font color='red'>".$resultat."</font></div>"; ?>
                          <?php }
                          ?>
                      </form>
                      <div class="form-group">
                                        
                    
                      
                    </div>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          	
          	<!-- INLINE FORM ELELEMNTS -->
          	<!-- /col-lg-12 -->
          		
          	
          	
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
   <?php

    if($_SESSION['entite']=="linux/unix"){
    echo "<script>
  $(document).ready(function() {

  
    
      document.getElementById('Server').style.display = 'block';  
      document.getElementById('Server HMC').style.display = 'block'; 
      document.getElementById('Software').style.display = 'block';
      document.getElementById('Ecran').style.display = 'block'; 
      document.getElementById('Ecran HMC').style.display = 'block';
      
     
      
    
      
      

});
    </script>";
               }

 elseif($_SESSION['entite']=="storage/backup"){
    echo "<script>
  $(document).ready(function() {

  
    
      document.getElementById('Robot').style.display = 'block';  
      document.getElementById('Baie Stockage').style.display = 'block';  
      document.getElementById('Switsh').style.display = 'block';  
      document.getElementById('Switsh SAN').style.display = 'block';
      document.getElementById('VTL').style.display = 'block';
       document.getElementById('Software').style.display = 'block';
      

});
    </script>";
               }

               elseif($_SESSION['entite']=="admin"){
    echo "<script>
  $(document).ready(function() {

  
    
      document.getElementById('Server').style.display = 'block';  
      document.getElementById('Server HMC').style.display = 'block';  
      document.getElementById('Switsh SAN').style.display = 'block';  
      document.getElementById('Switsh').style.display = 'block';
      document.getElementById('VTL').style.display = 'block';
      document.getElementById('Ecran').style.display = 'block';
      document.getElementById('Ecran HMC').style.display = 'block';
      document.getElementById('Baie Stockage').style.display = 'block';
      document.getElementById('Software').style.display = 'block';
      document.getElementById('Robot').style.display = 'block';
      
      

});
    </script>";
               }

   elseif($_SESSION['entite']=="vitualisation"){
    echo "<script>
  $(document).ready(function() {

  
    
      document.getElementById('Server').style.display = 'block';
      document.getElementById('Server HMC').style.display = 'block';
      document.getElementById('Ecran HMC').style.display = 'block';  
      document.getElementById('Ecran').style.display = 'block';  
      document.getElementById('Blade').style.display = 'block';  
       document.getElementById('Software').style.display = 'block';
      
      

});
    </script>";
               }

   elseif($_SESSION['entite']=="backOffice"){
    echo "<script>
  $(document).ready(function() {

  
     document.getElementById('Software').style.display = 'block';
      document.getElementById('Server').style.display = 'block';  
      document.getElementById('Server HMC').style.display = 'block';  
       document.getElementById('Ecran').style.display = 'block';
        document.getElementById('Ecran HMC').style.display = 'block';
 
      
      

});
    </script>";
               }



    ?>

    <script >

      function selectEnt(objSelectSrc) {

 // ex test sur la valeur
 if(objSelectSrc == "Server" || objSelectSrc == "Server HMC" ) {
  
   document.getElementById("bano").style.display = "block";
   document.getElementById("bano1").style.display = "block";
   document.getElementById("bano2").style.display = "block";}

   else{


          if( objSelectSrc == "Software" ){
              document.getElementById("licence").style.display = "block";
              document.getElementById("bano1").style.display = "none";
    document.getElementById("bano2").style.display = "none";
     document.getElementById("bano").style.display = "none";



              }
  
    

   

  else {
   document.getElementById("bano1").style.display = "none";
    document.getElementById("bano2").style.display = "none";
     document.getElementById("bano").style.display = "none";
     document.getElementById("licence").style.display = "none";

     /* document.getElementById('o4').style.display = 'block';  
      document.getElementById('o5').style.display = 'block';
      document.getElementById('o6').style.display = 'block';  
      document.getElementById('o7').style.display = 'block';  
      document.getElementById('o8').style.display = 'block';  
      document.getElementById('o9').style.display = 'block';  
      document.getElementById('o10').style.display = 'block'; */   
    

 }
 } 
};
   
    </script>
    <script> 
    function save(){
      if(document.getElementByTagName("i") != null)
{          alert("l'equiêment est bien enregistré !!");
}else{
  alert("un champ ou plusieur champs sont vides !!!");
 
}
   }; 


    </script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
	
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	<script src="assets/js/form-component.js"></script>    
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>
  <?php require_once ('componenets/footer.php');
       ?>
  </body>
</html>
