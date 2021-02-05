<?php
    include_once "BancoDados.php";
    class Usuario {
        
        public static function inserirUsuario($id){
            try {
                $connection = BancoDados::getInstance()->getConnection();
                $stmt = $connection->prepare("INSERT INTO usuario (id_user, nivel, id_artigo, id_forum) values (?, 0, -1, -1)");
                $stmt->execute([$id]);
                $linhas_alteradas = $stmt->rowCount();
            } catch (Exception $e) {
                echo $e->getMessage();
                exit;
            }
    
            if ($linhas_alteradas > 0) {
                return true;
            } else {
                return false;
            }
        }

        public static function deletarUsuario($id)
    {
        try {
            $connection = BancoDados::getInstance()->getConnection();
            $stmt = $connection->prepare("DELETE FROM usuario WHERE id=?");
            $stmt->execute([$id]);
            $linhas_alteradas = $stmt->rowCount();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }

        if ($linhas_alteradas > 0) {
            return true;
        } else {
            return false;
        }
    }

        public static function retornarAcessos()
    {
        $resultado = array();

        try {
            $conexao = BancoDados::getInstance()->getConnection();
            $stmt = $conexao->prepare("SELECT u.id AS usuarioAcessou FROM usuario u INNER JOIN artigo a ON u.idArtigo = a.id");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }

        return $resultado;
    }
    }
?>