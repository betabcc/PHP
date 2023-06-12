<title>E31</title>
<form action="E31.php" method="post">
    <input type="submit" name="olustur" value="DOSYA OLUŞTUR" /><br/>
    <input type="submit" name="sil" value="DOSYA SİL" /><br/>
</form>
<?php
    if(isset($_POST["olustur"])) {
        touch("E31.txt");
        echo "<br/>DOSYA OLUŞTU!";
        $dosya = fopen("E31.txt", "w");
        $yaz = "MERHABA";
        fwrite($dosya, $yaz);
        fclose($dosya);
    }
    if(isset($_POST["sil"])) {
        if(file_exists("E31.txt")) {
            unlink("E31.txt");
            echo "<br/>DOSYA SİLİNDİ!";
        }
    }
?>