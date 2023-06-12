<?php 
session_start(); 
include "E53-2.php";

if(isset($_SESSION["oturum"])) {
    if(isset($_POST["kapat"])) {
        session_destroy();
        echo "OTURUM KAPANDI!";
        header("Refresh: 2; url=E53.php");
    } else {
        header("Refresh: 0; url=E53-3.php");
    }
} else {
    if(isset($_POST["gonder"])) {
        $ka = "";
        if(!empty($_POST["ka"])) {
            $ka = $_POST["ka"];
        }
        
        $sifre = "";
        if(!empty($_POST["sifre"])) {
            $sifre = $_POST["sifre"];
        }
        
        $oturum = new Oturum($ka, $sifre);
        
        if($oturum->kontrol()) {
            $_SESSION["oturum"] = "açık";
            echo "OTURUM AÇILDI";
            header("Refresh: 2; url=E53.php");
        } else {
            echo "KULLANICI ADI VEYA ŞİFRE YANLIŞ";
            echo "<br/>OTURUM AÇILMADI!";
            header("Refresh: 2; url=E53.php");
        }
    } else {
        echo "<form action='E53.php' method='post'>";
        echo "KULLANICI ADI: <input type='text' name='ka' /><br/>";
        echo "ŞİFRE: <input type='password' name='sifre' /><br/>";
        echo "<input type='submit' value='OTURUM AÇ' name='gonder' /></form>";
        echo "KULLANICI ADI: admin <br/> ŞİFRE: 123";
    }
}
?>