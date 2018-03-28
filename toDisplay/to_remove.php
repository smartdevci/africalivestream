<?php
session_start();


if($_SERVER['REQUEST_METHOD'] == 'GET'){


    if(file_exists("../admin/dbConnect/connexion_db.php")){
        include "../admin/dbConnect/connexion_db.php";
    }


    if(isset($_GET["replayToRemove"])){
        // SELECTION DE VIDEO
        $video = $Connexion->prepare("DELETE FROM replay WHERE id_replay = ?");
        $video->execute(array($_GET['replayToRemove']));

        header("location: ../admin/post.php");
    }


    if(isset($_GET["eventToRemove"])){
        // SELECTION DE VIDEO
        $video = $Connexion->prepare("DELETE FROM event WHERE id_event = ?");
        $video->execute(array($_GET['eventToRemove']));

        header("location: ../admin/post.php");
    }
}
?>