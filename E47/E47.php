<title>E47</title>
<h2>KAYIT ARAMA</h2>
<form action="E47.php" method="post">
    ARADIĞINIZ KAYITLARIN ADRESİ:
    <input type="text" name="adr" />
    <input type="submit" value="KAYIT ARA" name="ara" /> <br/>
    METİN KUTUSUNU BOŞSA ARAYINCA TABLO GELİYOR
</form>
<br/><br/>
<?php
    try {
        $adres = "%";
        if(isset($_POST["ara"])) {
            if(!empty($_POST["adr"])) {
                $adres = $_POST["adr"];
            }
        }
        $sunucu = "localhost";
        $kullanici = "root";
        $vt = "vt";
        $sifre = "";
        $bag = new PDO("mysql:host=$sunucu;dbname=$vt;charset=utf8", $kullanici, $sifre);
        $sorgu = $bag->prepare("SELECT * FROM kayit WHERE ADRES LIKE :adr");
        $sorgu->bindParam(':adr', $adres);
        $sorgu->execute();
        $tablo = "<table border='1'><tr><th>NUMARA</th><th>AD</th>";
        $tablo .= "<th>ADRES</th><th>MAAŞ</th></tr>";
        if($sorgu->rowCount()) {
            while($satir = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                $tablo .= "<tr><td>".$satir["NUMARA"]."</td><td>".$satir["AD"]."</td>";
                $tablo .= "<td>".$satir["ADRES"]."</td><td>".$satir["MAAŞ"]."</td></tr>";    
            }  
            $tablo .= "</table>";
            echo $tablo;
        } else {
            echo "KAYIT YOK!";
        }
    } catch(PDOException $hata) {
        echo "HATA OLUŞTU!: ".$hata->getMessage();
    }
    $bag = null;
?>