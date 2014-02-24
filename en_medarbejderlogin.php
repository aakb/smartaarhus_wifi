<!DOCTYPE html>
<html>
<head>
  <title>Medarbejderlogin - english version</title>
  <?php include('inc/meta.inc'); ?>
</head>
<body>

<?php include('inc/header.inc'); ?>
<div class="layout">
  <h1>Medarbejderlogin - english version</h1>
  <div class="message--cookie js-cookie-message">
    <p class="message--cookie-saved js-cookie-message-saved">Vil du viderestilles til dette login næste gang du skal logge ind? <a href="#" class="js-save-login-choice">Ja tak, gem mit loginvalg</a></p>
    <p class="message--cookie-not-saved js-cookie-message-not-saved">Du har gemt dette som dit loginvalg. <a href="#" class="js-delete-login-choice">Slet loginvalg</a></p>
    <a href="#" class="js-hide-message">Vis ikke denne besked igen</a>
  </div>
  <div class="form--wrapper">
    <form action="logged-in.php" method="post">
      <label for="username">AZ-ident</label>
      <input type="text" placeholder="Enter AZ-ident" id="username" name="username" class="form--input" autocomplete="off" required />
      <div class="form--password-wrapper">
        <label for="password">Password</label>
        <input type="password" placeholder="Enter password" id="password" name="password" class="form--input" autocomplete="off" required />
        <div class="form--toggle-password js-form-toggle-password" data-toggle-password="password">
          <img src="/public/eye.png" class="form--toggle-password-icon" />
          <span class="js-form-toggle-text">Vis</span>
        </div>
      </div>
      <input type="submit" class="button" value="Log ind" />
    </form>
  </div>
  <?php include('inc/en_footer.inc'); ?>
</div>
</body>
</html>
