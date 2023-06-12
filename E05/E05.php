<title>E05</title>       
<form action="E05.php" method="get">
    İLK SAYI: <input type="text" name="s1"/> <br/>
    SON SAYI: <input type="text" name="s2"/> <br/>
    <input type="radio" name="secim" value="TEK"/>TEK SAYILAR <br/>
    <input type="radio" name="secim" value="ÇİFT"/>ÇİFT SAYILAR <br/>
    <input type="submit" name="gonder" value="GÖNDER"/>
</form>
<?php
    if (isset($_GET["gonder"])) {
        $deger1 = $_GET["s1"];
        $deger2 = $_GET["s2"];
        $secenek = $_GET["secim"];
        echo $deger1 . " SAYISI İLE " . $deger2 . " SAYISININ ARASINDAKİ " . $secenek . " SAYILAR: <br/>";
        if ($secenek == "TEK") {
            $bolum = 1;
        } else {
            $bolum = 0;
        }
        for ($i = $deger1; $i <= $deger2; $i++) {
            if ($i % 2 == $bolum) {
                echo $i . "<br/>\n";
            }
        }
    }
?>