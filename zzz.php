<?php

$sub_directory ='aarhus/';

$mapping  = array(

              'index'   => array('link'=>'auth_home_link','file'=>'auth_methods_da.txt' ),
              'en_index'   => array('link'=>'auth_home_link','file'=>'auth_methods_en.txt' ,'language'=>'en' ),

              'logged-in'   => array('file'=>'host_active_da.txt' ),
              'en_logged-in'   => array('file'=>'host_active_en.txt' ,'language'=>'en' ),

              'error'   => array('file'=>'error_da.txt' ),
              'en_error'   => array('file'=>'error_en.txt' ,'language'=>'en' ),

              'bibliotekslogin'   => array('link'=>'auth_axiell_link','file'=>'auth_axiell_login_da.txt'),
              'en_bibliotekslogin'   => array('link'=>'auth_axiell_link','file'=>'auth_axiell_login_en.txt' ,'language'=>'en' ),

              'guest'   => array('link'=>'auth_nwa_link','file'=>'auth_nwa_login_da.txt' ),
              'en_guest'   => array('link'=>'auth_nwa_link','file'=>'auth_nwa_login_en.txt' ,'language'=>'en' ),

              'medarbejderlogin'   => array('link'=>'auth_ads_link','file'=>'auth_ads_login_da.txt' ),
              'en_medarbejderlogin'   => array('link'=>'auth_ads_link','file'=>'auth_ads_login_en.txt' ,'language'=>'en' ),

              'nemid'   => array('link'=>'auth_nemid_link','file'=>'auth_nemid_login_da.txt' ),
              'en_nemid'   => array('link'=>'auth_nemid_link','file'=>'auth_nemid_login_en.txt' ,'language'=>'en' ),

              'skolelogin'   => array('link'=>'auth_radius_link','file'=>'auth_radius_login_da.txt' ),
              'en_skolelogin'   => array('link'=>'auth_radius_link','file'=>'auth_radius_login_en.txt' ,'language'=>'en' ),

              'sms-login'   => array('link'=>'auth_sms_link','file'=>'auth_sms_login_da.txt' ),
              'en_sms-login'   => array('link'=>'auth_sms_link','file'=>'auth_sms_login_en.txt' ,'language'=>'en' ),

              'sms-send-code'   => array(),
              'en_sms-send-code'   => array(),
  );

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
      '/\%TIDY\[include\(([\w\_\.]+)\)\]/', // >include file< - pattern
      function($matches) {
          return load_file($matches[1]);
      },
      $content
      );
}

function handle_link(&$content, $links) {

  // fjern alle %TIDY_IFDEF[auth_axiell_link]
  $content = preg_replace('/^\%TIDY_IFDEF\[.*?\]/m','', $content);

  // erstat link med link hvis link findes
  $content = preg_replace_callback(
      '/\%TIDY\[(.+?)\]/',
      function($matches) use ($links) {
        return  isset($links[$matches[1]]) ? $links[$matches[1]] : '%TIDY[' . $matches[1] . ']';
      },
      $content
      );

}

function move_headers(&$content, $template){
  $headers=array();

  $tmp = preg_replace_callback(
      '/^\%TIDY_PAGEHEAD: (.*)$/m',
      function($matches) use (&$headers) {
        $headers[] = $matches[1];
        return '';
      },
      $content
      );
      
  $content = $template['header_prefix'] . implode("\n", $headers) . $template['header_suffix'] .
             $template['body_prefix'] . preg_replace('/^\s+/s', '', $tmp) . $template['body_suffix'];
}      

// find filename
$filename = isset($_SERVER["REDIRECT_URL"]) ? $_SERVER["REDIRECT_URL"] : 'bibliotekslogin.php';
$filename = preg_replace('~^/~', '', $filename);
$filename = preg_replace('/\.php/i', '', $filename);

$localfile = $mapping[$filename]['file'];

$content = load_file($localfile);

handle_include($content);

$reverse = array();
foreach ($mapping as $key => $value) {
    if ( ! isset($value['language'])  && isset($value['link'])  ) {
      $reverse[ $value['link'] ] =  $key .'.php';
    }
}

$reverse['form_action']='-';
$reverse['form_intercept']='';
$reverse['language_en_js']='';
$reverse['sms_form']='';
$reverse['sms_notice']='';

handle_link($content, $reverse);

move_headers($content, array( 'header_prefix' => '<html><head>', 
                              'header_suffix' => '</head>',
                              'body_prefix' => '<body>',
                              'body_suffix' => '</body>' ));

echo $content;

?>