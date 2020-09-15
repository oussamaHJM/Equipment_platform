
<header class="header black-bg">
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
    </div>
    <!--logo start-->
    <a id="logoOCP" href="index.php" class="logo" style="background-color: white"><img src="../assets/img/ocp.png" alt="OCP"></a>
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
            <!-- settings start -->
            

            <!-- settings end -->
        
            <li  id="loginuser"  ><p id="loginUser">
                      <?php echo $_SESSION['login']; ?>
                
            </p>
            </li>
      

            <!-- inbox dropdown end -->
        </ul>
        <!--  notification end -->
    </div>
    <div class="top-menu">
        <form class="form-signin" action="../controller/gestionFomulaire.php?operation=deconnexion" method="post">
            <ul class="nav pull-right top-menu">
             
                <li><a class="logout" href="../../controller/gestionFomulaire.php?operation=deconnexion">Logout</a></li>
            </ul>
        </form>
    </div>
</header>