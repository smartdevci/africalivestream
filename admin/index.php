<?php
session_start();

include 'checkInput/validateInput.php';
include 'dbConnect/connexion_db.php';

$errLogin = $errMotDePasse = $errLoginORmotDePasse = '';
$login = $mot_de_passe = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = validator($_POST['login']);


//    Si les champs "Login" et "Mot de passe" ne sont pas vides
    if(!empty($_POST['login']) && !empty($_POST['motDePasse']))
    {
//      On passe par l'etape de validation des caractères exigés
//      via les expression régulières
        $login = validator($_POST['login']);
        $mot_de_passe = validator($_POST['motDePasse']);



        // Connexion à la base de données pour vérifier le login et le mot de passe
        $username = $Connexion->prepare('SELECT username, password_user
                                                      FROM t_user
                                                      WHERE username = :login AND password_user = MD5(:mot_de_passe)
                                                      ');

        $username->execute(array("login" => $login, "mot_de_passe" => $mot_de_passe));

        // SI le login et le mot de passe  correspondent à une ligne dans
        // la table utilisateur de la base de données,
        // on accède à la page administration
        if($username -> rowCount() == 1){
            while ($user = $username->fetch()){

                // DEFINITION DE LA SESSION LOGIN DE L'USER
                $_SESSION['login'] = $user['username'];
            }

            if(file_exists("post.php")){
                header('location:post.php');
            }

        } else {
            $errLoginORmotDePasse = "Le nom d'utilisateur ou le mot passe est incorrect !";
        }


    }

    if (empty($_POST['login'])) {
        $errLogin = "Le nom d'utilisateur est requis pour vous connecter !";
    } else {
        if (!check_login_validate($_POST['login'])) {
            $errLogin = "Le nom d'utilisateur est mal renseigné !";
        }
    }


    if (empty($_POST['motDePasse'])) {
        $errMotDePasse = "Veuillez entrer le mot de passe !";
    } else {
        if (!check_passw_validate($_POST['motDePasse'])) {
            $errMotDePasse = "Le mot de passe ne respecte pas le format réquis !";
        }
    }


}



//Importation des fichiers d'entête HTML
if(file_exists('Inc/header.php')){
    include "Inc/header.php";
}

?>


<!--<link rel="stylesheet" href="../w3css/4/w3.css">-->
<!--<link href='https://fonts.googleapis.com/css?family=RobotoDraft' rel='stylesheet' type='text/css'>-->
<!--<link rel="stylesheet" href="../w3css/4/font-awesome.css">-->



    <body id="login">

<!--AFFICHAGE ECRAN LARGE-->
    <div class="w3-content w3-card w3-margin-top w3-hide-small" style="width: 30%">
        <div class="w3-container w3-teal ">
            <h2 class="w3-content w3-center">Connexion</h2>
        </div>

        <form class="w3-container w3-padding-16" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">


            <?php
            if ($errLoginORmotDePasse)
            {
                ?>
                <div class="w3-panel w3-red w3-display-container">
                    <span onclick="this.parentElement.style.display='none'"
                        class="w3-button w3-red w3-large w3-display-topright">&times;
                    </span>
                    <h3>Alerte !</h3>
                    <p><?php echo $errLoginORmotDePasse; ?></p>
                </div>
                <?php
            }
            ?>

            <?php
            if (isset($_SESSION['accountDisabled']))
            {
                ?>
                <div class="w3-panel w3-red w3-display-container">
                    <span onclick="this.parentElement.style.display='none'"
                          class="w3-button w3-red w3-large w3-display-topright">&times;
                    </span>
                    <h3>Alerte !</h3>
                    <p><?php echo $_SESSION['accountDisabled']; ?></p>
                </div>
                <?php
            }
            ?>

            <div class="">
                <label class="w3-text-red">Login <i class="fa fa-user w3-right fa-2x"></i></label>
                <input type="text" class="w3-input w3-border w3-sand" placeholder="Nom utilisateur" name="login" pattern="^[a-zA-Z0-9]{4,}$">

                <?php
                if ($errLogin)
                {
                    ?>
                    <div class="w3-panel w3-red w3-display-container">
                    <span onclick="this.parentElement.style.display='none'"
                          class="w3-button w3-red w3-large w3-display-topright">&times;
                    </span>
                        <h3>Alerte !</h3>
                        <p><?php echo $errLogin; ?></p>
                    </div>
                    <?php
                }
                ?>
                                <br>


            </div>

            <div class="">
                <label class="w3-text-red">Mot de passe <i class="fa fa-lock w3-right fa-2x"></i></label>
                <input type="password" class="w3-input w3-border w3-sand" placeholder="Mot de passe" name="motDePasse" pattern="^[a-zA-Z0-9]{4,20}$">

                <?php
                if ($errMotDePasse)
                {
                    ?>
                    <div class="w3-panel w3-red w3-display-container">
                    <span onclick="this.parentElement.style.display='none'"
                          class="w3-button w3-red w3-large w3-display-topright">&times;
                    </span>
                        <h3>Alerte !</h3>
                        <p><?php echo $errMotDePasse; ?></p>
                    </div>
                    <?php
                }
                ?>
                <br>
            </div>

