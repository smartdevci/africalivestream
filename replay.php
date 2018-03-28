<link rel="stylesheet" href="w3css/4/w3.css">
<link rel="stylesheet" href="w3css/4/font-awesome.css">
<link rel="stylesheet" href="w3css/lib/w3-theme-red.css">

<?php
session_start();
$_SESSION['replay'] = 'page-replay';


if(file_exists("Inc/Headers.php")){
    include 'Inc/Headers.php';
}

if(file_exists("Inc/navbar.php")){
    include "Inc/navbar.php";
}

$image_path = 'image/';

?>


<body>
    <section class="w3-container">
        <?php
            if(isset($_SESSION['display'])){
                $last_video = $Connexion->query("SELECT video_link, titre_video_replay FROM replay WHERE id_replay = " . $_SESSION['display']);
                while ($video_replay = $last_video->fetch()){
            ?>
                <div class="w3-threequarter w3-padding-24">
                    <iframe width="95%" height="560" src="<?php echo $video_replay['video_link'] ?>" frameborder="0" allow="autoplay=1; encrypted-media" allowfullscreen></iframe>
                </div>
            <?php
                }
                $last_video->closeCursor();

            } else {
                $last_video = $Connexion->query("SELECT video_link, titre_video_replay FROM replay ORDER BY id_replay DESC LIMIT 1");
                while ($video_replay = $last_video->fetch()){
                    ?>
                    <div class="w3-threequarter w3-padding-24">
                        <iframe width="95%" height="560" src="<?php echo $video_replay['video_link'] ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                    <?php
                }
                $last_video->closeCursor();
                ?>
        <?php
            }
        ?>

        <div class="w3-quarter w3-padding-24">
            <div class="w3-center">
                <img src="image/dd.jpg" alt="pub" class="" style="width: 360px;">
            </div>
        </div>
    </section>

<!--CATEGORIE DE VIDEO-->
    <div class="w3-row">
        <div class="w3-container w3-padding">
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button tablink w3-red" onclick="openLink(event, 'last')">Vidéos récentes</button>

                <?php
                $liste_categorie = $Connexion->query("SELECT id_categorie, categorie_name FROM categorie");
                $cat_name = '';     // Pour récuperer les noms des categories dans la BDD
                $cat_id = 0;     // Pour récuperer les id des categories dans la BDD
                $cat_list = array();    // Tableau des nom de categorie
                $cat_name_id = array();     // Pour récuperer les ID des categorie_name dans la BDD
                $_ID_NAME = array();

                $i = 0;
                while ($categorie = $liste_categorie->fetch())
                    {
                        $cat_list[$i] = $categorie['categorie_name'];
                        $_SESSION[$cat_id] = $categorie['id_categorie'];


                        foreach ($categorie as $cat_id => $cat_name){
                            $_SESSION[$cat_name] = $cat_name;
                            $cat_id = $categorie['id_categorie'];
                            $cat_name_id[$categorie['categorie_name'] . $categorie['id_categorie']] = $categorie['categorie_name'];
                            $_ID_NAME[$i] = $cat_name_id[$categorie['categorie_name'] . $categorie['id_categorie']];
                        }
//                        echo $_SESSION[$cat_id];

                ?>
                    <button class="w3-bar-item w3-button tablink" onclick="openLink(event, '<?php echo $_SESSION[$cat_name]?>')">
                        <?php echo $_SESSION[$cat_name]?>
                    </button>
                <?php
                        $i++;
                    }
                    $liste_categorie->closeCursor();
                ?>
<!--
                <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'sport')">Sport</button>
                <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'religion')">Réligion</button>
                <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'culture')">Culture</button>
                <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'politique')">Politique</button>
                <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'economie')">Economie</button>
