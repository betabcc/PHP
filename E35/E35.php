<title>E35</title>
<?php
	if(!isset($_GET["kayitekle"]))
	{
		echo "<h2>KAYIT LİSTESİ</h2>";	
		if(isset($_POST["ekle"]))
		{
			$numara = $_POST["num"];
			$ad = $_POST["ad"];
			$adres = empty($_POST["adr"]) ? "-" : $_POST["adr"];
			$telefon = empty($_POST["tel"]) ? "-" : $_POST["tel"];		
			if($dosya = fopen("E35.txt", "a"))
			{
				flock($dosya, LOCK_EX);
				fwrite($dosya, $numara."\n");
				fwrite($dosya, $ad."\n");
				fwrite($dosya, $adres."\n");
				fwrite($dosya, $telefon."\n");
				flock($dosya, LOCK_UN);
				fclose($dosya);
				echo "KAYIT EKLENDİ!<br/>";
			}
			else {
				echo "DOSYA KULLANIMDA. LÜTFEN DAHA SONRA TEKRAR DENEYİN!";
			}
		}
		if(file_exists("E35.txt"))
		{
			if($dosya = fopen("E35.txt", "r"))
			{
				flock($dosya, LOCK_EX);
				echo "<table border='1'><tr><th>NUMARA</th><th>AD</th><th>ADRES</th><th>TELEFON</th></tr>";
				$adet = 0;
				while(true)
				{						
					$deger = fgets($dosya);
					if(feof($dosya)) break;
					if($adet % 4 == 0) { 
						echo "<tr>"; 
						$adet = 0; 
					}
					echo "<td>$deger</td>";
					$adet++;
					if($adet == 4) {
						echo "</tr>";
					}
				}
				echo "</table><br/>";
				flock($dosya, LOCK_UN);
				fclose($dosya);
				echo "<a href='E35.php?kayitekle=1'><button>KAYIT EKLE</button></a>";
			}
			else {
				echo "DOSYA KULLANIMDA. LÜTFEN DAHA SONRA TEKRAR DENEYİN!";
			}
		}
	}
	else
	{
		?>
		<h2>KAYIT EKLEME</h2>				
		<form action="E35.php" method="post" style="text-align: right; width: 250px">
			NUMARA: <input type="text" name="num" required /><br/>
			AD: <input type="text" name="ad" required /><br/>
			ADRES: <input type="text" name="adr" /><br/>
			TELEFON: <input type="text" name="tel" /><br/>
			<input type="submit" name="ekle" value="KAYDET" />
		</form>
		<br/><a href='E35.php'><button>KAYIT LİSTESİ</button></a>
		<?php
	}
?>