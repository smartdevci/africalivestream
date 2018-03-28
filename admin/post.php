<?php
    if(file_exists('Inc/header.php')){
        include "Inc/header.php";
    }

    $image_path = "../image/";
?>


    <link rel="stylesheet" href="../w3css/4/w3.css">
    <!--<link href='https://fonts.googleapis.com/css?family=RobotoDraft' rel='stylesheet' type='text/css'>-->
    <link rel="stylesheet" href="../w3css/4/font-awesome.css">




<body>

<!-- Side Navigation -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-white w3-animate-left w3-card" style="z-index:3;width:320px;" id="mySidebar">
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom w3-large w3-red" style="text-transform: uppercase;">Africa Live Stream<!--<img src="https://www.w3schools.com/images/w3schools.png" style="width:60%;">--></a>
    <a href="javascript:void(0)" onclick="w3_close()" title="Close Sidemenu"
       class="w3-bar-item w3-button w3-hide-large w3-large">Close <i class="fa fa-remove"></i></a>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3- w3-button w3-hover-black w3-left-align" onclick="document.getElementById('id01').style.display='block'">Nouvelle vidéo <i class="w3-padding fa fa-pencil"></i></a>
    <a id="myBtn" onclick="myFunc('Demo1')" href="javascript:void(0)" class="w3-bar-item w3-button"><i class="fa fa-inbox w3-margin-right"></i>Mes vidéos <i class="fa fa-caret-down w3-margin-left"></i></a>
    <div id="Demo1" class="w3-hide w3-animate-left">
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" onclick="openMail('Borge');w3_close();" id="firstTab">
            <div class="w3-container">
                <img class="w3-round w3-margin-right" src="../image/replay.png" style="width:10%;"><span class="w3-opacity w3-large">Replay</span>
            </div>
        </a>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" onclick="openMail('Jane');w3_close();">
            <div class="w3-container">
                <img class="w3-round w3-margin-right" src="../image/calendar.png" style="width:10%;"><span class="w3-opacity w3-large">Event</span>
            </div>
        </a>
        <a href="logout.php" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey">
            <div class="w3-container">
                <span class="fa fa-power-off fa-3x w3-opacity w3-large">&emsp; Déconnecxion</span>
            </div>
        </a>
    </div>
</nav>


<!-- Modal that pops up when you click on "New Message" -->
<div id="id01" class="w3-modal" style="z-index:4">
    <div class="w3-modal-content w3-animate-zoom">
        <div class="w3-container w3-padding w3-red w3-center">
            <span onclick="document.getElementById('id01').style.display='none'"
                 class="w3-button w3-red w3-right w3-xxlarge"><i class="fa fa-remove"></i>
            </span>
            <h2>Publier une vidéo</h2>
        </div>



        <!--  TAB RUBRIQUES  -->
        <div class="w3-bar w3-border-bottom">
            <button class="tablink w3-bar-item w3-button" onclick="openRubrique(event, 'live')">LIVE</button>
            <button class="tablink w3-bar-item w3-button" onclick="openRubrique(event, 'event')">EVENT</button>
            <button class="tablink w3-bar-item w3-button" onclick="openRubrique(event, 'replay')">REPLAY</button>
        </div>

        <!-- RUBRIQUE LIVE -->
        <div id="live" class="w3-container rubrique">
            <form class="w3-padding-24" action="dbConnect/post.php" method="post" enctype="multipart/form-data">

                <input type="hidden" name="MAX_FILE_SIZE" value="5120000">

                <label for="cover">Image de couverture</label>
                <input id="cover" class="w3-input w3-border w3-large w3-margin-bottom" type="file" name="cover">

                <label for="choix">Catégorie</label>
                <select class="w3-input w3-border w3-margin-bottom" name="categorie" id="choix">
                    <?php
                    $categorie = $Connexion->query("SELECT categorie_name AS categorie FROM categorie");
                    while ($tag_name = $categorie->fetch()){
                        ?>
                        <option value="<?php echo $tag_name['categorie']?>"><?php echo strtoupper($tag_name['categorie'])?></option>
                        <?php
                    }
                    $categorie->closeCursor();
                    ?>
                </select>

                <label for="titre">Titre</label>
                <input id="titre" class="w3-input w3-border w3-margin-bottom" type="text" name="titre">

                <label>URL de la vidéo</label>
                <input class="w3-input w3-border w3-margin-bottom" required type="url" placeholder="Lien de la vidéo" name="link">

                <div class="w3-section">
                    <a class="w3-button w3-teal" onclick="document.getElementById('id01').style.display='none'">Annuler  <i class="fa fa-remove"></i></a>
                    <input type="submit" name="submitLive" value="Diffuser" class="w3-button w3-red w3-right" onclick="document.getElementById('id01').style.display='none'"><i class=""></i>
                </div>
            </form>
        </div>



        <!-- RUBRIQUE EVENT -->
        <div id="event" class="w3-container rubrique">
            <form class="w3-padding-24" action="dbConnect/post.php" method="post" enctype="multipart/form-data">
