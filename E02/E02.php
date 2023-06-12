<title>E02</title>
<?php
    $deger1 = 10;
    $deger2 = 50;
    echo $deger1 . " SAYISI İLE " . $deger2 . " SAYISI ARASINDAKİ ÇİFT SAYILAR: <br/>";
    for ($i = $deger1; $i <= $deger2; $i++) {
        if ($i % 2 == 0) {
            echo $i . "<br/>";
        }
    }
?>