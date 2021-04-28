<?php
    class conection{
        // atributo
        public static $conection;

        // método
        public static function conect(){
            if(!isset(self::$conection)){
                try{
                    self::$conection = new PDO("mysql:host=localhost; dbname=pizza", "admpizza", "12345");
                }
                catch(PDOException $e){
                    echo "Erro de conexão: ". $e->getMessage();
                    die();
                }
            }
            return self::$conection;
        }
    }

?> 