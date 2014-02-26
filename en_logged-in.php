<!DOCTYPE html>
<html>
<head>
  <title>Logged in - english version</title>
  <?php include('inc/meta.inc'); ?>
</head>
<body>

<?php include('inc/header.inc'); ?>
<div class="layout">
  <h1>Your are now online</h1>
  <p>This session expires %TIDY[expire_time], after that time you will be asked to re-authenticate.</p>

%TIDY_DEP[redirect] %TIDY_IFDEF[intercept_uri]  <div class="message--success">
%TIDY_DEP[redirect] %TIDY_IFDEF[intercept_uri]    <p>You will be forwarded to your original destination in five seconds.</p>
%TIDY_DEP[redirect] %TIDY_IFDEF[intercept_uri]    <p><a href="%TIDY[intercept_uri]">%TIDY[intercept_uri_nice]</a></p>
%TIDY_DEP[redirect] %TIDY_IFDEF[intercept_uri]  </div>

  <h3>Security on the network</h3>
  <p>Please read this before you start using the wireless network This is an open network - It is possible for others to see and access your equipment on this Hotspot.</p>
  <p>It is solely your own responsibility to have a firewall on your computer.<br /><br /> Please note that your activities on this network will be logged. At the request of a proper authority, we must disclose this log.</p>

  <input type="button" value="Log off" class="button-small" onclick="location.href='%TIDY[path_auth]/action/logout';" />
</div>
</body>
</html>

