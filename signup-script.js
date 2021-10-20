$("#role-select").change(function() {
  if ($(this).val() == "Instructor") {
    $('#pc-cont').show();
    $('#passcode').attr('required', '');
    $('#passcode').attr('data-error', 'Access Code is mandatory');
  }else {
    $('#pc-cont').hide();
    $('#passcode').removeAttr('required');
    $('#passcode').removeAttr('data-error');
  }
});
$("#role-select").trigger("change");


