<title>E53-2</title>
<?php
function Baglan()
{
    $sunucu = "localhost";
    $vt = "vt";
    $ka = "root";
    $sifre = "";
    $bag = new PDO("mysql:host=$sunucu;dbname=$vt;charset=utf8", $ka, $sifre);
    return $bag;
}

class VTislemleri
{
    public function liste($tablo)
    {
        try {
            $bag = Baglan();
            $sorgu = $bag->prepare("SELECT * FROM $tablo");
            $sorgu->execute();
            $alanSayisi = $sorgu->columnCount();
            
            $alan = array();
            for ($i = 0; $i < $alanSayisi; $i++) {
                $meta = $sorgu->getColumnMeta($i);
                $alan[$i] = $meta["name"];
            }
            
            $tablo = "<table border='1' cellspacing='0'><tr>";
            for ($i = 0; $i < $alanSayisi; $i++) {
                $tablo .= "<th>".$alan[$i]."</th>";
            }
            $tablo .= "</tr>";
            
            if ($sorgu->rowCount()) {
                while ($satir = $sorgu->fetch(PDO::FETCH_NUM)) {
                    $tablo .= "<tr>";
                    for ($i = 0; $i < $alanSayisi; $i++) {
                        $tablo .= "<td>".$satir[$i]."</td>";
                    }
                    $tablo .= "</tr>";
                }
                $tablo .= "</table>";
            } else {
                $tablo = "KAYIT YOK!";
            }
        } catch (PDOException $hata) {
            echo "<script>alert('".$hata->getMessage()."')</script>";
            $tablo = "";
        }
        
        $bag = null;
        return $tablo;
    }
}

class Oturum
{
    public function __construct($k, $s)
    {
        $this->ka = $k;
        $this->sifre = $s;
    }
    
    private $ka = "";
    private $sifre = "";
    
    public function kontrol()
    {
        $adet = 0;
        
        try {
            $bag = Baglan();
            $sorgu = $bag->prepare("SELECT * FROM kullanici WHERE KULLANICI = :k AND SIFRE = :s");
            $sorgu->bindParam(":k", $this->ka);
            $sorgu->bindParam(":s", $this->sifre);
            $sorgu->execute();
            $adet = $sorgu->rowCount();
        } catch (PDOException $hata) {
            echo "<script>alert('".$hata->getMessage()."')</script>";
        }
        
        $bag = null;
        return $adet;
    }
}
?>