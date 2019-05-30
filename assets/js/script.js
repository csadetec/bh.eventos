
$(document).ready(function(){
	var title = $("title").text();

	if(title == 'LISTA DOS ALUNOS'){
		$("a.nav-link:eq(0)").addClass("active");
	}else if(title == 'LISTA DE ESPERA'){
		$("a.nav-link:eq(1)").addClass("active");

	}

  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
        
});
