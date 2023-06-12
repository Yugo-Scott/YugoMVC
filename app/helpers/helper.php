<?php
function redirect($page){
  header('location: '.URLROOT.'/'.$page);
}

session_start();