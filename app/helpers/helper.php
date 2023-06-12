<?php
function redirect($page){
  header('location: '.URLROOT.'/'.$page);
}

session_start();

function isLoggedIn(){
  if(isset($_SESSION['user_id'])){
    return true;
  } else {
    return false;
  }
}

  function get_youtube_id($url){
    parse_str( parse_url( $url, PHP_URL_QUERY ), $vars );
    return $vars['v'];  
}
