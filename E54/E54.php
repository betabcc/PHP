<title>E54</title>
<?php
    session_start();
    include "E54-2.php";

    if(isset($_SESSION["oturum"])) {
        if(isset($_GET["kapat"])) {
            session_destroy();
            echo "OTURUM KAPANDI!";
            header("Refresh:2; url=E54.php");
        } else {
            echo "<h2>KAYIT LİSTESİ</h2>";
            $islem = new vtislemler();
            $tablo = $islem->listele();
            echo $tablo;
            echo "<a href='E54.php?kapat=1'><input type='button' value='OTURUMU KAPAT'/></a>";
        }
    } else {
        if(isset($_POST["gonder"])) {
            $ka = "";
            if(!empty($_POST["ka"])) {
                $ka = $_POST["ka"];
            }
            $sifre = "";
            if(!empty($_POST["sifre"])) {
                $sifre = $_POST["sifre"];
            }
            $oturum = new Oturum($ka, $sifre);
            if($oturum->kontrol()) {
                $_SESSION["oturum"] = "açık";
                echo "OTURUM AÇILDI!";
                header("Refresh: 2; url=E54.php");
            } else {
                echo "KULLANICI ADI VE ŞİFRE YANLIŞ!";
                echo "<br/>OTURUM AÇILMADI!";
                header("Refresh: 2; url=E54.php");
            }
        } else {
            echo "<form action='E54.php' method='post'>";
            echo "KULLANICI ADI: <input type='text' name='ka'/><br/>";
            echo "ŞİFRE: <input type='password' name='sifre'/><br/>";
            echo "<input type='submit' value='OTURUM AÇ' name='gonder'/></form>";
            echo "KULLANICI ADI: admin <br/> ŞİFRE: 123";
        }
    }
?>