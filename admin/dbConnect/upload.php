<?php

$_FILES['icone']['name'];     //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).

$_FILES['icone']['type'] ;    //Le type du fichier. Par exemple, cela peut être « image/png ».

$_FILES['icone']['size'];   //La taille du fichier en octets.

$_FILES['icone']['tmp_name']; //L'adresse vers le fichier uploadé dans le répertoire temporaire.

$_FILES['icone']['error'];   //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.


// Control du fichier
if ($_FILES['icone']['error'] > 0) $erreur = "Erreur lors du transfert";

if ($_FILES['icone']['size'] > $maxsize) $erreur = "Le fichier est trop gros";

$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );

//1. strrchr renvoie l'extension avec le point (« . »).

//2. substr(chaine,1) ignore le premier caractère de chaine.

//3. strtolower met l'extension en minuscules.

$extension_upload = strtolower(  substr(  strrchr($_FILES['icone']['name'], '.')  ,1)  );

if ( in_array($extension_upload,$extensions_valides) ) echo "Extension correcte";


// Taille du fichier (largeur x hauteur)
$image_sizes = getimagesize($_FILES['icone']['tmp_name']);

if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) $erreur = "Image trop grande";




function upload($index,$destination,$maxsize=FALSE,$extensions=FALSE)

{

    //Test1: fichier correctement uploadé

    if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;

    //Test2: taille limite

    if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;

    //Test3: extension

    $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);

    if ($extensions !== FALSE AND !in_array($ext,$extensions)) return FALSE;

    //Déplacement

    return move_uploaded_file($_FILES[$index]['tmp_name'],$destination);

}