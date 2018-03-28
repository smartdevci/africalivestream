<!--<link rel="stylesheet" href="w3css/4/w3.css">
<link rel="stylesheet" href="w3css/4/font-awesome.css">
<link rel="stylesheet" href="w3css/lib/w3-theme-red.css">
-->
<?php
session_start();
$_SESSION['contact'] = 'page-contact';


if(file_exists("Inc/Headers.php")){
    include 'Inc/Headers.php';
}

if(file_exists("Inc/navbar.php")){
    include "Inc/navbar.php";
}
?>


<body>
    <div class="w3-container w3-center w3-card w3-blue-gray">
        <h3>Laissez-nous un message ici</h3>
    </div>
    <div class="w3-row w3-padding-32">
        <div class="w3-content w3-padding w3-center">
<!--
            <div class="w3-third w3-container w3-padding-16">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2808.764599366956!2d-3.9872560858603463!3d5.387530114782198!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc1935642775277%3A0x744af54b0950192b!2sLes+Residences+Rom+4!5e0!3m2!1sfr!2sci!4v1518110949009" width="300" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
-->
            <div class="w3-twothird">

                <form action="" class="w3-container w3-card-4 w3-light-grey w3-text-blue-gray w3-margin">
                    <h3 class="w3-center">Contactez-nous !</h3>

                    <div class="w3-row w3-section">
                        <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border" name="first" type="text" placeholder="Prénom">
                        </div>
                    </div>

                    <div class="w3-row w3-section">
                        <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border" name="last" type="text" placeholder="Nom">
                        </div>
                    </div>

                    <div class="w3-row w3-section">
                        <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border" name="email" type="text" placeholder="Email">
                        </div>
                    </div>

                    <div class="w3-row w3-section">
                        <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-phone"></i></div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border" name="phone" type="text" placeholder="Téléphone">
                        </div>
                    </div>

                    <div class="w3-row w3-section">
                        <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-pencil"></i></div>
                        <div class="w3-rest">
                            <textarea class="w3-input w3-border" name="message" placeholder="Votre Message ici" rows="5"></textarea>
                        </div>
                    </div>

                    <button class="w3-button w3-block w3-section w3-blue-gray w3-ripple w3-padding">Envoyer message</button>

                </form>
            </div>
        </div>
    </div>





<?php
if(file_exists("Inc/Footers.php")){
    include 'Inc/Footers.php';
}

session_destroy();
?>
