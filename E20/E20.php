<title>E20</title>
<?php
    if(isset($_COOKIE["cerez"])) {
        if($_COOKIE["cerez"] == "oturumacik") {
            header("refresh:0;url=E20-3.php");
        }
    } else {
        ?>
        <form action="E20-2.php" method="post">
            KULLANICI ADI: <input type="text" name="ka" /> <br/>
            ŞİFRE: <input type="password" name="sifre" /> <br/>
            <input type="submit" value="OTURUM AÇ" name="gonder" /> <br/><br/>
            KULLANICI ADI: admin <br/>
            ŞİFRE: 123
        </form>
        <?php
    }
?>