<?php
// Core class
class Core {

    public function run() {

        // Output buffering
        ob_start();
        require_once(Url::getPage());
        ob_get_flush();

    }

}

