<?php

if(!isset($_SESSION)){
    session_start();
}

// Site domain name with http
defined("SITE_URL")
    ||define("SITE_URL", "http://".$_SERVER['SERVER_NAME']);

// Directory separator
defined("DS")
    || define("DS", DIRECTORY_SEPARATOR);

// Root path
defined("ROOT_PATH")
    || define("ROOT_PATH", realpath(dirname(__FILE__) .DS."..".DS));

// Classes folder
defined("CLASSES_DIR")
    || define("CLASSES_DIR", "classes");

// Modules folder
defined("MOD_DIR")
    || define("MOD_DIR", "mod");

// Inc folder
defined("INC_DIR")
    || define("INC_DIR", "inc");

// Template folder
defined("TEMPLATE_DIR")
    || define("TEMPLATE_DIR", "template");

// Emails path
defined("EMAILS_PATH")
    || define("EMAILS_PATH", ROOTH_PATH.DS."emails");

// Catalogue images path
defined("CATALOGUE_PATH")
    || define("CATALOGUE_PATH", ROOTH_PATH.DS."media".DS."catalogue");