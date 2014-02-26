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
      deleteAllCookies : 'Cookies blev slettet'
    },
    en : {
      toogleText : { hide : 'Hide',  show : 'Show' },
      deleteAllCookies : 'Cookies deleted'
    }
  };

  // Show/hide password.
  showHidePassword(translations[language].toogleText);

  // Check if the user has saved login.
  checkLoginChoice();

  // Save login choice.
  $('.js-save-login-choice').click(function() {
    $.cookie('cookie_redirect', window.location.pathname, { expires: 30, path: '/' });

    checkLoginChoice();
    return false;
  });

  // Delete login choice.
  $('.js-delete-login-choice').click(function() {
    $.removeCookie('cookie_redirect', { path: '/' });

    checkLoginChoice();
    return false;
  });

  // Handle link on cookies-page.
  $('.js-delete-cookies-link').click(function() {
    $.removeCookie('cookie_redirect', { path: '/' });

    $('.js-delete-cookies').text(translations[language].deleteAllCookies);
    return false;
  });

  // Handle toplink
  $('.js-toplink').click(function() {
    window.location.replace('/auth/method/' + window.location.search);
    return false;
  });

});
