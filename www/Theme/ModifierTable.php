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
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <link href="assets/css/table-responsive.css" rel="stylesheet">

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
          	<h3><i class="fa fa-angle-right"></i>  Modifier les équipements : </h3>
		  		<div class="row mt">
			  		<div class="col-lg-12">
                      <div class="content-panel">
                      <h4><i class="fa fa-angle-right"></i>Liste des équipement :</h4>
                       <input type="search" class="light-table-filter" data-table="order-table" class="form-control"  onkeyup="myFunction()" placeholder="Search for équipement...">
                       <br> <br>
                          <section id="unseen">
                            <table id="myTable"  class="order-table table" class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  <th>Equipement</th>
                                  <th>Serial Number</th>
                                  <th class="numeric">Modele</th>
                                  <th class="numeric">Marque</th>
                                  <th class="numeric">Type</th>
                                  <th class="numeric">Vendeur</th>
                                  <th class="numeric">Garantie</th>
                                  <th class="numeric">Respo Maintenance</th>
                                  <th class="numeric">Date fin Maintenance</th>
                              </tr>
                              </thead>
                              <tbody>

                                  <?php
                                  $con = new ConnexionPDO();
                                  $data = $con->getDataBase();
                                  try{
                                      $entite = $_SESSION['entite'];
                                      if ($entite == 'admin') {
                                         $select = $data->prepare("SELECT * FROM euipments");

                                        # code...
                                      } else{
                                      $select = $data->prepare("SELECT * FROM euipments WHERE ENTITE = '$entite'");
                                      }

                                      $select->setFetchMode(PDO::FETCH_ASSOC);
                                      $select->execute();
                                  }
                                  catch (PDOException $e){
                                      $e->getMessage();
                                  }

                                  while($data=$select->fetch()){
                                  ?>
                              <tr  style="cursor:pointer"  onclick="document.location.href='ModifierEquip.php?id=<?php echo''.$data['ID_EQUIPMENT'] ?>'" >
                                 <td><?php echo $data['TYPE']; ?></td>
                                            <td><?php echo $data['SERIAL_NUMBER']; ?></td>
                                            <td><?php echo $data['MODEL']; ?></td>
                                            <td><?php echo $data['MARQUE']; ?></td>
                                            <td><?php echo $data['VENDEUR']; ?></td>
                                            <td><?php echo $data['RESPO_MAINTENANCE']; ?></td>
                                            <td><?php echo $data['DATE_FIN_GARENTIE']; ?></td>
                                            <td><?php echo $data['DATE_ACHAT']; ?></td>
                              </tr>
                              <?php

                              } ?>

                              </tbody>
                          </table>
                          </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->
		  	</div><!-- /row -->


                      <!-- /content-panel -->
                 <!-- /col-lg-12 -->
            <!-- /row -->

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <?php require_once ('componenets/footer.php'); ?>
      <!--footer end-->
  </section>

    <script>
/*function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
};*/

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

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->


  </body>
</html>
