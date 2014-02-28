<!DOCTYPE html>
<html>
<head>
  <title>G&aelig;stelogin</title>
  <?php include('inc/meta.inc'); ?>
</head>
<body>

<?php include('inc/header.inc'); ?>
<div class="layout">
  <h1>G&aelig;stelogin</h1>
  <div class="js-message"></div>
  <p class="page-content">Gæstelogin udleveres ved skranken/receptionen.</p>    
  <div class="form--wrapper">
    <form action="logged-in.php" method="post">
      <div class="form--password-wrapper">
        <label for="username">Brugernavn</label>
        <input type="password" placeholder="Indtast dit udleverede brugernavn" id="username" autofocus name="username" class="form--input" autocomplete="off" required />
      </div>
      <div class="form--password-wrapper">
        <label for="password">Kode</label>
        <input type="password" placeholder="Indtast din kode" id="password" name="password" class="form--input" autocomplete="off" required />
      </div>
      <input type="submit" class="button" value="Log ind" />
    </form>
  </div>
  <?php include('inc/footer.inc'); ?>
</div>
</body>
</html>
