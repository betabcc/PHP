<title>E17</title>
<?php
    $cumle = "BUGÜN HAVA BİRAZ SOĞUK";
    $kelimeler = explode(" ", $cumle);
    echo "CÜMLE: " . $cumle . "<br/>";
    echo "KELİMELER: <br/>";
    foreach($kelimeler as $kelime) {
        echo $kelime . "<br/>";
    }
?>