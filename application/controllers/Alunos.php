<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alunos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('alunos_model');
    $this->load->library(array('table'));
    date_default_timezone_set('America/Sao_Paulo');
    verifica_login();
   
    
  }

  public function index(){
    require './vendor/autoload.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $options = array(
        'cluster' => 'us2',
        'useTLS' => true
      );
      $pusher = new Pusher\Pusher(
        'f813cff7b76bbbb4a529',
        '6d64e715c72e3120935a',
        '789970',
        $options
      );

    $data['message'] = $_POST['msg'];
    $pusher->trigger('my-channel', 'my-event', $data);

  }

    $this->load->view('teste');


  }

  public function cadastrar(){

  }



     
  public function editar($id=0)
  {
    $data['aluno'] = $this->alunos_model->select_id($id);
    if(!$data['aluno'] || !$id)redirect('alunos/listar');
  
    if($post = $this->input->post()):
      if($this->alunos_model->update($id, $post)):
        set_msg('Atualizado com Sucesso', 'success');
        redirect('alunos/listar/'.$id);
      else:
        set_msg('Falha ao atualizar', 'danger');
      endif;
    endif;

    $data['titulo'] = 'Aluno Editar';
    $data['bread1'] = 'Alunos';
    $data['bread2'] = 'Editar';
    $data['page'] = 'alunos/alunos_form';
    $data['action'] = 'alunos/editar/'.$id;
    $data['btn_value'] = 'SALVAR';

    $this->load->view('load', $data, FALSE);


  }

  public function editar_ajax($id=0)
  {
    
    require './vendor/autoload.php';
     $options = array(
      'cluster' => 'us2',
      'useTLS' => true
     );
    $pusher = new Pusher\Pusher(
      'f813cff7b76bbbb4a529',
      '6d64e715c72e3120935a',
      '789970',
      $options
     );

 

    if($post = $this->input->post()):
        $data['id_aluno'] = $id;
        $data['status'] = $post['status'];
        $pusher->trigger('my-channel', 'my-event', $data);
      if($this->alunos_model->update($id, $post)):
         //echo json_encode($data, JSON_UNESCAPED_UNICODE);
        echo 'success';
      else:
        echo 'fail';
      endif;
    endif;
  }


  public function listar(){
  
    $data['alunos'] = $this->alunos_model->select();
    $data['titulo'] = 'LISTA DOS ALUNOS';
    $data['page'] = 'alunos/alunos_listar';
    $data['a-nav-link']  = 'ALUNOS';
    
    $this->load->view('load', $data, FALSE);

  }


  public function listar_ultimo_status(){
    $alunos = $this->alunos_model->select_ultimo_status();
    echo json_encode($alunos, JSON_UNESCAPED_UNICODE);
  }

  public function listar_ajax(){

    $alunos = $this->alunos_model->select();

    echo json_encode($alunos, JSON_UNESCAPED_UNICODE); 
  }

}

/* End of file Alunos.php */
/* Location: ./application/controllers/Alunos.php */ ?>