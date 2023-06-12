<title>E36</title>
<?php
    if($dizin = opendir("FILES")) {
        while($isim = readdir($dizin)) {
            if($isim != "." && $isim != "..") {
                if(is_dir("FILES/".$isim))
                    echo "<img src='DIRECTORY.png' width='20' />";
                else if(is_file("FILES/".$isim))
                    echo "<img src='FILES.png' width='20' />";
                echo "<a href='FILES/$isim'>$isim</a><br/>";
            }
        }
        closedir($dizin);
    } else {
        echo "FILES İSMİNDEKİ KLASÖR YOK!";
    }
?>