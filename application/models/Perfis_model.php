<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Perfis_model extends CI_Model {


 	private $perfis = 'perfis';
 	

 	/*
 	public function truncate(){
 		return $this->db->truncate($this->table_alunos);
 	}
 	/**/
 	public function select(){
 		$this->db->order_by('nome_perfil', 'asc'); 		
 		return $this->db->get($this->perfis)->result();
 		
 	}
 	
 	
 	
 	/**/
 
}
 
 /* End of file Alunos_model.php */
 /* Location: ./application/models/Alunos_model.php */ ?>