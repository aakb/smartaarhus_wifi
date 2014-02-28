<!DOCTYPE html>
<html>
<head>
  <title>Employee login</title>
  <?php include('inc/meta.inc'); ?>
</head>
<body>

<?php include('inc/header.inc'); ?>
<div class="layout">
  <h1>Employee login<span class="saved-login--link js-save-login-choice js-login-choice">(<a href="#">Remember my choice</a>)</span><span class="saved-login--link js-delete-login-choice">(<a href="#">Forget my choice</a>)</span></h1>
  <div class="js-message"></div>  
  <div class="js-save-login-message"></div>
  <div class="form--wrapper">
    <form action="logged-in.php" method="post">
      <label for="username">AZ-ident</label>
      <input type="text" placeholder="Enter AZ-ident" id="username" autofocus name="username" class="form--input" autocomplete="off" required />
      <div class="form--password-wrapper">
        <label for="password">Password</label>
        <input type="password" placeholder="Enter password" id="password" name="password" class="form--input" autocomplete="off" required />
      </div>
      <input type="submit" class="button" value="Log ind" />
    </form>
  </div>
  <?php include('inc/en_footer.inc'); ?>
</div>
</body>
</html>
