(function($) {
  'use strict';
  $(document).ready(function() {
    $('#billing_email').on('blur', function() {
      const email = $(this).val().trim();
      if (email.indexOf('@') > 0 && typeof WACIR_Data !== 'undefined') {
        $.post(WACIR_Data.ajax_url, {
          action: 'wacir_capture_email',
          email: email,
          nonce: WACIR_Data.nonce
        });
      }
    });
  });
})(jQuery);
