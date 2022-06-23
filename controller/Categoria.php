<?php
require "../model/CategoriaModel.php";

$categoria = new CategoriaModel();
$categoria->inserir("SmartTV");
$categoria->excluir(12);
$categoria->atualizar(6, "SmartPhone");
var_dump($categoria->buscarPorId(6));
var_dump($categoria->buscarTudo());