<title>E10-2</title>
<?php
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
    echo "<h2>HOŞGELDİNİZ &nbsp" . $ad . "</h2>";
    echo "GÖNDERDİĞİNİZ VERİLER: <br/>";
    echo "NUMARA: " . $numara . "<br/>";
    echo "AD: " . $ad . "<br/>";
    echo "ADRES: " . $adres . "<br/>";
?>