<?php
    //$file = uploadFile('../images/');
    //echo $file;

    function uploadFile($target_dir, $img_file)
    {
        $Target_dir = $target_dir;          // Dossier de destination
        $target_file = $target_dir . basename($img_file['name']);     // Nom du fichier à charger
        $max_size = 3000000; // Taille max = 3 Mo
        $isUpload = 1;
        $image_file_type = pathinfo($target_file, PATHINFO_EXTENSION);     // Type du fichier à charger (JPG, PNG, ...)

        // On vérifie si le fichier est une image ou non
        if(isset($_POST['submit']))
        {
            $check_file_type = getimagesize($img_file['tmp_name']);
            if($check_file_type !== false){
                echo "Le fichier est une image - " . $check_file_type['mime'] . ".<br>";
                $isUpload = 1;
            }else{
                echo "Le fichier n'est pas une image.<br>";
                $isUpload = 0;
            }
        }


        // Vérifier si le fichier existe déjà
        if(file_exists($target_file)){
            echo "Désolé, le fichier existe déjà !<br>";
            $isUpload = 0;
        }


        // Vérifier si le fichier n'eccède pas la taille max
        if($img_file['size'] > $max_size){
            echo "Le fichier est trop volumineux pour être chargé !<br>";
            $isUpload = 0;
        }


        // Format de fichier autorisé
        if($image_file_type != 'jpg' &&
            $image_file_type != 'png' &&
            $image_file_type != 'jpeg' &&
            $image_file_type != 'gif'){

            echo "Désolé, seuls les formats PNG/JPEG/JPG/GIF sont autorisés.<br>";
            $isUpload = 0;
        }


        // Le nom du fichier sans les espaces
/*        $file_name = $_FILES['fileToUpload']['name'];
        if(preg_match('#[\x00-\x1F\x7F-\x9F/\\\\]#', $file_name))
        {
            die("Le nom du fichier n'est pas valide");
        }*/


        // Nom du fichier à générer automatiquement
        $file_name_generation_auto = array(
            "A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z",
            "a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z",
            "0","1","2","3","4","5","6","7","8","9","_");


        // Le nom du fichier à enregistrer
        $file_name_to_save = "";

        for($i=0; $i<=20; $i++){
            $file_name_to_save = $file_name_to_save . $file_name_generation_auto[rand(0, 62)];
        }




        // Vérifier si la variable isUpload = 0
        if($isUpload == 0){
            echo "Désolé, le fichier n'a pas été chargé ! <br> Veuillez reprendre svp !<br>";
        }
        // Si le fichier a bien été chargé
        else{
            if(move_uploaded_file($img_file['tmp_name'], $target_dir . $file_name_to_save . '.' . $image_file_type)){
                echo "Le fichier " . basename($img_file['name']) . " a bien été chargé.<br>";
                //echo $file_name_to_save . '.' . $image_file_type;
                return $file_name_to_save . '.' . $image_file_type;
            } else {
                echo "Il y a une erreur de chargement du fichier<br>";
            }
        }
    }
?>