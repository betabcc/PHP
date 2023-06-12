<title>E51</title>
<script>
    var satir = -1;
    function kayitAl(sat) {
        if (document.getElementsByName("islem")[0].value == "KAYIT GÜNCELLE" || document.getElementsByName("islem")[0].value == "KAYIT SİL") {
            var n = document.getElementById("h" + sat + "-0").innerHTML;
            var ad = document.getElementById("h" + sat + "-1").innerHTML;
            var adr = document.getElementById("h" + sat + "-2").innerHTML;
            var m = document.getElementById("h" + sat + "-3").innerHTML;
            document.getElementsByName("num")[0].value = n;
            document.getElementsByName("ad")[0].value = ad;
            document.getElementsByName("adr")[0].value = adr;
            document.getElementsByName("maas")[0].value = m;
            document.getElementsByName("numD")[0].value = n;
            if (satir != -1)
                document.getElementById("s" + satir).style.backgroundColor = "";
            document.getElementById("s" + sat).style.backgroundColor = "yellow";
            satir = sat;
        }
    }
    function islemSecenek() {
        var islem = document.getElementsByName("islem")[0].value;
        document.getElementsByName("gonder")[0].value = islem;
        document.getElementById("uyariG").innerHTML = "";
        if (islem == "KAYIT GÜNCELLE") {
            document.getElementById("uyariG").innerHTML = "TABLODAN GÜNCELLEMEK İSTEDİĞİNİZ KAYDA TIKLAYINIZ!";
        }
        if (islem == "KAYIT SİL") {
            document.getElementById("uyariG").innerHTML = "TABLODAN SİLMEK İSTEDİĞİNİZ KAYDA TIKLAYINIZ!";
        }
    }
</script>

<?php
$sunucu = "localhost";
$vt = "vt";
$ka = "root";
$sifre = "";
$tablo = "kayit3";
$aK = array("0", "%", "%", "0");

function listele($islem, $aK) {
    try {
        global $sunucu, $vt, $ka, $sifre, $tablo;
        $bag = new PDO("mysql:host=$sunucu; dbname=$vt; charset=utf8", $ka, $sifre);
        if ($islem != "KAYIT ARA") {
            $sorgu = $bag->prepare("SELECT * FROM $tablo ORDER BY NUMARA");
        } else {
            $sql = "SELECT * FROM $tablo WHERE ";
            if ($aK[0] != "0") $sql .= "NUMARA = :num AND ";
            else $sql .= "NUMARA > :num AND ";
            $sql .= "AD LIKE :ad AND ";
            $sql .= "ADRES LIKE :adr AND ";
            if ($aK[3] != "0") $sql .= "MAAŞ= :maas AND ";
            else $sql .= "MAAŞ > :maas AND ";
            $sql = substr($sql, 0, strlen($sql) - 5);
            $sql .= " ORDER BY NUMARA";
            $sorgu = $bag->prepare($sql);
            $sorgu->bindParam(":num", $aK[0]);
            $sorgu->bindParam(":ad", $aK[1]);
            $sorgu->bindParam(":adr", $aK[2]);
            $sorgu->bindParam(":maas", $aK[3]);
        }
        $sorgu->execute();
        $tablo = "<table border='1' cellspacing='0'><tr><th>NUMARA</th><th>AD</th><th>ADRES</th><th>MAAŞ</th></tr>";
        $i = 0;
        if ($sorgu->rowCount()) {
            while ($satir = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                $tablo .= "<tr id='s$i' onClick='kayitAl($i)'><td id='h$i-0'>" . $satir["NUMARA"] . "</td>";
                $tablo .= "<td id='h$i-1'>" . $satir["AD"] . "</td>";
                $tablo .= "<td id='h$i-2'>" . $satir["ADRES"] . "</td>";
                $tablo .= "<td id='h$i-3'>" . $satir["MAAŞ"] . "</td></tr>";
                $i++;
            }
        }
        $tablo .= "</table>";
        echo $tablo;
    } catch (PDOException $hata) {
        echo "<script>alert('" . $hata->getMessage() . "');</script>";
    }
    $bag = null;
}

