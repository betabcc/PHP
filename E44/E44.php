<title>E44</title>
<?php
    try {
        $bag = new PDO("mysql:host=localhost;dbname=vt;charset=utf8", "root", "");
        $sorgu = $bag->prepare("SELECT * FROM kayit");
        $sorgu->execute();
        $tablo = "<table border='1'><tr><th>NUMARA</th><th>AD</th>";
        $tablo .= "<th>ADRES</th><th>MAAŞ</th></tr>";
        if($sorgu->rowCount()) {
            while($satir = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                $tablo .= "<tr><td>" . $satir["NUMARA"] . "</td><td>" . $satir["AD"] . "</td>";
                $tablo .= "<td>" . $satir["ADRES"] . "</td><td>" . $satir["MAAŞ"] . "</td></tr>";
            }
            $tablo .= "</table>";
            echo $tablo;
        } else {
            echo "KAYIT YOK!";
        }
    } catch(PDOException $hata) {
        echo "HATA OLUŞTU: " . $hata->getMessage();
    }
    $bag = null;
?>