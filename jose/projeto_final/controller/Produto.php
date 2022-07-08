<?php

require_once 'model/CategoriaModel.php';
require_once 'model/ProdutoModel.php';

class Produto{

function __construct() {
    
    session_start();
    if(!isset($_SESSION['usuario'])){
        header('Location: ?c=restrito&m=login');
    }
        $this->categoria = new CategoriaModel();
        $this->model = new ProdutoModel();
    }

    function index(){
        $categorias = $this->categoria->buscarTudo();
        $produtos = $this->model->buscarTudo();
       include "view/template/cabecalho.php";
       include "view/template/menu.php";
       include "view/produto/listagem.php";
       include "view/template/rodape.php";
    }

    function add(){
        $categorias = $this->categoria->buscarTudo();
        include "view/template/cabecalho.php";
        include "view/template/menu.php";
        include "view/produto/form.php";
        include "view/template/rodape.php";
    }

    function excluir($id){
        $this->model->excluir($id);
        header('location: ?c=produto');
    }


    function salvar_foto(){
        if(isset($_FILES['foto']) && !$_FILES['foto']['error']){      
            echo $nome_imagem = time() . $_FILES['foto']['name'];
            echo $origem = $_FILES['foto']['tmp_name'];
            echo $destino ="fotos/$nome_imagem";
            if(move_uploaded_file($origem, $destino)){
                return $destino;
            }
        }
        return null;
    }


    function editar($id){
        $categorias = $this->categoria->buscarTudo();
        $produto = $this->model->buscarPorId($id);
        include "view/template/cabecalho.php";
        include "view/template/menu.php";
        include "view/produto/form.php";
        include "view/template/rodape.php";
    }
    function salvar(){
        if(isset($_POST['nome']) && !empty($_POST['nome'])){
            $nome_foto = $this->salvar_foto() ?? "fotos/semfoto.jpg";

            if(empty($_POST['idproduto'])){
                $this->model->inserir(
                    $_POST['nome'], 
                    $_POST['descricao'], 
                    $_POST['preco'],
                    $_POST['marca'],
                    $nome_foto, 
                    $_POST['categoria']);
            }else{
                $this->model->atualizar(
                    $_POST['idproduto'],
                    $_POST['nome'], 
                    $_POST['descricao'], 
                    $_POST['preco'],
                    $_POST['marca'],
                    $nome_foto, 
                    $_POST['categoria']);
            }
            header('Location: ?c=produto');
        }else{
            echo "Ocorreu um erro, pois os dados não foram enviados";
        }
    }
}