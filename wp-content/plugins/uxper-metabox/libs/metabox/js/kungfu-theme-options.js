jQuery(document).ready(function($) {
  "use strict";

  var theme_options_form = $('#uxper-theme-options-form');

  theme_options_form.on('click', 'button[type="submit"]', function() {
  	theme_options_form.find('input[name="form_action"]').val($(this).val());
  })

  theme_options_form.submit(function() {
    var values = $(this).serialize();
    $.ajax({
      type: "POST",
      url: ajaxurl,
      data: values,
      success: function(data) {
        window.alert('Save Options Successfully');
      }
    });

    return false;
  });
});
