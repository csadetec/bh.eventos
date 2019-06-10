<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Esperas_model extends CI_Model {


 	private $alunos = 'alunos';
 	private $esperas = 'esperas';
 	

 	/*
 	public function truncate(){
 		return $this->db->truncate($this->alunos);
 	}
 	/**/
 	public function insert($dados){
 		
 		$this->db->insert($this->esperas, $dados);
 		return $this->db->insert_id();
 		
 	}
 	
 	
 	public function update($id=0, $dados=null){
 		$this->db->where('id_espera', $id);
 		return $this->db->update($this->esperas, $dados);

 	}
 	/**/

  	public function select(){

		$this->db->select('e.id_espera, e.ra, e.email, e.qtd_convites, e.obs, '
		.'a.aluno'
		);

		$this->db->from($this->esperas.' as e');
		$this->db->join($this->alunos.' as a', 'e.ra = a.ra');
		$this->db->order_by('a.aluno', 'asc');
 		
 		return $this->db->get()->result();
 	}

	public function select_id($id=null){

 		$this->db->where('id_espera', $id);
 		return $this->db->get($this->esperas)->row();
 	}
 	/**/
 
}
 
 /* End of file Alunos_model.php */
 /* Location: ./application/models/Alunos_model.php */ ?>