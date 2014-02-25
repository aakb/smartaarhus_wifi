/**
 * Cookies
 *
 * Cookie is used for redirecting the user to the last used login
 */

// Redirect to login choice.
function redirectToLogin() {
  if ($.cookie('cookie_redirect') != undefined) {
    window.location.replace($.cookie('cookie_redirect') + window.location.search);
  }
}

function checkLoginSaved() {
  var savedLoginLink = $('.js-footer-saved-login');

  if ($.cookie('cookie_redirect') != undefined) {
    savedLoginLink.show();
  } else {
    savedLoginLink.hide();
  }

}

// Save login choice.
function saveLoginChoice(text) {
  $.cookie('cookie_redirect', window.location.pathname, { expires: 30, path: '/' });

  $('.js-cookie-message-saved').text(text);
}

// Delete login choice.
function deleteLoginChoice(text) {
  $.removeCookie('cookie_redirect', { path: '/' });

  $('.js-cookie-message-not-saved').text(text);
}

// Delete all cookies choice.
function deleteAllCookies(selector, text) {
  $.removeCookie('cookie_redirect', { path: '/' });
  $.removeCookie('cookie_hide_message', { path: '/' });

  if(selector) $(selector).text(text);
}

// Show a message if the user is redirected
function cookieMessage() {
  var cookieMessage = $('.js-cookie-message');
  var cookieMessageSaved = $('.js-cookie-message-saved');
  var cookieLoginMessageNotsaved = $('.js-cookie-message-not-saved');

  if ($.cookie('cookie_redirect') != undefined) {
    cookieMessageSaved.hide();
    cookieLoginMessageNotsaved.show();
  } else {
    cookieMessageSaved.show();
    cookieLoginMessageNotsaved.hide();
  }

  // Show the message container
  if ($.cookie('cookie_hide_message') != 1) {
    // Show the message.
    cookieMessage.show();
  }

  // Attach hide message function to link
  $('.js-hide-message').click(function() {
    $.cookie('cookie_hide_message', 1, { expires: 30, path: '/' });

    cookieMessage.hide();
    return false;
  });
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
  var language = $.cookie('tidyLanguage') == 'en' ? 'en' : 'da';
  
  var translations = {
    da : {
      toogleText : { hide : 'Skjul', show : 'Vis' },
      saveLoginChoice : 'Dit loginvalg er gemt',
      deleteLoginChoice : 'Dit loginvalg er slettet',
      deleteAllCookies : 'Cookies blev slettet'
    },
    en : {
      toogleText : { hide : 'Hide',  show : 'Show' },
      saveLoginChoice : 'Your login choice are saved',
      deleteLoginChoice : 'Your login choice are deleted',
      deleteAllCookies : 'Cookies deleted'
    }
  };
  
  // Show/hide password.
  showHidePassword(translations[language].toogleText);

  // Check if the user has saved login.
  checkLoginSaved();

  // Handle login-choice
  if ( $('.js-cookie-message') ) {
    cookieMessage();

    // Save login choice.
    $('.js-save-login-choice').click(function() {
      saveLoginChoice(translations[language].saveLoginChoice);
      return false;
    });

    // Delete login choice.
    $('.js-delete-login-choice').click(function() {
      deleteLoginChoice(translations[language].deleteLoginChoice);
      return false;
    });
  }

  // Handle link on cookies-page.
  $('.js-delete-cookies-link').click(function() {
    deleteAllCookies('.js-delete-cookies', translations[language].deleteAllCookies );
    return false;
  });

  // Handle link in footer.
  $('.js-footer-saved-login').click(function() {
    deleteAllCookies();
    window.location.reload();
    return false;
  });
  
  // Handle toplink
  $('.js-toplink').click(function() {
    //deleteAllCookies();
    window.location.replace('/auth/method/' + window.location.search);
    return false;
  });

});
