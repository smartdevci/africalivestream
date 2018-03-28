<?php
/**
 * Created by IntelliJ IDEA.
 * User: Lael Deboue
 * Date: 08/03/2018
 * Time: 18:44
 */
//include "admin/dbConnect/validateInput.php";
//include "admin/dbConnect/connexion_db.php";
//
//redimensionnerImage("3.jpg");

/*$video_event = $Connexion->query("SELECT cover_event FROM event");

if($video_event->rowCount()==1){
    while ($video = $video_event->fetch()){
        redimensionnerImage($video['cover']);
    }
}*/




function redimImage($image_a_redimensionner){

    // Max height and width
    $max_width = 500;
    $max_height = 500;
    // Path to your j peg
    $upfile = $image_a_redimensionner ;
    Header("Content-type:image/jpeg") ;
    $size = GetImageSize($upfile) ; // Read the size
    $width = $size[0] ;
    $height = $size[1] ;
    // Proportionally resize the image to the
    // max sizes specified above
    $x_ratio = $max_width / $width;
    $y_ratio = $max_height / $height;
    if( ($width <= $max_width) && ($height <= $max_height) )
    {
        $tn_width = $width;
        $tn_height = $height;
    } elseif (($x_ratio * $height) < $max_height)
    {
    $tn_height = ceil($x_ratio * $height) ;
    $tn_width = $max_width;
    } else {
        $tn_width = ceil($y_ratio * $width) ;
        $tn_height = $max_height;
    }
    // Increase memory limit to support larger files
    ini_set(' memory_limit' , ' 32M' ) ;
    // Create the new image!
    $src = ImageCreateFromJpeg($upfile) ;
    $dst = ImageCreateTrueColor($tn_width, $tn_height) ;
    ImageCopyResized($dst, $src, 0, 0, 0, 0, $tn_width, $tn_height, $width, $height) ;
    return ImageJpeg($dst) ;
    // Destroy the images
//    ImageDestroy($src) ;
//    ImageDestroy($dst) ;
}


$img = 'image/ALS Profil.jpg';

$img2 = redimImage($img);

echo $img2;

?>

<!--<button onclick="start()">Lancer le décompte</button>
<div id="bip" class="display"></div>
<div id="tps" class="display"></div>

<script>
//    var counter = 2018;

//    var seconds = new Date().getTime() / 1000;
    var mins = 0;
    var heurs = 0;
    var days = 0;
    var snd;
    var minute;
    var heure;

    mins = counter / 60;
    snd = counter % 60;

    heurs = mins / 60;
    minute = mins % 60;

    days = heurs / 24;
    heure = heurs % 24;

//    var date_actuelle = new Date();
//    alert(date_actuelle.toLocaleString());

//    document.getElementById("tps").innerHTML = Math.floor(days) + " jours : " + Math.floor(heure) + "H : " + Math.floor(minute) + "min : " + Math.floor(snd) + "s";

    var counter = 130;

    mins = counter / 60;
    snd = counter % 60;

    heurs = mins / 60;
    minute = mins % 60;

    days = heurs / 24;
    heure = heurs % 24;

    var intervalId = null;
    function action()
    {
        clearInterval(intervalId);
        document.getElementById("bip").innerHTML = "TERMINE!";
    }


    function bip()
    {
//        document.getElementById("bip").innerHTML = counter + " secondes restantes";
//        counter--;
        document.getElementById("tps").innerHTML = Math.floor(days) + " jours : " + Math.floor(heure) + "H : " + Math.floor(minute) + "min : " + Math.floor(snd) + "s";

        if(snd === 0){
            snd = 60;
//            document.getElementById("tps").innerHTML = Math.floor(days) + " jours : " + Math.floor(heure) + "H : " + Math.floor(minute) + "min : " + Math.floor(snd) + "s";
            if(minute <= 0){
                minute = 0;
                heure--;
            }
            minute--;
        }
        snd--;
    }


    function start()
    {
        intervalId = setInterval(bip, 1000);
        setTimeout(action, counter * 1000);
    }
</script>-->