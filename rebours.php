<?php
/**
 * Created by IntelliJ IDEA.
 * User: Lael Deboue
 * Date: 23/03/2018
 * Time: 13:28
 */
session_start();
include "admin/dbConnect/connexion_db.php";

$last_video = $Connexion->query("SELECT date_post, date_event FROM event");
while ($video_replay = $last_video->fetch()){

    $_SESSION['date_1'] = $video_replay['date_post'];
    $_SESSION['date_2'] = $video_replay['date_event'];
    ?>
    <div class="w3-threequarter w3-padding-24">
        <iframe width="95%" height="560" src="<?php echo $video_replay['video_link'] ?>" frameborder="0" allow="autoplay=1; encrypted-media" allowfullscreen></iframe>
    </div>

    <label id="Compte"></label>
    <script type="text/JavaScript">

        var date_post = new Date("<?php echo $_SESSION['date_1'];?>");
        var date_event = new Date("<?php echo $_SESSION['date_2'];?>");

        alert(date_post);

        var Affiche=document.getElementById("Compte");
        //alert((date_event/date_post)/1000);

        function Rebour() {
//            var date1 = date_post;
//            var date_evt = date_event;

            var sec = (date_event - date_post) / 1000;
            var n = 24 * 3600;
            if (sec > 0) {
                j = Math.floor (sec / n);
                h = Math.floor ((sec - (j * n)) / 3600);
                mn = Math.floor ((sec - ((j * n + h * 3600))) / 60);
                sec = Math.floor (sec - ((j * n + h * 3600 + mn * 60)));
                Affiche.innerHTML = "Temps restant : " + j +" j "+ h +" h "+ mn +" min "+ sec + " s ";
                window.status = "Temps restant : " + j +" j "+ h +" h "+ mn +" min "+ sec + " s ";
            }
            tRebour=setTimeout ("Rebour();", 1000);
        }

        Rebour();
    </script>

<?php
}
$last_video->closeCursor();


?>



