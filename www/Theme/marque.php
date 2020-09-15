<?php

require_once ("../../modals/ConnexionPDO.php");
require_once ("../../modals/Utilisateur.php");
error_reporting(1);
extract($_POST,EXTR_OVERWRITE);
extract($_GET,EXTR_OVERWRITE);


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




       $con = new ConnexionPDO();
      $data = $con->getDataBase();
      try{






          

                $query ="SELECT * FROM marque";;
            $ff = $data->prepare($query);
            $ff->setFetchMode(PDO::FETCH_ASSOC);
                $ff->execute();

                   $query ="SELECT * FROM entite";;
            $stmentite = $data->prepare($query);
            $stmentite->setFetchMode(PDO::FETCH_ASSOC);
                $stmentite->execute();

                   $query ="SELECT * FROM equip_type";;
            $stmtype = $data->prepare($query);
            $stmtype->setFetchMode(PDO::FETCH_ASSOC);
                $stmtype->execute();

                   $query ="SELECT * FROM ste_maintenance";;
            $stmmaintenance = $data->prepare($query);
            $stmmaintenance->setFetchMode(PDO::FETCH_ASSOC);
                $stmmaintenance->execute();

                   $query ="SELECT * FROM ste_assurance";;
            $stmassurance = $data->prepare($query);
            $stmassurance->setFetchMode(PDO::FETCH_ASSOC);
                $stmassurance->execute();

                   $query ="SELECT * FROM ste_vendeur";;
            $stmfournisseur = $data->prepare($query);
            $stmfournisseur->setFetchMode(PDO::FETCH_ASSOC);
                $stmfournisseur->execute();


               
            
              



            
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
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
    <link href="assets/js/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body style="background-color: #eee" >

  <section id="container"  >
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
        <?php



      if ($_SESSION['type']=='visiteur' ) {
        require_once ('componenets/sudemenuViewer.php'); 

        # code...
      }else{

         
     require_once ('componenets/sidemenu.php');
       }
       ?>

         
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section  id="main-content">
          <section  class="wrapper">
          	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<div  class="container">
      <div  class="row">
      <br> <br> <br>

      <?php if ($operation==marque) {?>

      
                 
                    <div class="col-md-12 mt">
                      <div class="content-panel">

                           <h4><i class="fa fa-angle-right"></i>Ajouter Une Marque </h4>
                           <hr> 

                            <div>
                              <form action="ajouterdb.php?oper=marque" method="post">
                              <input class="sizeInput" type="text" name="marque" placeholder="ajouter une marque" >
                              <button  type="submit"class="btn btn-success">ajouter 
                              <i class="fa fa-check"></i></button>
                              <hr><br>
                              </form>
                            </div>
                            <table class="table table-hover">
                            <h4><i class="fa fa-angle-right"></i>Table des  Marques </h4>
                            <hr>
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Marque</th>
                                    <th>Supprimer</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                <?php  while($line = $ff->fetch() ){ ?>
                                <tr >
                                            <td><?php echo $line['id']; ?></td>
                                            <td><?php echo $line['nom_marque']; ?></td>
                                           
                                            <td><a class="btn btn-danger btn-xs" style="cursor:pointer" href="deletedb.php?oper=marque&id=<?php echo''.$line['id'];?>" >

                                            Detaille
                                            <i  class="fa fa-trash-o"></i>
                                          </a></td>
                                 
                                    
                                </tr>

                                 <?php

                              }; ?>

                                </tbody>
                            </table>
                        </div><! --/content-panel -->
                    </div><!-- /col-md-12 -->
        </div><!-- row -->



                  
          <?php

        }elseif ($operation==entite) { ?>



                        <div class="col-md-12 mt">
                      <div class="content-panel">
                           <h4><i class="fa fa-angle-right"></i>Ajouter Une Entite </h4>
                           <hr> 

                            <div>
                              <form action="ajouterdb.php?oper=entite" method="post">
                              <input class="sizeInput" type="text" name="entite" placeholder="ajouter un entite" >
                              <button  type="submit"class="btn btn-success">ajouter 
                              <i class="fa fa-check"></i></button>
                              <hr><br>
                              </form>
                            </div>
                            <table class="table table-hover">
                            <h4><i class="fa fa-angle-right"></i>Table des  Entités </h4>
                            <hr>
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Entite</th>
                                    <th>Supprimer</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                <?php  while($line = $stmentite->fetch() ){ ?>
                                <tr >
                                            <td><?php echo $line['id']; ?></td>
                                            <td><?php echo $line['nom_entite']; ?></td>
                                           
                                            <td><a class="btn btn-danger btn-xs" style="cursor:pointer" href="deletedb.php?oper=entite&id=<?php echo''.$line['id'];?>" >

                                            Detaille
                                            <i  class="fa fa-trash-o"></i>
                                          </a></td>
                                 
                                    
                                </tr>

                                 <?php

                              }; ?>

                                </tbody>
                            </table>
                        </div><! --/content-panel -->
                    </div><!-- /col-md-12 -->
        </div><!-- row -->





        <?php
        }elseif ($operation==fournisseur) { ?>



                            <div class="col-md-12 mt">
                      <div class="content-panel">
                           <h4><i class="fa fa-angle-right"></i>Ajouter une Sté-Fournisseur </h4>
                           <hr> 

                            <div>
                              <form action="ajouterdb.php?oper=fournisseur" method="post">
                              <input class="sizeInput" type="text" name="fournisseur" placeholder="ajouter une sté-fournisseur" >
                              <button  type="submit"class="btn btn-success">ajouter 
                              <i class="fa fa-check"></i></button>
                              <hr><br>
                              </form>
                            </div>
                            <table class="table table-hover">
                            <h4><i class="fa fa-angle-right"></i>Table des  Fournisseurs </h4>
                            <hr>
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Fournisseur</th>
                                    <th>Supprimer</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                <?php  while($line = $stmfournisseur->fetch() ){ ?>
                                <tr >
                                            <td><?php echo $line['id']; ?></td>
                                            <td><?php echo $line['nom_ste']; ?></td>
                                           
                                            <td><a class="btn btn-danger btn-xs" style="cursor:pointer" href="deletedb.php?oper=fournisseur&id=<?php echo''.$line['id'];?>" >

                                            Detaille
                                            <i  class="fa fa-trash-o"></i>
                                          </a></td>
                                 
                                    
                                </tr>

                                 <?php

                              }; ?>

                                </tbody>
                            </table>
                        </div><! --/content-panel -->
                    </div><!-- /col-md-12 -->
        </div><!-- row -->





        <?php
        }elseif ($operation==maintenance) { ?>



                              <div class="col-md-12 mt">
                      <div class="content-panel">
                           <h4><i class="fa fa-angle-right"></i>Ajouter Une Sté-Maintenance </h4>
                           <hr> 

                            <div>
                              <form action="ajouterdb.php?oper=maintenance" method="post">
                              <input class="sizeInput"  type="text" name="maintenance" placeholder="ajouter une sté-maintenance" >
                              <button  type="submit"class="btn btn-success">ajouter 
                              <i class="fa fa-check"></i></button>
                              <hr><br>
                              </form>
                            </div>
                            <table class="table table-hover">
                            <h4><i class="fa fa-angle-right"></i>Table des  Stés de Maintenance</h4>
                            <hr>
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Sté-Maintenanace</th>
                                    <th>Supprimer</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                <?php  while($line = $stmmaintenance->fetch() ){ ?>
                                <tr >
                                            <td><?php echo $line['id']; ?></td>
                                            <td><?php echo $line['nom_ste']; ?></td>
                                           
                                            <td><a class="btn btn-danger btn-xs" style="cursor:pointer" href="deletedb.php?oper=maintenance&id=<?php echo''.$line['id'];?>" >

                                            Detaille
                                            <i  class="fa fa-trash-o"></i>
                                          </a></td>
                                 
                                    
                                </tr>

                                 <?php

                              }; ?>

                                </tbody>
                            </table>
                        </div><! --/content-panel -->
                    </div><!-- /col-md-12 -->
        </div><!-- row -->





        <?php
        }elseif ($operation==assurance) { ?>



                       <div class="col-md-12 mt">
                      <div class="content-panel">
                           <h4><i class="fa fa-angle-right"></i>Ajouter Une Sté-Assurance </h4>
                           <hr> 

                            <div>
                              <form action="ajouterdb.php?oper=assurance" method="post">
                              <input class="sizeInput" type="text" name="assurance" placeholder="ajouter une sté-assurance" >
                              <button  type="submit"class="btn btn-success">ajouter 
                              <i class="fa fa-check"></i></button>
                              <hr><br>
                              </form>
                            </div>
                            <table class="table table-hover">
                            <h4><i class="fa fa-angle-right"></i>Table des  Stés d'Assurance </h4>
                            <hr>
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Sté-Assurance</th>
                                    <th>Supprimer</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                <?php  while($line = $stmassurance->fetch() ){ ?>
                                <tr >
                                            <td><?php echo $line['id']; ?></td>
                                            <td><?php echo $line['nom_ste']; ?></td>
                                           
                                            <td><a class="btn btn-danger btn-xs" style="cursor:pointer" href="deletedb.php?oper=assurance&id=<?php echo''.$line['id'];?>" >

                                            Detaille
                                            <i  class="fa fa-trash-o"></i>
                                          </a></td>
                                 
                                    
                                </tr>

                                 <?php

                              }; ?>

                                </tbody>
                            </table>
                        </div><! --/content-panel -->
                    </div><!-- /col-md-12 -->
        </div><!-- row -->





        <?php
        }elseif ($operation==type) { ?>



                       <div class="col-md-12 mt">
                      <div class="content-panel">
                           <h4><i class="fa fa-angle-right"></i>Ajouter  Un Type d'Equipement </h4>
                           <hr> 

                            <div>
                              <form action="ajouterdb.php?oper=type" method="post">
                              <input class="sizeInput" type="text" name="type" placeholder="ajouter un type d'équpement" >
                              <button  type="submit"class="btn btn-success">ajouter 
                                <i class="fa fa-check"></i></button>
                              <hr><br>
                              </form>
                            </div>
                            <table class="table table-hover">
                            <h4><i class="fa fa-angle-right"></i>Table des  Types d'Equipement </h4>
                            <hr>
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Type-Equipement</th>
                                    <th>Supprimer</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                <?php  while($line = $stmtype->fetch() ){ ?>
                                <tr >
                                            <td><?php echo $line['id']; ?></td>
                                            <td><?php echo $line['type']; ?></td>
                                           
                                            <td><a class="btn btn-danger btn-xs" style="cursor:pointer" href="deletedb.php?oper=type&id=<?php echo''.$line['id'];?>" >

                                            Detaille
                                            <i  class="fa fa-trash-o"></i>
                                          </a></td>
                                 
                                    
                                </tr>

                                 <?php

                              }; ?>

                                </tbody>
                            </table>
                        </div><! --/content-panel -->
                    </div><!-- /col-md-12 -->
        </div><!-- row -->





        <?php
        }

          ?>
        
      </div>
    </div>

              <!-- page end-->
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
     
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
	<script src="assets/js/fullcalendar/fullcalendar.min.js"></script>    
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
	<script src="assets/js/calendar-conf-events.js"></script>    
  
  <script>
      //custom select box

      $(function(){
          $("select.styled").customSelect();
      });

  </script>

 <?php require_once ('componenets/footer.php'); ?>

 <style type="text/css"> 
  .sizeInput{

width: 40%;
float: left;


  }
  button {

    margin-left: 20px;
  }
</style>
  </body>
</html>
