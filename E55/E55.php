<title>E55</title>
<script src="jquery.js"></script>
<script>
  $(function() {
    $("#gonder").click(function() {
      $.ajax({
        type: 'post',
        url: 'E55-2.php',
        data: $('#veri-formu').serialize(),
        error: function() {
          $('#sonuc').html("Hata");
        },
        success: function(result) {
          $('#sonuc').html(result);
        }
      });
    });
    $(document).ready(function() {
      $("#gonder").click();
    });
  });
</script>
<form id="veri-formu" method="post">
  ADRES: <input type="text" name="adr" />
  <input type="button" value="KAYIT ARA" id="gonder" /> <br/>
  YAZMADAN BUTONA BASINCA YENİDEN TABLO GELİYOR
</form>
<br/><br/>
<div id="sonuc"></div>