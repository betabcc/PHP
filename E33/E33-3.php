<title>E33-3</title>
<form action="E33.php" method="get">
    NUMARA: <input type="text" name="num"/> <br/>
    AD: <input type="text" name="ad"/> <br/>
    ADRES: <input type="text" name="adr"/> <br/>
    TELEFON: <input type="text" name="tel"/> <br/>
    <input type="submit" value="KAYDET" name="gonder"/>
</form>

<?php
    if(isset($_GET["gonder"])) {
        if(isset($_GET["num"])) {
            $numara = $_GET["num"];
        } else {
            $numara = "";
        }
        if(isset($_GET["ad"])) {
            $ad = $_GET["ad"];
        } else {
            $ad = "";
        }
        if(isset($_GET["adr"])) {
            $adres = $_GET["adr"];
        } else {
            $adres = "";
        }
        if(isset($_GET["tel"])) {
            $tel = $_GET["tel"];
        } else {
            $tel = "";
        }
        $dosya = fopen("E33.txt", "a") or die("DOSYA AÇILAMADI, KAYIT İŞLEMİ GERÇEKLEŞMEDİ!");
        flock($dosya, LOCK_EX);
        fwrite($dosya, $numara . "\n" . $ad . "\n" . $adres . "\n" . $tel . "\n");
        flock($dosya, LOCK_UN);
        fclose($dosya);
        echo "KAYIT EKLENDİ!";
    }
?>