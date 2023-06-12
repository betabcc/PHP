<title>E56</title>
<script src="jquery.js"></script>
<script>
 var islem; 
 function islemsec(secim) {
   document.getElementById("veriler").style.visibility = "visible";
   document.getElementById("dugme").style.visibility = "visible";
   switch(secim) {
     case 1: 
       baslik = "KAYIT EKLE";
       break;
     case 2: 
       baslik = "KAYIT ARA";
       break;
     case 3: 
       baslik = "KAYIT GÜNCELLE";
       break;
     case 4: 
       baslik = "KAYIT SİL";
       break;
   }
   islem = secim; 
   document.getElementById("dugme").value = baslik;
 }

 function listele() {
    islem = 5;
    gonderilen = $('#veriler').serialize() + "&islem=" + islem;
    $.ajax({ 
       type: "POST",
       url: "E56-2.php",
       data: gonderilen, 
       error: function() { 
         $('#sonuc').html("Hata"); 
       },
       success: function(veri) { 
         $('#sonuc').html(veri);
       }
     });
}

 $(document).ready(function() {
    listele();
 });

 $(function() {
   $("#dugme").click(function() {
     gonderilen = $('#veriler').serialize() + "&islem=" + islem;
     $.ajax({ 
       type: "POST",
       url: "E56-2.php",
       data: gonderilen, 
       error: function() { 
         $('#sonuc').html("Hata"); 
       },
       success: function(veri) { 
         $('#sonuc').html(veri);
       }
     });
   });
 });

</script>
<h3>İŞLEMLER</h3>
<input type="button" value="KAYIT LİSTELE" onclick="listele()" style="margin-right:10px"/> 
<input type="radio" name="secenek" onClick="islemsec(1)" style="margin-right:10px"/> KAYIT EKLEME
<input type="radio" name="secenek" onClick="islemsec(2)" style="margin-right:10px"/> KAYIT ARAMA
<input type="radio" name="secenek" onClick="islemsec(3)" style="margin-right:10px"/> KAYIT GÜNCELLEME
<input type="radio" name="secenek" onClick="islemsec(4)" style="margin-right:10px"/> KAYIT SİLME
<br/><hr/>
<table>
  <tr>
    <td style="text-align:right; vertical-align:top">
      <form id="veriler" method="post" style="visibility: hidden;">
        NUMARA : <input type="text" name="num" /><br/>
        AD : <input type="text" name="ad" /><br/>
        ADRES : <input type="text" name="adr" /><br/>
        MAAŞ : <input type="text" name="maas" /><br/>
        <input type="button" value="" id="dugme" style="visibility: hidden;"/>
      </form>
    </td>
    <td valign="top" id="sonuc"></td>
  </tr>
</table>