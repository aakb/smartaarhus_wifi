<!DOCTYPE html>
<html>
<head>
  <title>Medarbejderlogin</title>
  <?php include('inc/meta.inc'); ?>
  <script type="text/javascript">
    $(document).ready(function() {
      cookieMessage();

      // Save login choice
      $('.js-save-login-choice').click(function() {
        saveLoginChoice();
      });

      // Delete login choice
      $('.js-delete-login-choice').click(function() {
        deleteLoginChoice();
      });
    });
  </script>
</head>

<?php include('inc/header.inc'); ?>
<div class="layout">
  <h1>Medarbejderlogin</h1>
  <div class="message--cookie js-cookie-message">
    <p class="message--cookie-saved js-cookie-message-saved">Vil du viderestilles til dette login næste gang du skal logge ind? <a href="#" class="js-save-login-choice">Ja tak, gem mit loginvalg</a></p>
    <p class="message--cookie-not-saved js-cookie-message-not-saved">Du har gemt dette som dit login valg. <a href="#" class="js-delete-login-choice">Slet mit loginvalg</a></p>
    <a href="#" class="js-hide-message">Vis ikke denne besked igen</a>
  </div>
  <div class="form--wrapper">
    <form action="logged-in.php">
      <label for="username">AZ-ident</label>
      <input type="text" placeholder="Indtast dit brugernavn" id="username" class="form--input" autocomplete="off">
      <div class="form--password-wrapper">
        <label for="password">Kodeord</label>
        <input type="password" placeholder="Indtast dit kodeord" id="password" class="form--input">
        <div class="form--toggle-password js-form-toggle-password" data-toggle-password="password">
          <img src="/public/eye.png" class="form--toggle-password-icon">
          <span class="js-form-toggle-text">Vis</span>
        </div>
      </div>
      <input type="submit" class="button" value="Log ind">
    </form>
  </div>
  <?php include('inc/footer.inc'); ?>
</div>
</body>
</html>
