<?php

class conexao{
    static function  getConnection(){
        $conexao = new mysqli("localhost","root","info","db_catalogo_3e1",3306);
        $conexao->set_charset("utf8mb4");
        if($conexao->connect_error){
            echo $conexao->connect_error;
            die();
        }
        return $conexao;
    }
}