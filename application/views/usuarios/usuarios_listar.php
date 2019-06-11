<?php echo anchor('usuarios/cadastrar', '<i class="fas fa-plus"></i> Cadastrar Usuário', array('style'=>'float:right; margin-bottom:10px;', 'class'=>'btn btn-success')); ?>
<input class="form-control col-12 mt-3 mb-3" type="search" placeholder="Pesquisar por nome do pai, mãe ou aluno" aria-label="Pesquisar.." id="myInput" data-list="list-group"> 
<ul id="myList" class="list-group">
  <?php 
  if($usuarios):
    foreach($usuarios as $u):
      ?>    
     <li class="list-group-item">
      <div class="row">
        <div class="col-md-9">
          <?php
            echo '<b>'.'NOME: '.'</b>'.$u->nome.'<br>'
            .'<b>'.'USUÁRIO: '.'</b>'.$u->usuario.'<br>'           
          ?>

        </div>
        <div>
         
        </div>
        <div class="col-md-3">
         
        
          <?php echo anchor('usuarios/editar/'.$u->id_usuario, '<i class="fas fa-edit"></i>', array('class'=>'btn btn-primary mt-3', 'style'=>'border-radius: 50%; float:right;', 'title'=>'Lista de Espera')); /**/ ?>
          
        </div>
      </div>
     </li>
      <?php
    endforeach;  
  endif;
?>      
</ul>
<script>
  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myList li").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });

  });
</script>