<title>E33</title>
<h2>KAYIT İŞLEMLERİ</h2>
<a href="E33.php">KAYITLARI GÖSTER</a><br/>
<a href="E33.php?islem=kayitgiris">KAYIT GİRİŞİ</a><br/>

<?php
    if(isset($_GET["islem"]) || isset($_GET["gonder"])) {
        if(file_exists("E33-3.php")) {
            include "E33-3.php";
        }
    } else {
        if(file_exists("E33-3.php")) {
            include "E33-2.php";	
        }
    }
?>