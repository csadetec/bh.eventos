<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorios extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
          $this->load->model(array('alunos_model', 'esperas_model', 'relatorios_model'));
        verifica_login();
       // ini_set('max_execution_time', 0);
    }

    public function index() {
        $relatorio  =  $this->relatorios_model->select();
        $qtd_pessoas = $relatorio->qtd_pessoas_espera;
        if($qtd_pessoas == 0)$qtd_pessoas = 1;
        $relatorio->media = ($relatorio->qtd_convites/$qtd_pessoas);
    
        $data['relatorio'] = $relatorio;
        $data['titulo'] = 'RELATÓRIO';
        $data['page'] = 'relatorios/relatorios_listar';
    
        $this->load->view('load', $data, FALSE);

    }
    

    

}
