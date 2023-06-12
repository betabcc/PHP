<title>E11</title>
<?php
    if (empty($_GET["num"]) && empty($_GET["ad"]) && empty($_GET["adr"])) {
        ?>
        <form action="E11.php" method="get">
        NUMARA: <input type="text" name="num" /> <br/>
        AD: <input type="text" name="ad" /> <br/>
        ADRES: <input type="text" name="adr" /> <br/>
        <input type="submit" value="GÖNDER" name="gonderen" /> <br/>
        </form>
        <?php
    } else {
        if (isset($_GET["num"])) {
            $numara = $_GET["num"];
        } else {
            $numara = "";
        }
        if (isset($_GET["ad"])) {
            $ad = $_GET["ad"];
        } else {
            $ad = "";
        }
        if (isset($_GET["adr"])) {
            $adres = $_GET["adr"];
        } else {
            $adres = "";
        }
        echo "<h2>HOŞGELDİNİZ &nbsp" . $ad . "</h2>";
        echo "GÖNDERDİĞİNİZ VERİLER: <br/>";
        echo "NUMARA: " . $numara . "<br/>";
        echo "AD: " . $ad . "<br/>";
        echo "ADRES: " . $adres;
    }
?>