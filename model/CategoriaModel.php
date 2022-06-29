<?php

require "config/Conexao.php";

class CategoriaModel{
    var $conexao;

    function __construct(){
        $this->conexao = Conexao::getConnection();
    }

    function inserir($nome){
        $sql = "INSERT INTO categoria (nome) VALUES (?)";
        $comando = $this->conexao->prepare($sql);
        $comando->bind_param("s", $nome);
        $comando->execute();
    }

    function excluir($id){
        $sql = "DELETE FROM categoria WHERE idcategoria = ?";
        $comando = $this->conexao->prepare($sql);
        $comando->bind_param("i", $id);
        $comando->execute();
    }

    function atualizar($id, $nome){
        $sql = "UPDATE categoria SET nome = ? WHERE idcategoria = ?";
        $comando = $this->conexao->prepare($sql);
        $comando->bind_param("si", $nome, $id);
        $comando->execute();
    }

    function buscarPorId($id){
        $sql = "SELECT * FROM categoria WHERE idcategoria = ?";
        $comando = $this->conexao->prepare($sql);
        $comando->bind_param("i", $id);
        if($comando->execute()){
            $resultados = $comando->get_result();
            return $resultados->fetch_assoc();
        }
        return null;
    }

    function buscarTudo(){
        $sql = "SELECT * FROM categoria";
        $comando = $this->conexao->prepare($sql);

        if($comando->execute()){
            $resultados = $comando->get_result();
            return $resultados->fetch_all(MYSQLI_ASSOC);
        }
        return null;
    }
}