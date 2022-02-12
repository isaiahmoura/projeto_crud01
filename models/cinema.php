<?php

class cinema extends model {

    public function getGeneros() {
        $array = array();
        $limit = 15;

        $sql = "SELECT * FROM cinema 
            LIMIT $limit
        ";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        return $array;
    }

    public function filme_adicao($filme_titulo,$filme_data,$filme_img,$filme_generos = '') {
        $formatos_permitidos = array(
            "jpg",
            "jpeg",
            "png"
        );
        $extensao = pathinfo($_FILES['file_img']['name'], PATHINFO_EXTENSION);
        $distribuidora = 'Nenhuma';
        if(in_array($extensao,$formatos_permitidos)) {
            $pasta_destino = "assets/images/cases/";
            $file_temporario = $_FILES['file_img']['tmp_name'];
            $filme_img = uniqid().".$extensao";
            move_uploaded_file($file_temporario,$pasta_destino.$filme_img);
            
            $sql = "SELECT * FROM cinema WHERE nome = '$filme_titulo'";
            $sql = $this->db->query($sql);
            
            if($sql->rowCount() == 0) {
                //echo "entrou";exit;
                $sql = "INSERT INTO cinema 
                    SET 
                    nome = '$filme_titulo', 
                    tipo = 'filme', 
                    capa_img = '$filme_img', 
                    data_lancamento = '$filme_data',
                ";
                $sql = $this->db->query($sql);
                header("Location: ".BASE_URL."perfil/funcoes_crud");
            }else {
                echo "Filme inserido já está cadastrado";
            }
        }else {
            echo "Envie um arquivo nos seguintes formatos, JPEG,JPG ou PNG";
        }
    }

    public function delete_filme_crud($filme_id) {
        $sql = "DELETE FROM cinema WHERE id = '$filme_id'";
        $sql = $this->db->query($sql);

        $get_img = "SELECT capa_img FROM cinema WHERE id = '$filme_id'";
        $query = $this->db->query($sql);

        if($query->rowCount() > 0) {
            $arquivo = $query->fetch();
            if(file_exists($arquivo)) {
                unlink($arquivo);
            }
        }
    }

    public function getFilmes($limit = '') {
        $array = array();

        $sql = "SELECT * FROM cinema LIMIT $limit";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function get_filme_info($id_filme) {
        $array = array();

        $sql = "SELECT * FROM cinema WHERE id = '$id_filme'";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

    public function getFilmes_Crud() {
        $array = array();

        $sql = "SELECT * FROM cinema ORDER BY data_lancamento";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }
}

?>