<?php

/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 08/09/2016
 * Time: 09:41
 */

require_once "ConfigMysql.php";

class DB
{
    private static $instance;

    public static function getInstance(){

        if(!isset(self::$instance)){
            try{

                self::$instance = new PDO("mysql:host=" . BD_HOST . ";dbname=" . BD_NOME, BD_USUARIO , BD_SENHA);
                self::$instance->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                self::$instance->exec('SET NAMES utf8');
            } catch (PDOException $e){
                echo "Falha no banco de dados! " . $e->getMessage();
            }
        }
        return self::$instance;
    }
    public static function prepare($sql){
        return self::getInstance()->prepare($sql);
    }

    
}