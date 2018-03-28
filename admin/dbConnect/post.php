<?php
session_start();

if(file_exists("connexion_db.php")){
    include 'connexion_db.php';
}

if(file_exists("uploadFiles.php")){
    include 'uploadFiles.php';
}

if(file_exists("validateInput.php")){
    include 'validateInput.php';
}


// SI ON AJOUTE UN NOUVEAU LIVE
if(isset($_POST['submitLive'])){

    $target_dir = '../../image/';

    // Nom du fichier sur le serveur (Nom du fichier original)
    $file_name = uploadFile($target_dir, $_FILES['cover']);
    $image_svr = basename($_FILES['cover']['name']);
    //echo $file_name. ' Chargé';


    try{
        $live = $Connexion->prepare("INSERT INTO live(tag_name,
                                                        live_link,
                                                        titre_live,
                                                        cover_live,
                                                        img_server
                                                        )

											   VALUES (
														(SELECT id_categorie FROM categorie WHERE categorie_name = :categorie),
														:url_lien,
														:titre,
														:couverture_img,
														:image_svr
														)
                                  ");

    } catch(PDOException $err) {
        die("Erreur survenue : => " .$err->getMessage());
    }

    $live -> execute(array(
        "titre" => validator($_POST['titre']),
        "couverture_img" => $file_name,
        "categorie" => validator($_POST['categorie']),
        "image_svr" => $image_svr,
        "url_lien" => corrigerLienYoutube(validator($_POST['link']))
    ));

    $live ->closeCursor();


//    $_SESSION['articlePublished'] = "L'article <span>&ll;</span>" . strtoupper($_POST['titreArticle']) . " <span>&gg;</span> a bien été publié !";


    header('location:../post.php');

//    print_r($_POST) . '<br>';
//    print_r($_FILES);
}


// SI ON AJOUTE UN NOUVEAU EVENT
if(isset($_POST['submitEvent'])){

    $target_dir = '../../image/';

    // Nom du fichier sur le serveur (Nom du fichier original)
    $file_name = uploadFile($target_dir, $_FILES['cover']);
    $image_svr = basename($_FILES['cover']['name']);
    //echo $file_name. ' Chargé';


    try{
        $live = $Connexion->prepare("INSERT INTO event(tag_name,
                                                        cover_event,
                                                        date_event,
                                                        titre_event,
                                                        img_server,
                                                        date_post,
                                                        compte_a_rebours
                                                        )

											   VALUES (
														(SELECT id_categorie FROM categorie WHERE categorie_name = :categorie),
														:cover,
														DATE_FORMAT(:date_event, '%Y-%m-%d %H:%m:%s'),
														:titre,
														:image_svr,
														NOW(),
														:rebour
														)
                                  ");

    } catch(PDOException $err) {
        die("Erreur survenue : => " .$err->getMessage());
    }

    $live -> execute(array(
        "titre" => validator($_POST['titre']),
        "cover" => $file_name,
        "categorie" => validator($_POST['categorie']),
        "image_svr" => $image_svr,
        "date_event" => validator($_POST['date_event'] . " " . $_POST['heure_event']),
        "rebour" => "compte_a_r"
    ));

    $live ->closeCursor();


//    $_SESSION['articlePublished'] = "L'article <span>&ll;</span>" . strtoupper($_POST['titreArticle']) . " <span>&gg;</span> a bien été publié !";


    header('location:../post.php');

}



// SI ON AJOUTE UN NOUVEAU REPLAY
if(isset($_POST['submitReplay'])){

    $target_dir = '../../image/';

    // Nom du fichier sur le serveur (Nom du fichier original)
    $file_name = uploadFile($target_dir, $_FILES['cover']);
    $image_svr = basename($_FILES['cover']['name']);
    //echo $file_name. ' Chargé';


    try{
        $replay = $Connexion->prepare("INSERT INTO replay(tag_name,
                                                        poster,
                                                        titre_video_replay,
                                                        video_link,
                                                        img_server,
                                                        date_post
                                                        )

											   VALUES (
														(SELECT id_categorie FROM categorie WHERE categorie_name = :categorie),
														:cover,
                                                        :titre,
                                                        :videoLink,
														:image_svr,
														NOW()
														)
                                  ");

    } catch(PDOException $err) {
        die("Erreur survenue : => " .$err->getMessage());
    }

    $replay -> execute(array(
        "titre" => validator($_POST['titre']),
        "cover" => $file_name,
        "categorie" => validator($_POST['categorie']),
        "image_svr" => $image_svr,
        "videoLink" => corrigerLienYoutube(validator($_POST['videoLink']))
    ));

    $replay ->closeCursor();


//    $_SESSION['articlePublished'] = "L'article <span>&ll;</span>" . strtoupper($_POST['titreArticle']) . " <span>&gg;</span> a bien été publié !";


    header('location:../post.php');

}

