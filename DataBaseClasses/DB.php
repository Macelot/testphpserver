<?php
define("HOST_", "localhost");
define("USER_", "seconduser");
define("PASS_", "zxasqw12");
define("BASE_", "php_classes");
define("PORT_", "3306");

class DB {
    private static $instance;
    public static function getInstance() {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO('mysql:host='.HOST_.';port='.PORT_.';dbname='.BASE_,USER_,PASS_);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        return self::$instance;
    }
    public static function prepare($sql) {
        return self::getInstance()->prepare($sql);
    }
}
