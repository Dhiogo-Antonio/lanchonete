<?php

require_once "C:/Turma2/xampp/htdocs/lanchonete/controller/UsuarioController.php";
require_once "C:/Turma2/xampp/htdocs/lanchonete/db/database.php";

$UsuarioController = new UsuarioController($pdo);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $usuarios = $UsuarioController->deletar($id);
    header ('Location: ../../index.php');
} else{
    header ('Location: ../../index.php');
}




?>