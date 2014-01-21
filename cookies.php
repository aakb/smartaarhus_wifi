<!DOCTYPE html>
<head>
  <title>Brug af cookies</title>
  <?php include('inc/meta.inc'); ?>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.js-delete-cookies-link').click(function() {
        deleteAllCookies($('.js-delete-cookies'));
      });
    });
  </script>
</head>

<?php include('inc/header.inc'); ?>
<div class="layout">
  <h1>Brug af cookies</h1>
  <div class="page-content">
    <p>[Cookie tekst]</p>
    <p class="js-delete-cookies"><a href="#" class="js-delete-cookies-link">Slet cookies</a></p>
  </div>
  <?php include('inc/footer.inc'); ?>
</div>
</body>
</html>
