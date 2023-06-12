<title>E34</title>
<?php
    $dizin = opendir("FILES");
    while(($isim = readdir($dizin)) !== false)
    {
        if(is_dir("FILES/".$isim))
            print("-Klasör-");
        print("<a href='FILES/".$isim."'>".$isim."</a><br/>");
    }
    closedir($dizin);
?>