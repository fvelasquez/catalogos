<?php
/**
 * Automatically includes classes
 * 
 * @throws Exception
 * 
 * @param  string $class_name  Name of the class to load
 * @return void
 */
function __autoload($class_name)
{
    // Customize this to your root Flourish directory
    $flourish_root = $_SERVER['DOCUMENT_ROOT'] . '/accounts/catalogos/fsr/includes/flourish/';
    
    $file = $flourish_root . $class_name . '.php';
 
    if (file_exists($file)) {
        include $file;
        return;
    }
    
    throw new Exception('The class ' . $class_name . ' could not be loaded');
}


define("FACEBOOK_APP_ID", '218386818224764');
define("FACEBOOK_API_KEY", 'a39c5df5c6d2ec0bea2f5686c9ab6cbd');
define("FACEBOOK_SECRET_KEY", '937ca8f9285679f13bc1cc5e46f9e2d4');
define("FACEBOOK_CANVAS_URL", 'https://apps.facebook.com/fsrnuevocatalogo/');
define("FACEBOOK_SITE_URL", 'http://branding-machine.com/accounts/catalogos/fsr/');
define("FACEBOOK_WALL_URL", 'https://www.facebook.com/fsrichard');


define("BD_HOST",$_ENV{'DATABASE_SERVER'});
define("BD_USER",'db15625_alessicp');
define("BD_PASSWORD",'igj6114154');
define("BD_NAME",'db15625_fsrcatalogo');

?>