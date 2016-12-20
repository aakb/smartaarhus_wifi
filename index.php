<?php

$sub_directory ='aarhus/';

$usernames = array('0000');
$smsPhase2Index = 'sms_intermediate_page';
$loggedIndex = 'logged-in';

$mapping  = array(

  'index' => array('link' => 'auth_home_link', 'file' => 'auth_methods'),
  'bibliotekslogin' => array('link' => 'auth_axiell_link', 'file' => 'auth_axiell_login' ),
  'guest' => array('link' => 'auth_nwa_link', 'file' => 'auth_nwa_login'),
  'medarbejderlogin' => array('link' => 'auth_ads_link', 'file' => 'auth_ads_login' ),
  'nemid' => array('link' => 'auth_nemid_link', 'file' => 'auth_nemid_login' ),
  'skolelogin' => array('link' => 'auth_radius_link', 'file' => 'auth_radius_login' ),
  'sms-login' => array('link' => 'auth_sms_link', 'file' => 'auth_sms_login', 'sms' => 1 ),
  'sms-send-code' => array('link' => $smsPhase2Index, 'file' => 'auth_sms_login', 'sms' => 2  ),

  'error' => array('file' => 'error' ),
  'logged-in' => array('link' => $loggedIndex, 'file' => 'host_active' ),
);

$link_mapping = array(

  // The Action url.
  'form_action' => '/auth/=/logon/',

  // Hide this
  'form_intercept' => '',
  'redirect' => '',
  'sms_form' => '',
  'sms_notice' => '',

  // Footer language-link
  'language_en_js' => 'javascript:set_language(&#39;en&#39;); void(0);',
  'language_da_js' => 'javascript:set_language(&#39;da&#39;); void(0);',

  // DEMO values
  'sms_number' => '12345678',
  'intercept_uri' => 'http://www.aakb.dk',
  'intercept_uri_nice' => 'http://www.aakb.dk',
  'expire_time' => 'Onsdag kl. 17',

);

foreach ($mapping as $key => $value) {
  if (  isset($value['link'])   ) {
    $link_mapping[ $value['link'] ] =  '/' . $key .'.php';
  }
}

function remove_tidy_dep(&$content) {
  // Remove TIDY_DEP.
  $content = preg_replace('/^\%TIDY_DEP\[.*?\]\s*/m', '', $content);
}

function load_file($file) {
  global $sub_directory;

  $content = file_get_contents( $sub_directory . $file);

  remove_tidy_dep($content);

  return $content;
}

function handle_include(&$content) {
  $content = preg_replace_callback(
      '/\%TIDY\[include\(([\w\_\.]+)\)\]/',
      function($matches){
          return load_file($matches[1]);
      },
      $content
      );
}

function handle_link(&$content, $links) {

  // fjern alle %TIDY_IFDEF[...]
  //$content = preg_replace('/^\%TIDY_IFDEF\[.*?\]/m', '', $content);
  $content = preg_replace('/\%TIDY_IFDEF\[.*?\]/m', '', $content);

  // erstat link hvis link findes
  $content = preg_replace_callback(
      '/\%TIDY\[(.+?)\]/',
      function($matches) use ($links) {
        return  isset($links[$matches[1]]) ? $links[$matches[1]] : '%TIDY[' . $matches[1] . ']';
      },
      $content
      );
}

function extract_headers(&$content, &$headers){
  // Extract all headers from content.
  $tmp = preg_replace_callback(
      '/^\%TIDY_PAGEHEAD: (.*)$/m',
      function($matches) use (&$headers) {
        $headers .= $matches[1] . "\n";
        return '';
      },
      $content
      );
      
  // Small cleanup.
  $content = preg_replace('/^\s+$/m', '', $tmp);
}

// find language
$language = $_COOKIE["tidyLanguage"] === 'en' ? 'en' : 'da';

// handle login/post with json response - url will contain '='
if ( isset($_SERVER["REDIRECT_URL"]) && preg_match("/\=/", $_SERVER["REDIRECT_URL"])   ){

  header('Content-type:application/json');
  if( in_array($_REQUEST['username'], $usernames)) {
    header('HTTP/1.0 200 Found');
    sleep(2); // simulate slow server
    echo '{"status":"0","authenticated":1,"redirect":"' . $link_mapping[$loggedIndex] . '"}';
  } else {
    header('HTTP/1.0 400 Bad Request');
    $message = array('da' => 'Forkert brugernavn eller adgangskode.', 'en' => 'Wrong username or password');    
    echo '{"status":"validation failed","authenticated":0,"message":"' . $message[$language] . '"}';
  }
  exit;
}

// find filename
if ( isset($_SERVER["REDIRECT_URL"]) && preg_match('~^/(.*?)\.php~', $_SERVER["REDIRECT_URL"], $matches)) {
  $fileIndex = $matches[1];
} else {
  $fileIndex = 'index';
}

// get the right file
$localfile = $mapping[$fileIndex]['file'] . '_' . $language . '.txt';
$content = load_file($localfile);

// handle include-files
handle_include($content);

// handle footer link
$content = preg_replace('/\%TIDY_REGEX\[language_modules.*?\]/', '', $content);

// handle sms-pages
if ( isset($mapping[$fileIndex]['sms'])){

  if ( $mapping[$fileIndex]['sms'] == 1 ) {
    $content = preg_replace('/^\%TIDY_IFDEF\[sms_sent\].*/m', '', $content);
    $link_mapping['form_action'] = $link_mapping[$smsPhase2Index];
  } else if ( $mapping[$fileIndex]['sms'] == 2 ) {
    $content = preg_replace('/^\%TIDY_IFDEF\[\!sms_sent\].*/m', '', $content);
    $link_mapping['form_action'] = $link_mapping[$loggedIndex];
  }
}

// handle link
handle_link($content, $link_mapping);

// handle headers
$headers='';
extract_headers($content, $headers);

?>
<!DOCTYPE html>
<html lang="da">
<head><meta charset="utf-8" />
    <title>Template</title>
    <script type="text/javascript">function set_language(lang) { document.cookie = "tidyLanguage" + "=" + escape(lang) + "; path=/"; window.location.reload(true); } </script>
    <?php echo $headers; ?>
</head>
  <body class="aarhus">
  <div class="main_wrapper">
      <?php echo $content; ?>
  </div>
  </body>
</html>
