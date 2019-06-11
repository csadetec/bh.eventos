<input class="form-control col-12 mt-3 mb-3" type="search" placeholder="Pesquisar por nome do pai, mãe ou aluno" aria-label="Pesquisar.." id="myInput" data-list="list-group"> 
<ul id="myList" class="list-group">
  <?php 
  if($alunos):
    foreach($alunos as $a):
      ?>    
     <li class="list-group-item">
      <div class="row">
        <div class="col-md-8">
          <?php
            echo '<b>'.'MÃE: '.'</b>'.$a->mae.'<br>'
            .'<b>'.'EMAIL MÃE: '.'</b>'.strtolower($a->emailmae).'<br>'
            //.'<br>'
            .'<b>'.'PAI: '.'</b>'.$a->pai.'<br>' 
            .'<b>'.'EMAIL PAI: '.'</b>'.strtolower($a->emailpai).'<br>'
            //.'<br>'
            .'<b>'.'ALUNO: '.'</b>'.$a->aluno.' - '.'<i>'.$a->codturma.'</i>'.'<br>'
            .'<sub>'.set_data($a->data).'</sub>';
            //.'<sub>'.convite_turno(@$a->serie).'<br>'.set_data(@$a->data).'</sub>';
          ?>
        </div>
        <div class="col-md-3 mt-3">
          <button style="float:right" name="<?php echo $a->id_aluno?>" id="status" class="btn <?php echo class_status($a->status) ?>"><?php echo txt_status($a->status) ?></button>
        </div>
        <div class="col-md-1">
          <?php echo anchor('esperas/cadastrar/'.$a->id_aluno, '<i class="fas fa-plus"></i>', array('class'=>'btn btn-primary mt-3', 'style'=>'border-radius: 50%; float:right;', 'title'=>'Lista de Espera')); /**/ ?>
          <br>         
        </div>
      </div>
     </li>
      <?php
    endforeach;  
  endif;
?>      
</ul>
<div id="data" style="display: none"><?php  echo date('Y-m-d') ?></div>
<div id="horas" style="display: none"><?php  echo date('H:i:s') ?></div>
<div id="id_usuario" style="display:none"><?php echo $this->session->userdata('id_usuario'); ?> </div>

<script src="https://js.pusher.com/4.4/pusher.min.js"></script>
<script>
  $(document).ready(function(){
    var hostname = window.location.hostname;

    realtime();
    //setInterval(realtime_loop, 3000)
     
    function realtime(){
      Pusher.logToConsole = true;

      var pusher = new Pusher('f813cff7b76bbbb4a529', {
        cluster: 'us2',
        forceTLS: true
      });

      var channel = pusher.subscribe('my-channel');
      channel.bind('my-event', function(data) {
        //var result = (JSON.stringify(data));
        //$('#status[name='+result.id_aluno+']').addClass(class_status(field.status));
        //$("#status[name='7']").text('teste');
        $("#status[name='"+data.id_aluno+"']").removeClass('btn-outline-success btn-outline-danger'); 
        $("#status[name='"+data.id_aluno+"']").addClass(class_status(data.status)); 
        $("#status[name='"+data.id_aluno+"']").text(txt_status(data.status)); 
      });
     
    }
    
    function convite_turno(s){
      if(s == 'TERCEIRA SÉRIE' ||  s == 'SEGUNDA SÉRIE' || s == 'PRIMEIRA SÉRIE'){
        return 'CONVITE NOITE';
      }
      return 'CONVITE MANHÃ';
    }

    function class_status(s){
      if(s == '0'){
        return 'btn-outline-success';
      }
      return 'btn-outline-danger';
    }

    function txt_status(s){
      if(s == '0'){
        return 'CONVITE DISPONÍVEL';
      }
      return 'CONVITE ENVIADO';
    }
  

    $("button#status").click(function(){
     
      var status = $(this).text();
     
      var id_aluno = $(this).attr('name');
      var data = $("#data").text().trim();
      var horas = $("#horas").text().trim();
      var id_usuario = $("#id_usuario").text();
      
      if(status == 'CONVITE DISPONÍVEL'){
        status = 1;
        $(this).removeClass('btn-outline-success');
        $(this).addClass('btn-outline-danger');
        $(this).text('CONVITE ENVIADO');
      }else{
        status = 0;
        $(this).removeClass('btn-outline-danger');
        $(this).addClass('btn-outline-success');
        $(this).text('CONVITE DISPONÍVEL');
      }
      var obj = {status:status, data:data, horas:horas, id_usuario:id_usuario};
      //console.log(obj);
    
      $.ajax({
        type:"POST",
        url:'http://'+hostname+'/bh.eventos/alunos/editar_ajax/'+id_aluno,
        data:obj,
        success:function(data){
          if(data == 'success'){
            console.log(data);
          }else{
            alert('falha ao atualizar!');
          }
        }

      });

    });

    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myList li").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
        
  });

</script>


