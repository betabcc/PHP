<title>E30-2</title>
<?php 
	session_start(); 
	if(!isset($_SESSION["apr"])) {
		$_SESSION["apr"] = "white";
	}
?>

<?php	
	$renk = $_SESSION["apr"];
	echo "<body bgcolor='$renk'";
	if($renk == "black") {
		echo "text='white'";
	} else {
		echo "text='black'";
	}
	echo " >";
	if(!isset($_SESSION["oturum"])) {
		echo "OTURUM KAPALI, BU SAYFAYI GÖREMEZSİNİZ!";
		header("refresh:2; url=E30.php");
		die();
	}
?>		
<h2>SESSION ile SAYFALAR ARASINDA VERİ AKTARIMI</h2><br/><br/><br/><br/><br/>
<a href="E30.php">ANA SAYFA</a>