<!--                <input name="event" type="hidden">-->

                <label>Catégorie</label>
                <select class="w3-input w3-border w3-margin-bottom" name="categorie">
                    <?php
                    $categorie = $Connexion->query("SELECT categorie_name AS categorie FROM categorie");
                    while ($tag_name = $categorie->fetch()){
                        ?>
                            <option value="<?php echo $tag_name['categorie']?>"><?php echo strtoupper($tag_name['categorie'])?></option>
                        <?php
                    }
                    $categorie->closeCursor();
                    ?>
                </select>

                <label>Titre</label>
                <input class="w3-input w3-border w3-margin-bottom" type="text" name="titre">


                <div class="w3-row">
                    <div class="w3-half w3-margin-right">
                        <label>Date de diffuson de l'évènement</label>
                        <input class="w3-input w3-border w3-margin-bottom" type="date" placeholder="Date de diffusion" name="date_event">
                    </div>

                    <div class="w3-rest w3-margin-lef">
                        <label>L'heure de diffusion</label>
                        <input class="w3-input w3-border w3-margin-bottom" type="time" placeholder="Heure de diffusion" name="heure_event">
                    </div>
                </div>

                <label>Image de couverture</label>
                <input class="w3-input w3-border w3-large w3-margin-bottom" type="file" name="cover" accept="image/jpeg, image/png, image/jpg">

                <div class="w3-section">
                    <button type="reset" class="w3-button w3-red" onclick="document.getElementById('id01').style.display='none'">Annuler  <i class="fa fa-remove"></i></button>
                    <button type="submit" name="submitEvent" class="w3-button w3-red w3-right" onclick="document.getElementById('id01').style.display='none'">Publier  <i class="fa fa-paper-plane"></i></button>
                </div>
            </form>
        </div>




        <!-- RUBRIQUE REPLAY -->
        <div id="replay" class="w3-container rubrique">
            <form class="w3-padding-24" action="dbConnect/post.php" method="post" enctype="multipart/form-data">
                <input name="replay" type="hidden">

                <label>Catégorie</label>
                <select class="w3-input w3-border w3-margin-bottom" name="categorie">
                    <?php
                    $categorie = $Connexion->query("SELECT categorie_name AS categorie FROM categorie");
                    while ($tag_name = $categorie->fetch()){
                        ?>
                        <option value="<?php echo $tag_name['categorie']?>"><?php echo strtoupper($tag_name['categorie'])?></option>
                        <?php
                    }
                    $categorie->closeCursor();
                    ?>
                </select>

                <label>URL de la vidéo</label>
                <input class="w3-input w3-border w3-margin-bottom" type="url" placeholder="Lien de la vidéo" name="videoLink">

                <label>Titre</label>
                <input class="w3-input w3-border w3-margin-bottom" type="text" name="titre">

                <label>Image de couverture</label>
                <input class="w3-input w3-border w3-large w3-margin-bottom" type="file" name="cover" accept="image/jpeg, image/png, image/jpg">

                <div class="w3-section">
                    <button type="reset" class="w3-button w3-light-gray w3-hover-red" onclick="document.getElementById('id01').style.display='none'">Annuler  <i class="fa fa-remove"></i></button>
                    <button type="submit" name="submitReplay" class="w3-button w3-red w3-right">Publier  <i class="fa fa-paper-plane"></i></button>
                </div>
            </form>
        </div>

        <div class="w3-container w3-light-grey w3-padding">
            <button class="w3-button w3-right w3-white w3-border"
                    onclick="document.getElementById('id01').style.display='none'">Close</button>
        </div>
    </div>
