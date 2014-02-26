<!DOCTYPE html>
<html>
<head>
  <title>Medarbejderlogin</title>
  <?php include('inc/meta.inc'); ?>
</head>
<body>

<?php include('inc/header.inc'); ?>
<div class="layout">
  <h1>Medarbejderlogin<span class="saved-login--link js-save-login-choice">(<a href="#">Husk mit valg</a>)</span><span class="saved-login--link js-delete-login-choice">(<a href="#">Glem mit valg</a>)</span></h1>
  <div class="form--wrapper">
    <form action="logged-in.php" method="post">
      <label for="username">AZ-ident</label>
      <input type="text" placeholder="Indtast dit AZ-ident" id="username" name="username" class="form--input" autocomplete="off" required>
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
