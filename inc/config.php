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