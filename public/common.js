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
function saveLoginChoice() {
  $.cookie('cookie_redirect', window.location.pathname, { expires: 30, path: '/' });

  $('.js-cookie-message-saved').text('Dit loginvalg er gemt');
}

// Delete login choice.
function deleteLoginChoice() {
  $.removeCookie('cookie_redirect', { path: '/' });

  $('.js-cookie-message-not-saved').text('Dit loginvalg er slettet');
}

// Delete all cookies choice.
function deleteAllCookies(messageObj) {
  $.removeCookie('cookie_redirect', { path: '/' });
  $.removeCookie('cookie_hide_message', { path: '/' });

  if(messageObj) messageObj.text('Cookies blev slettet');
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

function showHidePassword() {
  // Attach toggle password function.
  // URL: https://github.com/cloudfour/hideShowPassword.

  $('input[type="password"]').hideShowPassword({
      show: false,
      innerToggle: true,
      toggleClass: 'form--toggle-password',
      states: {
         shown: {
            toggleText: 'Skjul'
          },
          hidden: {
            toggleText: 'Vis'
          }
      }
  });
  

}


/**
 * Start the magic.
 */

$(document).ready(function() {

  // Show/hide password.
  showHidePassword();

  // Check if the user has saved login
  checkLoginSaved();

  // Handle login-choice
  if ( $('.js-cookie-message') ) {
    cookieMessage();

    // Save login choice
    $('.js-save-login-choice').click(function() {
      saveLoginChoice();
      return false;
    });

    // Delete login choice
    $('.js-delete-login-choice').click(function() {
      deleteLoginChoice();
      return false;
    });
  }

  // Handle delete-cookies-link
  $('.js-delete-cookies-link').click(function() {
    deleteAllCookies($('.js-delete-cookies'));
    return false;
  });

  $('.js-footer-saved-login').click(function() {
    deleteAllCookies();
    return false;
  });

});
