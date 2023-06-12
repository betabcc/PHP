<title>E26</title>
<?php session_start(); ?>
<?php
    if(isset($_SESSION["oturum"])) {
        if($_SESSION["oturum"] == "açık") {
            if(isset($_GET["kapat"])) {
                session_destroy();
                header("refresh:2; url=E26.php");
                die("OTURUM KAPANDI!");
            }
            ?>
            OTURUM AÇILDI!
            <div style="position:absolute; right:2px; top:2px;">
                <a href="E26.php?kapat=1"><button>OTURUMU KAPAT</button></a>
            </div>
            <br/>HOŞGELDİNİZ<br/><br/><br/>
            İÇERİK
            <?php
        }
    }
    else {
        if(isset($_POST["ka"]) && isset($_POST["sifre"])) {
            $ka = $_POST["ka"];
            $sifre = $_POST["sifre"];
            if($ka == "admin" && $sifre == "123") {
                $_SESSION["oturum"] = "açık";
                header("refresh:0; url=E26.php");
            }
            else {
                echo "KULLANICI ADI VEYA ŞİFRE YANLIŞ!<br/>";
                echo "<a href='E26.php'><button>OTURUM AÇMA SAYFASINA DÖN</button></a>";
            }
        }
        else {
            ?>
            <form action="E26.php" method="post">
                KULLANICI ADI: <input type="text" name="ka"/><br/>
                ŞİFRE: <input type="text" name="sifre"/><br/>
                <input type="submit" value="OTURUM AÇ"/><br/><br/>
                KULLANICI ADI: admin<br/>
                ŞİFRE: 123
            </form>
            <?php
        }
    }
?>