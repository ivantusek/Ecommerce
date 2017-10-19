<?php

// Require once config.php
require_once ('inc/config.php');

// Function autload php file from path
function __autoload($class_name){
    $class = explode("_", $class_name);
    $path = implode("/", $class).".php";
    require_once ($path);

}