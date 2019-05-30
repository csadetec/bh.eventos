$(document).ready(function(){
  $("select#id_equipe_redirect").change(function(){
    var id_equipe = $(this).val();
    window.location.href = '../../formacoes/adicionar/'+id_equipe;
    console.log(id_equipe);
  });
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#listGeral li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  contar_integrantes();
  function contar_integrantes(){
    var count = $("#alunos_equipe li").length;
    $("#header_integrantes").text('EQUIPE '+count);
    
  }  

  function limite_alunos(){
    var count = $("#alunos_equipe li").length;
    var qtd_integrantes = $("#qtd_integrantes").text();

    count = parseInt(count);
    qtd_integrantes = parseInt(qtd_integrantes);

    if(count < qtd_integrantes){
      return true;
    }
    return false;

  }
  
  $("#alunos_equipe li").click(function(){
   
    var nome = $(this).find("span:eq(0)").text();
    var id_aluno = $(this).find("i:eq(1)").text();
    var id_equipe = $("#id_equipe").text();
    var resposta  = confirm('Retirar da Equipe - '+nome);
    if(resposta == true){
      $(this).remove();
      
      var obj = {id_equipe:id_equipe, id_aluno:id_aluno};
      $.ajax({
        type:"POST",
        url:"../deletar",
        data: obj,
        success: function(data){
          if(data == "success"){
            console.log("deletado");
            contar_integrantes();
          }else{
            console.log("erro ao cadastrar");
          }
        }
      });
    }     
  });
  $("#listGeral li").click(function(){
    if(limite_alunos()){
      $(this).remove();
      var nome = $(this).find("span").text();
      var id_aluno = $(this).find("i:eq(1)").text();
      var turma = $(this).find("i:eq(2)").text();
      var id_equipe = $("#id_equipe").text();
    // var qtd_integrantes = $("#qtd_integrantes").text();

      var obj = {id_equipe:id_equipe, id_aluno:id_aluno};
      $.ajax({
        type:"POST",
        url:"../adicionar",
        data: obj,
        success: function(data){
          if(data == "success"){
            console.log(nome+" - "+id_aluno);
            var html = '<li title="Atualize a página para retirar o aluno" class="list-group-item justify-content-between align-items-center" >'
                +'<i  class="mr-2 fas fa-sync"></i>'
                +'<span>'+nome+'</span>'
                +'<i style="display: none">'+id_aluno+'</i>'
                +'<i style="float: right">'+turma+'</i>'
                +'</li>';
                $("#alunos_equipe").append(html);
                contar_integrantes();
          }else{
            console.log("erro ao cadastrar");
          }
        }
      });  
    }else{
      alert('Chegou no limite de Jogadores');
    }    
  });

});