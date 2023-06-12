<title>E45</title>
<?php
    $sunucu = "localhost";
    $ka = "root";
    $sifre = "";
    $vt = "vt";
    $tablo = "kayit";
    $bn = new mysqli($sunucu, $ka, $sifre, $vt);
    if($bn->connect_error) {
        die("HATA OLUŞTU: " . $bn->connect_error);
    }
    $bn->set_charset("utf8");
    $komut = $bn->query("SELECT * FROM $tablo");
    $tablo = "<table border='1' cellspacing='0'>";
    $alanlar = $komut->fetch_fields();
    $tablo .= "<tr>";
    foreach($alanlar as $alan) {
        $tablo .= "<th>" . $alan->name . "</th>";
    }
    $tablo .= "</tr>";
    if($komut->num_rows > 0) {
        while($kayit = $komut->fetch_row()) {
            $tablo .= "<tr>";
            foreach($kayit as $deger) {
                $tablo .= "<td>$deger</td>";
            }
            $tablo .= "</tr>";
        }
    }
    $tablo .= "</table>";
    echo $tablo;
    $bn->close();   
?>