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

		$this->db->select('e.id_espera, e.id_aluno, e.email, e.qtd_convites, e.obs, '
		.'a.nome_aluno'
		);

		$this->db->from($this->esperas.' as e');
		$this->db->join($this->alunos.' as a', 'e.id_aluno = a.id_aluno');
		$this->db->order_by('a.nome_aluno', 'asc');
		$this->db->order_by('a.serie', 'asc');
 		
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