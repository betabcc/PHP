<title>E03</title>
<?php
    $isimler = array("AHMET", "ALİ", "AYŞE", "GİRAY", "BELGİN", "MERT");
    $kisiler[] = "KADİR";
    $kisiler[] = "ÖMER";
    $kisiler[] = "İSMAİL";
    $kisiler[] = "MİRAY";
    $dizi = array_merge($isimler, $kisiler);
    array_shift($dizi);
    echo "<h2>İSİM LİSTESİ</h2>";
    foreach ($dizi as $isim) {
        echo $isim . "<br />";
    }
    $sonuc = in_array("AHMET", $dizi);
    echo "<br/>AHMET DİZİDE ";
    if ($sonuc) {
        echo "VAR";
    } else {
        echo "YOK";
    }
?>