<title>E08</title>
<?php
    echo "07/04/2023 <br/>";
    echo "1 YIL, 3 AY, 10 GÜN SONRA: ";
    $t = mktime(0, 0, 0, 4, 7, 2023);
    $t1 = $t;
    $t += 1 * 24 * 60 * 60;
    $t += 3 * 30 * 24 * 60 * 60;
    $t += 365.25 * 24 * 60 * 60;
    echo date("j/m/Y", $t);
    echo "<br/>";
    echo date("j/m/Y", mktime(0, 0, 0, date("m", $t1) + 3, date("j", $t1) + 10, date("Y", $t1) + 1));
?>