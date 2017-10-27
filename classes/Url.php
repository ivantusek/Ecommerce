<?php
// Url class
class Url {

    public static $_page = "page";
    public static $_folder = PAGES_DIR;
    public static $_params = array ();

    // Get parameters function
    public static function getParam($par){

        return isset($_GET[$par]) && $_GET[$par] != "" ?
            $_GET[$par] : null;

    }

    // Function for page
    public static function cPage() {

        return isset($_GET[self ::$_page]) ?
            $_GET[self ::$_page] : 'index';

    }

    // Function to show page from pages folder and error
    public static function getPage() {

       $page = self::$_folder.DS.self::cPage().".php";
       $error = self::$_folder.DS."error.php";
       return is_file($page) ? $page : $error;

    }

    // Function get all pages
    public static function getAll() {

        if(!empty($_GET)){
            foreach ($_GET as $key => $value) {
                if(!empty($value)){
                    self::$_params[$key] = $value;

                }
            }
        }

    }


}
