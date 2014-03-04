<?php

$sub_directory ='aarhus/';

$mapping  = array(

              'index'   => array('link'=>'auth_home_link','file'=>'auth_methods'),

              'logged-in'   => array('file'=>'host_active' ),

              'error'   => array('file'=>'error' ),

              'bibliotekslogin'   => array('link'=>'auth_axiell_link','file'=>'auth_axiell_login' ),

              'guest'   => array('link'=>'auth_nwa_link','file'=>'auth_nwa_login'),

              'medarbejderlogin'   => array('link'=>'auth_ads_link','file'=>'auth_ads_login' ),

              'nemid'   => array('link'=>'auth_nemid_link','file'=>'auth_nemid_login' ),

              'skolelogin'   => array('link'=>'auth_radius_link','file'=>'auth_radius_login' ),

              'sms-login'   => array('link'=>'auth_sms_link','file'=>'auth_sms_login' ),

              'sms-send-code'   => array(),
              'en_sms-send-code'   => array(),

              'logged-in' => array('link'=>'-','file'=>'host_active' ),
  );


$reverse_mapping = array();
foreach ($mapping as $key => $value) {
    if (  isset($value['link'])   ) {
        $reverse_mapping[ $value['link'] ] =  $key .'.php';
    }
}

function remove_tidy_debug(&$content) {
  $content = preg_replace('/^\%TIDY_DEP\[debug\].+/m','', $content);
}

function load_file($file) {
  global $sub_directory;

  $content = file_get_contents( $sub_directory . $file);

  remove_tidy_debug($content);

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
  $content = preg_replace('/^\%TIDY_IFDEF\[.*?\]/m','', $content);

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

// find filename
$filename = isset($_SERVER["REDIRECT_URL"]) ? $_SERVER["REDIRECT_URL"] : 'index.php';
$filename = preg_replace('~^/~', '', $filename);
$filename = preg_replace('/\.php/i', '', $filename);

// get the right file
$localfile = $mapping[$filename]['file'] . '_' . $language . '.txt';

$content = load_file($localfile);

// start parsing
handle_include($content);

$reverse_mapping['form_action']='/logged-in.php';
$reverse_mapping['form_intercept']='';

// handle footer link
$content = preg_replace('/\%TIDY_REGEX\[language_modules.*?\]/', '', $content);
$reverse_mapping['language_en_js']='javascript:set_language(&#39;en&#39;); void(0);';
$reverse_mapping['language_da_js']='javascript:set_language(&#39;da&#39;); void(0);';

// remove sms
$reverse_mapping['sms_form']='';
$reverse_mapping['sms_notice']='';

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
<div>demomode</div>
</body></html>