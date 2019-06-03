<div class="card card-register">
  <div class="card-header">Dados do Aluno</div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-3">
        <img class="img-rounded" style="margin-bottom:10px; height: 200px; max-width: 100%;"  src="<?php echo base_url('./assets/imagens/alunos/'.@$aluno->ra.'.jpg?'.date('h:i:s')) ?> " alt="<?php echo @$aluno->nome_aluno ?> ">
     
        <?php echo anchor('registros/cadastrar/'.@$aluno->id_aluno, ' <i class="fas fa-id-card" style="font-size:20px"></i> Emprestar Cartão', array('class'=>'btn btn-primary btn-block')); ?>
        <?php echo anchor('alunos/deletar_foto/'.@$aluno->ra.'.jpg/'.@$aluno->id_aluno, ' <i class="fas fa-trash" style="font-size:20px"></i> Apagar Foto', array('class'=>'btn btn-danger btn-block')); ?>
          
      </div>
      <div class="col-md-9">
        <?php echo form_open_multipart($action, array('id'=>'form'));?>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="foto"><b>Selecione uma Foto (Extensão .jpg)</b></label>
              <input type="file" name="foto" id="foto" class="form-control" placeholder="selecione o arquivo" >
            </div>    
          </div>  
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="nome_aluno">Nome Aluno</label>
              <input type="text" name="nome_aluno" id="nome_aluno" class="form-control" placeholder="Nome do Aluno" required="required" autofocus="autofocus" value="<?php echo @$aluno->nome_aluno ?>" readonly>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="turma">Turma</label>
              <input type="text" name="turma" id="turma" class="form-control" placeholder="Turma" required="required" value="<?php echo @$aluno->turma ?>" readonly>
            </div>
            <div class="form-group col-md-6">
              <label for="turma">Matrícula</label>
              <input type="text" name="ra" id="ra" class="form-control" placeholder="Matrícula" required="required" value="<?php echo @$aluno->ra ?>" readonly>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="cartao_pessoal">Deseja criar um cartão pessoal?</label>
              <?php
                $options = array(
                '1'=>'SIM', 
                '0'=>'NÃO',
                );
                
                echo form_dropdown('cartao_pessoal', $options, @$aluno->cartao_pessoal, array('class'=>'form-control', 'required'=>'required', 'id'=>'cartao_pessoal'));
              ?>
            </div>
          </div>
          <div id="horarios" class="form-row">
            <div class="form-group col-md-6">
              <label for="horario_entrada">Entrada</label>
              <input type="time" name="horario_entrada" id="horario_entrada" class="form-control" placeholder="horario_entrada" required="required" value="<?php echo @$aluno->horario_entrada ?>" >
            </div>
            <div class="form-group col-md-6">
              <label for="horario_saida">Saída</label>
              <input type="time" name="horario_saida" id="horario_saida" class="form-control" placeholder="Saída" required="required" value="<?php echo @$aluno->horario_saida ?>" >
            </div>
          </div>
       
          <button type="submit" class="btn btn-primary btn-block"><?php echo $btn_value ?></button>
          <a href="<?php echo base_url("alunos/listar/") ?> " class="btn btn-secondary btn-block" >VOLTAR</a>  
        </form>  
      </div>
    </div>
  
  </div>
</div>
<script>

  $(document).ready(function(){
    var option = $("#cartao_pessoal").val();
    hide_input(option);

    $("#foto").change(function(){
      $("form").submit();
    });

    $("#cartao_pessoal").change(function(){
      option = $(this).val();
      hide_input(option);
    });

    function hide_input(option){
      if(option == '1'){
        $("#horarios").show(500);
      }else if(option == '0' || option ==''){     
        $("#horarios").hide();
      }
    }

  });




</script>
