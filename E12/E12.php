<title>E12</title>
<?php
if(empty($_POST["gonderen"])) {
    ?>
    <form action="E12.php" method="post">
        NUMARA: <input type="text" name="num"/><br/>
        AD: <input type="text" name="ad"/><br/>
        BÖLÜM: <select name="bol" size="1">
            <option>BİLGİSAYAR</option>
            <option>ELEKTRONİK</option>
            <option>ELEKTRİK</option>
            <option>OTOMOTİV</option>
            <option>MAKİNE</option>
        </select> <br><br/>
        DERSLER: <br/>
        <input type="checkbox" name="ders1" value="TÜRK DİLİ"/>TÜRK DİLİ<br>
        <input type="checkbox" name="ders2" value="MATEMATİK"/>MATEMATİK<br>
        <input type="checkbox" name="ders3" value="PROGRAMLAMA"/>PROGRAMLAMA<br>
        <input type="checkbox" name="ders4" value="WEB TASARIM"/>WEB TASARIM<br>
        <input type="checkbox" name="ders5" value="YABANCI DİL"/>YABANCI DİL<br><br>
        <input type="submit" value="GÖNDER" name="gonderen"/>
    </form>
    <?php 
} else {
    if(isset($_POST["num"])) {
        $numara = $_POST["num"];
    } else {
        $numara = "";
    }
    if(isset($_POST["ad"])) {
        $ad = $_POST["ad"];
    } else {
        $ad = "";
    }
    if(isset($_POST["bol"])) {
        $bolum = $_POST["bol"];
    } else {
        $bolum = "";
    }
    if(isset($_POST["ders1"])) {
        $ders1 = $_POST["ders1"];
    } else {
        $ders1 = "";
    }
    if(isset($_POST["ders2"])) {
        $ders2 = $_POST["ders2"];
    } else {
        $ders2 = "";
    }
    if(isset($_POST["ders3"])) {
        $ders3 = $_POST["ders3"];
    } else {
        $ders3 = "";
    }
    if(isset($_POST["ders4"])) {
        $ders4 = $_POST["ders4"];
    } else {
        $ders4 = "";
    }
    if(isset($_POST["ders5"])) {
        $ders5 = $_POST["ders5"];
    } else {
        $ders5 = "";
    }
    $tablo = "<table border='1'><tr><th>NUMARA</th>";
    $tablo .= "<td>".$numara."</td></tr>";
    $tablo .= "<tr><th>AD</th><td>".$ad."</td></tr>";
    $tablo .= "<tr><th>BÖLÜM</th><td>".$bolum."</td></tr>";
    $tablo .= "<tr><th>DERSLER</th><td>";
    if($ders1 != "") {
        $tablo .= $ders1."<br/>";
    }
    if($ders2 != "") {
        $tablo .= $ders2."<br/>";
    }
    if($ders3 != "") {
        $tablo .= $ders3."<br/>";
    }
    if($ders4 != "") {
        $tablo .= $ders4."<br/>";
    }
    if($ders5 != "") {
        $tablo .= $ders5."<br/>";
    }
    $tablo .= "</td></tr></table>";
    echo $tablo;
}
?>