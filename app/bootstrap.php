<?php 
// Load Config
require_once 'config/config.php';
//  Load libraries
// require_once '../app/libraries/core.php';
// require_once '../app/libraries/controller.php';
// require_once '../app/libraries/database.php';

// Autoload Core Libraries　// spl_autoload_register() registers any number of autoloaders, enabling for classes and interfaces to be automatically loaded if they are currently not defined
spl_autoload_register(function($className){
  require_once '../app/libraries/' . $className . '.php';
});