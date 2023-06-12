<title>E59-2</title>
<?php
function goster($kayitlar)
{
    echo "<table border='1'><tr><th>NUMARA</th><th>AD</th>";
    echo "<th>ADRES</th><th>MAAŞ</th><tr>";
    foreach($kayitlar as $kayit)
    {
        echo "<tr><td>".$kayit["NUMARA"]."</td><td>".$kayit["AD"]."</td>";
        echo "<td>".$kayit["ADRES"]."</td><td>".$kayit["MAAŞ"]."</td></tr>";
    }
    echo "</table>";
}

if(!empty($_POST["islem"]))
{
    $islem=$_POST["islem"];
    $numara=0;
    if(!empty($_POST["num"])) $numara=$_POST["num"];
    $ad="";
    if(!empty($_POST["ad"])) $ad=$_POST["ad"];
    $adres="";
    if(!empty($_POST["adr"])) $adres=$_POST["adr"];
    $maas=0;
    if(!empty($_POST["maas"])) $maas=$_POST["maas"];

    try{
        $server="localhost";
        $user="root";
        $sifre="";
        $db="vt";
        $tablo="kayit3";

        $bag=new PDO("mysql:host=$server;dbname=$db;charset=utf8",$user,$sifre);
        switch($islem)
        {
            case "1":
                if($numara>0 && $ad!="")
                {
                    $komut=$bag->prepare("INSERT INTO $tablo VALUES(:num,:ad,:adr,:maas)");
                    $komut->bindParam(":num",$numara);
                    $komut->bindParam(":ad",$ad);
                    $komut->bindParam(":adr",$adres);
                    $komut->bindParam(":maas",$maas);
                    $komut->execute();

                    $komut=$bag->prepare("SELECT * FROM $tablo ORDER BY NUMARA");
                    $komut->execute();
                    $sonuc=$komut->fetchAll();
                    if(count($sonuc)>0){
                        goster($sonuc);
                    }
                }
                break;
            case "2":
                $sorgu="SELECT * FROM $tablo WHERE ";
                if($numara>0) $sorgu.="NUMARA = :num AND ";
                else $sorgu.="NUMARA > :num AND ";
                if($ad=="") $ad="%"; $sorgu.="AD LIKE :ad AND ";
                if($adres=="") $adres="%"; $sorgu.="ADRES LIKE :adr AND ";
                if($maas>0) $sorgu.="MAAŞ = :maas";
                else $sorgu.="MAAŞ > :maas ORDER BY NUMARA";
                $komut=$bag->prepare($sorgu);
                $komut->bindParam(":num",$numara);
                $komut->bindParam(":ad",$ad);
                $komut->bindParam(":adr",$adres);
                $komut->bindParam(":maas",$maas);
                $komut->execute();
                $sonuc=$komut->fetchAll();
                if(count($sonuc)>0)
                {
                    goster($sonuc);
                }
                break;
            case "3":
                if($numara>0 && $ad!="")
                {
                    $komut=$bag->prepare("UPDATE $tablo SET AD=:ad,ADRES=:adr,MAAŞ=:maas WHERE NUMARA=:num");
                    $komut->bindParam(":ad",$ad);
                    $komut->bindParam(":adr",$adres);
                    $komut->bindParam(":maas",$maas);
                    $komut->bindParam(":num",$numara);
                    $komut->execute();

                    $komut=$bag->prepare("SELECT * FROM $tablo ORDER BY NUMARA");
                    $komut->execute();
                    $sonuc=$komut->fetchAll();
                    if(count($sonuc)>0)
                    {
                        goster($sonuc);
                    }
                }
                break;
            case "4":
                $sorgu="DELETE FROM $tablo WHERE ";
                if($numara>0) $sorgu.="NUMARA = :num AND ";
                else $sorgu.="NUMARA > :num AND ";
                if($ad=="") $ad="%"; $sorgu.="AD LIKE :ad AND ";
                if($adres=="") $adres="%"; $sorgu.="ADRES LIKE :adr AND ";
                if($maas>0) $sorgu.="MAAŞ = :maas";
                else $sorgu.="MAAŞ > :maas ORDER BY NUMARA";
                $komut=$bag->prepare($sorgu);
                $komut->bindParam(":num",$numara);
                $komut->bindParam(":ad",$ad);
                $komut->bindParam(":adr",$adres);
                $komut->bindParam(":maas",$maas);
                $komut->execute();

                $komut=$bag->prepare("SELECT * FROM $tablo ORDER BY NUMARA");
                $komut->execute();
                $sonuc=$komut->fetchAll();
                if(count($sonuc)>0)
                {
                    goster($sonuc);
                }
                break;
        }
    }
    catch(PDOException $hata)
    {
        echo "HATA OLUŞTU: ".$hata->getMessage();
    }
    $bag=null;
}
?>