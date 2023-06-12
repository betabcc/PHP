function islemsec() {
    var secilen = document.getElementsByName("islem")[0].value;
    document.getElementsByName("gonder")[0].value = secilen;
    document.getElementById("uyari").innerHTML = "";

    if (secilen == "KAYIT GÜNCELLE") {
        document.getElementById("uyari").innerHTML = "GÜNCELLENECEK KAYDIN ÜZERİNE TIKLAYINIZ!";
    }
    if (secilen == "KAYIT SİL") {
        document.getElementById("uyari").innerHTML = "SİLİNECEK KAYDIN ÜZERİNE TIKLAYINIZ!";
    }
}

function kontrol() {
    var numara = document.getElementsByName("num")[0];
    var ad = document.getElementsByName("ad")[0];
    var islem = document.getElementsByName("islem")[0].value;

    if (islem == "KAYIT EKLE") {
        if (numara.value == "" || ad.value == "") {
            alert("NUMARA VEYA AD ALANI BOŞ BIRAKILAMAZ");
            return false;
        }
    }

    return true;
}

var os = 0;

function satirsec(s) {
    var secilen = document.getElementsByName("islem")[0].value;

    if (secilen == "KAYIT GÜNCELLE" || secilen == "KAYIT SİL") {
        document.getElementById("satir" + os).style.backgroundColor = "";
        document.getElementById("satir" + s).style.backgroundColor = "lightblue";
        os = s;

        var numara = document.getElementsByName("num")[0];
        var ad = document.getElementsByName("ad")[0];
        var adr = document.getElementsByName("adr")[0];
        var maas = document.getElementsByName("maas")[0];
        var gn = document.getElementsByName("gn")[0];

        numara.value = document.getElementById("h" + s + "-0").innerHTML;
        gn.value = document.getElementById("h" + s + "-0").innerHTML;
        ad.value = document.getElementById("h" + s + "-1").innerHTML;
        adr.value = document.getElementById("h" + s + "-2").innerHTML;
        maas.value = document.getElementById("h" + s + "-3").innerHTML;
    }
}