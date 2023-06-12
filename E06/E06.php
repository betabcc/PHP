<title>E06</title>
<form action="E06.php" method="get">
    1.SAYI: <input type="text" name="s1" /> <br/>
    2.SAYI: <input type="text" name="s2" /> <br/>
    <input type="submit" name="gonder" value="GÖNDER"/>
</form>
<?php
    if (isset($_GET['gonder'])) {
        $s1 = 0;
        if (!empty($_GET["s1"])) {
            $s1 = $_GET["s1"];
        }
        $s2 = 0;
        if (!empty($_GET["s2"])) {
            $s2 = $_GET["s2"];
        }
        if ($s1 > $s2) {
            $k = $s1;
            $s1 = $s2;
            $s2 = $k;
        }
        echo "$s1 İLE $s2 ARASINDAKİ ÇİFT SAYILAR:<br/>";
        for ($i = $s1; $i <= $s2; $i++) {
            if ($i % 2 == 0) {
                echo $i . "<br/>";
            }
        }
    }
?>