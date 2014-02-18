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
  <div class="message--success">Vi har sendt en kode til det indtastede nummer, indtast den i <label for="smscode">"Indtast kode" feltet</label> nedenfor</div>
  <div class="form--wrapper">
    <form action="logged-in.php" method="post">
      <label for="mobilnumber">Mobilnummer</label>    
      <input type="text" value="%TIDY[sms_number]" disabled="disabled" class="form--input" autocomplete="off"  />      
      <div class="form--password-wrapper">
        <label for="smscode">Indtast kode</label>
        <input type="password" placeholder="Indtast kode fra SMS" id="smscode" name="password" class="form--input" autocomplete="off" />
        <div class="form--toggle-password js-form-toggle-password" data-toggle-password="password">
          <img src="/public/eye.png" class="form--toggle-password-icon" />
          <span class="js-form-toggle-text">Vis</span>
        </div>
      </div>
      <input type="submit" class="button" value="Log ind" />
    </form>
  </div>
  <?php include('inc/footer.inc'); ?>
</div>
</body>
</html>
