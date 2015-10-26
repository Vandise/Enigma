<?php
/**
 * Enigma Autoloader
 *
 * Autoloads all classes within the Enigma Application
 *
 * @author Benjamin J. Anderson <andeb2804@gmail.com>
 * @package Global
 * @since 0.1.0
 * @version v0.1.0
 */
   
require_once 'config.php';

spl_autoload_register(function($class){

  $file = BASE_PATH .
    implode( '', 
      array_map( 
        function($fragment) use ($class){
          return "/$fragment";
        }, explode( '\\', $class )
      )
    ).'.php';
    
    if(file_exists($file))
    {
      require_once $file;
    }

});