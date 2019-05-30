<div class="card card-register">
  <div class="card-header">Dados do Aluno</div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <?php echo form_open($action, array('id'=>'form'));?>
         
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="nome_aluno">Nome Aluno</label>
              <input type="text" name="nome_aluno" id="nome_aluno" class="form-control" placeholder="Nome do Aluno" required="required" autofocus="autofocus" value="<?php echo @$aluno->nome_aluno ?>" disabled="disabled">
            </div>
            <div class="form-group col-md-6">
              <label for="turma">Série</label>
              <input type="text" name="turma" id="turma" class="form-control" placeholder="Turma" required="required" value="<?php echo @$aluno->serie ?>" disabled="disabled">
            </div>
          </div>
          <!--
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="turma">Série</label>
              <input type="text" name="turma" id="turma" class="form-control" placeholder="Turma" required="required" value="<?php echo @$aluno->serie ?>" readonly>
            </div>
            <div class="form-group col-md-6">
              <label for="turma">Matrícula</label>
              <input type="text" name="ra" id="ra" class="form-control" placeholder="Matrícula" required="required" value="<?php echo @$aluno->ra ?>" readonly>
            </div>
          </div>
          <!-- -->
          <div id="nome_pai" class="form-row">
            <div class="form-group col-md-6">
              <label for="nome_pai">Pai</label>
              <input type="text" name="nome_pai" id="nome_pai" class="form-control" placeholder="Nome do Pai" disabled="disabled" value="<?php echo @$aluno->nome_pai ?>" >
            </div>
            <div class="form-group col-md-6">
              <label for="nome_mae">Mãe</label>
              <input type="text" name="nome_mae" id="nome_mae" class="form-control" placeholder="Nome da Mãe" disabled="disabled" value="<?php echo @$aluno->nome_mae ?>" >
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
          <input type="hidden" name="id_aluno" value="<?php echo @$aluno->id_aluno ?> ">
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

