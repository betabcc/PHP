<title>E55-2</title>
<?php
$adres = $_POST["adr"];
$server = "localhost";
$user = "root";
$sifre = "";
$db = "vt";
try {
    $bag = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $sifre);
    if ($adres == '') {
        $komut = $bag->prepare("SELECT * FROM kayit");
    } else {
        $komut = $bag->prepare("SELECT * FROM kayit WHERE adres = :adr");
        $komut->bindParam(":adr", $adres);
    }
    $komut->execute();
    $kayitlar = $komut->fetchAll();

    if (count($kayitlar) > 0) {
        echo "<table border='1'><tr><th>NUMARA</th><th>AD</th><th>ADRES</th><th>MAAŞ</th></tr>";
        foreach ($kayitlar as $kayit) {
            echo "<tr><td>".$kayit["NUMARA"]."</td><td>".$kayit["AD"]."</td><td>".$kayit["ADRES"]."</td><td>".$kayit["MAAŞ"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "KAYIT BULUNAMADI!";
    }
} catch (PDOException $hata) {
    echo "HATA: ".$hata->getMessage();
}
?>