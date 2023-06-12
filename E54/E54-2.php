<title>E54-2</title>
<?php
    function baglan()
    {
        $sunucu = "localhost";
        $vt = "vt";
        $ka = "root";
        $sifre = "";
        try {
            $bag = new PDO("mysql:host=$sunucu;dbname=$vt;charset=utf8", $ka, $sifre);
            return $bag;
        } catch (PDOException $hata) {
            echo "HATA: " . $hata->getMessage();
        }
    }

    class Oturum
    {
        private $ka = "";
        private $sifre = "";

        public function __construct($k, $s)
        {
            $this->ka = $k;
            $this->sifre = md5($s);
        }

        public function kontrol()
        {
            $sonuc = false;
            try {
                $bag = baglan();
                $sorgu = $bag->prepare("SELECT * FROM kullanicilar WHERE KA = :k AND SIFRE=:s");
                $sorgu->bindParam(":k", $this->ka);
                $sorgu->bindParam(":s", $this->sifre);
                $sorgu->execute();
                if ($sorgu->rowCount() > 0) {
                    $sonuc = true;
                } else {
                    $sonuc = false;
                }
            } catch (PDOException $hata) {
                echo "<script>alert('" . $hata->getMessage() . "')</script>";
            }
            $bag = null;
            return $sonuc;
        }
    }

    class vtislemler
    {
        public function listele()
        {
            try {
                $bag = baglan();
                $sorgu = $bag->prepare("SELECT * FROM kayit");
                $sorgu->execute();
                $alansayisi = $sorgu->columnCount();
                $alan = array();
                for ($i = 0; $i < $alansayisi; $i++) {
                    $alanbilgi = $sorgu->getColumnMeta($i);
                    $alan[$i] = $alanbilgi["name"];
                }
                $tablo = "<table border='1' cellspacing='0'><tr>";
                for ($i = 0; $i < $alansayisi; $i++) {
                    $tablo .= "<th>" . $alan[$i] . "</th>";
                }
                $tablo .= "</tr>";
                if ($sorgu->rowCount()) {
                    while ($satir = $sorgu->fetch(PDO::FETCH_NUM)) {
                        $tablo .= "<tr>";
                        for ($i = 0; $i < $alansayisi; $i++) {
                            $tablo .= "<td>" . $satir[$i] . "</td>";
                        }
                        $tablo .= "</tr>";
                    }
                    $tablo .= "</table>";
                } else {
                    $tablo = "KAYIT YOK!";
                }
            } catch (PDOException $hata) {
                echo "<script>alert('" . $hata->getMessage() . "')</script>";
                $tablo = "";
            }
            $bag = null;
            return $tablo;
        }
    }
?>