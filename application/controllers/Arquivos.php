<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Arquivos extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->library('PHPExcel');
        $this->load->helper(array('download','file', 'excel_helper'));
        $this->load->model(array('alunos_model'));
        verifica_login();
        ini_set('max_execution_time', 240);
   
        
    }




    public function index() {


    }
    

    public function cadastrar(){
        

        $config['upload_path']          = './assets/planilhas/uploads/';
        $config['allowed_types']        = 'xlsx|xls|XLSX|XLS';
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
            redirect('arquivos/atualizar/'.$data['upload_data']['file_name']);
   
        endif;
        //endif;

        $data['titulo'] = 'Arquivos - Uploads';
        $data['page'] = 'arquivos/arquivos_form';
        $data['action'] = 'arquivos/cadastrar/';
        $data['btn_value'] = 'SALVAR';
      

        $this->load->view('load', $data, FALSE);

    }

    public function atualizar($arquivo='')
    {
        $full_path = './assets/planilhas/uploads/'.$arquivo;
        $excelReader = PHPExcel_IOFactory::createReaderForFile($full_path);
        
        @$excelObj = $excelReader->load($full_path);
        $worksheet = $excelObj->getSheet(0);
        $lastRow = $worksheet->getHighestRow();

        //pegar titulos das colunas
        $letras = range('A','Z');
        
        foreach($letras as $key=>$l):           
            if($worksheet->getCell($l.'1')->getValue()):
                $titulo[$key] = $worksheet->getCell($l.'1')->getValue();
                $titulo[$key] = strtolower($titulo[$key]);
            endif;
        endforeach;
        
        $cont_aluno = 1;

        for ($row = 2; $row <= $lastRow; $row++):

            if($worksheet->getCell('A'.$row)->getValue() != null):
                foreach($titulo as $key=>$t):
                    $alunos[$cont_aluno][$t] =  $worksheet->getCell($letras[$key].$row)->getValue();
                   
                endforeach;
                $cont_aluno++;

            endif;
        endfor;
        /*/
        echo '<pre>';
        print_r($titulo);
        print_r($alunos);
        echo '</pre>';
        /**/
        /** */

        foreach($alunos as $key=>$a):
        
            if($this->alunos_model->insert($a) == false):
                echo "Falha ao cadastrar";
                break;
            elseif(sizeof($alunos) == $key):
                set_msg("Banco de alunos Atualizado com Sucesso","success");
                redirect('alunos/listar');
            endif;
        endforeach;    

    }


}
