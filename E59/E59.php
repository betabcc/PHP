<title>E59</title>
<script src="jquery.js"></script>
<script>
    var islem;
    function islemsec(secim)
    {
        document.getElementById("dugme").style.visibility="visible";
        switch (secim)
        {
            case 1: baslik="KAYIT EKLE"; break;
            case 2: baslik="KAYIT ARA"; break;
            case 3: baslik="KAYIT GÜNCELLE"; break;
            case 4: baslik="KAYIT SİL"; break;
        }
        islem=secim;
        document.getElementById("dugme").value=baslik;
    }
    $(function(){
        $("#dugme").click(function(){
            cevap=true;
            if(islem==4)
            {
                cevap=confirm("KAYIT SİLİNSİN Mİ?");
            }
            if(cevap)
            {
                gonderilen=$('#veriler').serialize()+"&islem="+islem;
                $.ajax({
                    type:"POST",
                    url:"E59-2.php",
                    data:gonderilen,
                    success:function(result){
                        $("#sonuc").html(result);
                    },
                    error:function(){
                        $("#sonuc").html("HATA OLUŞTU!");
                    }
                });
            }
        });
    });
</script>
<h3>İŞLEMLER</h3>
<input type="radio" name="secenek" onclick="islemsec(1)"/>KAYIT EKLEME
<input type="radio" name="secenek" onclick="islemsec(2)" style="margin-left: 30px;"/>KAYIT ARAMA
<input type="radio" name="secenek" onclick="islemsec(3)" style="margin-left: 30px;"/>KAYIT GÜNCELLEME
<input type="radio" name="secenek" onclick="islemsec(4)" style="margin-left: 30px;"/>KAYIT SİLME
<br/><hr/>
<table>
    <tr><td align="right" valign="top">
        <form id="veriler">
            NUMARA: <input type="text" name="num"/><br/>
            AD: <input type="text" name="ad"/><br/>
            ADRES: <input type="text" name="adr"/><br/>
            MAAŞ: <input type="text" name="maas"/><br/>
            <input type="button" value="" id="dugme" style="visibility: hidden;"/>
        </form>
    </td>
    <td valign="top" id="sonuc"> 
    </td></tr>
</table>