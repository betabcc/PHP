<title>E28</title>
<form action="E28.php" method="get">
    <input type="submit" value="DOSYA OLUŞTUR" name="olustur"/>
</form>
<form action="E28.php" method="get">
    <input type="submit" value="DOSYAYI SİL" name="sil"/>
</form>

<?php
if(isset($_GET["olustur"])) {
    touch("E28.txt");
    echo "DOSYA OLUŞTU!";
    $dosya = fopen("E28.txt", "w");
    $yaz = "MERHABA";
    fwrite($dosya, $yaz);
    fclose($dosya);
} else if(isset($_GET["sil"])) {
    if(file_exists("E28.txt")) {
        unlink("E28.txt");
        echo "DOSYA SİLİNDİ!";
    }
}
?>