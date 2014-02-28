<!DOCTYPE html>
<html>
<head>
  <title>Bibliotekslogin</title>
  <?php include('inc/meta.inc'); ?>
</head>
<body>

<?php include('inc/header.inc'); ?>
<div class="layout">
  <h1>Bibliotekslogin</h1>
  <div class="js-message"></div>  
  <div class="form--wrapper">
    <form action="logged-in.php" method="post">
      <div class="form--password-wrapper">
        <label for="username">Lånerkortnummer / CPR-nummer</label>
        <input type="password" placeholder="Indtast dit lånerkort- eller CPR-nummer" id="username" autofocus name="username" class="form--input" autocomplete="off" required>
      </div>
      <div class="form--password-wrapper">
        <label for="password">Pinkode</label>
        <input type="password" placeholder="Indtast din pinkode" id="password" name="password" class="form--input" autocomplete="off" required>
      </div>
      <input type="submit" class="button" value="Log ind" />
    </form>
  </div>
  <?php include('inc/footer.inc'); ?>
</div>
</body>
</html>
