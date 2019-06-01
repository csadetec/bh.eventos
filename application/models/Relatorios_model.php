<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Relatorios_model extends CI_Model {


	private $alunos = 'alunos';
	private $esperas = 'esperas'; 

	
	public function select(){
		$this->db->select('count(*) as alunos_total, '
		.'(select count(*) from eventos_'.$this->alunos.' where status = 1) as alunos_pegaram, '
		.'(select count(*) from eventos_'.$this->alunos.' where status = 0) as alunos_no_pegaram, '
		.'(select count(*) from eventos_'.$this->alunos.' where status = 0) as alunos_no_pegaram, '
		.'(select count(*) from eventos_'.$this->esperas.') as  qtd_pessoas_espera, '
		.'(select sum(qtd_convites) from eventos_'.$this->esperas.') as  qtd_convites, '

		);
		return $this->db->get($this->alunos)->row();
	}
	public function alunos_pegaram(){
		$this->db->select('count(*)');	$this->db->where('Field / comparison', $Value);
		
		return $this->db->get($this->alunos)->row();
	}

		public function alunos_total(){
		$this->db->select('count(*)');
		return $this->db->get($this->alunos)->row();
	}


 

 
}
 
 /* End of file Alunos_model.php */
 /* Location: ./application/models/Alunos_model.php */ ?>