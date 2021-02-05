<?php
    include_once "BancoDados.php";
    class Artigo{

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

        public static function cadastrarArtigo($id_user, $id, $titulo, $DOI, $conteudo, $datapublicacao)
        {
            try {
                $connection = BancoDados::getInstance()->getConnection();
                $stmt = $connection->prepare("INSERT INTO artigo(id_user, id_artigo, title, DOI, conteudo, data_publicacao, avaliacoes) VALUES (?, ?, ?, ?, ?, ?, 0)");
                $stmt->execute([$id_user, $id, $titulo, $DOI, $conteudo, $datapublicacao]);
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

        public static function deletarCliente($id)
    {

        try {
            $connection = BancoDados::getInstance()->getConnection();
            $stmt = $connection->prepare("DELETE FROM artigo WHERE id=?");
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
    
    public static function EditAvaliacoes($id, $avaliacao){
        try {
            $connection = BancoDados::getInstance()->getConnection();
            $stmt = $connection->prepare("UPDATE artigo(id_artigo, id_user, DOI, autores, datapublicacao, titulo, avaliacoes) SET (id_artigo, id_user, DOI, autores, datapublicacao, titulo, avaliacoes + ?) WHERE id=?");
            $stmt->execute([$id, $avaliacao]);
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

    public static function editarArtigo($id, $DOI, $autores, $titulo, $datapublicacao)
    {
        try {
            $connection = BancoDados::getInstance()->getConnection();
            $stmt = $connection->prepare("UPDATE artigo(id_artigo, id_user, DOI, autores, datapublicacao, titulo, avaliacoes) SET (id_artigo, id_user, ?, ?, ?, ?, avaliaacoes) WHERE id=?");
            $stmt->execute([$id, $DOI, $autores, $titulo, $datapublicacao]);
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