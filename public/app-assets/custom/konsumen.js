(function($) {
'use strict';

    if (document.getElementById('inputStatus').value == "K"){
        $("#pasangan").show();
        $("#pasangan_pekerjaan").show();
        $("#pasangan_dokumen").show();
        document.getElementById("inputNama2").disabled = false;
        document.getElementById("inputTempatLahir2").disabled = false;
        document.getElementById("inputTanggalLahir2").disabled = false;
        document.getElementById("inputPerusahaanPasangan").disabled = false;
        document.getElementById("inputAlamatPekerjaanPasangan").disabled = false;
        document.getElementById("inputJabatanPasangan").disabled = false;
        document.getElementById("inputNoTelpPekerjaanPasangan").disabled = false;
        document.getElementById("inputPenghasilanPasangan").disabled = false;
        document.getElementById("inputKTPPasangan").disabled = false;
    }
    else {
        document.getElementById("inputNama2").disabled = true;
        document.getElementById("inputTempatLahir2").disabled = true;
        document.getElementById("inputTanggalLahir2").disabled = true;
        document.getElementById("inputPerusahaanPasangan").disabled = true;
        document.getElementById("inputAlamatPekerjaanPasangan").disabled = true;
        document.getElementById("inputJabatanPasangan").disabled = true;
        document.getElementById("inputNoTelpPekerjaanPasangan").disabled = true;
        document.getElementById("inputPenghasilanPasangan").disabled = true;
        document.getElementById("inputKTPPasangan").disabled = true;
    }
    
    $('select#inputStatus').on('change', function() {
        if (document.getElementById('inputStatus').value == "K"){
            $("#pasangan").show("slow");
            $("#pasangan_pekerjaan").show("slow");
            $("#pasangan_dokumen").show("slow");
            document.getElementById("inputNama2").disabled = false;
            document.getElementById("inputTempatLahir2").disabled = false;
            document.getElementById("inputTanggalLahir2").disabled = false;
            document.getElementById("inputPerusahaanPasangan").disabled = false;
            document.getElementById("inputAlamatPekerjaanPasangan").disabled = false;
            document.getElementById("inputJabatanPasangan").disabled = false;
            document.getElementById("inputNoTelpPekerjaanPasangan").disabled = false;
            document.getElementById("inputPenghasilanPasangan").disabled = false;
            document.getElementById("inputKTPPasangan").disabled = false;
        }
        else {
            $("#pasangan").hide("slow");
            $("#pasangan_pekerjaan").hide("slow");
            $("#pasangan_dokumen").hide("slow");
            document.getElementById("inputNama2").disabled = true;
            document.getElementById("inputTempatLahir2").disabled = true;
            document.getElementById("inputTanggalLahir2").disabled = true;
            document.getElementById("inputPerusahaanPasangan").disabled = true;
            document.getElementById("inputAlamatPekerjaanPasangan").disabled = true;
            document.getElementById("inputJabatanPasangan").disabled = true;
            document.getElementById("inputNoTelpPekerjaanPasangan").disabled = true;
            document.getElementById("inputPenghasilanPasangan").disabled = true;
            document.getElementById("inputKTPPasangan").disabled = true;
        }
    });
  
})(jQuery, undefined);