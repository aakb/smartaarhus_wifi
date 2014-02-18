<!DOCTYPE html>
<html>
<head>
  <title>SMS login</title>
  <?php include('inc/meta.inc'); ?>
</head>
<body>

<?php include('inc/header.inc'); ?>
<div class="layout">
  <h1>SMS login</h1>
  <p class="page-content">Indtast dit mobilnummer og du vil herefter modtage en SMS, der indeholder en engangskode.</p>
  <div class="form--wrapper">
    <form action="sms-login.php" method="post">
      <label for="mobilnumber">Mobilnummer</label>
      <input type="number" placeholder="Indtast dit mobilnummer" id="mobilnumber" name="username" class="form--input" autocomplete="off" />
      <input type="submit" class="button" value="Send SMS" />
    </form>
  </div>
  <?php include('inc/footer.inc'); ?>
</div>
</body>
</html>
