<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$aviso = null;

function convite_turno($s){
    if($s == 'TERCEIRA SÉRIE' or  $s == 'SEGUNDA SÉRIE' or $s == 'PRIMEIRA SÉRIE' or $s == 'NONO ANO' or $s == 'OITAVO ANO' or $s == 'SÉTIMO ANO' or $s == 'SEXTO ANO' )return 'CONVITE NOITE';
    return 'CONVITE MANHÃ';

}
function rename_turma($t){

}
function txt_status($s){
    if($s == 1){
        return 'CONVITE ENVIADO';
    }
    return 'CONVITE DISPONÍVEL';

}

function class_status($s){
    if($s == 1){
        return 'btn-outline-danger';
    }
    return 'btn-outline-success';
}

/**/
function set_label($obs, $pontos){
    if($obs and $pontos){

        return '! '.$pontos ;
    }elseif($pontos){
         return '<i class="fas fa-eye"></i> '.$pontos;
    }

    return '<i class="fas fa-eye"></i>';
}
function set_title($obs){
    if($obs){
        return  $obs;
    }

    return 'Visualizar Jogo';
}
/**/

function set_nome_equipe($e1, $e2, $e3, $e4, $e5){
    $equipe = array($e1, $e2, $e3, $e4, $e5);
    $texto = null;
  
    foreach($equipe as $key=>$e):
        if($e):
            $texto .= $e.'<br>';
        //$texto .= $e.'<br>';
       
        endif;
    endforeach;
    $number  = strrpos($texto, '<br>');
    $texto = substr_replace($texto, '', $number);
    /*
    echo '<pre>';
    var_dump($texto);
    echo '</pre>';
    */
    return $texto;
    //print_r($texto);
   
}
function set_pontos($e1, $e2, $e3, $e4, $e5){
    $equipe = array($e1, $e2, $e3, $e4, $e5);
    $texto = null;
  
    foreach($equipe as $key=>$e):
        if($e):
            $texto .= $e.'-';
        //$texto .= $e.'<br>';
       
        endif;
    endforeach;
    $number  = strrpos($texto, '-');
    $texto = substr_replace($texto, '', $number);
    /*
    echo '<pre>';
    var_dump($texto);
    echo '</pre>';
    */
    return $texto;
    //print_r($texto);
   
}

function strclear($string){
    /*
    $search = array('á','é', 'ê', 'ú','ç','ã', 'í', 'ô');
    $replace= array('Á','É', 'Ê','U','Ç', 'Ã', 'Í', 'Ô');
    /**/
    $serach = array ('Á','Â', 'É', 'Í', 'Ú');
    $replace= array('A','E', 'E','I','U');

    $string = str_replace($search, $replace, $string);
        $string = strtolower($string);

    return $string;
}


function set_data($data=''){
    if($data != ""):
        $data = strtotime($data);
        return date('d/m',$data);
    endif;
    return "";
}
if (!function_exists('set_msg')):

    function set_msg($aviso = null, $class = null) {
        //seta uma mensagem via session para ser lida posteriormente
        $CI = & get_instance();


        $CI->session->set_userdata('aviso', $aviso);
        $CI->session->set_userdata('class', 'alert alert-' . $class);
    }

endif;

if (!function_exists('get_msg')):

    //retorna uma mensagem definida pela função set_msg
    function get_msg($destroy = true) {
        $CI = & get_instance();

        $retorno = $CI->session->userdata();
        if ($destroy):
            $CI->session->unset_userdata('aviso');
            $CI->session->unset_userdata('class');

        endif;
        return $retorno;
    }

endif;


function verifica_login() {
    $CI = & get_instance();

    if ($CI->session->userdata('logged') != TRUE):
        set_msg('Acesso Restrito! Faça Login para continuar. ', 'warning');
        redirect('login');
    endif;
}



function verifica_admin() {
    $CI = & get_instance();
    $id_perfil = $CI->session->userdata('id_perfil');
    # 2 - juiz
    # 3 - coordenador
    # 4 - alunos

    if($id_perfil == 2 or $id_perfil == 3):
        redirect('locais/listar');
    elseif($id_perfil == 4):
        redirect('jogos/turmas');
    endif;
}

function verifica_admin_coordenador(){
    $CI = & get_instance();
    $id_perfil = $CI->session->userdata('id_perfil');
    # 2 - juiz
    # 4 - alunos

    if($id_perfil == 2):
        redirect('locais/listar');
    elseif($id_perfil == 4):
        redirect('jogos/turmas');
    endif;
}
function verifica_admin_coordenador_juiz(){
    $CI = & get_instance();
    $id_perfil = $CI->session->userdata('id_perfil');
    
    #4 - aluno

    if($id_perfil == 4):
        redirect('jogos/turmas');
    endif;
}

