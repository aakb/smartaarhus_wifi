<!DOCTYPE html>
<html>
<head>
  <title>Logget ind</title>
  <?php include('inc/meta.inc'); ?>
</head>
<body>

<?php include('inc/header.inc'); ?>
<div class="layout">
  <h1>Du er nu online</h1>

  %TIDY_DEP[redirect] %TIDY_IFDEF[intercept_uri]  <div class="message--success">
  %TIDY_DEP[redirect] %TIDY_IFDEF[intercept_uri]    <p>Du bliver videresendt til din destination om 5 sekunder.</p>
  %TIDY_DEP[redirect] %TIDY_IFDEF[intercept_uri]    <p><a href="%TIDY[intercept_uri]">%TIDY[intercept_uri_nice]</a></p>
  %TIDY_DEP[redirect] %TIDY_IFDEF[intercept_uri]  </div>

  <p>Denne session udl&oslash;ber <strong>%TIDY[expire_time]</strong>, herefter vil du igen blive bedt om at logge ind.</p>
  <h3>Sikkerhed p&aring; nettet</h3>
  <p>Du er logget p&aring; et &aring;bent netv&aelig;rk - dit udstyr kan ses og tilg&aring;s af andre p&aring; hotspottet, og at du selv har ansvaret for at f&aring; beskyttet dit udstyr forskriftsm&aelig;ssigt (lokal Firewall m.v.)</p>
  <p>Vi g&oslash;r opm&aelig;rksom p&aring;, at din f&aelig;rden p&aring; internettet vil kunne spores tilbage til dig. Efter anmodning fra berettiget myndighed skal vi udlevere oplysning herom.</p>
  <input type="button" value="Log af" class="button-small" onclick="location.href='%TIDY[path_auth]/action/logout';" />
</div>
</body>
</html>
