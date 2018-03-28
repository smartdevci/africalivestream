<!--Status bar-->
<!--
<div class="w3-container w3-padding-small w3-hide-small w3-theme-d3 w3-theme-dark">
    <div class="w3-right">
        18 Déc 2017 | 20:45
    </div>
</div>
-->

<!--Toolbar-->
<div class="w3-container w3-padding-small w3-bar w3-theme w3-medium w3-right">
    <a class="w3-bar-item w3-hover-dark-red" href="https://www.youtube.com/watch?v=6foCBWQ5VS0" target="_blank"><i class="fa fa-youtube fa-2x" style="font-size: 1.5em"></i></a>
    <a class="w3-bar-item w3-hover-twitter-blue" href="https://twitter.com/africalivstream" target="_blank"><i class="fa fa-twitter fa-2x" style="font-size: 1.5em"></i></a>
    <a class="w3-bar-item w3-hover-facebook-blue" href="https://www.facebook.com/africalivestream/" target="_blank"><i class="fa fa-facebook-official fa-2x" style="font-size: 1.5em"></i></a>
    <!--<a class="w3-button w3-bar-item w3-right" href="#"><i class=" w3-bar-item w3-button fa fa-search" style="font-size: 1.5em"></i></a>-->
    <a id="search-btn" class="w3-bar-item w3-hover-search w3-right" href="#"><i class="fa fa-search"></i></a>
    <input id="search-input" type="text" name="search" class="w3-bar-item w3-right w3-input w3-mobile " placeholder="Recherche..."
           style="display: none;">
</div>

<!--Menu bar / NavBar-->
<div class="">
    <nav class="w3-bar w3-theme">
        <a href="index.php" class="w3-bar-item w3-hover-search w3-hover-none">
            <img src="image/logo.png" alt="Logo" class="" style="height: 50px; position: relative; top: -10px; margin-bottom: -20px">
        </a>
        <span class="w3-left"><strong>AFRICA LIVE STREAM</strong><br>Leader du streaming en Afrique</span>

        <div class="w3-right">
            <a href="index.php" <?php echo isset($_SESSION['home']) ? 'class="w3-bar-item w3-hover-search w3-hide-small active"' : 'class="w3-bar-item w3-hover-search w3-hide-small"';?> >Accueil</a>
            <a href="replay.php" <?php echo isset($_SESSION['replay']) ? 'class="w3-bar-item w3-hover-search w3-hide-small active"' : 'class="w3-bar-item w3-hover-search w3-hide-small"';?> >Replay</a>
            <!--<div class="w3-dropdown-hover w3-hide-small">
                <button type="button" class="w3-button w3-hover-white">Enseignement</button>
                <div class="w3-dropdown-content w3-bar-block w3-card">
                    <a href="#Vidéos" class="w3-bar-item w3-hover-search w3-hide-small">Viéos</a>
                    <a href="#Textes" class="w3-bar-item w3-hover-search w3-hide-small">Texte</a>
                    <a href="#Audios" class="w3-bar-item w3-hover-search w3-hide-small">Audio</a>
                </div>
            </div>
            <div class="w3-dropdown-hover w3-hide-small">
                <button type="button" class="w3-button w3-hover-white">Témoignage</button>
                <div class="w3-dropdown-content w3-bar-block w3-card">
                    <a href="#" class="w3-bar-item w3-hover-search w3-hide-small">Viéos</a>
                    <a href="#" class="w3-bar-item w3-hover-search w3-hide-small">Texte</a>
                    <a href="#" class="w3-bar-item w3-hover-search w3-hide-small">Audio</a>
                </div>
            </div>-->
            <a href="agenda.php" <?php echo isset($_SESSION['agenda']) ? 'class="w3-bar-item w3-hover-search w3-hide-small active"' : 'class="w3-bar-item w3-hover-search w3-hide-small"';?>>Agenda</a>
            <a href="contact.php" <?php echo isset($_SESSION['contact']) ? 'class="w3-bar-item w3-hover-search w3-hide-small active"' : 'class="w3-bar-item w3-hover-search w3-hide-small"';?>>Contact</a>
        </div>
        <a href="javascript:void(0);" class="w3-bar-item w3-hover-search w3-hide-large w3-hide-medium w3-right"
           onclick="showMenuResponsive()">&#9776;</a>
    </nav>
</div>


<!--MENU POUR PETIT ECRAN-->
<div id="menuSmallScreen" class="w3-bar-block w3-hide w3-hide-medium w3-hide-large w3-theme">
    <a href="replay.php" class="w3-bar-item w3-hover-search" onclick="showMenuResponsive()">Replay</a>
    <a href="agenda.php" class="w3-bar-item w3-hover-search" onclick="showMenuResponsive()">Agenda</a>
    <a href="contact.php" class="w3-bar-item w3-hover-search" onclick="showMenuResponsive()">Contact</a>
</div>

