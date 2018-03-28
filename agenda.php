
<?php
session_start();
$_SESSION['agenda'] = 'page-agenda';


if(file_exists("Inc/Headers.php")){
    include 'Inc/Headers.php';
}

if(file_exists("Inc/navbar.php")){
    include "Inc/navbar.php";
}


$image_path = "image/";

?>


<body>


        <?php
        $last_event = $Connexion->query("SELECT id_event, cover_event, titre_event, date_event, tag_name, compte_a_rebours FROM event
                                                   ORDER BY id_event ASC LIMIT 3" );
        while ($event = $last_event->fetch())
        {
            ?>

            <div class="mySlides w3-content w3-display-container" style="max-width:100%">
                <img class="" src="<?php echo $image_path . $event['cover_event'] ?>" alt="<?php echo $event['titre_event'] ?>" style="width: 100%">
                <div class="w3-display-bottomright w3-container w3-padding-16 w3-white w3-hide-small">
                    <h2 class="w3-border-bottom w3-border-red">
                        <?php echo $event['titre_event']; ?>
                    </h2>

                    <h3 id="<?php echo $event['compte_a_rebours']; ?>" class="w3-text-red w3-center"></h3>

                    <script>

                        function compte_a_rebours(){


                            var compte_a_rebours = document.getElementById("<?php echo $event['compte_a_rebours']; ?>");

                            var date_actuelle = new Date();
                            var date_evenement = new Date("<?php echo $event['date_event']?>");

                            var total_secondes = (date_evenement - date_actuelle) / 1000;
//                    alert(total_secondes);

                            if (total_secondes < 0){
                                total_secondes =  ( total_secondes ) ; // On ne garde que la valeur absolue
                            }

                            if ( total_secondes > 0 )
                            {
                                var jours = Math . floor( total_secondes / ( 60 * 60 * 24 ) ) ;
                                var heures = Math . floor( ( total_secondes - ( jours * 60 * 60 * 24 ) ) / ( 60 * 60 ) ) ;
                                var minutes = Math . floor( ( total_secondes - ( ( jours * 60 * 60 * 24 + heures * 60 * 60 ))) / 60 ) ;
                                var secondes = Math . floor( total_secondes - ( ( jours * 60 * 60 * 24 + heures * 60 * 60 + minutes * 60 ))) ;

                                var mot_min = "min";
                                var mot_heure = "h";
                                var mot_sec = "s";
                                var mot_jour = "j";

                                if ( jours == 0 )
                                {
                                    jours = '' ;
                                    mot_jour = ''
                                } else {mot_jour = 'j : '}

                                if ( heures == 0 )
                                {
                                    heures = '' ;
                                    mot_heure = ''
                                } else {mot_heure = 'h : '}

                                if ( minutes == 0 )
                                {
                                    minutes = '';
                                    mot_min = ""
                                } else {mot_min = 'min : '}

                                if ( secondes < 10 )
                                {
                                    secondes = '0' + secondes ;
                                }


                                compte_a_rebours.innerHTML = "Diffusion dans<br>" + jours + mot_jour + heures + mot_heure +
                                    minutes + mot_min + secondes;
                            }
                            else
                            {
                                compte_a_rebours . innerHTML = 'En cours de diffusion...' ;
                            }

                            var actualisation = setTimeout("compte_a_rebours();", 1000) ;
                        }
                        compte_a_rebours();
                    </script>

                </div>
            </div>


        <?php
        }
        $last_event->closeCursor();
        ?>




    <div class="w3-center">
        <div class="w3-section">
            <button class="w3-button w3-light-grey" onclick="plusDivs__(-1)">❮ Prev</button>
            <button class="w3-button w3-light-grey" onclick="plusDivs__(1)">Next ❯</button>
        </div>
        <button class="w3-button demo" onclick="currentDivs(1)">1</button>
        <button class="w3-button demo" onclick="currentDivs(2)">2</button>
        <button class="w3-button demo" onclick="currentDivs(3)">3</button>
    </div>





        <script>
            var slideIndex = 1;
            _showDivs_(slideIndex);

            function plusDivs__(n) {
                _showDivs_(slideIndex += n);
            }

            function currentDivs(n) {
                _showDivs_(slideIndex = n);
            }

            function _showDivs_(n) {
                var i;
                var x = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("demo");
                if (n > x.length) {slideIndex = 1}
                if (n < 1) {slideIndex = x.length}
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" w3-red", "");
                }
                x[slideIndex-1].style.display = "block";
                dots[slideIndex-1].className += " w3-red";
            }


        </script>

        <?php
if(file_exists("Inc/Footers.php")){
    include 'Inc/Footers.php';
}

session_destroy();
?>