-->
            </div>

            <div id="last" class="w3-container w3-border w3-padding-16 categorie">
                <?php
                $liste_categorie = $Connexion->query("SELECT id_replay, poster, video_link, tag_name, titre_video_replay FROM replay ORDER BY id_replay DESC " );
                while ($categorie = $liste_categorie->fetch())
                {
                    ?>
                    <div class="w3-quarter w3-display-container">
                        <div class="w3-card-4 w3-center" style="width:80%">
                            <img src="<?php echo $image_path . $categorie['poster'] ?>" alt="<?php echo $categorie['titre_video_replay'] ?>" style="width:100%" class="">
                            <div class="w3-display-middle w3-padding" style="margin-left: -30px">
                                <a href="toDisplay/to_display.php?videoToDisplay=<?php echo $categorie['id_replay']; ?>"><span class="fa fa-youtube-play fa-5x w3-hover-red"></span></a>
                            </div>
                        </div>
                    </div>

                    <?php
                }
                $liste_categorie->closeCursor();
                ?>
            </div>

<!--
            <?php
/*                $i = 0;
                echo count($cat_list);
                while ($i < count($cat_list)){
                    if(in_array($_SESSION[$cat_name], $cat_list) && array_intersect($cat_name_id, $_ID_NAME))
                    {
            */?>
                    <div id="<?php /*echo $_SESSION[$cat_name];*/?>" class="w3-container w3-border w3-padding-16 categorie" style="display: none;">
                        <div class="w3-quarter w3-padding">
                            <iframe width="100%" height="280" src="https://www.youtube.com/embed/G71AzW1jD8Y" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                        <div class="w3-quarter w3-padding">
                            <iframe width="100%" height="280" src="https://www.youtube.com/embed/47NqYhYuiwg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
            <?php
/*                    }
                    $i++;
                }
            */?>

