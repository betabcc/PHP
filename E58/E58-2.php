<title>E58-2</title>
<?php
if(!empty($_POST["adr"]))
{
    $adres=$_POST["adr"];
    $sorgu="SELECT * FROM kayit WHERE ADRES=:adr";
}
else $sorgu="SELECT * FROM kayit";
try{
    $server="localhost"; $user="root"; $sifre=""; $db="vt";
    $bag=new PDO("mysql:host=$server;dbname=$db;charset=utf8",$user,$sifre);
    $komut=$bag->prepare($sorgu);
    if(!empty($_POST["adr"])) 
        $komut->bindParam(':adr',$adres);
    $komut->execute();
    $kayitlar=$komut->fetchAll();
    if(count($kayitlar)>0)
    {
        echo "<table border='1'><tr><th>NUMARA</th><th>AD</th><th>ADRES</th><th>BÖLÜM</th></tr>";
        foreach($kayitlar as $kayit)
        {
            echo "<tr><td>".$kayit["NUMARA"]."</td><td>".$kayit["AD"]."</td><td>".$kayit["ADRES"]."</td><td>".$kayit["BÖLÜM"]."</td></tr>";
        }
        echo "</table>";
    }
    else echo "KAYIT BULUNAMADI!";
}
catch(PDOException $hata)
{
    echo "HATA: ".$hata->getMessage();
}
$bag=null;
?>