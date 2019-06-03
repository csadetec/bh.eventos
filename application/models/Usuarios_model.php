<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	private $usuarios = 'usuarios';





	public function select($dados=""){


		$this->db->select('u.id_usuario, u.nome, u.usuario, u.email,  u.id_perfil');
		$this->db->from($this->usuarios.' as u');
	
		$this->db->where($dados);

		return $this->db->get()->row();
	}

	public function select_all(){
		$this->db->select('u.id_usuario, u.nome, u.usuario,  u.id_perfil');
		$this->db->from($this->usuarios.' as u');
		$this->db->order_by('u.nome', 'asc');
		return $this->db->get()->result();
	}

	public function insert($dados=''){
		$this->db->insert($this->usuarios, $dados);
		return $this->db->insert_id();
	}

	public function select_id($id=""){
		$this->db->where('id_usuario', $id);
		return $this->db->get($this->usuarios)->row();
	}

	public function update($id, $dados){
		$this->db->where('id_usuario', $id);
		return $this->db->update($this->usuarios, $dados);
	}
	

}

/* End of file Usuarios_model.php */
/* Location: ./application/models/Usuarios_model.php */