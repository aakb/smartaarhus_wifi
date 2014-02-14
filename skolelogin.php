<!DOCTYPE html>
<html>
<head>
  <title>Skolelogin</title>
  <?php include('inc/meta.inc'); ?>
</head>

<?php include('inc/header.inc'); ?>
<div class="layout">
  <h1>Skolelogin</h1>
  <div class="form--wrapper">
    <form action="logged-in.php">
      <label for="username">Brugernavn</label>
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
