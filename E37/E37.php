<title>E37</title>
<?php
    function asalsayi($a, $b)
    {
        $sonuc = "";
        for($i = $a; $i <= $b; $i++)
        {
            $asal = 1;
            for($j = 2; $j < $i; $j++)
            {
                if($i % $j == 0)
                {
                    $asal = 0;
                    break;
                }
            }
            if($asal == 1)
            {
                $sonuc .= $i . " - ";
            }
        }
        $sonuc = substr($sonuc, 0, strlen($sonuc) - 3);
        echo $sonuc;
    }
?>
<form action="E37.php" method="post">
    1.SAYI: <input type="text" name="s1" /><br/>
    2.SAYI: <input type="text" name="s2" /><br/>
    <input type="submit" value="ARADAKİ ASAL SAYILARI GÖSTER" name="gonder" />
</form>
<br/><br/>
<?php
    if(isset($_POST["gonder"]))
    {
        $s1 = 0; if(isset($_POST["s1"])) $s1 = $_POST["s1"];
        $s2 = 0; if(isset($_POST["s2"])) $s2 = $_POST["s2"];
        echo $s1 . " İLE " . $s2 . " ARASINDAKİ ASAL SAYILAR: <br/>";
        asalsayi($s1, $s2);
    }
?>