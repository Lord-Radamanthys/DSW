<?php
    include_once "BancoDados.php";
    class Msg_forum{
        public static function postarMensagem($id_forum, $id_user, $data_publicada, $avaliacoes, $conteudo, $motivoRemocao, $dataRemocao)
		try {
			$conexao = BancoDados::getInstance()->getConnection();
			$stmt = $conexao->prepare("INSERT INTO mensagem_forum(id_forum, id_user, data_publicada, avaliacoes, conteudo, motivoRemocao, dataRemocao) VALUES (?, ?, ?, 0, ?, "", "")");
			$stmt->execute([$id_forum, $id_user, $data_publicada, $avaliacoes, $conteudo, $motivoRemocao, $dataRemocao]);
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

	public static function editarMensagem($id, $conteudo){
		try{
			$conexao = BancoDados::getInstance()->getConnection();
			$stmt = $conexao->prepare("UPDATE FROM mensagem_forum(id_forum, id_user, data_publicada, avaliacoes, conteudo, motivoRemocao, dataRemocao) VALUES (id_forum, id_user, data_publicada, avaliacoes, ?, motivoRemocao, dataRemocao) WHERE id=?");
			$stmt->execute([$id, $conteudo]);
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