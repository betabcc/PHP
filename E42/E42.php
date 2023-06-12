<title>E42</title>
<?php
    $sunucu = "localhost";
    $vt = "vt";
    $ka = "root";
    $sifre = "";
    $tablo = "kayit";
    $bd = mysqli_connect($sunucu, $ka, $sifre, $vt);
    if(!$bd) {
        die("BAĞLANTI HATASI: " . mysqli_connect_error());
    }
    mysqli_set_charset($bd, "utf8");
    $komut = mysqli_query($bd, "SELECT * FROM $tablo");
    echo "KAYIT SAYISI: " . mysqli_num_rows($komut) . "<br/>";
    echo "ALAN SAYISI: " . mysqli_num_fields($komut) . "<br/>";
    $alanlar = mysqli_fetch_fields($komut);
    $tablo = "<table border='1' cellspacing='0'><tr>";
    for($i = 0; $i < count($alanlar); $i++) {
        $tablo .= "<th>" . $alanlar[$i]->name . "</th>";
    }
    $tablo .= "</tr>";
    if(mysqli_num_rows($komut) > 0) {
        while($satir = mysqli_fetch_row($komut)) {
            $tablo .= "<tr>";
            for($i = 0; $i < count($satir); $i++) {
                $tablo .= "<td>" . $satir[$i] . "</td>";
            }
            $tablo .= "</tr>";
        }
    }
    $tablo .= "</table>";
    echo $tablo;
    mysqli_close($bd);
?>