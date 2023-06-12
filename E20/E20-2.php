<title>E20-2</title>
<?php
    if(empty($_POST["gonder"])) {
        header("refresh:0;url=E20.php");
    } else {
        if(isset($_POST["ka"])) {
            $ka = $_POST["ka"];
        } else {
            $ka = "";
        }
        if(isset($_POST["sifre"])) {
            $sifre = $_POST["sifre"];
        } else {
            $sifre = "";
        }
        if($ka == "admin" && $sifre == "123") {
            setcookie("cerez", "oturumacik", time()+60);
            header("refresh:0;url=E20-3.php");
        } else {
            echo "KULLANICI ADI VEYA ŞİFRE YANLIŞ!<br/>";
            echo "BU YÜZDEN OTURUM AÇILAMADI.<br/>";
            echo "<a href='E20.php'><button>OTURUM AÇMA SAYFASINA DÖN</button></a>";
        }
    }
?>