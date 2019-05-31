<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	
	
	//Função Ler a planilha e salvo os lidos no banco de dados
	function renomear_titulo($titulo){

		$titulo = strtolower($titulo);
		
		if($titulo == 'nome')return 'nome_aluno';
		if($titulo == 'ra')return 'ra';
		if($titulo == 'serie')return 'serie';
		if($titulo == 'nome_pai')return 'nome_pai';
		if($titulo == 'nome_mae')return 'nome_mae';
		return 'unset';

	}


	function set_id_curso($codcur=0, $codper=0){
		if($codcur == 23 and $codper == 3):
			return 1;
		elseif($codcur == 23 and $codper == 2):
			return 2;
		elseif($codcur == 23 and $codper == 1):
			return 3;
		elseif($codcur == 22 and $codper == 9):
			return 4;
		elseif($codcur == 22 and $codper == 8):
			return 5;
		elseif($codcur == 22 and $codper == 7):
			return 6;
		elseif($codcur == 22 and $codper == 6):
			return 7;
		elseif($codcur == 22 and $codper == 5):
			return 8;
		elseif($codcur == 22 and $codper == 4):
			return 9;
		elseif($codcur == 22 and $codper == 3):
			return 10;
		elseif($codcur == 22 and $codper == 2):
			return 11;
		elseif($codcur == 22 and $codper == 1):
			return 12;
		endif;
	}

	

 ?>