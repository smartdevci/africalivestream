<?php
    function validator($input_text){
        $data = trim($input_text);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }


    function redimImage($image_a_redimensionner){

        // Max height and width
        $max_width = 240;
        $max_height = 180;

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
//        ImageDestroy($src) ;
//        ImageDestroy($dst) ;
    }


    function corrigerLienYoutube($lien_youtube){
        $old = 'watch?v=';
        $link = "embed/";
        $new_link = str_replace($old, $link, $lien_youtube);

        return $new_link;
    }



    function check_email_validate($email){
        $email_pattern = "#^[a-z0-9._-]+@[a-z0-9.-]+\\.[a-z]{2,4}$#";
        $check = preg_match($email_pattern, $email);

        if ($check){
            return $check;
        }
    }


    function check_login_validate($login){
        $login_pattern = "#^[a-zA-Z0-9]{4,}$#";
        $check = preg_match($login_pattern, $login);

        if ($check){
            return $check;
        }
    }


    function check_passw_validate($passw){
        $pwd_pattern = "#^[a-zA-Z0-9]{4,}$#";
        $check = preg_match($pwd_pattern, $passw);

        if ($check){
            return $check;
        }
    }


    function check_nom($nom){
        $nom_pattern = "#^[a-zA-Z']+$#";
        $check = preg_match($nom_pattern, $nom);

        if ($check){
            return $check;
        }
    }


    function check_prenom($pnom){
        $pnom_pattern = "#^[a-zA-Z ']+$#";
        $check = preg_match($pnom_pattern, $pnom);

        if ($check){
            return $check;
        }
    }


    function no_doublon($inputField, $fieldInTable, $table, $sessionName=""){

        include '../db/connexion_db.php';

        // SI UNE ADRESSE MAIL EXISTE DEJA
        if(isset($inputField)){


            // Connexion à la base de données pour vérifier si l'email entré n'existe pas déjà
            $fields = $Connexion->query("SELECT " . $fieldInTable ." FROM " . $table);

            // SI l'email saisi correspondent à un email dans
            // la table utilisateur de la base de données,
            // on refuse l'enregistrement du nouvel user
            while ($myField = $fields->fetch()){
                $data_found_in_table = $myField[$fieldInTable];
                if($data_found_in_table == $inputField){
                    $_SESSION[$sessionName.'_exist'] = "<b>" . $inputField . "</b> est déjà utilisé par un autre compte...<br>
                                                        Veuillez-en choisir un autre SVP !";
                    echo $data_found_in_table . ' ';
                    //break;
                    return true;

                }

            }



        }
    }

?>