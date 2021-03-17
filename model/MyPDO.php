<?php

// class extends PDO - Singleton
class MyPDO extends PDO {

    // private attribute for make this class "Singleton"
    private static $instance = null;

    // construct
    public function __construct($dsn, $username = null, $password = null, $error = null) {

        // parent constructor of PDO
        parent::__construct($dsn, $username, $password);

        // if $error vaut true (dev mode), activate error
        if ($error === true) {
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    // method to get an unique MyPDO Instance
    public static function getInstance($dsn, $username = null, $password = null, $error = null) {

        // If not instance exist
        if (is_null(self::$instance)) {
            // create instance
            self::$instance = new MyPDO($dsn, $username, $password, $error);
        }
        // return MyPDO instance
        return self::$instance;
    }

}
