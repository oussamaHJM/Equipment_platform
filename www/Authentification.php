<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="background"></div>
        <div class="container">
            <div class="login-card"><img src="assets/img/ocp.png" class="profile-img-card">
                <p class="profile-name-card">Bienvenue !</p>
                <form class="form-signin" action="../controller/gestionFomulaire.php?operation=connexion" method="post"><span class="reauth-email"> </span>
                    <div class="styled-input" ><input class="pp" type="text" required="" placeholder="Login" autofocus="" name="Login" id="inputEmail"></div>
                    <div class="styled-input" ><input class="pp" type="password" required="" placeholder="Mot de passe" name="Password" id="inputPassword"></div>
                    <?php
                          if (isset($_GET["resultat"]))
                          { ?>
                              <?php
                              if ($_GET["resultat"] == 0){
                                  $resultat = "Mote de passe ou login falsifier";
                              }
                              echo "<div><font color='red'>".$resultat."</font></div>"; ?>
                          <?php }
                          ?>
                    <button class="btn btn-primary btn-block btn-lg btn-signin" type="submit">Sign in</button>
                </form>
            </div>
        </div>

    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>