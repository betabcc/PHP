<title>E32</title>
<?php
   if(file_exists("E32.txt")) {
      $dosya = fopen("E32.txt", "r");
      while(!feof($dosya)) {
         $satir = fgets($dosya);
         echo $satir . "<br/>"; 
      }
      fclose($dosya);
   } else {
      echo "OKUNACAK DOSYA YOK";
   }
?>