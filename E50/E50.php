<title>E50</title>
<?php include("E50-2.php"); ?>

<style>
    #sol {
        float: left;
        width: 40%;
        background-color: beige;
        height: 200px;
        text-align: right;
    }

    #sag {
        float: left;
        width: 60%;
        background-color: aquamarine;
        height: 200px;
    }

    #aramaformu {
        display: none;
    }

    #ekleformu {
        display: none;
    }
</style>

<script>
    function islem() {
        var sec = document.getElementById("islem").value;
        if (sec == "KAYIT ARAMA") {
            document.getElementById("aramaformu").style.display = "inline";
            document.getElementById("ekleformu").style.display = "none";
        } else if (sec == "KAYIT EKLEME") {
            document.getElementById("aramaformu").style.display = "none";
            document.getElementById("ekleformu").style.display = "inline";
        }
    }
</script>

<section>
    <article id="sol">
        <select id="islem" onchange="islem()">
            <option hidden="">İŞLEM SEÇİNİZ!</option>
            <option>KAYIT ARAMA</option>
            <option>KAYIT EKLEME</option>
        </select>
        <br/>
        <form id="aramaformu" action="E50.php" method="post">
            ARADIĞINIZ BÖLÜM: <input type="text" name="bolum" required/><br/>
            <input type="submit" name="bolumara" value="KAYIT ARA"/> <br/> <br/>
            ARAMA KISMINA % YAZIP BUTONA BASINCA ÇALIŞIYOR
        </form>
        <br/>
        <form id="ekleformu" action="E50.php" method="post">
            NUMARA: <input type="text" name="num" required><br/>
            AD: <input type="text" name="ad" required/><br/>
            ADRES: <input type="text" name="adr" required/><br/>
            BÖLÜM: <input type="text" name="bol" required/><br/>
            MAAŞ: <input type="text" name="maas" required/><br/>
            <input type="submit" name="kayitekle" value="KAYIT EKLE"/>
        </form>
    </article>
    <article id="sag">
        <?php
        try {
            $bn = baglan();
            if (isset($_POST["bolumara"])) {
                $bolum = $_POST["bolum"];
                echo arama($bn, "kayit", $bolum);
            } else if (isset($_POST["kayitekle"])) {
                $yk[0] = $_POST["num"];
                $yk[1] = $_POST["ad"];
                $yk[2] = $_POST["adr"];
                $yk[3] = $_POST["bol"];
                $yk[4] = $_POST["maas"];
                echo ekle($bn, "kayit", $yk);
                echo "<br/>KAYIT EKLENDİ!";
            }
        } catch (PDOException $hata) {
            echo "HATA OLUŞTU: " . $hata->getMessage();
        }
        $bn = null;
        ?>
    </article>
</section>