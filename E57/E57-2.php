<title>E57-2</title>
<?php
    if($_POST)
    {
        $s1=0;
        if(!empty($_POST["s1"])) $s1=$_POST["s1"];
        $s2=0;
        if(!empty($_POST["s2"])) $s2=$_POST["s2"];
        $islem=0;
        if(!empty($_POST["islem"])) $islem=$_POST["islem"];
        switch($islem)
        {
            case "TOPLAMA": $sonuc=$s1+$s2; break;
            case "ÇIKARMA": $sonuc=$s1-$s2; break;
            case "ÇARPMA":  $sonuc=$s1*$s2; break;
            case "BÖLME":   $sonuc=$s1/$s2; break;
        }
        echo "SONUÇ: ".$sonuc;
    }
?>