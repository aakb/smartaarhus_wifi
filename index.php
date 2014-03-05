<?php

$sub_directory ='aarhus/';

$mapping  = array(

              'index'   => array('link'=>'auth_home_link','file'=>'auth_methods'),

              'error'   => array('file'=>'error' ),

              'bibliotekslogin'   => array('link'=>'auth_axiell_link','file'=>'auth_axiell_login' ),

              'guest'   => array('link'=>'auth_nwa_link','file'=>'auth_nwa_login'),

              'medarbejderlogin'   => array('link'=>'auth_ads_link','file'=>'auth_ads_login' ),

              'nemid'   => array('link'=>'auth_nemid_link','file'=>'auth_nemid_login' ),

              'skolelogin'   => array('link'=>'auth_radius_link','file'=>'auth_radius_login' ),

              'sms-login'   => array('link'=>'auth_sms_link','file'=>'auth_sms_login', 'sms' => 1 ),

              'sms-send-code'   => array('file'=>'auth_sms_login', 'sms' => 2  ),

              'logged-in' => array('file'=>'host_active' ),
  );

$correct_username = '0000';
  
  
$reverse_mapping = array();
foreach ($mapping as $key => $value) {
    if (  isset($value['link'])   ) {
        $reverse_mapping[ $value['link'] ] =  $key .'.php';
    }
}

function remove_tidy_dep(&$content) {
  $content = preg_replace('/^\%TIDY_DEP\[.*?\]\s*/m','', $content);
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

  // fjern alle %TIDY_IFDEF[auth_axiell_link]
  //$content = preg_replace('/^\%TIDY_IFDEF\[.*?\]/m','', $content);
  $content = preg_replace('/\%TIDY_IFDEF\[.*?\]/m','', $content);

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
  $headers_arr=array();

  $tmp = preg_replace_callback(
      '/^\%TIDY_PAGEHEAD: (.*)$/m',
      function($matches) use (&$headers_arr) {
        $headers_arr[] = $matches[1];
        return '';
      },
      $content
      );
      
  $content = preg_replace('/^\s+/s', '', $tmp);
  $headers = implode("\n", $headers_arr);
}
// find language
$language = $_COOKIE["tidyLanguage"] === 'en' ? 'en' : 'da';

// handle login/post with json response - url contains '='
if ( isset($_SERVER["REDIRECT_URL"]) && preg_match("/\=/", $_SERVER["REDIRECT_URL"])   ){

    header('Content-type:application/json');
    if( $_REQUEST['username'] == $correct_username) {
        header('HTTP/1.0 200 Found');
        echo '{"status":"0","site_id":"23","authenticated":1,"username":"...","host":"...","redirect":"/logged-in.php","method":"...","expire":"7200"}';
    } else {
        header('HTTP/1.0 400 Bad Request');
        echo '{"status":"validation failed","site_id":"23","method":"ads","authenticated":0,"expire":0,"message":"Forkert brugernavn eller adgangskode.","host":"..."}';
    }
    exit;
}

// find filename
$filename = isset($_SERVER["REDIRECT_URL"]) ? $_SERVER["REDIRECT_URL"] : 'index.php';
$filename = preg_replace('~^/~', '', $filename);
$filename = preg_replace('/\.php/i', '', $filename);


// get the right file
$localfile = $mapping[$filename]['file'] . '_' . $language . '.txt';

$content = load_file($localfile);

// start parsing
handle_include($content);

$reverse_mapping['form_action']='/auth/=/logon/';
$reverse_mapping['form_intercept']='';
$reverse_mapping['redirect']='';

$reverse_mapping['intercept_uri']='http://www.aakb.dk';
$reverse_mapping['intercept_uri_nice']='http://www.aakb.dk';

$reverse_mapping['expire_time']='Onsdag kl. 17';



// handle footer link
$content = preg_replace('/\%TIDY_REGEX\[language_modules.*?\]/', '', $content);
$reverse_mapping['language_en_js']='javascript:set_language(&#39;en&#39;); void(0);';
$reverse_mapping['language_da_js']='javascript:set_language(&#39;da&#39;); void(0);';

// handle sms
if ( isset($mapping[$filename]['sms'])){

  $reverse_mapping['sms_form']='';
  $reverse_mapping['sms_notice']='';
  
  if ( $mapping[$filename]['sms'] == 1 ) {
    $content = preg_replace('/^\%TIDY_IFDEF\[sms_sent\].*/m','', $content);
    $reverse_mapping['form_action']='/sms-send-code.php';
  } else if ( $mapping[$filename]['sms'] == 2 ) {
    $content = preg_replace('/^\%TIDY_IFDEF\[\!sms_sent\].*/m','', $content);
    $reverse_mapping['form_action']='/logged-in.php';    
    $reverse_mapping['sms_number']='12345678';   
  }
}

// handle link
handle_link($content, $reverse_mapping);

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
<div>Demo: Brug <?php echo $correct_username;?> som testbrugernavn.</div>
</body></html>