<?php
class Core {
  protected $currentController = 'Pages';
  protected $currentMethod = 'index';
  protected $params = [];

  public function __construct(){
    // print_r($this->getUrl());
    $url = $this->getUrl();

    // Look in controllers for first value
    if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){  // ucwords() capitalizes the first letter of each word in a string
      // If exists, set as controller
      $this->currentController = ucwords($url[0]);
      // Unset 0 Index
      unset($url[0]);  // unset() destroys the specified variables
      echo $this->currentController;
      echo $url[1];
      require_once '../app/controllers/' . $this->currentController . '.php'; // require_once() includes and evaluates the specified file only once
      $this->currentController = new $this->currentController;
    }
  }

  public function getUrl(){
    // echo $_GET['url'];
    if(isset($_GET['url'])){
      $url = rtrim($_GET['url'], '/');  // rtrim() removes the last '/' from the url
      $url = filter_var($url, FILTER_SANITIZE_URL);  // filter_var() removes all illegal characters from the url
      // echo $url;
      $url = explode('/', $url);  
      // print_r($url);
      return $url;
    }
  }
}