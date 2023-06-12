<title>E20-3</title>
<?php
    if(isset($_GET["kapat"])) {
        setcookie("cerez", "oturumacik", time()-3600);
        header("refresh:2;url=E20.php");
        die("OTURUM KAPANDI!");
    }
    if(isset($_COOKIE["cerez"])) {
        if($_COOKIE["cerez"] == "oturumacik") {
            setcookie("cerez", "oturumacik", time()+60);
            ?>
            <h2>HOŞGELDİNİZ</h2>
            OTURUM AÇILDI!
            <br/>
            <a href="E20-3.php?kapat=1"><button>OTURUMU KAPAT</button></a>
            <br/><br/><br/><br/>
            <br/>İÇERİK
            <?php
        }
    } else {
        header("refresh:0;url=E20.php");
    }
?>