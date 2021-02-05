<?php
    include_once "BancoDados.php";
    class Area_Conhecimento{
        public static function cadastrarArea($nome, $datacriacao, $idADM_cadastro, $id)
        {
            try {
                $conexao = BancoDados::getInstance()->getConnection();
                $stmt = $conexao->prepare("INSERT INTO area_conhecimento(nome, idADM_cadastrou, idADM_removeu, dataCriacao, dataRemocao, idArea) VALUES (?, ?, "", ?, "", ?)");
                $stmt->execute([$nome, $idADM_cadastro, $data, $id]);
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

        public static function deletarArea($id){
            try{
                $conexao = BancoDados::getInstance()->getConnection();
                $stmt = $conexao->prepare("DELETE FROM area_conhecimento WHERE id=?");
                $stmt->execute([$id]);
                $linhas_alteradas = $stmt->rowCount();
            }
            catch (Exception $e) {
                echo $e->getMessage();
                exit;
            }
            if ($linhas_alteradas > 0){
                return true;
            }
            else{
                return false;
            }
        }

        public static function alterarArea($id, $nome){
            try{
                $conexao = BancoDados::getInstance()->getConnection();
                $stmt = $conexao->prepare("UPDATE FROM area_conhecimento(nome, idADM_cadastrou, idADM_removeu, dataCriacao, dataRemocao, idArea) VALUES (?, idADM_cadastrou, idADM_removeu, dataCriacao, dataRemocao, idArea) WHERE id=?");
                $stmt->execute([$id, $nome]);
                $linhas_alteradas = $stmt->rowCount();
            }
            catch (Exception $e) {
                echo $e->getMessage();
                exit;
            }
            if ($linhas_alteradas > 0){
                return true;
            }
            else{
                return false;
            }
        })
    }
?>