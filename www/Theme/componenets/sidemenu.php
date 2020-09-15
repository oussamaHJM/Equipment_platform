<?php

//verifier si une variable enregistrer dans la session

if ($_SESSION['authentification']!=1) {
    echo '<body bgcolor="#FFFFFF"></body>';
    echo "<script language=JavaScript>alert('cette page est reservée aux administrateurs Seulement (-_-!)')</script>";
    echo '<script language=Javascript>document.location.replace("../../index.php");</script>';
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
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">



            <li class="mt">
                <a class="active" href="index.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Acceuil</span>
                </a>
            </li>





             <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-wrench"></i>
                          <span>Equipement</span>
                      </a>
                      <ul class="sub-menu">

                                                                            <li class="sub-menu">
                                                                            <a  href="AjouterEquip.php" >
                                                                                <i class="fa fa-plus-circle"></i>
                                                                                <span>Ajouter</span>

                                                                            </a>
                                                                        </li>

                                                                        <li class="sub-menu">
                                                                            <a  href="ModifierTable.php" >
                                                                                <i class="fa fa-cogs"></i>
                                                                                <span>Modifier</span>
                                                                            </a>

                                                                        </li>
                                                                        <li class="sub-menu">
                                                                            <a  href="SupprimerEquip.php" >
                                                                                <i class="fa fa-minus-circle"></i>
                                                                                <span>Supprimer</span>
                                                                            </a>

                                                                        </li>

                                                                        <li class="sub-menu">
                                                                            <a href="responsive_table.php" >
                                                                                <i class="fa fa-th"></i>
                                                                                <span>Lister</span>
                                                                            </a>

                                                                        </li>


                         
                      </ul>
                  </li>





           

            <?php  if($_SESSION['type'] == 'admin'  ) {?>



                 <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-users"></i>
                          <span>Utilisateur</span>
                      </a>
                      <ul class="su-menu">
                             <li class="sub-menu">
                                <a href="ajouterUser.php" >
                                    <i class="fa fa-plus-square"></i>
                                    <span>Ajouter</span>
                                </a>
                                </li>
                                <li class="sub-menu">
                                    <a href="ListUser.php" >
                                        <i class="fa fa-list-ul"></i>
                                        <span>Lister</span>
                                    </a>

                            </li>
                          


                      </ul>
                  </li>

                  <li class="sub-menu">
                        <a  href="marque.php?operation=type">
                            <i class="  fa fa-briefcase"></i>
                        <span>Type Equipement</span>
                     </a>
                 </li>
                 <li class="sub-menu">
                        <a  href="marque.php?operation=marque">
                            <i class="fa fa-bookmark"></i>
                        <span>Marque</span>
                     </a>
                 </li>
                 <li class="sub-menu">
                        <a  href="marque.php?operation=fournisseur">
                            <i class="fa fa-shopping-cart"></i>
                        <span>Fournisseur</span>
                     </a>
                 </li>
                 <li class="sub-menu">
                        <a  href="marque.php?operation=maintenance">
                            <i class="fa fa-cog"></i>
                        <span>Maintenance</span>
                     </a>
                 </li>
                 <li class="sub-menu">
                        <a  href="marque.php?operation=assurance">
                            <i class="fa fa-check-square-o"></i>
                        <span>Assurance</span>
                     </a>
                 </li>
                 <li class="sub-menu">
                        <a  href="marque.php?operation=entite">
                            <i class="fa fa-building-o"></i>
                        <span>Enitté</span>
                     </a>
                 </li>

    

    )




                










        <?php } ?>



        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>