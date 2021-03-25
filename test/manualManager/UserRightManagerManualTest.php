<?php 

//UserRight manual testing phase:

//loading dependencies!

require_once "../../config/config";

spl_autoload_register(
    function ($className) {
        require "../../model/" . $className . ".php";
    }
);