-->
            <div id="sport" class="w3-container w3-border w3-padding-16 categorie" style="display: none;">
                <?php
                $liste_categorie = $Connexion->query("SELECT poster, video_link, tag_name FROM replay WHERE tag_name = 
                                                                (SELECT id_categorie FROM categorie WHERE categorie_name = 'sport') ORDER BY id_replay DESC " );
                while ($categorie = $liste_categorie->fetch())
                {
                ?>
                    <div class="w3-quarter">
                        <div class="w3-card-4 w3-center" style="width:80%">
                            <img src="<?php echo $image_path . $categorie['poster'] ?>" alt="<?php echo $categorie['titre_event'] ?>" style="width:100%" class="">
                            <div class="w3-container w3-center">
                                <p><em><strong><?php echo strtoupper($categorie['categorie_name']) ?> :</strong></em><br> <?php echo $categorie['titre_event'] ?></p>
                                <a href="#" class="w3-hover-red w3-button w3-left w3-light-gray w3-margin-bottom">Modifier</a>
                                <a href="#" class="w3-hover-red w3-button w3-right w3-light-gray w3-margin-bottom">Supprimer</a>
                            </div>
                        </div>
                    </div>

                    <div class="w3-quarter w3-padding">
                        <iframe width="100%" height="280" src="https://www.youtube.com/embed/70o_ksqMwoo" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                <?php
                }
                $liste_categorie->closeCursor();
                ?>

            </div>

            <div id="religion" class="w3-container w3-border w3-padding-16 categorie" style="display: none;">
                <?php
                $liste_categorie = $Connexion->query("SELECT id_replay, poster, video_link, tag_name, titre_video_replay FROM replay WHERE tag_name = 
                                                                (SELECT id_categorie FROM categorie WHERE categorie_name = 'religion') ORDER BY id_replay DESC " );
                while ($categorie = $liste_categorie->fetch())
                {
                    ?>
                    <div class="w3-quarter w3-display-container">
                        <div class="w3-card-4 w3-center" style="width:80%">
                            <img src="<?php echo $image_path . $categorie['poster'] ?>" alt="<?php echo $categorie['titre_video_replay'] ?>" style="width:100%" class="">
                            <div class="w3-display-middle w3-padding" style="margin-left: -30px">
                                <a href="toDisplay/to_display.php?videoToDisplay=<?php echo $categorie['id_replay']; ?>"><span class="fa fa-youtube-play fa-5x w3-hover-red"></span></a>
                            </div>
                        </div>
                    </div>

                    <?php
                }
                $liste_categorie->closeCursor();
                ?>
            </div>

            <div id="culture" class="w3-container w3-border w3-padding-16 categorie" style="display: none;">
                <?php
                $liste_categorie = $Connexion->query("SELECT id_replay, poster, video_link, tag_name, titre_video_replay FROM replay WHERE tag_name = 
                                                                (SELECT id_categorie FROM categorie WHERE categorie_name = 'culture') ORDER BY id_replay DESC " );
                while ($categorie = $liste_categorie->fetch())
                {
                    ?>
                    <div class="w3-quarter w3-display-container">
                        <div class="w3-card-4 w3-center" style="width:80%">
                            <img src="<?php echo $image_path . $categorie['poster'] ?>" alt="<?php echo $categorie['titre_video_replay'] ?>" style="width:100%" class="">
                            <div class="w3-display-middle w3-padding" style="margin-left: -30px">
                                <a href="toDisplay/to_display.php?videoToDisplay=<?php echo $categorie['id_replay']; ?>"><span class="fa fa-youtube-play fa-5x w3-hover-red"></span></a>
                            </div>
                        </div>
                    </div>

                    <?php
                }
                $liste_categorie->closeCursor();
                ?>
            </div>

            <div id="politique" class="w3-container w3-border w3-padding-16 categorie" style="display: none;">
                <?php
                $liste_categorie = $Connexion->query("SELECT id_replay, poster, video_link, tag_name, titre_video_replay FROM replay WHERE tag_name = 
                                                                (SELECT id_categorie FROM categorie WHERE categorie_name = 'politique') ORDER BY id_replay DESC " );
                while ($categorie = $liste_categorie->fetch())
                {
                    ?>
                    <div class="w3-quarter w3-display-container">
                        <div class="w3-card-4 w3-center" style="width:80%">
                            <img src="<?php echo $image_path . $categorie['poster'] ?>" alt="<?php echo $categorie['titre_video_replay'] ?>" style="width:100%" class="">
                            <div class="w3-display-middle w3-padding" style="margin-left: -30px">
                                <a href="toDisplay/to_display.php?videoToDisplay=<?php echo $categorie['id_replay']; ?>"><span class="fa fa-youtube-play fa-5x w3-hover-red"></span></a>
                            </div>
                        </div>
                    </div>

                    <?php
                }
                $liste_categorie->closeCursor();
                ?>
            </div>

            <div id="economie" class="w3-container w3-border w3-padding-16 categorie" style="display: none;">
                <?php
                $liste_categorie = $Connexion->query("SELECT id_replay, poster, video_link, tag_name, titre_video_replay FROM replay WHERE tag_name = 
                                                                (SELECT id_categorie FROM categorie WHERE categorie_name = 'economie') ORDER BY id_replay DESC " );
                while ($categorie = $liste_categorie->fetch())
                {
                    ?>
                    <div class="w3-quarter w3-display-container">
                        <div class="w3-card-4 w3-center" style="width:80%">
                            <img src="<?php echo $image_path . $categorie['poster'] ?>" alt="<?php echo $categorie['titre_video_replay'] ?>" style="width:100%" class="">
                            <div class="w3-display-middle w3-padding" style="margin-left: -30px">
                                <a href="toDisplay/to_display.php?videoToDisplay=<?php echo $categorie['id_replay']; ?>"><span class="fa fa-youtube-play fa-5x w3-hover-red"></span></a>
                            </div>
                        </div>
                    </div>

                    <?php
                }
                $liste_categorie->closeCursor();
                ?>
            </div>
        </div>
    </div>





<?php
if(file_exists("Inc/Footers.php")){
    include 'Inc/Footers.php';
}

session_destroy();
?>
