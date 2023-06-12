<title>E15</title>
<?php
    if(!isset($_GET["gonder"])) {
        ?>
        <form action="E15.php" method="get">
            NUMARA: <input type="text" name="num" required /> <br/>
            AD: <input type="text" name="ad" required /> <br/>
            ADRES: <input type="text" name="adr" /> <br/>
            <input type="submit" name="gonder" value="GÖNDER"/>
        </form>
        <?php
    } else {
        $numara = $_GET["num"];
        $ad = $_GET["ad"];
        $adres = "";
        if(!empty($_GET["adr"])) {
            $adres = $_GET["adr"];
        }
        echo "<h2>HOŞGELDİNİZ $ad</h2>";
        echo "GÖNDERDİĞİNİZ VERİLERİ ALDIK: <br/>";
        echo "NUMARANIZ: $numara <br/>";
        echo "ADINIZ: $ad <br/>";
        echo "ADRESİNİZ: $adres <br/>";
    }
?>