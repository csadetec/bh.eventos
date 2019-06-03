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

 	//	$this->db->where('turma !=', "");
  		$this->db->select('a.id_aluno, a.ra, a.nome_aluno, a.nome_pai, a.nome_mae, a.status, a.serie, a.data, a.horas');

		$this->db->from($this->alunos.' as a');
		$this->db->where_in('serie', array('PRIMEIRO PERIODO', 'SEGUNDO PERIODO', 'PRIMEIRO ANO', 'SEGUNDO ANO', 'TERCEIRO ANO', 'QUARTO ANO', 'QUINTO ANO'));
		$this->db->order_by('a.serie', 'asc');
  		$this->db->order_by('a.nome_aluno', 'asc');
		
		 
 		
 		return $this->db->get()->result();
 	}
 	public function select_id($id=null){

 		$this->db->where('id_aluno', $id);
 		return $this->db->get($this->alunos)->row();
 	}

 	public function cont_status(){
 		$this->db->select('count(status) as status');
 		$this->db->where('status', 1);
 		return $this->db->get($this->alunos)->row();


 	}

 	public function select_ultimo_status(){
 		$this->db->order_by('data', 'desc');
 		$this->db->order_by('horas', 'desc');
 		$this->db->limit(5);
 		return $this->db->get($this->alunos)->result();
 	}

 
}
 
 /* End of file Alunos_model.php */
 /* Location: ./application/models/Alunos_model.php */ ?>