<title>E25</title>
<?php
    if(isset($_COOKIE["oturum"])) {
        if(isset($_GET["kapat"])) {
            setcookie("oturum", "", time()-60);
            header("refresh:2; url=E25.php");
            die("OTURUM KAPANDI!");
        }
        header("refresh:0; url=E25-3.php");
    }
?>
<form action="E25-2.php" method="post">
    KULLANICI ADI: <input type="text" name="ka" /> <br/>
    ŞİFRE: <input type="password" name="sifre" /> <br/>
    <input type="submit" name="gonder" value="OTURUM AÇ" /> <br/> <br/>
    KULLANICI ADI: admin <br/>
    ŞİFRE: 123
</form>