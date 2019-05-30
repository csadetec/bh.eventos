<div class="row">
  <div class="col-md-12">
    <h4 class="">ATENÇÃO!</h4>
    <h5>Após o upload do arquivo, será apagado todos Dados.</h5>
    <hr>
  </div>
</div>

<div class="row mt-3">
  <div class="col-12">
    <div class="card card-register">
      <div class="card-header">Escolha o Arquivo EXCEL (.xls ou .xlsx)</div>
        <div class="card-body">
          <?php echo form_open_multipart($action);?>
            <div class="form-row">
              <div class="form-group col-md-12">
                <input type="file" name="userfile" id="userfile" class="form-control" placeholder="files" required="required" autofocus="autofocus" value="">
                  <!--<label for="userfile">Arquivo</label>-->
              </div>
            </div>           
            <input type="submit" class="btn btn-primary btn-block" value="<?php echo $btn_value ?> ">
            <a href="<?php echo base_url("alunos/listar/") ?> " class="btn btn-secondary btn-block" >CANCELAR</a>  
          </form>  
        </div>    
      </div>
    </div>
  </div>
</div>
