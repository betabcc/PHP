<?php
$bag = mysqli_connect("localhost", "root", "", "vt");
if (!$bag) die("HATA OLUŞTU: " . mysqli_connect_error());
mysqli_set_charset($bag, "utf8");
$sorgu = mysqli_query($bag, "SELECT * FROM kayit4");
$tablo = "<table border='1'>";
$tablo .= "<tr style='background-color:blue;color:white'>";
$tablo .= "<th>NUMARA</th><th>AD</th><th>ARASINAV</th><th>FİNAL</th><th>ORTALAMA</th><th>BAŞARI DURUMU</th>";
$tablo .= "</tr>";
$aratop = 0;
$araadet = 0;
$fintop = 0;
$finadet = 0;
if (mysqli_num_rows($sorgu) > 0) {
    while ($satir = mysqli_fetch_assoc($sorgu)) {
        $tablo .= "<tr";
        
        $arasinav = (int) $satir["ARASINAV"];
        $final = (int) $satir["FİNAL"];
        $ortalama = round(($arasinav * 0.3) + ($final * 0.7), 2);
        
        if ($ortalama > 60) {
            $tablo .= "><td>" . $satir["NUMARA"] . "</td><td>" . $satir["AD"] . "</td>";
            $tablo .= "<td>" . $satir["ARASINAV"] . "</td><td>" . $satir["FİNAL"] . "</td>";
            $tablo .= "<td>" . $ortalama . "</td><td>BAŞARILI</td>";
        } else {
            $tablo .= " style='background-color:red;color:white'><td>" . $satir["NUMARA"] . "</td><td>" . $satir["AD"] . "</td>";
            $tablo .= "<td>" . $satir["ARASINAV"] . "</td><td>" . $satir["FİNAL"] . "</td>";
            $tablo .= "<td>" . $ortalama . "</td><td>BAŞARISIZ</td>";
        }
        $tablo .= "</tr>";
        
        $aratop += $arasinav;
        $araadet++;
        $fintop += $final;
        $finadet++;
    }
    $ortara = $araadet == 0 ? 0 : $aratop / $araadet;
    $ortfinal = $finadet == 0 ? 0 : $fintop / $finadet;
    $ortalama = round(($ortara * 0.3) + ($ortfinal * 0.7), 2);
}
$tablo .= "</table>";
echo $tablo;
mysqli_close($bag);
?>