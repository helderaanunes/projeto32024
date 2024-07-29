<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto32024/modelo/dao/BDPDO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto32024/modelo/vo/Usuario.php';

class UsuarioDAO {
    
    public function insert($usuario) {
        try {
            $sql = "INSERT INTO usuario (nome,email,login,senha) "
                    . "VALUES (:nome,:email,:login,:senha)";
            //perceba que na linha abaixo vai precisar de um import
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome", $usuario->getNome());
            $p_sql->bindValue(":email", $usuario->getEmail());
            $p_sql->bindValue(":login", $usuario->getLogin());
            $p_sql->bindValue(":senha", $usuario->getSenha());
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao executar a função de salvar" . $e->getMessage();
        }
    }
}
