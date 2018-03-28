<!--Footer-->
<footer class="w3-bar w3-theme w3-hide-small">
    <p class="w3-bar-item w3-left">2018 Copyright &copy; Africa live stream</p>
    <p class="w3-bar-item w3-right">
        <span class="w3-text-black">Design by</span> SmartDev
    </p>
</footer>

<!--Footer small-->
<footer class="w3-bar w3-theme w3-hide-large w3-hide-medium">
    <div class="w3-center">
        <p class="w3-bar-item">2018 Copyright &copy; Africa live stream</p>
        <p class="w3-bar-item "><span class="w3-text-black">Design by</span> SmartDev</p>
    </div>
</footer>



<!--Javascript Files-->
<script src="w3css/js/jquery.min.js" type="text/javascript"></script>
<script>
    $('#search-btn').click(function () {
        $('#search-input').css("display", 'inline');
        $('#search-input').css("float", 'right');
        $('#search-input').css("width", '50%');
        $('#search-input').css("transition", '2s ease width');
    });


    function showMenuResponsive() {
        var menu_id = document.getElementById('menuSmallScreen');
        if(menu_id.className.indexOf("w3-show") == -1){
            menu_id.className += " w3-show";
        } else {
            menu_id.className = menu_id.className.replace(" w3-show", "");
        }
    }

    //    SLIDE
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n){
        showDivs(slideIndex += n);
    }

    function showDivs(n){
        var i;
        var className = document.getElementsByClassName("slideEventLive");
        if(n > className.length){slideIndex = 1;}
        if(n < 1){slideIndex = className.length;}

        for (i = 0; i < className.length; i++) {
            className[i].style.display = "none";
        }

        className[slideIndex-1].style.display = "block";
    }
</script>


<!--CATEGORIE TAB-->
<script>
    function openLink(evt, categorieName) {
        var i, x, tablinks;
        x = document.getElementsByClassName("categorie");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < x.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
        }
        document.getElementById(categorieName).style.display = "block";
        evt.currentTarget.className += " w3-red";
    }
</script>

</body>
</html>