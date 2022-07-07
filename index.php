<?php

$base_url = "http://localhost/jose/projeto_final/index.php";
function base_url(){
  global $base_url;
  return  $base_url;  
}


//verifica se foi enviado a variável c que contém
//o nome do controlador que eu quero executar
if(isset($_GET["c"])){
  $controller = ucfirst($_GET["c"]);
  $caminho_controller = "controller/$controller.php";


  if(file_exists($caminho_controller)){
     require $caminho_controller;

     $obj = new $controller();
     $funcao = $_GET['m'] ?? "index";

    if(is_callable(array($obj, $funcao))){
        $id = $_GET["id"] ?? "";
        call_user_func_array(array($obj, $funcao), array($id));
    }
  }
}
