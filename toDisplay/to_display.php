<?php
session_start();


if($_SERVER['REQUEST_METHOD'] == 'GET'){


    if(file_exists("../admin/dbConnect/connexion_db.php")){
        include "../admin/dbConnect/connexion_db.php";
    }


    // SELECTION DE VIDEO
    $video = $Connexion->prepare("SELECT id_replay, titre_video_replay, tag_name, video_link, poster
                                                  FROM replay
                                                  WHERE id_replay = ?
                                                  ");

    $video->execute(array($_GET['videoToDisplay']));



    if(isset($_GET['videoToDisplay'])){

        if($video -> rowCount() == 1){
            while ($videoToWatch = $video->fetch()){
                $_SESSION['display'] = $_GET['videoToDisplay'];
            }

            header('location:../replay.php');

        } else {
            $errLoginORmotDePasse = "Le nom d'utilisateur ou le mot passe est incorrect !";
        }
    }
}
?>