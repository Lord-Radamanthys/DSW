<?php
    include_once "BancoDados.php";
    class Forum{
        public static function cadastrarForum($id, $email_reg, $titulo, $criador, $positivas, $negativas)
        {
            try {
                $connection = BancoDados::getInstance()->getConnection();
                $stmt = $connection->prepare("INSERT INTO forum(id_forum, id_user, email_reg, titulo, criador, positivas, negativas, motivoRemocao, dataRemocao) VALUES (?, "", ?, ?, ?, 0, 0, "", "")");
                $stmt->execute([$id, $email_reg, $titulo, $criador, $positivas, $negativas]);
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

        public static function deletarForum($id)
    {
        try {
            $connection = BancoDados::getInstance()->getConnection();
            $stmt = $connection->prepare("DELETE FROM forum WHERE id=?");
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
    
        public static function EditForumTitle($id, $title){
        try {
            $connection = BancoDados::getInstance()->getConnection();
            $stmt = $connection->prepare("UPDATE Forum(id_forum, id_user, email_reg, titulo, criador, positivas, negativas, motivoRemocao, dataRemocao) SET (id_forum, id_user, email_reg, ?, criador, positivas, negativas, motivoRemocao, dataRemocao) WHERE id=?");
            $stmt->execute([$id, $title]);
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
        public static function MotivoRemover($id, $motivo){
        try {
            $connection = BancoDados::getInstance()->getConnection();
            $stmt = $connection->prepare("UPDATE Forum(id_forum, id_user, email_reg, titulo, criador, positivas, negativas, motivoRemocao, dataRemocao) SET (id_forum, id_user, email_reg, titulo, criador, positivas, negativas, ?, dataRemocao) WHERE id=?");
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
?>