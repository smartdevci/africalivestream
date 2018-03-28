<?php
   $Host = 'localhost';
   $Dbname = 'livestream';
   $User = 'root';
   $Password = '';

//     $Host = '185.98.131.90';
//     $Dbname = 'afric906412';
//     $User = 'afric906412';
//     $Password = 'dhz7q34hxr';


    try{
        $Connexion = new PDO("mysql:host=$Host; dbname=$Dbname; charset=utf8", $User, $Password,
                                    array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION)
        );

    }catch (PDOException $err){
        echo "Connexion à la base de données non établie ! <br>Erreur : ". $err->getMessage();
    }

?>