<title>E58</title>
<script src="jquery.js"></script>
<script>
    $(function(){
        $("#gonder").click(function(){
            $.ajax({
                type: "POST",
                url: "E58-2.php",
                data: $('#veri-formu').serialize(),
                success: function(result) {
                    $("#sonuc").html(result);
                },
                error: function() {
                    $("#sonuc").html("HATA OLUŞTU!");
                },
            });
        });
    });
</script>
<form id="veri-formu" method="post">
    ADRES: <input type="text" name="adr"/>
    <input type="button" value="KAYIT ARA" id="gonder"/> <br/>
    YAZMADAN BUTONA BASINCA TABLO GELİYOR
</form>
<br/><br/>
<div id="sonuc"></div>