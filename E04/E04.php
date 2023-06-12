<title>E04</title>
<h2>NOT LİSTESİ</h2>
<?php
    $basliklar = array("NUMARA", "ARASINAV", "FİNAL", "ORTALAMA");
    $notlar = array(
        array(1, 60, 70),
        array(2, 90, 70),
        array(3, 60, 30),
        array(4, 40, 70),
        array(5, 90, 100),
        array(6, 20, 30)
    );
    echo "<table border='1'><tr>";
    for ($i = 0; $i < count($basliklar); $i++) {
        echo "<th>" . $basliklar[$i] . "</th>";
    }
    echo "</tr>";
    for ($i = 0; $i < 6; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 3; $j++) {
            echo "<td>" . $notlar[$i][$j] . "</td>";
        }
        echo "<td>" . ($notlar[$i][1] * 0.3 + $notlar[$i][2] * 0.7) . "</td></tr>";
    }
    echo "</table>";
?>