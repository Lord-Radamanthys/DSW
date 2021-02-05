<?php
    include_once "BancoDados.php";
    class Registrado{

            public static function getLastId(){
                try{
                    $connection = BancoDados::getInstance()->getConnection();
                    $id = $connection->lastInsertId();
                    return $id;
                }
                catch(PDOException $e) {
                    echo $sql . "<br>" . $e->getMessage();
                }
            }

            public static function cadastrarUsuario($id, $data_cad, $email, $nickname, $senha)
            {
                try {
                    $connection = BancoDados::getInstance()->getConnection();
                    $stmt = $connection->prepare("INSERT INTO `registrado`(`id_user`, `data_cadastro`, `ultimo_acesso`, `comentarios`, `pastas`, `email`, `historico`, `nickname`, `senha`, `prof_pic`, `nivel`, `is_adm`, `data_adm`, `data_nasc`) VALUES (?, ?, '2020-01-23','', '', ?, 'sem historico', ?, ?, '.', 0, 0, '00-00-0000','00-00-0000')");
                    $stmt->execute([$id, $data_cad, $email, $nickname, $senha]);
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

            public static function deletarRegistrado($id)
        {
            try {
                $connection = BancoDados::getInstance()->getConnection();
                $stmt = $connection->prepare("DELETE FROM registrado WHERE id=?");
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
        
            public static function EditRegistrado($id, $nickname, $senha, $prof_pic){
            try {
                $connection = BancoDados::getInstance()->getConnection();
                $stmt = $connection->prepare("UPDATE registrado(id_user, data_cadastro, ultimo_acesso, comentarios, pastas, email, nickname, senha, prof_pic, nivel, id_forum, is_adm, data_adm) SET (id_user, data_cadastro, ultimo_acesso, comentarios, pastas, email, ?, ?, ?, nivel, id_forum, is_adm, data_adm) WHERE id=?");
                $stmt->execute([$id, $nickname, $senha, $prof_pic]);
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
            public static function EditRegistradoNickname($id, $nickname){
            try {
                $connection = BancoDados::getInstance()->getConnection();
                $stmt = $connection->prepare("UPDATE registrado(id_user, data_cadastro, ultimo_acesso, comentarios, pastas, email, nickname, senha, prof_pic, nivel, id_forum, is_adm, data_adm) SET (id_user, data_cadastro, ultimo_acesso, comentarios, pastas, email, ?, senha, prof_pic, nivel, id_forum, is_adm, data_adm) WHERE id=?");
                $stmt->execute([$id, $nickname]);
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
            public static function EditRegistradoPP($id, $prof_pic){
            try {
                $connection = BancoDados::getInstance()->getConnection();
                $stmt = $connection->prepare("UPDATE registrado(id_user, data_cadastro, ultimo_acesso, comentarios, pastas, email, nickname, senha, prof_pic, nivel, id_forum, is_adm, data_adm) SET (id_user, data_cadastro, ultimo_acesso, comentarios, pastas, email, nickname, senha, ?, nivel, id_forum, is_adm, data_adm) WHERE id=?");
                $stmt->execute([$id, $prof_pic]);
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

            public static function PegarUsuario($email, $senha){
            $userarray = array();
            try {
                $conexao = BancoDados::getInstance()->getConnection();
                $stmt = $conexao->prepare("SELECT * FROM registrado where email=? and senha=?");
                $stmt->execute([$email, $senha]);
                $userarray = $stmt->fetchAll();
            } catch(Exception $e) {
                echo $e->getMessage();
                exit;
            }
            return $userarray;
        }

            public static function RetornarUsuario($email, $senha){
                $resultado = array();
                try {
                    $conexao = BancoDados::getInstance()->getConnection();
                    $stmt = $conexao->prepare("SELECT * FROM registrado where email=? and senha=?");
                    $stmt->execute([$email, $senha]);
                    $resultado = $stmt->fetchAll();
                } catch(Exception $e) {
                    echo $e->getMessage();
                    exit;
                }
                if(count($resultado)>0){
                    return true;
                }
                else{
                    return false;
                }
            }

            public static function EditRegistradoPass($id, $senha){
            try {
                $connection = BancoDados::getInstance()->getConnection();
                $stmt = $connection->prepare("UPDATE registrado(id_user, data_cadastro, ultimo_acesso, comentarios, pastas, email, nickname, senha, prof_pic, nivel, id_forum, is_adm, data_adm) SET (id_user, data_cadastro, ultimo_acesso, comentarios, pastas, email, nickname, ?, prof_pic, nivel, id_forum, is_adm, data_adm) WHERE id=?");
                $stmt->execute([$id, $senha]);
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
    }
?>