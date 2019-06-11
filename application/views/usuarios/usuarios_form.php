<div class="card card-register">
  <div class="card-header">Dados do Usuário</div>
  <div class="card-body">
    <?php echo form_open($action, array('id'=>'form'));?>
     <div class="form-row">
        <div class="form-group col-md-12">
          <label for="nome">Nome</label>
          <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" required="required" autofocus="autofocus" value="<?php  echo isset($_POST['nome'])?@$_POST['nome']:@$usuario->nome?>">
        </div>
      </div>
      <!--
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="email">Email</label>
          <input type="text" name="email" id="email" class="form-control" placeholder="email" required="required" autofocus="autofocus" value="<?php  echo isset($_POST['email'])?@$_POST['email']:@$usuario->email?>">
        </div>
      </div>
      <!-- -->
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="usuario">Usuário</label>
          <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuário" required="required" value="<?php echo isset($_POST['usuario'])?@$_POST['usuario']:@$usuario->usuario ?>">
        </div>
      </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" required="required" value="<?php echo isset($_POST['senha'])?@$_POST['senha']:@$usuario->senha ?>">
            
          </div>
        </div>          
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="id_perfil">Perfil</label>
            <?php 
              /**/
              $options = null;
              $options[null] = 'SELECIONE O PERFIL';
              /*
              echo '<pre>';
              print_r($perfis);
              echo '</pre>';
              /**/
              foreach($perfis as $p):
                $options[$p->id_perfil] = $p->nome_perfil;
              endforeach;

              echo form_dropdown('id_perfil', $options, isset($_POST['id_perfil'])?@$_POST['id_perfil']:@$usuario
                ->id_perfil , array('class'=>'form-control',  'required'=>'required', 'id'=>'id_perfil'));
              /**/
              ?>               
          </div>
        </div>
        
        <button type="submit" class="btn btn-primary btn-block" > <?php echo $btn_value ?></button>
        <a href="<?php echo base_url("usuarios/listar") ?> " class="btn btn-secondary btn-block" >VOLTAR</a>  
      </form>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    $("#div_turma").hide();
    //$("#id_perfil").click(script);
    //console.log('teste');
    script();
    $("#id_perfil").click(script)
  
    function script(){
      var perfil = $("#id_perfil option:selected").text();
      if(perfil == "ALUNO"){
        $("#div_turma").show();
      }else{
        $("#id_turma").val(null);
        $("#div_turma").hide();
      }
      //console.log(perfil);
    }

  });
</script>