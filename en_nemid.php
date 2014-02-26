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
  <h1>Nemid</h1>

  <div class="form--wrapper">
        <form name="logonForm" action="%TIDY[form_action]" method="post">
%TIDY[form_intercept]
%TIDY[nemid_form]
%TIDY[nemid_applet]
  	</form>
  </div>
  <?php include('inc/en_footer.inc'); ?>
</div>
</body>
</html>
