<!DOCTYPE html>
<head>
  <title>SmartAarhus WIFI</title>
  <?php include('inc/meta.inc'); ?>
</head>

<body>
%TIDY_REGEX[current(cmd),/landing/] <script>redirectToLogin();</script>
<div class="front">
  <?php include('inc/header.inc'); ?>
  <div class="layout">
    <h1>Vælg login</h1>
    <div class="link-button--wrapper">
      <a href="bibliotekslogin.php" class="link-button">Bibliotekslogin<span class="link-button--icon-wrapper"><img src="/public/arrow-right.png" class="link-button--icon" /></span></a>
      <a href="skolelogin.php" class="link-button">Skolelogin<span class="link-button--icon-wrapper"><img src="/public/arrow-right.png" class="link-button--icon" /></span></a>
      <a href="medarbejderlogin.php" class="link-button">Medarbejderlogin<span class="link-button--icon-wrapper"><img src="/public/arrow-right.png" class="link-button--icon" /></span></a>
      <a href="sms-send-code.php" class="link-button">SMS login<span class="link-button--icon-wrapper"><img src="/public/arrow-right.png" class="link-button--icon" /></span></a>

      <a href="guest.php" class="link-button">G&aelig;stelogin<span class="link-button--icon-wrapper"><img src="/public/arrow-right.png" class="link-button--icon" /></span></a>
      <a href="nemid.php" class="link-button js-javaenabled">Nemid<span class="link-button--icon-wrapper"><img src="/public/arrow-right.png" class="link-button--icon" /></span></a>
    </div>
    <?php include('inc/footer.inc'); ?>
  </div>
</div>
</body>
</html>
