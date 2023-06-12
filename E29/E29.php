<title>E29</title>
<?php
    $dosya = fopen("E29.txt", "r");
    while(!feof($dosya)) {
        $satir = fgets($dosya);
        echo $satir . "<br/>";
    }
    fclose($dosya);
?>