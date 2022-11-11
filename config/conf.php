<?php

define('DS',DIRECTORY_SEPARATOR);
$root = dirname(dirname(__FILE__)) . DS;
define('ROOT',$root );
define('CONF_DIR', ROOT . 'config' . DS);
define('CONTROLLER_DIR', ROOT . 'controllers' . DS);
define('HELPER_DIR', ROOT . 'helpers' . DS);
define('MODEL_DIR', ROOT . 'models' . DS);
define('VIEW_DIR', ROOT . 'views' . DS);
define('PUBLIC_DIR', ROOT . 'public' . DS);

define('DEFAULT_CONTROLLER', 'index');
define('DEFAULT_ACTION', 'index');

define('HOST', 'localhost');
define('DB', 'test_gb-article');
define('DB_USER', 'test_gb-article-user');
define('DB_PASS', '3YcLL4TB_cfrcr2s');
define('DSN', "mysql:host=".HOST.";dbname=".DB."; charset=UTF8");
