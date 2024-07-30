<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto32024/modelo/dao/BDPDO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto32024/modelo/vo/Usuario.php';

class UsuarioDAO {
    
     public function getById($id) {
        try {
            $sql = "SELECT * FROM usuario WHERE id = :id";
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            $p_sql->execute();
            return $this->converterLinhaDaBaseDeDadosParaObjeto($p_sql->fetch(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
 um LOG do mesmo, tente novamente mais tarde.";
        }
    }
    
    private function converterLinhaDaBaseDeDadosParaObjeto($row) {
        $obj = new Usuario();
        $obj->setId($row['id']);
        $obj->setNome($row['nome']);
        $obj->setLogin($row['login']);
        $obj->setEmail($row['email']);
        $obj->setSenha($row['senha']);
        return $obj;
    }
    
    
     public function listAll() {
        try {
            $sql = "SELECT * FROM usuario order by nome asc";
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->execute();
            $lista = array();
            $row = $p_sql->fetch(PDO::FETCH_ASSOC);
            while ($row) {
                $lista[] = $this->converterLinhaDaBaseDeDadosParaObjeto($row);
                $row = $p_sql->fetch(PDO::FETCH_ASSOC);
            }
            return $lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
 um LOG do mesmo, tente novamente mais tarde.";
        }
    }
    
    
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
