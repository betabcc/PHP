<title>E13</title>
<?php
    date_default_timezone_set("Europe/Istanbul");
    $ts = getdate();
    echo "SAAT: " . $ts["hours"] . ":" . $ts["minutes"] . ":" . $ts["seconds"];
    echo "<br/>";
    echo "TARİH: " . $ts["mday"] . "/" . $ts["mon"] . "/" . $ts["year"] . "<br/>";
    echo "1/1/1970 TARİHİNDEN BERİ GEÇEN SANİYE: " . time();
?>