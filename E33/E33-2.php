<title>E33-2</title>
<?php
    $dosya = fopen("E33.txt", "r") or die("DOSYA AÇILAMADI!");
    flock($dosya, LOCK_EX);
    $tablo = "<table border='1'><tr><th>NUMARA</th><th>AD</th><th>ADRES</th>";
    $tablo .= "<th>TELEFON</th></tr>";
    while(!feof($dosya)) {
        if(!($numara = fgets($dosya))) break;
        $ad = fgets($dosya);
        $adres = fgets($dosya);
        $tel = fgets($dosya);
        $tablo .= "<tr><td>".$numara."</td><td>".$ad."</td><td>".$adres."</td>";
        $tablo .= "<td>".$tel."</td></tr>";
    }
    flock($dosya, LOCK_UN);
    fclose($dosya);
    $tablo .= "</table>";
    echo $tablo;
?>