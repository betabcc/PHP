<title>E41-2</title>
<?php
    function asalsayilar($a, $b)
    {
        if($a > $b) {
            $k = $a;
            $a = $b;
            $b = $k;
        }
        $sonuc = "";
        for($i = $a; $i <= $b; $i++) {
            $asal = 1;
            for($j = 2; $j <= $i/2; $j++) {
                if($i % $j == 0) {
                    $asal = 0;
                    break;
                }
            }
            if($asal == 1) {
                $sonuc .= $i . "-";
            }
        }
        return $sonuc;
    }
?>