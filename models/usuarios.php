<?php

class usuarios extends model {


	public function get_registros_query($query) {
		$array = array();

		$sql = "SELECT * FROM usuarios WHERE nome LIKE '$query'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function novo_usuario($nome,$email,$senha) {

		$sql = "SELECT * FROM usuarios WHERE email = '$email'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() == 0) {
			$sql = "INSERT INTO usuarios SET nome = '$nome', email = '$email', senha = '$senha'";
			$sql = $this->db->query($sql);
			if($sql->rowCount() > 0) {
				$_SESSION['flash'] = "Usuario adicionado com sucesso";
			}
		}else {
			$_SESSION['flash'] = "E-mail já está cadastrado";
		}
	}

	public function editar_registro($uid,$nome,$email,$senha) {
		
		$sql = "SELECT * FROM usuarios WHERE nome = '$nome' AND id = '$uid'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() == 0) {
			$sql = "SELECT * FROM usuarios WHERE email = '$email' AND id = '$uid'";
			$sql = $this->db->query($sql);

			$sql = "SELECT * FROM usuarios WHERE email = '$email'";
			$sql = $this->db->query($sql);
			
			if($sql->rowCount() == 0) {
				$sql = "UPDATE usuarios SET nome = '$nome', email = '$email', senha = '$senha' WHERE id = '$uid'";
				$sql = $this->db->query($sql);
				if($sql->rowCount() > 0) {
					$_SESSION['flash'] = 'Registro atualizado com sucesso';
					header("Location: ".BASE_URL."home/editar_registro/".$uid);
				}
			}else {
				$_SESSION['flash'] = 'Este e-mail já pertence a algum registro';
				header("Location: ".BASE_URL."home/editar_registro/".$uid);
			}
		}else {
			$_SESSION['flash'] = 'Este nome já pertence a este registro';
			header("Location: ".BASE_URL."home/editar_registro/".$uid);
		}
	}

	public function verify_user_id($uid) {

		$sql = "SELECT * FROM usuarios WHERE id = '$uid'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			return true;
		}else {
			return false;
		}
	}

	public function delete_usuario($uid) {

		$sql = "DELETE FROM usuarios WHERE id = '$uid'";
		$sql = $this->db->query($sql);
		
		if($sql->rowCount() > 0) {
			return true;
		}else {
			return false;
		}
	}

	public function get_registro_data($uid) {
		$array = array();

		$sql = "SELECT * FROM usuarios WHERE id = '$uid'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}
		
		return $array;
	}

	public function get_registros() {
		$array = array();

		$sql = "SELECT * FROM usuarios ORDER BY id ASC";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

}