<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 
        '/projeto32024/modelo/dao/UsuarioDAO.php';

if (isset($_GET['idDel'])){
    $dao= new UsuarioDAO();
    $dao->delete($_GET['idDel']);
    echo "<script> alert('Usuário removido com sucesso! :D ');"
. "window.location='../usuarioList.php';"
        . "</script>";
    die();
}

$usuarioQueEuVouSalvar = new Usuario();
$usuarioQueEuVouSalvar->setNome($_POST['nome']);
$usuarioQueEuVouSalvar->setEmail($_POST['email']);
$usuarioQueEuVouSalvar->setSenha($_POST['senha']);
$usuarioQueEuVouSalvar->setId($_POST['id']);
if ($_POST['id']=="0"){
    $dao= new UsuarioDAO();
    $dao->insert($usuarioQueEuVouSalvar);
}
else{
    $dao= new UsuarioDAO();
    $dao->update($usuarioQueEuVouSalvar);
}
echo "<script> alert('Usuário salvo com sucesso! :D ');"
. "window.location='../usuarioList.php';"
        . "</script>";