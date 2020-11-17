(function($) {
'use strict';

    function readImageSTNK(input) {
        if (input.files && input.files[0]) {
           var reader = new FileReader();
      
           reader.onload = function (e) {
               $('#uploadSTNK').attr('src', e.target.result);
           }
      
           reader.readAsDataURL(input.files[0]);
        }
     }
     function readImageBPKBBelakang(input) {
        if (input.files && input.files[0]) {
           var reader = new FileReader();
      
           reader.onload = function (e) {
               $('#uploadBPKBBelakang').attr('src', e.target.result);
           }
      
           reader.readAsDataURL(input.files[0]);
        }
     }
     function readImageBPKBDepan(input) {
        if (input.files && input.files[0]) {
           var reader = new FileReader();
      
           reader.onload = function (e) {
               $('#uploadBPKBDepan').attr('src', e.target.result);
           }
      
           reader.readAsDataURL(input.files[0]);
        }
     }
     function readImageSelfie(input) {
        if (input.files && input.files[0]) {
           var reader = new FileReader();
      
           reader.onload = function (e) {
               $('#uploadSelfie').attr('src', e.target.result);
           }
      
           reader.readAsDataURL(input.files[0]);
        }
     }
     function readImageKwitansiJualBeli(input) {
        if (input.files && input.files[0]) {
           var reader = new FileReader();
      
           reader.onload = function (e) {
               $('#uploadKwitansiJualBeli').attr('src', e.target.result);
           }
      
           reader.readAsDataURL(input.files[0]);
        }
     }
     function readImageNoRangka(input) {
        if (input.files && input.files[0]) {
           var reader = new FileReader();
      
           reader.onload = function (e) {
               $('#uploadNoRangka').attr('src', e.target.result);
           }
      
           reader.readAsDataURL(input.files[0]);
        }
     }
     function readImageNoMesin(input) {
        if (input.files && input.files[0]) {
           var reader = new FileReader();
      
           reader.onload = function (e) {
               $('#uploadNoMesin').attr('src', e.target.result);
           }
      
           reader.readAsDataURL(input.files[0]);
        }
     }
     function readImageMotorDepan(input) {
        if (input.files && input.files[0]) {
           var reader = new FileReader();
      
           reader.onload = function (e) {
               $('#uploadMotorDepan').attr('src', e.target.result);
           }
      
           reader.readAsDataURL(input.files[0]);
        }
     }
     function readImageMotorBelakang(input) {
        if (input.files && input.files[0]) {
           var reader = new FileReader();
      
           reader.onload = function (e) {
               $('#uploadMotorBelakang').attr('src', e.target.result);
           }
      
           reader.readAsDataURL(input.files[0]);
        }
     }
     function readImageMotorKanan(input) {
        if (input.files && input.files[0]) {
           var reader = new FileReader();
      
           reader.onload = function (e) {
               $('#uploadMotorKanan').attr('src', e.target.result);
           }
      
           reader.readAsDataURL(input.files[0]);
        }
     }
     function readImageMotorKiri(input) {
        if (input.files && input.files[0]) {
           var reader = new FileReader();
      
           reader.onload = function (e) {
               $('#uploadMotorKiri').attr('src', e.target.result);
           }
      
           reader.readAsDataURL(input.files[0]);
        }
     }
     $("#inputSTNK").change(function(){
        readImageSTNK(this);
     });
     $("#inputBPKBBelakang").change(function(){
        readImageBPKBBelakang(this);
     });
     $("#inputBPKBDepan").change(function(){
        readImageBPKBDepan(this);
     });
     $("#inputSelfie").change(function(){
        readImageSelfie(this);
     });
     $("#inputKwitansiJualBeli").change(function(){
        readImageKwitansiJualBeli(this);
     });
     $("#inputNoRangka").change(function(){
        readImageNoRangka(this);
     });
     $("#inputNoMesin").change(function(){
        readImageNoMesin(this);
     });
     $("#inputMotorDepan").change(function(){
        readImageMotorDepan(this);
     });
     $("#inputMotorBelakang").change(function(){
        readImageMotorBelakang(this);
     });
     $("#inputMotorKanan").change(function(){
        readImageMotorKanan(this);
     });
     $("#inputMotorKiri").change(function(){
        readImageMotorKiri(this);
     });
  
})(jQuery, undefined);