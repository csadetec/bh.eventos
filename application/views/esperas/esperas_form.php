<div class="card card-register mt-3">
  <div class="card-header"><?php echo $aluno->aluno .' - '.$aluno->codturma ?></div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <?php echo form_open($action, array('id'=>'form'));?>
          <div id="" class="form-row">
            <div class="form-group col-md-6">
              <label for="pai">Pai</label>
              <input type="text" name="pai" id="pai" class="form-control" placeholder="Nome do Pai" disabled="disabled" value="<?php echo @$aluno->pai ?>" >
            </div>
            <div class="form-group col-md-6">
              <label for="emailpai">Email Pai</label>
              <input type="text" name="emailpai" id="emailpai" class="form-control" placeholder="Email do Pai" readonly value="<?php echo @strtolower($aluno->emailpai) ?>" >
            </div>
          </div>
          <div id="" class="form-row">
            <div class="form-group col-md-6">
              <label for="mae">Mãe</label>
              <input type="text" name="mae" id="mae" class="form-control" placeholder="Nome do Mãe" disabled="disabled" value="<?php echo @$aluno->mae ?>" >
            </div>
            <div class="form-group col-md-6">
              <label for="emailmae">Email Mãe</label>
              <input type="text" name="emailmae" id="emailmae" class="form-control" placeholder="Email do Mãe" readonly value="<?php echo @strtolower($aluno->emailmae) ?>" >
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="qtd_convites">Convites (Quantidade extra)</label>
              <input type="number" min=1 name="qtd_convites" id="qtd_convites" class="form-control" placeholder="Insira a quantidade" required="required" autofocus="autofocus" value="<?php echo @$espera->qtd_convites ?>" >
            </div>
            <div class="form-group col-md-6">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Email para enviar mais convites" required="required" autofocus="autofocus" value="<?php echo @$espera->email ?>" >
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="qtd_convites">OBSERVAÇÕES</label>
              <textarea name="obs" id="obs"  rows="2" class="form-control"><?php echo @$espera->obs ?></textarea>
            </div>
          </div>
          <input type="hidden" name="ra" value="<?php echo @$aluno->ra ?> ">
          <input type="hidden" name="data" id="data" value="<?php  echo date('Y-m-d') ?>">
          <input type="hidden" name="horas" id="horas" value="<?php  echo date('H:i') ?>">
          <input type="hidden" name="id_usuario" id="id_usuario" value  ="<?php echo $this->session->userdata('id_usuario'); ?>">
          <button type="submit" class="btn btn-primary btn-block"><?php echo $btn_value ?></button>
          <a href="<?php echo base_url("alunos/listar/") ?> " class="btn btn-secondary btn-block" >CANCELAR</a>  
        </form>  
      </div>
    </div>
  
  </div>
</div>

<script>
  $(document).ready(function(){

    $("#emailmae").css('cursor','pointer');
    $("#emailpai").css('cursor','pointer');
    
    $("#emailmae").click(writeMail);
    $("#emailpai").click(writeMail);


    function writeMail(){
      var email = $(this).val();
      $("#email").val(email);
    }
  });
 


</script>