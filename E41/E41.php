<title>E41</title>
<?php
    include "E41-2.php";
?>
<form action="E41.php" method="get">
    1.SAYI: <input type="text" name="s1" required/><br/>
    2.SAYI: <input type="text" name="s2" required/><br/>
    <input type="submit" name="gonder" value="ASAL SAYILARI GÖSTER"/>
</form>
<?php
    if(isset($_GET["gonder"])) {
        $s1 = $_GET["s1"];
        $s2 = $_GET["s2"];
        echo asalsayilar($s1, $s2);
    }
?>