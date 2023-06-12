<title>E25-3</title>
<?php
    if(!isset($_COOKIE["oturum"])) {
        header("refresh:0; url=E25.php");
    }
?>
<h2>ÇEREZ İLE OTURUM YÖNETİMİ</h2>
OTURUM AÇILDIĞINDA GÖRÜNTÜLENECEK İÇERİK BU SAYFADA OLACAK.
<br/><br/>
<a href="E25.php?kapat=1"><button>OTURUMU KAPAT</button></a>