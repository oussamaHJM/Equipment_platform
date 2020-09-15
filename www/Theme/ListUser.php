
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

  <body >

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



      if ($_SESSION['entite']=='visiteur' ) {
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





      <?php  

      require_once ("../../modals/ConnexionPDO.php");

       $con = new ConnexionPDO();
      $data = $con->getDataBase();
 
      $users;
     
    
        try{




    

          $query = "SELECT * FROM `users`";
            $stmt = $data->prepare($query);
             $users =$stmt->execute();
            
              



            
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
     ?>



<section>
  <div class="content-panel">

                            
                            <hr>
                            <br>
                            <table id="myTable" class="order-table table" class="table table-bordered table-striped table-condensed">
                            <h4><i class="fa fa-angle-right"></i> Liste Des Utilisateurs :</h4>
                            <input type="search" class="light-table-filter" data-table="order-table" class="form-control"   placeholder="Search for équipement...">
                            
                            <hr>
                                <thead>
                                <tr>
                                   
                                    <th>Nom </th>
                                    <th>Login</th>
                                    <th>Entite</th>
                                    <th>Supprimer</th>
                                    <th>Modifier</th>
                                </tr>
                                </thead>
                                <tbody>

                                  <?php  while($users = $stmt->fetch()){ ?>
                                <tr>
                                    <td><?php echo $users['NAME']; ?></td>
                                    <td><?php echo $users['LOGIN']; ?></td>
                                    <td><?php echo $users['ENTITE']; ?></td>
                                 
                                    <td><a class="btn btn-danger" href="DeleteUser.php?id=<?php echo ''.$users['ID']; ?>"  >Supprimer </a></td>
                                    <td><a class="btn btn-theme03" href="ModifierUser.php?id=<?php echo ''.$users['ID']; ?>">Modifier  </a></td>
                                </tr>

                                 <?php

                              } ?>

                               
                                </tbody>
                            </table>
                        </div>




                        
  
</section>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<script type="text/javascript" >
  
  (function(document) {
  'use strict';

  var LightTableFilter = (function(Arr) {

    var _input;

    function _onInputEvent(e) {
      _input = e.target;
      var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
      Arr.forEach.call(tables, function(table) {
        Arr.forEach.call(table.tBodies, function(tbody) {
          Arr.forEach.call(tbody.rows, _filter);
        });
      });
    }

    function _filter(row) {
      var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
      row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
    }

    return {
      init: function() {
        var inputs = document.getElementsByClassName('light-table-filter');
        Arr.forEach.call(inputs, function(input) {
          input.oninput = _onInputEvent;
        });
      }
    };
  })(Array.prototype);

  document.addEventListener('readystatechange', function() {
    if (document.readyState === 'complete') {
      LightTableFilter.init();
    }
  });

})(document);
</script>








     
        
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
  </body>
</html>


