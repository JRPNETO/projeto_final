<?php
require "model/CategoriaModel.php";

class Categoria{

    function __construct() {
        $this->modelo = new CategoriaModel();
    }

    function index(){
       include "view/template/conteudo.php";
    }

    function add(){
        echo "mostrar form categoria";
    }

    function excluir($id){
        echo "excluir categoria";
    }
}

//$categoria = new CategoriaModel();
//$categoria->inserir("SmartTV");
//$categoria->excluir(12);
//$categoria->atualizar(6, "SmartPhone");
//var_dump($categoria->buscarPorId(6));
//var_dump($categoria->buscarTudo());