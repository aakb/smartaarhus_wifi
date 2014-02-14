/**
 * Cookies
 *
 * Cookie is used for redirecting the user to the last used login
 */


// Redirect to login choice.
function redirectToLogin() {
  if ($.cookie('cookie_redirect') != undefined) {
    window.location.replace($.cookie('cookie_redirect'));
  }
}

function checkLoginSaved() {
  var savedLoginLink = $('.js-footer-saved-login');

  if ($.cookie('cookie_redirect') != undefined) {
    savedLoginLink.show();
  } else {
    savedLoginLink.hide();
  }

  savedLoginLink.click(function() {
    deleteAllCookies();
  });
}

// Save login choice.
function saveLoginChoice() {
  $.cookie('cookie_redirect', window.location.pathname, { expires: 30 });

  $('.js-cookie-message-saved').text('Dit loginvalg er gemt');
}

// Delete login choice.
function deleteLoginChoice() {
  $.cookie('cookie_redirect', '', { expires: -1 });

  $('.js-cookie-message-not-saved').text('Dit loginvalg er slettet');
}

// Delete all cookies choice.
function deleteAllCookies(message) {
  $.cookie('cookie_redirect', '', { expires: -1 });
  $.cookie('cookie_hide_message', '', { expires: -1 });

  message.text('Cookies blev slettet');
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
    $.cookie('cookie_hide_message', 1, { expires: 30 });

    cookieMessage.hide();
  });
}



/**
 * Function for show/hide password in input fields
 */

function showHidePassword() {
  // Attach toggle password function.
  // URL: https://github.com/cloudfour/hideShowPassword.

  var togglePassword = $('.js-form-toggle-password');
  var togglePasswordText = $('.js-form-toggle-text', togglePassword);
  var passwordInput = $('#' + togglePassword.attr('data-toggle-password'));

  togglePassword.click(function() {
    // Get element from data attribute and attach togglePassword function.
    passwordInput.togglePassword();
  });

  // Change text.
  $(passwordInput).on('passwordShown', function () {
    togglePasswordText.text('Skjul');

  }).on('passwordHidden', function () {
    togglePasswordText.text('Vis');
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
});
