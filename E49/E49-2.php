<title>E49-2</title>
<?php
    $sunucu = "localhost";
    $vt = "vt";
    $tablo = "kayit";
    $ka = "root";
    $sifre = "";

    function baglan() {
        global $sunucu, $vt, $ka, $sifre;
        $bn = new PDO("mysql:host=$sunucu; dbname=$vt; charset=utf8", $ka, $sifre);  
        return $bn;
    }

    function arama($bn, $tablo, $bolum) {
        if (empty($bolum)) {
            $komut = $bn->prepare("SELECT * FROM $tablo");
        } else {
            $komut = $bn->prepare("SELECT * FROM $tablo WHERE BÖLÜM LIKE :p1");
            $komut->bindParam(":p1", $bolum);
        }

        $komut->execute();

        $tablo = "<table border='1' cellspacing='0'>";
        for ($i = 0; $i < $komut->columnCount(); $i++) {
            $alan = $komut->getColumnMeta($i);
            $tablo .= "<th>".$alan["name"]."</th>";
        }
        $tablo .= "</tr>";

        if ($komut->rowCount() > 0) {
            while ($kayit = $komut->fetch(PDO::FETCH_ASSOC)) {
                $tablo .= "<tr>";
                foreach ($kayit as $deger) {
                    $tablo .= "<td>$deger</td>";
                }
                $tablo .= "</tr>";
            }
        }

        $tablo .= "</table>";
        return $tablo;
    }
?>