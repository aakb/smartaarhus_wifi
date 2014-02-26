<!DOCTYPE html>
<html>
<head>
  <title>Fejl</title>
  <?php include('inc/meta.inc'); ?>
</head>
<body>

<?php include('inc/header.inc'); ?>
<div class="layout">
  <h1>Fejl</h1>
  <div class="page-content">
  
      <p class="error">%TIDY[error_message]&nbsp;</p>
      <div class="form-wrapper">
        <div class="form-item submit">
          <input type="button" value="Tilbage" id="submit" onclick="javascript:history.back(1);" />
        </div>
      </div>    
    
  </div>
  <?php include('inc/footer.inc'); ?>
</div>
</body>
</html>