</div>




<!-- Overlay effect when opening the side navigation on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="Close Sidemenu" id="myOverlay"></div>




<!-- Page content -->
<div class="w3-main" style="margin-left:320px;">
    <i class="fa fa-bars w3-button w3-white w3-hide-large w3-xlarge w3-margin-left w3-margin-top" onclick="w3_open()"></i>
    <a href="javascript:void(0)" class="w3-hide-large w3-red w3-button w3-right w3-margin-top w3-margin-right" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-pencil"></i></a>

    <div id="Borge" class="w3-container person">
        <br>

        <?php
            $video_replay = $Connexion->query("SELECT id_replay, poster, titre_video_replay, date_post, tag_name, categorie_name FROM replay, categorie
                                                  WHERE tag_name = id_categorie");
            while ($video = $video_replay->fetch())
            {
        ?>
        <div class="w3-quarter">
            <div class="w3-card-4 w3-center" style="width:80%">
                <img src="<?php echo $image_path . $video['poster'] ?>" alt="<?php echo $video['titre_video_replay'] ?>" style="width:100%" class="">
                <div class="w3-container w3-center">
                    <p><em><strong><?php echo strtoupper($video['categorie_name']) ?> :</strong></em><br> <?php echo $video['titre_video_replay'] ?></p>
<!--                    <a href="#" class="w3-hover-red w3-button w3-left w3-light-gray w3-margin-bottom">Modifier</a>-->
                    <a href="../toDisplay/to_remove.php?replayToRemove=<?php echo $video['id_replay']; ?>" class="w3-hover-red w3-button w3-right w3-light-gray w3-margin-bottom">Supprimer</a>
                </div>
            </div>
        </div>
        <?php
            }
            $video_replay->closeCursor();
        ?>

    </div>

    <div id="Jane" class="w3-container person">
        <br>
        <?php
        $video_event = $Connexion->query("SELECT id_event, cover_event, titre_event, date_post, tag_name, categorie_name FROM event, categorie
                                                  WHERE tag_name = id_categorie");
        while ($video = $video_event->fetch())
        {
            ?>
            <div class="w3-quarter">
                <div class="w3-card-4 w3-center" style="width:80%">
                    <img src="<?php echo $image_path . $video['cover_event'] ?>" alt="<?php echo $video['titre_event'] ?>" style="width:100%" class="">
                    <div class="w3-container w3-center">
                        <p><em><strong><?php echo strtoupper($video['categorie_name']) ?> :</strong></em><br> <?php echo $video['titre_event'] ?></p>
<!--                        <a href="#" class="w3-hover-red w3-button w3-left w3-light-gray w3-margin-bottom">Modifier</a>-->
                        <a href="../toDisplay/to_remove.php?eventToRemove=<?php echo $video['id_event']; ?>" class="w3-hover-red w3-button w3-right w3-light-gray w3-margin-bottom">Supprimer</a>
                    </div>
                </div>
            </div>
            <?php
        }
        $video_event->closeCursor();
        ?>

    </div>

<!--    <div id="John" class="w3-container person">
        <br>
        <img class="w3-round w3-animate-top" src="/w3images/avatar2.png" style="width:20%;">
        <h5 class="w3-opacity">Subject: None</h5>
        <h4><i class="fa fa-clock-o"></i> From John Doe, Sep 23, 2015.</h4>
        <a class="w3-button w3-light-grey">Reply<i class="w3-margin-left fa fa-mail-reply"></i></a>
        <a class="w3-button w3-light-grey">Forward<i class="w3-margin-left fa fa-arrow-right"></i></a>
        <hr>
        <p>Welcome.</p>
        <p>That's it!</p>
    </div>
-->
</div>


<?php
if(file_exists('Inc/footer.php')){
    include "Inc/footer.php";
}

?>