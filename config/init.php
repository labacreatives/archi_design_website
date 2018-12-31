<?php
session_start();
$ROOT = str_replace("\\","/",dirname(__DIR__,1));
//Paths
define('BR','</br>');
define('APP_ROOT'       ,$ROOT);
define('PUBLIC'        ,$ROOT."\public");
define('HOME_PAGE'      ,$ROOT.'\public\index.html');
define('SIGNIN_PAGE'    ,$ROOT.'\public\users\signin.php');
define('SIGNUP_PAGE'    ,$ROOT.'\public\users\signin.php');
define('LOGOUT_PAGE'    ,$ROOT.'\public\users\signin.php');
define('ADD_PROJECT'    ,$ROOT.'\public\projects\addProject.php');
define('VIEW_PROJECT'   ,$ROOT.'\public\projects\viewProject.php');
define('VIEW_PROJECTS'  ,$ROOT.'\public\projects\viewProjects.php');
define('UPDATE_PROJECT' ,$ROOT.'\public\projects\updateProject.php');
define('CSS_DIR'        ,$ROOT.'\e-commerce\css');
define("JQUERY"         ,$ROOT."\public\js\jquery-1.9.1.min.js");
define("JS_DIR"         ,$ROOT."\public\js\script.js");
define("UPLOAD_DIR"     ,$ROOT.'\public\uploads');


spl_autoload_register(function($file_name){
    $inc_dirs = array(
        "/app/controllers",
        "/app/models",
        "/lib",
        "/public/projects",
        "/public/user",
        "/public/contact"
    );
    foreach ($inc_dirs as $dir){
        foreach (scandir(APP_ROOT.$dir) as $file){
            if($file_name.".php" == $file && file_exists(APP_ROOT.$dir.'/'.$file)){
                require_once (APP_ROOT.$dir.'/'.$file);
                break 2;
            }
        }
    }
});
