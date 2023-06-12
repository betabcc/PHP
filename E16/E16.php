<title>E16</title>
<?php
    $a = 5;
    $b = 10;
    if(isset($a) && isset($b)) {
        echo "İKİ DEĞİŞKEN DE TANIMLI<br/>";
        echo "TOPLAM: " . ($a + $b);
    } else {
        echo "DEĞİŞKENLERİN HEPSİ TANIMLI DEĞİL";
    }
?>