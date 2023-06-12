<title>E07</title>
<h2>NOT LİSTESİ</h2>
<?php
    $numara[] = 10;
    $numara[] = 11;
    $numara[] = 12;
    $numara[] = 13;
    $numara[] = 14;
    $numara[] = 15;
    $isim[0] = "AHMET";
    $isim[1] = "AYŞE";
    $isim[2] = "MERT";
    $isim[3] = "HİLAL";
    $isim[4] = "OSMAN";
    $isim[5] = "KADİR";
    $a = array(50, 70, 80, 60, 90, 40);
    $f = array(70, 40, 100, 90, 90, 30);
    echo "<table border='1' cellspacing='0'>\n";
    echo "<tr>
    <th>NUMARA</th><th>AD</th><th>ARASINAV</th>
    <th>FİNAL</th><th>ORTALAMA</th><th>DURUM</th>
    </tr>\n";
    for ($i = 0; $i < count($numara); $i++) {
        echo "<tr>\n";
        echo "<td>" . $numara[$i] . "</td>";
        echo "<td>" . $isim[$i] . "</td>";
        echo "<td>" . $a[$i] . "</td>";
        echo "<td>" . $f[$i] . "</td>";
        $ort = $a[$i] * 0.3 + $f[$i] * 0.7;
        echo "<td>" . $ort . "</td>";
        if ($ort >= 60) {
            echo "<td>BAŞARILI</td>";
        } else {
            echo "<td>BAŞARISIZ</td>\n";
        }
        echo "</tr>";
    }
    echo "</table>\n";
?>