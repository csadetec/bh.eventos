 $(this).remove();
        var currentRow=$(this).closest("tr");
        var nome = currentRow.find("td:eq(0)").text();
        var turma = currentRow.find("td:eq(1)").text();
        var alunos_id = currentRow.find("td:eq(3)").text();
        var equipe = $("#id_equipe").text();
        var obj = {equipes_id:equipe, alunos_id: alunos_id};

        console.log(obj);
        
        $.ajax({
          type:"POST",
          url:"../deletar",
          data: obj,
          success: function(data){
            if(data == "success"){
              console.log("apagado");
                             
            }else{
              console.log("error ao apagar");
            }
          }
        });
        /**/
      });
    
      /*
      $("#myTable tr").click(function(){
        $(this).remove();       
        var currentRow=$(this).closest("tr"); 
        var nome=currentRow.find("td:eq(0)").text();
        var turma=currentRow.find("td:eq(1)").text();
        var alunos_id=currentRow.find("td:eq(3)").text();
        var equipe = $("#id_equipe").text();
        var obj = {equipes_id:equipe, alunos_id:alunos_id};
        console.log(obj);           
        $.ajax({
          type:"POST",
          url: "../adicionar",
          data: obj,
          success: function(data){
            if(data == "success"){
              console.log("cadastrado com sucesso");
              var html = '<tr style="cursor:pointer">'
                   +'<td>'+nome+'</td>'
                   +'<td>'+turma+'</td>'
                   +'<td>'+'<i class="fas fa-user-times"></i>'+'</td>'
                   +'<td>'+'<i style="display:none">'+alunos_id+'</i>'+'</td>'
                   +'</tr>';

                  $("#alunos_na_equipe").append(html);
              
              
            }else{
              console.log("erro ao cadastrar");
             
            }
                         
          }
            
        });
      
      });
      /**/

    