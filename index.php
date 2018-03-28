
<?php
session_start();
$_SESSION['home'] = 'page-index';


if(file_exists("Inc/Headers.php")){
    include 'Inc/Headers.php';
}

if(file_exists("admin/dbConnect/validateInput.php")){
    include 'admin/dbConnect/validateInput.php';
}

if(file_exists("Inc/navbar.php")){
    include "Inc/navbar.php";
}

$image_path = "image/";
?>


<body>
    <div class="w3-display-container">


        <!--    SLIDE    -->

        <?php
        $last_event = $Connexion->query("SELECT id_event, cover_event, date_event, compte_a_rebours, titre_event, tag_name FROM event 
                                                   WHERE date_event > NOW()
                                                   ORDER BY id_event DESC LIMIT 3");
        while ($event = $last_event->fetch())
        {
            ?>

            <div class="slideEventLive">
                <img src="<?php echo $image_path . $event['cover_event'] ?>" alt="<?php echo $event['titre_event'] ?>" style="width: 100%">
                <div class="w3-display-bottomright w3-container w3-padding-16 w3-white w3-hide-small">
                    <h2 class="w3-border-bottom w3-border-red">
                        <?php echo $event['titre_event']; ?>
                    </h2>
                    <h3 class="w3-text-red w3-center" id="<?php echo $event['compte_a_rebours']; ?>"></h3>
                </div>
            </div>

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

            <?php
        }
        $last_event->closeCursor();
        ?>
        <!--    END SLIDE    -->

        <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
        <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
    </div>

    <div class="w3-clear"></div>

    <div class="w3-display-container w3-container">
        <div class="w3-row w3-padding-32 w3-hide-small">

            <!--    PUB    -->
            <div class="w3-quarter w3-containe">
                <div class="w3-center">
                    <img src="image/dd.jpg" alt="pub" class="" style="width: 350px;">
                </div>
            </div>


            <!--    VIDEO EN DIRECT    -->

            <?php
            $live = $Connexion->query("SELECT live_link, tag_name, titre_live FROM live ORDER BY id_live DESC " );
            while ($live_video = $live->fetch())
            {
            ?>
                <div class="w3-half w3-card" style="width: 50%;">
                    <iframe width="100%" height="430" src="<?php echo $live_video['live_link']; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    <div class="w3-container">
                        <h2><?php echo $live_video['titre_live']; ?></h2>
                    </div>
                </div>
            <?php
            }
            $live->closeCursor();
            ?>


            <!--    PUB    -->
            <div class="w3-quarter w3-container">
                <div class="w3-center">
                    <img src="image/dd.jpg" alt="pub" class="" style="width: 350px;">
                </div>
            </div>
        </div>

        <div class="w3-center w3-padding-16 w3-hide-large w3-hide-medium">
            <div class="w3-content w3-card" style="width: 80%;">
                <iframe width="100%" height="235" src="https://www.youtube.com/embed/hL0sEdVJs3U" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                <div class="w3-container w3-responsive">
                    <h2 style="font-size: 120%;">Titre de la vidéo</h2>
                    <p style="font-size: 80%;">Description de la vidéo 2</p>
                </div>
            </div>
        </div>
    </div>

    <div class="w3-row">
        <div class="w3-container w3-padding">
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button tablink w3-red" onclick="openLink(event, 'last')">Replay</button>
            </div>

            <div id="last" class="w3-container w3-border w3-padding-16 city">


                <?php
                $last_videos = $Connexion->query("SELECT id_replay, poster, video_link, tag_name, titre_video_replay FROM replay ORDER BY id_replay DESC LIMIT 4" );
                while ($video_replay = $last_videos->fetch())
                {
                    $minuature = $image_path . $video_replay['poster'];
                    ?>
                    <div class="w3-quarter w3-display-container">
                        <div class="w3-card-4 w3-center" style="width:80%">
                            <img src="<?php echo $minuature; ?>" alt="<?php echo $video_replay['titre_video_replay'] ?>" style="width:100%" class="">
                            <div class="w3-display-middle w3-padding" style="margin-left: -30px">
                                <a href="toDisplay/to_display.php?videoToDisplay=<?php echo $video_replay['id_replay']; ?>"><span class="fa fa-youtube-play fa-5x w3-hover-red"></span></a>
                            </div>
                        </div>
                    </div>

                    <?php
                }
                $last_videos->closeCursor();
                ?>
            </div>
        </div>
    </div>





<?php
if(file_exists("Inc/Footers.php")){
    include 'Inc/Footers.php';
}
//        ImageDestroy($src) ;
//        ImageDestroy($dst) ;

session_destroy();
?>
