<title>E57</title>
<script src="jquery.js"></script>
<script>
    $(function() {
        $("#hesapla").click(function() {
            var s1 = document.getElementById("s1").value;
            var s2 = document.getElementById("s2").value;
            var islem = document.getElementById("islem").value;
            $.ajax({
                type: "POST",
                url: 'E57-2.php',
                data: {s1: s1, s2: s2, islem: islem},
                success: function(result) {
                    $("#sonuc").html(result);
                }
            });
        });
    });
</script>
<h2>DÖRT İŞLEM</h2>
İŞLEMLER:
<select id="islem" size="1">
    <option>TOPLAMA</option>
    <option>ÇIKARMA</option>
    <option>ÇARPMA</option>
    <option>BÖLME</option>
</select>
<br/>
1.SAYI: <input type="text" id="s1"/><br/>
2.SAYI: <input type="text" id="s2"/><br/>
<input type="button" id="hesapla" value="HESAPLA"/><br/><br/>
<span id="sonuc"></span>