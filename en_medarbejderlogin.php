<!DOCTYPE html>
<html>
<head>
  <title>Employee login - english version</title>
  <?php include('inc/meta.inc'); ?>
</head>
<body>

<?php include('inc/header.inc'); ?>
<div class="layout">
  <h1>Employee login - english version</h1>
  <div class="message--cookie js-cookie-message">
    <p class="message--cookie-saved js-cookie-message-saved">Do you wish to be forwarded to this page the next time you log in? <a href="#" class="js-save-login-choice">Yes, please save my login choice</a></p>
    <p class="message--cookie-not-saved js-cookie-message-not-saved">Your login choice has been saved. <a href="#" class="js-delete-login-choice">Delete login choice</a></p>
    <a href="#" class="js-hide-message">Do not show this message again</a>
  </div>
  <div class="form--wrapper">
    <form action="logged-in.php" method="post">
      <label for="username">AZ-ident</label>
      <input type="text" placeholder="Enter AZ-ident" id="username" name="username" class="form--input" autocomplete="off" required />
      <div class="form--password-wrapper">
        <label for="password">Password</label>
        <input type="password" placeholder="Enter password" id="password" name="password" class="form--input" autocomplete="off" required />
      </div>
      <input type="submit" class="button" value="Log ind" />
    </form>
  </div>
  <?php include('inc/en_footer.inc'); ?>
</div>
</body>
</html>
