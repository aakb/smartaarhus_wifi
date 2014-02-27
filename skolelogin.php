<!DOCTYPE html>
<html>
<head>
  <title>Skolelogin</title>
  <?php include('inc/meta.inc'); ?>
</head>
<body>

<?php include('inc/header.inc'); ?>
<div class="layout">
  <h1>Skolelogin</h1>
  <div class="js-message"></div>
  <div class="form--wrapper">
    <form action="logged-in.php" method="post">
      <label for="username">Brugernavn</label>
      <input type="text" placeholder="Indtast dit brugernavn" id="username" name="username" class="form--input" autocomplete="off" required>
      <div class="form--password-wrapper">
        <label for="password">Kodeord</label>
        <input type="password" placeholder="Indtast dit kodeord" id="password" name="password" class="form--input" autocomplete="off" required>
      </div>
      <input type="submit" class="button" value="Log ind">
    </form>
  </div>
  <?php include('inc/footer.inc'); ?>
</div>
</body>
</html>
