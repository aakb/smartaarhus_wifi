<!DOCTYPE html>
<html>
<head>
  <title>Logget ind - english version</title>
  <?php include('inc/meta.inc'); ?>
</head>
<body>

<?php include('inc/header.inc'); ?>
<div class="layout">
  <h1>Your access has now been activated</h1>
  
      <p><b>You are connected to the Internet</b><br />
      This session expires %TIDY[expire_time], after that time you will be asked to re-authenticate. If your need for an Internet connection is shorter than this session, please log off after use.<br />
      <i>&raquo;&nbsp;<a href="%TIDY[path_auth]/action/logout">Click here to log off the network</a></i><br /><br /></p>
      
%TIDY_DEP[redirect] %TIDY_IFDEF[intercept_uri]      <p>
%TIDY_DEP[redirect] %TIDY_IFDEF[intercept_uri]      <b>You will be forwarded</b><br />
%TIDY_DEP[redirect] %TIDY_IFDEF[intercept_uri]      You will be forwarded to your original destination in five seconds.<br />
%TIDY_DEP[redirect] %TIDY_IFDEF[intercept_uri]      <i>&raquo;&nbsp;<a href="%TIDY[intercept_uri]">%TIDY[intercept_uri_nice]</a></i><br /><br />
%TIDY_DEP[redirect] %TIDY_IFDEF[intercept_uri]      </p>

      <p><b>Support</b><br />
      We do not offer any support on your computer.<br /><br /></p>

      <p><b>Security on the network</b><br />
      Please read this before you start using the wireless network This is an open network - It is possible for others to see and access your equipment on this Hotspot. <br />It is solely your own responsibility to have a firewall on your computer.<br /><br /> Please note that your activities on this network will be logged. At the request of a proper authority, we must disclose this log.<br /></p>

      <div class="form-wrapper">
        <div class="form-item submit">
          <input type="button" value="Log off" id="submit" onclick="location.href='%TIDY[path_auth]/action/logout';" />
        </div>
      </div>  
  
</div>
</body>
</html>