function ekle($gK) {
    try {
        global $sunucu, $vt, $ka, $sifre, $tablo;
        $bag = new PDO("mysql:host=$sunucu; dbname=$vt; charset=utf8", $ka, $sifre);
        $komut = "INSERT INTO $tablo VALUES(:num, :ad, :adr, :maas)";
        $sorgu = $bag->prepare($komut);
        $sorgu->bindParam(":num", $gK[0]);
        $sorgu->bindParam(":ad", $gK[1]);
        $sorgu->bindParam(":adr", $gK[2]);
        $sorgu->bindParam(":maas", $gK[3]);
        $sorgu->execute();
        echo "<script>alert('KAYIT EKLENDİ!');</script>";
    } catch (PDOException $hata) {
        echo "<script>alert('" . $hata->getMessage() . "');</script>";
    }
    $bag = null;
}

function guncelle($numD, $gK) {
    try {
        global $sunucu, $vt, $ka, $sifre, $tablo;
        $bag = new PDO("mysql:host=$sunucu; dbname=$vt; charset=utf8", $ka, $sifre);
        $komut = "UPDATE $tablo SET NUMARA=:num, AD=:ad, ADRES=:adr, MAAŞ=:maas WHERE NUMARA = :numD";
        $sorgu = $bag->prepare($komut);
        $sorgu->bindParam(":num", $gK[0]);
        $sorgu->bindParam(":ad", $gK[1]);
        $sorgu->bindParam(":adr", $gK[2]);
        $sorgu->bindParam(":maas", $gK[3]);
        $sorgu->bindParam(":numD", $numD);
        $sorgu->execute();
        echo "<script>alert('KAYIT GÜNCELLENDİ!');</script>";
    } catch (PDOException $hata) {
        echo "<script>alert('" . $hata->getMessage() . "');</script>";
    }
    $bag = null;
}

function sil($numD) {
    try {
        global $sunucu, $vt, $ka, $sifre, $tablo;
        $bag = new PDO("mysql:host=$sunucu; dbname=$vt; charset=utf8", $ka, $sifre);
        $komut = "DELETE FROM $tablo WHERE NUMARA = :numD";
        $sorgu = $bag->prepare($komut);
        $sorgu->bindParam(":numD", $numD);
        $sorgu->execute();
        echo "<script>alert('KAYIT SİLİNDİ!');</script>";
    } catch (PDOException $hata) {
        echo "<script>alert('" . $hata->getMessage() . "');</script>";
    }
    $bag = null;
}
?>

<h2>KAYIT İŞLEMLERİ</h2>
<table style="border: 1px solid; width:100%">
    <tr>
        <td style="text-align: right; vertical-align: top; width:25%">
            <form action="E51.php" method="POST">
                İŞLEM:
                <select size="1" name="islem" onChange="islemSecenek()">
                    <option hidden>İŞLEM SEÇİNİZ</option>
                    <option>KAYIT LİSTELE</option>
                    <option>KAYIT ARA</option>
                    <option>KAYIT EKLE</option>
                    <option>KAYIT GÜNCELLE</option>
                    <option>KAYIT SİL</option>
                </select>
                <br/>
                <span id="uyariG"></span>
                <br/>
                <input type="submit" value="KAYIT LİSTELE" name="gonder"/><br/><br/>
                NUMARA: <input type="text" name="num"/><br/>
                AD: <input type="text" name="ad"/><br/>
                ADRES: <input type="text" name="adr"/><br/>
                MAAŞ: <input type="text" name="maas"/><br/>
                <input type="text" name="numD" hidden/>
            </form>
        </td>
        <td id="sonuc" style="vertical-align: top; padding-left: 30px;">
            <?php
            $islem = "";
            if (isset($_POST["islem"])) $islem = $_POST["islem"];
            $num = "0";
            if (!empty($_POST["num"])) $num = $_POST["num"];
            $ad = "";
            if (!empty($_POST["ad"])) $ad = $_POST["ad"];
            $adr = "";
            if (!empty($_POST["adr"])) $adr = $_POST["adr"];
            $maas = "0";
            if (!empty($_POST["maas"])) $maas = $_POST["maas"];
            $numD = "0";
            if (!empty($_POST["numD"])) $numD = $_POST["numD"];
            $aK[0] = $num;
            $aK[1] = $ad;
            $aK[2] = $adr;
            $aK[3] = $maas;
            switch ($islem) {
                case "KAYIT ARA":
                    if ($ad == "") $aK[1] = "%";
                    if ($adr == "") $aK[2] = "%";
                    break;
                case "KAYIT EKLE":
                    ekle($aK);
                    break;
                case "KAYIT GÜNCELLE":
                    guncelle($numD, $aK);
                    break;
                case "KAYIT SİL":
                    sil($numD);
                    break;
            }
            listele($islem, $aK);
            ?>
        </td>
    </tr>
</table>