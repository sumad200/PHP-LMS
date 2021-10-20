$("#role-select").change(function() {
  if ($(this).val() == "File Upload") {
    $('#pc-cont').show();
    $('#upload').attr('required', '');
    $('#web-link').hide();
$('#webm-url').removeAttr('required');
  }
  else {
   $('#pc-cont').hide();
   $('#web-link').show(); 
    $('#webm-url').attr('required','');
    $('#upload').Removeattr('required', '');
  }
});
$("#role-select").trigger("change");