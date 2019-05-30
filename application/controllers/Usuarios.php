<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('usuarios_model', 'perfis_model'));	
		$this->load->library(array('form_validation', 'table'));
	}

	public function index()
	{
		
	}

	public function editar($id=""){
		verifica_login();
		verifica_admin();

		$data['usuario'] = $this->usuarios_model->select_id($id);

		if($data['usuario']):
			$this->form_validation->set_rules('nome', 'NOME DO USUÁRIO', 'trim|strclear|strtoupper|required');
			$this->form_validation->set_rules('senha', 'SENHA', 'trim|required');
			$this->form_validation->set_rules('id_perfil', 'PERFIL', 'trim|required');
		
			if($this->form_validation->run() == false):
				if(validation_errors()):
					set_msg(validation_errors(), "danger");
				endif;
			else:
				$post = $this->input->post();
		
				if($this->usuarios_model->update($id, $post)):
					set_msg("Editado com Sucesso!", 'success');
					redirect('usuarios/listar');
				else:
					set_msg("Falha ao Cadastrar", "danger");
				endif;
			/**/
			endif;

		else:
			redirect('usuarios/listar');

		endif;
		
	
	
        $data['titulo'] = 'Usuários - Editar';
      	$data['page'] = 'usuarios/usuarios_form';
		$data['action'] = 'usuarios/editar/'.$id;
		$data['perfis'] = $this->perfis_model->select();

		$data['btn_value'] = 'SALVAR';

		$this->load->view('load',$data);
		
	}

	public function cadastrar(){
		verifica_login();
		verifica_admin();

		
		$this->form_validation->set_rules('nome', 'NOME DO USUÁRIO', 'trim|strclear|strtoupper|required');
		$this->form_validation->set_rules('usuario', 'USUÁRIO', 'trim|required|is_unique[eventos_usuarios.usuario]');
		$this->form_validation->set_rules('senha', 'SENHA', 'trim|required');
		$this->form_validation->set_rules('id_perfil', 'PERFIL', 'trim|required');
		
		if($this->form_validation->run() == false):
			if(validation_errors()):
				set_msg(validation_errors(), "danger");
			endif;
		else:
			$post = $this->input->post();
			/**
			echo '<pre>';
			print_r($post);
			echo '</pre>';
			/**/
			/**/
			if($this->usuarios_model->insert($post)):
				set_msg("Cadastrado com Sucesso!", 'success');
				redirect('usuarios/listar');
			else:
				set_msg("Falha ao Cadastrar", "danger");
			endif;
			/**/
		endif;
	
        $data['titulo'] = 'Usuários - cadastrar';
     
		$data['page'] = 'usuarios/usuarios_form';
		$data['action'] = 'usuarios/cadastrar/';
		$data['btn_value'] = 'CADASTRAR';
		$data['perfis'] = $this->perfis_model->select();
	
		$this->load->view('load',$data);
		
	}

	public function listar(){
		verifica_login();
		verifica_admin();

        $data['titulo'] = 'LISTA DOS USUÁRIOS';
        $data['page'] = 'usuarios/usuarios_listar';
		$data['usuarios'] = $this->usuarios_model->select_all();
	
		$this->load->view('load',$data);
		
	}

	public function login(){
		$this->form_validation->set_rules('usuario', 'USUÁRIO', 'trim|required');
		$this->form_validation->set_rules('senha', 'SENHA', 'trim|required');
		
		if ($this->form_validation->run() == false):
			if (validation_errors()):
				set_msg(validation_errors(), 'danger');
			endif;


		else:
			$post = $this->input->post();
         			
			if ($q = $this->usuarios_model->select(array('usuario' => $post['usuario']))):
				if ($this->usuarios_model->select($post)):

					$this->session->set_userdata('logged', true);
					$this->session->set_userdata('id_usuario', $q->id_usuario);
					$this->session->set_userdata('nome', $q->nome);
					$this->session->set_userdata('email', $q->email);
					$this->session->set_userdata('usuario', $q->usuario);					
					$this->session->set_userdata('id_perfil', $q->id_perfil);				
					$this->session->set_userdata('nome_perfil', $q->nome_perfil);	
					redirect('alunos/listar');
					/*
					echo '<pre>';
					print_r($_SESSION);
					echo '</pre>';
					/**/
				else:
					set_msg('Senha Incorreta!', 'danger');
				endif;

			else:
				set_msg('Usuário não Cadastrado.', 'danger');
			endif;
			/**/

		endif;


		$this->load->view('usuarios/login');
	}

	public function sair(){
		set_msg('Obrigado pela Visita!', 'info');
		$this->session->unset_userdata('logged');
		$this->session->unset_userdata('id_usuario');
		$this->session->unset_userdata('nome');
		$this->session->unset_userdata('usuario');
		$this->session->unset_userdata('id_perfil');
		$this->session->unset_userdata('nome_perfil');
		$this->session->unset_userdata('id_turma');
		redirect('login');


	}

}

/* End of file Usuarios.php */
/* Location: ./application/controllers/Usuarios.php */