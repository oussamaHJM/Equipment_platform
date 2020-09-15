
<link rel="stylesheet" href="assets/css/c3.css">
   <script src="https://unpkg.com/recharts/umd/Recharts.min.js"></script>
   <script type="text/javascript" src="assets/js/creat-graph.js"></script>
  <script type="text/javascript"  src="assets/js/c3.min.js" ></script>
  <script type="text/javascript" src="assets/js/d3.v3.min.js"></script>
<section>

    <h1 ><i class="fa fa-angle-right"></i>Cliquez ! pour plus de détails :</h1>
    <hr>
    <br>
  

   <div id="chartEquip" class="row">
     <div class="col-lg-4 col-sm-3 content-panel">
      <style>
        #chartEquip{
      margin:0px;

        }
      </style>


      <?php  

      require_once ("../../modals/ConnexionPDO.php");

       $con = new ConnexionPDO();
      $data = $con->getDataBase();
      $assure;
      $outMaintenance;
      $onMaintenance;
      $onGarentie;
      $outGarentie;
      $nonAssure;
      $users;
      $dateToday = date("Y-m-d");
    
        try{



              $query = "SELECT count(*) FROM `euipments` WHERE DATE_FIN_GARENTIE >= '$dateToday'";
            $stmt = $data->prepare($query);
            $stmt->execute();
              $onGarentie = $stmt->fetch();
              $onGarentie =$onGarentie['count(*)'];

                $query = "SELECT count(*) FROM `euipments` WHERE DATE_FIN_GARENTIE <= '$dateToday'";
            $stmt = $data->prepare($query);
            $stmt->execute();
              $outGarentie = $stmt->fetch();
              $outGarentie =$outGarentie['count(*)'];

               $query ="SELECT * FROM euipments WHERE DATE_FIN_GARENTIE <= '$dateToday'";;
            $jj = $data->prepare($query);
            $jj->setFetchMode(PDO::FETCH_ASSOC);
                $jj->execute();

                $query ="SELECT * FROM euipments WHERE DATE_FIN_GARENTIE >= '$dateToday'";;
            $jj1 = $data->prepare($query);
            $jj1->setFetchMode(PDO::FETCH_ASSOC);
                $jj1->execute();



          
            $query = "SELECT count(*) FROM `euipments` WHERE DATE_FIN_MAINTENANCE <= '$dateToday'";
            $stmt = $data->prepare($query);
            $stmt->execute();
              $outMaintenance = $stmt->fetch();
              $outMaintenance =$outMaintenance['count(*)'];


            $query = "SELECT count(*) FROM `euipments` WHERE DATE_FIN_MAINTENANCE >= '$dateToday' >= DATE_DEBUT_MAINTENANCE ";
            $stmt = $data->prepare($query);
            $stmt->execute();
              $onMaintenance = $stmt->fetch();
              $onMaintenance =$onMaintenance['count(*)'];

                $query ="SELECT * FROM euipments WHERE DATE_FIN_MAINTENANCE <= '$dateToday'";;
            $ff = $data->prepare($query);
            $ff->setFetchMode(PDO::FETCH_ASSOC);
                $ff->execute();


                $query ="SELECT * FROM euipments WHERE DATE_FIN_MAINTENANCE >= '$dateToday' >= DATE_DEBUT_MAINTENANCE";;
            $ff1 = $data->prepare($query);
            $ff1->setFetchMode(PDO::FETCH_ASSOC);
                $ff1->execute();  


            $query = "SELECT count(*) FROM `euipments` WHERE  DATE_F_ASSURANCE <= '$dateToday'";
            $stmt = $data->prepare($query);
            $stmt->execute();
              $nonAssure = $stmt->fetch();
              $nonAssure =$nonAssure['count(*)']; 

            $query = "SELECT count(*) FROM `euipments` WHERE DATE_F_ASSURANCE >= '$dateToday' ";
            $stmt = $data->prepare($query);
            $stmt->execute();
              $assure = $stmt->fetch();
              $assure =$assure['count(*)'];

              $query ="SELECT * FROM euipments WHERE DATE_F_ASSURANCE <= '$dateToday'";;
            $dd = $data->prepare($query);
            $dd->setFetchMode(PDO::FETCH_ASSOC);
                $dd->execute();

               $query ="SELECT * FROM euipments WHERE DATE_F_ASSURANCE >= '$dateToday'";;
            $dd1 = $data->prepare($query);
            $dd1->setFetchMode(PDO::FETCH_ASSOC);
                $dd1->execute();  



    

          $query = "SELECT * FROM `users`";
            $stmt = $data->prepare($query);
             $users =$stmt->execute();
            
              



            
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
     ?>
     <div id="chart" style="height: 250px;" ></div>
     
      <?php echo "<script type='text/javascript'>
  
var chart = c3.generate({
   bindto: '#chart',
    data: {
        columns: [
            ['data1', 12],
            ['data2', 120],
        ],
        type : 'donut',
        onclick: function (d, i) {  document.getElementById('garantieTable').style.display ='block' ;
                                    document.getElementById('maintTable').style.display ='none' ;
                                    document.getElementById('assureTable').style.display ='none' ;

          console.log('onclick', d, i); },
        onmouseover: function (d, i) { console.log('onmouseover', d, i); },
        onmouseout: function (d, i) { console.log('onmouseout', d, i); }
    },
    donut: {
        title: 'Garantie'
    }
});

setTimeout(function () {
    chart.load({
        columns: [
            ['En Garantie', ".$onGarentie."],
            ['Hors Garantie', ".$outGarentie."],
        ]
    });
}, 1500);

setTimeout(function () {
    chart.unload({
        ids: 'data1'
    });
    chart.unload({
        ids: 'data2'
    });
}, 2500);

</script>";?>
    
  
    <div id="piechart" style="width: 50%; height: 40%; margin-left:50px; padding: 0px;"></div>




         </div>


      <div class="col-lg-4 col-sm-3 content-panel">

      <div id="jj"  style="height: 250px;"></div>
        
      
   
    <?php 




echo "<script type='text/javascript'>
  
var chart1 = c3.generate({
   bindto: '#jj',
    data: {
        columns: [
            ['data1', 12],
            ['data2', 120],
        ],
        type : 'donut',
        onclick: function (d, i) {  document.getElementById('maintTable').style.display ='block' ;
                                      document.getElementById('garantieTable').style.display ='none' ;
                                    document.getElementById('assureTable').style.display ='none' ;
          console.log('onclick', d, i); },
        onmouseover: function (d, i) { console.log('onmouseover', d, i); },
        onmouseout: function (d, i) { console.log('onmouseout', d, i); }
    },
    donut: {
        title: 'Maintenance'
    }
});

setTimeout(function () {
    chart1.load({
        columns: [
            ['En Maintenance', ".$onMaintenance."],
            ['Hors Maintenance', ".$outMaintenance."],
        ]
    });
}, 1500);

setTimeout(function () {
    chart1.unload({
        ids: 'data1'
    });
    chart1.unload({
        ids: 'data2'
    });
}, 2500);

</script>";


     ?>
   
       
      </div>

      <div class="col-sm-3 col-lg-4 content-panel" >
      <div id="dd" style="height: 250px;" ></div>
   
    <?php   
              echo "<script type='text/javascript'>
                
              var chart2 = c3.generate({
                 bindto: '#dd',
                  data: {
                      columns: [
                          ['data1', 12],
                          ['data2', 120],
                      ],
                      type : 'donut',
                      onclick: function (d, i) {  document.getElementById('assureTable').style.display ='block' ;
                                                  document.getElementById('garantieTable').style.display ='none' ;
                                                 document.getElementById('maintTable').style.display ='none' ;                                     
                            console.log('onclick', d, i); },
                      onmouseover: function (d, i) { console.log('onmouseover', d, i); },
                      onmouseout: function (d, i) { console.log('onmouseout', d, i); }
                  },
                  donut: {
                      title: 'Assurance'
                  }
              });

              setTimeout(function () {
                  chart2.load({
                      columns: [
                          
                          ['Assuré', ".$assure."],
                          ['Non Assuré', ".$nonAssure."]
                      ]
                  });
              }, 1500);

              setTimeout(function () {
                  chart2.unload({
                      ids: 'data1'
                  });
                  chart2.unload({
                      ids: 'data2'
                  });
              }, 2500);

              </script>";

     ?>
 
      </div>

   </div>

</section>

<section>
  <div class="content-panel" id="garantieTable" style="display: none;">
                            <hr>
                            <br>
                            <button  style="background-color: #fe5e5e;" class="btn btn-theme " type="button" onclick=" document.getElementById('igarantie').style.display = 'table-row-group'; document.getElementById('ogarantie').style.display = 'none';
                              document.getElementById('myTable').style.background ='#fac4bc';
                             " > Hors Garantie
<span class="caret"></span>
                            </button>
                            <button class="btn btn-theme " type="button" onclick=" document.getElementById('ogarantie').style.display = 'table-row-group'; document.getElementById('igarantie').style.display = 'none';document.getElementById('myTable').style.background ='#abfc87'; " > En Garantie
                            <span class="caret"></span>
                          </button>
                          <input type="search" class="light-table-filter" class="form-control" data-table="order-table" style=" width: 77%; float:right;"   placeholder="Search for équipement...">
                            <table id="myTable" class="order-table table table-striped" class="table table-bordered table-striped table-condensed">
                            
                            
                            
                            <hr>
                                <thead>
                                <tr>
                                   
                                  <th>Equipement</th>
                                  <th>Serial Number</th>
                                  <th class="numeric">Modele</th>
                                  <th class="numeric">Marque</th>
                                  <th class="numeric">Vendeur</th>
                                  <th class="numeric">Garantie</th>
                                  <th class="numeric">Respo Maintenance</th>
                                  <th class="numeric">Date achat</th>
                                  <th>Assurance</th>
                                </tr>
                                </thead>
                                <tbody id="igarantie" style="display: none;">

                                  <?php  while($equip = $jj->fetch() ){ ?>
                                <tr >
                                            <td><?php echo $equip['TYPE']; ?></td>
                                            <td><?php echo $equip['SERIAL_NUMBER']; ?></td>
                                            <td><?php echo $equip['MODEL']; ?></td>
                                            <td><?php echo $equip['MARQUE']; ?></td>
                                            <td><?php echo $equip['VENDEUR']; ?></td>
                                            <td><?php echo $equip['RESPO_MAINTENANCE']; ?></td>
                                            <td><?php echo $equip['DATE_FIN_GARENTIE']; ?></td>
                                            <td><?php echo $equip['DATE_ACHAT']; ?></td>
                                            <td><a style="cursor:pointer" href="assurance.php?id=<?php echo''.$equip['ID_EQUIPMENT'];?>" >Detaille</a></td>
                                 
                                    
                                </tr>

                                 <?php

                              }; ?>

                               
                                </tbody>
                                <tbody id="ogarantie" style="display: none;">

                                  <?php  while($equip1 = $jj1->fetch()){ ?>
                                <tr >
                                            <td ><?php echo $equip1['TYPE']; ?></td>
                                            <td><?php echo $equip1['SERIAL_NUMBER']; ?></td>
                                            <td><?php echo $equip1['MODEL']; ?></td>
                                            <td><?php echo $equip1['MARQUE']; ?></td>
                                            <td><?php echo $equip1['VENDEUR']; ?></td>
                                            <td><?php echo $equip1['RESPO_MAINTENANCE']; ?></td>
                                            <td><?php echo $equip1['DATE_FIN_GARENTIE']; ?></td>
                                            <td><?php echo $equip1['DATE_ACHAT']; ?></td>
                                             <td><a style="cursor:pointer" href="assurance.php?id=<?php echo''.$equip['ID_EQUIPMENT'];?>" >Detaille</a></td>
                                 
                                    
                                </tr>

                                 <?php

                              }; ?>

                               
                                </tbody>
                    
                            </table>
                        </div>




                        
  
</section>

<section>
  <div class="content-panel" id="maintTable" style="display: none;">
                            <hr>
                            <br>
                             <button  style="background-color: #fe5e5e;" class="btn btn-theme " type="button" onclick=" document.getElementById('imaint').style.display = 'table-row-group'; document.getElementById('omaint').style.display = 'none'; document.getElementsByClassName('table')[1].style.background ='#fac4bc'; " > Hors Mintenance
<span class="caret"></span>
                            </button>
                            <button class="btn btn-theme " type="button" onclick=" document.getElementById('omaint').style.display = 'table-row-group'; document.getElementById('imaint').style.display = 'none';document.getElementsByClassName('table')[1].style.background ='#abfc87'; " > En Maintenance
                            <span class="caret"></span>
                          </button>
                           <input type="search" class="light-table-filter" class="form-control" data-table="order-table" style=" width: 74%; float:right;"   placeholder="Search for équipement...">
                            <table id="myTable" class="order-table table table-striped" class="table table-bordered table-striped table-condensed">
                            
                            
                            
                            <hr>
                                <thead>
                                <tr>
                                   
                                 <th>Equipement</th>
                                  <th>Serial Number</th>
                                  <th class="numeric">Modele</th>
                                  <th class="numeric">Marque</th>
                                  <th class="numeric">Vendeur</th>
                                  <th class="numeric">Garantie</th>
                                  <th class="numeric">Respo Maintenance</th>
                                  <th class="numeric">Date achat</th>
                                  <th>Asuurance</th>
                                </tr>
                                </thead>
                                <tbody id="imaint" style="display: none;">

                                  <?php  while($maint = $ff->fetch()){ ?>
                                <tr>
                                     <td><?php echo $maint['TYPE']; ?></td>
                                            <td><?php echo $maint['SERIAL_NUMBER']; ?></td>
                                            <td><?php echo $maint['MODEL']; ?></td>
                                            <td><?php echo $maint['MARQUE']; ?></td>
                                            <td><?php echo $maint['VENDEUR']; ?></td>
                                            <td><?php echo $maint['RESPO_MAINTENANCE']; ?></td>
                                            <td><?php echo $maint['DATE_FIN_GARENTIE']; ?></td>
                                            <td><?php echo $maint['DATE_ACHAT']; ?></td>
                                             <td><a style="cursor:pointer" href="assurance.php?id=<?php echo''.$maint['ID_EQUIPMENT'];?>" >Detaille</a></td>
                                 
                                    
                                </tr>

                                 <?php

                              }; ?>

                               
                                </tbody>
                                 <tbody id="omaint" style="display: none;">

                                  <?php  while($maint1 = $ff1->fetch()){ ?>
                                <tr>
                                     <td><?php echo $maint1['TYPE']; ?></td>
                                            <td><?php echo $maint1['SERIAL_NUMBER']; ?></td>
                                            <td><?php echo $maint1['MODEL']; ?></td>
                                            <td><?php echo $maint1['MARQUE']; ?></td>
                                            <td><?php echo $maint1['VENDEUR']; ?></td>
                                            <td><?php echo $maint1['RESPO_MAINTENANCE']; ?></td>
                                            <td><?php echo $maint1['DATE_FIN_GARENTIE']; ?></td>
                                            <td><?php echo $maint1['DATE_ACHAT']; ?></td>
                                             <td><a style="cursor:pointer" href="assurance.php?id=<?php echo''.$maint1['ID_EQUIPMENT'];?>" >Detaille</a></td>
                                 
                                    
                                </tr>

                                 <?php

                              }; ?>

                               
                                </tbody>
                                 
                            </table>
                        </div>




                        
  
</section>

<section>
  <div class="content-panel" id="assureTable" style="display: none;">
                            <hr>
                            <br>
                            <button  style="background-color: #fe5e5e;" class="btn btn-theme " type="button" onclick=" document.getElementById('oassur').style.display = 'table-row-group'; document.getElementById('iassur').style.display = 'none';document.getElementsByClassName('table')[2].style.background ='#fac4bc'; " > Non Assurés
<span class="caret"></span>
                            </button>
                            <button class="btn btn-theme " type="button" onclick=" document.getElementById('iassur').style.display = 'table-row-group'; document.getElementById('oassur').style.display = 'none'; document.getElementsByClassName('table')[2].style.background ='#abfc87'; " > Assurés
                            <span class="caret"></span>
                          </button>
                           <input type="search" class="light-table-filter" class="form-control" data-table="order-table" style=" width: 80%; float:right;"   placeholder="Search for équipement...">
                            <table id="myTable"  class="order-table table table-striped" class="table table-bordered table-striped table-condensed">
                           
                            
                            
                            <hr>
                                <thead >
                                <tr>
                                   
                                  <th>Equipement</th>
                                  <th>Serial Number</th>
                                  <th class="numeric">Modele</th>
                                  <th class="numeric">Marque</th>
                                  <th class="numeric">Vendeur</th>
                                  <th class="numeric">Garantie</th>
                                  <th class="numeric">Respo Maintenance</th>
                                  <th class="numeric">Date achat</th>
                                  <th>Asuurance</th>
                                </tr>
                                </thead>
                                <tbody id="oassur" style="display: none;" >

                                  <?php  while($assuranc = $dd->fetch()){ ?>
                                <tr>
                                     <td><?php echo $assuranc['TYPE']; ?></td>
                                            <td><?php echo $assuranc['SERIAL_NUMBER']; ?></td>
                                            <td><?php echo $assuranc['MODEL']; ?></td>
                                            <td><?php echo $assuranc['MARQUE']; ?></td>
                                            <td><?php echo $assuranc['VENDEUR']; ?></td>
                                            <td><?php echo $assuranc['RESPO_MAINTENANCE']; ?></td>
                                            <td><?php echo $assuranc['DATE_FIN_GARENTIE']; ?></td>
                                            <td><?php echo $assuranc['DATE_ACHAT']; ?></td>
                                             <td><a style="cursor:pointer" href="assurance.php?id=<?php echo''.$assurance['ID_EQUIPMENT'];?>" >Detaille</a></td>

                                 
                                    
                                </tr>

                                 <?php

                              }; ?>

                               
                                </tbody>
                                <tbody  id="iassur" style="display: none;" >

                                  <?php  while($assuranc1 = $dd1->fetch()){ ?>
                                <tr>
                                     <td><?php echo $assuranc1['TYPE']; ?></td>
                                            <td><?php echo $assuranc1['SERIAL_NUMBER']; ?></td>
                                            <td><?php echo $assuranc1['MODEL']; ?></td>
                                            <td><?php echo $assuranc1['MARQUE']; ?></td>
                                            <td><?php echo $assuranc1['VENDEUR']; ?></td>
                                            <td><?php echo $assuranc1['RESPO_MAINTENANCE']; ?></td>
                                            <td><?php echo $assuranc1['DATE_FIN_GARENTIE']; ?></td>
                                            <td><?php echo $assuranc1['DATE_ACHAT']; ?></td>
                                             <td><a style="cursor:pointer" href="assurance.php?id=<?php echo''.$assuranc1['ID_EQUIPMENT'];?>" >Detaille</a></td>
                                 
                                    
                                </tr>

                                 <?php

                              }; ?>

                               
                                </tbody>
                            </table>
                        </div>
                        




                        
  
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


<!--users table-->












