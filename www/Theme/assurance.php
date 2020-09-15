
<?php
require_once ('../../modals/ConnexionPDO.php');
?>

 <?php
            $con = new ConnexionPDO();
            $data = $con->getDataBase();
            try{
                $query = "SELECT ASSURANCE FROM `euipments` WHERE ID_EQUIPMENT = :ID";
                $stmt = $data->prepare($query);
                $stmt->bindParam(':ID',$_GET['id'],PDO::PARAM_STR);
                $stmt->execute();
                $ligne = $stmt->fetch();
            }
            catch (PDOException $e){
                $e->getMessage();
            }
            ?>





            <div><img src="images/<?php echo $ligne['ASSURANCE'] ?>" alt="assurance"></div>