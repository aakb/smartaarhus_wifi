<!DOCTYPE html>
<html>
<head>
  <title>Library login - english version</title>
  <?php include('inc/meta.inc'); ?>
</head>
<body>

<?php include('inc/header.inc'); ?>
<div class="layout">
  <h1>Library login</h1>
  <div class="form--wrapper">
    <form action="logged-in.php" method="post">
      <div class="form--password-wrapper">
        <label for="username">Borrower ID / CPR number</label>
        <input type="password" placeholder="Enter your borrower ID or CPR number" id="username" name="username" class="form--input" autocomplete="off" required />
      </div>
      <div class="form--password-wrapper">
        <label for="password">Pincode</label>
        <input type="password" placeholder="Enter your pincode" id="password" name="password" class="form--input" autocomplete="off" required />
      </div>
      <input type="submit" class="button" value="Log ind" />
    </form>
  </div>
  <?php include('inc/en_footer.inc'); ?>
</div>
</body>
</html>
