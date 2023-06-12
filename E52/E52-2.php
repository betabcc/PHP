<?php
$sunucu = "localhost";
$vt = "vt";
$ka = "root";
$sifre = "";

function baglan()
{
    global $sunucu, $vt, $ka, $sifre;
    $bag = new PDO("mysql:host=$sunucu;dbname=$vt;charset=utf8", $ka, $sifre);
    return $bag;
}

function kayitlistele($b, $tablo)
{
    $komut = $b->prepare("SELECT * FROM $tablo");
    $komut->execute();
    
    $tablo = "<table border='1' cellspacing='0'>\n";
    $tablo .= "<tr><th>NUMARA</th><th>AD</th><th>ADRES</th><th>MAAŞ</th></tr>\n";
    
    if ($komut->rowCount() > 0) {
        while ($kayit = $komut->fetch(PDO::FETCH_ASSOC)) {
            $tablo .= "<tr>";
            foreach ($kayit as $deger) {
                $tablo .= "<td>$deger</td>";
            }
            $tablo .= "</tr>\n";
        }
    }
    
    $tablo .= "</table>";
    echo $tablo;
}

function kayitekle($b, $tablo, $kayit)
{
    $komut = $b->prepare("INSERT INTO $tablo VALUES(:num,:ad,:adr,:maas)");
    $komut->bindParam(":num", $kayit[0]);
    $komut->bindParam(":ad", $kayit[1]);
    $komut->bindParam(":adr", $kayit[2]);
    $komut->bindParam(":maas", $kayit[3]);
    $komut->execute();
}

function kayitguncelle($b, $tablo, $kayit)
{
    $komut = $b->prepare("UPDATE $tablo SET NUMARA=:num, AD=:ad, ADRES=:adr, MAAŞ=:maas WHERE NUMARA=:gn");
    $komut->bindParam(":num", $kayit[0]);
    $komut->bindParam(":ad", $kayit[1]);
    $komut->bindParam(":adr", $kayit[2]);
    $komut->bindParam(":maas", $kayit[3]);
    $komut->bindParam(":gn", $kayit[4]);
    $komut->execute();
}

function kayitara($b, $tablo, $numara)
{
    $komut = $b->prepare("SELECT * FROM $tablo WHERE NUMARA = :num");
    $komut->bindParam(":num", $numara);
    $komut->execute();
    
    $tablo = "<table border='1' cellspacing='0'>\n";
    $tablo .= "<tr><th>NUMARA</th><th>AD</th><th>ADRES</th><th>MAAŞ</th></tr>\n";
    
    if ($komut->rowCount() > 0) {
        while ($kayit = $komut->fetch(PDO::FETCH_ASSOC)) {
            $tablo .= "<tr>";
            foreach ($kayit as $deger) {
                $tablo .= "<td>$deger</td>";
            }
            $tablo .= "</tr>\n";
        }
    }
    
    $tablo .= "</table>";
    echo $tablo;
}

function kayitsil($b, $tablo, $numara)
{
    $komut = $b->prepare("DELETE FROM $tablo WHERE NUMARA=:num");
    $komut->bindParam(":num", $numara);
    $komut->execute();
}
?>