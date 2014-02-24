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
  <div class="form--wrapper">
    <form action="logged-in.php" method="post">
      <div class="form--password-wrapper">
        <label for="username">Lånerkortnummer / CPR-nummer</label>
        <input type="password" placeholder="Indtast dit lånerkortnummer eller CPR-nummer" id="username" name="username" class="form--input" autocomplete="off" />
        <!--<div class="form--toggle-password js-form-toggle-password" data-toggle-password="username">
          <img src="/public/eye.png" class="form--toggle-password-icon" />
          <span class="js-form-toggle-text">Vis</span>
        </div>-->
      </div>
      <div class="form--password-wrapper">
        <label for="password">Pinkode</label>
        <input type="password" placeholder="Indtast din pinkode" id="password" name="password" class="form--input" autocomplete="off" />
        <!--<div class="form--toggle-password js-form-toggle-password" data-toggle-password="password">
          <img src="/public/eye.png" class="form--toggle-password-icon" />
          <span class="js-form-toggle-text">Vis</span>
        </div>-->
      </div>
      <input type="submit" class="button" value="Log ind" />
    </form>
  </div>
  <?php include('inc/footer.inc'); ?>
</div>
</body>
</html>
