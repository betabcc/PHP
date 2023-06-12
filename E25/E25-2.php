<title>E25-2</title>
<?php
    if(isset($_POST["gonder"])) {
        $ka = $_POST["ka"];
        $sifre = $_POST["sifre"];
        if($ka == "admin" && $sifre == 123) {
            setcookie("oturum", "açık", time()+60);
            echo "OTURUM AÇILDI!";
            header("refresh:2; url=E25-2.php");
        }
        else {
            echo "KULLANICI ADI VEYA ŞİFRE YANLIŞ!";
            header("refresh:2; url=E25.php");
        }
    }
    else {
        header("refresh:0; url=E25.php");
    }
?>