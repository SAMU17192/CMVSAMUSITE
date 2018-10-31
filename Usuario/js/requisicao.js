$(document).ready(function(){

	$("#filtroC").keyup(function(){
		//pegando o texto digitado
		var texto = $("#filtroC").val();

		$("#tabela").empty();

		$.ajax({
          url: 'http://localhost/CMVSAMUSITE/Usuario/ajax/webserivce.php',
		  method: "post",
		  dataType: "json",
		  data: {filtro: texto, tipo: "pesqhis"},
          success: function(data) {                               		
          	 if (data != 1){

              	var acumul = "";
		        for (var i = 0; i < data.length; i++)
		        {
		        	//adicionando os dados do funcionario na tabela
		        	acumul += '<tr>';
			        acumul += '<td>'+ data[i].IdHis + '</td>';
					acumul += '<td>'+ data[i].NomeVeiculo + '</td>';
					acumul += '<td>'+ data[i].NomePeca + '</td>';
					acumul += '<td>'+ data[i].KmTroca + '</td>';
					acumul += '<td>'+ data[i].Valor + '</td>';
					acumul += '<td>'+ data[i].Estoque + '</td>';
					acumul += '<td>'+ data[i].NumeroNota + '</td>';
					acumul += '<td>'+ data[i].LocalCompra + '</td>';
					acumul += '<td>'+ data[i].
					 + '</td>';
					acumul += '</tr>';

		        }

		        $("#tabela").append(acumul);

          	 }

          }

		});

	});		

});