<title>E30</title>
<?php 
	session_start(); 
	if(!isset($_SESSION["apr"])) {
		$_SESSION["apr"] = "white";
	}
?>

<?php
	if(isset($_POST["renkgonder"])) {
		$_SESSION["apr"] = $_POST["renk"];
	}	
	$renk = $_SESSION["apr"];
	echo "<body bgcolor='$renk'";
	if($renk == "black") {
		echo "text='white'";
	} else {
		echo "text='black'";
	}
	echo " >";
	
	if(!isset($_SESSION["oturum"])) {
		if(!isset($_POST["gonder"])) {
			?>
			<form action="E30.php" method="post">
				KULLANICI ADI: <input type="text" name="ka" /> <br/>
				ŞİFRE: <input type="password" name="sifre" /><br/>
				<input type="submit" name="gonder" value="OTURUM AÇ" /> <br/> <br/>
				KULLANICI ADI: admin <br/> ŞİFRE: 123
			</form>
			<?php
		} else {
			$ka = $_POST["ka"];
			$sifre = $_POST["sifre"];
			if($ka == "admin" && $sifre == "123") {
				$_SESSION["oturum"] = "açık";
				echo "OTURUM AÇILDI!";
				header("refresh:2; url=E30.php");
			} else {
				echo "KULLANICI VEYA ŞİFRE YANLIŞ!";
				header("refresh:2; url=E30.php");
			}
		}					
	} else {
		if(isset($_GET["kapat"])) {
			session_destroy();
			echo "OTURUM KAPANDI!";
			header("refresh:2; url=E30.php");
		} else {
			?>		
			<form action="E30.php" method="post">
				ARKAPLAN RENGİ: 
				<select name="renk" size="1">
					<option value="white">BEYAZ</option>
					<option value="red">KIRMIZI</option>
					<option value="lightblue">MAVİ</option>
					<option value="lightgreen">YEŞİL</option>
					<option value="yellow">SARI</option>
					<option value="black">SİYAH</option>
				</select>	
				<input type="submit" name="renkgonder" value="RENK BELİRLE" />
			</form>
			<h2>SESSION İLE OTURUM YÖNETİMİ</h2>
			İÇERİK <br/><br/><br/><br/><br/>
			<a href="E30-2.php">2.SAYFA</a><br/><br/>
			<a href="E30.php?kapat=1"><button>OTURUMU KAPAT</button></a>	
			<?php
		}
	}	
?>