<!--            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Se souvenir de moi
            </label>
-->
            <button class="w3-btn w3-red w3-left" type="submit" name="submit" style="background: #eea236;">Connexion</button>
            <button class="w3-btn w3-sand w3-right" type="reset" style="background: #6c696d">Annuler</button>

        </form>

    </div> <!-- /container -->




<!--AFFICHAGE PETIT ECRAN-->
    <div class="w3-content w3-card w3-margin-top w3-hide-large w3-hide-medium">
        <div class="w3-container w3-teal ">
            <h2 class="w3-content w3-center">Connexion</h2>
        </div>

        <form class="w3-container w3-padding-16" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">


            <?php
            if ($errLoginORmotDePasse)
            {
                ?>
                <div class="w3-panel w3-red w3-display-container">
                    <span onclick="this.parentElement.style.display='none'"
                        class="w3-button w3-red w3-large w3-display-topright">&times;
                    </span>
                    <h3>Alerte !</h3>
                    <p><?php echo $errLoginORmotDePasse; ?></p>
                </div>
                <?php
            }
            ?>

            <?php
            if (isset($_SESSION['accountDisabled']))
            {
                ?>
                <div class="w3-panel w3-red w3-display-container">
                    <span onclick="this.parentElement.style.display='none'"
                          class="w3-button w3-red w3-large w3-display-topright">&times;
                    </span>
                    <h3>Alerte !</h3>
                    <p><?php echo $_SESSION['accountDisabled']; ?></p>
                </div>
                <?php
            }
            ?>

            <div class="">
                <label class="w3-text-red">Login <i class="fa fa-user w3-right fa-2x"></i></label>
                <input type="text" class="w3-input w3-border w3-sand" placeholder="Nom utilisateur" name="login" pattern="^[a-zA-Z0-9]{4,}$">

                <?php
                if ($errLogin)
                {
                    ?>
                    <div class="w3-panel w3-red w3-display-container">
                    <span onclick="this.parentElement.style.display='none'"
                          class="w3-button w3-red w3-large w3-display-topright">&times;
                    </span>
                        <h3>Alerte !</h3>
                        <p><?php echo $errLogin; ?></p>
                    </div>
                    <?php
                }
                ?>
                                <br>


            </div>

            <div class="">
                <label class="w3-text-red">Mot de passe <i class="fa fa-lock w3-right fa-2x"></i></label>
                <input type="password" class="w3-input w3-border w3-sand" placeholder="Mot de passe" name="motDePasse" pattern="^[a-zA-Z0-9]{4,10}$">

                <?php
                if ($errMotDePasse)
                {
                    ?>
                    <div class="w3-panel w3-red w3-display-container">
                    <span onclick="this.parentElement.style.display='none'"
                          class="w3-button w3-red w3-large w3-display-topright">&times;
                    </span>
                        <h3>Alerte !</h3>
                        <p><?php echo $errMotDePasse; ?></p>
                    </div>
                    <?php
                }
                ?>
                <br>
            </div>

<!--            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Se souvenir de moi
            </label>
-->
            <button class="w3-btn w3-red w3-left" type="submit" name="submit" style="background: #eea236;">Connexion</button>
            <button class="w3-btn w3-sand w3-right" type="reset" style="background: #6c696d">Annuler</button>

        </form>

    </div> <!-- /container -->
    </body>
    </html>

<?php

unset($_SESSION['accountDisabled']);
?>