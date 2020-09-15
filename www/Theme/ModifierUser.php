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
<?php
require_once ('../../modals/ConnexionPDO.php');
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
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
        
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
      <?php require_once ('componenets/topmenu.php'); ?>
      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <?php require_once ('componenets/sidemenu.php'); ?>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Modifier Un Utilisateur</h3>
            <?php
            $con = new ConnexionPDO();
            $data = $con->getDataBase();
            try{
                $query = "SELECT * FROM `users` WHERE ID=:ID";
                $stmt = $data->prepare($query);
                $stmt->bindParam(':ID',$_GET['id'],PDO::PARAM_STR);
                $stmt->execute();
                $ligne = $stmt->fetch();

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

                      <h4 class="mb"><i class="fa fa-angle-right"></i>Modifier les  Information de l'Utilisateur </h4>
                      <form class="form-horizontal style-form" action="../../controller/gestionFomulaire.php?operation=modifierUser" method="post">


                           
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nom Utilisateur :</label>
                              <div class="col-sm-10">
                                  <input type="text" name="nom" class="form-control" value="<?php echo "".$ligne['NAME']; ?>">
                                  <input type="text" name="id"  value="<?php echo "".$ligne['ID']; ?>" hidden>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Login :</label>
                              <div class="col-sm-10">
                                  <input type="text" name="login" class="form-control" value="<?php echo "".$ligne['LOGIN']; ?>">
                              </div>
                          </div>
                           <div class='form-group' >
                              <label class='col-sm-2 col-sm-2 control-label'>Entité</label>
                              <div class='col-sm-10'>
                                  <select  name='entite' class='form-control'>
                                    <option value="<?php echo "".$ligne['ENTITE']; ?>" disabled><?php echo "".$ligne['ENTITE']; ?></option>
                                    <option value='linux/unix'>Linux/Unix</option>
                                    <option value='storage/backup'>storage/Backup</option>
                                    <option value='backOffice'>Back-Office</option>
                                    <option value='virtualisation'>Virtualisation</option>
                                  </select>
                              </div>
                          </div>
                         
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Mot de Pass :</label>
                              <div class="col-sm-10">
                                  <input type="password" name="password" class="form-control" value="<?php echo "".$ligne['PASSWORD']; ?>">
                              </div>
                          </div>
                          
                         
                          <?php
                          if (isset($_GET["resultat"]))
                          { ?>
                              <?php
                              if ($_GET["resultat"] == 1){
                                  $resultat = "Operation terminée ave succés!";
                              }
                              if ($_GET["resultat"] == 0){
                                  $resultat = "Une erreur est survenue lors de la derniere operation";
                              }
                              echo "<div><font color='red'>".$resultat."</font></div>"; ?>
                          <?php }
                          ?>
                          <input  class="ajouter" name="ajouter" type="submit" value="Modifier" onclick="save()">
                      </form>
                      
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
      <?php require_once ('componenets/footer.php'); ?>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>

    <script >

      function selectEnt(objSelectSrc) {

 // ex test sur la valeur
 if(objSelectSrc == "server" || objSelectSrc == "serverbhp" || objSelectSrc == "hmc") {
  
   document.getElementById("bano").style.display = "block";
   document.getElementById("bano1").style.display = "block";
   document.getElementById("bano2").style.display = "block";
 } else {
   document.getElementById("bano1").style.display = "none";
    document.getElementById("bano2").style.display = "none";
     document.getElementById("bano").style.display = "none";

 }
};
   
    </script>
    <script> 
    function save(){
    

/*     a = lement.getElementByTagName("serialNum");
     a1 = getElementByTagName("description");
     a2 = getElementByTagName("model");
     a3 = getElementByTagName("marque");
     a4 = getElementByTagName("type");
     a5 = getElementByTagName("date_fin_garantie");
     a6 = getElementByTagName("date_achat");
     a7 = getElementByTagName("vendeur");
     a8 = getElementByTagName("respo_maintenance");
     a9 = getElementByTagName("date_d_maint");
     a10 = getElementByTagName("date_f_maint");
     a11 = getElementByTagName("assurance");
     a13 = getElementByTagName("licence");
*/
    //if(a && a1 && a2 && a3 && a4 && a5 && a6 && a7 && a8 && a9 && a10 && a11 && a12 && a13  )
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

  </body>
</html>
