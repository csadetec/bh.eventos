 $(document).ready(function(){
    $("#btn_form").click(function(){
      var html = $("#btn_form").html();
    
      if(html =='<i class="fas fa-plus"></i> Abrir Súmula'){
        $("#btn_form").html('<i class="fas fa-minus"></i> Fechar Súmula');
        $("#form_jogo").show();
      }else{
        $("#btn_form").html('<i class="fas fa-plus"></i> Abrir Súmula');
        $("#form_jogo").hide();
      }        
    });  
    

    $("#pontos_equipe_1").change(script);
    $("#pontos_equipe_2").change(script);

    $("#fair_play_1").change(script);
    $("#fair_play_2").change(script);

  
    $("#obs").click(script);

    function script(){
      var pontos_equipe_1 = $("#pontos_equipe_1").val();
      var pontos_equipe_2 = $("#pontos_equipe_2").val();

      pontos_equipe_1 = parseInt(pontos_equipe_1);
      pontos_equipe_2 = parseInt(pontos_equipe_2);

      var fair_play_1 = $("#fair_play_1").val();
      var fair_play_2 = $("#fair_play_2").val();

      pontos_equipe_1 = verifica_pontos(pontos_equipe_1);
      pontos_equipe_2 = verifica_pontos(pontos_equipe_2);
      



      if(pontos_equipe_1 ==  pontos_equipe_2){
       
        $("#pontos_final_1").val(2);
        $("#pontos_final_2").val(2);
      }else if(pontos_equipe_1 >  pontos_equipe_2) {
        $("#pontos_final_1").val(3);
        $("#pontos_final_2").val(1);
      }else{
        $("#pontos_final_1").val(1);
        $("#pontos_final_2").val(3);
      }

      if(fair_play_1 == 1){
        total =  $("#pontos_final_1").val();
        total = parseInt(total);
        total+=1;
        $("#pontos_final_1").val(total);
      }

      if(fair_play_2 == 1){
        total =  $("#pontos_final_2").val();
        total = parseInt(total);
        total+=1;
        $("#pontos_final_2").val(total);
      }
      /*
      pontos_equipe_1 = $("#pontos_equipe_1").val();
      pontos_equipe_2 = $("#pontos_equipe")
/**/
      function verifica_pontos(pontos){
        if(pontos == "" || pontos == null){
          return 0;
        }
        return pontos;
      }
    }
  });