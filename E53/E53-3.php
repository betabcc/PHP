<title>E53-3</title>
<?php
session_start();
include "E53-2.php";
$Vt = new VTislemleri();

if(isset($_SESSION["oturum"])) {
    echo "<h2>KAYIT LİSTESİ</h2>";
    $tablo = $Vt->liste("kayit");
    echo $tablo;
    echo "<br/><br/>";
    echo "<form action='E53.php' method='post'><input type='submit' value='OTURUMU KAPAT' name='kapat'/></form>";
} else {
    echo "OTURUM AÇIK DEĞİL";
    header("Refresh: 2; url=E53.php");
}
?>