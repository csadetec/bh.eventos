<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Alunos_model extends CI_Model {


 	private $alunos = 'alunos';
 	


 	public function truncate(){
 		return $this->db->truncate($this->alunos);
 	}
 	public function insert($dados){
 		
 		$this->db->insert($this->alunos, $dados);
 		return $this->db->insert_id();
 		
 	}
 
 	public function update($id=0, $dados=null){
 		$this->db->where('id_aluno', $id);
 		return $this->db->update($this->alunos, $dados);

 	}

  public function select(){

		$this->db->order_by('codturma', 'asc');
  		$this->db->order_by('aluno', 'asc');
		
		 
 		
 		return $this->db->get($this->alunos)->result();
 	}
 	public function select_id($id=null){

 		$this->db->where('id_aluno', $id);
 		return $this->db->get($this->alunos)->row();
	}
	
	public function select_ra($ra = null){
		$this->db->where('ra', $ra);
		return $this->db->get($this->alunos)->row();
		
		
	}

 	public function cont_status(){
 		$this->db->select('count(status) as status');
 		$this->db->where('status', 1);
 		return $this->db->get($this->alunos)->row();


 	}

 
 
}
 
 /* End of file Alunos_model.php */
 /* Location: ./application/models/Alunos_model.php */ ?>