<title>E46</title>
<?php
	$sunucu = "localhost";
	$ka = "root";
	$sifre = "";
	$vt = "vt";
	$tablo = "kayit";
	try {
		$bn = new PDO("mysql:host=$sunucu;dbname=$vt;charset=utf8", $ka, $sifre);
		$komut = $bn->prepare("SELECT * FROM $tablo");
		$komut->execute();
		$alanlar = array_keys($komut->fetch(PDO::FETCH_ASSOC));
		$tablo = "<table border='1' cellspacing='0'><tr>";
		foreach($alanlar as $alan) {
			$tablo .= "<th>$alan</th>";
		}
		$tablo .= "</tr>";
		if($komut->rowCount()) {
			$komut->execute();
			while($kayit = $komut->fetch(PDO::FETCH_ASSOC)) {
				$tablo .= "<tr>";
				foreach($kayit as $deger) {
					$tablo .= "<td>$deger</td>";
				}
				$tablo .= "</tr>";
			}
		}
		$tablo .= "</table>";
		echo $tablo;
		$bn = null;
	} catch(PDOException $hata) {
		echo "Hata oluştu: " . $hata->getMessage();
	}
?>