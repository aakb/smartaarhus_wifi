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
    <form action="logged-in.php" method="post">
      <label for="username">Mobilnummer</label>    
      <input type="text" value="%TIDY[sms_number]" disabled="disabled" class="form--input" autocomplete="off"  />      
      <div class="form--password-wrapper">
        <label for="password">Enter code</label>
        <input type="password" placeholder="Enter code from SMS" id="password" name="password" class="form--input" autocomplete="off" />
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
