<title>E39</title>
<?php
    function asalsayilar($a, $b)
    {
        if($a > $b) {
            $k = $a;
            $a = $b;
            $b = $k;
        }
        for($i = $a; $i <= $b; $i++) {
            $asal = 1;
            for($j = 2; $j <= $i/2; $j++) {
                if($i % $j == 0) {
                    $asal = 0;
                    break;
                }
            }
            if($asal == 1) {
                echo $i . "-";
            }
        }
    }
?>
<form action="E39.php" method="get">
    1.SAYI: <input type="text" name="s1" required/><br/>
    2.SAYI: <input type="text" name="s2" required/><br/>
    <input type="submit" name="gonder" value="ASAL SAYILARI GÖSTER"/>
</form>
<?php
    if(isset($_GET["gonder"])) {
        $s1 = $_GET["s1"];
        $s2 = $_GET["s2"];
        asalsayilar($s1, $s2);
    }
?>