<!DOCTYPE html>
<html>
<head>
  <title>Nemid</title>
  <?php include('inc/meta.inc'); ?>
</head>
<body>
%TIDY[nemid_javascript]
<?php include('inc/header.inc'); ?>
<div class="layout">
  <h1>Adgang med Nemid</h1>
  <p>Log ind med dit NemID.</p>
  <div class="form--wrapper">
        <form name="logonForm" action="%TIDY[form_action]" method="post">
%TIDY[form_intercept]
%TIDY[nemid_form]
%TIDY[nemid_applet]
  	</form>
  </div>
  <?php include('inc/footer.inc'); ?>
</div>
</body>
</html>
