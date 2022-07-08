<?php

$base_url = "http://localhost/jose/projeto_final/index.php";
$controlador_padrao = "home";

        $controller = ucfirst($_GET['c'] ?? $controlador_padrao);
        $path_controller = "controller/$controller.php";

        //verifica se o arquivo de controller existe
        if(file_exists($path_controller)){
            require $path_controller;

            //verifica se foi enviada a variável
            //que contém o método do cotrolador que desejo executar
                $metodo = $_GET['m'] ?? "index";

                //cria o objeto controlador
                $obj = new $controller();
                $id = $_GET['id'] ?? null;

                //verifica se o controlador possui uma função
                if(is_callable(array($obj, $metodo))){
                    //executa o método do controlador
                    call_user_func_array(array($obj, $metodo), array($id));
                }
        }



        function base_url(){
            global $base_url;
            return $base_url;
        }

