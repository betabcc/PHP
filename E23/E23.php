<title>E23</title>
<form action="E23.php" method="post">
    SAYI: <input type="text" name="sayi" required /> <br/>
    ÜS: <input type="text" name="us" required /> <br/>
    <input type="submit" name="gonder" value="KUVVET HESAPLA" /> <br/>
</form>
<?php
    if(isset($_POST["gonder"])) {
        $sayi = $_POST["sayi"];
        $us = $_POST["us"];
        $kuvvet = pow($sayi, $us);
        echo "KUVVET: $kuvvet";
    }
?>