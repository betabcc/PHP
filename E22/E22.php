<title>E22</title>
<form action="E22.php" method="post">
    CÜMLE: <textarea name="cumle"></textarea> <br/>
    <input type="submit" name="gonder" value="GÖNDER" />
</form>
<?php
    if(isset($_POST["gonder"])) {
        $cumle = $_POST["cumle"];
        $kelimeler = explode(" ", $cumle);
        for($i = 0; $i < count($kelimeler); $i++) {
            echo $kelimeler[$i]."<br/>";
        }
    }
?>