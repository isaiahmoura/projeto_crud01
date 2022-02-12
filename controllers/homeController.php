<?php

class homeController extends controller {

	public function __construct() {
	}

	public function index() {
		$data = array();
		$u = new usuarios();

		$this->loadTemplate('home', $data);
	}

	public function query_registros() {
		$data = array();
		$usuarios = new usuarios();

		if(isset($_POST['registros_query'])) {
			
			$query = addslashes($_POST['query']);
			
			if(!empty($query)) {
				$data['get_registros_query'] = $usuarios->get_registros_query($query);
			}
		}

		$this->loadTemplate('query_registros', $data);
	}

	public function registros() {
		$data = array();
		$usuarios = new usuarios();

		$data['get_registros'] = $usuarios->get_registros();

		$this->loadTemplate('registros', $data);
	}

	public function novo_usuario() {
		$data = array();
		$usuarios = new usuarios();

		if(isset($_POST['nome'])) {
			$nome = addslashes($_POST['nome']);
			$email = addslashes($_POST['email']);
			$confirmar_senha = addslashes($_POST['confirmar_senha']);
			$senha = addslashes($_POST['senha']);

			if(!empty($nome) && !empty($email) && !empty($senha) && !empty($confirmar_senha)) {
				if($confirmar_senha == $senha) {
					$senha_crypt = md5($senha);
					$usuarios->novo_usuario($nome,$email,$senha_crypt);
				}else {
					$_SESSION['flash'] = "Senha e confirmar senha não conferem";
				}
			}else {
				$_SESSION['flash'] = "Preencha todos os campos";
			}
		}

		$this->loadTemplate('novo_usuario', $data);
	}

	public function editar_registro($uid) {
		$data = array();
		unset($_SESSION['flash']);
		$usuarios = new usuarios();

		if($usuarios->verify_user_id($uid) == false) {
			header("Location: ".BASE_URL."home/erro_404");
		}

		$data['get_registro_data'] = $usuarios->get_registro_data($uid);

		$this->loadTemplate('editar_registro', $data);
	}

	public function editar_registro_action($uid) {
		$usuarios = new usuarios();

		if($usuarios->verify_user_id($uid) == false) {
			header("Location: ".BASE_URL."home/erro_404");
		}

		if(isset($_POST['registro'])) {
			$nome = addslashes($_POST['nome']);
			$email = addslashes($_POST['email']);
			$confirmar_senha = addslashes($_POST['confirmar_senha']);
			$senha = addslashes($_POST['senha']);

			if(!empty($nome) && !empty($email) && !empty($senha) && !empty($confirmar_senha)) {
				if($confirmar_senha == $senha) {
					$senha_crypt = md5($senha);
					$usuarios->editar_registro($uid,$nome,$email,$senha_crypt);
				}else {
					$_SESSION['flash'] = "Senha e confirmar senha não conferem";
				}
			}else {
				$_SESSION['flash'] = "Preencha todos os campos";
			}
		}
	}

	public function delete_usuario() {
        if(!empty($_POST['id'])) {
            $id_usuario = addslashes($_POST['id']);
            $usuarios = new usuarios();

            if($usuarios->verify_user_id($id_usuario) == true) {
                $test = false; 
				$usuarios->delete_usuario($id_usuario);
                if($test == true) {
                    $_SESSION['flash'] = 'Usuário deletado com sucesso';
                    header("Location: ".BASE_URL."home/registros");
                }
            } else {
                header("Location: ".BASE_URL."home/registros");
            }
        }
    }

	public function erro_404() {
		$data = array();
		$u = new usuarios();

		$this->loadTemplate('erro_404', $data);
	}
}