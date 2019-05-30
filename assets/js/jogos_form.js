$(document).ready(function(){
  $("#div_3").hide();
  $("#div_4").hide();
  $("#div_5").hide();
  verifica_modalidade(); 

  $("#id_modalidade").change(verifica_modalidade);

  function verifica_modalidade(){
    var modalidade = $("#id_modalidade option:selected").val();
    var hostname =  window.location.hostname;
    var url = "http://"+hostname+"/jisa/modalidades/listar_json/"+modalidade;
    var qtd_equipes;

    console.log(url);

    if(modalidade != ''){

      $.getJSON(url, function(result){
      
        qtd_equipes = result.qtd_equipes;
         console.log(qtd_equipes);
        qtd_equipes = parseInt(qtd_equipes);

        if(qtd_equipes > 2){
          $("#div_3").show();
          $("#div_4").show();
          $("#div_5").show();
        }else{
          $("#div_3").hide();
          $("#div_4").hide();
          $("#div_5").hide();
        }

      });


    /**/
    }
  }
  /**/
});  