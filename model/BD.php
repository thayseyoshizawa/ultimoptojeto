<?php
    class BD {
        public static function getConexao() {
            $conn = new PDO(
                'mysql:host=localhost;dbname=db_biblioteca1', 
                'root', 
                ''
            );

            return $conn;
        }
    }