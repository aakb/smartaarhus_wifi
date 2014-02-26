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
  var saveLogin = $('.js-save-login-choice');
  var deleteLogin = $('.js-delete-login-choice');

  // Check if the cookie exists.
  if ($.cookie('cookie_redirect') !== undefined ) {
    saveLogin.removeClass('is-visible');
    deleteLogin.toggleClass('is-visible');
  } else {
    saveLogin.toggleClass('is-visible');
    deleteLogin.removeClass('is-visible');
  }
}

/**
 * Function for show/hide password in input fields
 */

function showHidePassword(toggleText) {
  // Attach toggle password function.
  // URL: https://github.com/cloudfour/hideShowPassword.

  // Handle IE 8 in a simple way - we can't do this hide/show-thing.
  if ( document.documentMode < 9 ) {
    return;
  }

  $('input[type="password"]').hideShowPassword({
      show: false,
      innerToggle: true,
      toggleClass: 'form--toggle-password',
      states: {
         shown: { toggleText: toggleText.hide },
         hidden: { toggleText: toggleText.show }
      }
  });
}

function useOtherSubmitUrl(errorTextMissingValues, buttonLoadingText) {

  // Activate only on pages with js-message class
  if (!$('.js-message').length) {
    return;
  }

  $('form').submit(function(event) {

    // Stop form from submitting normally
    event.preventDefault();

    var postdata = $(this).serializeArray();
    var url = $(this).attr('action').replace('/action/', '/=/logon/');
    var button = $('.button', this);
    var buttonDefaultText = button.val();

    // Disable button on submit.
    button.prop('disabled', true);
    button.val(buttonLoadingText);

     // Send the data using post.
    $.post(url, postdata, 'json').done(function(respdata) {
      if (respdata.authenticated && respdata.redirect) {
         window.location.replace(respdata.redirect);
      }
    }).fail(function(respdata) {
      var text = respdata.responseJSON.message ? respdata.responseJSON.message : errorTextMissingValues;
      $('.js-message').html(text).addClass('message--error');
    }).always(function() {
      // Enable button on submit.
      button.prop('disabled', false);
      button.val(buttonDefaultText);
    });
  });
}


/**
 * Start the magic.
 */

$(document).ready(function() {
  // Add h5Validate to forms.
  // http://ericleads.com/h5validate/
  $('form').h5Validate();

  // Get the sites language from global template.
  // update Global variable.
  var language = $.cookie('tidyLanguage') === 'en' ? 'en' : 'da';

  var translations = {
    da : {
      toogleText : { hide : 'Skjul', show : 'Vis' },
      deleteAllCookies : 'Cookies blev slettet',
      loginSaved : 'Du vil blive viderestillet til denne side næste gang du logger ind.',
      loginDeleted : 'Dit valg er slettet.',
      missingValues : 'Udfyld venligst begge felter.',
      buttonLoadingText : 'Logger ind...'
    },
    en : {
      toogleText : { hide : 'Hide',  show : 'Show' },
      deleteAllCookies : 'Cookies deleted',
      loginSaved : 'You will be redirected to this page the next time you login.',
      loginDeleted : 'Your choice is removed.',
      missingValues : 'Please enter username and password.',
      buttonLoadingText : 'Logging in...'
    }
  };

  // Show/hide password.
  showHidePassword(translations[language].toogleText);

  // Check if the user has saved login.
  checkLoginChoice();

  // Save login choice.
  $('.js-save-login-choice').click(function() {
    $.cookie('cookie_redirect', window.location.pathname, { expires: 30, path: '/' });

    $('.js-message').html(translations[language].loginSaved).addClass('message--success').show();

    $('.js-message').delay(5000).fadeOut();

    checkLoginChoice();
    return false;
  });

  // Delete login choice.
  $('.js-delete-login-choice').click(function() {
    $.removeCookie('cookie_redirect', { path: '/' });

    $('.js-message').html(translations[language].loginDeleted).addClass('message--success').show();

    $('.js-message').delay(5000).fadeOut();

    checkLoginChoice();
    return false;
  });

  // Handle toplink
  $('.js-toplink').click(function() {
    history.back(1);
    return false;
  });

  // Handle submit via alternativ channel.
  useOtherSubmitUrl(translations[language].missingValues, translations[language].buttonLoadingText);

  // Hide nemid-login where java not available.
  if (!navigator.javaEnabled()) {
    $('.js-javaenabled').hide();
  }

});
