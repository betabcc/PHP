<title>E43</title>
<?php
    $bag = new mysqli("localhost", "root", "", "vt");
    if($bag->connect_error) {
        die("HATA OLUŞTU: " . $bag->connect_error);
    }
    $bag->set_charset("utf8");
    $sorgu = $bag->query("SELECT * FROM kayit");
    $tablo = "<table border='1'><tr><th>NUMARA</th><th>AD</th>";
    $tablo .= "<th>ADRES</th><th>BÖLÜM</th></tr>";
    if($sorgu->num_rows > 0) {
        while($satir = $sorgu->fetch_assoc()) {
            $tablo .= "<tr><td>" . $satir["NUMARA"] . "</td><td>" . $satir["AD"] . "</td>";
            $tablo .= "<td>" . $satir["ADRES"] . "</td><td>" . $satir["BÖLÜM"] . "</td></tr>";
        }
    }
    $tablo .= "</table>";
    echo $tablo;
    $bag->close();
?>