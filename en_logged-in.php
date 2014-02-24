<!DOCTYPE html>
<html>
<head>
  <title>Logget ind</title>
  <?php include('inc/meta.inc'); ?>
</head>
<body>

<?php include('inc/header.inc'); ?>
<div class="layout">
  <h1>Din adgang er nu tilladt</h1>
  
      <p><b>Du har adgang til internettet</b><br />
	  Denne session udl&oslash;ber %TIDY[expire_time], herefter vil du igen blive bedt om autentificering. Er dit behov for adgang til internettet kortere end denne sessions varighed, bedes du logge af efter brug.<br />
      <i>&raquo;&nbsp;<a href="%TIDY[path_auth]/action/logout">Tryk her for at logge af netv&aelig;rket</a></i><br /><br /></p>
		
%TIDY_DEP[redirect] %TIDY_IFDEF[intercept_uri]      <p>
%TIDY_DEP[redirect] %TIDY_IFDEF[intercept_uri]      <b>Du vil blive videresendt</b><br />
%TIDY_DEP[redirect] %TIDY_IFDEF[intercept_uri]      Du bliver om 5 sekunder videresendt til din destination.<br />
%TIDY_DEP[redirect] %TIDY_IFDEF[intercept_uri]      <i>&raquo;&nbsp;<a href="%TIDY[intercept_uri]">%TIDY[intercept_uri_nice]</a></i><br /><br />
%TIDY_DEP[redirect] %TIDY_IFDEF[intercept_uri]      </p>

      <p><b>Hj&aelig;lp</b><br />
      Vi kan ikke tilbyde hj&aelig;lp vedr&oslash;rende ops&aelig;tning og betjeningen af dit udstyr.<br /><br /></p>

      <p><b>Sikkerhed p&aring; nettet</b><br />
      Du skal vide, at du er p&aring; et &aring;bent netv&aelig;rk - dit udstyr kan ses og tilg&aring;s af andre p&aring; hotspottet, og at du selv har ansvaret for at f&aring; beskyttet dit udstyr forskriftsm&aelig;ssigt (lokal Firewall m.v.)<br />
      <br />
      Vi g&oslash;r opm&aelig;rksom p&aring;, at din f&aelig;rden p&aring; internettet vil kunne spores tilbage til dig. Efter anmodning fra berettiget myndighed skal vi udlevere oplysning herom.</p>

      <div class="form-wrapper">
        <div class="form-item submit">
          <input type="button" value="Log af" id="submit" onclick="location.href='%TIDY[path_auth]/action/logout';" />
        </div>
      </div>  
  
</div>
</body>
</html>
