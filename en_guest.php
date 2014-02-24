<!DOCTYPE html>
<html>
<head>
  <title>G&aelig;stelogin</title>
  <?php include('inc/meta.inc'); ?>
</head>
<body>

<?php include('inc/header.inc'); ?>
<div class="layout">
  <h1>G&aelig;stelogin - english version</h1>
  <div class="form--wrapper">
    <form action="logged-in.php" method="post">
      <div class="form--password-wrapper">
        <label for="username">Brugernavn</label>
        <input type="password" placeholder="Indtast dit" id="username" name="username" class="form--input" autocomplete="off" />
        <div class="form--toggle-password js-form-toggle-password" data-toggle-password="username">
          <img src="/public/eye.png" class="form--toggle-password-icon" />
          <span class="js-form-toggle-text">Vis</span>
        </div>
      </div>
      <div class="form--password-wrapper">
        <label for="password">Kode</label>
        <input type="password" placeholder="Indtast din kode" id="password" name="password" class="form--input" autocomplete="off" />
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
