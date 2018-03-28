<?php
    function validator($input_text){
        $data = trim($input_text);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }




    function check_email_validate($email){
        $email_pattern = "#^[a-z0-9._-]+@[a-z0-9.-]+\\.[a-z]{2,4}$#";
        $check = preg_match($email_pattern, $email);

        if ($check){
            return $check;
        }

        return '';
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

        include '../dbConnect/connexion_db.php';

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