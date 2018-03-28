<! DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <title>Créer un compte à rebours</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta http-equiv="Content-Language" content="fr" />
</head>
<body>
<script language="JavaScript">
    function t()
    {
        var compteur=document.getElementById('compteur');
        s=duree;
        m=0;h=0;
        if(s<0)
        {
            compteur.innerHTML="terminé<br />"+"<a href=http://lien1.fr>continuer</a>"
        }
        else
        {
            if(s>59)
            {
                m=Math.floor(s/60);
                s=s-m*60
            }
            if(m>59)
            {
                h=Math.floor(m/60);
                m=m-h*60
            }
            if(s<10)
            {
                s="0"+s
            }if(
            m<10)
        {
            m="0"+m
        }
            compteur.innerHTML=h+":"+m+":"+s+"<br /><a href=http://lien2.fr>interrompre</a>"
        }
        duree=duree-1;
        window.setTimeout("t();", 1000);
    }
</script>
<div id="compteur"></div>
<script language="JavaScript">
    duree="90";
    t();
</script>
</body>
</html>