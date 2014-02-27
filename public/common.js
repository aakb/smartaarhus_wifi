/**
 * Cookies
 *
 * Cookie is used for redirecting the user to the last used login
 */

// Redirect to login choice.
function redirectToLogin() {
  if ($.cookie('cookie_redirect') !== undefined) {
    window.location.replace($.cookie('cookie_redirect') + window.location.search);
  }
}

// Check if the user has saved a login choice.
function checkLoginChoice() {

  // Check cookie.
  var cookieExists = $.cookie('cookie_redirect') !== undefined;

  // Show the correct box.
  $('.js-delete-login-choice').toggleClass('is-visible', cookieExists);
  $('.js-save-login-choice').toggleClass('is-visible', !cookieExists);

}

/**
 * Function for show/hide password in input fields
 */

function showHidePassword() {
  // Attach toggle password function.
  // URL: https://github.com/cloudfour/hideShowPassword.

  // Handle IE 8 in a simple way - we can't do this hide/show-thing.
  if (document.documentMode < 9) {
    return;
  }

  $('input[type="password"]').hideShowPassword({
      show: false,
      innerToggle: true,
      toggleClass: 'form--toggle-password',
      states: {
         shown: { toggleText: translationStrings.toogleText.hide },
         hidden: { toggleText: translationStrings.toogleText.show }
      }
  });
}

/**
 * Function for show/hide message for login choice.
 */
function showLoginMessage(text) {
  $('.js-save-login-message')
    .html(text)
    .addClass('message--success')
    .show()
    .delay(5000)
    .fadeOut(500);
}

function useOtherSubmitUrl() {

  $('form').submit(function(event) {

    // Stop form from submitting normally
    event.preventDefault();

    // Save the form
    var form = $(this);

    // The action are composed from the existing action-url.
    var url = form.attr('action').replace('/action/', '/=/logon/');

    // Serialize data.
    var postdata = form.serializeArray();

    var button = $('.button', form);
    var buttonDefaultText = button.val();

    // Disable button on submit.
    button.prop('disabled', true);
    button.val(translationStrings.buttonLoadingText);

     // Send the data using post.
    $.post(url, postdata, 'json').done(function(data) {
      // Success - do the redirect.
      if (data.authenticated && data.redirect) {
         window.location.replace(data.redirect);
      }
    }).fail(function(jqXHR) {
      // Fail - show errortext if valid.
      var text = jqXHR.responseJSON.message ? jqXHR.responseJSON.message : translationStrings.missingValues;
      $('.js-message').html(text).addClass('message--error');
    }).always(function() {

      // Enable button after submit.
      button.prop('disabled', false);
      button.val(buttonDefaultText);

      // Set focus on first input-element.
      $('#username').focus();
    });
  });
}

var translationsStrings = {};

/**
 * Start the magic.
 */

$(document).ready(function() {
  // Add h5Validate to forms.
  // http://ericleads.com/h5validate/
  $('form').h5Validate();

  // Get the sites language from global template and update global variable.
  translationStrings = $.cookie('tidyLanguage') === 'en' ?
    {
      toogleText : { hide : 'Hide',  show : 'Show' },
      deleteAllCookies : 'Cookies deleted',
      loginSaved : 'You will be redirected to this page the next time you login.',
      loginDeleted : 'You will no longer be redirected to this page.',
      missingValues : 'Please enter username and password.',
      buttonLoadingText : 'Logging in...'
    } :
    {
      toogleText : { hide : 'Skjul', show : 'Vis' },
      deleteAllCookies : 'Cookies blev slettet',
      loginSaved : 'Du vil blive viderestillet til denne side næste gang du logger ind.',
      loginDeleted : 'Du vil ikke længere blive viderestillet til denne side.',
      missingValues : 'Udfyld venligst begge felter.',
      buttonLoadingText : 'Logger ind...'
    };

  // Show/hide password.
  showHidePassword();

  // Check if the user has saved login.
  checkLoginChoice();

  // Save login choice.
  $('.js-save-login-choice').click(function() {
    $.cookie('cookie_redirect', window.location.pathname, { expires: 30, path: '/' });
    checkLoginChoice();
    showLoginMessage(translationStrings.loginSaved);
    return false;
  });

  // Delete login choice.
  $('.js-delete-login-choice').click(function() {
    $.removeCookie('cookie_redirect', { path: '/' });
    checkLoginChoice();
    showLoginMessage(translationStrings.loginDeleted);
    return false;
  });

  console.log(history.length);

  // Handle toplink
  if (history.length == 1) {
    $('body').addClass('back-link-hidden');
  } else {
    $('.js-toplink').click(function() {
      history.back(1);
      return false;
    });
  }

  // Handle submit via alternativ channel but only if page has js-message class.
  if ($('.js-message').length) {
    useOtherSubmitUrl();
  }

  // Hide nemid-login where java not available. Not usable on some mobile devices.
  if (!navigator.javaEnabled()) {
    $('.js-javaenabled').hide();
  }

});
