<!DOCTYPE html>
<html>
<head>
  <title>SMS login - english version</title>
  <?php include('inc/meta.inc'); ?>
</head>
<body>

<?php include('inc/header.inc'); ?>
<div class="layout">
  <h1>SMS login</h1>
  <p class="page-content">Enter your mobile number and you will receive a text message containing a one-time code.</p>
  <div class="form--wrapper">
    <form action="sms-login.php" method="post">
      <label for="username">Mobilnummer</label>
      <input type="number" placeholder="Enter your mobile number" id="username" name="username" class="form--input" autocomplete="off" required />
      <input type="submit" class="button" value="Send SMS" />
    </form>
  </div>
  <?php include('inc/en_footer.inc'); ?>
</div>
</body>
</html>
