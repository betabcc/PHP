<title>E14-2</title>
<?php
    if(isset($_GET["gonder"])) {
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