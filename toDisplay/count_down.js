



function compte_a_rebours(date_event, date_actuel){
        var compte_a_rebours = document.getElementById("compte_a_rebours");
        var date_actuelle = date_actuel;
        var date_evenement = date_event;
        var total_secondes = (date_evenement - date_actuelle) / 1000;
        var prefixe = "Compte à rebours terminé dans ";

        if (total_secondes < 0){

            prefixe = "Compte à rebours terminé il y a " ; // On modi fi e le préfi xe si la di fférence est négati f
            total_secondes = Math . abs ( total_secondes ) ; // On ne garde que la valeur absolue
        }

        if ( total_secondes > 0 )
        {
            var jours = Math . floor( total_secondes / ( 60 * 60 * 24 ) ) ;
            var heures = Math . floor( ( total_secondes - ( jours * 60 * 60 * 24 ) ) / ( 60 * 60 ) ) ;
            var minutes = Math . floor( ( total_secondes - ( ( jours * 60 * 60 * 24 + heures * 60 * 60 ))) / 60 ) ;
            var secondes = Math . floor( total_secondes - ( ( jours * 60 * 60 * 24 + heures * 60 * 60 + minutes * 60 ))) ;

            var et = "et" ;
            var mot_jour = "jours," ;
            var mot_heure = "heures," ;
            var mot_minute = "minutes," ;
            var mot_seconde = "secondes" ;

            if ( jours == 0 )
            {
                jours = '' ;
                mot_jour = '' ;
            }
            else if ( jours == 1 )
            {
                mot_jour = "jour," ;
            }

            if ( heures == 0 )
            {
                heures = '' ;
                mot_heure = '' ;
            }
            else if ( heures == 1 )
            {
                mot_heure = "heure, " ;
            }

            if ( minutes == 0 )
            {
                minutes = '' ;
                mot_minute = ' ' ;
            }
            else if ( minutes == 1 )
            {
                mot_minute = "minute," ;
            }

            if ( secondes == 0 )
            {
                secondes = '' ;
                mot_seconde = '' ;
                et = '' ;
            }
            else if ( secondes == 1 )
            {
                mot_seconde = "seconde" ;
            }

            if (minutes == 0 && heures == 0 && jours == 0)
            {
                et = "" ;
            }

            compte_a_rebours.innerHTML = prefixe + jours + ' ' + mot_jour + ' ' + heures + ' ' + mot_heure + ' ' +
                minutes + ' ' + mot_minute + ' ' + et + ' ' + secondes + ' ' + mot_seconde;

            // compte_a_rebours.innerHTML = prefixe + jours + ' ' + mot_jour + ' ' + heures + ' ' + mot_heure + ' ' +
            //     minutes + ' ' + mot_minute + ' ' + et + ' ' + secondes + ' ' + mot_seconde;
        }
        else
        {
            compte_a_rebours . innerHTML = ' Compte à rebours terminé.';
        }

        var actualisation = setTimeout("compte_a_rebours();", 1000) ;
    }


compte_a_rebours();
