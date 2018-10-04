$(document).ready(function(){

	$("#filtroC").keyup(function(){
		//pegando o texto digitado
		var texto = $("#filtroC").val();

		$("#tabela").empty();

		$.ajax({
          url: 'http://localhost/CMVSAMUSITE/Logado/ajax/webserivce.php',
		  method: "post",
		  dataType: "json",
		  data: {filtro: texto},
          success: function(data) {                               		
          	 if (data != 1){

              	var acumul = "";
		        for (var i = 0; i < data.length; i++)
		        {
		        	//adicionando os dados do funcionario na tabela
		        	acumul += '<tr>';
			        acumul += '<td>'+ data[i].id + '</td>';
					acumul += '<td>'+ data[i].nomeveiculo + '</td>';
					acumul += '<td>'+ data[i].nomepeca + '</td>';
					acumul += '<td>'+ data[i].kmtroca + '</td>';
					acumul += '<td>'+ data[i].valor + '</td>';
					acumul += '<td>'+ data[i].estoque + '</td>';
					acumul += '</tr>';

		        }

		        $("#tabela").append(acumul);

          	 }

          }

		});

	});		

});