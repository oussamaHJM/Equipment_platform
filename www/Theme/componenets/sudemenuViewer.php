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
                <a class="desactive"  onclick='alert("vous n avez pas l acces a ce service  !!")' >
                    <i class="fa fa-desktop"></i>
                    <span>Ajouter un equipement </span>

                </a>
            </li>

            <li class="sub-menu">
                <a class="desactive" onclick='alert("vous n avez pas l acces a ce service !!")' >
                    <i class=" fafa-cogs"></i>
                    <span>Modifier un equipement</span>
                </a>

            </li>
            <li class="sub-menu">
                <a class="desactive" onclick='alert(" vous n avez pas l acces a ce service !! ")' >
                    <i class="fa fa-book"></i>
                    <span>Supprimer un equipement</span>
                </a>

            </li>

            <li class="sub-menu">
                <a href="responsive_table.php" >
                    <i class="fa fa-th"></i>
                    <span>Liste des equipement</span>
                </a>

            </li>


        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>