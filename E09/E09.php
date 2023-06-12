<title>E09</title>
<?php
    echo time();
    echo "<br/>";
    echo date("j/m/Y H:i", time());
    echo "<br/><br/>3 YIL 5 AY 12 GÜN SONRAKİ TARİH: ";
    $t = mktime(0, 0, 0, date("m") + 5, date("j") + 12, date("Y") + 3);
    echo date("j/m/Y", $t);
?>