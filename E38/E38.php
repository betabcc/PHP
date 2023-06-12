<title>E38</title>
<?php
    $bag = mysqli_connect("localhost", "root", "", "vt");
    if(!$bag) {
        die("HATA OLUŞTU: " . mysqli_connect_error());
    }
    mysqli_set_charset($bag, "utf8");
    $sorgu = mysqli_query($bag, "SELECT * FROM kayit");
    echo "KAYIT SAYISI: " . mysqli_num_rows($sorgu) . "<br/>";
    echo "ALAN ADEDİ: " . mysqli_num_fields($sorgu) . "<br/>";
    $tablo = "<table border='1'><tr><th>NUMARA</th><th>AD</th>";
    $tablo .= "<th>ADRES</th><th>BÖLÜM</th></tr>";
    if(mysqli_num_rows($sorgu) > 0) {
        while($satir = mysqli_fetch_assoc($sorgu)) {
            $tablo .= "<tr><td>".$satir["NUMARA"]."</td><td>".$satir["AD"]."</td>";
            $tablo .= "<td>".$satir["ADRES"]."</td><td>".$satir["BÖLÜM"]."</td></tr>";        
        }
    }
    $tablo .= "</table>";
    echo $tablo;
    mysqli_close($bag);
?>