<!DOCTYPE html>
<head>
  <title>SmartAarhus WIFI - english version</title>
  <?php include('inc/meta.inc'); ?>
</head>

<body>
<script>redirectToLogin();</script>
<?php include('inc/header.inc'); ?>
<div class="layout">
  <h1>Choose login method</h1>
  <div class="link-button--wrapper">
    <a href="bibliotekslogin.php" class="link-button">Bibliotekslogin<span class="link-button--icon-wrapper"><img src="/public/arrow-right.png" class="link-button--icon" /></span></a>
    <a href="skolelogin.php" class="link-button">Skolelogin<span class="link-button--icon-wrapper"><img src="/public/arrow-right.png" class="link-button--icon" /></span></a>
    <a href="medarbejderlogin.php" class="link-button">Medarbejderlogin<span class="link-button--icon-wrapper"><img src="/public/arrow-right.png" class="link-button--icon" /></span></a>
    <a href="sms-send-code.php" class="link-button">SMS login<span class="link-button--icon-wrapper"><img src="/public/arrow-right.png" class="link-button--icon" /></span></a>

    <a href="guest.php" class="link-button">G&aelig;stelogin<span class="link-button--icon-wrapper"><img src="/public/arrow-right.png" class="link-button--icon" /></span></a>
    <a href="nemid.php" class="link-button">Nemid<span class="link-button--icon-wrapper"><img src="/public/arrow-right.png" class="link-button--icon" /></span></a>
        
    
  </div>
  <?php include('inc/en_footer.inc'); ?>
</div>
</body>
</html>