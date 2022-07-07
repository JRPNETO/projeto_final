<?php
require "model/UsuarioModel.php";

class Usuario{

    function __construct() {
        $this->model = new UsuarioModel();
    }

    function index(){
        $usuario = $this->model->buscarTudo();
       include "view/template/cabecalho.php";
       include "view/template/menu.php";
       include "view/usuario/listagem.php";
       include "view/template/rodape.php";
    }

    function add(){
        include "view/template/cabecalho.php";
        include "view/template/menu.php";
        include "view/usuario/form.php";
        include "view/template/rodape.php";
    }

    function excluir($id){
        $this->model->excluir($id);
        header('location: ?c=usuario');
    }

    function editar($id){
        $categorias = $this->model->buscarTudo();
        $categoria = $this->model->buscarPorId($id);
        include "view/template/cabecalho.php";
        include "view/template/menu.php";
        include "view/usuario/form.php";
        include "view/template/rodape.php";
    }
    Function salvar(){
        if(isset($_POST['login']) && !empty($_POST['login'])){
           if(empty($_POST['idusuario'])){
            $this->model->inserir($_POST['login'], $_POST['login']);
           }else{
            $this->model->atualizar($_POST['login'], $_POST['login']);
           }
            header('Location: ?c=usuario');
        }else{
            echo "Ocorreu um erro, pois os dados não foram enviados";
        }
    }
} 


//$categoria->inserir("SmartTV");
//$categoria->excluir(12);
//$categoria->atualizar(6, "SmartPhone");
//var_dump($categoria->buscarPorId(6));
//var_dump($categoria->buscarTudo());