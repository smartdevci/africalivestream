<?php
if(file_exists("admin/dbConnect/connexion_db.php")){
    include 'admin/dbConnect/connexion_db.php';
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <!-- CSS -->
    <link rel="stylesheet" href="w3css/4/w3.css">
    <link rel="stylesheet" href="w3css/4/font-awesome.css">
    <link rel="stylesheet" href="w3css/lib/w3-theme-red.css">

    <!--Icone sur le navigateur -->

    <title>Vidéo en direct</title>

    <!--  Styles CSS internes  -->
    <style>
        .w3-animate-input {
            transition: width 0.4s ease-in-out;
            transition-property: width;
            transition-duration: 0.4s;
            transition-timing-function: ease-in-out;
            transition-delay: 0s;
        }

        input:focus{
            width: 80%;
        }

        a.w3-hover-dark-red:hover{
            color: #bf0004;
            background-color: #fff;
        }

        a.w3-hover-twitter-blue:hover{
            color: #0caeca;
            background-color: #fff;
        }

        a.w3-hover-facebook-blue:hover{
            color: #06436e;
            background-color: #fff;
        }

        a.w3-hover-search:hover{
            color: #bf0004;
            background-color: #fff;
        }

        a.active{
            color: #bf0004;
            background-color: #fff;
        }

        a.w3-bar-item, .w3-right{
            text-decoration: none;
            text-transform: uppercase;
        }

        .w3-bar a,
        .w3-bar button{
            text-transform: uppercase;
        }

        .w3-dropdown-hover:hover > .w3-button:first-child
        {
            background-color: #ffffff;
            color: #000;
        }
    </style>


    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-1168589095248340",
            enable_page_level_ads: true
        });
    </script>


    <link rel="icon" href="image/logo.png" type="image/png">

</head>