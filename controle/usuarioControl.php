<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 
        '/projeto32024/modelo/dao/UsuarioDAO.php';

$usuarioQueEuVouSalvar = new Usuario();
$usuarioQueEuVouSalvar->setNome($_POST['nome']);
$usuarioQueEuVouSalvar->setEmail($_POST['email']);
$usuarioQueEuVouSalvar->setSenha($_POST['senha']);

$dao= new UsuarioDAO();
$dao->insert($usuarioQueEuVouSalvar);