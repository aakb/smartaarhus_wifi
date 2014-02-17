<!DOCTYPE html>
<html>
<head>
  <title>Bibliotekslogin</title>
  <?php include('inc/meta.inc'); ?>
</head>

<?php include('inc/header.inc'); ?>
<div class="layout">
  <h1>Bibliotekslogin</h1>
  <div class="form--wrapper">
    <form action="logged-in.php" method="post">
      <div class="form--password-wrapper">
        <label for="loan-number">Lånernummer / CPR-nummer</label>
        <input type="password" placeholder="Indtast dit lånernummer fra dit lånerkort" id="loan-number" name="username" class="form--input">
        <div class="form--toggle-password js-form-toggle-password" data-toggle-password="loan-number">
          <img src="/public/eye.png" class="form--toggle-password-icon">
          <span class="js-form-toggle-text">Vis</span>
        </div>
      </div>
      <div class="form--password-wrapper">
        <label for="pincode">Pinkode</label>
        <input type="password" placeholder="Indtast din pinkode" id="pincode" name="password" class="form--input">
        <div class="form--toggle-password js-form-toggle-password" data-toggle-password="pincode">
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
