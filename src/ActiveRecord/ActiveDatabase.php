<?php
namespace ActiveRecord;

class ActiveDatabase
{
    public static $db = array();
    public static $db_config = array();

    /**
     * @param string $config_name
     * @return \CI_DB_query_builder|null
     */
    public static function get($config_name)
    {
        require_once (__DIR__ . '/../database/DB.php');

        if (isset(self::$db[$config_name])) {
            return (self::$db[$config_name]);
        } else if (isset(self::$db_config[$config_name])) {
            self::$db[$config_name] = DB(self::$db_config[$config_name]);
            return (self::$db[$config_name]);
        } else {
            return null;
        }
    }

    public static function addConfig($config_name, $config)
    {
        define('DB_DEBUG', true);
        define('DB_LOAD_FORGE', true);
        // This should be the base path to the database folder
        if ( ! defined('BASEPATH')) {
            define('BASEPATH', __DIR__ . '/../');
        }

        if(is_array($config)
            && array_key_exists("hostname", $config)
            && array_key_exists("username", $config)
            && array_key_exists("password", $config)
            && array_key_exists("database", $config)
            && array_key_exists("dbdriver", $config)
        ){
            self::$db_config[$config_name] = $config;
            return true;
        }

        return false;
    }
}
?>
