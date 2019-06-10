<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Esperas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('alunos_model','esperas_model'));
    $this->load->helper('form');
    $this->load->library(array('table', 'form_validation'));
    date_default_timezone_set('America/Sao_Paulo');
    verifica_login();
 
    
  }

   public function index(){

  }

  public function cadastrar($id_aluno = null){
    $aluno = $this->alunos_model->select_id($id_aluno);
    if(!$aluno)redirect('alunos/listar');

    $this->form_validation->set_rules('qtd_convites', 'CONVITES (Quantidade extra)', 'trim|required|integer');
    $this->form_validation->set_rules('email', 'EMAIL', 'trim|required|valid_email');
    
    if($this->form_validation->run() == false):
      if(validation_errors()):
        set_msg(validation_errors(), 'danger');
      endif;
    else:

      $post = $this->input->post();
      unset($post['emailmae']);
      unset($post['emailpai']);
      /**
      echo '<pre>';
      echo '<br>';
      print_r($post);
      echo '</pre>';
      /**/
      if($this->esperas_model->insert($post)):
        set_msg('Cadastrado para lista de espera com Sucesso'.'<br>'.'<b>'.'EMAIL: '.'</b>'.$post['email'].'<br>'.'<b>'.'Quantidade: '.'</b>'.$post['qtd_convites'], 'success');
        redirect('alunos/listar');
      else:
        set_msg('Falha ao registrar o emprestimo', 'danger');
       endif;
        /**/
    endif;


    $data['titulo'] = 'CADASTRO PARA A LISTA DE ESPERA';
    $data['page'] = 'esperas/esperas_form';
    $data['action'] = 'esperas/cadastrar/'.$id_aluno;
    $data['aluno'] = $aluno;
    $data['btn_value'] = 'CADASTRAR';

    $this->load->view('load', $data, FALSE);

  }

  public function editar($id_espera = null, $ra = null){
    $aluno = $this->alunos_model->select_ra($ra);
    $espera = $this->esperas_model->select_id($id_espera);
    
    if(!$aluno || !$espera)redirect('alunos/listar');
    
    $this->form_validation->set_rules('qtd_convites', 'CONVITES (Quantidade extra)', 'trim|required|integer');
    $this->form_validation->set_rules('email', 'EMAIL', 'trim|required|valid_email');
    
    if($this->form_validation->run() == false):
      if(validation_errors()):
        set_msg(validation_errors(), 'danger');
      endif;
    else:

      $post = $this->input->post();
      unset($post['emailmae']);
      unset($post['emailpai']);
      /*
      echo '<pre>';
      echo '<br>';
      print_r($post);
      echo '</pre>';
      /**/
      if($this->esperas_model->update($id_espera, $post)):
        set_msg('Atualizado para lista de espera com Sucesso'.'<br>'.'<b>'.'EMAIL: '.'</b>'.$post['email'].'<br>'.'<b>'.'Quantidade: '.'</b>'.$post['qtd_convites'], 'success');
        redirect('esperas/listar');
      else:
        set_msg('Falha ao registrar o emprestimo', 'danger');
       endif;
      
    endif;


    $data['titulo'] = 'CADASTRO PARA A LISTA DE ESPERA';
    $data['page'] = 'esperas/esperas_form';
    $data['action'] = 'esperas/editar/'.$id_espera.'/'.$ra;
    $data['aluno'] = $aluno;
    $data['espera'] = $espera;
    $data['btn_value'] = 'ATUALIZAR';

    $this->load->view('load', $data, FALSE);
    /** */

  }


  public function listar(){
      
    $esperas = $this->esperas_model->select();
    /*
    echo '<pre>';
    print_r($esperas);
    echo '</pre>';
    /**/

    $data['titulo'] = 'LISTA DE ESPERA';
    $data['page'] = 'esperas/esperas_listar';
    $data['esperas'] = $esperas;

    $this->load->view('load', $data, FALSE);

  }

  

     


}

/* End of file Alunos.php */
/* Location: ./application/controllers/Alunos.php */ ?>