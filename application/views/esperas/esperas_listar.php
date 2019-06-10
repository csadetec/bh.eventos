<input class="form-control col-12 mt-3 mb-3" type="search" placeholder="Pesquisar por Email" aria-label="Pesquisar.." id="myInput" data-list="list-group"> 
<ul id="myList" class="list-group">
  <?php 
  if($esperas):
    foreach($esperas as $e):
      ?>    
     <li class="list-group-item">
      <div class="row">
        <div class="col-md-8">
          <?php
            echo '<b>'.'EMAIL: '.'</b>'.$e->email.'<br>'
            .'<b>'.'QTDE: '.'</b>'.$e->qtd_convites.'<br>' 
            //.'<b>'.'ALUNO: '.'</b>'.$a->nome_aluno.' - '.'<i>'.$a->serie.'</i>'
            ;
            
          ?>

        </div>
        <div class="col-md-4">
          <?php 
            if($e->obs) echo '<i>'.'OBSERVAÇÃO'.'</i>'.'<br>'.$e->obs;
          ?>
          <br>
          <?php echo anchor('esperas/editar/'.$e->id_espera.'/'.$e->ra, '<i class="fas fa-edit"></i>', array('class'=>'btn btn-primary', 'style'=>'float:right; border-radius:49%')); ?>        
        </div>
      </div>
     </li>
      <?php
    endforeach;  
  endif;
?>      
</ul>
<div id="data" style="display: none"><?php  echo date('Y-m-d') ?></div>
<div id="horas" style="display: none"><?php  echo date('h:i') ?></div>

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


