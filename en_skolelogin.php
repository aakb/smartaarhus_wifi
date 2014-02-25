<!DOCTYPE html>
<html>
<head>
  <title>School login - english version</title>
  <?php include('inc/meta.inc'); ?>
</head>
<body>

<?php include('inc/header.inc'); ?>
<div class="layout">
  <h1>School login</h1>
  <div class="form--wrapper">
    <form action="logged-in.php" method="post">
      <label for="username">Username</label>
      <input type="text" placeholder="Enter username" id="username" name="username" class="form--input" autocomplete="off" required />
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
