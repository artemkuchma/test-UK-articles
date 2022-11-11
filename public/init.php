<?php

require_once '../config/conf.php';


function __autoload($className)
{
    $file = "{$className}.php";
    if(file_exists(CONF_DIR . $file)){
        require_once CONF_DIR . $file;
    } elseif (file_exists(CONTROLLER_DIR . $file)){
        require_once CONTROLLER_DIR . $file;
    } elseif (file_exists(HELPER_DIR . $file)){
        require_once HELPER_DIR .$file;
    } elseif (file_exists(MODEL_DIR . $file)){
        require_once MODEL_DIR .$file;
    } elseif (file_exists(VIEW_DIR . $file)){
        require_once VIEW_DIR . $file;
    } elseif (file_exists(PUBLIC_DIR . $file)){
        require_once PUBLIC_DIR . $file;
    } else {
        throw new Exception ("{$file} not found", 404);
    }
}
