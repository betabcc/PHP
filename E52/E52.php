<title>E52</title>
<script src="E52-3.js"></script>
<style>
    *{box-sizing: border-box;}
    #sol
    {
        background-color: aquamarine;
        width: 50%;
        height: 200px;
        float: left;
        text-align: right;
        padding: 10px;
    }
    #sag
    {
        background-color: beige;
        width: 50%;
        height: 200px;
        float: left;
        padding: 10px;
    }
    #uyari{color: red;}
</style>
<h2>KAYIT İŞLEMLERİ</h2>
<div>
    <div id="sol">
        <form action="E52.php" method="post" onSubmit="return kontrol()">
            İŞLEMLER: <select name="islem" onChange="islemsec()">
                <option hidden="">İŞLEM SEÇİNİZ</option>
                <option value="KAYIT LİSTELE">KAYIT LİSTELE</option>
                <option value="KAYIT ARA">KAYIT ARA</option>
                <option value="KAYIT EKLE">KAYIT EKLE</option>
                <option value="KAYIT GÜNCELLE">KAYIT GÜNCELLE</option>
                <option value="KAYIT SİL">KAYIT SİL</option>
            </select>
            <br/>
            <span id="uyari"></span> <br/>
            <input type="submit" name="gonder" value="KAYIT LİSTELE"/> <br/>
            NUMARA: <input type="text" name="num"/> <br/>
            AD: <input type="text" name="ad"/> <br/>
            ADRES: <input type="text" name="adr"/> <br/>
            MAAŞ: <input type="text" name="maas"/> <br/>
            <input type="text" name="gn" hidden=""/> <br/>     
        </form>
    </div>
    <div id="sag">
        <?php
            include("E52-2.php");
            try{
                $bag=baglan();
                if(isset($_POST["gonder"]))
                {
                    $islem=$_POST["gonder"];
                    switch($islem)
                    {
                        case "KAYIT LİSTELE":
                            kayitlistele($bag,"kayit3");
                            break;
                        case "KAYIT EKLE":
                            $kayit[0]=$_POST["num"];
                            $kayit[1]=$_POST["ad"];
                            $kayit[2]=$_POST["adr"];
                            $kayit[3]=$_POST["maas"];
                            kayitekle($bag,"kayit3",$kayit);
                            kayitlistele($bag,"kayit3");
                            echo "KAYIT EKLENDİ!";
                            break;
                        case "KAYIT GÜNCELLE":
                            $kayit[0]=$_POST["num"];
                            $kayit[1]=$_POST["ad"];
                            $kayit[2]=$_POST["adr"];
                            $kayit[3]=$_POST["maas"];
                            $kayit[4]=$_POST["gn"];
                            kayitguncelle($bag,"kayit3",$kayit);
                            kayitlistele($bag,"kayit3");
                            echo "KAYIT GÜNCELLENDİ!";
                            break;
                        case "KAYIT ARA":
                            $numara=$_POST["num"];
                            kayitara($bag,"kayit3",$numara);
                            break;
                        case "KAYIT SİL":
                            $numara=$_POST["num"];
                            kayitsil($bag,"kayit3",$numara);
                            kayitlistele($bag,"kayit3");
                            echo "KAYIT SİLİNDİ!";
                            break;
                    }
                }
            }catch(PDOException $hata)
            {
                echo "HATA: ".$hata->getMessage();
            }
            $bag=null;
        ?>
    </div>
</div>