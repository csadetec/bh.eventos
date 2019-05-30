<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Databases extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('download','file'));
        verifica_admin();
        
    }




    public function index() {


    }
    

    public function importar(){
        

        $config['upload_path']          = './assets/planilhas/uploads/';
        $config['allowed_types']        = 'xlsx';
        $config['max_size']             = 0;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['overwrite']           = true;


        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile')):
            $error = array('error' => $this->upload->display_errors());
            set_msg($error['error'], 'danger');
        else:
            $data = array('upload_data' => $this->upload->data());
            set_msg('Upload com Sucesso!','success');
            redirect('arquivos/leitura/'.$data['upload_data']['file_name']);
   
        endif;
        //endif;

        $data['titulo'] = 'Arquivos - Uploads';
        $data['bread1'] = 'Arquivos';
        $data['bread2'] = 'Uploads';
        $data['page'] = 'arquivos/arquivos_form';
        $data['action'] = 'arquivos/uploads/';
        $data['btn_value'] = 'SALVAR';
      

        $this->load->view('load', $data, FALSE);

    }

    public function atualizar($arquivo='')
    {
        $this->alunos_model->delete_all();    
        
        $arquivo = ler_planilha($arquivo);

        foreach ($arquivo as $key => $q) {
            # code...
            if($this->alunos_model->insert($q) == false){
                echo "Falha ao cadastrar";
                break;
            }
            elseif(sizeof($arquivo) == $key){
               set_msg("Banco de alunos Atualizado com Sucesso","success");
               redirect('alunos/listar');
            }
        }
       


    }


}
