(function($) {
'use strict';

    if (document.getElementById('inputStatus').value == "K"){
        $("#pasangan").show();
        $("#pasangan_pekerjaan").show();
        $("#pasangan_dokumen").show();
    }
    
    $('select#inputStatus').on('change', function() {
        if (document.getElementById('inputStatus').value == "K"){
            $("#pasangan").show("slow");
            $("#pasangan_pekerjaan").show("slow");
            $("#pasangan_dokumen").show("slow");
        }
        else {
            $("#pasangan").hide("slow");
            $("#pasangan_pekerjaan").hide("slow");
            $("#pasangan_dokumen").hide("slow");
        }
    });
  
})(jQuery, undefined);