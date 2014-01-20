<!DOCTYPE html>
<head>
  <title>SMS login</title>
  <?php include('inc/meta.inc'); ?>
</head>

<?php include('inc/header.inc'); ?>
<div class="layout">
  <h1>SMS login</h1>
  <p class="page-content">Indtast dit mobilnummer i feltet, så sender vi en kode til dig så du kan logge ind.</p>
  <div class="form--wrapper">
    <form action="sms-login.php">
      <label for="mobilnumber">Mobilnummer</label>
      <input type="number" placeholder="Indtast dit mobilnummer" id="mobilnumber" class="form--input">
      <input type="submit" class="button" value="Send kode">
    </form>
  </div>
  <?php include('inc/footer.inc'); ?>
</div>
</body>
</html>
