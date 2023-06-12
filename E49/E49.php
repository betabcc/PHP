<title>E49</title>
<form action="E49.php" method="post">
    ARADIĞINIZ BÖLÜM: <input type="text" name="bolum" />
    <input type="submit" name="gonder" value="KAYIT ARA" /> <br/>
    YAZMADAN ARA DEYİNCE TABLO ÇIKIYOR
</form>

<?php
    include("E49-2.php");
    try {
        $bn = baglan();
        if (isset($_POST["gonder"])) {
            $bolum = $_POST["bolum"];
        } else {
            $bolum = "";
        }
        echo arama($bn, "kayit", $bolum);
    } catch(PDOException $hata) {
        echo "HATA OLUŞTU: " . $hata->getMessage();
    }
    $bn = null;
?>