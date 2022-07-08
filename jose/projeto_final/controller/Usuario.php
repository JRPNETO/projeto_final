<?php
require "model/UsuarioModel.php";

class Usuario{

    function __construct() {
        
        session_start();
        if(!isset($_SESSION['usuario'])){
            header('Location: ?c=restrito&m=login');
        }
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
        $usuario = $this->model->buscarPorId($id);
        include "view/template/cabecalho.php";
        include "view/template/menu.php";
        include "view/usuario/form.php";
        include "view/template/rodape.php";
    }
    Function salvar(){
        if(isset($_POST['login']) && !empty($_POST['login'])&& !empty($_POST['senha'])){
           if(empty($_POST['idusuario'])){

            if(!$this->model->buscarPorLogin($_POST['login'])){
                $this->model->inserir($_POST['login'], password_hash($_POST['senha'], PASSWORD_BCRYPT));
            }else{
                echo "Já existe um usuário com esse login cadastrado!";
                die();
            }
           }else{
            $this->model->atualizar($_POST['login'], password_hash($_POST['senha'], PASSWORD_BCRYPT));
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