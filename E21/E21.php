<title>E21</title>
<?php
    if(isset($_COOKIE["oturum"])) {
        if($_COOKIE["oturum"] == "açık") {
            if(isset($_GET["kapat"])) {
                setcookie("oturum", "açık", time()-3600);
                header("refresh:2;url=E21.php");
                die("OTURUM KAPANDI!");
            }
            setcookie("oturum", "açık", time()+60);
            ?>
            OTURUM AÇILDI!
            <div style="position:absolute; right:2px; top:2px;">
                <a href="E21.php?kapat=1">
                    <button>OTURUMU KAPAT</button>
                </a>
            </div>
            <br/>HOŞGELDİNİZ<br/><br/><br/>
            İÇERİK
            <?php
        }
    } else {
        if(isset($_POST["ka"]) && isset($_POST["sifre"])) {
            $ka = $_POST["ka"];
            $sifre = $_POST["sifre"];
            if($ka == "admin" && $sifre == "123") {
                setcookie("oturum", "açık", time()+60);
                header("refresh:0;url=E21.php");
            } else {
                echo "KULLANICI ADI VEYA ŞİFRE YANLIŞ!<br/>";
                echo "<a href='E21.php'><button>OTURUM AÇMA SAYFASINA DÖN</button></a>";
            }
        } else {
            ?>
            <form action="E21.php" method="post">
                KULLANICI ADI: <input type="text" name="ka"/><br/>
                ŞİFRE: <input type="password" name="sifre"/> <br/>
                <input type="submit" value="OTURUM AÇ"/> <br/> <br/>
                KULLANICI ADI: admin <br/>
                ŞİFRE: 123
            </form>
            <?php
        }
    }
?>